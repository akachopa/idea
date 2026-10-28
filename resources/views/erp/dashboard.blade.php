<!DOCTYPE html>
<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>IDEA ERP - Dashboard</title>
<!-- Tailwind CSS CDN with forms and container queries -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Tailwind Configuration -->
<script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: {
              50: '#fff7ed',
              100: '#ffedd5',
              200: '#fed7aa',
              300: '#fdba74',
              400: '#fb923c',
              500: '#f97316',
              600: '#ea580c',
              700: '#c2410c'
            },
            surface: '#f8fafc',
            borderLight: '#f1f5f9'
          }
        }
      }
    }
  </script>
<!-- BEGIN: Custom Styles for Layout & Components -->
<style data-purpose="base-typography">
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-color: #f8fafc;
      color: #1e293b;
    }
  </style>
@php
  $placementRate = (int) round($exec->placement_rate_percent ?? 87);
  $processRate = min(100 - $placementRate, 8);
  $pendingEnd = 100;
  $processEnd = $placementRate + $processRate;
@endphp
<style data-purpose="chart-styles">
    /* Chart and visual component helper styles */
    .donut-chart {
      background: conic-gradient(
        #ea580c 0% {{ $placementRate }}%,
        #f59e0b {{ $placementRate }}% {{ $processEnd }}%,
        #cbd5e1 {{ $processEnd }}% 100%
      );
      border-radius: 50%;
    }
    .custom-scrollbar::-webkit-scrollbar {
      width: 4px;
      height: 4px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 4px;
    }
  </style>
<!-- END: Custom Styles -->
</head>
<body class="min-h-screen bg-[#f7f9fa] flex text-slate-800 antialiased overflow-x-hidden">
<!-- BEGIN: Sidebar Navigation -->
<aside class="w-64 bg-white border-r border-slate-200/80 shrink-0 flex flex-col justify-between min-h-screen sticky top-0 h-screen overflow-y-auto custom-scrollbar p-4" data-purpose="sidebar-navigation">
<div>
<!-- Brand Logo Header -->
<div class="flex items-center justify-between pb-6 pt-2 px-2 border-b border-slate-100">
<a href="{{ route('erp.dashboard') }}" class="flex items-center gap-2.5">
<div class="w-9 h-9 rounded-full border-4 border-orange-500 flex items-center justify-center relative">
<span class="w-2.5 h-2.5 rounded-full bg-orange-500"></span>
</div>
<div>
<div class="font-extrabold text-slate-900 tracking-tight text-lg leading-none">IDEA ERP</div>
<div class="text-[10px] text-slate-400 font-medium tracking-tight mt-0.5 leading-tight">Education for<br/>a Brighter Tomorrow</div>
</div>
</a>
<button class="p-1 rounded-md text-slate-400 hover:text-slate-600 hover:bg-slate-50 transition" title="Toggle Sidebar">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewbox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</button>
</div>
<!-- Navigation Menu Items -->
<nav class="mt-5 space-y-1.5 font-medium text-sm">
<!-- Dashboard (Active) -->
<a class="flex items-center gap-3 px-4 py-3 rounded-xl bg-orange-600 text-white font-semibold shadow-sm shadow-orange-500/30" href="{{ route('erp.dashboard') }}">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          Dashboard
        </a>
<a class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition" href="{{ route('erp.admission') }}">
<svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewbox="0 0 24 24"><path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          Admission
        </a>
<a class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition" href="{{ route('erp.finance') }}">
<svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewbox="0 0 24 24"><path d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          Finance
        </a>
<a class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition" href="{{ route('erp.students') }}">
<svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewbox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          Student Management
        </a>
<a class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition" href="{{ route('erp.assessments') }}">
<svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewbox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          Assessment &amp; Certification
        </a>
<a class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition" href="{{ route('erp.placements') }}">
<svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewbox="0 0 24 24"><path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          Career &amp; Placement
        </a>
<a class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition" href="{{ route('erp.partners') }}">
<svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewbox="0 0 24 24"><path d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          Partners
        </a>
<a class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition" href="{{ route('erp.alumni') }}">
<svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewbox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5zm0 7l6-3.333v-4.5L12 16.5l-6-3.333v4.5L12 21z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          Alumni
        </a>
<a class="flex items-center gap-3 px-4 py-2.5 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100/70 transition" href="{{ route('erp.reports') }}">
<svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" stroke-width="1.8" viewbox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
          Reports
        </a>
