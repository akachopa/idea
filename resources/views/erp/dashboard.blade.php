<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IDEA ERP - Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
          colors: {
            brand: {
              50: '#FFF7ED',
              100: '#FFEDD5',
              200: '#FED7AA',
              500: '#F97316',
              600: '#EA580C',
            },
            cream: '#FAF6F0'
          }
        }
      }
    }
  </script>
  <style>
    body { background-color: #FAF6F0; color: #1E293B; }
    .custom-shadow { box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.04), 0 1px 3px -1px rgba(0, 0, 0, 0.02); }
    ::-webkit-scrollbar { width: 6px; height: 6px; }
    ::-webkit-scrollbar-track { background: #FAF6F0; }
    ::-webkit-scrollbar-thumb { background: #CBD5E1; border-radius: 3px; }
  </style>
</head>
@php
  $placementRate = (int) round($exec->placement_rate_percent ?? 87);
  $processRate = min(100 - $placementRate, 8);
  $processEnd = $placementRate + $processRate;
  $avatars = [
    'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=100&q=80',
    'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80',
    'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=100&q=80',
    'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=100&q=80',
  ];
@endphp
<body class="antialiased selection:bg-brand-500 selection:text-white">

  <div class="flex min-h-screen relative">
    <!-- Mobile Sidebar Overlay -->
    <div id="sidebarOverlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"></div>

    <!-- SIDEBAR -->
    <aside id="sidebar" class="w-64 bg-[#F7F3EB] border-r border-[#EBE5DA] flex flex-col justify-between fixed lg:sticky top-0 h-screen z-50 transition-transform duration-300 -translate-x-full lg:translate-x-0 shrink-0 select-none overflow-y-auto">
      <div>
        <!-- Logo -->
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
          <button onclick="toggleSidebar()" class="text-slate-400 hover:text-slate-600 lg:block">
            <i data-lucide="chevron-left" class="w-5 h-5"></i>
          </button>
        </div>

        <!-- Menu Nav -->
        <nav class="p-3.5 space-y-1 text-sm font-semibold">
          <a href="{{ route('erp.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-brand-500 to-amber-500 text-white shadow-md shadow-brand-500/20">
            <i data-lucide="layout-grid" class="w-5 h-5"></i>
            <span>Dashboard</span>
          </a>
          <a href="{{ route('erp.admission') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition">
            <i data-lucide="user-plus" class="w-5 h-5"></i>
            <span>Admission</span>
          </a>
          <a href="{{ route('erp.finance') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition">
            <i data-lucide="coins" class="w-5 h-5"></i>
            <span>Finance</span>
          </a>
          <a href="{{ route('erp.students') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition">
            <i data-lucide="users" class="w-5 h-5"></i>
            <span>Student Management</span>
          </a>
          <a href="{{ route('erp.assessments') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition">
            <i data-lucide="file-check-2" class="w-5 h-5"></i>
            <span>Assessment &amp; Certification</span>
          </a>
          <a href="{{ route('erp.placements') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition">
            <i data-lucide="briefcase" class="w-5 h-5"></i>
            <span>Career &amp; Placement</span>
          </a>
          <a href="{{ route('erp.partners') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition">
            <i data-lucide="handshake" class="w-5 h-5"></i>
            <span>Partners</span>
          </a>
          <a href="{{ route('erp.alumni') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition">
            <i data-lucide="graduation-cap" class="w-5 h-5"></i>
            <span>Alumni</span>
          </a>
          <a href="{{ route('erp.reports') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition">
            <i data-lucide="bar-chart-3" class="w-5 h-5"></i>
            <span>Reports</span>
          </a>
        </nav>
      </div>

      <!-- Promo Bottom Banner -->
      <div class="p-3.5">
        <div class="relative rounded-2xl bg-gradient-to-b from-[#FCEAD2] to-[#F8DEC0] p-4 overflow-hidden border border-amber-200/60">
          <div class="flex justify-center mb-2">
            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300&q=80" alt="Global Talent" class="w-28 h-28 object-cover rounded-full border-4 border-white/80 shadow-sm" />
          </div>
          <h4 class="font-extrabold text-brand-600 text-sm leading-snug">Membangun<br>Talenta Global<br>dari Indonesia</h4>
          <p class="text-[11px] text-slate-600 mt-1.5 leading-relaxed">Pendidikan, peluang dan masa depan yang lebih baik.</p>
          <a href="{{ route('erp.reports') }}" class="mt-3 w-full py-2 px-3 bg-gradient-to-r from-brand-500 to-amber-500 text-white font-bold text-xs rounded-full flex items-center justify-center gap-1.5 shadow-sm hover:opacity-95 transition">
            <span>Bersama IDEA ERP</span>
            <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
          </a>
        </div>
      </div>
    </aside>

    <!-- MAIN CONTENT WRAPPER -->
    <div class="flex-1 flex flex-col min-w-0">
      <!-- TOPBAR -->
      <header class="h-20 bg-[#FAF6F0]/90 backdrop-blur-sm sticky top-0 z-30 px-4 lg:px-8 flex items-center justify-between border-b border-[#EBE5DA]/70">
        <div class="flex items-center gap-3 flex-1 max-w-xl">
          <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg bg-white border border-slate-200 text-slate-700">
            <i data-lucide="menu" class="w-5 h-5"></i>
          </button>
          <form action="{{ route('erp.students') }}" method="GET" class="relative w-full">
            <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2"></i>
            <input type="text" name="q" placeholder="Cari data siswa, program, pembayaran, atau lainnya..." class="w-full pl-11 pr-4 py-2.5 text-sm bg-[#F3EFE6] border border-[#E6DFD3] rounded-full focus:outline-none focus:bg-white focus:border-brand-500 transition" />
          </form>
        </div>

        <div class="flex items-center gap-4 ml-4">
          <a href="{{ route('erp.admission') }}" class="relative p-2.5 rounded-full bg-white border border-slate-200/80 text-slate-700 hover:bg-slate-50" title="Notifikasi ({{ count($notifications) }})">
            <i data-lucide="bell" class="w-5 h-5"></i>
            <span class="w-2.5 h-2.5 bg-brand-500 rounded-full absolute top-1.5 right-1.5 border-2 border-white"></span>
          </a>
          <div class="flex items-center gap-3 pl-2 cursor-pointer">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&q=80" alt="{{ $currentUser->full_name ?? 'Sari Anggraini' }}" class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm" />
            <div class="hidden sm:block text-left">
              <div class="text-sm font-bold text-slate-800 leading-none">{{ $currentUser->full_name ?? 'Sari Anggraini' }}</div>
              <div class="text-xs text-slate-500 mt-1">{{ $currentUser->position_name ?? 'Head of Administration' }}</div>
            </div>
            <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 hidden sm:block"></i>
          </div>
        </div>
      </header>

      <!-- HERO BANNER -->
      <div class="relative overflow-hidden bg-gradient-to-r from-[#FAF6F0] via-[#FAF6F0]/90 to-[#F3E9D8] border-b border-[#EBE5DA]/60 px-4 lg:px-8 py-6">
        <div class="relative z-10 flex flex-col md:flex-row md:items-center justify-between gap-4">
          <div>
            <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Selamat datang, {{ explode(' ', $currentUser->full_name ?? 'Sari')[0] }}!</h1>
            <p class="text-sm text-slate-600 mt-1">Berikut ringkasan aktivitas dan performa IDEA ERP hari ini.</p>
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

      <!-- CONTENT BODY -->
      <main class="p-4 lg:p-8 space-y-6 max-w-[1600px] w-full mx-auto">
        @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-2xl text-xs font-semibold flex items-center justify-between custom-shadow">
          <span>{{ session('success') }}</span>
          <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900">✕</button>
        </div>
        @endif

        <!-- 6 KPI CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
          <!-- Card 1 -->
          <a href="{{ route('erp.admission') }}" class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3.5 hover:border-brand-200 transition">
            <div class="w-11 h-11 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0">
              <i data-lucide="users" class="w-5 h-5"></i>
            </div>
            <div>
              <div class="text-xs text-slate-500 font-medium">Applicants</div>
              <div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ number_format($exec->total_applicants ?? 1248, 0, ',', '.') }}</div>
              <div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 12% <span class="text-slate-400 font-normal">dari bulan lalu</span></div>
            </div>
          </a>
          <!-- Card 2 -->
          <a href="{{ route('erp.students') }}" class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3.5 hover:border-brand-200 transition">
            <div class="w-11 h-11 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0">
              <i data-lucide="graduation-cap" class="w-5 h-5"></i>
            </div>
            <div>
              <div class="text-xs text-slate-500 font-medium">Active Students</div>
              <div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ number_format($exec->active_students ?? 892, 0, ',', '.') }}</div>
              <div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 5% <span class="text-slate-400 font-normal">dari bulan lalu</span></div>
            </div>
          </a>
          <!-- Card 3 -->
          <a href="{{ route('erp.finance') }}" class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3.5 hover:border-brand-200 transition">
            <div class="w-11 h-11 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0">
              <i data-lucide="coins" class="w-5 h-5"></i>
            </div>
            <div>
              <div class="text-xs text-slate-500 font-medium">Revenue</div>
              <div class="text-xl font-extrabold text-slate-900 mt-0.5">Rp {{ number_format(($exec->total_revenue ?? 0) / 1000000, 1, ',', '.') }} Jt</div>
              <div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 18% <span class="text-slate-400 font-normal">dari bulan lalu</span></div>
            </div>
          </a>
          <!-- Card 4 -->
          <a href="{{ route('erp.placements') }}" class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3.5 hover:border-brand-200 transition">
            <div class="w-11 h-11 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0">
              <i data-lucide="briefcase" class="w-5 h-5"></i>
            </div>
            <div>
              <div class="text-xs text-slate-500 font-medium">Placement Ready</div>
              <div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ number_format($exec->placement_ready_students ?? 276, 0, ',', '.') }}</div>
              <div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 14% <span class="text-slate-400 font-normal">dari bulan lalu</span></div>
            </div>
          </a>
          <!-- Card 5 -->
          <a href="{{ route('erp.placements') }}" class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3.5 hover:border-brand-200 transition">
            <div class="w-11 h-11 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0">
              <i data-lucide="bar-chart-2" class="w-5 h-5"></i>
            </div>
            <div>
              <div class="text-xs text-slate-500 font-medium">Placement Rate</div>
              <div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $placementRate }}%</div>
              <div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 6% <span class="text-slate-400 font-normal">dari periode lalu</span></div>
            </div>
          </a>
          <!-- Card 6 -->
          <a href="{{ route('erp.finance') }}" class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3.5 hover:border-brand-200 transition">
            <div class="w-11 h-11 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0">
              <i data-lucide="credit-card" class="w-5 h-5"></i>
            </div>
            <div>
              <div class="text-xs text-slate-500 font-medium">Outstanding Payment</div>
              <div class="text-xl font-extrabold text-slate-900 mt-0.5">Rp {{ number_format(($exec->outstanding_payments ?? 0) / 1000000, 1, ',', '.') }} Jt</div>
              <div class="text-[11px] font-semibold text-red-500 mt-1">↑ 8% <span class="text-slate-400 font-normal">dari bulan lalu</span></div>
            </div>
          </a>
        </div>

        <!-- ROW 2: 3 CHARTS -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
          <!-- Chart 1: Tren Pendaftar -->
          <div class="lg:col-span-5 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-base">Tren Pendaftar</h3>
              <button class="text-xs text-slate-500 flex items-center gap-1 font-medium">12 bulan terakhir <i data-lucide="chevron-down" class="w-3.5 h-3.5"></i></button>
            </div>
            <div class="relative h-52 w-full pt-4">
              <!-- Tooltip Callout -->
              <div class="absolute left-[26%] top-2 bg-white border border-slate-200 shadow-md rounded-lg px-3 py-1.5 z-10 text-xs">
                <div class="text-slate-400 text-[10px]">Apr 2025</div>
                <div class="font-bold text-slate-800">{{ number_format($exec->total_applicants ?? 1248, 0, ',', '.') }} pendaftar</div>
              </div>
              <svg viewBox="0 0 500 170" class="w-full h-full overflow-visible">
                <defs>
                  <linearGradient id="areaGrad" x1="0" y1="0" x2="0" y2="1">
                    <stop offset="0%" stop-color="#F97316" stop-opacity="0.28"/>
                    <stop offset="100%" stop-color="#F97316" stop-opacity="0.0"/>
                  </linearGradient>
                </defs>
                <!-- Grid lines -->
                <g stroke="#F1F5F9" stroke-width="1">
                  <line x1="35" y1="20" x2="490" y2="20" />
                  <line x1="35" y1="50" x2="490" y2="50" />
                  <line x1="35" y1="80" x2="490" y2="80" />
                  <line x1="35" y1="110" x2="490" y2="110" />
                  <line x1="35" y1="140" x2="490" y2="140" />
                </g>
                <!-- Y labels -->
                <g fill="#64748B" font-size="10" text-anchor="end">
                  <text x="30" y="24">2.000</text>
                  <text x="30" y="54">1.500</text>
                  <text x="30" y="84">1.000</text>
                  <text x="30" y="114">500</text>
                  <text x="30" y="144">0</text>
                </g>
                <!-- Area & Line -->
                <path d="M45,105 L82,92 L120,80 L158,62 L195,75 L233,90 L270,84 L308,76 L345,56 L383,61 L420,42 L458,50 L458,140 L45,140 Z" fill="url(#areaGrad)" />
                <polyline fill="none" stroke="#F97316" stroke-width="2.5" points="45,105 82,92 120,80 158,62 195,75 233,90 270,84 308,76 345,56 383,61 420,42 458,50" />
                <line x1="158" y1="62" x2="158" y2="140" stroke="#94A3B8" stroke-dasharray="3,3" />
                <!-- Points -->
                <g fill="#F97316">
                  <circle cx="45" cy="105" r="3.5"/><circle cx="82" cy="92" r="3.5"/><circle cx="120" cy="80" r="3.5"/>
                  <circle cx="158" cy="62" r="5" stroke="#fff" stroke-width="2"/><circle cx="195" cy="75" r="3.5"/><circle cx="233" cy="90" r="3.5"/>
                  <circle cx="270" cy="84" r="3.5"/><circle cx="308" cy="76" r="3.5"/><circle cx="345" cy="56" r="3.5"/>
                  <circle cx="383" cy="61" r="3.5"/><circle cx="420" cy="42" r="3.5"/><circle cx="458" cy="50" r="3.5"/>
                </g>
                <!-- X labels -->
                <g fill="#64748B" font-size="10" text-anchor="middle">
                  <text x="45" y="158">Jan</text><text x="82" y="158">Feb</text><text x="120" y="158">Mar</text>
                  <text x="158" y="158">Apr</text><text x="195" y="158">Mei</text><text x="233" y="158">Jun</text>
                  <text x="270" y="158">Jul</text><text x="308" y="158">Agu</text><text x="345" y="158">Sep</text>
                  <text x="383" y="158">Okt</text><text x="420" y="158">Nov</text><text x="458" y="158">Des</text>
                </g>
              </svg>
            </div>
          </div>

          <!-- Chart 2: Jumlah Enrolment per Program -->
          <div class="lg:col-span-4 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-base">Jumlah Enrolment per Program</h3>
              <button class="text-xs text-slate-500 flex items-center gap-1 font-medium">Tahun Ini <i data-lucide="chevron-down" class="w-3.5 h-3.5"></i></button>
            </div>
            @php
              $maxProg = max(1, $programsEnrollment->max('student_count'));
              $barColors = ['bg-brand-500', 'bg-orange-400', 'bg-orange-300', 'bg-amber-700/60', 'bg-orange-200'];
            @endphp
            <div class="h-52 flex items-end justify-between gap-3 pt-6 pb-2 px-2 border-b border-slate-100">
              @foreach($programsEnrollment as $idx => $prog)
              @php
                $heightPx = max(32, (int) round(($prog->student_count / $maxProg) * 128));
              @endphp
              <div class="flex flex-col items-center flex-1">
                <span class="text-xs font-bold text-slate-800 mb-1">{{ $prog->student_count }}</span>
                <div class="w-full {{ $barColors[$idx % count($barColors)] }} rounded-t-lg" style="height: {{ $heightPx }}px;"></div>
                <span class="text-[11px] text-slate-500 mt-2 truncate max-w-[70px]">{{ explode(' ', $prog->name)[0] }}</span>
              </div>
              @endforeach
            </div>
          </div>

          <!-- Chart 3: Status Penempatan -->
          <div class="lg:col-span-3 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-base">Status Penempatan</h3>
              <button class="text-xs text-slate-500 flex items-center gap-1 font-medium">Tahun Ini <i data-lucide="chevron-down" class="w-3.5 h-3.5"></i></button>
            </div>
            <div class="flex items-center justify-between gap-4 h-48">
              <div class="relative w-36 h-36 shrink-0 flex items-center justify-center rounded-full" style="background: conic-gradient(#F97316 0% {{ $placementRate }}%, #FDBA74 {{ $placementRate }}% {{ $processEnd }}%, #CBD5E1 {{ $processEnd }}% 100%);">
                <div class="w-24 h-24 bg-white rounded-full flex flex-col items-center justify-center text-center">
                  <span class="text-xl font-extrabold text-slate-900">{{ $placementRate }}%</span>
                  <span class="text-[10px] text-slate-500 leading-tight">Sudah<br>Ditempatkan</span>
                </div>
              </div>
              <div class="space-y-2.5 text-xs flex-1">
                <div class="flex items-start justify-between">
                  <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-brand-500"></span>
                    <div>
                      <div class="font-semibold text-slate-700">Ditempatkan</div>
                      <div class="text-slate-400 text-[11px]">({{ $placementPipeline->placed ?? 0 }})</div>
                    </div>
                  </div>
                  <span class="font-bold text-slate-800">{{ $placementRate }}%</span>
                </div>
                <div class="flex items-start justify-between">
                  <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-orange-300"></span>
                    <div>
                      <div class="font-semibold text-slate-700">Proses</div>
                      <div class="text-slate-400 text-[11px]">({{ ($placementPipeline->interview ?? 0) + ($placementPipeline->offered ?? 0) }})</div>
                    </div>
                  </div>
                  <span class="font-bold text-slate-800">{{ $processRate }}%</span>
                </div>
                <div class="flex items-start justify-between">
                  <div class="flex items-center gap-2">
                    <span class="w-2.5 h-2.5 rounded-full bg-slate-300"></span>
                    <div>
                      <div class="font-semibold text-slate-700">Belum</div>
                      <div class="text-slate-400 text-[11px]">({{ $placementPipeline->ready ?? 0 }})</div>
                    </div>
                  </div>
                  <span class="font-bold text-slate-800">{{ max(0, 100 - $placementRate - $processRate) }}%</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ROW 3: INTERVIEW & ACTIVITIES -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
          <!-- Jadwal Interview Mendatang -->
          <div class="lg:col-span-7 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-base">Jadwal Interview Mendatang</h3>
              <a href="{{ route('erp.admission') }}" class="text-xs font-bold text-brand-600 flex items-center gap-1 hover:underline">Lihat Semua <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i></a>
            </div>
            <div class="space-y-3">
              @foreach($upcomingInterviews as $idx => $intv)
              @php
                $dt = strtotime($intv->scheduled_at);
                $isOnline = strtoupper($intv->interview_mode ?? '') === 'ONLINE';
              @endphp
              <div class="flex items-center justify-between p-3 rounded-xl bg-[#FAF6F0]/60 border border-slate-100">
                <div class="flex items-center gap-3.5">
                  <div class="w-11 h-11 rounded-xl bg-brand-50 text-brand-600 flex flex-col items-center justify-center font-extrabold text-sm leading-none">
                    <span>{{ date('d', $dt) }}</span><span class="text-[10px] font-medium mt-0.5">{{ date('M', $dt) }}</span>
                  </div>
                  <span class="text-xs font-semibold text-slate-600 w-12">{{ date('H:i', $dt) }}</span>
                  <img src="{{ $avatars[$idx % count($avatars)] }}" class="w-9 h-9 rounded-full object-cover" />
                  <div>
                    <div class="text-sm font-bold text-slate-800">{{ $intv->candidate_name }}</div>
                    <div class="text-xs text-slate-500">{{ $intv->destination_name }}</div>
                  </div>
                </div>
                <div class="text-xs text-slate-600 hidden sm:block">{{ $intv->program_name ?? 'Hospitality' }}</div>
                <div class="flex items-center gap-3">
                  @if($isOnline)
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-emerald-50 text-emerald-600">Online</span>
                  @else
                    <span class="px-3 py-1 rounded-full text-xs font-semibold bg-orange-50 text-brand-600">Onsite</span>
                  @endif
                  <button class="text-slate-400 hover:text-slate-600"><i data-lucide="more-horizontal" class="w-4 h-4"></i></button>
                </div>
              </div>
              @endforeach
            </div>
          </div>

          <!-- Aktivitas Terbaru -->
          <div class="lg:col-span-5 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-base">Aktivitas Terbaru</h3>
              <a href="{{ route('erp.reports') }}" class="text-xs font-bold text-brand-600 flex items-center gap-1 hover:underline">Lihat Semua <i data-lucide="arrow-right" class="w-3.5 h-3.5"></i></a>
            </div>
            <div class="space-y-4">
              <div class="flex items-start justify-between gap-3">
                <div class="flex items-start gap-3">
                  <div class="w-9 h-9 rounded-full bg-orange-50 text-brand-500 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="user-plus" class="w-4 h-4"></i></div>
                  <div>
                    <div class="text-xs font-bold text-slate-800">Pendaftar baru</div>
                    <div class="text-xs text-slate-500"><b>{{ $latestApplicant->full_name ?? 'Nadya Putri' }}</b> mendaftar pada program {{ $latestApplicant->program_name ?? 'Hospitality' }} ({{ $latestApplicant->registration_no ?? 'Batch Sep 2025' }})</div>
                  </div>
                </div>
                <span class="text-[11px] text-slate-400 shrink-0">10:24</span>
              </div>
              <div class="flex items-start justify-between gap-3">
                <div class="flex items-start gap-3">
                  <div class="w-9 h-9 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="credit-card" class="w-4 h-4"></i></div>
                  <div>
                    <div class="text-xs font-bold text-slate-800">Pembayaran diterima</div>
                    <div class="text-xs text-slate-500">Rp {{ number_format($latestPayment->amount ?? 12500000, 0, ',', '.') }} dari <b>{{ $latestPayment->full_name ?? 'Bima Santoso' }}</b> ({{ $latestPayment->program_name ?? 'Program Culinary' }})</div>
                  </div>
                </div>
                <span class="text-[11px] text-slate-400 shrink-0">09:18</span>
              </div>
              <div class="flex items-start justify-between gap-3">
                <div class="flex items-start gap-3">
                  <div class="w-9 h-9 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="file-text" class="w-4 h-4"></i></div>
                  <div>
                    <div class="text-xs font-bold text-slate-800">Sertifikat diterbitkan</div>
                    <div class="text-xs text-slate-500">{{ $latestCertificate->title ?? 'Sertifikat Housekeeping' }} untuk {{ $latestCertificate->full_name ?? 'Andi Wijaya' }}</div>
                  </div>
                </div>
                <span class="text-[11px] text-slate-400 text-right shrink-0">Kemarin<br>16:42</span>
              </div>
              <div class="flex items-start justify-between gap-3">
                <div class="flex items-start gap-3">
                  <div class="w-9 h-9 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="briefcase" class="w-4 h-4"></i></div>
                  <div>
                    <div class="text-xs font-bold text-slate-800">Penempatan berhasil</div>
                    <div class="text-xs text-slate-500">{{ $latestPlacement->full_name ?? 'Siti Rahma' }} ditempatkan di {{ $latestPlacement->partner_name ?? 'Marriott Singapore' }}</div>
                  </div>
                </div>
                <span class="text-[11px] text-slate-400 text-right shrink-0">Kemarin<br>14:10</span>
              </div>
              <div class="flex items-start justify-between gap-3">
                <div class="flex items-start gap-3">
                  <div class="w-9 h-9 rounded-full bg-slate-100 text-slate-700 flex items-center justify-center shrink-0 mt-0.5"><i data-lucide="users" class="w-4 h-4"></i></div>
                  <div>
                    <div class="text-xs font-bold text-slate-800">Partner baru</div>
                    <div class="text-xs text-slate-500">Kerja sama dengan {{ $latestPartner->partner_name ?? 'Hotel Nikko Osaka' }} ({{ $latestPartner->contract_title ?? 'Internship Program' }})</div>
                  </div>
                </div>
                <span class="text-[11px] text-slate-400 text-right shrink-0">19 Apr<br>11:36</span>
              </div>
            </div>
          </div>
        </div>

        <!-- ROW 4: PERFORMA CABANG TABLE -->
        <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
          <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-slate-800 text-base">Performa Cabang</h3>
            <a href="{{ route('erp.reports') }}" class="text-xs text-slate-500 flex items-center gap-1 font-medium">Tahun Ini <i data-lucide="chevron-down" class="w-3.5 h-3.5"></i></a>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse text-xs">
              <thead>
                <tr class="bg-[#F5F1E8] text-slate-600 font-bold">
                  <th class="py-3 px-4 rounded-l-lg">No</th>
                  <th class="py-3 px-4">Cabang</th>
                  <th class="py-3 px-4 text-center">Applicants</th>
                  <th class="py-3 px-4 text-center">Active Students</th>
                  <th class="py-3 px-4 text-center">Revenue</th>
                  <th class="py-3 px-4 text-center">Placement Rate</th>
                  <th class="py-3 px-4 text-center">Outstanding Payment</th>
                  <th class="py-3 px-4 rounded-r-lg text-center">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100 text-slate-700 font-medium">
                @foreach($branchPerformance as $idx => $branch)
                @php
                  $branchRates = [88, 85, 82, 90];
                  $bRate = $branchRates[$idx % count($branchRates)];
                @endphp
                <tr class="hover:bg-slate-50/80">
                  <td class="py-3.5 px-4">{{ $idx + 1 }}</td>
                  <td class="py-3.5 px-4 font-bold text-slate-900">{{ $branch->name }} ({{ $branch->city_name }})</td>
                  <td class="py-3.5 px-4 text-center">{{ $branch->applicants_count }}</td>
                  <td class="py-3.5 px-4 text-center">{{ $branch->active_students_count }}</td>
                  <td class="py-3.5 px-4 text-center">Rp {{ number_format($branch->revenue, 0, ',', '.') }}</td>
                  <td class="py-3.5 px-4 text-center font-bold text-emerald-600">{{ $bRate }}%</td>
                  <td class="py-3.5 px-4 text-center">Rp {{ number_format($branch->outstanding_payment, 0, ',', '.') }}</td>
                  <td class="py-3.5 px-4 text-center"><a href="{{ route('erp.admission', ['branch_id' => $branch->id]) }}" class="text-slate-400 hover:text-brand-600 font-bold">•••</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

      </main>
    </div>
  </div>

  <script>
    lucide.createIcons();
    function toggleSidebar() {
      const sb = document.getElementById('sidebar');
      const ov = document.getElementById('sidebarOverlay');
      sb.classList.toggle('-translate-x-full');
      ov.classList.toggle('hidden');
    }
  </script>
</body>
</html>
