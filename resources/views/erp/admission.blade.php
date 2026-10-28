<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IDEA ERP - Admission Management</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
          colors: {
            brand: { 50: '#FFF7ED', 100: '#FFEDD5', 500: '#F97316', 600: '#EA580C' }
          }
        }
      }
    }
  </script>
  <style>
    body { background-color: #FAF6F0; color: #1E293B; }
    .custom-shadow { box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.04), 0 1px 3px -1px rgba(0, 0, 0, 0.02); }
  </style>
</head>
@php
  $totalApp = max(1, (int) ($pipelineSummary->total_applicants ?? 0));
  $verifiedApp = (int) ($pipelineSummary->verified_or_beyond ?? 0);
  $interviewApp = (int) ($pipelineSummary->interview_or_beyond ?? 0);
  $acceptedApp = (int) ($pipelineSummary->accepted_or_beyond ?? 0);
  $regApp = (int) (($statusCounts['REGISTRATION'] ?? 0) + ($statusCounts['ENROLLED'] ?? 0));
  $enrolledApp = (int) ($pipelineSummary->enrolled ?? 0);
  $avatars = [
    'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=80&q=80',
    'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
    'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80',
    'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
    'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
    'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=80&q=80',
    'https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=crop&w=80&q=80',
    'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?auto=format&fit=crop&w=80&q=80',
  ];
