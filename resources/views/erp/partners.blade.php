<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Industry Partners - IDEA ERP</title>
<!-- Tailwind CSS v3 with Plugins -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Google Fonts: Plus Jakarta Sans -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<!-- Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>
<!-- Tailwind Config -->
<script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'sans-serif'],
          },
          colors: {
            brand: {
              50: '#fff7ed',
              100: '#ffedd5',
              500: '#f97316',
              600: '#ea580c',
              primary: '#FF5722',
            }
          }
        }
      }
    }
</script>
<!-- Custom CSS for specific aesthetic touches -->
<style data-purpose="custom-styling">
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-color: #F8F9FB;
      color: #1F2937;
    }
    .donut-slice {
      transition: stroke-width 0.2s ease, opacity 0.2s ease;
    }
    .donut-slice:hover {
      opacity: 0.9;
    }
    .custom-scrollbar::-webkit-scrollbar {
      height: 6px;
      width: 6px;
    }
    .custom-scrollbar::-webkit-scrollbar-track {
      background: #f1f5f9;
      border-radius: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 4px;
    }
</style>
</head>
<body class="flex min-h-screen antialiased bg-[#F8F9FB]">
<!-- BEGIN: Sidebar -->
<aside class="w-64 bg-white border-r border-slate-100 flex flex-col justify-between flex-shrink-0 min-h-screen p-4 select-none" data-purpose="sidebar-navigation">
<div>
<!-- Brand Logo Header -->
<div class="flex items-center justify-between px-3 py-3 mb-6">
<a href="{{ route('erp.dashboard') }}" class="flex items-center gap-3">
<div class="w-9 h-9 rounded-full bg-gradient-to-tr from-orange-600 to-amber-400 flex items-center justify-center shadow-md shadow-orange-500/20 text-white font-bold text-lg">
<svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
<circle cx="12" cy="12" r="9"></circle>
<circle cx="12" cy="12" fill="currentColor" r="4"></circle>
</svg>
</div>
<div>
<h1 class="text-base font-extrabold tracking-tight text-slate-900 leading-none">IDEA ERP</h1>
<p class="text-[10px] text-slate-400 font-medium tracking-tight mt-0.5">Education for a Brighter Tomorrow</p>
</div>
</a>
<button class="text-slate-400 hover:text-slate-600 transition-colors p-1 rounded-md hover:bg-slate-50">
<i class="w-4 h-4" data-lucide="chevron-left"></i>
</button>
</div>
<!-- Navigation Menu -->
<nav class="space-y-1 text-sm font-medium">
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.dashboard') }}">
<i class="w-5 h-5 text-slate-400" data-lucide="layout-grid"></i>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.admission') }}">
<i class="w-5 h-5 text-slate-400" data-lucide="user-plus"></i>
<span>Admission</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.finance') }}">
<i class="w-5 h-5 text-slate-400" data-lucide="receipt"></i>
<span>Finance</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.students') }}">
<i class="w-5 h-5 text-slate-400" data-lucide="users-2"></i>
<span>Student Management</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.assessments') }}">
<i class="w-5 h-5 text-slate-400" data-lucide="file-check-2"></i>
<span>Assessment &amp; Certification</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.placements') }}">
<i class="w-5 h-5 text-slate-400" data-lucide="briefcase"></i>
<span>Career &amp; Placement</span>
</a>
<!-- Active Item: Partners -->
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl bg-brand-primary text-white font-semibold shadow-md shadow-orange-500/25" href="{{ route('erp.partners') }}">
<i class="w-5 h-5 text-white" data-lucide="handshake"></i>
<span>Partners</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.alumni') }}">
<i class="w-5 h-5 text-slate-400" data-lucide="graduation-cap"></i>
<span>Alumni</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.reports') }}">
<i class="w-5 h-5 text-slate-400" data-lucide="bar-chart-2"></i>
<span>Reports</span>
</a>
</nav>
</div>
<!-- Promo Banner in Sidebar Bottom -->
<div class="mt-8 rounded-2xl bg-gradient-to-b from-orange-50/60 to-orange-100/70 p-4 border border-orange-100 relative overflow-hidden text-center" data-purpose="sidebar-promo-card">
<div class="relative z-10">
<div class="w-24 h-24 mx-auto mb-2 flex items-center justify-center">
<div class="relative w-20 h-20 bg-orange-200/80 rounded-full flex items-center justify-center overflow-hidden">
<i class="w-12 h-12 text-orange-600 stroke-[1.5]" data-lucide="award"></i>
</div>
</div>
<h4 class="font-bold text-sm text-brand-primary leading-snug">Membangun Talenta Global dari Indonesia</h4>
<p class="text-[11px] text-slate-600 mt-1 leading-normal">Pendidikan, peluang dan masa depan yang lebih baik.</p>
<a href="{{ route('erp.placements') }}" class="mt-3.5 w-full bg-brand-primary hover:bg-orange-600 text-white font-semibold text-xs py-2 px-3 rounded-xl flex items-center justify-center gap-1.5 transition-all shadow-sm">
<span>Bersama IDEA ERP</span>
<i class="w-3.5 h-3.5" data-lucide="arrow-right"></i>
</a>
</div>
</div>
</aside>
<!-- END: Sidebar -->
<!-- BEGIN: MainContent -->
<main class="flex-1 flex flex-col min-w-0 overflow-y-auto">
<!-- BEGIN: TopBar -->
<header class="bg-white border-b border-slate-100 px-8 py-3.5 flex items-center justify-between sticky top-0 z-20" data-purpose="topbar">
<!-- Search Input -->
<form action="{{ route('erp.partners') }}" method="GET" class="w-full max-w-lg relative">
<i class="w-4 h-4 text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2" data-lucide="search"></i>
<input name="q" value="{{ $filters['q'] ?? '' }}" class="w-full pl-10 pr-4 py-2 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-400/20 focus:border-brand-primary text-slate-700 placeholder:text-slate-400 transition" placeholder="Cari data partner, kategori, atau lokasi..." type="text"/>
</form>
<!-- User & Notification Area -->
<div class="flex items-center gap-5">
<!-- Notification Bell -->
<button class="relative p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-50 rounded-full transition" title="{{ $notifications->count() }} notifikasi">
<i class="w-5 h-5" data-lucide="bell"></i>
<span class="absolute top-1.5 right-1.5 w-2 h-2 bg-brand-primary rounded-full border-2 border-white"></span>
</button>
<!-- User Profile -->
<div class="flex items-center gap-3 pl-2 border-l border-slate-100 cursor-pointer">
<div class="w-9 h-9 rounded-full ring-2 ring-orange-100 overflow-hidden bg-slate-200">
<div class="w-full h-full bg-gradient-to-tr from-amber-600 to-rose-400 flex items-center justify-center text-white font-bold text-xs">
  {{ strtoupper(substr($currentUser->full_name ?? 'SA', 0, 2)) }}
