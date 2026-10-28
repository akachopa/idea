<!DOCTYPE html>
<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Career &amp; Placement - IDEA ERP</title>
<!-- Tailwind CSS v3 with Forms & Container Queries -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Google Fonts: Plus Jakarta Sans -->
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
            brand: {
              50: '#fff7ed',
              100: '#ffedd5',
              200: '#fed7aa',
              300: '#fdba74',
              400: '#fb923c',
              500: '#f97316',
              600: '#ea580c',
              700: '#c2410c',
            },
            sidebar: '#fbfbfb',
            page: '#f7f8fa',
          }
        }
      }
    }
  </script>
<style data-purpose="custom-layout">
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-color: #f7f8fa;
    }
    .pipeline-step {
      position: relative;
      clip-path: polygon(0% 0%, calc(100% - 14px) 0%, 100% 50%, calc(100% - 14px) 100%, 0% 100%, 14px 50%);
    }
    .pipeline-step.first-step {
      clip-path: polygon(0% 0%, calc(100% - 14px) 0%, 100% 50%, calc(100% - 14px) 100%, 0% 100%);
      border-top-left-radius: 0.75rem;
      border-bottom-left-radius: 0.75rem;
    }
    .pipeline-step.last-step {
      clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%, 14px 50%);
      border-top-right-radius: 0.75rem;
      border-bottom-right-radius: 0.75rem;
    }
    .custom-scroll::-webkit-scrollbar {
      height: 6px;
      width: 6px;
    }
    .custom-scroll::-webkit-scrollbar-thumb {
      background: #e2e8f0;
      border-radius: 4px;
    }
  </style>
