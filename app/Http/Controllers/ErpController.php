<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ErpController extends Controller
{
    /**
     * Shared context (active user, notifications, branches, global search) for topbar/sidebar.
     */
    protected function sharedData(Request $request): array
    {
        $userId = $request->session()->get('erp_user_id');
        $currentUser = DB::table('users as u')
            ->leftJoin('persons as p', 'p.id', '=', 'u.person_id')
            ->leftJoin('positions as pos', 'pos.id', '=', 'u.position_id')
            ->leftJoin('branches as b', 'b.id', '=', 'u.branch_id')
            ->select(
                'u.id',
                'u.username',
                'u.email',
                'p.full_name',
                'pos.name as position_name',
                'b.name as branch_name'
            )
            ->when($userId, fn ($q) => $q->where('u.id', $userId))
            ->first();

        if (!$currentUser) {
            $currentUser = DB::table('users as u')
                ->leftJoin('persons as p', 'p.id', '=', 'u.person_id')
                ->leftJoin('positions as pos', 'pos.id', '=', 'u.position_id')
                ->leftJoin('branches as b', 'b.id', '=', 'u.branch_id')
                ->select(
                    'u.id',
                    'u.username',
                    'u.email',
                    'p.full_name',
                    'pos.name as position_name',
                    'b.name as branch_name'
                )
                ->orderBy('u.id')
                ->first();
        }

        $allUsers = DB::table('users as u')
            ->leftJoin('persons as p', 'p.id', '=', 'u.person_id')
            ->leftJoin('positions as pos', 'pos.id', '=', 'u.position_id')
            ->select('u.id', 'u.username', 'p.full_name', 'pos.name as position_name')
            ->orderBy('u.id')
            ->get();

        $notifications = DB::table('notifications')
            ->orderByDesc('created_at')
            ->limit(6)
            ->get();

        return [
            'currentUser' => $currentUser,
            'allUsers' => $allUsers,
            'notifications' => $notifications,
        ];
    }

    /**
     * 1. Dashboard Page (idea_erp_dashboard)
     */
    public function dashboard(Request $request)
    {
        $exec = DB::table('v_executive_dashboard')->first();

        $programsEnrollment = DB::table('programs as pr')
            ->leftJoin('students as s', 's.program_id', '=', 'pr.id')
            ->leftJoin('applicant_program_choices as apc', 'apc.program_id', '=', 'pr.id')
            ->select(
                'pr.id',
                'pr.code',
                'pr.name',
                DB::raw('COUNT(DISTINCT s.id) as student_count'),
                DB::raw('COUNT(DISTINCT apc.applicant_id) as applicant_count')
            )
            ->groupBy('pr.id', 'pr.code', 'pr.name')
            ->orderBy('pr.id')
            ->get();

        $placementPipeline = DB::table('v_placement_pipeline')->first();

        $admissionInterviews = DB::table('admission_interviews as ai')
            ->join('applicants as a', 'a.id', '=', 'ai.applicant_id')
            ->join('persons as p', 'p.id', '=', 'a.person_id')
            ->leftJoin('applicant_program_choices as apc', function ($join) {
                $join->on('apc.applicant_id', '=', 'a.id')->where('apc.priority_no', '=', 1);
            })
            ->leftJoin('programs as pr', 'pr.id', '=', 'apc.program_id')
            ->leftJoin('branches as b', 'b.id', '=', 'a.branch_id')
            ->select(
                'p.full_name as candidate_name',
                'b.name as destination_name',
                'pr.name as program_name',
                'ai.scheduled_at',
                'ai.interview_mode',
                'ai.status'
            )
            ->orderByDesc('ai.scheduled_at')
            ->limit(3)
            ->get();

        $placementInterviews = DB::table('placement_interviews as pi')
            ->join('job_applications as ja', 'ja.id', '=', 'pi.job_application_id')
            ->join('placement_candidates as pc', 'pc.id', '=', 'ja.candidate_id')
            ->join('students as s', 's.id', '=', 'pc.student_id')
            ->join('persons as p', 'p.id', '=', 's.person_id')
            ->join('programs as pr', 'pr.id', '=', 's.program_id')
            ->join('job_demands as jd', 'jd.id', '=', 'ja.job_demand_id')
            ->join('partners as pt', 'pt.id', '=', 'jd.partner_id')
            ->select(
                'p.full_name as candidate_name',
                'pt.name as destination_name',
                'pr.name as program_name',
                'pi.scheduled_at',
                'pi.interview_mode',
                'pi.result as status'
            )
            ->orderByDesc('pi.scheduled_at')
            ->limit(3)
            ->get();

        $upcomingInterviews = $placementInterviews->concat($admissionInterviews)->take(4);

        $branchPerformance = DB::table('branches as b')
            ->leftJoin('applicants as a', 'a.branch_id', '=', 'b.id')
            ->leftJoin('students as s', function ($join) {
                $join->on('s.branch_id', '=', 'b.id')->where('s.student_status', '=', 'ACTIVE');
            })
            ->leftJoin('payments as pay', function ($join) {
                $join->on('pay.branch_id', '=', 'b.id')->where('pay.verification_status', '=', 'VERIFIED');
            })
            ->leftJoin('student_invoices as inv', function ($join) {
                $join->on('inv.branch_id', '=', 'b.id')->whereIn('inv.status', ['UNPAID', 'PARTIAL', 'OVERDUE']);
            })
            ->select(
                'b.id',
                'b.code',
                'b.name',
                'b.city_name',
                DB::raw('COUNT(DISTINCT a.id) as applicants_count'),
                DB::raw('COUNT(DISTINCT s.id) as active_students_count'),
                DB::raw('COALESCE(SUM(DISTINCT pay.amount), 0) as revenue'),
                DB::raw('COALESCE(SUM(DISTINCT inv.outstanding_amount), 0) as outstanding_payment')
            )
            ->groupBy('b.id', 'b.code', 'b.name', 'b.city_name')
            ->orderBy('b.id')
            ->get();

        $latestApplicant = DB::table('applicants as a')
            ->join('persons as p', 'p.id', '=', 'a.person_id')
            ->leftJoin('applicant_program_choices as apc', function ($join) {
                $join->on('apc.applicant_id', '=', 'a.id')->where('apc.priority_no', '=', 1);
            })
            ->leftJoin('programs as pr', 'pr.id', '=', 'apc.program_id')
            ->select('p.full_name', 'pr.name as program_name', 'a.registration_no', 'a.submitted_at')
            ->orderByDesc('a.id')
            ->first();

        $latestPayment = DB::table('payments as pay')
            ->join('persons as p', 'p.id', '=', 'pay.person_id')
            ->leftJoin('students as s', 's.person_id', '=', 'p.id')
            ->leftJoin('programs as pr', 'pr.id', '=', 's.program_id')
            ->select('pay.amount', 'p.full_name', 'pr.name as program_name', 'pay.payment_date')
            ->orderByDesc('pay.id')
            ->first();

        $latestCertificate = DB::table('certificates as c')
            ->join('students as s', 's.id', '=', 'c.student_id')
            ->join('persons as p', 'p.id', '=', 's.person_id')
            ->select('c.title', 'p.full_name', 'c.issue_date')
            ->orderByDesc('c.id')
            ->first();

        $latestPlacement = DB::table('placements as pl')
            ->join('students as s', 's.id', '=', 'pl.student_id')
            ->join('persons as p', 'p.id', '=', 's.person_id')
            ->join('partners as pt', 'pt.id', '=', 'pl.partner_id')
            ->select('p.full_name', 'pt.name as partner_name', 'pl.placement_date')
            ->orderByDesc('pl.id')
            ->first();

        $latestPartner = DB::table('partners as pt')
            ->leftJoin('partner_contracts as pc', 'pc.partner_id', '=', 'pt.id')
            ->select('pt.name as partner_name', 'pc.title as contract_title')
            ->orderByDesc('pt.id')
            ->first();

        return view('erp.dashboard', array_merge($this->sharedData($request), [
            'exec' => $exec,
            'programsEnrollment' => $programsEnrollment,
            'placementPipeline' => $placementPipeline,
            'upcomingInterviews' => $upcomingInterviews,
            'branchPerformance' => $branchPerformance,
            'latestApplicant' => $latestApplicant,
            'latestPayment' => $latestPayment,
            'latestCertificate' => $latestCertificate,
            'latestPlacement' => $latestPlacement,
            'latestPartner' => $latestPartner,
        ]));
    }

    /**
     * 2. Admission Management Page (idea_erp_admission_management)
     */
    public function admission(Request $request)
    {
        $intakeId = $request->query('intake_id');
        $branchId = $request->query('branch_id');
        $programId = $request->query('program_id');
        $status = $request->query('status');
        $search = $request->query('q');

        $statusCounts = DB::table('applicants')
            ->select('admission_status', DB::raw('COUNT(*) as total'))
            ->groupBy('admission_status')
            ->pluck('total', 'admission_status');

        $pipelineSummary = DB::table('v_admission_pipeline')
            ->select(
                DB::raw('COALESCE(SUM(total_applicants), 0) as total_applicants'),
                DB::raw('COALESCE(SUM(verified_or_beyond), 0) as verified_or_beyond'),
                DB::raw('COALESCE(SUM(interview_or_beyond), 0) as interview_or_beyond'),
                DB::raw('COALESCE(SUM(accepted_or_beyond), 0) as accepted_or_beyond'),
                DB::raw('COALESCE(SUM(enrolled), 0) as enrolled')
            )
            ->first();

        $applicantsQuery = DB::table('applicants as a')
            ->join('persons as p', 'p.id', '=', 'a.person_id')
            ->leftJoin('branches as b', 'b.id', '=', 'a.branch_id')
            ->leftJoin('admission_intakes as ai', 'ai.id', '=', 'a.intake_id')
            ->leftJoin('applicant_program_choices as apc', function ($join) {
                $join->on('apc.applicant_id', '=', 'a.id')->where('apc.priority_no', '=', 1);
            })
            ->leftJoin('programs as pr', 'pr.id', '=', 'apc.program_id')
            ->leftJoin('admission_interviews as intv', 'intv.applicant_id', '=', 'a.id')
            ->leftJoin('admission_verifications as av', 'av.applicant_id', '=', 'a.id')
            ->leftJoin('student_invoices as inv', 'inv.person_id', '=', 'p.id')
            ->select(
                'a.id',
                'a.registration_no',
                'a.admission_status',
                'a.source_channel',
                'a.submitted_at',
                'p.full_name',
                'p.email',
                'p.phone',
                'b.name as branch_name',
                'b.city_name as branch_city',
                'pr.name as program_name',
                'intv.scheduled_at as interview_date',
                'intv.interview_mode',
                'av.status as doc_verification_status',
                'inv.status as invoice_status'
            )
            ->when($intakeId, fn ($q) => $q->where('a.intake_id', $intakeId))
            ->when($branchId, fn ($q) => $q->where('a.branch_id', $branchId))
            ->when($programId, fn ($q) => $q->where('apc.program_id', $programId))
            ->when($status, fn ($q) => $q->where('a.admission_status', $status))
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('p.full_name', 'ilike', "%{$search}%")
                        ->orWhere('a.registration_no', 'ilike', "%{$search}%")
                        ->orWhere('pr.name', 'ilike', "%{$search}%");
                });
            })
            ->orderBy('a.registration_no');

        $applicants = $applicantsQuery->get()->unique('id')->values();

        $upcomingInterviews = DB::table('admission_interviews as ai')
            ->join('applicants as a', 'a.id', '=', 'ai.applicant_id')
            ->join('persons as p', 'p.id', '=', 'a.person_id')
            ->leftJoin('applicant_program_choices as apc', function ($join) {
                $join->on('apc.applicant_id', '=', 'a.id')->where('apc.priority_no', '=', 1);
            })
            ->leftJoin('programs as pr', 'pr.id', '=', 'apc.program_id')
            ->select(
                'p.full_name',
                'pr.name as program_name',
                'ai.scheduled_at',
                'ai.interview_mode',
                'ai.status'
            )
            ->orderByDesc('ai.scheduled_at')
            ->limit(5)
            ->get();

        $intakes = DB::table('admission_intakes')->orderBy('id')->get();
        $branches = DB::table('branches')->orderBy('id')->get();
        $programs = DB::table('programs')->orderBy('id')->get();
        $schools = DB::table('schools')->orderBy('id')->get();

        return view('erp.admission', array_merge($this->sharedData($request), [
            'statusCounts' => $statusCounts,
            'pipelineSummary' => $pipelineSummary,
            'applicants' => $applicants,
            'upcomingInterviews' => $upcomingInterviews,
            'intakes' => $intakes,
            'branches' => $branches,
            'programs' => $programs,
            'schools' => $schools,
            'filters' => [
                'intake_id' => $intakeId,
                'branch_id' => $branchId,
                'program_id' => $programId,
                'status' => $status,
                'q' => $search,
            ],
        ]));
    }

    /**
     * Store new Applicant (POST /admission)
     */
    public function storeApplicant(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:180',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:50',
            'gender' => 'required|in:MALE,FEMALE',
            'branch_id' => 'required|integer|exists:branches,id',
            'program_id' => 'required|integer|exists:programs,id',
            'source_channel' => 'required|string|max:50',
            'admission_status' => 'required|string|max:30',
        ]);

        DB::transaction(function () use ($validated) {
            $companyId = DB::table('companies')->where('code', 'IDEA')->value('id');
            $countryId = DB::table('countries')->where('iso2', 'ID')->value('id');
            $intakeId = DB::table('admission_intakes')->orderBy('id')->value('id');
            $sariUserId = DB::table('users')->where('username', 'sari.admin')->value('id');

            $nextPersonNum = DB::table('persons')->count() + 1;
            $personCode = 'P' . str_pad((string) $nextPersonNum, 3, '0', STR_PAD_LEFT);

            $personId = DB::table('persons')->insertGetId([
                'person_code' => $personCode,
                'full_name' => $validated['full_name'],
                'gender' => $validated['gender'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'nationality_country_id' => $countryId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $nextAppNum = DB::table('applicants')->count() + 1;
            $regNo = 'ADM-2026-' . str_pad((string) $nextAppNum, 3, '0', STR_PAD_LEFT);

            $applicantId = DB::table('applicants')->insertGetId([
                'company_id' => $companyId,
                'branch_id' => $validated['branch_id'],
                'intake_id' => $intakeId,
                'person_id' => $personId,
                'registration_no' => $regNo,
                'graduation_year' => 2026,
                'source_channel' => $validated['source_channel'],
                'assigned_user_id' => $sariUserId,
                'admission_status' => $validated['admission_status'],
                'submitted_at' => now(),
                'created_at' => now(),
            ]);

            DB::table('applicant_program_choices')->insert([
                'applicant_id' => $applicantId,
                'program_id' => $validated['program_id'],
                'branch_id' => $validated['branch_id'],
                'priority_no' => 1,
                'is_selected' => true,
            ]);
        });

        return redirect()->route('erp.admission')->with('success', 'Applicant baru berhasil ditambahkan ke database PostgreSQL!');
    }

    /**
     * Update Applicant Status (POST /admission/{id}/status)
     */
    public function updateApplicantStatus(Request $request, int $id)
    {
        $validated = $request->validate([
            'admission_status' => 'required|in:SUBMITTED,VERIFICATION,INTERVIEW,ACCEPTED,REGISTRATION,ENROLLED',
        ]);

        DB::table('applicants')->where('id', $id)->update([
            'admission_status' => $validated['admission_status'],
        ]);

        return redirect()->route('erp.admission')->with('success', 'Status applicant berhasil diperbarui!');
    }

    /**
     * 3. Finance Overview Page (idea_erp_finance_overview)
     */
    public function finance(Request $request)
    {
        $programId = $request->query('program_id');
        $status = $request->query('status');
        $search = $request->query('q');

        $invoiceTotals = DB::table('student_invoices')
            ->select(
                DB::raw('COALESCE(SUM(total_amount), 0) as total_billing'),
                DB::raw('COALESCE(SUM(paid_amount), 0) as total_paid'),
                DB::raw('COALESCE(SUM(outstanding_amount), 0) as total_outstanding'),
                DB::raw("COALESCE(SUM(outstanding_amount) FILTER (WHERE status = 'PARTIAL'), 0) as partial_outstanding"),
                DB::raw("COALESCE(SUM(outstanding_amount) FILTER (WHERE status = 'OVERDUE'), 0) as overdue_outstanding"),
                DB::raw("COALESCE(SUM(outstanding_amount) FILTER (WHERE status = 'UNPAID'), 0) as unpaid_outstanding")
            )
            ->first();

        $totalCashIn = DB::table('payments')
            ->where('verification_status', 'VERIFIED')
            ->sum('amount');

        $totalExpense = DB::table('expenses')->sum('amount');
        $netCash = $totalCashIn - $totalExpense;

        $programBillingSummary = DB::table('programs as pr')
            ->leftJoin('students as s', 's.program_id', '=', 'pr.id')
            ->leftJoin('student_invoices as inv', 'inv.student_id', '=', 's.id')
            ->select(
                'pr.id',
                'pr.code',
                'pr.name',
                DB::raw('COALESCE(SUM(inv.total_amount), 0) as total_billing'),
                DB::raw('COALESCE(SUM(inv.paid_amount), 0) as total_paid'),
                DB::raw('COALESCE(SUM(inv.outstanding_amount), 0) as total_outstanding')
            )
            ->groupBy('pr.id', 'pr.code', 'pr.name')
            ->orderBy('pr.id')
            ->get();

        $invoices = DB::table('student_invoices as inv')
            ->join('persons as p', 'p.id', '=', 'inv.person_id')
            ->leftJoin('students as s', 's.id', '=', 'inv.student_id')
            ->leftJoin('programs as pr', 'pr.id', '=', 's.program_id')
            ->leftJoin('branches as b', 'b.id', '=', 'inv.branch_id')
            ->select(
                'inv.id',
                'inv.invoice_no',
                'inv.invoice_date',
                'inv.due_date',
                'inv.total_amount',
                'inv.paid_amount',
                'inv.outstanding_amount',
                'inv.status',
                'p.full_name as student_name',
                's.student_no',
                'pr.name as program_name',
                'b.name as branch_name'
            )
            ->when($programId, fn ($q) => $q->where('s.program_id', $programId))
            ->when($status, fn ($q) => $q->where('inv.status', $status))
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('inv.invoice_no', 'ilike', "%{$search}%")
                        ->orWhere('p.full_name', 'ilike', "%{$search}%")
                        ->orWhere('pr.name', 'ilike', "%{$search}%");
                });
            })
            ->orderBy('inv.invoice_no')
            ->get();

        $recentPayments = DB::table('payments as pay')
            ->join('persons as p', 'p.id', '=', 'pay.person_id')
            ->leftJoin('students as s', 's.person_id', '=', 'p.id')
            ->leftJoin('programs as pr', 'pr.id', '=', 's.program_id')
            ->select('pay.payment_no', 'pay.amount', 'pay.payment_method', 'pay.payment_date', 'p.full_name', 'pr.name as program_name')
            ->orderByDesc('pay.id')
            ->limit(5)
            ->get();

        $programs = DB::table('programs')->orderBy('id')->get();
        $studentsList = DB::table('students as s')
            ->join('persons as p', 'p.id', '=', 's.person_id')
            ->join('programs as pr', 'pr.id', '=', 's.program_id')
            ->select('s.id', 's.student_no', 's.person_id', 's.branch_id', 'p.full_name', 'pr.name as program_name')
            ->orderBy('s.student_no')
            ->get();

        return view('erp.finance', array_merge($this->sharedData($request), [
            'invoiceTotals' => $invoiceTotals,
            'totalCashIn' => $totalCashIn,
            'totalExpense' => $totalExpense,
            'netCash' => $netCash,
            'programBillingSummary' => $programBillingSummary,
            'invoices' => $invoices,
            'recentPayments' => $recentPayments,
            'programs' => $programs,
            'studentsList' => $studentsList,
            'filters' => [
                'program_id' => $programId,
                'status' => $status,
                'q' => $search,
            ],
        ]));
    }

    /**
     * Store Invoice / Payment (POST /finance/invoices)
     */
    public function storeInvoice(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'total_amount' => 'required|numeric|min:100000',
            'paid_amount' => 'required|numeric|min:0',
            'due_date' => 'required|date',
            'payment_method' => 'nullable|string|max:30',
        ]);

        DB::transaction(function () use ($validated) {
            $student = DB::table('students')->where('id', $validated['student_id'])->first();
            $companyId = $student->company_id;
            $rizkyUserId = DB::table('users')->where('username', 'rizky.finance')->value('id');
            $bankAccId = DB::table('bank_accounts')->orderBy('id')->value('id');

            $total = (float) $validated['total_amount'];
            $paid = min($total, (float) $validated['paid_amount']);
            $outstanding = max(0, $total - $paid);

            $status = 'UNPAID';
            if ($outstanding <= 0) {
                $status = 'PAID';
            } elseif ($paid > 0) {
                $status = 'PARTIAL';
            } elseif (strtotime($validated['due_date']) < time()) {
                $status = 'OVERDUE';
            }

            $nextNum = DB::table('student_invoices')->count() + 1;
            $invNo = 'INV-' . str_pad((string) $nextNum, 3, '0', STR_PAD_LEFT);

            $invId = DB::table('student_invoices')->insertGetId([
                'company_id' => $companyId,
                'branch_id' => $student->branch_id,
                'person_id' => $student->person_id,
                'student_id' => $student->id,
                'invoice_no' => $invNo,
                'invoice_date' => now()->toDateString(),
                'due_date' => $validated['due_date'],
                'billing_context' => 'STUDENT',
                'subtotal' => $total,
                'total_amount' => $total,
                'paid_amount' => $paid,
                'outstanding_amount' => $outstanding,
                'status' => $status,
                'created_at' => now(),
            ]);

            if ($paid > 0) {
                $payNo = 'PAY-' . str_pad((string) (DB::table('payments')->count() + 1), 3, '0', STR_PAD_LEFT);
                $payId = DB::table('payments')->insertGetId([
                    'company_id' => $companyId,
                    'branch_id' => $student->branch_id,
                    'person_id' => $student->person_id,
                    'payment_no' => $payNo,
                    'payment_date' => now(),
                    'payment_method' => $validated['payment_method'] ?: 'BANK_TRANSFER',
                    'bank_account_id' => $bankAccId,
                    'amount' => $paid,
                    'reference_no' => 'TRX-' . $payNo,
                    'verification_status' => 'VERIFIED',
                    'verified_by' => $rizkyUserId,
                    'verified_at' => now(),
                ]);

                DB::table('payment_allocations')->insert([
                    'payment_id' => $payId,
                    'invoice_id' => $invId,
                    'allocated_amount' => $paid,
                ]);
            }
        });

        return redirect()->route('erp.finance')->with('success', 'Invoice & pembayaran berhasil disimpan ke database PostgreSQL!');
    }

    /**
     * 4. Student Management Page (idea_erp_student_management)
     */
    public function students(Request $request)
    {
        $branchId = $request->query('branch_id');
        $batchId = $request->query('batch_id');
        $programId = $request->query('program_id');
        $search = $request->query('q');

        $activeStudentsCount = DB::table('students')->where('student_status', 'ACTIVE')->count();
        $totalStudentsCount = DB::table('students')->count();
        $avgAttendance = (int) round((float) DB::table('v_student_readiness_latest')->avg('attendance_score') ?: 89);
        $avgProgress = (int) round((float) DB::table('v_student_readiness_latest')->avg('overall_score') ?: 85);
        $dormCount = DB::table('dormitory_allocations')->where('status', 'ACTIVE')->count();
        $gradReadyCount = DB::table('v_student_readiness_latest')->where('readiness_status', 'PLACEMENT_READY')->count();

        $schedules = DB::table('schedules as sch')
            ->join('classes as c', 'c.id', '=', 'sch.class_id')
            ->join('subjects as sub', 'sub.id', '=', 'sch.subject_id')
            ->leftJoin('users as u', 'u.id', '=', 'sch.trainer_user_id')
            ->select(
                'sch.id',
                'sch.schedule_date',
                'sch.start_time',
                'sch.end_time',
                'sch.room_name',
                'sch.delivery_mode',
                'sch.status',
                'c.name as class_name',
                'sub.code as subject_code',
                'sub.name as subject_name'
            )
            ->orderBy('sch.schedule_date')
            ->orderBy('sch.start_time')
            ->get();

        $programStats = DB::table('programs as pr')
            ->leftJoin('students as s', 's.program_id', '=', 'pr.id')
            ->leftJoin('v_student_readiness_latest as r', 'r.student_id', '=', 's.id')
            ->select(
                'pr.id',
                'pr.code',
                'pr.name',
                DB::raw('COUNT(DISTINCT s.id) as student_count'),
                DB::raw('ROUND(COALESCE(AVG(r.overall_score), 78), 0) as avg_progress')
            )
            ->groupBy('pr.id', 'pr.code', 'pr.name')
            ->orderBy('pr.id')
            ->get();

        $students = DB::table('students as s')
            ->join('persons as p', 'p.id', '=', 's.person_id')
            ->join('programs as pr', 'pr.id', '=', 's.program_id')
            ->leftJoin('batches as bt', 'bt.id', '=', 's.batch_id')
            ->leftJoin('branches as b', 'b.id', '=', 's.branch_id')
            ->leftJoin('classes as cl', 'cl.id', '=', 's.class_id')
            ->leftJoin('v_student_readiness_latest as r', 'r.student_id', '=', 's.id')
            ->select(
                's.id',
                's.student_no',
                's.enrollment_date',
                's.student_status',
                'p.full_name',
                'p.email',
                'p.phone',
                'pr.name as program_name',
                'bt.name as batch_name',
                'b.name as branch_name',
                'cl.name as class_name',
                DB::raw('COALESCE(r.attendance_score, 90) as attendance_score'),
                DB::raw('COALESCE(r.overall_score, 82) as progress_score')
            )
            ->when($branchId, fn ($q) => $q->where('s.branch_id', $branchId))
            ->when($batchId, fn ($q) => $q->where('s.batch_id', $batchId))
            ->when($programId, fn ($q) => $q->where('s.program_id', $programId))
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('p.full_name', 'ilike', "%{$search}%")
                        ->orWhere('s.student_no', 'ilike', "%{$search}%")
                        ->orWhere('pr.name', 'ilike', "%{$search}%");
                });
            })
            ->orderBy('s.student_no')
            ->get();

        $branches = DB::table('branches')->orderBy('id')->get();
        $batches = DB::table('batches')->orderBy('id')->get();
        $programs = DB::table('programs')->orderBy('id')->get();
        $classes = DB::table('classes')->orderBy('id')->get();

        return view('erp.students', array_merge($this->sharedData($request), [
            'kpis' => [
                'active_students' => $activeStudentsCount,
                'new_enrollment' => $totalStudentsCount,
                'attendance_rate' => $avgAttendance,
                'training_progress' => $avgProgress,
                'dormitory_students' => $dormCount,
                'graduation_ready' => $gradReadyCount,
            ],
            'schedules' => $schedules,
            'programStats' => $programStats,
            'students' => $students,
            'branches' => $branches,
            'batches' => $batches,
            'programs' => $programs,
            'classes' => $classes,
            'filters' => [
                'branch_id' => $branchId,
                'batch_id' => $batchId,
                'program_id' => $programId,
                'q' => $search,
            ],
        ]));
    }

    /**
     * Store New Student (POST /students)
     */
    public function storeStudent(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:180',
            'email' => 'required|email|max:150',
            'phone' => 'required|string|max:50',
            'gender' => 'required|in:MALE,FEMALE',
            'branch_id' => 'required|integer|exists:branches,id',
            'program_id' => 'required|integer|exists:programs,id',
            'batch_id' => 'required|integer|exists:batches,id',
        ]);

        DB::transaction(function () use ($validated) {
            $companyId = DB::table('companies')->where('code', 'IDEA')->value('id');
            $countryId = DB::table('countries')->where('iso2', 'ID')->value('id');
            $classId = DB::table('classes')->where('batch_id', $validated['batch_id'])->value('id')
                ?? DB::table('classes')->orderBy('id')->value('id');

            $nextPersonNum = DB::table('persons')->count() + 1;
            $personCode = 'P' . str_pad((string) $nextPersonNum, 3, '0', STR_PAD_LEFT);

            $personId = DB::table('persons')->insertGetId([
                'person_code' => $personCode,
                'full_name' => $validated['full_name'],
                'gender' => $validated['gender'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'nationality_country_id' => $countryId,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $nextStdNum = DB::table('students')->count() + 1;
            $studentNo = 'STD2026' . str_pad((string) $nextStdNum, 3, '0', STR_PAD_LEFT);

            $studentId = DB::table('students')->insertGetId([
                'company_id' => $companyId,
                'branch_id' => $validated['branch_id'],
                'person_id' => $personId,
                'student_no' => $studentNo,
                'program_id' => $validated['program_id'],
                'batch_id' => $validated['batch_id'],
                'class_id' => $classId,
                'enrollment_date' => now()->toDateString(),
                'student_status' => 'ACTIVE',
                'created_at' => now(),
            ]);

            DB::table('readiness_scores')->insert([
                'student_id' => $studentId,
                'calculated_date' => now()->toDateString(),
                'academic_score' => 85,
                'competency_score' => 84,
                'english_score' => 82,
                'attendance_score' => 94,
                'attitude_score' => 90,
                'document_score' => 90,
                'overall_score' => 87,
                'readiness_status' => 'PLACEMENT_READY',
            ]);
        });

        return redirect()->route('erp.students')->with('success', 'Data siswa baru berhasil ditambahkan ke database PostgreSQL!');
    }

    /**
     * 5. Assessment & Certification Page (idea_erp_assessment_certification)
     */
    public function assessments(Request $request)
    {
        $programId = $request->query('program_id');
        $certTypeId = $request->query('cert_type_id');
        $search = $request->query('q');

        $assessedCount = DB::table('assessment_participants')->count();
        $competentCount = DB::table('assessment_participants')->where('result', 'COMPETENT')->count();
        $remedialCount = DB::table('remedials')->count();
        $placementReadyCount = DB::table('v_student_readiness_latest')->where('readiness_status', 'PLACEMENT_READY')->count();
        $certsIssuedCount = DB::table('certificates')->count();
        $expiringCertsCount = DB::table('certificates')
            ->where(function ($q) {
                $q->where('status', 'EXPIRING')
                    ->orWhere('expiry_date', '<=', '2027-06-01');
            })
            ->count();

        $programCompletion = DB::table('programs as pr')
            ->leftJoin('students as s', 's.program_id', '=', 'pr.id')
            ->leftJoin('v_student_readiness_latest as r', 'r.student_id', '=', 's.id')
            ->select(
                'pr.id',
                'pr.code',
                'pr.name',
                DB::raw('ROUND(COALESCE(AVG(r.competency_score), 82), 0) as completion_rate')
            )
            ->groupBy('pr.id', 'pr.code', 'pr.name')
            ->orderBy('pr.id')
            ->get();

        $upcomingAssessments = DB::table('assessments as a')
            ->join('programs as pr', 'pr.id', '=', 'a.program_id')
            ->leftJoin('batches as bt', 'bt.id', '=', 'a.batch_id')
            ->leftJoin('assessment_participants as ap', 'ap.assessment_id', '=', 'a.id')
            ->select(
                'a.id',
                'a.code',
                'a.name',
                'a.assessment_type',
                'a.scheduled_at',
                'a.location',
                'a.status',
                'pr.name as program_name',
                'bt.capacity',
                DB::raw('COUNT(ap.id) as participant_count')
            )
            ->groupBy('a.id', 'a.code', 'a.name', 'a.assessment_type', 'a.scheduled_at', 'a.location', 'a.status', 'pr.name', 'bt.capacity')
            ->orderBy('a.scheduled_at')
            ->get();

        $certificates = DB::table('certificates as c')
            ->join('students as s', 's.id', '=', 'c.student_id')
            ->join('persons as p', 'p.id', '=', 's.person_id')
            ->join('programs as pr', 'pr.id', '=', 's.program_id')
            ->join('certification_types as ct', 'ct.id', '=', 'c.certification_type_id')
            ->select(
                'c.id',
                'c.certificate_no',
                'c.title',
                'c.issued_by',
                'c.issue_date',
                'c.expiry_date',
                'c.score',
                'c.status',
                'p.full_name as student_name',
                's.student_no',
                'pr.name as program_name',
                'ct.name as cert_type_name'
            )
            ->when($programId, fn ($q) => $q->where('s.program_id', $programId))
            ->when($certTypeId, fn ($q) => $q->where('c.certification_type_id', $certTypeId))
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('p.full_name', 'ilike', "%{$search}%")
                        ->orWhere('c.title', 'ilike', "%{$search}%")
                        ->orWhere('c.certificate_no', 'ilike', "%{$search}%")
                        ->orWhere('ct.name', 'ilike', "%{$search}%");
                });
            })
            ->orderBy('c.id')
            ->get();

        $programs = DB::table('programs')->orderBy('id')->get();
        $certificationTypes = DB::table('certification_types')->orderBy('id')->get();
        $studentsList = DB::table('students as s')
            ->join('persons as p', 'p.id', '=', 's.person_id')
            ->join('programs as pr', 'pr.id', '=', 's.program_id')
            ->select('s.id', 's.student_no', 'p.full_name', 'pr.name as program_name')
            ->orderBy('s.student_no')
            ->get();

        return view('erp.assessments', array_merge($this->sharedData($request), [
            'kpis' => [
                'assessed' => $assessedCount,
                'competent' => $competentCount,
                'remedial' => $remedialCount,
                'placement_ready' => $placementReadyCount,
                'certificates_issued' => $certsIssuedCount,
                'expiring_certificates' => $expiringCertsCount,
            ],
            'programCompletion' => $programCompletion,
            'upcomingAssessments' => $upcomingAssessments,
            'certificates' => $certificates,
            'programs' => $programs,
            'certificationTypes' => $certificationTypes,
            'studentsList' => $studentsList,
            'filters' => [
                'program_id' => $programId,
                'cert_type_id' => $certTypeId,
                'q' => $search,
            ],
        ]));
    }

    /**
     * Store New Certificate (POST /assessments/certificates)
     */
    public function storeCertificate(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|integer|exists:students,id',
            'certification_type_id' => 'required|integer|exists:certification_types,id',
            'title' => 'required|string|max:180',
            'score' => 'required|numeric|min:0|max:100',
            'issue_date' => 'required|date',
        ]);

        $certType = DB::table('certification_types')->where('id', $validated['certification_type_id'])->first();
        $validityMonths = $certType->validity_months ?? 36;
        $expiryDate = date('Y-m-d', strtotime($validated['issue_date'] . " +{$validityMonths} months"));
        $nextNum = DB::table('certificates')->count() + 1;
        $certNo = 'CERT-' . str_pad((string) $nextNum, 3, '0', STR_PAD_LEFT);

        DB::table('certificates')->insert([
            'student_id' => $validated['student_id'],
            'certification_type_id' => $validated['certification_type_id'],
            'certificate_no' => $certNo,
            'title' => $validated['title'],
            'issued_by' => 'IDEA Indonesia',
            'issue_date' => $validated['issue_date'],
            'expiry_date' => $expiryDate,
            'score' => $validated['score'],
            'status' => 'ACTIVE',
        ]);

        return redirect()->route('erp.assessments')->with('success', 'Sertifikat baru berhasil diterbitkan dan disimpan ke PostgreSQL!');
    }

    /**
     * 6. Career & Placement Page (idea_erp_career_placement)
     */
    public function placements(Request $request)
    {
        $search = $request->query('q');

        $pipeline = DB::table('v_placement_pipeline')->first();
        $exec = DB::table('v_executive_dashboard')->first();

        $openVacanciesCount = DB::table('job_demands')->whereIn('status', ['OPEN', 'IN_PROGRESS'])->count();
        $interviewsCount = DB::table('placement_interviews')->count();
        $offersCount = DB::table('job_offers')->count();
        $intlPlacementsCount = DB::table('placements')->where('placement_type', 'INTERNATIONAL')->count();

        $vacancies = DB::table('job_demands as jd')
            ->join('partners as pt', 'pt.id', '=', 'jd.partner_id')
            ->join('job_positions as jp', 'jp.id', '=', 'jd.job_position_id')
            ->leftJoin('countries as co', 'co.id', '=', 'jd.country_id')
            ->leftJoin('cities as ci', 'ci.id', '=', 'jd.city_id')
            ->leftJoin('candidate_matches as cm', 'cm.job_demand_id', '=', 'jd.id')
            ->select(
                'jd.id',
                'jd.code',
                'jd.title',
                'jd.slots',
                'jd.salary_min',
                'jd.salary_max',
                'jd.currency',
                'jd.interview_date',
                'jd.status',
                'pt.name as partner_name',
                'jp.name as position_name',
                'co.name as country_name',
                'ci.name as city_name',
                DB::raw('COUNT(cm.id) as matched_count')
            )
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('pt.name', 'ilike', "%{$search}%")
                        ->orWhere('jd.title', 'ilike', "%{$search}%")
                        ->orWhere('jp.name', 'ilike', "%{$search}%")
                        ->orWhere('co.name', 'ilike', "%{$search}%");
                });
            })
            ->groupBy(
                'jd.id',
                'jd.code',
                'jd.title',
                'jd.slots',
                'jd.salary_min',
                'jd.salary_max',
                'jd.currency',
                'jd.interview_date',
                'jd.status',
                'pt.name',
                'jp.name',
                'co.name',
                'ci.name'
            )
            ->orderBy('jd.id')
            ->get();

        $matchingCandidates = DB::table('placement_candidates as pc')
            ->join('students as s', 's.id', '=', 'pc.student_id')
            ->join('persons as p', 'p.id', '=', 's.person_id')
            ->join('programs as pr', 'pr.id', '=', 's.program_id')
            ->leftJoin('v_student_readiness_latest as r', 'r.student_id', '=', 's.id')
            ->leftJoin('candidate_matches as cm', 'cm.candidate_id', '=', 'pc.id')
            ->leftJoin('job_positions as jp', 'jp.id', '=', 'pc.desired_position_id')
            ->leftJoin('countries as co', 'co.id', '=', 'pc.desired_country_id')
            ->select(
                'pc.id',
                'pc.candidate_status',
                'p.full_name',
                's.student_no',
                'pr.name as program_name',
                'jp.name as desired_position',
                'co.name as desired_country',
                DB::raw('COALESCE(MAX(cm.match_score), COALESCE(r.overall_score, 88)) as match_score')
            )
            ->groupBy('pc.id', 'pc.candidate_status', 'p.full_name', 's.student_no', 'pr.name', 'jp.name', 'co.name', 'r.overall_score')
            ->orderByDesc('match_score')
            ->limit(6)
            ->get();

        $partnersList = DB::table('partners')->orderBy('name')->get();
        $jobPositions = DB::table('job_positions')->orderBy('name')->get();
        $countries = DB::table('countries')->orderBy('name')->get();

        return view('erp.placements', array_merge($this->sharedData($request), [
            'pipeline' => $pipeline,
            'exec' => $exec,
            'kpis' => [
                'ready_candidates' => $pipeline->ready ?? 0,
                'open_vacancies' => $openVacanciesCount,
                'interviews' => $interviewsCount,
                'accepted_offers' => $offersCount,
                'intl_placements' => $intlPlacementsCount,
                'placement_rate' => $exec->placement_rate_percent ?? 87,
            ],
            'vacancies' => $vacancies,
            'matchingCandidates' => $matchingCandidates,
            'partnersList' => $partnersList,
            'jobPositions' => $jobPositions,
            'countries' => $countries,
            'filters' => [
                'q' => $search,
            ],
        ]));
    }

    /**
     * Store New Job Vacancy / Demand (POST /placements/vacancies)
     */
    public function storeVacancy(Request $request)
    {
        $validated = $request->validate([
            'partner_id' => 'required|integer|exists:partners,id',
            'job_position_id' => 'required|integer|exists:job_positions,id',
            'title' => 'required|string|max:180',
            'country_id' => 'required|integer|exists:countries,id',
            'slots' => 'required|integer|min:1',
            'interview_date' => 'required|date',
        ]);

        $cityId = DB::table('cities')->where('country_id', $validated['country_id'])->value('id');
        $nextNum = DB::table('job_demands')->count() + 1;
        $code = 'JOB-2026-' . str_pad((string) $nextNum, 3, '0', STR_PAD_LEFT);

        DB::table('job_demands')->insert([
            'partner_id' => $validated['partner_id'],
            'job_position_id' => $validated['job_position_id'],
            'code' => $code,
            'title' => $validated['title'],
            'country_id' => $validated['country_id'],
            'city_id' => $cityId,
            'slots' => $validated['slots'],
            'employment_type' => 'FULL_TIME',
            'open_date' => now()->toDateString(),
            'interview_date' => $validated['interview_date'],
            'status' => 'OPEN',
        ]);

        return redirect()->route('erp.placements')->with('success', 'Lowongan kerja (Job Demand) berhasil ditambahkan ke PostgreSQL!');
    }

    /**
     * 7. Industry Partners Page (idea_erp_partners)
     */
    public function partners(Request $request)
    {
        $categoryId = $request->query('category_id');
        $search = $request->query('q');

        $totalPartners = DB::table('partners')->count();
        $activePartners = DB::table('partners')->where('partnership_status', 'ACTIVE')->count();
        $openDemandsSum = (int) DB::table('job_demands')->whereIn('status', ['OPEN', 'IN_PROGRESS'])->sum('slots');
        $placementsCount = DB::table('placements')->count();
        $intlPartners = DB::table('partners')->where('is_international', true)->count();
        $renewalDueCount = DB::table('partner_contracts')
            ->where(function ($q) {
                $q->where('status', 'RENEWAL_DUE')
                    ->orWhere('end_date', '<=', '2027-03-31');
            })
            ->count();

        $categoryDistribution = DB::table('partner_categories as pc')
            ->leftJoin('partners as p', 'p.category_id', '=', 'pc.id')
            ->select(
                'pc.id',
                'pc.code',
                'pc.name',
                DB::raw('COUNT(p.id) as partner_count')
            )
            ->groupBy('pc.id', 'pc.code', 'pc.name')
            ->orderByDesc('partner_count')
            ->get();

        $partners = DB::table('partners as p')
            ->join('partner_categories as pc', 'pc.id', '=', 'p.category_id')
            ->leftJoin('countries as co', 'co.id', '=', 'p.country_id')
            ->leftJoin('cities as ci', 'ci.id', '=', 'p.city_id')
            ->leftJoin('v_partner_performance as vp', 'vp.partner_id', '=', 'p.id')
            ->select(
                'p.id',
                'p.code',
                'p.name',
                'p.partnership_status',
                'p.is_international',
                'pc.name as category_name',
                'co.name as country_name',
                'ci.name as city_name',
                DB::raw('COALESCE(vp.open_job_demands, 0) as open_job_demands'),
                DB::raw('COALESCE(vp.candidate_applications, 0) as candidate_applications'),
                DB::raw('COALESCE(vp.successful_placements, 0) as successful_placements')
            )
            ->when($categoryId, fn ($q) => $q->where('p.category_id', $categoryId))
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('p.name', 'ilike', "%{$search}%")
                        ->orWhere('pc.name', 'ilike', "%{$search}%")
                        ->orWhere('co.name', 'ilike', "%{$search}%")
                        ->orWhere('ci.name', 'ilike', "%{$search}%");
                });
            })
            ->orderBy('p.id')
            ->get();

        $contactsByPartner = DB::table('partner_contacts')
            ->orderByDesc('is_primary')
            ->get()
            ->groupBy('partner_id');

        $contractsByPartner = DB::table('partner_contracts')
            ->orderByDesc('start_date')
            ->get()
            ->groupBy('partner_id');

        $slotsByPartner = DB::table('job_demands')
            ->select('partner_id', DB::raw('SUM(slots) as total_slots'))
            ->groupBy('partner_id')
            ->pluck('total_slots', 'partner_id');

        $recentContracts = DB::table('partner_contracts as ctr')
            ->join('partners as p', 'p.id', '=', 'ctr.partner_id')
            ->select(
                'ctr.contract_no',
                'ctr.contract_type',
                'ctr.title',
                'ctr.start_date',
                'ctr.end_date',
                'ctr.status',
                'p.name as partner_name'
            )
            ->orderByDesc('ctr.start_date')
            ->limit(5)
            ->get();

        $categories = DB::table('partner_categories')->orderBy('id')->get();
        $countries = DB::table('countries')->orderBy('name')->get();

        return view('erp.partners', array_merge($this->sharedData($request), [
            'kpis' => [
                'total_partners' => $totalPartners,
                'active_partners' => $activePartners,
                'open_demands' => $openDemandsSum,
                'placements_this_year' => $placementsCount,
                'intl_partners' => $intlPartners,
                'renewal_due' => $renewalDueCount,
            ],
            'categoryDistribution' => $categoryDistribution,
            'partners' => $partners,
            'contactsByPartner' => $contactsByPartner,
            'contractsByPartner' => $contractsByPartner,
            'slotsByPartner' => $slotsByPartner,
            'recentContracts' => $recentContracts,
            'categories' => $categories,
            'countries' => $countries,
            'filters' => [
                'category_id' => $categoryId,
                'q' => $search,
            ],
        ]));
    }

    /**
     * Store New Partner (POST /partners)
     */
    public function storePartner(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:180',
            'category_id' => 'required|integer|exists:partner_categories,id',
            'country_id' => 'required|integer|exists:countries,id',
            'pic_name' => 'required|string|max:150',
            'pic_email' => 'nullable|email|max:150',
            'contract_title' => 'nullable|string|max:180',
        ]);

        DB::transaction(function () use ($validated) {
            $companyId = DB::table('companies')->where('code', 'IDEA')->value('id');
            $country = DB::table('countries')->where('id', $validated['country_id'])->first();
            $cityId = DB::table('cities')->where('country_id', $validated['country_id'])->value('id');
            $isIntl = $country && $country->iso2 !== 'ID';

            $nextNum = DB::table('partners')->count() + 1;
            $code = 'PRT' . str_pad((string) $nextNum, 3, '0', STR_PAD_LEFT);

            $partnerId = DB::table('partners')->insertGetId([
                'company_id' => $companyId,
                'category_id' => $validated['category_id'],
                'code' => $code,
                'name' => $validated['name'],
                'country_id' => $validated['country_id'],
                'city_id' => $cityId,
                'email' => $validated['pic_email'],
                'partnership_status' => 'ACTIVE',
                'is_international' => $isIntl,
            ]);

            DB::table('partner_contacts')->insert([
                'partner_id' => $partnerId,
                'name' => $validated['pic_name'],
                'position' => 'HR / Talent Acquisition',
                'email' => $validated['pic_email'],
                'is_primary' => true,
            ]);

            DB::table('partner_contracts')->insert([
                'partner_id' => $partnerId,
                'contract_no' => 'MOU-' . $code . '-2026',
                'contract_type' => 'PLACEMENT',
                'title' => $validated['contract_title'] ?: 'Kerja Sama Penempatan & Magang',
                'start_date' => now()->toDateString(),
                'end_date' => now()->addYears(2)->toDateString(),
                'status' => 'ACTIVE',
            ]);
        });

        return redirect()->route('erp.partners')->with('success', 'Mitra industri (Partner) baru beserta MoU berhasil disimpan ke PostgreSQL!');
    }

    /**
     * 8. Alumni Tracking Page (idea_erp_alumni_tracking)
     */
    public function alumni(Request $request)
    {
        $programId = $request->query('program_id');
        $status = $request->query('status');
        $search = $request->query('q');

        $totalAlumni = DB::table('alumni_profiles')->count();
        $employedAlumni = DB::table('alumni_profiles')->where('current_employment_status', 'EMPLOYED')->count();
        $idCountryId = DB::table('countries')->where('iso2', 'ID')->value('id');
        $intlAlumni = DB::table('alumni_profiles')
            ->whereNotNull('current_country_id')
            ->where('current_country_id', '!=', $idCountryId)
            ->count();
        $activeMentors = DB::table('alumni_profiles')->where('is_mentor', true)->count();
        $surveyResponsesCount = DB::table('alumni_survey_responses')->count();

        $alumniList = DB::table('alumni_profiles as ap')
            ->join('students as s', 's.id', '=', 'ap.student_id')
            ->join('persons as p', 'p.id', '=', 's.person_id')
            ->join('programs as pr', 'pr.id', '=', 's.program_id')
            ->leftJoin('partners as pt', 'pt.id', '=', 'ap.current_partner_id')
            ->leftJoin('countries as co', 'co.id', '=', 'ap.current_country_id')
            ->select(
                'ap.id',
                'ap.alumni_no',
                'ap.graduation_date',
                'ap.current_employment_status',
                'ap.current_position',
                'ap.current_salary',
                'ap.currency',
                'ap.is_mentor',
                'ap.last_update_at',
                'p.full_name',
                's.student_no',
                'pr.name as program_name',
                'pt.name as partner_name',
                'co.name as country_name',
                'co.iso2 as country_iso2'
            )
            ->when($programId, fn ($q) => $q->where('s.program_id', $programId))
            ->when($status, fn ($q) => $q->where('ap.current_employment_status', $status))
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('p.full_name', 'ilike', "%{$search}%")
                        ->orWhere('pt.name', 'ilike', "%{$search}%")
                        ->orWhere('ap.current_position', 'ilike', "%{$search}%")
                        ->orWhere('pr.name', 'ilike', "%{$search}%")
                        ->orWhere('co.name', 'ilike', "%{$search}%");
                });
            })
            ->orderBy('ap.id')
            ->get();

        $countryBreakdown = DB::table('countries as co')
            ->leftJoin('alumni_profiles as ap', 'ap.current_country_id', '=', 'co.id')
            ->select(
                'co.id',
                'co.iso2',
                'co.name',
                DB::raw('COUNT(ap.id) as alumni_count')
            )
            ->groupBy('co.id', 'co.iso2', 'co.name')
            ->orderByDesc('alumni_count')
            ->get();

        $programBreakdown = DB::table('programs as pr')
            ->leftJoin('students as s', 's.program_id', '=', 'pr.id')
            ->leftJoin('alumni_profiles as ap', 'ap.student_id', '=', 's.id')
            ->select(
                'pr.id',
                'pr.code',
                'pr.name',
                DB::raw('COUNT(ap.id) as alumni_count')
            )
            ->groupBy('pr.id', 'pr.code', 'pr.name')
            ->orderBy('pr.id')
            ->get();

        $programs = DB::table('programs')->orderBy('id')->get();

        return view('erp.alumni', array_merge($this->sharedData($request), [
            'kpis' => [
                'total_alumni' => $totalAlumni,
                'employed_alumni' => $employedAlumni,
                'intl_alumni' => $intlAlumni,
                'active_mentors' => $activeMentors,
                'survey_responses' => $surveyResponsesCount,
            ],
            'alumniList' => $alumniList,
            'countryBreakdown' => $countryBreakdown,
            'programBreakdown' => $programBreakdown,
            'programs' => $programs,
            'filters' => [
                'program_id' => $programId,
                'status' => $status,
                'q' => $search,
            ],
        ]));
    }

    /**
     * 9. Reports & Analytics Page (idea_erp_reports_analytics)
     */
    public function reports(Request $request)
    {
        $branchId = $request->query('branch_id');
        $programId = $request->query('program_id');
        $module = $request->query('module');
        $search = $request->query('q');

        $exec = DB::table('v_executive_dashboard')->first();

        $programStats = DB::table('programs as pr')
            ->leftJoin('students as s', 's.program_id', '=', 'pr.id')
            ->leftJoin('placements as pl', 'pl.student_id', '=', 's.id')
            ->select(
                'pr.id',
                'pr.code',
                'pr.name',
                DB::raw('COUNT(DISTINCT s.id) as total_students'),
                DB::raw("COUNT(DISTINCT s.id) FILTER (WHERE s.student_status = 'GRADUATED') as graduated_students"),
                DB::raw("COUNT(DISTINCT s.id) FILTER (WHERE s.student_status = 'ACTIVE') as active_students"),
                DB::raw('COUNT(DISTINCT pl.id) as placed_students')
            )
            ->groupBy('pr.id', 'pr.code', 'pr.name')
            ->orderBy('pr.id')
            ->get();

        $scheduledReports = DB::table('scheduled_reports as sr')
            ->join('report_definitions as rd', 'rd.id', '=', 'sr.report_definition_id')
            ->join('users as u', 'u.id', '=', 'sr.owner_user_id')
            ->leftJoin('persons as p', 'p.id', '=', 'u.person_id')
            ->select(
                'sr.id',
                'sr.schedule_expression',
                'sr.delivery_channel',
                'sr.is_active',
                'sr.next_run_at',
                'rd.code as report_code',
                'rd.name as report_name',
                'rd.module',
                'p.full_name as owner_name'
            )
            ->orderBy('sr.id')
            ->get();

        $reports = DB::table('report_definitions as rd')
            ->leftJoin('scheduled_reports as sr', 'sr.report_definition_id', '=', 'rd.id')
            ->leftJoin('users as u', 'u.id', '=', 'sr.owner_user_id')
            ->leftJoin('persons as p', 'p.id', '=', 'u.person_id')
            ->leftJoin('positions as pos', 'pos.id', '=', 'u.position_id')
            ->select(
                'rd.id',
                'rd.code',
                'rd.name',
                'rd.module',
                'rd.description',
                'rd.default_format',
                'p.full_name as owner_name',
                'pos.name as owner_position',
                'sr.next_run_at'
            )
            ->when($module, fn ($q) => $q->where('rd.module', $module))
            ->when($search, function ($q) use ($search) {
                $q->where(function ($sub) use ($search) {
                    $sub->where('rd.name', 'ilike', "%{$search}%")
                        ->orWhere('rd.module', 'ilike', "%{$search}%")
                        ->orWhere('rd.code', 'ilike', "%{$search}%");
                });
            })
            ->orderBy('rd.id')
            ->get();

        $branches = DB::table('branches')->orderBy('id')->get();
        $programs = DB::table('programs')->orderBy('id')->get();

        return view('erp.reports', array_merge($this->sharedData($request), [
            'exec' => $exec,
            'programStats' => $programStats,
            'scheduledReports' => $scheduledReports,
            'reports' => $reports,
            'branches' => $branches,
            'programs' => $programs,
            'filters' => [
                'branch_id' => $branchId,
                'program_id' => $programId,
                'module' => $module,
                'q' => $search,
            ],
        ]));
    }

    /**
     * Export CSV Data from PostgreSQL & Log into export_logs (GET /reports/export/{type})
     */
    public function exportReport(Request $request, ?string $type = null): StreamedResponse
    {
        $type = $type ?: $request->query('type', 'executive');
        $userId = DB::table('users')->orderBy('id')->value('id');
        $reportDefId = DB::table('report_definitions')
            ->where('code', 'ilike', '%' . substr(strtoupper($type), 0, 3) . '%')
            ->value('id') ?? DB::table('report_definitions')->orderBy('id')->value('id');

        DB::table('export_logs')->insert([
            'report_definition_id' => $reportDefId,
            'requested_by' => $userId,
            'export_format' => 'CSV',
            'parameters' => json_encode(['type' => $type, 'exported_at' => now()->toIso8601String()]),
            'file_url' => "/reports/export/{$type}",
            'status' => 'COMPLETED',
            'requested_at' => now(),
            'completed_at' => now(),
        ]);

        $filename = 'idea_erp_' . strtolower($type) . '_' . date('Ymd_His') . '.csv';

        return response()->streamDownload(function () use ($type) {
            $out = fopen('php://output', 'w');

            if ($type === 'admission' || $type === 'RPT-ADM') {
                fputcsv($out, ['Registration No', 'Full Name', 'Program', 'Branch', 'Channel', 'Status', 'Submitted At']);
                $rows = DB::table('applicants as a')
                    ->join('persons as p', 'p.id', '=', 'a.person_id')
                    ->leftJoin('branches as b', 'b.id', '=', 'a.branch_id')
                    ->leftJoin('applicant_program_choices as apc', function ($join) {
                        $join->on('apc.applicant_id', '=', 'a.id')->where('apc.priority_no', '=', 1);
                    })
                    ->leftJoin('programs as pr', 'pr.id', '=', 'apc.program_id')
                    ->select('a.registration_no', 'p.full_name', 'pr.name as program', 'b.name as branch', 'a.source_channel', 'a.admission_status', 'a.submitted_at')
                    ->orderBy('a.registration_no')
                    ->get();
                foreach ($rows as $r) {
                    fputcsv($out, [(array) $r][0]);
                }
            } elseif ($type === 'finance' || $type === 'RPT-FIN') {
                fputcsv($out, ['Invoice No', 'Student Name', 'Program', 'Invoice Date', 'Due Date', 'Total Amount', 'Paid Amount', 'Outstanding', 'Status']);
                $rows = DB::table('student_invoices as inv')
                    ->join('persons as p', 'p.id', '=', 'inv.person_id')
                    ->leftJoin('students as s', 's.id', '=', 'inv.student_id')
                    ->leftJoin('programs as pr', 'pr.id', '=', 's.program_id')
                    ->select('inv.invoice_no', 'p.full_name', 'pr.name as program', 'inv.invoice_date', 'inv.due_date', 'inv.total_amount', 'inv.paid_amount', 'inv.outstanding_amount', 'inv.status')
                    ->orderBy('inv.invoice_no')
                    ->get();
                foreach ($rows as $r) {
                    fputcsv($out, array_values((array) $r));
                }
            } elseif ($type === 'students' || $type === 'RPT-STD') {
                fputcsv($out, ['Student No', 'Full Name', 'Program', 'Batch', 'Branch', 'Enrollment Date', 'Status']);
                $rows = DB::table('students as s')
                    ->join('persons as p', 'p.id', '=', 's.person_id')
                    ->join('programs as pr', 'pr.id', '=', 's.program_id')
                    ->leftJoin('batches as bt', 'bt.id', '=', 's.batch_id')
                    ->leftJoin('branches as b', 'b.id', '=', 's.branch_id')
                    ->select('s.student_no', 'p.full_name', 'pr.name as program', 'bt.name as batch', 'b.name as branch', 's.enrollment_date', 's.student_status')
                    ->orderBy('s.student_no')
                    ->get();
                foreach ($rows as $r) {
                    fputcsv($out, array_values((array) $r));
                }
            } elseif ($type === 'partners') {
                fputcsv($out, ['Partner Code', 'Partner Name', 'Category', 'Open Job Demands', 'Candidate Applications', 'Successful Placements']);
                $rows = DB::table('v_partner_performance')->orderBy('partner_id')->get();
                foreach ($rows as $r) {
                    fputcsv($out, [$r->code, $r->name, $r->category, $r->open_job_demands, $r->candidate_applications, $r->successful_placements]);
                }
            } else {
                fputcsv($out, ['Student No', 'Full Name', 'Academic Score', 'Competency Score', 'English Score', 'Attendance Score', 'Overall Score', 'Readiness Status']);
                $rows = DB::table('v_student_readiness_latest')->orderBy('student_no')->get();
                foreach ($rows as $r) {
                    fputcsv($out, [$r->student_no, $r->full_name, $r->academic_score, $r->competency_score, $r->english_score, $r->attendance_score, $r->overall_score, $r->readiness_status]);
                }
            }

            fclose($out);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    /**
     * Switch active demo user (POST /switch-user)
     */
    public function switchUser(Request $request)
    {
        $userId = (int) $request->input('user_id');
        if ($userId > 0) {
            $request->session()->put('erp_user_id', $userId);
        }
        return back()->with('success', 'Profil pengguna aktif berhasil diganti!');
    }
}