</div>
</div>
<div class="text-left leading-tight hidden sm:block">
<span class="block text-xs font-bold text-slate-800">{{ $currentUser->full_name ?? 'Sari Anggraini' }}</span>
<span class="block text-[11px] text-slate-400 font-medium">{{ $currentUser->position_title ?? 'Head of Administration' }}</span>
</div>
<i class="w-4 h-4 text-slate-400 ml-1" data-lucide="chevron-down"></i>
</div>
</div>
</header>
<!-- END: TopBar -->

@if(session('success'))
<div class="mx-8 mt-4 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl text-xs font-semibold flex items-center justify-between shadow-sm">
  <span>{{ session('success') }}</span>
  <button onclick="this.parentElement.remove()" class="text-emerald-500 hover:text-emerald-800">&times;</button>
</div>
@endif

<!-- Page Body Container -->
<div class="p-8 space-y-6">
<!-- BEGIN: PageHeaderWithBanner -->
<div class="bg-gradient-to-r from-orange-50/70 via-amber-50/40 to-transparent rounded-2xl p-6 border border-orange-100/60 relative overflow-hidden flex flex-col md:flex-row md:items-center justify-between gap-4">
<div>
<h2 class="text-2xl font-extrabold text-slate-900 tracking-tight">Industry Partners</h2>
<p class="text-xs text-slate-500 mt-1 max-w-xl">
  Kelola kemitraan industri, peluang kerja, dan kolaborasi untuk penempatan siswa.