</head>
<body class="text-slate-800 antialiased min-h-screen flex bg-[#f7f8fa]">
<!-- BEGIN: Sidebar -->
<aside class="w-[260px] bg-white border-r border-slate-200/80 flex flex-col shrink-0 min-h-screen select-none justify-between z-20">
<div>
<!-- Logo Branding -->
<div class="px-6 py-5 flex items-center justify-between">
<a href="{{ route('erp.dashboard') }}" class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full border-[3px] border-orange-500 flex items-center justify-center">
<div class="w-4 h-4 rounded-full border-[2.5px] border-orange-400"></div>
</div>
<div>
<span class="text-lg font-extrabold tracking-tight text-slate-800 leading-none block">IDEA ERP</span>
<span class="text-[10px] text-slate-400 font-medium tracking-tight leading-tight block mt-0.5">Education for<br/>a Brighter Tomorrow</span>
</div>
</a>
<button class="text-slate-400 hover:text-slate-600 transition-colors p-1" title="Collapse sidebar">
<i class="w-4 h-4" data-lucide="chevron-left"></i>
</button>
</div>
<!-- Navigation Links -->
<nav class="px-4 py-2 space-y-1">
<a class="flex items-center gap-3.5 px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 font-medium text-sm transition-all group" href="{{ route('erp.dashboard') }}">
<i class="w-4 h-4 text-slate-500 group-hover:text-slate-800" data-lucide="layout-grid"></i>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-3.5 px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 font-medium text-sm transition-all group" href="{{ route('erp.admission') }}">
<i class="w-4 h-4 text-slate-500 group-hover:text-slate-800" data-lucide="user-plus"></i>
<span>Admission</span>
</a>
<a class="flex items-center gap-3.5 px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 font-medium text-sm transition-all group" href="{{ route('erp.finance') }}">
<i class="w-4 h-4 text-slate-500 group-hover:text-slate-800" data-lucide="credit-card"></i>
<span>Finance</span>
</a>
<a class="flex items-center gap-3.5 px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 font-medium text-sm transition-all group" href="{{ route('erp.students') }}">
<i class="w-4 h-4 text-slate-500 group-hover:text-slate-800" data-lucide="users"></i>
<span>Student Management</span>
</a>
<a class="flex items-center gap-3.5 px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 font-medium text-sm transition-all group" href="{{ route('erp.assessments') }}">
<i class="w-4 h-4 text-slate-500 group-hover:text-slate-800" data-lucide="file-check-2"></i>
<span>Assessment &amp; Certification</span>
</a>
<!-- Active Menu Item: Career & Placement -->
<a class="flex items-center gap-3.5 px-4 py-2.5 rounded-xl bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold text-sm shadow-md shadow-orange-500/20 transition-all" href="{{ route('erp.placements') }}">
<i class="w-4 h-4 text-white" data-lucide="briefcase"></i>
<span>Career &amp; Placement</span>
</a>
<a class="flex items-center gap-3.5 px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 font-medium text-sm transition-all group" href="{{ route('erp.partners') }}">
<i class="w-4 h-4 text-slate-500 group-hover:text-slate-800" data-lucide="handshake"></i>
<span>Partners</span>
</a>
<a class="flex items-center gap-3.5 px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 font-medium text-sm transition-all group" href="{{ route('erp.alumni') }}">
<i class="w-4 h-4 text-slate-500 group-hover:text-slate-800" data-lucide="graduation-cap"></i>
<span>Alumni</span>
</a>
<a class="flex items-center gap-3.5 px-4 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 font-medium text-sm transition-all group" href="{{ route('erp.reports') }}">
<i class="w-4 h-4 text-slate-500 group-hover:text-slate-800" data-lucide="bar-chart-2"></i>
<span>Reports</span>
</a>
</nav>
</div>
<!-- Sidebar Bottom Promo Card -->
<div class="p-4">
<div class="rounded-2xl p-4 relative overflow-hidden bg-gradient-to-b from-orange-50 to-orange-100/70 border border-orange-200/50 shadow-sm text-left">
<div class="h-28 w-full rounded-xl mb-3 flex items-center justify-center relative overflow-hidden bg-orange-200/30">
<img alt="Students Banner" class="w-full h-full object-cover rounded-lg opacity-85 mix-blend-multiply" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCgqfr4A3o4rZzaaka1jZ6uAs1HlVCqPpCOWLm-0NgIpg0GHHV9mMrm0ft5Za_TXavrfbAlKu85ioMBXQCId3j3sdivc7rymrevyHBxGyFW2ppu-KkGttLyzbDER_OMNzcW-SNLZzOB-5-GvfZ80TAT2GkVZ21wN7NaotKtRbg1AWsjGIed_tpQYY6YDlHZnur-ZkwdRwEdeMIWMYlb1wJLS_XVSLVXN-rtCGHlIto"/>
<div class="absolute inset-0 bg-gradient-to-t from-orange-100 via-transparent to-transparent"></div>
</div>
<h4 class="font-bold text-sm leading-tight text-orange-600 mb-1">Membangun<br/>Talenta Global<br/>dari Indonesia</h4>
<p class="text-[11px] text-slate-600 mb-3.5 leading-snug">Pendidikan, peluang dan masa depan yang lebih baik.</p>
<a class="inline-flex items-center justify-center gap-2 w-full py-2 px-3 bg-orange-600 hover:bg-orange-700 text-white rounded-xl text-xs font-semibold shadow-sm shadow-orange-500/30 transition-all" href="{{ route('erp.reports') }}">
<span>Bersama IDEA ERP</span>
<i class="w-3.5 h-3.5" data-lucide="arrow-right"></i>
</a>
</div>
</div>
</aside>
<!-- END: Sidebar -->
<!-- BEGIN: Main Content Area -->
<main class="flex-1 flex flex-col min-w-0 overflow-y-auto">
<!-- BEGIN: Topbar -->
<header class="h-18 px-8 py-3.5 bg-white border-b border-slate-200/70 flex items-center justify-between sticky top-0 z-10">
<!-- Search Input -->
<form action="{{ route('erp.placements') }}" method="GET" class="relative w-full max-w-xl">
<span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
<i class="w-4 h-4" data-lucide="search"></i>
</span>
<input name="q" value="{{ $filters['q'] ?? '' }}" class="w-full pl-10 pr-4 py-2 bg-slate-50/70 border border-slate-200 rounded-xl text-xs text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-all" placeholder="Cari lowongan kerja, perusahaan mitra, posisi, atau negara..." type="text"/>
</form>
<!-- User Profile & Notifications -->
<div class="flex items-center gap-5">
<button onclick="document.getElementById('modalAddVacancy').classList.remove('hidden')" class="px-3.5 py-2 bg-orange-600 hover:bg-orange-700 text-white text-xs font-bold rounded-xl shadow-sm transition">
  + Tambah Lowongan
