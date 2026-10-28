<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>IDEA ERP - Reports &amp; Analytics</title>
<!-- Tailwind CSS v3 with forms and container queries -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
          },
          colors: {
            primary: {
              50: '#fff7ed',
              100: '#ffedd5',
              500: '#f97316',
              600: '#ea580c',
              700: '#c2410c',
            },
            sidebar: '#fcfcfc',
            canvas: '#f8fafc',
          }
        }
      }
    }
</script>
<style data-purpose="custom-scrollbars">
    ::-webkit-scrollbar {
      width: 5px;
      height: 5px;
    }
    ::-webkit-scrollbar-track {
      background: #f1f5f9;
    }
    ::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 9999px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #94a3b8;
    }
</style>
</head>
<body class="bg-[#f8fafc] text-slate-800 antialiased font-sans flex min-h-screen overflow-x-hidden">
<!-- BEGIN: SidebarNavigation -->
<aside class="w-[260px] bg-white border-r border-slate-200/80 flex flex-col justify-between shrink-0 fixed inset-y-0 left-0 z-30 select-none">
<div class="flex flex-col h-full">
<!-- App Brand & Logo -->
<div class="h-20 flex items-center justify-between px-6 border-b border-slate-100">
<a href="{{ route('erp.dashboard') }}" class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-gradient-to-tr from-amber-500 to-orange-500 flex items-center justify-center p-2 text-white shadow-sm ring-4 ring-orange-50">
<div class="w-4 h-4 border-[3px] border-white rounded-full"></div>
</div>
<div>
<span class="font-extrabold tracking-tight text-slate-900 text-lg leading-none block">IDEA ERP</span>
<span class="text-[10px] text-slate-400 font-medium tracking-wide">Education for a Brighter Tomorrow</span>
</div>
</a>
<button class="p-1 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors">
<i class="w-5 h-5" data-lucide="chevron-left"></i>
</button>
</div>
<!-- Navigation Links -->
<nav class="p-4 space-y-1.5 flex-1 overflow-y-auto">
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 text-sm transition-all" href="{{ route('erp.dashboard') }}">
<i class="w-5 h-5 stroke-[1.8]" data-lucide="layout-grid"></i>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 text-sm transition-all" href="{{ route('erp.admission') }}">
<i class="w-5 h-5 stroke-[1.8]" data-lucide="user-plus"></i>
<span>Admission</span>
</a>
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 text-sm transition-all" href="{{ route('erp.finance') }}">
<i class="w-5 h-5 stroke-[1.8]" data-lucide="wallet"></i>
<span>Finance</span>
</a>
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 text-sm transition-all" href="{{ route('erp.students') }}">
<i class="w-5 h-5 stroke-[1.8]" data-lucide="users"></i>
<span>Student Management</span>
</a>
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 text-sm transition-all" href="{{ route('erp.assessments') }}">
<i class="w-5 h-5 stroke-[1.8]" data-lucide="file-check-2"></i>
<span>Assessment &amp; Certification</span>
</a>
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 text-sm transition-all" href="{{ route('erp.placements') }}">
<i class="w-5 h-5 stroke-[1.8]" data-lucide="briefcase"></i>
<span>Career &amp; Placement</span>
</a>
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 text-sm transition-all" href="{{ route('erp.partners') }}">
<i class="w-5 h-5 stroke-[1.8]" data-lucide="handshake"></i>
<span>Partners</span>
</a>
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 text-sm transition-all" href="{{ route('erp.alumni') }}">
<i class="w-5 h-5 stroke-[1.8]" data-lucide="graduation-cap"></i>
<span>Alumni</span>
</a>
<!-- Active Reports Navigation -->
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl font-semibold bg-gradient-to-r from-orange-500 to-orange-600 text-white shadow-md shadow-orange-500/25 text-sm transition-all" href="{{ route('erp.reports') }}">
<i class="w-5 h-5 stroke-[2.2]" data-lucide="bar-chart-2"></i>
<span>Reports</span>
</a>
</nav>
<!-- Sidebar Promo / Bottom Card -->
<div class="p-4">
<div class="relative overflow-hidden rounded-2xl bg-gradient-to-b from-orange-50/70 via-orange-100/40 to-orange-200/50 p-4 border border-orange-200/60 shadow-sm flex flex-col justify-end min-h-[190px]">
<div class="absolute -right-2 top-2 opacity-25">
<i class="w-24 h-24 text-orange-600" data-lucide="sparkles"></i>
</div>
<div class="relative z-10">
<h4 class="text-sm font-bold leading-tight text-orange-900">Membangun Talenta Global dari Indonesia</h4>
<p class="text-[11px] text-slate-600 mt-1 mb-3">Pendidikan, peluang dan masa depan yang lebih baik.</p>
<a href="{{ route('erp.dashboard') }}" class="w-full inline-flex items-center justify-center gap-2 py-2 px-3 bg-gradient-to-r from-orange-600 to-orange-500 hover:from-orange-700 hover:to-orange-600 text-white font-medium rounded-xl text-xs transition shadow-sm">
<span>Bersama IDEA ERP</span>
<i class="w-3.5 h-3.5" data-lucide="arrow-right"></i>
</a>
</div>
</div>
</div>
</div>
</aside>
<!-- END: SidebarNavigation -->
<!-- BEGIN: MainContentArea -->
<div class="flex-1 ml-[260px] flex flex-col min-w-0">
<!-- BEGIN: TopBar -->
<header class="h-20 bg-white/80 backdrop-blur-md sticky top-0 z-20 border-b border-slate-200/80 px-8 flex items-center justify-between gap-4">
<!-- Search Bar -->
<form action="{{ route('erp.reports') }}" method="GET" class="flex-1 max-w-xl relative">
<span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
<i class="w-4 h-4" data-lucide="search"></i>
</span>
<input name="q" value="{{ $filters['q'] ?? '' }}" class="w-full pl-10 pr-4 py-2 text-sm bg-slate-50/80 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 placeholder-slate-400 transition" placeholder="Cari nama laporan, modul, atau pemilik..." type="text"/>
</form>
<!-- Topbar Actions & User Profile -->
<div class="flex items-center gap-5">
<button class="relative p-2.5 rounded-xl border border-slate-200 bg-white text-slate-600 hover:text-slate-900 hover:bg-slate-50 transition shadow-sm" title="{{ $notifications->count() }} notifikasi">
<i class="w-4 h-4" data-lucide="bell"></i>
<span class="absolute top-2 right-2 w-2 h-2 bg-orange-500 rounded-full ring-2 ring-white"></span>
</button>
<div class="h-8 w-px bg-slate-200"></div>
<div class="flex items-center gap-3 pl-1 cursor-pointer">
<img alt="{{ $currentUser->full_name ?? 'Sari Anggraini' }}" class="w-10 h-10 rounded-full object-cover ring-2 ring-orange-500/20 shadow-sm" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCIUCtc6UylU4sffQ26RUU8DTELJlTSrnmasJWIbq4MNsuONhIYtHdqRQLDVABAFYwuSj0w6K881pL1s3XjdH17qDxqDff44m3NuS9aq07u1JJIcDSNH1ipuowXedojIm1GGdOIpH_V_0FQynxKYVJ_aelr9_kJAcmwl6vbE7YwPMf2pFJ5ohAmdzWJm1KZt_M7kwbCUTe59awI_CNLpkGKLBW68uyF46h8wx-LiCc"/>
<div class="text-left hidden sm:block">
<span class="text-sm font-bold text-slate-800 leading-tight block">{{ $currentUser->full_name ?? 'Sari Anggraini' }}</span>
<span class="text-[11px] font-medium text-slate-400">{{ $currentUser->position_title ?? 'Head of Administration' }}</span>
</div>
<i class="w-4 h-4 text-slate-400 ml-1" data-lucide="chevron-down"></i>
</div>
</div>
</header>
<!-- END: TopBar -->
<!-- BEGIN: MainDashboardBody -->
<main class="p-8 space-y-6">
<!-- BEGIN: PageTitleHeader -->
<section class="flex flex-col md:flex-row md:items-center justify-between gap-4">
<div>
<h1 class="text-2xl font-bold tracking-tight text-slate-900">Reports &amp; Analytics</h1>
<p class="text-xs sm:text-sm text-slate-500 mt-0.5">Dapatkan insight mendalam dari seluruh aktivitas akademik, keuangan, dan penempatan.</p>
</div>
<div class="flex items-center gap-4">
<div class="text-right">
<div class="text-xs font-semibold text-slate-800">{{ now()->translatedFormat('l, d M Y') }}</div>
<div class="text-[11px] text-slate-400">Semangat untuk hari yang produktif!</div>
</div>
<div class="hidden lg:flex items-center gap-3 pl-4 border-l border-slate-200">
<div class="text-right text-[11px] leading-tight font-medium text-slate-600">
<span class="font-bold text-slate-800">People Education Opportunities</span><br/>
  A Brighter Tomorrow