</p>
</div>
<div class="flex items-center gap-6 z-10">
<div class="text-right">
<div class="text-xs font-bold text-slate-800">{{ now()->translatedFormat('l, d M Y') }}</div>
<p class="text-[11px] text-slate-500">Memperluas jaringan untuk masa depan yang lebih cerah.</p>
</div>
<div class="hidden lg:block border-l border-orange-200/80 pl-6 text-right">
<span class="text-xs font-semibold text-slate-700 block">Global Partners</span>
<span class="text-xs font-bold text-brand-primary block leading-none my-0.5">Local Talents</span>
<span class="text-[10px] text-slate-400 font-medium block">A Brighter Tomorrow</span>
</div>
</div>
</div>
<!-- END: PageHeaderWithBanner -->
<!-- BEGIN: KPIStats -->
<section class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4" data-purpose="kpi-metrics-grid">
<!-- Metric 1 -->
<div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex flex-col justify-between">
<div class="flex items-center gap-2.5 mb-2">
<div class="w-8 h-8 rounded-xl bg-orange-50 text-brand-primary flex items-center justify-center">
<i class="w-4 h-4" data-lucide="users"></i>
</div>
<span class="text-[11px] font-semibold text-slate-500 leading-tight">Total Partners</span>
</div>
<div>
<div class="text-2xl font-extrabold text-slate-900 leading-none">{{ number_format($kpis['total_partners']) }}</div>
<div class="flex items-center gap-1 mt-1.5 text-[10px] font-medium text-emerald-600">
<i class="w-3 h-3 stroke-[2.5]" data-lucide="arrow-up"></i>
<span class="font-bold">12%</span>
<span class="text-slate-400 font-normal">dari tahun lalu</span>
</div>
</div>
</div>
<!-- Metric 2 -->
<div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex flex-col justify-between">
<div class="flex items-center gap-2.5 mb-2">
<div class="w-8 h-8 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center">
<i class="w-4 h-4" data-lucide="briefcase"></i>
</div>
<span class="text-[11px] font-semibold text-slate-500 leading-tight">Active Hiring Partners</span>
</div>
<div>
<div class="text-2xl font-extrabold text-slate-900 leading-none">{{ number_format($kpis['active_partners']) }}</div>
<div class="flex items-center gap-1 mt-1.5 text-[10px] font-medium text-emerald-600">
<i class="w-3 h-3 stroke-[2.5]" data-lucide="arrow-up"></i>
<span class="font-bold">8%</span>
<span class="text-slate-400 font-normal">dari tahun lalu</span>
</div>
</div>
</div>
<!-- Metric 3 -->
<div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex flex-col justify-between">
<div class="flex items-center gap-2.5 mb-2">
<div class="w-8 h-8 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center">
<i class="w-4 h-4" data-lucide="file-text"></i>
</div>
<span class="text-[11px] font-semibold text-slate-500 leading-tight">Open Job Demands</span>
</div>
<div>
<div class="text-2xl font-extrabold text-slate-900 leading-none">{{ number_format($kpis['open_demands']) }}</div>
<div class="flex items-center gap-1 mt-1.5 text-[10px] font-medium text-emerald-600">
<i class="w-3 h-3 stroke-[2.5]" data-lucide="arrow-up"></i>
<span class="font-bold">25%</span>
<span class="text-slate-400 font-normal">dari tahun lalu</span>
</div>
</div>
</div>
<!-- Metric 4 -->
<div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex flex-col justify-between">
<div class="flex items-center gap-2.5 mb-2">
<div class="w-8 h-8 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center">
<i class="w-4 h-4" data-lucide="bar-chart"></i>
</div>
<span class="text-[11px] font-semibold text-slate-500 leading-tight">Placement This Year</span>
</div>
<div>
<div class="text-2xl font-extrabold text-slate-900 leading-none">{{ number_format($kpis['placements_this_year']) }}</div>
<div class="flex items-center gap-1 mt-1.5 text-[10px] font-medium text-emerald-600">
<i class="w-3 h-3 stroke-[2.5]" data-lucide="arrow-up"></i>
<span class="font-bold">18%</span>
<span class="text-slate-400 font-normal">dari tahun lalu</span>
</div>
</div>
</div>
<!-- Metric 5 -->
<div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex flex-col justify-between">
<div class="flex items-center gap-2.5 mb-2">
<div class="w-8 h-8 rounded-xl bg-rose-50 text-rose-500 flex items-center justify-center">
<i class="w-4 h-4" data-lucide="globe"></i>
</div>
<span class="text-[11px] font-semibold text-slate-500 leading-tight">International Partners</span>
</div>
<div>
<div class="text-2xl font-extrabold text-slate-900 leading-none">{{ number_format($kpis['intl_partners']) }}</div>
<div class="flex items-center gap-1 mt-1.5 text-[10px] font-medium text-emerald-600">
<i class="w-3 h-3 stroke-[2.5]" data-lucide="arrow-up"></i>
<span class="font-bold">19%</span>
<span class="text-slate-400 font-normal">dari tahun lalu</span>
</div>
</div>
</div>
<!-- Metric 6 -->
<div class="bg-white rounded-2xl p-4 border border-slate-100 shadow-sm flex flex-col justify-between">
<div class="flex items-center gap-2.5 mb-2">
<div class="w-8 h-8 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center">
<i class="w-4 h-4" data-lucide="calendar"></i>
</div>
<span class="text-[11px] font-semibold text-slate-500 leading-tight">Partnership Renewal Due</span>
</div>
<div>
<div class="text-2xl font-extrabold text-slate-900 leading-none">{{ number_format($kpis['renewal_due']) }}</div>
<div class="flex items-center gap-1 mt-1.5 text-[10px] font-medium text-rose-600">
<i class="w-3 h-3 stroke-[2.5]" data-lucide="arrow-up"></i>
<span class="font-bold">50%</span>
<span class="text-slate-400 font-normal">dalam 3 bulan</span>
</div>
</div>
</div>
</section>
<!-- END: KPIStats -->
<!-- BEGIN: MidSectionChartsAndRanks -->
<section class="grid grid-cols-1 lg:grid-cols-12 gap-6" data-purpose="analytics-overview">
<!-- Left: Donut Chart Distribution (7 cols) -->
<div class="lg:col-span-7 bg-white rounded-2xl p-6 border border-slate-100 shadow-sm">
<div class="flex items-center justify-between mb-6">
<div>
<h3 class="text-sm font-bold text-slate-900">Distribusi Partner berdasarkan Kategori</h3>
<p class="text-[11px] text-slate-400 mt-0.5">Total {{ $kpis['total_partners'] }} Partners</p>
</div>
<div class="relative">
<select class="text-xs bg-slate-50 border border-slate-200 text-slate-700 py-1.5 pl-3 pr-8 rounded-xl appearance-none focus:outline-none focus:ring-1 focus:ring-orange-500">
<option>Tahun Ini</option>
<option>Tahun Lalu</option>
</select>
<i class="w-3.5 h-3.5 text-slate-400 absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none" data-lucide="chevron-down"></i>
</div>
</div>
<div class="flex flex-col sm:flex-row items-center justify-around gap-6">
<!-- SVG Donut Chart Visual Representation -->
<div class="relative w-48 h-48 flex items-center justify-center flex-shrink-0">
<svg class="w-full h-full -rotate-90" viewBox="0 0 160 160">
<circle class="donut-slice" cx="80" cy="80" fill="transparent" r="60" stroke="#f97316" stroke-dasharray="135.7 377" stroke-dashoffset="0" stroke-width="26"></circle>
<circle class="donut-slice" cx="80" cy="80" fill="transparent" r="60" stroke="#fb923c" stroke-dasharray="82.9 377" stroke-dashoffset="-135.7" stroke-width="26"></circle>
<circle class="donut-slice" cx="80" cy="80" fill="transparent" r="60" stroke="#fdba74" stroke-dasharray="67.8 377" stroke-dashoffset="-218.6" stroke-width="26"></circle>
<circle class="donut-slice" cx="80" cy="80" fill="transparent" r="60" stroke="#38bdf8" stroke-dasharray="52.7 377" stroke-dashoffset="-286.4" stroke-width="26"></circle>
<circle class="donut-slice" cx="80" cy="80" fill="transparent" r="60" stroke="#c084fc" stroke-dasharray="37.7 377" stroke-dashoffset="-339.1" stroke-width="26"></circle>
</svg>
<div class="absolute inset-0 flex flex-col items-center justify-center text-center pointer-events-none">
<span class="text-2xl font-black text-slate-800 leading-none">{{ $kpis['total_partners'] }}</span>
<span class="text-[10px] text-slate-400 font-semibold tracking-wide uppercase mt-0.5">Partners</span>
</div>
</div>
<!-- Legend and Values Breakdown -->
<div class="w-full max-w-xs space-y-3">
@php
  $catColors = ['#f97316', '#fb923c', '#fdba74', '#38bdf8', '#c084fc'];
  $totalCat = max(1, $categoryDistribution->sum('partner_count'));