</button>
<div class="h-8 w-px bg-slate-200"></div>
<div class="flex items-center gap-3 cursor-pointer group">
<img alt="Sari Anggraini" class="w-9 h-9 rounded-full object-cover ring-2 ring-orange-200" src="https://lh3.googleusercontent.com/aida-public/AB6AXuD_lFJP-uqfaV0gBiG6jqzcgauZfkN0_EBikOVFxMyOQYQ0T17_7N84VrWsROuE0Q0dd3f9LAlm75uenJl6KwzppVZQ2_gP5-YNZgv_DD2dUOC7jD9NqjOsSsjZPSC7pyzBNcm3w5qhhSqCcTQHKl44Lgd_9853sD2YFv-ZJlGlOiW58ahEzmtG5JG6Wnok9PL47CZMuHY8tU5oTFJiab67CEdSzabH5BU4vAoCZ2s"/>
<div class="text-left">
<span class="text-xs font-bold text-slate-800 group-hover:text-orange-600 transition-colors block leading-tight">{{ $currentUser->full_name ?? 'Sari Anggraini' }}</span>
<span class="text-[11px] text-slate-400 block leading-tight">{{ $currentUser->position_name ?? 'Head of Administration' }}</span>
</div>
<i class="w-4 h-4 text-slate-400 group-hover:text-slate-600 transition-colors" data-lucide="chevron-down"></i>
</div>
</div>
</header>
<!-- END: Topbar -->
<!-- BEGIN: Dashboard Body -->
<div class="p-8 space-y-6">
@if(session('success'))
<div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-xs font-semibold flex items-center justify-between shadow-sm">
  <span>{{ session('success') }}</span>
  <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900">✕</button>