</nav>
</div>
<!-- Promo Banner Card in Sidebar -->
<div class="mt-6 rounded-2xl bg-gradient-to-b from-orange-50/70 via-orange-100/50 to-orange-50 border border-orange-200/60 p-3.5 text-center relative overflow-hidden shadow-sm">
<div class="h-28 rounded-xl flex items-center justify-center mb-3 relative overflow-hidden bg-gradient-to-tr from-amber-100 via-orange-100 to-orange-200">
<!-- SVG Character Illustration representation -->
<svg class="w-28 h-28 text-orange-600" fill="none" viewbox="0 0 120 120">
<circle cx="60" cy="40" fill="#fdba74" r="18"></circle>
<path d="M48 35c0-10 24-10 24 0v4H48v-4z" fill="#334155"></path>
<path d="M38 90c0-18 10-24 22-24s22 6 22 24v10H38V90z" fill="#ea580c"></path>
<path d="M50 68h20v22H50z" fill="#ffffff" opacity="0.9"></path>
<rect fill="#cbd5e1" height="12" rx="2" width="16" x="52" y="70"></rect>
</svg>
</div>
<h4 class="text-xs font-bold text-slate-800 leading-snug">Membangun<br/>Talenta Global<br/>dari Indonesia</h4>
<p class="text-[11px] text-slate-500 mt-1 leading-snug">Pendidikan, peluang dan masa depan yang lebih baik.</p>
<a href="{{ route('erp.reports') }}" class="mt-3 w-full bg-orange-600 hover:bg-orange-700 text-white font-semibold text-xs py-2 px-3 rounded-lg flex items-center justify-center gap-1.5 shadow-sm transition">
        Bersama IDEA ERP
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</a>
</div>
</aside>
<!-- END: Sidebar Navigation -->
<!-- BEGIN: Main Content Area -->
<main class="flex-1 flex flex-col min-w-0 overflow-y-auto">
<!-- Topbar Header -->
<header class="h-16 bg-white/95 backdrop-blur-md border-b border-slate-200/80 px-8 flex items-center justify-between sticky top-0 z-30" data-purpose="topbar">
<!-- Search Input Field -->
<form action="{{ route('erp.students') }}" method="GET" class="w-full max-w-xl relative">
<span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</span>
<input name="q" class="w-full pl-10 pr-4 py-2 bg-slate-50 border border-slate-200 rounded-lg text-xs placeholder:text-slate-400 focus:bg-white focus:outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition" placeholder="Cari data siswa, program, pembayaran, atau lainnya..." type="text"/>
</form>
<!-- User Notifications & Profile Details -->
<div class="flex items-center gap-5 ml-4">
<span class="hidden md:inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 border border-emerald-200 text-[10px] font-bold text-emerald-700">
  <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> PostgreSQL Connected
</span>
<!-- Notification Bell -->
<a href="{{ route('erp.admission') }}" class="relative p-2 text-slate-500 hover:text-slate-700 hover:bg-slate-100 rounded-full transition" title="Notifikasi ({{ count($notifications) }})">
<svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="1.8" viewbox="0 0 24 24"><path d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" stroke-linecap="round" stroke-linejoin="round"></path></svg>
<span class="absolute top-1.5 right-1.5 w-2 h-2 bg-orange-500 rounded-full ring-2 ring-white"></span>
</a>
<div class="h-6 w-px bg-slate-200"></div>
<!-- Profile Avatar & Info -->
<div class="flex items-center gap-3 cursor-pointer select-none group">
<img alt="{{ $currentUser->full_name ?? 'Sari Anggraini' }}" class="w-9 h-9 rounded-full object-cover ring-2 ring-orange-200" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIrOHJEH3s5X_rNk-ZzunN19h1MSIt-Lx9kB2DzHOhqwK94QEeEHF1dzQ9nEqCoMe8S7NXuzArvGRHgUx_nSPX1szvVGaJSv9OVcV9ywLQXnd9ypi8asatspuz7163gDOogEUW1LrjhzumV0Dhd06OM3Y1BglV0lWybwUa8vClEaIXeaMI5Nkg5GWQSXuB9U1lhM_X5rYIN8MuHYmX4cLH_XrA92ZNHncu9BKAgtk"/>
<div class="text-left hidden sm:block">
<div class="text-xs font-bold text-slate-800 leading-tight">{{ $currentUser->full_name ?? 'Sari Anggraini' }}</div>
<div class="text-[11px] text-slate-400 font-medium leading-none">{{ $currentUser->position_name ?? 'Head of Administration' }}</div>
</div>
<svg class="w-4 h-4 text-slate-400 group-hover:text-slate-600 transition ml-0.5" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
</div>
</header>
<!-- Main Content Container -->
<div class="p-8 space-y-6">
@if(session('success'))
<div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-xs font-semibold flex items-center justify-between shadow-sm">
  <span>{{ session('success') }}</span>
  <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900">✕</button>