@endphp
@foreach($categoryDistribution as $idx => $cat)
@php
  $pct = round(($cat->partner_count / $totalCat) * 100);
  $color = $catColors[$idx % count($catColors)];
@endphp
<div class="flex items-center justify-between text-xs">
<div class="flex items-center gap-2.5">
<span class="w-3 h-3 rounded-full" style="background-color: {{ $color }};"></span>
<span class="font-medium text-slate-700">{{ $cat->name }}</span>
</div>
<div class="flex items-center gap-4">
<span class="font-bold text-slate-900 w-6 text-right">{{ $cat->partner_count }}</span>
<span class="text-slate-400 text-[11px] w-8 text-right">{{ $pct }}%</span>
</div>
</div>
@endforeach
</div>
</div>
</div>
<!-- Right: Top Performing Partners (5 cols) -->
<div class="lg:col-span-5 bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-4">
<h3 class="text-sm font-bold text-slate-900">Top Performing Partners</h3>
<a class="text-xs font-semibold text-brand-primary hover:text-orange-700 flex items-center gap-1 transition" href="#partners-table">
<span>Lihat Semua</span>
<i class="w-3.5 h-3.5" data-lucide="arrow-right"></i>
</a>
</div>
<!-- List of Top Partners -->
<div class="space-y-3">
@foreach($partners->take(5) as $idx => $tp)
@php
  $placementVal = $tp->successful_placements > 0 ? $tp->successful_placements : ($slotsByPartner[$tp->id] ?? 10);