</div>
@endif
<!-- BEGIN: Header Section & Announcement Banner -->
<section class="flex flex-col lg:flex-row items-stretch justify-between gap-6" data-purpose="page-hero">
<div class="flex-1 flex flex-col justify-center">
<h1 class="text-2xl font-black text-slate-900 tracking-tight">Career &amp; Placement</h1>
<p class="text-xs text-slate-500 mt-1">Kelola peluang karir, proses penempatan, dan keberhasilan alumni kami.</p>
</div>
<!-- Banner Right -->
<div class="flex items-center justify-between bg-gradient-to-r from-orange-100/60 via-amber-50 to-orange-50/70 border border-orange-200/50 rounded-2xl px-6 py-4 relative overflow-hidden shadow-xs min-w-[420px]">
<div class="z-10">
<span class="text-xs font-semibold text-slate-800 block">Senin, 21 Apr 2025</span>
<span class="text-[11px] text-slate-500 font-medium block mt-0.5">Semangat untuk hari yang produktif!</span>
</div>
<div class="z-10 text-right">
<span class="text-[11px] font-bold text-slate-800 leading-tight block">People<br/>Education<br/>Opportunities</span>
<span class="text-[9px] text-orange-600 font-semibold block mt-0.5 tracking-wide">A Brighter Tomorrow</span>
</div>
<div class="absolute right-24 inset-y-0 w-36 pointer-events-none opacity-40">
<img alt="Office space" class="w-full h-full object-cover mix-blend-luminosity" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAHQ8awzRc5ccRUUieMKfM_HbkyGrSe59bzKFL6MG46u3mTI-UUgzLbC1thrRHFx7u-pP3mUC1QCxIRM4GnZeowIyXB_PVo4dlZjpgQtgTs51v1R9e6_7Sykn61c3EXyRiE6fJ1mYyCG0xrF1MEMEghVb_uGyUQlt1FiuiwmD5tEpEi2MVt8sRVMJzTObrFH4aenE1Nrw0WsLpwbTn4d-uU3_Uwwb3GX5iEXLuvXWM"/>
</div>
</div>
</section>
<!-- END: Header Section & Announcement Banner -->
<!-- BEGIN: KPI Summary Cards -->
<section class="grid grid-cols-2 sm:grid-cols-3 xl:grid-cols-6 gap-3.5" data-purpose="kpi-metrics">
<!-- Card 1 -->
<div class="bg-white p-3.5 rounded-2xl border border-slate-100 shadow-sm hover:shadow transition-shadow">
<div class="flex items-center justify-between mb-2">
<span class="text-[11px] font-semibold text-slate-600 leading-tight">Placement Ready<br/>Candidates</span>
<div class="w-8 h-8 rounded-xl bg-orange-100 flex items-center justify-center text-orange-600 shrink-0">
<i class="w-4 h-4" data-lucide="users"></i>
</div>
</div>
<div class="text-xl font-extrabold text-slate-800">{{ $kpis['ready_candidates'] }}</div>
<div class="flex items-center gap-1 mt-1 text-[10px] text-emerald-600 font-semibold">
<i class="w-3 h-3" data-lucide="arrow-up"></i>
<span>14%</span>
<span class="text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
<!-- Card 2 -->
<div class="bg-white p-3.5 rounded-2xl border border-slate-100 shadow-sm hover:shadow transition-shadow">
<div class="flex items-center justify-between mb-2">
<span class="text-[11px] font-semibold text-slate-600 leading-tight">Open<br/>Vacancies</span>
<div class="w-8 h-8 rounded-xl bg-orange-100 flex items-center justify-center text-orange-600 shrink-0">
<i class="w-4 h-4" data-lucide="briefcase"></i>
</div>
</div>
<div class="text-xl font-extrabold text-slate-800">{{ $kpis['open_vacancies'] }}</div>
<div class="flex items-center gap-1 mt-1 text-[10px] text-emerald-600 font-semibold">
<i class="w-3 h-3" data-lucide="arrow-up"></i>
<span>23%</span>
<span class="text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
<!-- Card 3 -->
<div class="bg-white p-3.5 rounded-2xl border border-slate-100 shadow-sm hover:shadow transition-shadow">
<div class="flex items-center justify-between mb-2">
<span class="text-[11px] font-semibold text-slate-600 leading-tight">Interviews<br/>This Week</span>
<div class="w-8 h-8 rounded-xl bg-orange-100 flex items-center justify-center text-orange-600 shrink-0">
<i class="w-4 h-4" data-lucide="calendar"></i>
</div>
</div>
<div class="text-xl font-extrabold text-slate-800">{{ $kpis['interviews'] }}</div>
<div class="flex items-center gap-1 mt-1 text-[10px] text-emerald-600 font-semibold">
<i class="w-3 h-3" data-lucide="arrow-up"></i>
<span>12%</span>
<span class="text-slate-400 font-normal">dari minggu lalu</span>
</div>
</div>
<!-- Card 4 -->
<div class="bg-white p-3.5 rounded-2xl border border-slate-100 shadow-sm hover:shadow transition-shadow">
<div class="flex items-center justify-between mb-2">
<span class="text-[11px] font-semibold text-slate-600 leading-tight">Accepted<br/>Offers</span>
<div class="w-8 h-8 rounded-xl bg-orange-100 flex items-center justify-center text-orange-600 shrink-0">
<i class="w-4 h-4" data-lucide="file-check"></i>
</div>
</div>
<div class="text-xl font-extrabold text-slate-800">{{ $kpis['accepted_offers'] }}</div>
<div class="flex items-center gap-1 mt-1 text-[10px] text-emerald-600 font-semibold">
<i class="w-3 h-3" data-lucide="arrow-up"></i>
<span>19%</span>
<span class="text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
<!-- Card 5 -->
<div class="bg-white p-3.5 rounded-2xl border border-slate-100 shadow-sm hover:shadow transition-shadow">
<div class="flex items-center justify-between mb-2">
<span class="text-[11px] font-semibold text-slate-600 leading-tight">International<br/>Placement</span>
<div class="w-8 h-8 rounded-xl bg-orange-100 flex items-center justify-center text-orange-600 shrink-0">
<i class="w-4 h-4" data-lucide="plane"></i>
</div>
</div>
<div class="text-xl font-extrabold text-slate-800">{{ $kpis['intl_placements'] }}</div>
<div class="flex items-center gap-1 mt-1 text-[10px] text-emerald-600 font-semibold">
<i class="w-3 h-3" data-lucide="arrow-up"></i>
<span>50%</span>
<span class="text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
<!-- Card 6 -->
<div class="bg-white p-3.5 rounded-2xl border border-slate-100 shadow-sm hover:shadow transition-shadow">
<div class="flex items-center justify-between mb-2">
<span class="text-[11px] font-semibold text-slate-600 leading-tight">Placement<br/>Rate</span>
<div class="w-8 h-8 rounded-xl bg-orange-100 flex items-center justify-center text-orange-600 shrink-0">
<i class="w-4 h-4" data-lucide="bar-chart"></i>
</div>
</div>
<div class="text-xl font-extrabold text-slate-800">{{ round($kpis['placement_rate']) }}%</div>
<div class="flex items-center gap-1 mt-1 text-[10px] text-emerald-600 font-semibold">
<i class="w-3 h-3" data-lucide="arrow-up"></i>
<span>6%</span>
<span class="text-slate-400 font-normal">dari periode lalu</span>
</div>
</div>
</section>
<!-- END: KPI Summary Cards -->
<!-- BEGIN: Content Grid (2 Columns) -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
<!-- BEGIN: Left Column (Pipeline + Vacancies) -->
<div class="lg:col-span-8 space-y-6">
<!-- BEGIN: Candidate Pipeline Card -->
<div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm">
<div class="flex items-center justify-between mb-5">
<h2 class="text-sm font-bold text-slate-800">Candidate Pipeline</h2>
<div class="flex items-center gap-1.5 text-xs text-slate-500 font-medium bg-slate-50 px-3 py-1.5 rounded-lg border border-slate-200/80 cursor-pointer">
<span>Tahun akademik 2025/2026</span>
<i class="w-3.5 h-3.5 text-slate-400" data-lucide="chevron-down"></i>
</div>
</div>
<!-- Pipeline Chevron Steps -->
<div class="grid grid-cols-6 gap-1 mb-4 select-none">
<div class="pipeline-step first-step bg-amber-50/80 hover:bg-amber-100/70 transition-colors py-3 px-2 flex flex-col items-center justify-center text-center">
<span class="text-[10px] font-semibold text-slate-600 mb-1">Ready</span>
<i class="w-4 h-4 text-orange-500" data-lucide="users"></i>
</div>
<div class="pipeline-step bg-orange-100/50 hover:bg-orange-100 transition-colors py-3 px-2 flex flex-col items-center justify-center text-center">
<span class="text-[10px] font-semibold text-slate-600 mb-1">Matched</span>
<i class="w-4 h-4 text-orange-500" data-lucide="file-text"></i>
</div>
<div class="pipeline-step bg-orange-100/90 hover:bg-orange-200/60 transition-colors py-3 px-2 flex flex-col items-center justify-center text-center">
<span class="text-[10px] font-semibold text-slate-600 mb-1">Submitted</span>
<i class="w-4 h-4 text-orange-500" data-lucide="send"></i>
</div>
<div class="pipeline-step bg-orange-200/70 hover:bg-orange-200 transition-colors py-3 px-2 flex flex-col items-center justify-center text-center">
<span class="text-[10px] font-semibold text-slate-600 mb-1">Interview</span>
<i class="w-4 h-4 text-orange-600" data-lucide="users-2"></i>
</div>
<div class="pipeline-step bg-orange-300/80 hover:bg-orange-300 transition-colors py-3 px-2 flex flex-col items-center justify-center text-center">
<span class="text-[10px] font-semibold text-slate-700 mb-1">Offered</span>
<i class="w-4 h-4 text-orange-700" data-lucide="check-square"></i>
</div>
<div class="pipeline-step last-step bg-gradient-to-r from-orange-400 to-orange-500 hover:from-orange-500 hover:to-orange-600 transition-colors py-3 px-2 flex flex-col items-center justify-center text-center text-white">
<span class="text-[10px] font-bold text-white mb-1">Placed</span>
<i class="w-4 h-4 text-white" data-lucide="trophy"></i>
</div>
</div>
<!-- Pipeline Stats & Conversion -->
<div class="grid grid-cols-6 gap-1 text-center pt-1">
<div>
<div class="text-base font-bold text-slate-800 leading-tight">{{ $pipeline->ready ?? 0 }}</div>
<div class="text-[10px] text-slate-400 font-medium">Kandidat</div>
</div>
<div>
<div class="text-base font-bold text-slate-800 leading-tight">{{ $pipeline->matched ?? 0 }}</div>
<div class="text-[10px] text-slate-400 font-medium">Kandidat</div>
</div>
<div>
<div class="text-base font-bold text-slate-800 leading-tight">{{ $pipeline->submitted ?? 0 }}</div>
<div class="text-[10px] text-slate-400 font-medium">Kandidat</div>
</div>
<div>
<div class="text-base font-bold text-slate-800 leading-tight">{{ $pipeline->interview ?? 0 }}</div>
<div class="text-[10px] text-slate-400 font-medium">Kandidat</div>
</div>
<div>
<div class="text-base font-bold text-slate-800 leading-tight">{{ $pipeline->offered ?? 0 }}</div>
<div class="text-[10px] text-slate-400 font-medium">Kandidat</div>
</div>
<div>
<div class="text-base font-bold text-slate-800 leading-tight">{{ $pipeline->placed ?? 0 }}</div>
<div class="text-[10px] text-slate-400 font-medium">Kandidat</div>
</div>
</div>
</div>
<!-- END: Candidate Pipeline Card -->
<!-- BEGIN: Open Job Vacancies Table Card -->
<div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm" data-purpose="vacancies-table">
<div class="flex items-center justify-between mb-4">
<h2 class="text-sm font-bold text-slate-800">Open Job Vacancies ({{ count($vacancies) }} Lowongan)</h2>
<a class="text-xs font-semibold text-orange-600 hover:text-orange-700 flex items-center gap-1 group" href="{{ route('erp.partners') }}">
<span>Lihat Mitra</span>
<i class="w-3.5 h-3.5 group-hover:translate-x-0.5 transition-transform" data-lucide="arrow-right"></i>
</a>
</div>
<!-- Table Wrapper -->
<div class="overflow-x-auto custom-scroll -mx-5 px-5">
<table class="w-full text-left border-collapse min-w-[700px]">
<thead>
<tr class="border-b border-slate-100 bg-slate-50/60 text-[10px] font-semibold text-slate-500 uppercase tracking-wider">
<th class="py-2.5 px-3 text-center w-8">No</th>
<th class="py-2.5 px-3">Company</th>
<th class="py-2.5 px-3">Position</th>
<th class="py-2.5 px-3">Country / City</th>
<th class="py-2.5 px-3 text-center">Slots</th>
<th class="py-2.5 px-3 text-center">Candidate Matched</th>
<th class="py-2.5 px-3">Interview Date</th>
<th class="py-2.5 px-3 text-center">Status</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 text-xs">
@foreach($vacancies as $idx => $vac)
<tr class="hover:bg-slate-50/80 transition-colors">
<td class="py-3 px-3 text-center text-slate-400 font-medium">{{ $idx + 1 }}</td>
<td class="py-3 px-3 font-semibold text-slate-800">{{ $vac->partner_name }}</td>
<td class="py-3 px-3 text-slate-600">{{ $vac->title }}</td>
<td class="py-3 px-3 text-slate-600">{{ $vac->city_name ? $vac->city_name . ', ' : '' }}{{ $vac->country_name }}</td>
<td class="py-3 px-3 text-center font-medium text-slate-700">{{ $vac->slots }}</td>
<td class="py-3 px-3 text-center font-medium text-slate-700">{{ max($vac->matched_count, 3) }}</td>
<td class="py-3 px-3 text-slate-600">{{ $vac->interview_date ? date('d M Y', strtotime($vac->interview_date)) : '-' }}</td>
<td class="py-3 px-3 text-center">
@if($vac->status === 'IN_PROGRESS')
<span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-amber-50 text-amber-600 border border-amber-200">In Progress</span>
@else
<span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-600 border border-emerald-200">Open</span>
@endif
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
<!-- END: Open Job Vacancies Table Card -->
</div>
<!-- END: Left Column -->
<!-- BEGIN: Right Column (Candidates + Recent Activities) -->
<div class="lg:col-span-4 space-y-6">
<!-- BEGIN: Top Matching Candidates Card -->
<div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm" data-purpose="matching-candidates">
<div class="flex items-center justify-between mb-4">
<h2 class="text-sm font-bold text-slate-800">Top Matching Candidates</h2>
<a class="text-xs font-semibold text-orange-600 hover:text-orange-700 flex items-center gap-1 group" href="{{ route('erp.students') }}">
<span>Lihat Semua</span>
<i class="w-3.5 h-3.5 group-hover:translate-x-0.5 transition-transform" data-lucide="arrow-right"></i>
</a>
</div>
<div class="space-y-4">
@foreach($matchingCandidates as $cand)
<div class="flex items-center justify-between pb-3.5 border-b border-slate-100 last:border-0 last:pb-0">
<div class="flex items-start gap-3">
<div class="w-10 h-10 rounded-full bg-orange-100 text-orange-700 font-bold text-xs flex items-center justify-center shrink-0 mt-0.5">
  {{ strtoupper(substr($cand->full_name, 0, 2)) }}
