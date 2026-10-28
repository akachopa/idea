<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IDEA ERP - Reports &amp; Analytics</title>
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
          <a href="{{ route('erp.assessments') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="file-check-2" class="w-5 h-5"></i><span>Assessment &amp; Certification</span></a>
          <a href="{{ route('erp.placements') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="briefcase" class="w-5 h-5"></i><span>Career &amp; Placement</span></a>
          <a href="{{ route('erp.partners') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="handshake" class="w-5 h-5"></i><span>Partners</span></a>
          <a href="{{ route('erp.alumni') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="graduation-cap" class="w-5 h-5"></i><span>Alumni</span></a>
          <a href="{{ route('erp.reports') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-brand-500 to-amber-500 text-white shadow-md shadow-brand-500/20"><i data-lucide="bar-chart-3" class="w-5 h-5"></i><span>Reports</span></a>
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
          <form action="{{ route('erp.reports') }}" method="GET" class="relative w-full">
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
            <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Reports &amp; Analytics</h1>
            <p class="text-sm text-slate-600 mt-1">Dapatkan insight mendalam dari seluruh aktivitas akademik, keuangan, dan penempatan.</p>
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
        <!-- 6 KPI CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
          <a href="{{ route('erp.admission') }}" class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3 hover:border-brand-200 transition">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="users" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Admission Reports</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $exec->total_applicants ?? 0 }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 12% <span class="text-slate-400 font-normal">dari periode lalu</span></div></div>
          </a>
          <a href="{{ route('erp.finance') }}" class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3 hover:border-brand-200 transition">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="coins" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Finance Reports</div><div class="text-xl font-extrabold text-slate-900 mt-0.5">Rp {{ number_format(($exec->total_revenue ?? 0) / 1000000, 1, ',', '.') }} Jt</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 18% <span class="text-slate-400 font-normal">dari periode lalu</span></div></div>
          </a>
          <a href="{{ route('erp.students') }}" class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3 hover:border-brand-200 transition">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="graduation-cap" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Student Reports</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $exec->active_students ?? 0 }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 5% <span class="text-slate-400 font-normal">dari periode lalu</span></div></div>
          </a>
          <a href="{{ route('erp.assessments') }}" class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3 hover:border-brand-200 transition">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="file-check" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Assessment Reports</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $exec->placement_ready_students ?? 0 }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 14% <span class="text-slate-400 font-normal">dari periode lalu</span></div></div>
          </a>
          <a href="{{ route('erp.placements') }}" class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3 hover:border-brand-200 transition">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="briefcase" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Placement Reports</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ (int) round($exec->placement_rate_percent ?? 87) }}%</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 6% <span class="text-slate-400 font-normal">dari periode lalu</span></div></div>
          </a>
          <a href="{{ route('erp.alumni') }}" class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3 hover:border-brand-200 transition">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="user-check" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Alumni Reports</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">3</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 9% <span class="text-slate-400 font-normal">dari periode lalu</span></div></div>
          </a>
        </div>

        <!-- FILTER BAR -->
        <form action="{{ route('erp.reports') }}" method="GET" class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3 items-center text-xs">
          <div class="px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl"><div class="text-[10px] text-slate-400">Periode</div><div class="font-bold">Apr 2024 – Apr 2025</div></div>
          <div>
            <select name="branch_id" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl font-bold">
              <option value="">Semua Cabang</option>
              @foreach($branches as $b)
                <option value="{{ $b->id }}" @selected(($filters['branch_id'] ?? '') == $b->id)>{{ $b->name }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <select name="program_id" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl font-bold">
              <option value="">Semua Program</option>
              @foreach($programs as $pr)
                <option value="{{ $pr->id }}" @selected(($filters['program_id'] ?? '') == $pr->id)>{{ $pr->name }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <select name="module" class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl font-bold">
              <option value="">Semua Modul</option>
              <option value="ADMISSION" @selected(($filters['module'] ?? '') === 'ADMISSION')>Admission</option>
              <option value="FINANCE" @selected(($filters['module'] ?? '') === 'FINANCE')>Finance</option>
              <option value="ACADEMIC" @selected(($filters['module'] ?? '') === 'ACADEMIC')>Academic</option>
              <option value="PLACEMENT" @selected(($filters['module'] ?? '') === 'PLACEMENT')>Placement</option>
            </select>
          </div>
          <button type="submit" class="py-3 px-4 bg-brand-500 hover:bg-brand-600 text-white font-bold rounded-xl flex items-center justify-center gap-2"><i data-lucide="filter" class="w-4 h-4"></i>Terapkan Filter</button>
        </form>

        <!-- MAIN GRID: LEFT 8 COLS (4 CHARTS + TABLE) & RIGHT 4 COLS (SCHEDULED + QUICK EXPORT) -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
          <div class="lg:col-span-8 space-y-6">
            <!-- 2x2 Charts Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
              <!-- Chart 1 -->
              <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
                <div class="flex justify-between items-center mb-3"><h3 class="font-bold text-sm">Tren Jumlah Pendaftar</h3><span class="text-xs text-slate-500">12 bulan terakhir ▾</span></div>
                <svg viewBox="0 0 360 130" class="w-full h-40">
                  <polyline fill="none" stroke="#F97316" stroke-width="2.5" points="15,95 45,85 75,75 105,60 135,70 165,80 195,75 225,68 255,52 285,58 315,42 345,48" />
                </svg>
              </div>
              <!-- Chart 2 -->
              <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
                <div class="flex justify-between items-center mb-3"><h3 class="font-bold text-sm">Tren Pendapatan</h3><span class="text-xs text-slate-500">12 bulan terakhir ▾</span></div>
                <div class="h-40 flex items-end justify-between gap-1.5 pt-6 px-2 border-b border-slate-100">
                  <div class="w-full bg-orange-300 h-16 rounded-t"></div><div class="w-full bg-orange-300 h-20 rounded-t"></div><div class="w-full bg-orange-300 h-24 rounded-t"></div>
                  <div class="w-full bg-brand-500 h-28 rounded-t"></div><div class="w-full bg-orange-300 h-20 rounded-t"></div><div class="w-full bg-orange-300 h-16 rounded-t"></div>
                  <div class="w-full bg-orange-300 h-20 rounded-t"></div><div class="w-full bg-orange-300 h-24 rounded-t"></div><div class="w-full bg-orange-300 h-28 rounded-t"></div>
                  <div class="w-full bg-orange-300 h-28 rounded-t"></div><div class="w-full bg-orange-300 h-32 rounded-t"></div><div class="w-full bg-orange-300 h-32 rounded-t"></div>
                </div>
              </div>
              <!-- Chart 3 -->
              <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
                <div class="flex justify-between items-center mb-4"><h3 class="font-bold text-sm">Tingkat Penempatan per Program Studi</h3><span class="text-xs text-slate-500">Tahun Ini ▾</span></div>
                <div class="space-y-2.5 text-xs">
                  <div class="flex items-center gap-2"><span class="w-20">Hospitality</span><div class="flex-1 h-3 bg-slate-100 rounded"><div class="w-[92%] h-full bg-brand-500 rounded"></div></div><b>92%</b></div>
                  <div class="flex items-center gap-2"><span class="w-20">Culinary</span><div class="flex-1 h-3 bg-slate-100 rounded"><div class="w-[86%] h-full bg-orange-400 rounded"></div></div><b>86%</b></div>
                  <div class="flex items-center gap-2"><span class="w-20">Cruise</span><div class="flex-1 h-3 bg-slate-100 rounded"><div class="w-[78%] h-full bg-orange-400 rounded"></div></div><b>78%</b></div>
                  <div class="flex items-center gap-2"><span class="w-20">Business</span><div class="flex-1 h-3 bg-slate-100 rounded"><div class="w-[81%] h-full bg-orange-300 rounded"></div></div><b>81%</b></div>
                  <div class="flex items-center gap-2"><span class="w-20">Language</span><div class="flex-1 h-3 bg-slate-100 rounded"><div class="w-[75%] h-full bg-orange-200 rounded"></div></div><b>75%</b></div>
                </div>
              </div>
              <!-- Chart 4 -->
              <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
                <div class="flex justify-between items-center mb-3"><h3 class="font-bold text-sm">Penyelesaian Studi per Program</h3><span class="text-xs text-slate-500">Tahun Ini ▾</span></div>
                @php
                  $maxTotalSt = max(1, $programStats->max('total_students'));
                  $bCols = ['bg-brand-500', 'bg-brand-500', 'bg-orange-400', 'bg-orange-400', 'bg-orange-300'];
                @endphp
                <div class="h-40 flex items-end justify-between gap-3 pt-4 px-2 border-b border-slate-100 text-[10px]">
                  @foreach($programStats as $idx => $pStat)
                  @php
                    $hPx = max(32, (int) round(($pStat->total_students / $maxTotalSt) * 96));
                  @endphp
                  <div class="flex flex-col items-center flex-1">
                    <b class="mb-1">{{ $pStat->total_students }}</b>
                    <div class="w-full {{ $bCols[$idx % count($bCols)] }} rounded-t" style="height: {{ $hPx }}px;"></div>
                    <span class="mt-1 truncate max-w-[60px]">{{ explode(' ', $pStat->name)[0] }}</span>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>

            <!-- Daftar Laporan Table -->
            <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
              <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-slate-800 text-base">Daftar Laporan</h3>
                <form action="{{ route('erp.reports') }}" method="GET">
                  <input type="text" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Cari nama laporan..." class="px-3 py-1.5 text-xs border border-slate-200 rounded-xl bg-slate-50 w-56" />
                </form>
              </div>
              <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                  <thead>
                    <tr class="bg-[#F5F1E8] text-slate-600 font-bold">
                      <th class="py-2.5 px-3 rounded-l-lg">No</th><th class="py-2.5 px-3">Nama Laporan</th><th class="py-2.5 px-3">Kategori</th><th class="py-2.5 px-3">Terakhir Diperbarui</th><th class="py-2.5 px-3">Pemilik</th><th class="py-2.5 px-3 rounded-r-lg text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="divide-y divide-slate-100 font-medium">
                    @foreach($reports as $idx => $rpt)
                    @php
                      $exportTypeMap = [
                        'ADMISSION' => 'admission',
                        'FINANCE' => 'finance',
                        'ACADEMIC' => 'students',
                        'PLACEMENT' => 'partners',
                      ];
                      $expType = $exportTypeMap[$rpt->module] ?? 'executive';
                    @endphp
                    <tr>
                      <td class="py-3 px-3">{{ $idx + 1 }}</td>
                      <td class="py-3 px-3 font-bold">{{ $rpt->name }}</td>
                      <td class="py-3 px-3">{{ $rpt->module }}</td>
                      <td class="py-3 px-3">{{ $rpt->next_run_at ? date('d M Y, H:i', strtotime($rpt->next_run_at)) : '21 Apr 2025, 10:24' }}</td>
                      <td class="py-3 px-3"><b>{{ $rpt->owner_name ?? 'Sari Anggraini' }}</b><div class="text-[10px] text-slate-400">{{ $rpt->owner_position ?? 'Head of Administration' }}</div></td>
                      <td class="py-3 px-3 text-center">
                        <a href="{{ route('erp.reports.export', ['type' => $expType]) }}" class="px-2.5 py-1 rounded bg-orange-50 text-brand-600 font-bold mr-1 inline-block">Export CSV</a>
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
            <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
              <div class="flex items-center justify-between mb-4">
                <h3 class="font-bold text-slate-800 text-base">Laporan Terjadwal</h3>
                <a href="{{ route('erp.reports') }}" class="text-xs font-bold text-brand-600">Lihat Semua →</a>
              </div>
              <div class="space-y-3.5 text-xs">
                @foreach($scheduledReports as $sr)
                <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50">
                  <div><b>{{ $sr->report_name }}</b><div class="text-slate-400 text-[11px]">{{ $sr->schedule_expression }} • Berikutnya: {{ date('d M Y', strtotime($sr->next_run_at)) }}</div></div>
                  <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-600 font-bold">Aktif</span>
                </div>
                @endforeach
              </div>
            </div>

            <!-- Quick Export -->
            <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
              <h3 class="font-bold text-slate-800 text-base mb-4">Quick Export</h3>
              <div class="space-y-3 text-xs">
                <a href="{{ route('erp.reports.export', ['type' => 'admission']) }}" class="w-full p-3 rounded-xl border border-slate-100 hover:bg-slate-50 flex items-center justify-between text-left">
                  <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-emerald-50 text-emerald-600 font-extrabold flex items-center justify-center">X</div>
                    <div><div class="font-bold text-slate-800">Export Data Admission</div><div class="text-slate-400 text-[11px]">Unduh laporan dalam format CSV</div></div>
                  </div>
                  <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                </a>
                <a href="{{ route('erp.reports.export', ['type' => 'finance']) }}" class="w-full p-3 rounded-xl border border-slate-100 hover:bg-slate-50 flex items-center justify-between text-left">
                  <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-red-50 text-red-600 font-extrabold flex items-center justify-center">FIN</div>
                    <div><div class="font-bold text-slate-800">Export Data Finance</div><div class="text-slate-400 text-[11px]">Unduh tagihan &amp; pembayaran (CSV)</div></div>
                  </div>
                  <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                </a>
                <a href="{{ route('erp.reports.export', ['type' => 'students']) }}" class="w-full p-3 rounded-xl border border-slate-100 hover:bg-slate-50 flex items-center justify-between text-left">
                  <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 font-extrabold flex items-center justify-center"><i data-lucide="bar-chart-2" class="w-4 h-4"></i></div>
                    <div><div class="font-bold text-slate-800">Export Data Siswa</div><div class="text-slate-400 text-[11px]">Export daftar siswa aktif (CSV)</div></div>
                  </div>
                  <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                </a>
                <a href="{{ route('erp.reports.export', ['type' => 'partners']) }}" class="w-full p-3 rounded-xl border border-slate-100 hover:bg-slate-50 flex items-center justify-between text-left">
                  <div class="flex items-center gap-3">
                    <div class="w-9 h-9 rounded-xl bg-purple-50 text-purple-600 font-extrabold flex items-center justify-center"><i data-lucide="database" class="w-4 h-4"></i></div>
                    <div><div class="font-bold text-slate-800">Data Mitra &amp; Penempatan</div><div class="text-slate-400 text-[11px]">Export performa partner (CSV)</div></div>
                  </div>
                  <i data-lucide="chevron-right" class="w-4 h-4 text-slate-400"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </main>
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
