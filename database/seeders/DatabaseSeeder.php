<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (DB::table('companies')->count() === 0) {
            $seedSql = file_get_contents(database_path('sql/idea_erp_postgresql_seed.sql'));
            DB::unprepared($seedSql);
        }

        // Ensure all dummy users have a valid bcrypt password ('password')
        $defaultHash = Hash::make('password');
        DB::table('users')
            ->where('password_hash', 'DUMMY_REPLACE_WITH_APP_HASH')
            ->update(['password_hash' => $defaultHash]);

        $this->seedExtendedData();
    }

    /**
     * Enrich the base PostgreSQL seed with additional records across all 9 ERP modules
     * so every chart, pipeline stage, program breakdown, and table has rich relational data.
     */
    protected function seedExtendedData(): void
    {
        $companyId = DB::table('companies')->where('code', 'IDEA')->value('id');
        if (!$companyId) {
            return;
        }

        // 1. Additional Countries & Cities
        $countries = [
            ['iso2' => 'AU', 'iso3' => 'AUS', 'name' => 'Australia', 'phone_code' => '+61'],
            ['iso2' => 'US', 'iso3' => 'USA', 'name' => 'United States', 'phone_code' => '+1'],
            ['iso2' => 'GB', 'iso3' => 'GBR', 'name' => 'United Kingdom', 'phone_code' => '+44'],
            ['iso2' => 'FR', 'iso3' => 'FRA', 'name' => 'France', 'phone_code' => '+33'],
            ['iso2' => 'TH', 'iso3' => 'THA', 'name' => 'Thailand', 'phone_code' => '+66'],
        ];
        foreach ($countries as $country) {
            DB::table('countries')->updateOrInsert(['iso2' => $country['iso2']], $country);
        }

        $idCountry = DB::table('countries')->where('iso2', 'ID')->value('id');
        $Provinces = [
            ['country_id' => $idCountry, 'code' => 'JATIM', 'name' => 'Jawa Timur'],
            ['country_id' => $idCountry, 'code' => 'DIY', 'name' => 'DI Yogyakarta'],
        ];
        foreach ($Provinces as $prov) {
            DB::table('provinces')->updateOrInsert(
                ['country_id' => $prov['country_id'], 'name' => $prov['name']],
                $prov
            );
        }

        $cities = [
            ['country_id' => $idCountry, 'province_id' => DB::table('provinces')->where('code', 'JATIM')->value('id'), 'code' => 'SBY', 'name' => 'Surabaya'],
            ['country_id' => $idCountry, 'province_id' => DB::table('provinces')->where('code', 'DIY')->value('id'), 'code' => 'YOG', 'name' => 'Yogyakarta'],
            ['country_id' => DB::table('countries')->where('iso2', 'JP')->value('id'), 'province_id' => null, 'code' => 'OSA', 'name' => 'Osaka'],
            ['country_id' => DB::table('countries')->where('iso2', 'TH')->value('id'), 'province_id' => null, 'code' => 'BKK', 'name' => 'Bangkok'],
            ['country_id' => DB::table('countries')->where('iso2', 'GB')->value('id'), 'province_id' => null, 'code' => 'LON', 'name' => 'London'],
            ['country_id' => DB::table('countries')->where('iso2', 'AU')->value('id'), 'province_id' => null, 'code' => 'SYD', 'name' => 'Sydney'],
            ['country_id' => DB::table('countries')->where('iso2', 'US')->value('id'), 'province_id' => null, 'code' => 'NYC', 'name' => 'New York'],
            ['country_id' => DB::table('countries')->where('iso2', 'FR')->value('id'), 'province_id' => null, 'code' => 'PAR', 'name' => 'Paris'],
        ];
        foreach ($cities as $city) {
            DB::table('cities')->updateOrInsert(
                ['country_id' => $city['country_id'], 'name' => $city['name']],
                $city
            );
        }

        // 2. Additional Branches (Surabaya & Yogyakarta)
        $academyBuId = DB::table('business_units')->where('company_id', $companyId)->where('code', 'ACADEMY')->value('id');
        $extraBranches = [
            ['company_id' => $companyId, 'business_unit_id' => $academyBuId, 'code' => 'SBY', 'name' => 'Surabaya Campus', 'city_name' => 'Surabaya', 'province_name' => 'Jawa Timur', 'is_active' => true],
            ['company_id' => $companyId, 'business_unit_id' => $academyBuId, 'code' => 'YOG', 'name' => 'Yogyakarta Campus', 'city_name' => 'Yogyakarta', 'province_name' => 'DI Yogyakarta', 'is_active' => true],
        ];
        foreach ($extraBranches as $b) {
            DB::table('branches')->updateOrInsert(['company_id' => $companyId, 'code' => $b['code']], $b);
        }

        $jktBranchId = DB::table('branches')->where('code', 'JKT')->value('id');
        $baliBranchId = DB::table('branches')->where('code', 'BALI')->value('id');
        $sbyBranchId = DB::table('branches')->where('code', 'SBY')->value('id');
        $yogBranchId = DB::table('branches')->where('code', 'YOG')->value('id');
        $metroBranchId = DB::table('branches')->where('code', 'METRO')->value('id');

        // 3. Additional Intakes, Batches, Classes & Subjects
        $intakes = [
            ['company_id' => $companyId, 'branch_id' => $baliBranchId, 'code' => 'INT-BALI-2609', 'name' => 'September 2026 Bali', 'registration_open' => '2026-04-01', 'registration_close' => '2026-08-31', 'start_date' => '2026-09-07', 'status' => 'OPEN'],
            ['company_id' => $companyId, 'branch_id' => $jktBranchId, 'code' => 'INT-JKT-2605', 'name' => 'Mei 2026 Jakarta', 'registration_open' => '2026-01-01', 'registration_close' => '2026-04-30', 'start_date' => '2026-05-04', 'status' => 'OPEN'],
        ];
        foreach ($intakes as $intake) {
            DB::table('admission_intakes')->updateOrInsert(['code' => $intake['code']], $intake);
        }
        $jktIntakeId = DB::table('admission_intakes')->where('code', 'INT-JKT-2609')->value('id');

        $progMap = DB::table('programs')->pluck('id', 'code');
        $alyaUserId = DB::table('users')->where('username', 'alya.academic')->value('id');
        $sariUserId = DB::table('users')->where('username', 'sari.admin')->value('id');
        $rizkyUserId = DB::table('users')->where('username', 'rizky.finance')->value('id');
        $budiUserId = DB::table('users')->where('username', 'budi.assessment')->value('id');
        $dimasUserId = DB::table('users')->where('username', 'dimas.placement')->value('id');

        $extraBatches = [
            ['program_id' => $progMap['CRUISE'], 'intake_id' => $jktIntakeId, 'branch_id' => $jktBranchId, 'code' => 'CRUISE-JKT-2609', 'name' => 'Cruise Jakarta Sep 2026', 'start_date' => '2026-09-07', 'end_date' => '2027-03-06', 'capacity' => 30, 'status' => 'ACTIVE'],
            ['program_id' => $progMap['BUS'], 'intake_id' => $jktIntakeId, 'branch_id' => $jktBranchId, 'code' => 'BUS-JKT-2609', 'name' => 'Business Jakarta Sep 2026', 'start_date' => '2026-09-07', 'end_date' => '2027-03-06', 'capacity' => 30, 'status' => 'ACTIVE'],
            ['program_id' => $progMap['LANG'], 'intake_id' => $jktIntakeId, 'branch_id' => $jktBranchId, 'code' => 'LANG-JKT-2609', 'name' => 'Language Jakarta Sep 2026', 'start_date' => '2026-09-07', 'end_date' => '2026-12-06', 'capacity' => 25, 'status' => 'ACTIVE'],
        ];
        foreach ($extraBatches as $batch) {
            DB::table('batches')->updateOrInsert(['code' => $batch['code']], $batch);
        }

        $batchMap = DB::table('batches')->pluck('id', 'code');
        $extraClasses = [
            ['batch_id' => $batchMap['CRUISE-JKT-2609'], 'code' => 'CLS-CRUISE-A', 'name' => 'Cruise Cabin A', 'room_name' => 'Cabin Simulator', 'capacity' => 30, 'homeroom_user_id' => $alyaUserId, 'status' => 'ACTIVE'],
            ['batch_id' => $batchMap['BUS-JKT-2609'], 'code' => 'CLS-BUS-A', 'name' => 'Business A', 'room_name' => 'Room 305', 'capacity' => 30, 'homeroom_user_id' => $alyaUserId, 'status' => 'ACTIVE'],
            ['batch_id' => $batchMap['LANG-JKT-2609'], 'code' => 'CLS-LANG-A', 'name' => 'Language A', 'room_name' => 'Lab Language', 'capacity' => 25, 'homeroom_user_id' => $alyaUserId, 'status' => 'ACTIVE'],
        ];
        foreach ($extraClasses as $cls) {
            DB::table('classes')->updateOrInsert(['code' => $cls['code']], $cls);
        }
        $classMap = DB::table('classes')->pluck('id', 'code');

        // Additional subjects & weekly schedules
        $extraSubjects = [
            ['code' => 'FNB-SVC', 'name' => 'F&B Service', 'subject_type' => 'PRACTICAL'],
            ['code' => 'JPN-LANG', 'name' => 'Japanese Language', 'subject_type' => 'THEORY'],
        ];
        foreach ($extraSubjects as $sub) {
            DB::table('subjects')->updateOrInsert(['code' => $sub['code']], $sub);
        }
        $subjectMap = DB::table('subjects')->pluck('id', 'code');

        $weeklySchedules = [
            ['class_id' => $classMap['CLS-CUL-A'], 'subject_id' => $subjectMap['KITCHEN'], 'trainer_user_id' => $alyaUserId, 'schedule_date' => '2026-10-28', 'start_time' => '10:00:00', 'end_time' => '12:00:00', 'room_name' => 'Kitchen Lab', 'delivery_mode' => 'ONSITE', 'status' => 'SCHEDULED'],
            ['class_id' => $classMap['CLS-HOSP-A'], 'subject_id' => $subjectMap['ENG-COMM'], 'trainer_user_id' => $alyaUserId, 'schedule_date' => '2026-10-28', 'start_time' => '13:00:00', 'end_time' => '15:00:00', 'room_name' => 'Room 201', 'delivery_mode' => 'ONSITE', 'status' => 'SCHEDULED'],
            ['class_id' => $classMap['CLS-HOSP-A'], 'subject_id' => $subjectMap['HOUSEKEEP'], 'trainer_user_id' => $alyaUserId, 'schedule_date' => '2026-10-28', 'start_time' => '15:00:00', 'end_time' => '17:00:00', 'room_name' => 'Lab Hotel', 'delivery_mode' => 'ONSITE', 'status' => 'SCHEDULED'],
            ['class_id' => $classMap['CLS-HOSP-A'], 'subject_id' => $subjectMap['FNB-SVC'], 'trainer_user_id' => $alyaUserId, 'schedule_date' => '2026-10-29', 'start_time' => '08:00:00', 'end_time' => '10:00:00', 'room_name' => 'F&B Lab', 'delivery_mode' => 'ONSITE', 'status' => 'SCHEDULED'],
            ['class_id' => $classMap['CLS-LANG-A'], 'subject_id' => $subjectMap['JPN-LANG'], 'trainer_user_id' => $alyaUserId, 'schedule_date' => '2026-10-30', 'start_time' => '10:00:00', 'end_time' => '12:00:00', 'room_name' => 'Lab Language', 'delivery_mode' => 'ONSITE', 'status' => 'SCHEDULED'],
        ];
        foreach ($weeklySchedules as $sch) {
            $exists = DB::table('schedules')
                ->where('class_id', $sch['class_id'])
                ->where('subject_id', $sch['subject_id'])
                ->where('schedule_date', $sch['schedule_date'])
                ->exists();
            if (!$exists) {
                DB::table('schedules')->insert($sch);
            }
        }

        // 4. Additional Persons, Applicants & Students
        $extraPersons = [
            ['person_code' => 'P007', 'national_id' => '327300000007', 'full_name' => 'Salsabila Putri', 'gender' => 'FEMALE', 'birth_place' => 'Yogyakarta', 'birth_date' => '2007-03-14', 'email' => 'salsabila@example.test', 'phone' => '08120007', 'nationality_country_id' => $idCountry],
            ['person_code' => 'P008', 'national_id' => '327300000008', 'full_name' => 'Reza Andika', 'gender' => 'MALE', 'birth_place' => 'Jakarta', 'birth_date' => '2006-09-21', 'email' => 'reza@example.test', 'phone' => '08120008', 'nationality_country_id' => $idCountry],
            ['person_code' => 'P009', 'national_id' => '327300000009', 'full_name' => 'Michelle Tan', 'gender' => 'FEMALE', 'birth_place' => 'Denpasar', 'birth_date' => '2007-04-11', 'email' => 'michelle@example.test', 'phone' => '08120009', 'nationality_country_id' => $idCountry],
            ['person_code' => 'P010', 'national_id' => '327300000010', 'full_name' => 'Yoga Pratama', 'gender' => 'MALE', 'birth_place' => 'Surabaya', 'birth_date' => '2006-07-05', 'email' => 'yoga@example.test', 'phone' => '08120010', 'nationality_country_id' => $idCountry],
            ['person_code' => 'P011', 'national_id' => '327300000011', 'full_name' => 'Dewi Lestari', 'gender' => 'FEMALE', 'birth_place' => 'Jakarta', 'birth_date' => '2004-06-18', 'email' => 'dewi@example.test', 'phone' => '08120011', 'nationality_country_id' => $idCountry],
            ['person_code' => 'P012', 'national_id' => '327300000012', 'full_name' => 'Bima Santoso', 'gender' => 'MALE', 'birth_place' => 'Surabaya', 'birth_date' => '2004-01-25', 'email' => 'bima@example.test', 'phone' => '08120012', 'nationality_country_id' => $idCountry],
            ['person_code' => 'P013', 'national_id' => '327300000013', 'full_name' => 'Sarah Gabriella', 'gender' => 'FEMALE', 'birth_place' => 'Bandung', 'birth_date' => '2003-11-09', 'email' => 'sarah@example.test', 'phone' => '08120013', 'nationality_country_id' => $idCountry],
            ['person_code' => 'P014', 'national_id' => '327300000014', 'full_name' => 'Kevin Hartono', 'gender' => 'MALE', 'birth_place' => 'Jakarta', 'birth_date' => '2003-08-30', 'email' => 'kevinh@example.test', 'phone' => '08120014', 'nationality_country_id' => $idCountry],
            ['person_code' => 'P015', 'national_id' => '327300000015', 'full_name' => 'Citra Melati', 'gender' => 'FEMALE', 'birth_place' => 'Metro', 'birth_date' => '2005-02-19', 'email' => 'citra@example.test', 'phone' => '08120015', 'nationality_country_id' => $idCountry],
        ];
        foreach ($extraPersons as $p) {
            DB::table('persons')->updateOrInsert(['person_code' => $p['person_code']], $p);
        }
        $personMap = DB::table('persons')->pluck('id', 'person_code');
        $sch1Id = DB::table('schools')->where('code', 'SCH001')->value('id');

        $extraApplicants = [
            ['registration_no' => 'ADM-2026-007', 'person_id' => $personMap['P007'], 'branch_id' => $yogBranchId, 'program_id' => $progMap['BUS'], 'admission_status' => 'REGISTRATION', 'source_channel' => 'INSTAGRAM', 'submitted_at' => '2026-07-07 10:00:00'],
            ['registration_no' => 'ADM-2026-008', 'person_id' => $personMap['P008'], 'branch_id' => $jktBranchId, 'program_id' => $progMap['BUS'], 'admission_status' => 'ENROLLED', 'source_channel' => 'WEBSITE', 'submitted_at' => '2026-07-08 11:00:00'],
            ['registration_no' => 'ADM-2026-009', 'person_id' => $personMap['P009'], 'branch_id' => $baliBranchId, 'program_id' => $progMap['CRUISE'], 'admission_status' => 'VERIFICATION', 'source_channel' => 'TIKTOK', 'submitted_at' => '2026-07-09 14:00:00'],
            ['registration_no' => 'ADM-2026-010', 'person_id' => $personMap['P010'], 'branch_id' => $sbyBranchId, 'program_id' => $progMap['LANG'], 'admission_status' => 'SUBMITTED', 'source_channel' => 'REFERRAL', 'submitted_at' => '2026-07-10 09:30:00'],
        ];
        foreach ($extraApplicants as $app) {
            DB::table('applicants')->updateOrInsert(
                ['registration_no' => $app['registration_no']],
                [
                    'company_id' => $companyId,
                    'branch_id' => $app['branch_id'],
                    'intake_id' => $jktIntakeId,
                    'person_id' => $app['person_id'],
                    'registration_no' => $app['registration_no'],
                    'school_id' => $sch1Id,
                    'graduation_year' => 2026,
                    'source_channel' => $app['source_channel'],
                    'assigned_user_id' => $sariUserId,
                    'admission_status' => $app['admission_status'],
                    'submitted_at' => $app['submitted_at'],
                ]
            );
            $appId = DB::table('applicants')->where('registration_no', $app['registration_no'])->value('id');
            DB::table('applicant_program_choices')->updateOrInsert(
                ['applicant_id' => $appId, 'priority_no' => 1],
                ['program_id' => $app['program_id'], 'branch_id' => $app['branch_id'], 'is_selected' => true]
            );
        }

        // Additional Students across Cruise, Business, Language, Bali, Surabaya, Yogyakarta
        $extraStudents = [
            ['student_no' => 'STD2026005', 'person_id' => $personMap['P005'], 'branch_id' => $metroBranchId, 'program_id' => $progMap['HOSP'], 'batch_id' => $batchMap['HOSP-JKT-2609'], 'class_id' => $classMap['CLS-HOSP-A'], 'enrollment_date' => '2026-09-07', 'student_status' => 'ACTIVE'],
            ['student_no' => 'STD2026006', 'person_id' => $personMap['P008'], 'branch_id' => $jktBranchId, 'program_id' => $progMap['BUS'], 'batch_id' => $batchMap['BUS-JKT-2609'], 'class_id' => $classMap['CLS-BUS-A'], 'enrollment_date' => '2026-09-07', 'student_status' => 'ACTIVE'],
            ['student_no' => 'STD2026007', 'person_id' => $personMap['P009'], 'branch_id' => $baliBranchId, 'program_id' => $progMap['CRUISE'], 'batch_id' => $batchMap['CRUISE-JKT-2609'], 'class_id' => $classMap['CLS-CRUISE-A'], 'enrollment_date' => '2026-09-07', 'student_status' => 'ACTIVE'],
            ['student_no' => 'STD2026008', 'person_id' => $personMap['P010'], 'branch_id' => $sbyBranchId, 'program_id' => $progMap['LANG'], 'batch_id' => $batchMap['LANG-JKT-2609'], 'class_id' => $classMap['CLS-LANG-A'], 'enrollment_date' => '2026-09-07', 'student_status' => 'ACTIVE'],
            ['student_no' => 'STD2025011', 'person_id' => $personMap['P011'], 'branch_id' => $baliBranchId, 'program_id' => $progMap['HOSP'], 'batch_id' => $batchMap['HOSP-JKT-2609'], 'class_id' => $classMap['CLS-HOSP-A'], 'enrollment_date' => '2025-09-07', 'student_status' => 'GRADUATED'],
            ['student_no' => 'STD2025012', 'person_id' => $personMap['P012'], 'branch_id' => $sbyBranchId, 'program_id' => $progMap['CUL'], 'batch_id' => $batchMap['CUL-JKT-2609'], 'class_id' => $classMap['CLS-CUL-A'], 'enrollment_date' => '2025-09-07', 'student_status' => 'GRADUATED'],
            ['student_no' => 'STD2025013', 'person_id' => $personMap['P013'], 'branch_id' => $jktBranchId, 'program_id' => $progMap['CUL'], 'batch_id' => $batchMap['CUL-JKT-2609'], 'class_id' => $classMap['CLS-CUL-A'], 'enrollment_date' => '2025-09-07', 'student_status' => 'GRADUATED'],
            ['student_no' => 'STD2025014', 'person_id' => $personMap['P014'], 'branch_id' => $yogBranchId, 'program_id' => $progMap['BUS'], 'batch_id' => $batchMap['BUS-JKT-2609'], 'class_id' => $classMap['CLS-BUS-A'], 'enrollment_date' => '2025-09-07', 'student_status' => 'GRADUATED'],
        ];
        foreach ($extraStudents as $st) {
            DB::table('students')->updateOrInsert(
                ['person_id' => $st['person_id']],
                array_merge(['company_id' => $companyId], $st)
            );
        }
        $studentMap = DB::table('students')->pluck('id', 'student_no');

        // Readiness scores for extra students
        $extraReadiness = [
            ['student_id' => $studentMap['STD2026005'], 'calculated_date' => '2026-10-26', 'academic_score' => 86, 'competency_score' => 85, 'english_score' => 84, 'attendance_score' => 92, 'attitude_score' => 90, 'document_score' => 95, 'overall_score' => 88, 'readiness_status' => 'PLACEMENT_READY'],
            ['student_id' => $studentMap['STD2026006'], 'calculated_date' => '2026-10-26', 'academic_score' => 83, 'competency_score' => 81, 'english_score' => 85, 'attendance_score' => 90, 'attitude_score' => 88, 'document_score' => 90, 'overall_score' => 86, 'readiness_status' => 'PLACEMENT_READY'],
            ['student_id' => $studentMap['STD2026007'], 'calculated_date' => '2026-10-26', 'academic_score' => 89, 'competency_score' => 87, 'english_score' => 91, 'attendance_score' => 95, 'attitude_score' => 92, 'document_score' => 100, 'overall_score' => 91, 'readiness_status' => 'PLACEMENT_READY'],
            ['student_id' => $studentMap['STD2026008'], 'calculated_date' => '2026-10-26', 'academic_score' => 75, 'competency_score' => 74, 'english_score' => 88, 'attendance_score' => 82, 'attitude_score' => 85, 'document_score' => 80, 'overall_score' => 81, 'readiness_status' => 'ASSESSMENT_READY'],
        ];
        foreach ($extraReadiness as $r) {
            DB::table('readiness_scores')->updateOrInsert(
                ['student_id' => $r['student_id'], 'calculated_date' => $r['calculated_date']],
                $r
            );
        }

        // 5. Additional Invoices & Payments across Programs & Branches
        $extraInvoices = [
            ['invoice_no' => 'INV-004', 'branch_id' => $jktBranchId, 'person_id' => $personMap['P004'], 'student_id' => $studentMap['STD2026004'], 'invoice_date' => '2026-08-01', 'due_date' => '2026-10-28', 'billing_context' => 'STUDENT', 'subtotal' => 18000000, 'total_amount' => 17000000, 'paid_amount' => 17000000, 'outstanding_amount' => 0, 'status' => 'PAID'],
            ['invoice_no' => 'INV-005', 'branch_id' => $metroBranchId, 'person_id' => $personMap['P005'], 'student_id' => $studentMap['STD2026005'], 'invoice_date' => '2026-08-05', 'due_date' => '2026-11-05', 'billing_context' => 'STUDENT', 'subtotal' => 18000000, 'total_amount' => 18000000, 'paid_amount' => 12000000, 'outstanding_amount' => 6000000, 'status' => 'PARTIAL'],
            ['invoice_no' => 'INV-006', 'branch_id' => $jktBranchId, 'person_id' => $personMap['P008'], 'student_id' => $studentMap['STD2026006'], 'invoice_date' => '2026-08-10', 'due_date' => '2026-10-25', 'billing_context' => 'STUDENT', 'subtotal' => 15000000, 'total_amount' => 15000000, 'paid_amount' => 15000000, 'outstanding_amount' => 0, 'status' => 'PAID'],
            ['invoice_no' => 'INV-007', 'branch_id' => $baliBranchId, 'person_id' => $personMap['P009'], 'student_id' => $studentMap['STD2026007'], 'invoice_date' => '2026-08-12', 'due_date' => '2026-10-15', 'billing_context' => 'STUDENT', 'subtotal' => 22000000, 'total_amount' => 22000000, 'paid_amount' => 14000000, 'outstanding_amount' => 8000000, 'status' => 'OVERDUE'],
            ['invoice_no' => 'INV-008', 'branch_id' => $sbyBranchId, 'person_id' => $personMap['P010'], 'student_id' => $studentMap['STD2026008'], 'invoice_date' => '2026-08-15', 'due_date' => '2026-11-15', 'billing_context' => 'STUDENT', 'subtotal' => 12000000, 'total_amount' => 12000000, 'paid_amount' => 9000000, 'outstanding_amount' => 3000000, 'status' => 'PARTIAL'],
        ];
        $bankAccId = DB::table('bank_accounts')->where('account_no', '1234567890')->value('id');
        foreach ($extraInvoices as $inv) {
            DB::table('student_invoices')->updateOrInsert(
                ['invoice_no' => $inv['invoice_no']],
                array_merge(['company_id' => $companyId], $inv)
            );
            $payNo = str_replace('INV-', 'PAY-', $inv['invoice_no']);
            if ($inv['paid_amount'] > 0) {
                DB::table('payments')->updateOrInsert(
                    ['payment_no' => $payNo],
                    [
                        'company_id' => $companyId,
                        'branch_id' => $inv['branch_id'],
                        'person_id' => $inv['person_id'],
                        'payment_no' => $payNo,
                        'payment_date' => '2026-08-20 10:00:00',
                        'payment_method' => 'BANK_TRANSFER',
                        'bank_account_id' => $bankAccId,
                        'amount' => $inv['paid_amount'],
                        'reference_no' => 'TRX-' . $payNo,
                        'verification_status' => 'VERIFIED',
                        'verified_by' => $rizkyUserId,
                        'verified_at' => now(),
                    ]
                );
            }
        }

        // 6. Additional Assessments & Certificates
        $extraAssessments = [
            ['code' => 'ASM-CUL-001', 'program_id' => $progMap['CUL'], 'batch_id' => $batchMap['CUL-JKT-2609'], 'name' => 'Kitchen Test & Food Safety', 'assessment_type' => 'PRACTICAL', 'scheduled_at' => '2026-10-29 13:00:00', 'location' => 'Lab Culinary', 'assessor_user_id' => $budiUserId, 'status' => 'SCHEDULED'],
            ['code' => 'ASM-CRUISE-001', 'program_id' => $progMap['CRUISE'], 'batch_id' => $batchMap['CRUISE-JKT-2609'], 'name' => 'Interview & Cabin Roleplay', 'assessment_type' => 'INTERVIEW', 'scheduled_at' => '2026-10-30 09:00:00', 'location' => 'Room 201', 'assessor_user_id' => $budiUserId, 'status' => 'SCHEDULED'],
            ['code' => 'ASM-BUS-001', 'program_id' => $progMap['BUS'], 'batch_id' => $batchMap['BUS-JKT-2609'], 'name' => 'Hospitality Business Written Test', 'assessment_type' => 'WRITTEN', 'scheduled_at' => '2026-10-31 10:00:00', 'location' => 'Room 305', 'assessor_user_id' => $budiUserId, 'status' => 'SCHEDULED'],
            ['code' => 'ASM-LANG-001', 'program_id' => $progMap['LANG'], 'batch_id' => $batchMap['LANG-JKT-2609'], 'name' => 'Speaking Proficiency Test', 'assessment_type' => 'ORAL', 'scheduled_at' => '2026-11-02 13:00:00', 'location' => 'Lab Language', 'assessor_user_id' => $budiUserId, 'status' => 'SCHEDULED'],
        ];
        foreach ($extraAssessments as $asm) {
            DB::table('assessments')->updateOrInsert(['code' => $asm['code']], $asm);
        }

        $certTypeMap = DB::table('certification_types')->pluck('id', 'code');
        $extraCerts = [
            ['certificate_no' => 'CERT-002', 'student_id' => $studentMap['STD2026002'], 'certification_type_id' => $certTypeMap['BNSP'], 'title' => 'BNSP Front Office Competency', 'issued_by' => 'BNSP Indonesia', 'issue_date' => '2026-10-15', 'expiry_date' => '2029-10-15', 'score' => 92, 'status' => 'ACTIVE'],
            ['certificate_no' => 'CERT-003', 'student_id' => $studentMap['STD2026003'], 'certification_type_id' => $certTypeMap['COMP'], 'title' => 'Culinary Arts Professional Certificate', 'issued_by' => 'IDEA Indonesia', 'issue_date' => '2026-10-18', 'expiry_date' => '2029-10-18', 'score' => 85, 'status' => 'ACTIVE'],
            ['certificate_no' => 'CERT-004', 'student_id' => $studentMap['STD2026004'], 'certification_type_id' => $certTypeMap['LANG'], 'title' => 'Hospitality English Proficiency', 'issued_by' => 'IDEA Language Center', 'issue_date' => '2025-01-10', 'expiry_date' => '2026-11-25', 'score' => 90, 'status' => 'EXPIRING'],
            ['certificate_no' => 'CERT-005', 'student_id' => $studentMap['STD2026006'], 'certification_type_id' => $certTypeMap['COMP'], 'title' => 'Business & Hospitality Management', 'issued_by' => 'IDEA Indonesia', 'issue_date' => '2026-10-20', 'expiry_date' => '2029-10-20', 'score' => 86, 'status' => 'ACTIVE'],
            ['certificate_no' => 'CERT-006', 'student_id' => $studentMap['STD2026007'], 'certification_type_id' => $certTypeMap['BNSP'], 'title' => 'Cruise & Cabin Safety Certificate', 'issued_by' => 'BNSP Indonesia', 'issue_date' => '2026-10-22', 'expiry_date' => '2029-10-22', 'score' => 91, 'status' => 'ACTIVE'],
        ];
        foreach ($extraCerts as $cert) {
            DB::table('certificates')->updateOrInsert(['certificate_no' => $cert['certificate_no']], $cert);
        }

        // 7. Additional Partner Categories, Partners, Contacts, Contracts & Job Demands
        DB::table('partner_categories')->updateOrInsert(['code' => 'CORPORATE'], ['code' => 'CORPORATE', 'name' => 'Corporate']);
        $catMap = DB::table('partner_categories')->pluck('id', 'code');
        $countryMap = DB::table('countries')->pluck('id', 'iso2');
        $cityMap = DB::table('cities')->pluck('id', 'code');

        $extraPartners = [
            ['code' => 'PRT004', 'category_id' => $catMap['CRUISE'], 'name' => 'Royal Caribbean', 'country_id' => $countryMap['US'], 'city_id' => $cityMap['NYC'], 'partnership_status' => 'ACTIVE', 'is_international' => true],
            ['code' => 'PRT005', 'category_id' => $catMap['HOTEL'], 'name' => 'Hilton Hotels & Resorts', 'country_id' => $countryMap['ID'], 'city_id' => $cityMap['DPS'], 'partnership_status' => 'ACTIVE', 'is_international' => false],
            ['code' => 'PRT006', 'category_id' => $catMap['HOTEL'], 'name' => 'Accor Group', 'country_id' => $countryMap['FR'], 'city_id' => $cityMap['PAR'], 'partnership_status' => 'ACTIVE', 'is_international' => true],
            ['code' => 'PRT007', 'category_id' => $catMap['HOTEL'], 'name' => 'AYANA Hospitality', 'country_id' => $countryMap['ID'], 'city_id' => $cityMap['DPS'], 'partnership_status' => 'ACTIVE', 'is_international' => false],
            ['code' => 'PRT008', 'category_id' => $catMap['HOTEL'], 'name' => 'Jumeirah Group', 'country_id' => $countryMap['AE'], 'city_id' => $cityMap['DXB'], 'partnership_status' => 'ACTIVE', 'is_international' => true],
            ['code' => 'PRT009', 'category_id' => $catMap['AGENCY'], 'name' => 'Singapore Airlines', 'country_id' => $countryMap['SG'], 'city_id' => $cityMap['SG'], 'partnership_status' => 'ACTIVE', 'is_international' => true],
            ['code' => 'PRT010', 'category_id' => $catMap['RESTAURANT'], 'name' => 'Pret A Manger', 'country_id' => $countryMap['GB'], 'city_id' => $cityMap['LON'], 'partnership_status' => 'ACTIVE', 'is_international' => true],
            ['code' => 'PRT011', 'category_id' => $catMap['CORPORATE'], 'name' => 'Traveloka Corporate', 'country_id' => $countryMap['ID'], 'city_id' => $cityMap['JKT'], 'partnership_status' => 'ACTIVE', 'is_international' => false],
        ];
        foreach ($extraPartners as $pt) {
            DB::table('partners')->updateOrInsert(
                ['code' => $pt['code']],
                array_merge(['company_id' => $companyId], $pt)
            );
        }
        $partnerMap = DB::table('partners')->pluck('id', 'code');

        $extraContacts = [
            ['partner_id' => $partnerMap['PRT002'], 'name' => 'Yuki Tanaka', 'position' => 'Talent Acquisition', 'email' => 'yuki@fourseasons.test', 'is_primary' => true],
            ['partner_id' => $partnerMap['PRT003'], 'name' => 'Hendra Wijaya', 'position' => 'General Manager', 'email' => 'hendra@aidiagrande.test', 'is_primary' => true],
            ['partner_id' => $partnerMap['PRT004'], 'name' => 'Sarah Chen', 'position' => 'Crew Recruitment Lead', 'email' => 'sarah@rccl.test', 'is_primary' => true],
            ['partner_id' => $partnerMap['PRT005'], 'name' => 'Michael Tan', 'position' => 'HR Director', 'email' => 'michael@hilton.test', 'is_primary' => true],
            ['partner_id' => $partnerMap['PRT006'], 'name' => 'Pierre Dubois', 'position' => 'Regional Talent VP', 'email' => 'pierre@accor.test', 'is_primary' => true],
            ['partner_id' => $partnerMap['PRT007'], 'name' => 'Putu Aria', 'position' => 'People & Culture Manager', 'email' => 'putu@ayana.test', 'is_primary' => true],
            ['partner_id' => $partnerMap['PRT008'], 'name' => 'Ahmed Al Farsi', 'position' => 'Hospitality Recruiter', 'email' => 'ahmed@jumeirah.test', 'is_primary' => true],
            ['partner_id' => $partnerMap['PRT009'], 'name' => 'Lim Wei Han', 'position' => 'Cabin Crew Recruitment', 'email' => 'lim@singaporeair.test', 'is_primary' => true],
            ['partner_id' => $partnerMap['PRT010'], 'name' => 'Emma Wilson', 'position' => 'Operations Manager', 'email' => 'emma@pret.test', 'is_primary' => true],
        ];
        foreach ($extraContacts as $ct) {
            DB::table('partner_contacts')->updateOrInsert(
                ['partner_id' => $ct['partner_id'], 'name' => $ct['name']],
                $ct
            );
        }

        $extraContracts = [
            ['contract_no' => 'MOU-FS-2026', 'partner_id' => $partnerMap['PRT002'], 'contract_type' => 'INTERNSHIP', 'title' => 'Program Culinary Internship Tokyo', 'start_date' => '2026-02-01', 'end_date' => '2028-01-31', 'status' => 'ACTIVE'],
            ['contract_no' => 'MOU-RCCL-2026', 'partner_id' => $partnerMap['PRT004'], 'contract_type' => 'PLACEMENT', 'title' => 'Global Cruise Crew Placement', 'start_date' => '2026-01-15', 'end_date' => '2028-01-14', 'status' => 'ACTIVE'],
            ['contract_no' => 'MOU-HILTON-2026', 'partner_id' => $partnerMap['PRT005'], 'contract_type' => 'PLACEMENT', 'title' => 'Perpanjangan Kontrak Penempatan (+2 Tahun)', 'start_date' => '2026-03-01', 'end_date' => '2028-02-28', 'status' => 'ACTIVE'],
            ['contract_no' => 'MOU-ACCOR-2026', 'partner_id' => $partnerMap['PRT006'], 'contract_type' => 'MANAGEMENT_TRAINEE', 'title' => 'Program Management Trainee', 'start_date' => '2026-04-01', 'end_date' => '2026-12-15', 'status' => 'RENEWAL_DUE'],
            ['contract_no' => 'MOU-AYANA-2026', 'partner_id' => $partnerMap['PRT007'], 'contract_type' => 'PLACEMENT', 'title' => 'Penyesuaian Kuota Penempatan Bali', 'start_date' => '2026-04-12', 'end_date' => '2027-12-31', 'status' => 'ACTIVE'],
            ['contract_no' => 'MOU-SIA-2026', 'partner_id' => $partnerMap['PRT009'], 'contract_type' => 'TRAINING', 'title' => 'Program Cabin Crew Training', 'start_date' => '2026-04-15', 'end_date' => '2028-04-14', 'status' => 'ACTIVE'],
        ];
        foreach ($extraContracts as $ctr) {
            DB::table('partner_contracts')->updateOrInsert(['contract_no' => $ctr['contract_no']], $ctr);
        }

        // Additional Job Positions & Demands
        $extraJobPos = [
            ['code' => 'FNB_SPEC', 'name' => 'F&B Service Specialist', 'category' => 'HOTEL'],
            ['code' => 'BIZ_DEV', 'name' => 'Business Development Associate', 'category' => 'BUSINESS'],
        ];
        foreach ($extraJobPos as $jp) {
            DB::table('job_positions')->updateOrInsert(['code' => $jp['code']], $jp);
        }
        $jobPosMap = DB::table('job_positions')->pluck('id', 'code');

        $extraDemands = [
            ['code' => 'JOB-BALI-001', 'partner_id' => $partnerMap['PRT005'], 'job_position_id' => $jobPosMap['FO_ASSOC'], 'title' => 'Front Office Associate Bali', 'country_id' => $countryMap['ID'], 'city_id' => $cityMap['DPS'], 'slots' => 6, 'employment_type' => 'FULL_TIME', 'salary_min' => 6500000, 'salary_max' => 8500000, 'currency' => 'IDR', 'min_english_score' => 75, 'min_competency_score' => 75, 'open_date' => '2026-10-01', 'close_date' => '2026-11-30', 'interview_date' => '2026-11-10', 'status' => 'OPEN'],
            ['code' => 'JOB-SG-002', 'partner_id' => $partnerMap['PRT009'], 'job_position_id' => $jobPosMap['CABIN'], 'title' => 'International Cabin Crew', 'country_id' => $countryMap['SG'], 'city_id' => $cityMap['SG'], 'slots' => 8, 'employment_type' => 'FULL_TIME', 'salary_min' => 3200, 'salary_max' => 4500, 'currency' => 'SGD', 'min_english_score' => 85, 'min_competency_score' => 80, 'open_date' => '2026-10-05', 'close_date' => '2026-12-01', 'interview_date' => '2026-11-12', 'status' => 'IN_PROGRESS'],
            ['code' => 'JOB-US-001', 'partner_id' => $partnerMap['PRT004'], 'job_position_id' => $jobPosMap['CABIN'], 'title' => 'Cruise Hospitality & Cabin Crew', 'country_id' => $countryMap['US'], 'city_id' => $cityMap['NYC'], 'slots' => 10, 'employment_type' => 'CONTRACT', 'salary_min' => 1800, 'salary_max' => 2600, 'currency' => 'USD', 'min_english_score' => 80, 'min_competency_score' => 80, 'open_date' => '2026-10-10', 'close_date' => '2026-12-15', 'interview_date' => '2026-11-18', 'status' => 'OPEN'],
            ['code' => 'JOB-AE-001', 'partner_id' => $partnerMap['PRT008'], 'job_position_id' => $jobPosMap['FNB_SPEC'], 'title' => 'Luxury F&B Service Specialist', 'country_id' => $countryMap['AE'], 'city_id' => $cityMap['DXB'], 'slots' => 5, 'employment_type' => 'FULL_TIME', 'salary_min' => 4500, 'salary_max' => 6500, 'currency' => 'AED', 'min_english_score' => 80, 'min_competency_score' => 82, 'open_date' => '2026-10-12', 'close_date' => '2026-11-28', 'interview_date' => '2026-11-20', 'status' => 'OPEN'],
        ];
        foreach ($extraDemands as $jd) {
            DB::table('job_demands')->updateOrInsert(['code' => $jd['code']], $jd);
        }
        $demandMap = DB::table('job_demands')->pluck('id', 'code');

        // Additional Placement Candidates & Matches
        $extraCandidates = [
            ['student_id' => $studentMap['STD2026003'], 'desired_country_id' => $countryMap['JP'], 'desired_position_id' => $jobPosMap['CUL_TRAINEE'], 'candidate_status' => 'INTERVIEW', 'available_from' => '2026-11-01'],
            ['student_id' => $studentMap['STD2026005'], 'desired_country_id' => $countryMap['ID'], 'desired_position_id' => $jobPosMap['FO_ASSOC'], 'candidate_status' => 'ACCEPTED', 'available_from' => '2026-11-01'],
            ['student_id' => $studentMap['STD2026006'], 'desired_country_id' => $countryMap['SG'], 'desired_position_id' => $jobPosMap['BIZ_DEV'], 'candidate_status' => 'READY', 'available_from' => '2026-11-15'],
            ['student_id' => $studentMap['STD2026007'], 'desired_country_id' => $countryMap['SG'], 'desired_position_id' => $jobPosMap['CABIN'], 'candidate_status' => 'MATCHED', 'available_from' => '2026-11-01'],
        ];
        foreach ($extraCandidates as $cand) {
            $rId = DB::table('readiness_scores')->where('student_id', $cand['student_id'])->value('id');
            DB::table('placement_candidates')->updateOrInsert(
                ['student_id' => $cand['student_id']],
                array_merge($cand, ['readiness_score_id' => $rId])
            );
        }
        $candMap = DB::table('placement_candidates')->pluck('id', 'student_id');

        $extraMatches = [
            ['candidate_id' => $candMap[$studentMap['STD2026003']], 'job_demand_id' => $demandMap['JOB-JP-001'], 'match_score' => 91, 'recommended_by' => 'AI', 'is_shortlisted' => true],
            ['candidate_id' => $candMap[$studentMap['STD2026004']], 'job_demand_id' => $demandMap['JOB-BALI-001'], 'match_score' => 88, 'recommended_by' => 'SYSTEM', 'is_shortlisted' => true],
            ['candidate_id' => $candMap[$studentMap['STD2026007']], 'job_demand_id' => $demandMap['JOB-SG-002'], 'match_score' => 94, 'recommended_by' => 'AI', 'is_shortlisted' => true],
        ];
        foreach ($extraMatches as $m) {
            DB::table('candidate_matches')->updateOrInsert(
                ['candidate_id' => $m['candidate_id'], 'job_demand_id' => $m['job_demand_id']],
                $m
            );
        }

        // 8. Additional Alumni Profiles, Mentors & Engagements
        $extraAlumni = [
            ['alumni_no' => 'ALM2025011', 'student_id' => $studentMap['STD2025011'], 'graduation_date' => '2025-10-20', 'current_employment_status' => 'EMPLOYED', 'current_partner_id' => $partnerMap['PRT002'], 'current_position' => 'Guest Relations Officer', 'current_country_id' => $countryMap['JP'], 'current_salary' => 240000, 'currency' => 'JPY', 'is_mentor' => true],
            ['alumni_no' => 'ALM2025012', 'student_id' => $studentMap['STD2025012'], 'graduation_date' => '2025-10-20', 'current_employment_status' => 'EMPLOYED', 'current_partner_id' => $partnerMap['PRT011'], 'current_position' => 'Hospitality Operations Lead', 'current_country_id' => $countryMap['ID'], 'current_salary' => 14500000, 'currency' => 'IDR', 'is_mentor' => false],
            ['alumni_no' => 'ALM2025013', 'student_id' => $studentMap['STD2025013'], 'graduation_date' => '2025-10-20', 'current_employment_status' => 'EMPLOYED', 'current_partner_id' => $partnerMap['PRT010'], 'current_position' => 'Sous Chef', 'current_country_id' => $countryMap['GB'], 'current_salary' => 2800, 'currency' => 'GBP', 'is_mentor' => true],
            ['alumni_no' => 'ALM2025014', 'student_id' => $studentMap['STD2025014'], 'graduation_date' => '2025-10-20', 'current_employment_status' => 'ENTREPRENEUR', 'current_partner_id' => $partnerMap['PRT006'], 'current_position' => 'Revenue & Business Consultant', 'current_country_id' => $countryMap['AU'], 'current_salary' => 4200, 'currency' => 'AUD', 'is_mentor' => true],
        ];
        foreach ($extraAlumni as $alm) {
            DB::table('alumni_profiles')->updateOrInsert(['alumni_no' => $alm['alumni_no']], $alm);
            $almId = DB::table('alumni_profiles')->where('alumni_no', $alm['alumni_no'])->value('id');
            if ($alm['is_mentor']) {
                DB::table('alumni_mentors')->updateOrInsert(
                    ['alumni_id' => $almId],
                    ['expertise' => $alm['current_position'], 'availability_notes' => 'Available for monthly career coaching', 'mentor_status' => 'ACTIVE']
                );
            }
        }

        // 9. Additional Scheduled Reports
        $rptMap = DB::table('report_definitions')->pluck('id', 'code');
        $extraSchedReports = [
            ['report_definition_id' => $rptMap['RPT-FIN'], 'owner_user_id' => $rizkyUserId, 'schedule_expression' => '0 8 3 * *', 'delivery_channel' => 'EMAIL', 'recipients' => json_encode(['finance@idea-demo.local']), 'parameters' => json_encode(['period' => 'MONTHLY']), 'is_active' => true, 'next_run_at' => '2026-11-03 08:00:00'],
            ['report_definition_id' => $rptMap['RPT-PLC'], 'owner_user_id' => $dimasUserId, 'schedule_expression' => '0 9 28 * *', 'delivery_channel' => 'EMAIL', 'recipients' => json_encode(['placement@idea-demo.local']), 'parameters' => json_encode(['period' => 'MONTHLY']), 'is_active' => true, 'next_run_at' => '2026-11-28 09:00:00'],
            ['report_definition_id' => $rptMap['RPT-ASM'], 'owner_user_id' => $budiUserId, 'schedule_expression' => '0 8 5 * *', 'delivery_channel' => 'EMAIL', 'recipients' => json_encode(['academic@idea-demo.local']), 'parameters' => json_encode(['period' => 'MONTHLY']), 'is_active' => true, 'next_run_at' => '2026-11-05 08:00:00'],
        ];
        foreach ($extraSchedReports as $sr) {
            DB::table('scheduled_reports')->updateOrInsert(
                ['report_definition_id' => $sr['report_definition_id'], 'owner_user_id' => $sr['owner_user_id']],
                $sr
            );
        }
    }
}