</div>
</div>
</div>
</section>
<!-- END: PageTitleHeader -->
<!-- BEGIN: StatCardsRow (6 KPI cards) -->
<section class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-4">
<!-- Card 1: Admission -->
<div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-[0_2px_4px_rgba(0,0,0,0.02)] flex flex-col justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center text-orange-600">
<i class="w-5 h-5" data-lucide="users"></i>
</div>
<div>
<p class="text-[11px] font-medium text-slate-400">Admission Reports</p>
<h3 class="text-lg font-bold text-slate-800 tracking-tight">{{ number_format($exec->total_applicants ?? 0) }}</h3>
</div>
</div>
<div class="mt-2.5 pt-2 border-t border-slate-100 flex items-center gap-1.5 text-[11px]">
<span class="inline-flex items-center text-emerald-600 font-semibold gap-0.5">
<i class="w-3.5 h-3.5" data-lucide="trending-up"></i> 12%
</span>
<span class="text-slate-400">total pendaftar</span>
</div>
</div>
<!-- Card 2: Finance -->
<div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-[0_2px_4px_rgba(0,0,0,0.02)] flex flex-col justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-amber-100 flex items-center justify-center text-amber-600">
<i class="w-5 h-5" data-lucide="coins"></i>
</div>
<div>
<p class="text-[11px] font-medium text-slate-400">Finance Reports</p>
<h3 class="text-lg font-bold text-slate-800 tracking-tight">Rp {{ number_format(($exec->total_revenue ?? 0) / 1000000, 1, ',', '.') }} Jt</h3>
</div>
</div>
<div class="mt-2.5 pt-2 border-t border-slate-100 flex items-center gap-1.5 text-[11px]">
<span class="inline-flex items-center text-emerald-600 font-semibold gap-0.5">
<i class="w-3.5 h-3.5" data-lucide="trending-up"></i> 18%
</span>
<span class="text-slate-400">pendapatan</span>
</div>
</div>
<!-- Card 3: Student -->
<div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-[0_2px_4px_rgba(0,0,0,0.02)] flex flex-col justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-orange-100/70 flex items-center justify-center text-orange-600">
<i class="w-5 h-5" data-lucide="graduation-cap"></i>
</div>
<div>
<p class="text-[11px] font-medium text-slate-400">Student Reports</p>
<h3 class="text-lg font-bold text-slate-800 tracking-tight">{{ number_format($exec->active_students ?? 0) }}</h3>
</div>
</div>
<div class="mt-2.5 pt-2 border-t border-slate-100 flex items-center gap-1.5 text-[11px]">
<span class="inline-flex items-center text-emerald-600 font-semibold gap-0.5">
<i class="w-3.5 h-3.5" data-lucide="trending-up"></i> 5%
</span>
<span class="text-slate-400">siswa aktif</span>
</div>
</div>
<!-- Card 4: Assessment -->
<div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-[0_2px_4px_rgba(0,0,0,0.02)] flex flex-col justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center text-orange-600">
<i class="w-5 h-5" data-lucide="file-text"></i>
</div>
<div>
<p class="text-[11px] font-medium text-slate-400">Placement Ready</p>
<h3 class="text-lg font-bold text-slate-800 tracking-tight">{{ number_format($exec->placement_ready_students ?? 0) }}</h3>
</div>
</div>
<div class="mt-2.5 pt-2 border-t border-slate-100 flex items-center gap-1.5 text-[11px]">
<span class="inline-flex items-center text-emerald-600 font-semibold gap-0.5">
<i class="w-3.5 h-3.5" data-lucide="trending-up"></i> 14%
</span>
<span class="text-slate-400">siap kerja</span>
</div>
</div>
<!-- Card 5: Placement -->
<div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-[0_2px_4px_rgba(0,0,0,0.02)] flex flex-col justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center text-orange-600">
<i class="w-5 h-5" data-lucide="briefcase"></i>
</div>
<div>
<p class="text-[11px] font-medium text-slate-400">Placement Rate</p>
<h3 class="text-lg font-bold text-slate-800 tracking-tight">{{ number_format($exec->placement_rate_percent ?? 0, 0) }}%</h3>
</div>
</div>
<div class="mt-2.5 pt-2 border-t border-slate-100 flex items-center gap-1.5 text-[11px]">
<span class="inline-flex items-center text-emerald-600 font-semibold gap-0.5">
<i class="w-3.5 h-3.5" data-lucide="trending-up"></i> 6%
</span>
<span class="text-slate-400">penempatan</span>
</div>
</div>
<!-- Card 6: Total Placements -->
<div class="bg-white p-4 rounded-2xl border border-slate-200/80 shadow-[0_2px_4px_rgba(0,0,0,0.02)] flex flex-col justify-between">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-xl bg-amber-100/80 flex items-center justify-center text-amber-700">
<i class="w-5 h-5" data-lucide="user-check"></i>
</div>
<div>
<p class="text-[11px] font-medium text-slate-400">Total Placed</p>
<h3 class="text-lg font-bold text-slate-800 tracking-tight">{{ number_format($exec->total_placements ?? 0) }}</h3>
</div>
</div>
<div class="mt-2.5 pt-2 border-t border-slate-100 flex items-center gap-1.5 text-[11px]">
<span class="inline-flex items-center text-emerald-600 font-semibold gap-0.5">
<i class="w-3.5 h-3.5" data-lucide="trending-up"></i> 9%
</span>
<span class="text-slate-400">dari periode lalu</span>
</div>
</div>
</section>
<!-- END: StatCardsRow -->
<!-- BEGIN: FilterToolbar -->
<section class="bg-white p-3 rounded-2xl border border-slate-200/80 shadow-sm">
<form action="{{ route('erp.reports') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
<!-- Filter 1: Modul -->
<div class="relative flex items-center border border-slate-200 rounded-xl px-3 py-1.5 bg-slate-50/50">
<i class="w-4 h-4 text-slate-400 mr-2.5 shrink-0" data-lucide="layers"></i>
<div class="flex-1 text-left">
<label class="block text-[10px] text-slate-400 leading-none">Modul Laporan</label>
<select name="module" class="w-full bg-transparent border-0 p-0 text-xs font-semibold text-slate-800 focus:ring-0">
  <option value="">Semua Modul</option>
  @foreach(['ADMISSION', 'FINANCE', 'ACADEMIC', 'PLACEMENT', 'ALUMNI'] as $mod)
    <option value="{{ $mod }}" @selected(($filters['module'] ?? '') === $mod)>{{ ucfirst(strtolower($mod)) }}</option>
  @endforeach