</div>
@endif
<!-- BEGIN: Hero Welcome Banner -->
<section class="flex flex-col lg:flex-row lg:items-center justify-between gap-6 bg-gradient-to-r from-orange-50/90 via-amber-50/70 to-orange-100/40 rounded-2xl p-6 border border-orange-100/80 shadow-[0_2px_10px_rgba(249,115,22,0.04)]" data-purpose="hero-banner">
<div>
<h1 class="text-2xl lg:text-[26px] font-black tracking-tight text-slate-900">Selamat datang, {{ explode(' ', $currentUser->full_name ?? 'Sari')[0] }}!</h1>
<p class="text-xs lg:text-sm text-slate-500 mt-1">Berikut ringkasan aktivitas dan performa IDEA ERP hari ini dari database PostgreSQL.</p>
</div>
<div class="flex flex-wrap items-center gap-6">
<div class="text-left sm:text-right">
<div class="text-xs font-bold text-slate-800">Senin, 21 Apr 2025</div>
<div class="text-[11px] text-slate-500">Semangat untuk hari yang produktif!</div>
</div>
<div class="flex items-center gap-4 bg-white/70 backdrop-blur-sm border border-orange-200/50 rounded-xl px-4 py-2.5">
<img alt="Hospitality Training" class="w-16 h-12 rounded-lg object-cover shadow-xs" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDRabQOF1n1BNf-PB__KSoRZRuJfP9CGGTXiSR5q2S_Se_-KxWqq4RR6wGe6OOKjYQ4QJUuDDsRnvGJLOIBHPTBB5_jduJKVBkA2wOEpJyJIVxl3vTUz7TUxOHabnPZ7yLb77XAKzkti86YtexZ_p1SxYynhdpDQzXX_E1lXXuPUFo3Qb3IvXaGWpM3ZvTglS2owN_EtIWRfwT_Qbmsy8vaER8qAUd2tWNR3S2HsiA"/>
<div class="text-left">
<div class="text-[10px] uppercase tracking-wider text-slate-400 font-semibold leading-tight">People Education Opportunities</div>
<div class="text-xs font-bold text-slate-800 leading-tight">A Brighter Tomorrow</div>
</div>
</div>
</div>
</section>
<!-- END: Hero Welcome Banner -->
<!-- BEGIN: 6 Summary KPI Cards -->
<section class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-3.5" data-purpose="kpi-metric-cards">
<!-- 1. Applicants -->
<a href="{{ route('erp.admission') }}" class="bg-white p-4 rounded-xl border border-slate-200/70 shadow-sm flex flex-col justify-between hover:border-orange-300 transition">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-orange-100/80 flex items-center justify-center text-orange-600 shrink-0">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<span class="text-[11px] font-semibold text-slate-500 truncate">Applicants</span>
</div>
<div class="mt-3">
<div class="text-xl font-extrabold text-slate-900 tracking-tight">{{ number_format($exec->total_applicants ?? 0, 0, ',', '.') }}</div>
<div class="text-[10px] text-slate-400 mt-1 flex items-center gap-1 font-medium">
<span class="text-emerald-600 font-bold flex items-center">↑ 12%</span> dari bulan lalu
            </div>
</div>
</a>
<!-- 2. Active Students -->
<a href="{{ route('erp.students') }}" class="bg-white p-4 rounded-xl border border-slate-200/70 shadow-sm flex flex-col justify-between hover:border-orange-300 transition">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-amber-100/80 flex items-center justify-center text-amber-600 shrink-0">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5zm0 7l6-3.333v-4.5L12 16.5l-6-3.333v4.5L12 21z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<span class="text-[11px] font-semibold text-slate-500 truncate">Active Students</span>
</div>
<div class="mt-3">
<div class="text-xl font-extrabold text-slate-900 tracking-tight">{{ number_format($exec->active_students ?? 0, 0, ',', '.') }}</div>
<div class="text-[10px] text-slate-400 mt-1 flex items-center gap-1 font-medium">
<span class="text-emerald-600 font-bold flex items-center">↑ 5%</span> dari bulan lalu
            </div>