@endphp
<body class="antialiased">
  <div class="flex min-h-screen relative">
    <div id="sidebarOverlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"></div>

    <!-- SIDEBAR -->
    <aside id="sidebar" class="w-64 bg-[#F7F3EB] border-r border-[#EBE5DA] flex flex-col justify-between fixed lg:sticky top-0 h-screen z-50 transition-transform duration-300 -translate-x-full lg:translate-x-0 shrink-0 select-none overflow-y-auto">
      <div>
        <div class="h-20 px-6 flex items-center justify-between border-b border-[#EBE5DA]/60">
          <a href="{{ route('erp.dashboard') }}" class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-brand-600 to-amber-400 flex items-center justify-center shadow-sm">
              <div class="w-4 h-4 rounded-full bg-[#F7F3EB]"></div>
            </div>
            <div>
              <div class="font-extrabold text-lg tracking-tight text-slate-900 leading-none">IDEA ERP</div>
              <div class="text-[10px] text-slate-500 font-medium leading-tight mt-1">Education for<br>a Brighter Tomorrow</div>
            </div>
          </a>
          <button onclick="toggleSidebar()" class="text-slate-400 hover:text-slate-600"><i data-lucide="chevron-left" class="w-5 h-5"></i></button>
        </div>

        <nav class="p-3.5 space-y-1 text-sm font-semibold">
          <a href="{{ route('erp.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="layout-grid" class="w-5 h-5"></i><span>Dashboard</span></a>
          <a href="{{ route('erp.admission') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-brand-500 to-amber-500 text-white shadow-md shadow-brand-500/20"><i data-lucide="user-plus" class="w-5 h-5"></i><span>Admission</span></a>
          <a href="{{ route('erp.finance') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="coins" class="w-5 h-5"></i><span>Finance</span></a>
          <a href="{{ route('erp.students') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="users" class="w-5 h-5"></i><span>Student Management</span></a>
          <a href="{{ route('erp.assessments') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="file-check-2" class="w-5 h-5"></i><span>Assessment &amp; Certification</span></a>
          <a href="{{ route('erp.placements') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="briefcase" class="w-5 h-5"></i><span>Career &amp; Placement</span></a>
          <a href="{{ route('erp.partners') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="handshake" class="w-5 h-5"></i><span>Partners</span></a>
          <a href="{{ route('erp.alumni') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="graduation-cap" class="w-5 h-5"></i><span>Alumni</span></a>
          <a href="{{ route('erp.reports') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="bar-chart-3" class="w-5 h-5"></i><span>Reports</span></a>
        </nav>
      </div>

      <div class="p-3.5">
        <div class="relative rounded-2xl bg-gradient-to-b from-[#FCEAD2] to-[#F8DEC0] p-4 overflow-hidden border border-amber-200/60">
          <div class="flex justify-center mb-2">
            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300&q=80" alt="Global Talent" class="w-28 h-28 object-cover rounded-full border-4 border-white/80 shadow-sm" />
          </div>
          <h4 class="font-extrabold text-brand-600 text-sm leading-snug">Membangun<br>Talenta Global<br>dari Indonesia</h4>
          <p class="text-[11px] text-slate-600 mt-1.5 leading-relaxed">Pendidikan, peluang dan masa depan yang lebih baik.</p>
          <a href="{{ route('erp.reports') }}" class="mt-3 w-full py-2 px-3 bg-gradient-to-r from-brand-500 to-amber-500 text-white font-bold text-xs rounded-full flex items-center justify-center gap-1.5 shadow-sm">
            <span>Bersama IDEA ERP</span><i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
          </a>
        </div>
      </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col min-w-0">
      <header class="h-20 bg-[#FAF6F0]/90 backdrop-blur-sm sticky top-0 z-30 px-4 lg:px-8 flex items-center justify-between border-b border-[#EBE5DA]/70">
        <div class="flex items-center gap-3 flex-1 max-w-xl">
          <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg bg-white border border-slate-200 text-slate-700"><i data-lucide="menu" class="w-5 h-5"></i></button>
          <form action="{{ route('erp.admission') }}" method="GET" class="relative w-full">
            <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2"></i>
            <input type="text" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Cari data siswa, program, pembayaran, atau lainnya..." class="w-full pl-11 pr-4 py-2.5 text-sm bg-[#F3EFE6] border border-[#E6DFD3] rounded-full focus:outline-none focus:bg-white focus:border-brand-500 transition" />
          </form>
        </div>
        <div class="flex items-center gap-4 ml-4">
          <button class="relative p-2.5 rounded-full bg-white border border-slate-200/80 text-slate-700"><i data-lucide="bell" class="w-5 h-5"></i><span class="w-2.5 h-2.5 bg-brand-500 rounded-full absolute top-1.5 right-1.5 border-2 border-white"></span></button>
          <div class="flex items-center gap-3 pl-2">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&q=80" class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm" />
            <div class="hidden sm:block">
              <div class="text-sm font-bold text-slate-800 leading-none">{{ $currentUser->full_name ?? 'Sari Anggraini' }}</div>
              <div class="text-xs text-slate-500 mt-1">{{ $currentUser->position_name ?? 'Head of Administration' }}</div>
            </div>
            <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 hidden sm:block"></i>
          </div>
        </div>
      </header>

      <!-- HERO -->
      <div class="bg-gradient-to-r from-[#FAF6F0] via-[#FAF6F0]/90 to-[#F3E9D8] border-b border-[#EBE5DA]/60 px-4 lg:px-8 py-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
          <div>
            <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Admission Management</h1>
            <p class="text-sm text-slate-600 mt-1">Kelola proses penerimaan siswa dari pendaftaran hingga enrolment.</p>
          </div>
          <div class="flex items-center gap-8">
            <div class="text-left md:text-right">
              <div class="text-sm font-bold text-slate-800">Senin, 21 Apr 2025</div>
              <div class="text-xs text-slate-500 mt-0.5">Semangat untuk hari yang produktif!</div>
            </div>
            <div class="hidden xl:block pl-6 border-l border-slate-300/80 text-xs font-semibold text-slate-700 leading-snug">
              People<br>Education<br>Opportunities<br><span class="text-brand-600 font-bold">A Brighter Tomorrow</span>
            </div>
          </div>
        </div>
      </div>

      <!-- MAIN -->
      <main class="p-4 lg:p-8 space-y-6 max-w-[1600px] w-full mx-auto">
        @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-2xl text-xs font-semibold flex items-center justify-between custom-shadow">
          <span>{{ session('success') }}</span>
          <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900">✕</button>
        </div>
        @endif

        <!-- 5 KPI CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3.5">
            <div class="w-11 h-11 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="users" class="w-5 h-5"></i></div>
            <div>
              <div class="text-xs text-slate-500 font-medium">Total Applicants</div>
              <div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ number_format($pipelineSummary->total_applicants ?? 0, 0, ',', '.') }}</div>
              <div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 12% <span class="text-slate-400 font-normal">dari periode lalu</span></div>
            </div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3.5">
            <div class="w-11 h-11 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="file-check" class="w-5 h-5"></i></div>
            <div>
              <div class="text-xs text-slate-500 font-medium">Verified</div>
              <div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ number_format($verifiedApp, 0, ',', '.') }}</div>
              <div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 18% <span class="text-slate-400 font-normal">dari periode lalu</span></div>
            </div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3.5">
            <div class="w-11 h-11 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="calendar-clock" class="w-5 h-5"></i></div>
            <div>
              <div class="text-xs text-slate-500 font-medium">Interview Scheduled</div>
              <div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ number_format($interviewApp, 0, ',', '.') }}</div>
              <div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 14% <span class="text-slate-400 font-normal">dari periode lalu</span></div>
            </div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3.5">
            <div class="w-11 h-11 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="user-check" class="w-5 h-5"></i></div>
            <div>
              <div class="text-xs text-slate-500 font-medium">Accepted</div>
              <div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ number_format($acceptedApp, 0, ',', '.') }}</div>
              <div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 20% <span class="text-slate-400 font-normal">dari periode lalu</span></div>
            </div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3.5">
            <div class="w-11 h-11 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="graduation-cap" class="w-5 h-5"></i></div>
            <div>
              <div class="text-xs text-slate-500 font-medium">Enrolled</div>
              <div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ number_format($enrolledApp, 0, ',', '.') }}</div>
              <div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 25% <span class="text-slate-400 font-normal">dari periode lalu</span></div>
            </div>
          </div>
        </div>

        <!-- MAIN GRID: LEFT (PIPELINE + FILTER + TABLE) & RIGHT (INTERVIEWS + ACTIVITY) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
          <!-- Left 8 Cols -->
          <div class="lg:col-span-8 space-y-6">
            <!-- Proses Admission Stepper -->
            <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
              <div class="flex items-center justify-between mb-5">
                <h3 class="font-bold text-slate-800 text-base">Proses Admission</h3>
                <button onclick="document.getElementById('modalAddApplicant').classList.remove('hidden')" class="px-3.5 py-2 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-xl shadow-sm">+ Tambah Applicant</button>
              </div>
              <div class="grid grid-cols-2 sm:grid-cols-6 gap-4 items-center text-center relative">
                <div class="flex flex-col items-center">
                  <div class="w-14 h-14 rounded-full bg-brand-50 border border-brand-100 text-brand-500 flex items-center justify-center mb-2"><i data-lucide="file-text" class="w-6 h-6"></i></div>
                  <div class="text-xs font-semibold text-slate-600">Submitted</div>
                  <div class="text-lg font-extrabold text-slate-900">{{ $pipelineSummary->total_applicants ?? 0 }}</div>
                  <div class="text-[11px] text-slate-400">(100%)</div>
                </div>
                <div class="flex flex-col items-center">
                  <div class="w-14 h-14 rounded-full bg-brand-50 border border-brand-100 text-brand-500 flex items-center justify-center mb-2"><i data-lucide="shield-check" class="w-6 h-6"></i></div>
                  <div class="text-xs font-semibold text-slate-600">Verification</div>
                  <div class="text-lg font-extrabold text-slate-900">{{ $verifiedApp }}</div>
                  <div class="text-[11px] text-slate-400">({{ round(($verifiedApp / $totalApp) * 100) }}%)</div>
                </div>
                <div class="flex flex-col items-center">
                  <div class="w-14 h-14 rounded-full bg-brand-50 border border-brand-100 text-brand-500 flex items-center justify-center mb-2"><i data-lucide="calendar" class="w-6 h-6"></i></div>
                  <div class="text-xs font-semibold text-slate-600">Interview</div>
                  <div class="text-lg font-extrabold text-slate-900">{{ $interviewApp }}</div>
                  <div class="text-[11px] text-slate-400">({{ round(($interviewApp / $totalApp) * 100) }}%)</div>
                </div>
                <div class="flex flex-col items-center">
                  <div class="w-14 h-14 rounded-full bg-brand-50 border border-brand-100 text-brand-500 flex items-center justify-center mb-2"><i data-lucide="user-check" class="w-6 h-6"></i></div>
                  <div class="text-xs font-semibold text-slate-600">Accepted</div>
                  <div class="text-lg font-extrabold text-slate-900">{{ $acceptedApp }}</div>
                  <div class="text-[11px] text-slate-400">({{ round(($acceptedApp / $totalApp) * 100) }}%)</div>
                </div>
                <div class="flex flex-col items-center">
                  <div class="w-14 h-14 rounded-full bg-brand-50 border border-brand-100 text-brand-500 flex items-center justify-center mb-2"><i data-lucide="clipboard-list" class="w-6 h-6"></i></div>
                  <div class="text-xs font-semibold text-slate-600">Registration</div>
                  <div class="text-lg font-extrabold text-slate-900">{{ $regApp }}</div>
                  <div class="text-[11px] text-slate-400">({{ round(($regApp / $totalApp) * 100) }}%)</div>
                </div>
                <div class="flex flex-col items-center">
                  <div class="w-14 h-14 rounded-full bg-brand-50 border border-brand-100 text-brand-500 flex items-center justify-center mb-2"><i data-lucide="graduation-cap" class="w-6 h-6"></i></div>
                  <div class="text-xs font-semibold text-slate-600">Enrolled</div>
                  <div class="text-lg font-extrabold text-slate-900">{{ $enrolledApp }}</div>
                  <div class="text-[11px] text-slate-400">({{ round(($enrolledApp / $totalApp) * 100) }}%)</div>
                </div>
              </div>
            </div>

            <!-- Filter Pencarian -->
            <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
              <h3 class="font-bold text-slate-800 text-base mb-3.5">Filter Pencarian</h3>
              <form action="{{ route('erp.admission') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3 items-end">
                <div>
                  <label class="text-xs text-slate-500 block mb-1">Intake Period</label>
                  <select name="intake_id" class="w-full px-3 py-2 text-xs font-semibold bg-slate-50 border border-slate-200 rounded-xl">
                    <option value="">Semua Intake</option>
                    @foreach($intakes as $intake)
                    <option value="{{ $intake->id }}" @selected(($filters['intake_id'] ?? '') == $intake->id)>{{ $intake->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div>
                  <label class="text-xs text-slate-500 block mb-1">Branch</label>
                  <select name="branch_id" class="w-full px-3 py-2 text-xs font-semibold bg-slate-50 border border-slate-200 rounded-xl">
                    <option value="">Semua Branch</option>
                    @foreach($branches as $b)
                    <option value="{{ $b->id }}" @selected(($filters['branch_id'] ?? '') == $b->id)>{{ $b->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div>
                  <label class="text-xs text-slate-500 block mb-1">Program</label>
                  <select name="program_id" class="w-full px-3 py-2 text-xs font-semibold bg-slate-50 border border-slate-200 rounded-xl">
                    <option value="">Semua Program</option>
                    @foreach($programs as $pr)
                    <option value="{{ $pr->id }}" @selected(($filters['program_id'] ?? '') == $pr->id)>{{ $pr->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div>
                  <label class="text-xs text-slate-500 block mb-1">Status</label>
                  <select name="status" class="w-full px-3 py-2 text-xs font-semibold bg-slate-50 border border-slate-200 rounded-xl">
                    <option value="">Semua Status</option>
                    @foreach(['SUBMITTED' => 'Submitted', 'VERIFICATION' => 'Verification', 'INTERVIEW' => 'Interview', 'ACCEPTED' => 'Accepted', 'REGISTRATION' => 'Registration', 'ENROLLED' => 'Enrolled'] as $k => $v)
                    <option value="{{ $k }}" @selected(($filters['status'] ?? '') == $k)>{{ $v }}</option>
                    @endforeach
                  </select>
                </div>
                <button type="submit" class="w-full py-2 px-4 bg-brand-500 hover:bg-brand-600 text-white font-bold text-xs rounded-xl flex items-center justify-center gap-1.5 shadow-sm">
                  <i data-lucide="search" class="w-3.5 h-3.5"></i><span>Terapkan Filter</span>
                </button>
              </form>
            </div>

            <!-- Daftar Applicant Table -->
            <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
              <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-slate-800 text-base">Daftar Applicant</h3>
                <span class="text-xs text-slate-400">Menampilkan {{ count($applicants) }} data</span>
              </div>
              <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                  <thead>
                    <tr class="bg-[#F5F1E8] text-slate-600 font-bold">
                      <th class="py-3 px-3 rounded-l-lg"><input type="checkbox" class="rounded" /></th>
                      <th class="py-3 px-3">Registration No</th>
                      <th class="py-3 px-3">Applicant Name</th>
                      <th class="py-3 px-3">Program</th>
                      <th class="py-3 px-3">Branch</th>
                      <th class="py-3 px-3">Interview Date</th>
                      <th class="py-3 px-3 text-center">Document Status</th>
                      <th class="py-3 px-3 text-center">Payment Status</th>
                      <th class="py-3 px-3 text-center">Final Status</th>
                      <th class="py-3 px-3 rounded-r-lg text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-slate-100 text-slate-700 font-medium">
                    @foreach($applicants as $idx => $app)
                    @php
                      $docComplete = in_array($app->admission_status, ['INTERVIEW', 'ACCEPTED', 'REGISTRATION', 'ENROLLED']) || $app->doc_verification_status === 'VERIFIED';
                      $payPaid = in_array($app->invoice_status, ['PAID', 'PARTIAL']) || in_array($app->admission_status, ['INTERVIEW', 'ACCEPTED', 'REGISTRATION', 'ENROLLED']);
                      $statusBadgeMap = [
                          'SUBMITTED' => ['bg-slate-100 text-slate-600', 'Submitted'],
                          'VERIFICATION' => ['bg-orange-50 text-brand-600', 'Verification'],
                          'INTERVIEW' => ['bg-blue-50 text-blue-600', 'Interview'],
                          'ACCEPTED' => ['bg-emerald-50 text-emerald-600', 'Accepted'],
                          'REGISTRATION' => ['bg-purple-50 text-purple-600', 'Registration'],
                          'ENROLLED' => ['bg-emerald-50 text-emerald-700', 'Enrolled'],
                      ];
                      [$badgeClass, $badgeLabel] = $statusBadgeMap[$app->admission_status] ?? ['bg-slate-100 text-slate-600', $app->admission_status];
                    @endphp
                    <tr class="hover:bg-slate-50/80">
                      <td class="py-3 px-3"><input type="checkbox" /></td>
                      <td class="py-3 px-3 text-slate-500">{{ $app->registration_no }}</td>
                      <td class="py-3 px-3 flex items-center gap-2 font-bold text-slate-900">
                        <img src="{{ $avatars[$idx % count($avatars)] }}" class="w-6 h-6 rounded-full object-cover"/>
                        <span>{{ $app->full_name }}</span>
                      </td>
                      <td class="py-3 px-3">{{ $app->program_name ?? 'Hospitality' }}</td>
                      <td class="py-3 px-3">{{ $app->branch_city ?? $app->branch_name }}</td>
                      <td class="py-3 px-3 text-[11px]">
                        @if($app->interview_date)
                          {!! date('d M Y', strtotime($app->interview_date)) . '<br>' . date('H:i', strtotime($app->interview_date)) !!}
                        @else
                          -
                        @endif
                      </td>
                      <td class="py-3 px-3 text-center">
                        @if($docComplete)
                          <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-600 font-semibold">Complete</span>
                        @else
                          <span class="px-2.5 py-0.5 rounded-full bg-red-50 text-red-500 font-semibold">Incomplete</span>
                        @endif
                      </td>
                      <td class="py-3 px-3 text-center">
                        @if($payPaid)
                          <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-600 font-semibold">Paid</span>
                        @else
                          <span class="px-2.5 py-0.5 rounded-full bg-orange-50 text-brand-600 font-semibold">Unpaid</span>
                        @endif
                      </td>
                      <td class="py-3 px-3 text-center">
                        <span class="px-2.5 py-0.5 rounded-full {{ $badgeClass }} font-semibold">{{ $badgeLabel }}</span>
                      </td>
                      <td class="py-3 px-3 text-center">
                        <form action="{{ route('erp.admission.status', $app->id) }}" method="POST" class="inline-flex">
                          @csrf
                          <select name="admission_status" onchange="this.form.submit()" class="text-[11px] bg-slate-50 border border-slate-200 rounded-lg py-1 px-1.5 text-slate-600">
                            @foreach(['SUBMITTED' => 'Submitted', 'VERIFICATION' => 'Verification', 'INTERVIEW' => 'Interview', 'ACCEPTED' => 'Accepted', 'REGISTRATION' => 'Registration', 'ENROLLED' => 'Enrolled'] as $stKey => $stVal)
                              <option value="{{ $stKey }}" @selected($app->admission_status === $stKey)>{{ $stVal }}</option>
                            @endforeach
                          </select>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Right 4 Cols -->
          <div class="lg:col-span-4 space-y-6">
            <!-- Upcoming Interviews -->
            <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
              <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-slate-800 text-base">Upcoming Interviews</h3>
                <a href="{{ route('erp.admission') }}" class="text-xs font-bold text-brand-600 flex items-center gap-1">Lihat Semua <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i></a>
              </div>
              <div class="space-y-3">
                @foreach($upcomingInterviews as $idx => $intv)
                @php
                  $dt = strtotime($intv->scheduled_at);
                  $isOnline = strtoupper($intv->interview_mode ?? '') === 'ONLINE';
                @endphp
                <div class="flex items-center justify-between p-3 rounded-xl bg-[#FAF6F0]/60 border border-slate-100">
                  <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-600 flex flex-col items-center justify-center font-extrabold text-xs"><span>{{ date('d', $dt) }}</span><span class="text-[9px]">{{ date('M', $dt) }}</span></div>
                    <span class="text-xs font-semibold text-slate-600">{{ date('H:i', $dt) }}</span>
                    <img src="{{ $avatars[$idx % count($avatars)] }}" class="w-8 h-8 rounded-full object-cover" />
                    <div><div class="text-xs font-bold text-slate-800">{{ $intv->full_name }}</div><div class="text-[11px] text-slate-500">{{ $intv->program_name ?? 'Hospitality' }}</div></div>
                  </div>
                  @if($isOnline)
                    <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold bg-emerald-50 text-emerald-600">Online</span>
                  @else
                    <span class="px-2.5 py-1 rounded-full text-[11px] font-semibold bg-orange-50 text-brand-600">Onsite</span>
                  @endif
                </div>
                @endforeach
              </div>
            </div>

            <!-- Aktivitas Admission Terbaru -->
            <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
              <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-slate-800 text-base">Aktivitas Admission Terbaru</h3>
                <a href="{{ route('erp.reports') }}" class="text-xs font-bold text-brand-600 flex items-center gap-1">Lihat Semua <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i></a>
              </div>
              <div class="space-y-4">
                <div class="flex items-start justify-between gap-3">
                  <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-full bg-orange-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="user-check" class="w-4 h-4"></i></div>
                    <div><div class="text-xs font-bold text-slate-800">Dokumen diverifikasi</div><div class="text-xs text-slate-500">Putri Ananda (ADM-2026-001)</div></div>
                  </div>
                  <span class="text-[11px] text-slate-400">10:24</span>
                </div>
                <div class="flex items-start justify-between gap-3">
                  <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0"><i data-lucide="calendar" class="w-4 h-4"></i></div>
                    <div><div class="text-xs font-bold text-slate-800">Interview dijadwalkan</div><div class="text-xs text-slate-500">Rizky Pratama (ADM-2026-002)</div></div>
                  </div>
                  <span class="text-[11px] text-slate-400">09:18</span>
                </div>
                <div class="flex items-start justify-between gap-3">
                  <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center shrink-0"><i data-lucide="receipt" class="w-4 h-4"></i></div>
                    <div><div class="text-xs font-bold text-slate-800">Pembayaran diterima</div><div class="text-xs text-slate-500">Rp 12.500.000 dari Alya Ramadhani (ADM-2026-003)</div></div>
                  </div>
                  <span class="text-[11px] text-slate-400 text-right">Kemarin<br>16:42</span>
                </div>
                <div class="flex items-start justify-between gap-3">
                  <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0"><i data-lucide="check-circle-2" class="w-4 h-4"></i></div>
                    <div><div class="text-xs font-bold text-slate-800">Status diubah menjadi Accepted</div><div class="text-xs text-slate-500">Salsabila Putri (ADM-2026-005)</div></div>
                  </div>
                  <span class="text-[11px] text-slate-400 text-right">Kemarin<br>14:10</span>
                </div>
                <div class="flex items-start justify-between gap-3">
                  <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-full bg-orange-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="user-plus" class="w-4 h-4"></i></div>
                    <div><div class="text-xs font-bold text-slate-800">Pendaftar baru</div><div class="text-xs text-slate-500">Fahri Maulana (ADM-2026-006)</div></div>
                  </div>
                  <span class="text-[11px] text-slate-400 text-right">19 Apr<br>11:36</span>
                </div>
                <div class="flex items-start justify-between gap-3">
                  <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-full bg-slate-100 text-slate-700 flex items-center justify-center shrink-0"><i data-lucide="graduation-cap" class="w-4 h-4"></i></div>
                    <div><div class="text-xs font-bold text-slate-800">Siswa berhasil di-enroll</div><div class="text-xs text-slate-500">Reza Andika (ADM-2026-008)</div></div>
                  </div>
                  <span class="text-[11px] text-slate-400 text-right">18 Apr<br>15:20</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- Modal Tambah Applicant -->
  <div id="modalAddApplicant" class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-md overflow-hidden">
      <div class="p-4 border-b border-slate-100 flex items-center justify-between">
        <h3 class="text-sm font-extrabold text-slate-900">Tambah Applicant Baru</h3>
        <button onclick="document.getElementById('modalAddApplicant').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">✕</button>
      </div>
      <form action="{{ route('erp.admission.store') }}" method="POST" class="p-5 space-y-3.5 text-xs">
        @csrf
        <div>
          <label class="block font-semibold text-slate-600 mb-1">Nama Lengkap</label>
          <input name="full_name" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" placeholder="Contoh: Raka Pratama" />
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Email</label>
            <input name="email" type="email" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" placeholder="email@domain.id" />
          </div>
          <div>
            <label class="block font-semibold text-slate-600 mb-1">No. Telepon</label>
            <input name="phone" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" placeholder="0812..." />
          </div>
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Gender</label>
            <select name="gender" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
              <option value="MALE">Laki-laki (MALE)</option>
              <option value="FEMALE">Perempuan (FEMALE)</option>
            </select>
          </div>
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Channel Sumber</label>
            <select name="source_channel" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
              <option value="INSTAGRAM">Instagram</option>
              <option value="TIKTOK">TikTok</option>
              <option value="WEBSITE">Website</option>
              <option value="SCHOOL_EXPO">School Expo</option>
              <option value="REFERRAL">Referral</option>
            </select>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Cabang Tujuan</label>
            <select name="branch_id" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
              @foreach($branches as $b)
                <option value="{{ $b->id }}">{{ $b->name }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Pilihan Program</label>
            <select name="program_id" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
              @foreach($programs as $pr)
                <option value="{{ $pr->id }}">{{ $pr->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div>
          <label class="block font-semibold text-slate-600 mb-1">Status Awal</label>
          <select name="admission_status" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
            <option value="SUBMITTED">Submitted</option>
            <option value="VERIFICATION">Verification</option>
            <option value="INTERVIEW">Interview</option>
            <option value="ACCEPTED">Accepted</option>
          </select>
        </div>
        <div class="pt-2 flex justify-end gap-2">
          <button type="button" onclick="document.getElementById('modalAddApplicant').classList.add('hidden')" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 font-semibold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-brand-500 hover:bg-brand-600 text-white font-semibold shadow-sm">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    lucide.createIcons();
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('-translate-x-full');
      document.getElementById('sidebarOverlay').classList.toggle('hidden');
    }
  </script>
</body>
</html>