@endphp
<div class="flex items-center justify-between p-2 rounded-xl hover:bg-slate-50 transition">
<div class="flex items-center gap-3">
<span class="text-xs font-extrabold text-orange-500 w-4 text-center">{{ $idx + 1 }}</span>
<div class="w-8 h-8 rounded-lg bg-orange-50 border border-orange-100 flex items-center justify-center font-bold text-orange-700 text-xs">
  {{ strtoupper(substr($tp->name, 0, 2)) }}
</div>
<div>
<h5 class="text-xs font-bold text-slate-800 leading-tight">{{ $tp->name }}</h5>
<p class="text-[10px] text-slate-400">{{ $tp->category_name }} • {{ $tp->is_international ? 'International' : ($tp->country_name ?? 'Indonesia') }}</p>
</div>
</div>
<div class="text-right">
<div class="text-xs font-black text-slate-800 leading-tight">{{ $placementVal }} <span class="text-[10px] font-normal text-slate-400">Placements</span></div>
<span class="text-[10px] font-semibold text-emerald-600 flex items-center justify-end gap-0.5 mt-0.5">
<i class="w-2.5 h-2.5" data-lucide="arrow-up"></i> {{ 12 + ($idx * 2) }}%
</span>
</div>
</div>
@endforeach
</div>
</div>
</div>
</section>
<!-- END: MidSectionChartsAndRanks -->
<!-- BEGIN: BottomTableAndActivities -->
<section id="partners-table" class="grid grid-cols-1 lg:grid-cols-12 gap-6" data-purpose="partners-data-and-activities">
<!-- Table Container (8 cols) -->
<div class="lg:col-span-8 bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex flex-col justify-between">
<div>
<!-- Table Header Controls -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-5">
<h3 class="text-base font-extrabold text-slate-900 tracking-tight">Daftar Industry Partners ({{ $partners->count() }})</h3>
<div class="flex items-center gap-2.5">
<!-- Search & Filter Form -->
<form action="{{ route('erp.partners') }}" method="GET" class="flex items-center gap-2">
<div class="relative">
<i class="w-3.5 h-3.5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2" data-lucide="search"></i>
<input name="q" value="{{ $filters['q'] ?? '' }}" class="pl-8 pr-3 py-1.5 text-xs bg-slate-50 border border-slate-200 rounded-xl focus:outline-none focus:ring-1 focus:ring-orange-500 w-48 text-slate-700 placeholder:text-slate-400" placeholder="Cari nama partner, kota..." type="text"/>
</div>
<select name="category_id" onchange="this.form.submit()" class="px-3 py-1.5 text-xs font-medium text-slate-600 bg-slate-50 border border-slate-200 rounded-xl hover:bg-slate-100 transition">
<option value="">Semua Kategori</option>
@foreach($categories as $cat)
  <option value="{{ $cat->id }}" @selected(($filters['category_id'] ?? '') == $cat->id)>{{ $cat->name }}</option>
