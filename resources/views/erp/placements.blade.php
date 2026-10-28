<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IDEA ERP - Career &amp; Placement</title>
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
  $avatars = [
    'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=100&q=80',
    'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=100&q=80',
    'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80',
    'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=100&q=80',
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
          <a href="{{ route('erp.admission') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="user-plus" class="w-5 h-5"></i><span>Admission</span></a>
          <a href="{{ route('erp.finance') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="coins" class="w-5 h-5"></i><span>Finance</span></a>
          <a href="{{ route('erp.students') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="users" class="w-5 h-5"></i><span>Student Management</span></a>
          <a href="{{ route('erp.assessments') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="file-check-2" class="w-5 h-5"></i><span>Assessment &amp; Certification</span></a>
          <a href="{{ route('erp.placements') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-brand-500 to-amber-500 text-white shadow-md shadow-brand-500/20"><i data-lucide="briefcase" class="w-5 h-5"></i><span>Career &amp; Placement</span></a>
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
          <form action="{{ route('erp.placements') }}" method="GET" class="relative w-full">
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
            <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Career &amp; Placement</h1>
            <p class="text-sm text-slate-600 mt-1">Kelola peluang karir, proses penempatan, dan keberhasilan alumni kami.</p>
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

        <!-- 6 KPI CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="users" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Placement Ready Candidates</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['ready_candidates'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 14% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="briefcase" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Open Vacancies</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['open_vacancies'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 23% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="calendar" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Interviews This Week</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['interviews'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 12% <span class="text-slate-400 font-normal">dari minggu lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="file-check" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Accepted Offers</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['accepted_offers'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 19% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="plane" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">International Placement</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['intl_placements'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 50% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="bar-chart-2" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Placement Rate</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ (int) round($kpis['placement_rate']) }}%</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 6% <span class="text-slate-400 font-normal">dari periode lalu</span></div></div>
          </div>
        </div>

        <!-- MAIN 2 COLUMNS -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
          <!-- Left 7 Cols: Candidate Pipeline + Open Job Vacancies -->
          <div class="lg:col-span-7 space-y-6">
            <!-- Candidate Pipeline -->
            <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
              <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-slate-800 text-base">Candidate Pipeline</h3>
                <span class="text-xs text-slate-500">Tahun akademik 2024/2025 ▾</span>
              </div>
              <div class="grid grid-cols-2 sm:grid-cols-6 gap-2.5 text-center">
                <div class="p-3 rounded-xl bg-orange-50/70 border border-orange-100">
                  <div class="text-xs font-bold text-slate-700">Ready</div>
                  <div class="my-2 flex justify-center text-brand-500"><i data-lucide="users" class="w-6 h-6"></i></div>
                  <div class="text-xl font-extrabold text-slate-900">{{ $pipeline->ready ?? 0 }}</div>
                  <div class="text-[11px] text-slate-500">Kandidat</div>
                </div>
                <div class="p-3 rounded-xl bg-orange-50/90 border border-orange-100">
                  <div class="text-xs font-bold text-slate-700">Matched</div>
                  <div class="my-2 flex justify-center text-brand-500"><i data-lucide="file-text" class="w-6 h-6"></i></div>
                  <div class="text-xl font-extrabold text-slate-900">{{ $pipeline->matched ?? 0 }}</div>
                  <div class="text-[11px] text-slate-500">Kandidat</div>
                  <span class="inline-block mt-1.5 px-2 py-0.5 rounded-full text-[10px] font-bold bg-orange-100 text-brand-600">80%</span>
                </div>
                <div class="p-3 rounded-xl bg-orange-100/60 border border-orange-200">
                  <div class="text-xs font-bold text-slate-700">Submitted</div>
                  <div class="my-2 flex justify-center text-brand-500"><i data-lucide="send" class="w-6 h-6"></i></div>
                  <div class="text-xl font-extrabold text-slate-900">{{ $pipeline->submitted ?? 0 }}</div>
                  <div class="text-[11px] text-slate-500">Kandidat</div>
                  <span class="inline-block mt-1.5 px-2 py-0.5 rounded-full text-[10px] font-bold bg-orange-100 text-brand-600">65%</span>
                </div>
                <div class="p-3 rounded-xl bg-orange-100/80 border border-orange-200">
                  <div class="text-xs font-bold text-slate-700">Interview</div>
                  <div class="my-2 flex justify-center text-brand-500"><i data-lucide="user-check" class="w-6 h-6"></i></div>
                  <div class="text-xl font-extrabold text-slate-900">{{ $pipeline->interview ?? 0 }}</div>
                  <div class="text-[11px] text-slate-500">Kandidat</div>
                  <span class="inline-block mt-1.5 px-2 py-0.5 rounded-full text-[10px] font-bold bg-orange-100 text-brand-600">43%</span>
                </div>
                <div class="p-3 rounded-xl bg-orange-200/60 border border-orange-300">
                  <div class="text-xs font-bold text-slate-700">Accepted</div>
                  <div class="my-2 flex justify-center text-brand-600"><i data-lucide="check-square" class="w-6 h-6"></i></div>
                  <div class="text-xl font-extrabold text-slate-900">{{ $pipeline->offered ?? 0 }}</div>
                  <div class="text-[11px] text-slate-500">Kandidat</div>
                  <span class="inline-block mt-1.5 px-2 py-0.5 rounded-full text-[10px] font-bold bg-orange-100 text-brand-600">26%</span>
                </div>
                <div class="p-3 rounded-xl bg-brand-500 text-white shadow-sm">
                  <div class="text-xs font-bold">Placed</div>
                  <div class="my-2 flex justify-center"><i data-lucide="trophy" class="w-6 h-6"></i></div>
                  <div class="text-xl font-extrabold">{{ $pipeline->placed ?? 0 }}</div>
                  <div class="text-[11px] text-orange-100">Kandidat</div>
                  <span class="inline-block mt-1.5 px-2 py-0.5 rounded-full text-[10px] font-bold bg-white text-brand-600">22%</span>
                </div>
              </div>
            </div>

            <!-- Open Job Vacancies -->
            <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
              <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-slate-800 text-base">Open Job Vacancies</h3>
                <button onclick="document.getElementById('modalAddVacancy').classList.remove('hidden')" class="px-3 py-1.5 bg-brand-500 text-white font-bold text-xs rounded-xl">+ Tambah Lowongan</button>
              </div>
              <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                  <thead>
                    <tr class="bg-[#F5F1E8] text-slate-600 font-bold">
                      <th class="py-2.5 px-3 rounded-l-lg">No</th><th class="py-2.5 px-3">Company</th><th class="py-2.5 px-3">Position</th><th class="py-2.5 px-3">Country / City</th><th class="py-2.5 px-3 text-center">Slots</th><th class="py-2.5 px-3 text-center">Candidate Matched</th><th class="py-2.5 px-3">Interview Date</th><th class="py-2.5 px-3 rounded-r-lg text-center">Status</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-slate-100 font-medium">
                    @foreach($vacancies as $idx => $vac)
                    <tr>
                      <td class="py-3 px-3">{{ $idx + 1 }}</td>
                      <td class="py-3 px-3 font-bold">{{ $vac->partner_name }}</td>
                      <td class="py-3 px-3">{{ $vac->title }}</td>
                      <td class="py-3 px-3">{{ $vac->city_name ? $vac->city_name . ', ' . $vac->country_name : $vac->country_name }}</td>
                      <td class="py-3 px-3 text-center">{{ $vac->slots }}</td>
                      <td class="py-3 px-3 text-center">{{ max(2, $vac->matched_count) }}</td>
                      <td class="py-3 px-3">{{ $vac->interview_date ? date('d M Y', strtotime($vac->interview_date)) : '-' }}</td>
                      <td class="py-3 px-3 text-center">
                        @if($vac->status === 'OPEN')
                          <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-600 font-bold">Open</span>
                        @else
                          <span class="px-2.5 py-0.5 rounded-full bg-orange-50 text-brand-600 font-bold">In Progress</span>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Right 5 Cols: Top Matching Candidates + Recent Placement Activity -->
          <div class="lg:col-span-5 space-y-6">
            <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
              <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-slate-800 text-base">Top Matching Candidates</h3>
                <a href="{{ route('erp.students') }}" class="text-xs font-bold text-brand-600">Lihat Semua →</a>
              </div>
              <div class="space-y-4">
                @foreach($matchingCandidates as $idx => $cand)
                <div class="flex items-center justify-between gap-3 pb-3 border-b border-slate-100 last:border-b-0 last:pb-0">
                  <div class="flex items-start gap-3">
                    <img src="{{ $avatars[$idx % count($avatars)] }}" class="w-10 h-10 rounded-full object-cover" />
                    <div>
                      <div class="text-xs font-bold text-slate-900">{{ $cand->full_name }}</div>
                      <div class="text-[11px] text-slate-500 mb-1.5">{{ $cand->program_name }}</div>
                      <div class="flex flex-wrap gap-1 text-[10px]">
                        <span class="px-2 py-0.5 rounded bg-blue-50 text-blue-600">{{ $cand->desired_position ?? 'Hospitality' }}</span>
                        <span class="px-2 py-0.5 rounded bg-emerald-50 text-emerald-600">{{ $cand->desired_country ?? 'Global' }}</span>
                        <span class="px-2 py-0.5 rounded bg-sky-50 text-sky-600">{{ $cand->candidate_status }}</span>
                      </div>
                    </div>
                  </div>
                  <div class="flex items-center gap-3">
                    <div class="text-right"><div class="text-sm font-extrabold text-brand-600">{{ (int) round($cand->match_score) }}%</div><div class="text-[10px] text-slate-400">Match</div></div>
                    <a href="{{ route('erp.students', ['q' => $cand->student_no]) }}" class="px-3 py-1.5 rounded-xl bg-orange-50 text-brand-600 text-xs font-bold">View</a>
                  </div>
                </div>
                @endforeach
              </div>
            </div>

            <!-- Recent Placement Activity -->
            <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
              <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-slate-800 text-base">Recent Placement Activity</h3>
                <a href="{{ route('erp.reports') }}" class="text-xs font-bold text-brand-600">Lihat Semua →</a>
              </div>
              <div class="space-y-3.5 text-xs">
                <div class="flex justify-between"><div><b>Andi Wijaya</b> telah ditempatkan di <b>Marriott Singapore</b><div class="text-slate-500">Hotel Management Trainee</div></div><span class="text-slate-400">10:24</span></div>
                <div class="flex justify-between"><div><b>Surat penawaran diterima oleh Siti Rahma</b><div class="text-slate-500">Culinary Trainee – Four Seasons Tokyo</div></div><span class="text-slate-400">09:18</span></div>
                <div class="flex justify-between"><div><b>Wawancara selesai untuk 8 kandidat</b><div class="text-slate-500">Cabin Crew – Singapore Airlines</div></div><span class="text-slate-400">Kemarin 16:42</span></div>
                <div class="flex justify-between"><div><b>12 kandidat disubmit ke Hilton Hotels</b><div class="text-slate-500">Front Office Associate – Bali</div></div><span class="text-slate-400">Kemarin 14:10</span></div>
                <div class="flex justify-between"><div><b>Lowongan baru ditambahkan</b><div class="text-slate-500">F&amp;B Service – Hyatt Regency Jakarta</div></div><span class="text-slate-400">19 Apr 11:36</span></div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- Modal Tambah Vacancy -->
  <div id="modalAddVacancy" class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-md overflow-hidden">
      <div class="p-4 border-b border-slate-100 flex items-center justify-between">
        <h3 class="text-sm font-extrabold text-slate-900">Tambah Job Demand Baru</h3>
        <button onclick="document.getElementById('modalAddVacancy').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">✕</button>
      </div>
      <form action="{{ route('erp.placements.vacancy.store') }}" method="POST" class="p-5 space-y-3.5 text-xs">
        @csrf
        <div>
          <label class="block font-semibold text-slate-600 mb-1">Partner Industri</label>
          <select name="partner_id" required class="w-full px-3 py-2 border border-slate-200 rounded-xl">
            @foreach($partnersList as $pt)
              <option value="{{ $pt->id }}">{{ $pt->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block font-semibold text-slate-600 mb-1">Posisi Pekerjaan</label>
          <select name="job_position_id" required class="w-full px-3 py-2 border border-slate-200 rounded-xl">
            @foreach($jobPositions as $jp)
              <option value="{{ $jp->id }}">{{ $jp->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block font-semibold text-slate-600 mb-1">Judul Lowongan</label>
          <input name="title" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" placeholder="Contoh: Guest Service Trainee" />
        </div>
        <div class="grid grid-cols-3 gap-3">
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Negara</label>
            <select name="country_id" required class="w-full px-3 py-2 border border-slate-200 rounded-xl">
              @foreach($countries as $co)
                <option value="{{ $co->id }}">{{ $co->name }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Kuota Slot</label>
            <input name="slots" type="number" value="5" min="1" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" />
          </div>
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Tgl Interview</label>
            <input name="interview_date" type="date" value="{{ date('Y-m-d', strtotime('+14 days')) }}" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" />
          </div>
        </div>
        <div class="pt-2 flex justify-end gap-2">
          <button type="button" onclick="document.getElementById('modalAddVacancy').classList.add('hidden')" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 font-semibold">Batal</button>
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