</div>
</a>
<!-- 3. Revenue -->
<a href="{{ route('erp.finance') }}" class="bg-white p-4 rounded-xl border border-slate-200/70 shadow-sm flex flex-col justify-between hover:border-orange-300 transition">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-amber-50 border border-amber-200 flex items-center justify-center text-amber-700 shrink-0">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<span class="text-[11px] font-semibold text-slate-500 truncate">Revenue</span>
</div>
<div class="mt-3">
<div class="text-xl font-extrabold text-slate-900 tracking-tight">Rp {{ number_format(($exec->total_revenue ?? 0) / 1000000, 1, ',', '.') }} Jt</div>
<div class="text-[10px] text-slate-400 mt-1 flex items-center gap-1 font-medium">
<span class="text-emerald-600 font-bold flex items-center">↑ 18%</span> dari bulan lalu
            </div>
</div>
</a>
<!-- 4. Placement Ready -->
<a href="{{ route('erp.placements') }}" class="bg-white p-4 rounded-xl border border-slate-200/70 shadow-sm flex flex-col justify-between hover:border-orange-300 transition">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-orange-100/70 flex items-center justify-center text-orange-600 shrink-0">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<span class="text-[11px] font-semibold text-slate-500 truncate">Placement Ready</span>
</div>
<div class="mt-3">
<div class="text-xl font-extrabold text-slate-900 tracking-tight">{{ number_format($exec->placement_ready_students ?? 0, 0, ',', '.') }}</div>
<div class="text-[10px] text-slate-400 mt-1 flex items-center gap-1 font-medium">
<span class="text-emerald-600 font-bold flex items-center">↑ 14%</span> dari bulan lalu
            </div>
</div>
</a>
<!-- 5. Placement Rate -->
<a href="{{ route('erp.placements') }}" class="bg-white p-4 rounded-xl border border-slate-200/70 shadow-sm flex flex-col justify-between hover:border-orange-300 transition">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-amber-100/80 flex items-center justify-center text-amber-600 shrink-0">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<span class="text-[11px] font-semibold text-slate-500 truncate">Placement Rate</span>
</div>
<div class="mt-3">
<div class="text-xl font-extrabold text-slate-900 tracking-tight">{{ $placementRate }}%</div>
<div class="text-[10px] text-slate-400 mt-1 flex items-center gap-1 font-medium">
<span class="text-emerald-600 font-bold flex items-center">↑ 6%</span> dari periode lalu
            </div>
</div>
</a>
<!-- 6. Outstanding Payment -->
<a href="{{ route('erp.finance') }}" class="bg-white p-4 rounded-xl border border-slate-200/70 shadow-sm flex flex-col justify-between hover:border-orange-300 transition">
<div class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-lg bg-orange-100/80 flex items-center justify-center text-orange-600 shrink-0">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<span class="text-[11px] font-semibold text-slate-500 truncate">Outstanding Payment</span>
</div>
<div class="mt-3">
<div class="text-xl font-extrabold text-slate-900 tracking-tight">Rp {{ number_format(($exec->outstanding_payments ?? 0) / 1000000, 1, ',', '.') }} Jt</div>
<div class="text-[10px] text-slate-400 mt-1 flex items-center gap-1 font-medium">
<span class="text-rose-500 font-bold flex items-center">↑ 8%</span> dari bulan lalu
            </div>
</div>
</a>
</section>
<!-- END: Summary KPI Cards -->
<!-- BEGIN: Visual Analytics & Charts Section -->
<section class="grid grid-cols-1 lg:grid-cols-12 gap-6" data-purpose="charts-row">
<!-- 1. Tren Pendaftar Line Chart (Col 5) -->
<div class="lg:col-span-5 bg-white p-5 rounded-2xl border border-slate-200/70 shadow-sm">
<div class="flex items-center justify-between mb-4">
<h3 class="text-sm font-bold text-slate-800">Tren Pendaftar</h3>
<button class="text-xs text-slate-500 border border-slate-200 rounded-lg px-2.5 py-1 flex items-center gap-1.5 hover:bg-slate-50 font-medium">
              12 bulan terakhir
              <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</button>