@endforeach
</select>
</form>
<!-- Add Partner Button -->
<button onclick="document.getElementById('modalAddPartner').classList.remove('hidden')" class="flex items-center gap-1.5 px-3.5 py-1.5 text-xs font-semibold text-white bg-brand-primary hover:bg-orange-600 rounded-xl shadow-sm transition">
<i class="w-3.5 h-3.5" data-lucide="plus"></i>
<span>Tambah Partner</span>
</button>
</div>
</div>
<!-- Table Responsive Wrapper -->
<div class="overflow-x-auto custom-scrollbar">
<table class="w-full text-left border-collapse min-w-[700px]">
<thead>
<tr class="border-b border-slate-100 text-[11px] font-bold text-slate-400 uppercase tracking-wider">
<th class="py-2.5 px-2">No</th>
<th class="py-2.5 px-2">Partner Name</th>
<th class="py-2.5 px-2">Category</th>
<th class="py-2.5 px-2">Country/City</th>
<th class="py-2.5 px-2">PIC</th>
<th class="py-2.5 px-2 text-center">Open Positions</th>
<th class="py-2.5 px-2 text-center">Candidates Sent</th>
<th class="py-2.5 px-2 text-center">Successful Placements</th>
<th class="py-2.5 px-2 text-center">Contract Status</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-50 text-xs font-medium text-slate-700">
@forelse($partners as $idx => $p)
@php
  $pic = isset($contactsByPartner[$p->id]) ? $contactsByPartner[$p->id]->first() : null;
  $contract = isset($contractsByPartner[$p->id]) ? $contractsByPartner[$p->id]->first() : null;
  $openPos = $slotsByPartner[$p->id] ?? ($p->open_job_demands * 5);
  $statusBadge = match($p->partnership_status) {
      'ACTIVE' => ['bg-emerald-50 text-emerald-600 border-emerald-100', 'Active'],
      'RENEWAL_DUE' => ['bg-rose-50 text-rose-600 border-rose-100', 'Renewal Due'],
      default => ['bg-orange-50 text-orange-600 border-orange-100', ucfirst(strtolower($p->partnership_status ?? 'Active'))],
  };
@endphp
<tr class="hover:bg-slate-50/70 transition">
<td class="py-3 px-2 text-slate-400 font-semibold">{{ $idx + 1 }}</td>
<td class="py-3 px-2">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded-md bg-orange-50 border border-orange-100 flex items-center justify-center text-[10px] text-orange-700 font-bold">{{ strtoupper(substr($p->name, 0, 2)) }}</div>
<span class="font-semibold text-slate-800">{{ $p->name }}</span>
</div>
</td>
<td class="py-3 px-2 text-slate-500">{{ $p->category_name ?? '-' }}</td>
<td class="py-3 px-2 text-slate-500">{{ $p->country_name ?? 'Indonesia' }}{{ $p->city_name ? ' ('.$p->city_name.')' : '' }}</td>
<td class="py-3 px-2 text-slate-600 font-normal">{{ $pic->name ?? 'HR Team' }}</td>
<td class="py-3 px-2 text-center font-bold text-slate-800">{{ $openPos }}</td>
<td class="py-3 px-2 text-center text-slate-600">{{ $p->candidate_applications }}</td>
<td class="py-3 px-2 text-center font-bold text-slate-800">{{ $p->successful_placements }}</td>
<td class="py-3 px-2 text-center">
<span class="inline-flex px-2 py-0.5 rounded-full text-[10px] font-bold border {{ $statusBadge[0] }}">{{ $statusBadge[1] }}</span>
</td>
</tr>
@empty
<tr>
  <td colspan="9" class="py-6 text-center text-slate-400">Belum ada data partner ditemukan.</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</div>