</div>
<div>
<h3 class="text-xs font-bold text-slate-800 leading-tight">{{ $cand->full_name }}</h3>
<p class="text-[11px] text-slate-400 font-medium">{{ $cand->program_name }}</p>
<div class="flex flex-wrap gap-1 mt-1.5">
<span class="px-2 py-0.5 bg-blue-50 text-blue-600 rounded text-[9px] font-medium">{{ $cand->desired_position ?? 'Hospitality' }}</span>
<span class="px-2 py-0.5 bg-emerald-50 text-emerald-600 rounded text-[9px] font-medium">{{ $cand->desired_country ?? 'Global' }}</span>
<span class="px-2 py-0.5 bg-purple-50 text-purple-600 rounded text-[9px] font-medium">{{ $cand->candidate_status }}</span>
</div>
</div>
</div>
<div class="text-right shrink-0 ml-2">
<div class="text-xs font-black text-orange-600">{{ round($cand->match_score) }}%</div>
<div class="text-[9px] text-slate-400 uppercase font-medium">Match</div>
<a href="{{ route('erp.students', ['q' => $cand->full_name]) }}" class="mt-1.5 inline-block px-3 py-1 bg-orange-50 hover:bg-orange-100 text-orange-600 rounded-lg text-[10px] font-bold transition-colors">
                    View
                  </a>
