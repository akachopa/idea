<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IDEA ERP - Assessment &amp; Certification</title>
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
          <a href="{{ route('erp.assessments') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-brand-500 to-amber-500 text-white shadow-md shadow-brand-500/20"><i data-lucide="file-check-2" class="w-5 h-5"></i><span>Assessment &amp; Certification</span></a>
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
          <form action="{{ route('erp.assessments') }}" method="GET" class="relative w-full">
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
            <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Assessment &amp; Certification</h1>
            <p class="text-sm text-slate-600 mt-1">Kelola pelaksanaan asesmen, pantau kompetensi siswa, dan terbitkan sertifikasi.</p>
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
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="clipboard-check" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Assessment Completed</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['assessed'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 12% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="award" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Competent</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['competent'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 8% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="alert-triangle" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Need Remedial</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['remedial'] }}</div><div class="text-[11px] font-semibold text-red-500 mt-1">↑ 15% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="briefcase" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Placement Ready</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['placement_ready'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 11% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="file-badge" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Certificates Issued</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['certificates_issued'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 20% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="clock" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Expiring Certificates</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['expiring_certificates'] }}</div><div class="text-[11px] font-semibold text-red-500 mt-1">↑ 25% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
        </div>

        <!-- ROW 2: 3 CHARTS -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
          <!-- Student Readiness Score -->
          <div class="lg:col-span-5 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-base">Student Readiness Score</h3>
              <span class="text-xs text-slate-500">6 bulan terakhir ▾</span>
            </div>
            <svg viewBox="0 0 420 150" class="w-full h-44 overflow-visible">
              <polyline fill="none" stroke="#F97316" stroke-width="2.5" points="40,85 105,78 170,70 235,62 300,55 365,48" />
              <g fill="#F97316" font-size="10" font-weight="bold" text-anchor="middle">
                <circle cx="40" cy="85" r="4"/><text x="40" y="75" fill="#1E293B">62</text>
                <circle cx="105" cy="78" r="4"/><text x="105" y="68" fill="#1E293B">68</text>
                <circle cx="170" cy="70" r="4"/><text x="170" y="60" fill="#1E293B">72</text>
                <circle cx="235" cy="62" r="4"/><text x="235" y="52" fill="#1E293B">76</text>
                <circle cx="300" cy="55" r="4"/><text x="300" y="45" fill="#1E293B">80</text>
                <circle cx="365" cy="48" r="4"/><text x="365" y="38" fill="#1E293B">85</text>
              </g>
              <g fill="#64748B" font-size="10" text-anchor="middle">
                <text x="40" y="140">Jan</text><text x="105" y="140">Feb</text><text x="170" y="140">Mar</text><text x="235" y="140">Apr</text><text x="300" y="140">Mei</text><text x="365" y="140">Jun</text>
              </g>
            </svg>
          </div>

          <!-- Completion per Program -->
          <div class="lg:col-span-4 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-base">Completion per Program</h3>
              <span class="text-xs text-slate-500">Tahun Ini ▾</span>
            </div>
            <div class="space-y-3 text-xs">
              @foreach($programCompletion as $pComp)
              <div class="flex items-center gap-3">
                <span class="w-20 text-slate-600 truncate">{{ explode(' ', $pComp->name)[0] }}</span>
                <div class="flex-1 h-3.5 bg-slate-100 rounded-full"><div class="h-full bg-brand-500 rounded-full" style="width: {{ $pComp->completion_rate }}%"></div></div>
                <b class="w-8 text-right">{{ $pComp->completion_rate }}%</b>
              </div>
              @endforeach
            </div>
          </div>

          <!-- Assessment Status -->
          <div class="lg:col-span-3 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-base">Assessment Status</h3>
              <span class="text-xs text-slate-500">Tahun Ini ▾</span>
            </div>
            <div class="flex items-center justify-between gap-3">
              <div class="w-32 h-32 rounded-full flex items-center justify-center shrink-0" style="background: conic-gradient(#F97316 0% 79%, #FB923C 79% 96%, #CBD5E1 96% 100%);">
                <div class="w-22 h-22 w-[88px] h-[88px] bg-white rounded-full flex flex-col items-center justify-center text-center">
                  <span class="text-base font-extrabold text-slate-900">{{ $kpis['assessed'] }}</span>
                  <span class="text-[10px] text-slate-400">Total<br>Asesmen</span>
                </div>
              </div>
              <div class="space-y-2 text-xs">
                <div><span class="inline-block w-2 h-2 rounded-full bg-emerald-500 mr-1.5"></span><b>Competent</b><div class="text-slate-500 pl-3.5">79% ({{ $kpis['competent'] }})</div></div>
                <div><span class="inline-block w-2 h-2 rounded-full bg-brand-500 mr-1.5"></span><b>Need Remedial</b><div class="text-slate-500 pl-3.5">21% ({{ $kpis['remedial'] }})</div></div>
                <div><span class="inline-block w-2 h-2 rounded-full bg-slate-300 mr-1.5"></span><b>Not Assessed</b><div class="text-slate-500 pl-3.5">4% (1)</div></div>
              </div>
            </div>
          </div>
        </div>

        <!-- ROW 3: UPCOMING SCHEDULE & RECENT ACTIVITIES -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
          <div class="lg:col-span-7 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-base">Upcoming Assessment Schedule</h3>
              <a href="{{ route('erp.assessments') }}" class="text-xs font-bold text-brand-600">Lihat Semua →</a>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-left text-xs">
                <thead>
                  <tr class="bg-[#F5F1E8] text-slate-600 font-bold">
                    <th class="py-2.5 px-3 rounded-l-lg">Tanggal</th><th class="py-2.5 px-3">Waktu</th><th class="py-2.5 px-3">Program</th><th class="py-2.5 px-3">Jenis Asesmen</th><th class="py-2.5 px-3">Lokasi</th><th class="py-2.5 px-3">Peserta</th><th class="py-2.5 px-3 rounded-r-lg text-center">Status</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                  @foreach($upcomingAssessments as $ass)
                  <tr>
                    <td class="py-3 px-3">{{ date('d M Y', strtotime($ass->scheduled_at)) }}</td>
                    <td class="py-3 px-3">{{ date('H:i', strtotime($ass->scheduled_at)) }}</td>
                    <td class="py-3 px-3">{{ $ass->program_name }}</td>
                    <td class="py-3 px-3">{{ $ass->name }}</td>
                    <td class="py-3 px-3">{{ $ass->location }}</td>
                    <td class="py-3 px-3">{{ max(1, $ass->participant_count) }}</td>
                    <td class="py-3 px-3 text-center"><span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-600 font-bold">Sesuai Jadwal</span></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="lg:col-span-5 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-base">Recent Certification Activities</h3>
              <a href="{{ route('erp.reports') }}" class="text-xs font-bold text-brand-600">Lihat Semua →</a>
            </div>
            <div class="space-y-3.5 text-xs">
              <div class="flex justify-between"><div><b>Sertifikat diterbitkan</b><div class="text-slate-500">Andi Wijaya - Hospitality (Competency Certificate)</div></div><span class="text-slate-400">10:24</span></div>
              <div class="flex justify-between"><div><b>Hasil asesmen diinput</b><div class="text-slate-500">Putri Ananda - Culinary</div></div><span class="text-slate-400">09:18</span></div>
              <div class="flex justify-between"><div><b>Status kompetensi diperbarui</b><div class="text-slate-500">Rizky Pratama - Cruise Menjadi Competent</div></div><span class="text-slate-400">Kemarin 16:42</span></div>
              <div class="flex justify-between"><div><b>Sertifikat akan kedaluwarsa</b><div class="text-slate-500">12 sertifikat dalam 30 hari ke depan</div></div><span class="text-slate-400">Kemarin 14:10</span></div>
              <div class="flex justify-between"><div><b>Jadwal asesmen dibuat</b><div class="text-slate-500">Assessment Hospitality - 22 Apr 2025</div></div><span class="text-slate-400">19 Apr 11:36</span></div>
            </div>
          </div>
        </div>

        <!-- ROW 4: DAFTAR SERTIFIKASI -->
        <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
          <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
            <h3 class="font-bold text-slate-800 text-base">Daftar Sertifikasi</h3>
            <form action="{{ route('erp.assessments') }}" method="GET" class="flex flex-wrap items-center gap-2 text-xs">
              <select name="program_id" onchange="this.form.submit()" class="px-3 py-2 border border-slate-200 rounded-xl bg-slate-50">
                <option value="">Semua Program</option>
                @foreach($programs as $pr)
                <option value="{{ $pr->id }}" @selected(($filters['program_id'] ?? '') == $pr->id)>{{ $pr->name }}</option>
                @endforeach
              </select>
              <select name="cert_type_id" onchange="this.form.submit()" class="px-3 py-2 border border-slate-200 rounded-xl bg-slate-50">
                <option value="">Semua Jenis Sertifikat</option>
                @foreach($certificationTypes as $ct)
                <option value="{{ $ct->id }}" @selected(($filters['cert_type_id'] ?? '') == $ct->id)>{{ $ct->name }}</option>
                @endforeach
              </select>
              <input type="text" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Cari nama siswa atau sertifikat..." class="px-3 py-2 border border-slate-200 rounded-xl bg-slate-50 w-56" />
              <button type="button" onclick="document.getElementById('modalAddCert').classList.remove('hidden')" class="px-3.5 py-2 bg-brand-500 text-white font-bold rounded-xl">+ Terbitkan Sertifikat</button>
            </form>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
              <thead>
                <tr class="bg-[#F5F1E8] text-slate-600 font-bold">
                  <th class="py-3 px-3 rounded-l-lg">No</th><th class="py-3 px-3">Student Name</th><th class="py-3 px-3">Program</th><th class="py-3 px-3 text-center">Assessment Score</th><th class="py-3 px-3">Certificate Type</th><th class="py-3 px-3">Issue Date</th><th class="py-3 px-3">Expiry</th><th class="py-3 px-3 text-center">Status</th><th class="py-3 px-3 rounded-r-lg text-center">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100 font-medium">
                @foreach($certificates as $idx => $cert)
                <tr>
                  <td class="py-3 px-3">{{ $idx + 1 }}</td>
                  <td class="py-3 px-3 font-bold">{{ $cert->student_name }}</td>
                  <td class="py-3 px-3">{{ $cert->program_name }}</td>
                  <td class="py-3 px-3 text-center">{{ (int) round($cert->score) }}</td>
                  <td class="py-3 px-3">{{ $cert->cert_type_name }} ({{ $cert->title }})</td>
                  <td class="py-3 px-3">{{ date('d M Y', strtotime($cert->issue_date)) }}</td>
                  <td class="py-3 px-3">{{ $cert->expiry_date ? date('d M Y', strtotime($cert->expiry_date)) : '-' }}</td>
                  <td class="py-3 px-3 text-center">
                    @if($cert->status === 'ACTIVE')
                      <span class="px-3 py-0.5 rounded-full bg-emerald-50 text-emerald-600 font-bold">Aktif</span>
                    @else
                      <span class="px-3 py-0.5 rounded-full bg-orange-50 text-brand-600 font-bold">Akan Kedaluwarsa</span>
                    @endif
                  </td>
                  <td class="py-3 px-3 text-center">•••</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- Modal Terbitkan Sertifikat -->
  <div id="modalAddCert" class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-md overflow-hidden">
      <div class="p-4 border-b border-slate-100 flex items-center justify-between">
        <h3 class="text-sm font-extrabold text-slate-900">Terbitkan Sertifikat Baru</h3>
        <button onclick="document.getElementById('modalAddCert').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">✕</button>
      </div>
      <form action="{{ route('erp.assessments.certificate.store') }}" method="POST" class="p-5 space-y-3.5 text-xs">
        @csrf
        <div>
          <label class="block font-semibold text-slate-600 mb-1">Pilih Siswa</label>
          <select name="student_id" required class="w-full px-3 py-2 border border-slate-200 rounded-xl">
            @foreach($studentsList as $st)
              <option value="{{ $st->id }}">{{ $st->student_no }} - {{ $st->full_name }} ({{ $st->program_name }})</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block font-semibold text-slate-600 mb-1">Jenis Sertifikasi</label>
          <select name="certification_type_id" required class="w-full px-3 py-2 border border-slate-200 rounded-xl">
            @foreach($certificationTypes as $ct)
              <option value="{{ $ct->id }}">{{ $ct->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block font-semibold text-slate-600 mb-1">Judul Sertifikat</label>
          <input name="title" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" placeholder="Contoh: Front Office Competency" />
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Skor Asesmen (0-100)</label>
            <input name="score" type="number" value="90" min="0" max="100" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" />
          </div>
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Tanggal Terbit</label>
            <input name="issue_date" type="date" value="{{ date('Y-m-d') }}" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" />
          </div>
        </div>
        <div class="pt-2 flex justify-end gap-2">
          <button type="button" onclick="document.getElementById('modalAddCert').classList.add('hidden')" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 font-semibold">Batal</button>
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