</div>
<!-- Line Chart Canvas Representation -->
<div class="relative pt-6 pb-2">
<!-- Tooltip Apr 2025 -->
<div class="absolute left-[30%] top-0 -translate-x-1/2 bg-white px-2.5 py-1.5 rounded-lg shadow-md border border-slate-100 text-center z-10">
<div class="text-[10px] text-slate-400 leading-tight">Intake Aktif</div>
<div class="text-xs font-bold text-slate-800 leading-tight">{{ number_format($exec->total_applicants ?? 0, 0, ',', '.') }} pendaftar</div>
</div>
<!-- SVG Line Graph with Area Gradient -->
<div class="h-44 w-full relative">
<svg class="w-full h-full overflow-visible" viewbox="0 0 450 160">
<defs>
<lineargradient id="areaGradient" x1="0" x2="0" y1="0" y2="1">
<stop offset="0%" stop-color="#ea580c" stop-opacity="0.25"></stop>
<stop offset="100%" stop-color="#ea580c" stop-opacity="0.0"></stop>
</lineargradient>
</defs>
<!-- Grid Lines -->
<line stroke="#f1f5f9" stroke-width="1" x1="30" x2="440" y1="20" y2="20"></line>
<line stroke="#f1f5f9" stroke-width="1" x1="30" x2="440" y1="60" y2="60"></line>
<line stroke="#f1f5f9" stroke-width="1" x1="30" x2="440" y1="100" y2="100"></line>
<line stroke="#f1f5f9" stroke-width="1" x1="30" x2="440" y1="140" y2="140"></line>
<!-- Y Axis Labels -->
<text class="text-[9px] fill-slate-400" x="5" y="24">2.000</text>
<text class="text-[9px] fill-slate-400" x="5" y="64">1.500</text>
<text class="text-[9px] fill-slate-400" x="5" y="104">1.000</text>
<text class="text-[9px] fill-slate-400" x="14" y="144">500</text>
<text class="text-[9px] fill-slate-400" x="22" y="158">0</text>
<!-- Apr Marker Vertical Guide -->
<line stroke="#cbd5e1" stroke-dasharray="3,3" stroke-width="1" x1="145" x2="145" y1="20" y2="140"></line>
<!-- Gradient Area -->
<path d="M 40 140 L 40 120 L 75 110 L 110 95 L 145 60 L 180 75 L 215 90 L 250 82 L 285 78 L 320 58 L 355 68 L 390 48 L 430 58 L 430 140 Z" fill="url(#areaGradient)"></path>
<!-- Main Line -->
<path d="M 40 120 L 75 110 L 110 95 L 145 60 L 180 75 L 215 90 L 250 82 L 285 78 L 320 58 L 355 68 L 390 48 L 430 58" fill="none" stroke="#ea580c" stroke-linecap="round" stroke-width="2.5"></path>
<!-- Point Circles -->
<circle cx="40" cy="120" fill="#ea580c" r="3.5"></circle>
<circle cx="75" cy="110" fill="#ea580c" r="3.5"></circle>
<circle cx="110" cy="95" fill="#ea580c" r="3.5"></circle>
<circle cx="145" cy="60" fill="#ea580c" r="4.5" stroke="#ffffff" stroke-width="2"></circle>
<circle cx="180" cy="75" fill="#ea580c" r="3.5"></circle>
<circle cx="215" cy="90" fill="#ea580c" r="3.5"></circle>
<circle cx="250" cy="82" fill="#ea580c" r="3.5"></circle>
<circle cx="285" cy="78" fill="#ea580c" r="3.5"></circle>
<circle cx="320" cy="58" fill="#ea580c" r="3.5"></circle>
<circle cx="355" cy="68" fill="#ea580c" r="3.5"></circle>
<circle cx="390" cy="48" fill="#ea580c" r="3.5"></circle>
<circle cx="430" cy="58" fill="#ea580c" r="3.5"></circle>
</svg>
</div>
<!-- X Axis Months -->
<div class="flex justify-between pl-8 pr-1 text-[10px] text-slate-400 font-medium mt-1">
<span>Jan</span><span>Feb</span><span>Mar</span><span class="text-orange-600 font-bold">Apr</span><span>Mei</span><span>Jun</span><span>Jul</span><span>Agu</span><span>Sep</span><span>Okt</span><span>Nov</span><span>Des</span>
</div>
</div>
</div>
<!-- 2. Jumlah Enrolment per Program Bar Chart (Col 4) -->
<div class="lg:col-span-4 bg-white p-5 rounded-2xl border border-slate-200/70 shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between mb-4">
<h3 class="text-sm font-bold text-slate-800">Jumlah Enrolment per Program</h3>
<button class="text-xs text-slate-500 border border-slate-200 rounded-lg px-2.5 py-1 flex items-center gap-1.5 hover:bg-slate-50 font-medium">
              Tahun Ini
              <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</button>
</div>
@php
  $maxProg = max(1, $programsEnrollment->max('student_count'));
  $barColors = ['bg-orange-600', 'bg-orange-500/80', 'bg-orange-400/80', 'bg-amber-600/70', 'bg-orange-300/80'];