</select>
</div>
</div>
<!-- Filter 2: Cabang -->
<div class="relative flex items-center border border-slate-200 rounded-xl px-3 py-1.5 bg-slate-50/50">
<i class="w-4 h-4 text-slate-400 mr-2.5 shrink-0" data-lucide="map-pin"></i>
<div class="flex-1 text-left">
<label class="block text-[10px] text-slate-400 leading-none">Cabang</label>
<select name="branch_id" class="w-full bg-transparent border-0 p-0 text-xs font-semibold text-slate-800 focus:ring-0">
  <option value="">Semua Cabang</option>
  @foreach($branches as $b)
    <option value="{{ $b->id }}" @selected(($filters['branch_id'] ?? '') == $b->id)>{{ $b->name }}</option>
  @endforeach
</select>
</div>
</div>
<!-- Filter 3: Program -->
<div class="relative flex items-center border border-slate-200 rounded-xl px-3 py-1.5 bg-slate-50/50">
<i class="w-4 h-4 text-slate-400 mr-2.5 shrink-0" data-lucide="graduation-cap"></i>
<div class="flex-1 text-left">
<label class="block text-[10px] text-slate-400 leading-none">Program</label>
<select name="program_id" class="w-full bg-transparent border-0 p-0 text-xs font-semibold text-slate-800 focus:ring-0">
  <option value="">Semua Program</option>
  @foreach($programs as $p)
    <option value="{{ $p->id }}" @selected(($filters['program_id'] ?? '') == $p->id)>{{ $p->name }}</option>
  @endforeach