</div>
<!-- Right: Recent Activities (4 cols) -->
<div class="lg:col-span-4 bg-white rounded-2xl p-6 border border-slate-100 shadow-sm flex flex-col justify-between" data-purpose="recent-mou-activities">
<div>
<div class="flex items-center justify-between mb-5">
<h3 class="text-sm font-bold text-slate-900">Aktivitas MoU / Kontrak Terbaru</h3>
<span class="text-xs font-semibold text-brand-primary flex items-center gap-1">
<span>{{ $recentContracts->count() }} Kontrak</span>
</span>
</div>
<!-- Timeline Activity Items -->
<div class="space-y-4">
@foreach($recentContracts as $rc)
<div class="flex items-start gap-3">
<div class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center flex-shrink-0 mt-0.5">
<i class="w-4 h-4" data-lucide="file-check"></i>
</div>
<div class="flex-1">
<div class="flex items-baseline justify-between">
<h5 class="text-xs font-bold text-slate-800">{{ $rc->contract_type }} • {{ $rc->contract_no }}</h5>
<span class="text-[10px] text-slate-400">{{ \Carbon\Carbon::parse($rc->start_date)->format('d M Y') }}</span>
</div>
<p class="text-[11px] font-medium text-slate-700 mt-0.5">{{ $rc->partner_name }}</p>
<p class="text-[10px] text-slate-400">{{ $rc->title }} (s/d {{ \Carbon\Carbon::parse($rc->end_date)->format('d M Y') }})</p>
</div>
</div>
@endforeach
</div>
</div>
</div>
</section>
<!-- END: BottomTableAndActivities -->
</div>
</main>
<!-- END: MainContent -->

<!-- Modal Tambah Partner -->
<div id="modalAddPartner" class="hidden fixed inset-0 z-50 bg-slate-900/50 backdrop-blur-sm flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl max-w-md w-full p-6 shadow-xl border border-slate-100">
    <div class="flex items-center justify-between mb-4">
      <h3 class="text-base font-bold text-slate-900">Tambah Industry Partner Baru</h3>
      <button onclick="document.getElementById('modalAddPartner').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">&times;</button>
    </div>
    <form action="{{ route('erp.partners.store') }}" method="POST" class="space-y-3 text-xs">
      @csrf
      <div>
        <label class="block font-semibold text-slate-700 mb-1">Nama Perusahaan / Partner</label>
        <input type="text" name="name" required placeholder="Contoh:Mandarin Oriental Hotel" class="w-full rounded-xl border-slate-200 text-xs focus:ring-orange-500 focus:border-orange-500"/>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Kategori Industri</label>
          <select name="category_id" required class="w-full rounded-xl border-slate-200 text-xs focus:ring-orange-500 focus:border-orange-500">
            @foreach($categories as $cat)
              <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Negara</label>
          <select name="country_id" required class="w-full rounded-xl border-slate-200 text-xs focus:ring-orange-500 focus:border-orange-500">
            @foreach($countries as $c)
              <option value="{{ $c->id }}">{{ $c->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Nama PIC</label>
          <input type="text" name="pic_name" placeholder="Nama HR / PIC" class="w-full rounded-xl border-slate-200 text-xs focus:ring-orange-500 focus:border-orange-500"/>
        </div>
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Email PIC</label>
          <input type="email" name="pic_email" placeholder="hr@partner.com" class="w-full rounded-xl border-slate-200 text-xs focus:ring-orange-500 focus:border-orange-500"/>
        </div>
      </div>
      <div>
        <label class="block font-semibold text-slate-700 mb-1">Judul MoU / Kontrak Awal</label>
        <input type="text" name="contract_title" placeholder="Kerjasama Penempatan & Internship" class="w-full rounded-xl border-slate-200 text-xs focus:ring-orange-500 focus:border-orange-500"/>
      </div>
      <div class="flex justify-end gap-2 pt-3">
        <button type="button" onclick="document.getElementById('modalAddPartner').classList.add('hidden')" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 font-semibold">Batal</button>
        <button type="submit" class="px-4 py-2 rounded-xl bg-brand-primary text-white font-semibold hover:bg-orange-600">Simpan Partner</button>
      </div>
    </form>
  </div>
</div>

<!-- BEGIN: ScriptInitialization -->
<script data-purpose="lucide-icons-init">
    document.addEventListener('DOMContentLoaded', () => {
      lucide.createIcons();
    });
</script>
<!-- END: ScriptInitialization -->
</body>
</html>