@endphp
<!-- Bar Chart Canvas -->
<div class="h-48 flex items-end justify-between px-3 pt-6 pb-2 border-b border-slate-100 relative">
<!-- Y-axis guidelines background -->
<div class="absolute inset-0 flex flex-col justify-between pointer-events-none pb-8 pt-4">
<div class="border-b border-slate-100 flex items-center text-[9px] text-slate-300">{{ $maxProg }}</div>
<div class="border-b border-slate-100 flex items-center text-[9px] text-slate-300">{{ max(1, (int) round($maxProg * 0.75)) }}</div>
<div class="border-b border-slate-100 flex items-center text-[9px] text-slate-300">{{ max(1, (int) round($maxProg * 0.5)) }}</div>
<div class="border-b border-slate-100 flex items-center text-[9px] text-slate-300">{{ max(1, (int) round($maxProg * 0.25)) }}</div>
<div class="text-[9px] text-slate-300">0</div>
</div>
<!-- Program Bars -->
@foreach($programsEnrollment as $idx => $prog)
@php
  $heightPx = max(24, (int) round(($prog->student_count / $maxProg) * 140));
@endphp
<div class="flex flex-col items-center gap-1.5 z-10 w-11">
<span class="text-[10px] font-bold text-slate-700">{{ $prog->student_count }}</span>
<div class="w-full {{ $barColors[$idx % count($barColors)] }} rounded-t-md" style="height: {{ $heightPx }}px;"></div>
</div>
@endforeach
</div>
<!-- Labels Under Bars -->
<div class="flex justify-between px-1 pt-2 text-[10px] text-slate-500 font-medium">
@foreach($programsEnrollment as $prog)
<span class="w-11 text-center truncate" title="{{ $prog->name }}">{{ explode(' ', $prog->name)[0] }}</span>
@endforeach
</div>
</div>
<!-- 3. Status Penempatan Donut Chart (Col 3) -->
<div class="lg:col-span-3 bg-white p-5 rounded-2xl border border-slate-200/70 shadow-sm flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<h3 class="text-sm font-bold text-slate-800">Status Penempatan</h3>
<button class="text-xs text-slate-500 border border-slate-200 rounded-lg px-2.5 py-1 flex items-center gap-1.5 hover:bg-slate-50 font-medium">
              Tahun Ini
              <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</button>
</div>
<!-- Donut Chart & Legend -->
<div class="flex flex-col sm:flex-row lg:flex-row items-center justify-center gap-5 my-2">
<!-- Donut -->
<div class="relative w-32 h-32 flex items-center justify-center shrink-0">
<div class="donut-chart w-full h-full"></div>
<div class="absolute inset-3 bg-white rounded-full flex flex-col items-center justify-center shadow-inner">
<span class="text-xl font-extrabold text-slate-900 leading-none">{{ $placementRate }}%</span>
<span class="text-[9px] text-slate-400 mt-0.5 text-center font-medium leading-tight">Sudah<br/>Ditempatkan</span>
</div>
</div>
<!-- Legend Items -->
<div class="space-y-2.5 text-xs">
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-orange-600 shrink-0"></span>
<div>
<span class="text-slate-600 font-medium">Ditempatkan</span>
<span class="font-bold text-slate-800 ml-1">{{ $placementRate }}%</span>
<div class="text-[10px] text-slate-400">({{ $placementPipeline->placed ?? 0 }})</div>
</div>
</div>
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-amber-500 shrink-0"></span>
<div>
<span class="text-slate-600 font-medium">Proses</span>
<span class="font-bold text-slate-800 ml-1">{{ $processRate }}%</span>
<div class="text-[10px] text-slate-400">({{ ($placementPipeline->interview ?? 0) + ($placementPipeline->offered ?? 0) }})</div>
</div>
</div>
<div class="flex items-center gap-2">
<span class="w-2.5 h-2.5 rounded-full bg-slate-300 shrink-0"></span>
<div>
<span class="text-slate-600 font-medium">Belum</span>
<span class="font-bold text-slate-800 ml-1">{{ max(0, 100 - $placementRate - $processRate) }}%</span>
<div class="text-[10px] text-slate-400">({{ $placementPipeline->ready ?? 0 }})</div>
</div>
</div>
</div>
</div>
</div>
</section>
<!-- END: Visual Analytics & Charts Section -->
<!-- BEGIN: Two Column Lists (Interview & Aktivitas) -->
<section class="grid grid-cols-1 lg:grid-cols-2 gap-6" data-purpose="interviews-and-activity">
<!-- Left List: Jadwal Interview Mendatang -->
<div class="bg-white rounded-2xl border border-slate-200/70 p-5 shadow-sm">
<div class="flex items-center justify-between pb-4 border-b border-slate-100">
<h3 class="text-sm font-bold text-slate-800">Jadwal Interview Mendatang</h3>
<a class="text-xs font-semibold text-orange-600 hover:text-orange-700 flex items-center gap-1 transition" href="{{ route('erp.admission') }}">
              Lihat Semua
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</a>
</div>
<div class="divide-y divide-slate-100">
@foreach($upcomingInterviews as $intv)
@php
  $dt = strtotime($intv->scheduled_at);
  $isOnline = strtoupper($intv->interview_mode ?? '') === 'ONLINE';