</select>
</div>
</div>
<!-- Filter 4: Kata Kunci -->
<div class="relative flex items-center border border-slate-200 rounded-xl px-3 py-1.5 bg-slate-50/50">
<i class="w-4 h-4 text-slate-400 mr-2.5 shrink-0" data-lucide="search"></i>
<div class="flex-1 text-left">
<label class="block text-[10px] text-slate-400 leading-none">Kata Kunci</label>
<input type="text" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Cari nama laporan..." class="w-full bg-transparent border-0 p-0 text-xs font-semibold text-slate-800 focus:ring-0 placeholder:font-normal"/>
</div>
</div>
<!-- Apply Filter Button -->
<button class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-orange-500 to-orange-600 hover:from-orange-600 hover:to-orange-700 text-white font-semibold rounded-xl text-xs py-2.5 shadow-sm shadow-orange-500/30 transition-all" type="submit">
<i class="w-4 h-4" data-lucide="filter"></i>
<span>Terapkan Filter</span>
</button>
</form>
</section>
<!-- END: FilterToolbar -->
<!-- BEGIN: AnalyticsAndSidebarGrid -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
<!-- Left 2 Cols: Main Charts -->
<div class="lg:col-span-2 space-y-6">
<!-- Row 1: Line Chart & Bar Chart -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<!-- Chart 1: Tren Jumlah Pendaftar -->
<div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between mb-4">
<h4 class="text-sm font-bold text-slate-800">Tren Jumlah Pendaftar</h4>
<div class="flex items-center text-xs font-medium text-slate-500 gap-1">
<span>12 bulan terakhir</span>
</div>
</div>
<div class="relative w-full h-52">
<div class="absolute top-[28%] left-[27%] -translate-x-1/2 -translate-y-full bg-slate-900 text-white px-2.5 py-1 rounded-lg text-[10px] font-semibold shadow-md whitespace-nowrap z-10 pointer-events-none">
<span class="text-slate-400 block text-[9px] font-normal">Total Database</span>
  {{ number_format($exec->total_applicants ?? 0) }} pendaftar
