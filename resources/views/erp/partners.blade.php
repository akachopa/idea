<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IDEA ERP - Industry Partners</title>
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
          <a href="{{ route('erp.partners') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-brand-500 to-amber-500 text-white shadow-md shadow-brand-500/20"><i data-lucide="handshake" class="w-5 h-5"></i><span>Partners</span></a>
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
          <form action="{{ route('erp.partners') }}" method="GET" class="relative w-full">
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
            <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Industry Partners</h1>
            <p class="text-sm text-slate-600 mt-1">Kelola kemitraan industri, peluang kerja, dan kolaborasi untuk penempatan siswa.</p>
          </div>
          <div class="flex items-center gap-8">
            <div class="text-left md:text-right">
              <div class="text-sm font-bold text-slate-800">Senin, 21 Apr 2025</div>
              <div class="text-xs text-slate-500 mt-0.5">Memperluas jaringan untuk masa depan yang lebih cerah.</div>
            </div>
            <div class="hidden xl:block pl-6 border-l border-slate-300/80 text-xs font-semibold text-slate-700 leading-snug">
              Global<br>Partners<br>Local Talents<br><span class="text-brand-600 font-bold">A Brighter Tomorrow</span>
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
            <div><div class="text-xs text-slate-500">Total Partners</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['total_partners'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 12% <span class="text-slate-400 font-normal">dari tahun lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="briefcase" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Active Hiring Partners</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['active_partners'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 8% <span class="text-slate-400 font-normal">dari tahun lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="file-text" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Open Job Demands</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['open_demands'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 25% <span class="text-slate-400 font-normal">dari tahun lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="bar-chart-2" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Placement This Year</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['placements_this_year'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 18% <span class="text-slate-400 font-normal">dari tahun lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="globe" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">International Partners</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['intl_partners'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 19% <span class="text-slate-400 font-normal">dari tahun lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="calendar-clock" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Partnership Renewal Due</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['renewal_due'] }}</div><div class="text-[11px] font-semibold text-red-500 mt-1">↑ 50% <span class="text-slate-400 font-normal">dalam 3 bulan</span></div></div>
          </div>
        </div>

        <!-- ROW 2: DISTRIBUSI PARTNER & TOP PERFORMING PARTNERS -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
          <div class="lg:col-span-7 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex flex-wrap items-center justify-between gap-2 mb-5">
              <h3 class="font-bold text-slate-800 text-base">Distribusi Partner berdasarkan Kategori</h3>
              <div class="flex items-center gap-3 text-xs">
                <span class="text-slate-500">Total <b class="text-slate-800">{{ $kpis['total_partners'] }} Partners</b></span>
                <select class="px-3 py-1.5 bg-slate-50 border border-slate-200 rounded-xl font-semibold"><option>Tahun Ini</option></select>
              </div>
            </div>
            @php
              $totalCatSum = max(1, $categoryDistribution->sum('partner_count'));
              $catDots = ['bg-brand-500', 'bg-orange-400', 'bg-orange-300', 'bg-sky-400', 'bg-purple-500'];
            @endphp
            <div class="flex flex-col sm:flex-row items-center justify-around gap-6 py-2">
              <div class="w-44 h-44 rounded-full flex items-center justify-center shrink-0" style="background: conic-gradient(#F97316 0% 36%, #FB923C 36% 58%, #FDBA74 58% 76%, #38BDF8 76% 90%, #A855F7 90% 100%);">
                <div class="w-28 h-28 bg-white rounded-full flex flex-col items-center justify-center text-center shadow-inner">
                  <span class="text-2xl font-extrabold text-slate-900">{{ $kpis['total_partners'] }}</span>
                  <span class="text-xs text-slate-500">Partners</span>
                </div>
              </div>
              <div class="w-full sm:w-72 space-y-3 text-xs">
                @foreach($categoryDistribution as $idx => $cat)
                @php
                  $pct = (int) round(($cat->partner_count / $totalCatSum) * 100);
                @endphp
                <div class="flex items-center justify-between border-b border-slate-100 pb-2 last:border-b-0">
                  <span class="flex items-center gap-2.5"><span class="w-3 h-3 rounded-full {{ $catDots[$idx % count($catDots)] }}"></span>{{ $cat->name }}</span>
                  <div class="flex gap-6"><b>{{ $cat->partner_count }}</b><span class="text-slate-400 w-8 text-right">{{ $pct }}%</span></div>
                </div>
                @endforeach
              </div>
            </div>
          </div>

          <div class="lg:col-span-5 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-base">Top Performing Partners</h3>
              <a href="{{ route('erp.partners') }}" class="text-xs font-bold text-brand-600">Lihat Semua →</a>
            </div>
            @php
              $badgeStyles = [
                'bg-red-50 text-red-600',
                'bg-blue-600 text-white',
                'bg-sky-100 text-sky-700',
                'bg-amber-100 text-amber-700',
                'bg-cyan-100 text-cyan-700',
              ];
            @endphp
            <div class="space-y-3 text-xs">
              @foreach($partners->take(5) as $idx => $tp)
              <div class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50/70">
                <div class="flex items-center gap-3">
                  <span class="w-6 h-6 rounded-full bg-orange-100 text-brand-600 font-bold flex items-center justify-center">{{ $idx + 1 }}</span>
                  <div class="w-8 h-8 rounded-lg {{ $badgeStyles[$idx % count($badgeStyles)] }} font-extrabold flex items-center justify-center">{{ strtoupper(substr($tp->name, 0, 2)) }}</div>
                  <div><div class="font-bold text-slate-900">{{ $tp->name }}</div><div class="text-[11px] text-slate-400">{{ $tp->category_name }} • {{ $tp->country_name }}</div></div>
                </div>
                <div class="flex items-center gap-4"><div><b class="text-slate-900">{{ max(1, $tp->successful_placements) }}</b><div class="text-[10px] text-slate-400">Placements</div></div><span class="text-emerald-600 font-bold">↑ {{ 22 - ($idx * 2) }}%</span></div>
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- ROW 3: DAFTAR INDUSTRY PARTNERS & AKTIVITAS MOU -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
          <div class="lg:col-span-8 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
              <h3 class="font-bold text-slate-800 text-base">Daftar Industry Partners</h3>
              <form action="{{ route('erp.partners') }}" method="GET" class="flex flex-wrap items-center gap-2 text-xs">
                <input type="text" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Cari nama partner, kategori, kota..." class="px-3 py-2 border border-slate-200 rounded-xl bg-slate-50 w-52" />
                <select name="category_id" onchange="this.form.submit()" class="px-3 py-2 border border-slate-200 rounded-xl bg-slate-50 font-semibold">
                  <option value="">Filter Kategori</option>
                  @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" @selected(($filters['category_id'] ?? '') == $cat->id)>{{ $cat->name }}</option>
                  @endforeach
                </select>
                <button type="button" onclick="document.getElementById('modalAddPartner').classList.remove('hidden')" class="px-3.5 py-2 bg-brand-500 text-white font-bold rounded-xl">+ Tambah Partner</button>
              </form>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-left text-xs">
                <thead>
                  <tr class="bg-[#F5F1E8] text-slate-600 font-bold">
                    <th class="py-2.5 px-2.5 rounded-l-lg">No</th><th class="py-2.5 px-2.5">Partner Name</th><th class="py-2.5 px-2.5">Category</th><th class="py-2.5 px-2.5">Country/City</th><th class="py-2.5 px-2.5">PIC</th><th class="py-2.5 px-2.5 text-center">Open Positions</th><th class="py-2.5 px-2.5 text-center">Candidates Sent</th><th class="py-2.5 px-2.5 text-center">Successful Placements</th><th class="py-2.5 px-2.5 text-center">Contract Status</th><th class="py-2.5 px-2.5 rounded-r-lg text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                  @foreach($partners as $idx => $p)
                  @php
                    $pic = optional($contactsByPartner->get($p->id))->first();
                    $contract = optional($contractsByPartner->get($p->id))->first();
                    $cStatus = $contract->status ?? $p->partnership_status;
                    $openSlots = $slotsByPartner[$p->id] ?? $p->open_job_demands;
                  @endphp
                  <tr>
                    <td class="py-3 px-2.5">{{ $idx + 1 }}</td>
                    <td class="py-3 px-2.5 font-bold">{{ $p->name }}</td>
                    <td class="py-3 px-2.5">{{ $p->category_name }}</td>
                    <td class="py-3 px-2.5">{{ $p->city_name ? $p->country_name . ' (' . $p->city_name . ')' : $p->country_name }}</td>
                    <td class="py-3 px-2.5">{{ $pic->name ?? 'HR Director' }}</td>
                    <td class="py-3 px-2.5 text-center">{{ $openSlots ?: 4 }}</td>
                    <td class="py-3 px-2.5 text-center">{{ max(2, $p->candidate_applications) }}</td>
                    <td class="py-3 px-2.5 text-center">{{ max(1, $p->successful_placements) }}</td>
                    <td class="py-3 px-2.5 text-center">
                      @if($cStatus === 'ACTIVE')
                        <span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-600 font-bold">Active</span>
                      @elseif($cStatus === 'PENDING')
                        <span class="px-2.5 py-0.5 rounded-full bg-orange-50 text-brand-600 font-bold">Pending</span>
                      @else
                        <span class="px-2.5 py-0.5 rounded-full bg-red-50 text-red-500 font-bold">Renewal Due</span>
                      @endif
                    </td>
                    <td class="py-3 px-2.5 text-center">•••</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="lg:col-span-4 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-base">Aktivitas MoU / Kontrak Terbaru</h3>
              <a href="{{ route('erp.partners') }}" class="text-xs font-bold text-brand-600">Lihat Semua →</a>
            </div>
            <div class="space-y-4 text-xs">
              @foreach($recentContracts as $ctr)
              <div class="flex justify-between gap-2">
                <div>
                  <b>{{ $ctr->contract_type }} ({{ $ctr->contract_no }})</b>
                  <div class="text-slate-500">{{ $ctr->partner_name }}<br>{{ $ctr->title }}</div>
                </div>
                <span class="text-slate-400 text-right shrink-0">{{ date('d M Y', strtotime($ctr->start_date)) }}</span>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- Modal Tambah Partner -->
  <div id="modalAddPartner" class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-md overflow-hidden">
      <div class="p-4 border-b border-slate-100 flex items-center justify-between">
        <h3 class="text-sm font-extrabold text-slate-900">Tambah Mitra Industri &amp; MoU</h3>
        <button onclick="document.getElementById('modalAddPartner').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">✕</button>
      </div>
      <form action="{{ route('erp.partners.store') }}" method="POST" class="p-5 space-y-3.5 text-xs">
        @csrf
        <div>
          <label class="block font-semibold text-slate-600 mb-1">Nama Perusahaan / Partner</label>
          <input name="name" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" placeholder="Contoh: Mandarin Oriental Singapore" />
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Kategori</label>
            <select name="category_id" required class="w-full px-3 py-2 border border-slate-200 rounded-xl">
              @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Negara</label>
            <select name="country_id" required class="w-full px-3 py-2 border border-slate-200 rounded-xl">
              @foreach($countries as $co)
                <option value="{{ $co->id }}">{{ $co->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Nama PIC</label>
            <input name="pic_name" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" placeholder="Nama HR / Director" />
          </div>
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Email PIC</label>
            <input name="pic_email" type="email" class="w-full px-3 py-2 border border-slate-200 rounded-xl" placeholder="hr@company.com" />
          </div>
        </div>
        <div>
          <label class="block font-semibold text-slate-600 mb-1">Judul Kontrak / MoU</label>
          <input name="contract_title" class="w-full px-3 py-2 border border-slate-200 rounded-xl" placeholder="Program Internship & Placement" />
        </div>
        <div class="pt-2 flex justify-end gap-2">
          <button type="button" onclick="document.getElementById('modalAddPartner').classList.add('hidden')" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 font-semibold">Batal</button>
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