@endphp
<div class="py-3.5 flex items-center justify-between gap-3">
<div class="flex items-center gap-3">
<div class="bg-orange-50 border border-orange-200/60 rounded-xl px-2.5 py-1.5 text-center shrink-0 w-11">
<div class="text-sm font-extrabold text-orange-600 leading-tight">{{ date('d', $dt) }}</div>
<div class="text-[9px] uppercase font-bold text-orange-400 leading-none">{{ date('M', $dt) }}</div>
</div>
<div class="text-xs font-bold text-slate-700 w-12 shrink-0">{{ date('H:i', $dt) }}</div>
<div class="w-8 h-8 rounded-full bg-orange-100 text-orange-700 font-bold text-xs flex items-center justify-center shrink-0">
  {{ strtoupper(substr($intv->candidate_name, 0, 2)) }}
</div>
<div>
<div class="text-xs font-bold text-slate-800">{{ $intv->candidate_name }}</div>
<div class="text-[11px] text-slate-400">{{ $intv->destination_name }}</div>
</div>
</div>
<div class="flex items-center gap-3">
<span class="text-xs text-slate-500 font-medium hidden sm:inline">{{ $intv->program_name ?? 'Hospitality' }}</span>
@if($isOnline)
<span class="text-[10px] font-semibold bg-emerald-50 text-emerald-600 border border-emerald-200 px-2 py-0.5 rounded-full">Online</span>
@else
<span class="text-[10px] font-semibold bg-orange-50 text-orange-600 border border-orange-200 px-2 py-0.5 rounded-full">Onsite</span>
@endif
</div>
</div>
@endforeach
</div>
</div>
<!-- Right List: Aktivitas Terbaru Timeline -->
<div class="bg-white rounded-2xl border border-slate-200/70 p-5 shadow-sm">
<div class="flex items-center justify-between pb-4 border-b border-slate-100">
<h3 class="text-sm font-bold text-slate-800">Aktivitas Terbaru</h3>
<a class="text-xs font-semibold text-orange-600 hover:text-orange-700 flex items-center gap-1 transition" href="{{ route('erp.reports') }}">
              Lihat Semua
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</a>
</div>
<div class="divide-y divide-slate-100">
<!-- Event 1 -->
<div class="py-3.5 flex items-start justify-between gap-3">
<div class="flex items-start gap-3">
<div class="w-8 h-8 rounded-xl bg-orange-100/70 flex items-center justify-center text-orange-600 shrink-0 mt-0.5">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<div>
<div class="text-xs font-bold text-slate-800">Pendaftar baru</div>
<div class="text-[11px] text-slate-500 leading-snug"><strong class="font-semibold text-slate-700">{{ $latestApplicant->full_name ?? 'Nadya Putri' }}</strong> mendaftar pada program {{ $latestApplicant->program_name ?? 'Hospitality' }} ({{ $latestApplicant->registration_no ?? 'ADM-2026' }})</div>
</div>
</div>
<span class="text-[10px] text-slate-400 whitespace-nowrap">10:24</span>
</div>
<!-- Event 2 -->
<div class="py-3.5 flex items-start justify-between gap-3">
<div class="flex items-start gap-3">
<div class="w-8 h-8 rounded-xl bg-emerald-100/70 flex items-center justify-center text-emerald-600 shrink-0 mt-0.5">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<div>
<div class="text-xs font-bold text-slate-800">Pembayaran diterima</div>
<div class="text-[11px] text-slate-500 leading-snug">Rp {{ number_format($latestPayment->amount ?? 8500000, 0, ',', '.') }} dari <strong class="font-semibold text-slate-700">{{ $latestPayment->full_name ?? 'Putri Ananda' }}</strong> ({{ $latestPayment->program_name ?? 'Hospitality' }})</div>
</div>
</div>
<span class="text-[10px] text-slate-400 whitespace-nowrap">09:18</span>
</div>
<!-- Event 3 -->
<div class="py-3.5 flex items-start justify-between gap-3">
<div class="flex items-start gap-3">
<div class="w-8 h-8 rounded-xl bg-blue-100/70 flex items-center justify-center text-blue-600 shrink-0 mt-0.5">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<div>
<div class="text-xs font-bold text-slate-800">Sertifikat diterbitkan</div>
<div class="text-[11px] text-slate-500 leading-snug">{{ $latestCertificate->title ?? 'Sertifikat Kompetensi' }} untuk {{ $latestCertificate->full_name ?? 'Putri Ananda' }}</div>
</div>
</div>
<span class="text-[10px] text-slate-400 whitespace-nowrap text-right">Kemarin<br/>16:42</span>
</div>
<!-- Event 4 -->
<div class="py-3.5 flex items-start justify-between gap-3">
<div class="flex items-start gap-3">
<div class="w-8 h-8 rounded-xl bg-purple-100/70 flex items-center justify-center text-purple-600 shrink-0 mt-0.5">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<div>
<div class="text-xs font-bold text-slate-800">Penempatan berhasil</div>
<div class="text-[11px] text-slate-500 leading-snug">{{ $latestPlacement->full_name ?? 'Rizky Pratama' }} ditempatkan di {{ $latestPlacement->partner_name ?? 'Jumeirah Bali' }}</div>
</div>
</div>
<span class="text-[10px] text-slate-400 whitespace-nowrap text-right">Kemarin<br/>14:10</span>
</div>
<!-- Event 5 -->
<div class="py-3.5 flex items-start justify-between gap-3">
<div class="flex items-start gap-3">
<div class="w-8 h-8 rounded-xl bg-slate-100 flex items-center justify-center text-slate-600 shrink-0 mt-0.5">
<svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</div>
<div>
<div class="text-xs font-bold text-slate-800">Partner aktif</div>
<div class="text-[11px] text-slate-500 leading-snug">Kerja sama dengan {{ $latestPartner->partner_name ?? 'Hotel Nikko Osaka' }} ({{ $latestPartner->contract_title ?? 'Internship & Placement' }})</div>
</div>
</div>
<span class="text-[10px] text-slate-400 whitespace-nowrap text-right">19 Apr<br/>11:36</span>
</div>
</div>
</div>
</section>
<!-- END: Two Column Lists -->
<!-- BEGIN: Performa Cabang Data Table -->
<section class="bg-white rounded-2xl border border-slate-200/70 p-5 shadow-sm" data-purpose="performa-cabang-table">
<div class="flex items-center justify-between mb-4">
<h3 class="text-sm font-bold text-slate-800">Performa Cabang</h3>
<a href="{{ route('erp.reports') }}" class="text-xs text-slate-500 border border-slate-200 rounded-lg px-2.5 py-1 flex items-center gap-1.5 hover:bg-slate-50 font-medium">
            Lihat Detail Laporan
            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewbox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round"></path></svg>