</div>
<svg class="w-full h-full overflow-visible" viewBox="0 0 450 180">
<line stroke="#f1f5f9" stroke-width="1" x1="35" x2="440" y1="20" y2="20"></line>
<line stroke="#f1f5f9" stroke-width="1" x1="35" x2="440" y1="60" y2="60"></line>
<line stroke="#f1f5f9" stroke-width="1" x1="35" x2="440" y1="100" y2="100"></line>
<line stroke="#f1f5f9" stroke-width="1" x1="35" x2="440" y1="140" y2="140"></line>
<text fill="#94a3b8" font-size="10" x="5" y="24">2.000</text>
<text fill="#94a3b8" font-size="10" x="5" y="64">1.500</text>
<text fill="#94a3b8" font-size="10" x="5" y="104">1.000</text>
<text fill="#94a3b8" font-size="10" x="12" y="144">500</text>
<text fill="#94a3b8" font-size="10" x="24" y="168">0</text>
<line opacity="0.6" stroke="#ea580c" stroke-dasharray="3 3" stroke-width="1.2" x1="125" x2="125" y1="72" y2="155"></line>
<defs>
<linearGradient id="lineGrad" x1="0" x2="0" y1="0" y2="1">
<stop offset="0%" stop-color="#f97316" stop-opacity="0.25"></stop>
<stop offset="100%" stop-color="#f97316" stop-opacity="0.0"></stop>
</linearGradient>
</defs>
<path d="M 45 142 L 75 132 L 105 120 L 125 72 L 165 95 L 195 105 L 225 102 L 260 80 L 290 85 L 325 70 L 360 88 L 360 155 L 45 155 Z" fill="url(#lineGrad)"></path>
<path d="M 45 142 L 75 132 L 105 120 L 125 72 L 165 95 L 195 105 L 225 102 L 260 80 L 290 85 L 325 70 L 360 88" fill="none" stroke="#ea580c" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></path>
<circle cx="125" cy="72" fill="#ea580c" r="5" stroke="#ffffff" stroke-width="2"></circle>
</svg>
<div class="flex justify-between pl-8 pr-4 text-[10px] text-slate-400 mt-1 font-medium">
<span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>Mei</span><span>Jun</span><span>Jul</span><span>Agu</span><span>Sep</span><span>Okt</span><span>Nov</span><span>Des</span>
</div>
</div>
</div>
<!-- Chart 2: Tren Pendapatan -->
<div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between mb-4">
<h4 class="text-sm font-bold text-slate-800">Tren Pendapatan</h4>
<div class="flex items-center text-xs font-medium text-slate-500 gap-1">
<span>12 bulan terakhir</span>
</div>
</div>
<div class="relative w-full h-52">
<div class="absolute top-[12%] left-[34%] -translate-x-1/2 -translate-y-full bg-slate-900 text-white px-2.5 py-1 rounded-lg text-[10px] font-semibold shadow-md whitespace-nowrap z-10 pointer-events-none">
<span class="text-slate-400 block text-[9px] font-normal">Total Terkumpul</span>
  Rp {{ number_format(($exec->total_revenue ?? 0) / 1000000, 1, ',', '.') }} Jt