</div>
</div>
@endforeach
</div>
</div>
<!-- END: Top Matching Candidates Card -->
<!-- BEGIN: Recent Placement Activity Card -->
<div class="bg-white p-5 rounded-2xl border border-slate-100 shadow-sm" data-purpose="recent-activities">
<div class="flex items-center justify-between mb-4">
<h2 class="text-sm font-bold text-slate-800">Recent Placement Activity</h2>
<a class="text-xs font-semibold text-orange-600 hover:text-orange-700 flex items-center gap-1 group" href="{{ route('erp.alumni') }}">
<span>Lihat Alumni</span>
<i class="w-3.5 h-3.5 group-hover:translate-x-0.5 transition-transform" data-lucide="arrow-right"></i>
</a>
</div>
<div class="space-y-3.5">
@foreach($vacancies->take(4) as $v)
<div class="flex items-start gap-3">
<div class="w-8 h-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-600 shrink-0 mt-0.5">
<i class="w-4 h-4" data-lucide="briefcase"></i>
</div>
<div class="flex-1 min-w-0">
<p class="text-xs text-slate-800 leading-snug">
<span class="font-bold">{{ $v->partner_name }}</span> membuka {{ $v->slots }} slot <span class="font-medium">{{ $v->title }}</span>
</p>
<span class="text-[11px] text-slate-400 block mt-0.5">{{ $v->country_name }}</span>
</div>
<span class="text-[10px] font-medium text-slate-400 shrink-0">{{ $v->code }}</span>
</div>
@endforeach
</div>
</div>
<!-- END: Recent Placement Activity Card -->
</div>
<!-- END: Right Column -->
</div>
<!-- END: Content Grid -->
</div>
<!-- END: Dashboard Body -->
</main>
<!-- END: Main Content Area -->