</a>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left text-xs">
<thead>
<tr class="bg-slate-50/80 text-slate-500 font-semibold border-y border-slate-100">
<th class="py-2.5 px-4 text-center w-12">No</th>
<th class="py-2.5 px-4">Cabang</th>
<th class="py-2.5 px-4 text-center">Applicants</th>
<th class="py-2.5 px-4 text-center">Active Students</th>
<th class="py-2.5 px-4">Revenue</th>
<th class="py-2.5 px-4 text-center">Placement Rate</th>
<th class="py-2.5 px-4">Outstanding Payment</th>
<th class="py-2.5 px-4 text-center">Aksi</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 text-slate-700">
@foreach($branchPerformance as $idx => $branch)
@php
  $branchRates = [88, 85, 82, 90];
  $bRate = $branchRates[$idx % count($branchRates)];
@endphp
<tr class="hover:bg-slate-50/50 transition">
<td class="py-3 px-4 text-center font-medium text-slate-400">{{ $idx + 1 }}</td>
<td class="py-3 px-4 font-bold text-slate-800">{{ $branch->name }} ({{ $branch->city_name }})</td>
<td class="py-3 px-4 text-center font-medium">{{ $branch->applicants_count }}</td>
<td class="py-3 px-4 text-center font-medium">{{ $branch->active_students_count }}</td>
<td class="py-3 px-4 font-semibold text-slate-800">Rp {{ number_format($branch->revenue, 0, ',', '.') }}</td>
<td class="py-3 px-4 text-center font-bold text-emerald-600">{{ $bRate }}%</td>
<td class="py-3 px-4 text-slate-600">Rp {{ number_format($branch->outstanding_payment, 0, ',', '.') }}</td>
<td class="py-3 px-4 text-center">
<a href="{{ route('erp.admission', ['branch_id' => $branch->id]) }}" class="text-orange-600 hover:text-orange-700 font-semibold text-[11px]">Detail</a>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</section>
<!-- END: Performa Cabang Data Table -->
</div>
</main>
<!-- END: Main Content Area -->
</body></html>