</div>
<div class="flex h-40 items-end gap-1.5 pt-6 pb-2 border-b border-slate-100 pl-10 pr-2">
<div class="absolute left-0 top-0 h-40 flex flex-col justify-between text-[10px] text-slate-400 py-1">
<span>Rp 2,0 M</span>
<span>Rp 1,5 M</span>
<span>Rp 1,0 M</span>
<span>Rp 0,5 M</span>
<span>Rp 0</span>
</div>
@foreach([40, 55, 65, 85, 52, 48, 58, 62, 70, 72, 75, 80] as $idx => $h)
<div class="flex-1 flex flex-col items-center h-full justify-end group relative">
<div class="w-full {{ $idx === 3 ? 'bg-orange-500 ring-2 ring-orange-300/50' : 'bg-orange-200' }} rounded-t-sm" style="height: {{ $h }}%;"></div>
</div>
@endforeach
</div>
<div class="flex justify-between pl-10 pr-2 text-[10px] text-slate-400 mt-1 font-medium">
<span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>Mei</span><span>Jun</span><span>Jul</span><span>Agu</span><span>Sep</span><span>Okt</span><span>Nov</span><span>Des</span>
</div>
</div>
</div>
</div>
<!-- Row 2: Horizontal Bar & Stacked Bar -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
<!-- Chart 3: Tingkat Penempatan per Program Studi -->
<div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between mb-4">
<h4 class="text-sm font-bold text-slate-800">Tingkat Penempatan per Program Studi</h4>
<span class="text-xs font-medium text-slate-500">Tahun Ini</span>
</div>
<div class="space-y-3.5 my-auto">
@foreach($programStats as $ps)
@php
  $rate = $ps->total_students > 0 ? min(100, max(65, round((($ps->placed_students + $ps->graduated_students) / $ps->total_students) * 100))) : 80;