<!-- Modal Tambah Lowongan -->
<div id="modalAddVacancy" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-md overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
      <h3 class="text-sm font-extrabold text-slate-900">Tambah Lowongan Kerja (Job Demand)</h3>
      <button onclick="document.getElementById('modalAddVacancy').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">✕</button>
    </div>
    <form action="{{ route('erp.placements.vacancy.store') }}" method="POST" class="p-6 space-y-4 text-xs">
      @csrf
      <div>
        <label class="block font-semibold text-slate-700 mb-1">Perusahaan Mitra (Partner)</label>
        <select name="partner_id" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
          @foreach($partnersList as $pt)
            <option value="{{ $pt->id }}">{{ $pt->name }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label class="block font-semibold text-slate-700 mb-1">Kategori Posisi</label>
        <select name="job_position_id" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
          @foreach($jobPositions as $jp)
            <option value="{{ $jp->id }}">{{ $jp->name }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label class="block font-semibold text-slate-700 mb-1">Judul Lowongan</label>
        <input type="text" name="title" required placeholder="Contoh: Guest Relations Executive" class="w-full rounded-xl border-slate-200 text-xs py-2 px-3"/>
      </div>
      <div class="grid grid-cols-3 gap-3">
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Negara</label>
          <select name="country_id" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
            @foreach($countries as $co)
              <option value="{{ $co->id }}">{{ $co->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Kuota Slot</label>
          <input type="number" name="slots" value="5" min="1" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3"/>
        </div>
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Tgl Interview</label>
          <input type="date" name="interview_date" value="{{ date('Y-m-d', strtotime('+10 days')) }}" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3"/>
        </div>
      </div>
      <div class="pt-2 flex justify-end gap-2">
        <button type="button" onclick="document.getElementById('modalAddVacancy').classList.add('hidden')" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 font-semibold">Batal</button>
        <button type="submit" class="px-4 py-2 rounded-xl bg-orange-600 hover:bg-orange-700 text-white font-semibold shadow-sm">Simpan Lowongan</button>
      </div>
    </form>
  </div>
</div>

<script data-purpose="lucide-icons-init">
    document.addEventListener('DOMContentLoaded', () => {
      lucide.createIcons();
    });
  </script>
</body></html>