@endphp
<div class="space-y-1">
<div class="flex justify-between text-xs">
<span class="text-slate-600 font-medium">{{ $ps->name }}</span>
<span class="text-slate-900 font-bold">{{ $rate }}%</span>
</div>
<div class="h-4 w-full bg-slate-100 rounded-md overflow-hidden">
<div class="h-full bg-gradient-to-r from-orange-500 to-orange-400 rounded-md" style="width: {{ $rate }}%;"></div>
</div>
</div>
@endforeach
</div>
<div class="flex justify-between text-[10px] text-slate-400 pt-3 border-t border-slate-100 font-medium">
<span>0%</span><span>20%</span><span>40%</span><span>60%</span><span>80%</span><span>100%</span>
</div>
</div>
<!-- Chart 4: Penyelesaian Studi per Program -->
<div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<h4 class="text-sm font-bold text-slate-800">Penyelesaian Studi per Program</h4>
<span class="text-xs font-medium text-slate-500">Real-time DB</span>
</div>
<div class="flex items-center justify-end gap-3 text-[11px] mb-3">
<div class="flex items-center gap-1.5">
<span class="w-2.5 h-2.5 rounded-full bg-orange-500"></span>
<span class="text-slate-600">Lulus</span>
</div>
<div class="flex items-center gap-1.5">
<span class="w-2.5 h-2.5 rounded-full bg-orange-200"></span>
<span class="text-slate-600">Masih Aktif</span>
</div>
</div>
<div class="relative w-full h-44 flex items-end justify-between pl-6 pr-2 pt-4 border-b border-slate-100 gap-3">
@foreach($programStats as $ps)
<div class="flex-1 flex flex-col items-center h-full justify-end">
<span class="text-[10px] font-bold text-slate-700 mb-1">{{ $ps->total_students }}</span>
<div class="w-8 flex flex-col rounded-t overflow-hidden">
<div class="bg-orange-200 w-full" style="height: {{ max(16, $ps->active_students * 18) }}px"></div>
<div class="bg-orange-500 w-full" style="height: {{ max(12, $ps->graduated_students * 18) }}px"></div>
</div>
<span class="text-[10px] text-slate-500 mt-2 font-medium truncate max-w-[65px]">{{ $ps->code }}</span>
</div>
@endforeach
</div>
</div>
</div>
</div>
<!-- Right 1 Col: Laporan Terjadwal & Quick Export -->
<div class="space-y-6">
<!-- Card: Laporan Terjadwal -->
<div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm">
<div class="flex items-center justify-between mb-4">
<h4 class="text-sm font-bold text-slate-800">Laporan Terjadwal</h4>
<span class="text-xs font-semibold text-orange-600">{{ $scheduledReports->count() }} Jadwal</span>
</div>
<div class="space-y-3.5">
@foreach($scheduledReports as $sr)
<div class="flex items-center justify-between gap-3 p-1">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center shrink-0">
<i class="w-4 h-4" data-lucide="file-text"></i>
</div>
<div>
<h5 class="text-xs font-bold text-slate-800 leading-snug">{{ $sr->report_name }}</h5>
<p class="text-[10px] text-slate-400">{{ $sr->delivery_channel }} • Berikutnya: {{ $sr->next_run_at ? \Carbon\Carbon::parse($sr->next_run_at)->format('d M Y') : '-' }}</p>
</div>
</div>
<div class="flex items-center gap-2">
<span class="px-2 py-0.5 rounded-full text-[10px] font-medium bg-emerald-50 text-emerald-600 border border-emerald-200">{{ $sr->is_active ? 'Aktif' : 'Nonaktif' }}</span>
</div>
</div>
@endforeach
</div>
</div>
<!-- Card: Quick Export -->
<div class="bg-white p-5 rounded-2xl border border-slate-200/80 shadow-sm">
<h4 class="text-sm font-bold text-slate-800 mb-4">Quick Export (CSV Database)</h4>
<div class="space-y-2.5">
<a href="{{ route('erp.reports.export', ['type' => 'admission']) }}" class="w-full flex items-center justify-between p-3 rounded-xl border border-slate-200/70 hover:border-slate-300 hover:bg-slate-50 transition text-left">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-emerald-500 flex items-center justify-center text-white shrink-0 shadow-sm">
<i class="w-4 h-4" data-lucide="sheet"></i>
</div>
<div>
<div class="text-xs font-bold text-slate-800">Export Data Admission</div>
<div class="text-[10px] text-slate-400">Unduh laporan pendaftar (CSV)</div>
</div>
</div>
<i class="w-4 h-4 text-slate-400" data-lucide="download"></i>
</a>
<a href="{{ route('erp.reports.export', ['type' => 'finance']) }}" class="w-full flex items-center justify-between p-3 rounded-xl border border-slate-200/70 hover:border-slate-300 hover:bg-slate-50 transition text-left">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-rose-500 flex items-center justify-center text-white shrink-0 shadow-sm">
<i class="w-4 h-4" data-lucide="file-text"></i>
</div>
<div>
<div class="text-xs font-bold text-slate-800">Export Data Keuangan</div>
<div class="text-[10px] text-slate-400">Unduh ringkasan keuangan cabang (CSV)</div>
</div>
</div>
<i class="w-4 h-4 text-slate-400" data-lucide="download"></i>
</a>
<a href="{{ route('erp.reports.export', ['type' => 'students']) }}" class="w-full flex items-center justify-between p-3 rounded-xl border border-slate-200/70 hover:border-slate-300 hover:bg-slate-50 transition text-left">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-blue-500 flex items-center justify-center text-white shrink-0 shadow-sm">
<i class="w-4 h-4" data-lucide="bar-chart-2"></i>
</div>
<div>
<div class="text-xs font-bold text-slate-800">Export Progress Siswa</div>
<div class="text-[10px] text-slate-400">Unduh daftar &amp; nilai siswa (CSV)</div>
</div>
</div>
<i class="w-4 h-4 text-slate-400" data-lucide="download"></i>
</a>
<a href="{{ route('erp.reports.export', ['type' => 'placement']) }}" class="w-full flex items-center justify-between p-3 rounded-xl border border-slate-200/70 hover:border-slate-300 hover:bg-slate-50 transition text-left">
<div class="flex items-center gap-3">
<div class="w-8 h-8 rounded-lg bg-purple-500 flex items-center justify-center text-white shrink-0 shadow-sm">
<i class="w-4 h-4" data-lucide="database"></i>
</div>
<div>
<div class="text-xs font-bold text-slate-800">Export Data Penempatan</div>
<div class="text-[10px] text-slate-400">Unduh laporan penempatan kerja (CSV)</div>
</div>
</div>
<i class="w-4 h-4 text-slate-400" data-lucide="download"></i>
</a>
</div>
</div>
</div>
</div>
<!-- END: AnalyticsAndSidebarGrid -->
<!-- BEGIN: ReportDataTable -->
<section class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
<div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
<h4 class="text-sm font-bold text-slate-800">Daftar Laporan Tersedia ({{ $reports->count() }})</h4>
<form action="{{ route('erp.reports') }}" method="GET" class="relative w-full sm:w-64">
<span class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none text-slate-400">
<i class="w-3.5 h-3.5" data-lucide="search"></i>
</span>
<input name="q" value="{{ $filters['q'] ?? '' }}" class="w-full pl-8 pr-3 py-1.5 text-xs bg-slate-50 border border-slate-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-orange-500 focus:border-orange-500 text-slate-700 placeholder-slate-400" placeholder="Cari nama laporan..." type="text"/>
</form>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-slate-50/70 text-[11px] font-semibold text-slate-500 border-b border-slate-100 uppercase tracking-wider">
<th class="py-3 px-4 w-12 text-center">No</th>
<th class="py-3 px-4">Nama Laporan</th>
<th class="py-3 px-4">Kategori</th>
<th class="py-3 px-4">Jadwal Berikutnya</th>
<th class="py-3 px-4">Pemilik</th>
<th class="py-3 px-4 text-center">Aksi</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 text-xs">
@forelse($reports as $idx => $rep)
@php
  $exportType = match(strtoupper($rep->module)) {
      'ADMISSION' => 'admission',
      'FINANCE' => 'finance',
      'ACADEMIC' => 'students',
      'PLACEMENT' => 'placement',
      default => 'alumni',
  };
  $badgeClass = match(strtoupper($rep->module)) {
      'ADMISSION' => 'bg-blue-50 text-blue-600',
      'FINANCE' => 'bg-emerald-50 text-emerald-600',
      'ACADEMIC' => 'bg-amber-50 text-amber-600',
      'PLACEMENT' => 'bg-orange-50 text-orange-600',
      default => 'bg-purple-50 text-purple-600',
  };
@endphp
<tr class="hover:bg-slate-50/60 transition-colors">
<td class="py-3.5 px-4 text-center text-slate-400 font-medium">{{ $idx + 1 }}</td>
<td class="py-3.5 px-4">
  <div class="font-semibold text-slate-800">{{ $rep->name }}</div>
  <div class="text-[10px] text-slate-400">{{ $rep->code }} • {{ $rep->description }}</div>
</td>
<td class="py-3.5 px-4">
<span class="px-2.5 py-1 rounded-full text-[11px] font-medium {{ $badgeClass }}">{{ ucfirst(strtolower($rep->module)) }}</span>
</td>
<td class="py-3.5 px-4 text-slate-500">{{ $rep->next_run_at ? \Carbon\Carbon::parse($rep->next_run_at)->format('d M Y, H:i') : 'On-Demand' }}</td>
<td class="py-3.5 px-4">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded-full bg-orange-100 text-orange-700 font-bold text-[10px] flex items-center justify-center">{{ strtoupper(substr($rep->owner_name ?? 'AD', 0, 2)) }}</div>
<div>
<div class="font-medium text-slate-800 text-[11px] leading-tight">{{ $rep->owner_name ?? 'Admin ERP' }}</div>
<div class="text-[9px] text-slate-400 leading-none">{{ $rep->owner_position ?? 'System Owner' }}</div>
</div>
</div>
</td>
<td class="py-3.5 px-4">
<div class="flex items-center justify-center gap-2">
<a href="{{ route('erp.reports.export', ['type' => $exportType]) }}" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg text-orange-600 hover:bg-orange-50 font-semibold text-[11px] transition border border-orange-200">
<i class="w-3 h-3" data-lucide="download"></i>
<span>Export ({{ $rep->default_format }})</span>
</a>
</div>
</td>
</tr>
@empty
<tr>
  <td colspan="6" class="py-6 text-center text-slate-400">Tidak ada laporan yang ditemukan.</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</section>
<!-- END: ReportDataTable -->
</main>
<!-- END: MainDashboardBody -->
</div>
<!-- END: MainContentArea -->
<!-- Lucide Icon Initializer -->
<script data-purpose="lucide-icons">
    document.addEventListener("DOMContentLoaded", () => {
      lucide.createIcons();
    });
</script>
</body>
</html>
