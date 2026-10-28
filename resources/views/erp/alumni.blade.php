<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>IDEA ERP - Alumni Tracking</title>
<!-- Tailwind CSS CDN with forms & container-queries plugins -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- FontAwesome Icons for UI iconography -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
<!-- Google Fonts Inter -->
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
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
              orange: '#f05a28',
              accent: '#ff6934'
            },
            slate: {
              850: '#1e293b'
            }
          }
        }
      }
    }
</script>
<style data-purpose="custom-scrollbars-and-charts">
    ::-webkit-scrollbar {
      width: 5px;
      height: 5px;
    }
    ::-webkit-scrollbar-track {
      background: #f1f5f9;
    }
    ::-webkit-scrollbar-thumb {
      background: #cbd5e1;
      border-radius: 4px;
    }
    ::-webkit-scrollbar-thumb:hover {
      background: #94a3b8;
    }
    .donut-status {
      background: conic-gradient(
        #f97316 0% 82%,
        #fb923c 82% 92%,
        #fdba74 92% 97%,
        #fed7aa 97% 100%
      );
    }
    .donut-career {
      background: conic-gradient(
        #ea580c 0% 32%,
        #f97316 32% 50%,
        #fb923c 50% 66%,
        #fdba74 66% 78%,
        #64748b 78% 86%,
        #94a3b8 86% 100%
      );
    }
</style>
</head>
<body class="bg-[#f8f9fb] text-slate-800 font-sans antialiased overflow-x-hidden">
<!-- BEGIN: MainLayout -->
<div class="flex min-h-screen">
<!-- BEGIN: Sidebar -->
<aside class="w-64 bg-white border-r border-slate-100 flex flex-col justify-between shrink-0 fixed top-0 bottom-0 z-30 transition-all duration-300">
<div>
<!-- Brand Logo Header -->
<div class="h-20 px-6 flex items-center justify-between border-b border-slate-50">
<a href="{{ route('erp.dashboard') }}" class="flex items-center gap-3">
<div class="w-9 h-9 rounded-full border-4 border-orange-500 flex items-center justify-center">
<div class="w-2.5 h-2.5 rounded-full bg-orange-500"></div>
</div>
<div>
<h1 class="text-base font-extrabold text-slate-900 tracking-tight leading-none">IDEA ERP</h1>
<span class="text-[10px] text-slate-400 font-medium">Education for a Brighter Tomorrow</span>
</div>
</a>
<button class="text-slate-400 hover:text-slate-600 text-xs py-1 px-1.5 rounded">
<i class="fa-solid fa-chevron-left"></i>
</button>
</div>
<!-- Navigation Menu Links -->
<nav class="p-4 space-y-1 text-sm font-medium text-slate-600">
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-colors" href="{{ route('erp.dashboard') }}">
<i class="fa-solid fa-shapes text-base text-slate-400 w-5 text-center"></i>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-colors" href="{{ route('erp.admission') }}">
<i class="fa-solid fa-user-plus text-base text-slate-400 w-5 text-center"></i>
<span>Admission</span>
</a>
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-colors" href="{{ route('erp.finance') }}">
<i class="fa-solid fa-wallet text-base text-slate-400 w-5 text-center"></i>
<span>Finance</span>
</a>
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-colors" href="{{ route('erp.students') }}">
<i class="fa-solid fa-users text-base text-slate-400 w-5 text-center"></i>
<span>Student Management</span>
</a>
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-colors" href="{{ route('erp.assessments') }}">
<i class="fa-solid fa-file-signature text-base text-slate-400 w-5 text-center"></i>
<span>Assessment &amp; Certification</span>
</a>
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-colors" href="{{ route('erp.placements') }}">
<i class="fa-solid fa-briefcase text-base text-slate-400 w-5 text-center"></i>
<span>Career &amp; Placement</span>
</a>
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-colors" href="{{ route('erp.partners') }}">
<i class="fa-solid fa-handshake text-base text-slate-400 w-5 text-center"></i>
<span>Partners</span>
</a>
<!-- Active Alumni Tab -->
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl bg-[#f05a28] text-white font-semibold shadow-sm shadow-orange-300" href="{{ route('erp.alumni') }}">
<i class="fa-solid fa-graduation-cap text-base text-white w-5 text-center"></i>
<span>Alumni</span>
</a>
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl hover:bg-slate-50 hover:text-slate-900 transition-colors" href="{{ route('erp.reports') }}">
<i class="fa-solid fa-chart-column text-base text-slate-400 w-5 text-center"></i>
<span>Reports</span>
</a>
</nav>
</div>
<!-- Promo / Banner Card at Bottom of Sidebar -->
<div class="p-4 m-3.5 bg-gradient-to-b from-[#fef5ec] via-[#fdeddc] to-[#ffe5d3] rounded-2xl relative overflow-hidden border border-orange-100 shadow-sm">
<div class="flex justify-center mb-3">
<div class="relative">
<div class="w-20 h-20 rounded-full bg-orange-200/50 absolute -top-1 -left-2 blur-sm"></div>
<img alt="Students Banner" class="w-24 h-24 object-cover rounded-xl shadow-md relative z-10 mx-auto" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA20CeqjEtFhhQoRWQ-AndbKNQADuZi4Lz75QIqBWusYBxSOA7euRd7mQTBcvzXBWnbjJYTnXmCksk1GIIhFdt6ktJH8ME-s6oz_1rV-GYOfZHoPnTUn0QMWizvALTGrmTjkcBF1ajUcdWematNzPkFY5Yb1wa64a9FiEvUHUOg7MQvIpjbhD7TWsBUdqPOflUr9devt2iaTnQYZ7KcUICaaIGYgGv4Uwq46OzI_Ik"/>
</div>
</div>
<h4 class="text-xs font-bold text-orange-600 leading-tight">Membangun Talenta Global dari Indonesia</h4>
<p class="text-[10px] text-slate-500 mt-1 leading-normal">Pendidikan, peluang dan masa depan yang lebih baik.</p>
<a href="{{ route('erp.reports') }}" class="mt-3 w-full bg-[#f05a28] hover:bg-orange-600 text-white text-[11px] font-semibold py-2 px-3 rounded-lg flex items-center justify-center gap-1.5 shadow-sm transition">
<span>Bersama IDEA ERP</span>
<i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</aside>
<!-- END: Sidebar -->
<!-- BEGIN: MainContentWrapper -->
<div class="flex-1 ml-64 flex flex-col min-w-0">
<!-- BEGIN: Topbar -->
<header class="h-20 bg-white/80 backdrop-blur-md sticky top-0 z-20 border-b border-slate-100 px-8 flex items-center justify-between">
<!-- Search bar -->
<form action="{{ route('erp.alumni') }}" method="GET" class="relative w-full max-w-xl">
<i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-sm"></i>
<input name="q" value="{{ $filters['q'] ?? '' }}" class="w-full bg-[#f8fafc] border border-slate-200 text-xs rounded-xl pl-11 pr-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 placeholder-slate-400 transition" placeholder="Cari nama alumni, perusahaan, atau posisi..." type="text"/>
</form>
<!-- Right User Actions -->
<div class="flex items-center gap-5 ml-4">
<div class="relative cursor-pointer" title="{{ $notifications->count() }} notifikasi">
<div class="w-9 h-9 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-500 hover:text-slate-700">
<i class="fa-regular fa-bell text-sm"></i>
</div>
<span class="absolute top-1 right-1 w-2.5 h-2.5 bg-orange-500 border-2 border-white rounded-full"></span>
</div>
<div class="w-px h-8 bg-slate-100"></div>
<div class="flex items-center gap-3 cursor-pointer">
<img alt="{{ $currentUser->full_name ?? 'Sari Anggraini' }}" class="w-10 h-10 rounded-full object-cover ring-2 ring-orange-500/20" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBg4bilZCRJu_tP6rHy0luJjqZhHPg_Rc3Acid0dfGyAlk1XFjCkBKM-EpKsRyrFuwvroF8BGCtqCyuMtpl0PR30zckWraVP7Q8Fu0ZWw59lZYAQDL_8VjGFLOnl12_I5l8R2X84_-lK0Ju2SlM1bQasBTyaU6st-CK6K1_HALy3CXB4espIlyUk_78wKNPskDIxLhiIvv3aA37eKeaEXj7lw6gv--vcTbm3BEo1gs"/>
<div class="text-left hidden sm:block">
<div class="text-xs font-bold text-slate-800 flex items-center gap-1.5">
  {{ $currentUser->full_name ?? 'Sari Anggraini' }}
  <i class="fa-solid fa-chevron-down text-[10px] text-slate-400"></i>
</div>
<p class="text-[10px] text-slate-400 font-medium">{{ $currentUser->position_title ?? 'Head of Administration' }}</p>
</div>
</div>
</div>
</header>
<!-- END: Topbar -->
<!-- Main Body Container -->
<main class="p-8 space-y-6">
<!-- BEGIN: PageHeader -->
<div class="bg-gradient-to-r from-white via-white to-amber-50/60 p-6 rounded-2xl border border-slate-100 shadow-sm flex flex-col md:flex-row md:items-center justify-between gap-4 relative overflow-hidden">
<div class="relative z-10">
<h2 class="text-2xl font-bold text-slate-900 tracking-tight">Alumni Tracking</h2>
<p class="text-xs text-slate-500 mt-1">Pantau perjalanan karier alumni IDEA dan jaringan global mereka.</p>
</div>
<div class="relative z-10 text-right">
<span class="text-xs font-bold text-slate-800">{{ now()->translatedFormat('l, d M Y') }}</span>
<p class="text-[11px] text-slate-400 mt-0.5">Alumni kami, dampak nyata di dunia.</p>
</div>
<div class="absolute right-0 bottom-0 top-0 opacity-15 pointer-events-none flex items-end">
<img alt="Graduation backdrop" class="h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCVqSkp8MaEZUSxXq-mYN28Yoez4AAIBAbYh-2XwNleqPd0wF7kY2ZB4u-XFSu2l9E1zSpv1K3CdsA4-OBFJ-JiyIFd4wxYZYqkQuNChZMH96PqOlxTBOwQEelyh80wKK_psY-JxCemFV1OxlXclwjcQ0wS5-E_cicfnqoL2xCkW32oUqrhbu7B8jSnCz0dVweW7aYa1RnkE6RRqGhm8p_gT0rNfdZQOUh98qQnLgQ"/>
</div>
</div>
<!-- END: PageHeader -->
<!-- BEGIN: KPIStatsSection -->
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
<!-- Card 1: Total Alumni -->
<div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center text-sm">
<i class="fa-solid fa-users"></i>
</div>
<span class="text-[11px] font-medium text-slate-400">Total Alumni</span>
</div>
<div class="mt-3">
<div class="text-xl font-bold text-slate-900">{{ number_format($kpis['total_alumni']) }}</div>
<div class="text-[10px] text-emerald-600 font-semibold flex items-center gap-1 mt-0.5">
<i class="fa-solid fa-arrow-up text-[9px]"></i> 12% 
<span class="text-slate-400 font-normal">dari tahun lalu</span>
</div>
</div>
</div>
<!-- Card 2: Employed Alumni -->
<div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center text-sm">
<i class="fa-solid fa-briefcase"></i>
</div>
<span class="text-[11px] font-medium text-slate-400">Employed Alumni</span>
</div>
<div class="mt-3">
<div class="text-xl font-bold text-slate-900">{{ number_format($kpis['employed_alumni']) }}</div>
<div class="text-[10px] text-emerald-600 font-semibold flex items-center gap-1 mt-0.5">
<i class="fa-solid fa-arrow-up text-[9px]"></i> 15% 
<span class="text-slate-400 font-normal">dari tahun lalu</span>
</div>
</div>
</div>
<!-- Card 3: International Alumni -->
<div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center text-sm">
<i class="fa-solid fa-earth-americas"></i>
</div>
<span class="text-[11px] font-medium text-slate-400">International Alumni</span>
</div>
<div class="mt-3">
<div class="text-xl font-bold text-slate-900">{{ number_format($kpis['intl_alumni']) }}</div>
<div class="text-[10px] text-emerald-600 font-semibold flex items-center gap-1 mt-0.5">
<i class="fa-solid fa-arrow-up text-[9px]"></i> 20% 
<span class="text-slate-400 font-normal">dari tahun lalu</span>
</div>
</div>
</div>
<!-- Card 4: Average Starting Salary -->
<div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center text-sm">
<i class="fa-solid fa-wallet"></i>
</div>
<span class="text-[11px] font-medium text-slate-400 leading-tight">Average Starting Salary</span>
</div>
<div class="mt-3">
<div class="text-xl font-bold text-slate-900">Rp 12,5 Jt</div>
<div class="text-[10px] text-emerald-600 font-semibold flex items-center gap-1 mt-0.5">
<i class="fa-solid fa-arrow-up text-[9px]"></i> 18% 
<span class="text-slate-400 font-normal">dari tahun lalu</span>
</div>
</div>
</div>
<!-- Card 5: Alumni Survey Response -->
<div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center text-sm">
<i class="fa-solid fa-chart-simple"></i>
</div>
<span class="text-[11px] font-medium text-slate-400">Alumni Survey Response</span>
</div>
<div class="mt-3">
<div class="text-xl font-bold text-slate-900">{{ $kpis['total_alumni'] > 0 ? round(($kpis['survey_responses'] / $kpis['total_alumni']) * 100) : 82 }}%</div>
<div class="text-[10px] text-emerald-600 font-semibold flex items-center gap-1 mt-0.5">
<i class="fa-solid fa-arrow-up text-[9px]"></i> 6% 
<span class="text-slate-400 font-normal">({{ $kpis['survey_responses'] }} respon)</span>
</div>
</div>
</div>
<!-- Card 6: Active Mentors -->
<div class="bg-white p-4 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between">
<div class="flex items-center gap-3">
<div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center text-sm">
<i class="fa-solid fa-user-group"></i>
</div>
<span class="text-[11px] font-medium text-slate-400">Active Mentors</span>
</div>
<div class="mt-3">
<div class="text-xl font-bold text-slate-900">{{ number_format($kpis['active_mentors']) }}</div>
<div class="text-[10px] text-emerald-600 font-semibold flex items-center gap-1 mt-0.5">
<i class="fa-solid fa-arrow-up text-[9px]"></i> 25% 
<span class="text-slate-400 font-normal">dari tahun lalu</span>
</div>
</div>
</div>
</div>
<!-- END: KPIStatsSection -->
<!-- BEGIN: ChartsAnalyticsSection -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
<!-- Chart 1: Status Pekerjaan Alumni (4 cols) -->
<div class="lg:col-span-4 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between">
<div>
<h3 class="text-sm font-bold text-slate-900">Status Pekerjaan Alumni</h3>
@php
  $employedPct = $kpis['total_alumni'] > 0 ? round(($kpis['employed_alumni'] / $kpis['total_alumni']) * 100) : 82;
@endphp
<div class="mt-5 flex items-center justify-around gap-4">
<div class="relative w-32 h-32 rounded-full donut-status flex items-center justify-center shrink-0">
<div class="w-20 h-20 bg-white rounded-full flex flex-col items-center justify-center text-center shadow-inner">
<span class="text-base font-extrabold text-slate-900 leading-tight">{{ $employedPct }}%</span>
<span class="text-[10px] text-slate-400 font-medium">Bekerja</span>
</div>
</div>
<div class="space-y-2.5 text-[11px] flex-1">
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5">
<span class="w-2.5 h-2.5 rounded-full bg-[#f97316]"></span>
<span class="text-slate-600">Bekerja</span>
</div>
<div class="text-right">
<span class="font-bold text-slate-800">{{ $employedPct }}%</span>
<span class="text-[10px] text-slate-400 block">({{ $kpis['employed_alumni'] }})</span>
</div>
</div>
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5">
<span class="w-2.5 h-2.5 rounded-full bg-[#fb923c]"></span>
<span class="text-slate-600">Melanjutkan Studi</span>
</div>
<div class="text-right">
<span class="font-bold text-slate-800">10%</span>
</div>
</div>
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5">
<span class="w-2.5 h-2.5 rounded-full bg-[#fdba74]"></span>
<span class="text-slate-600">Wirausaha</span>
</div>
<div class="text-right">
<span class="font-bold text-slate-800">5%</span>
</div>
</div>
</div>
</div>
</div>
</div>
<!-- Chart 2: Alumni Berdasarkan Negara (4 cols) -->
<div class="lg:col-span-4 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-3">
<h3 class="text-sm font-bold text-slate-900">Alumni Berdasarkan Negara</h3>
<span class="text-[11px] text-slate-400 flex items-center gap-1">
  Negara Penempatan
</span>
</div>
<div class="space-y-2.5 text-[11px]">
@php
  $maxCountry = max(1, $countryBreakdown->max('alumni_count'));
  $flags = ['ID' => '🇮🇩', 'SG' => '🇸🇬', 'AU' => '🇦🇺', 'JP' => '🇯🇵', 'US' => '🇺🇸', 'GB' => '🇬🇧', 'AE' => '🇦🇪', 'FR' => '🇫🇷'];
@endphp
@foreach($countryBreakdown as $cb)
@php
  $barW = max(10, round(($cb->alumni_count / $maxCountry) * 100));
@endphp
<div class="flex items-center gap-2">
<span class="w-4 text-center">{{ $flags[$cb->iso2] ?? '🌍' }}</span>
<span class="w-28 text-slate-600 truncate text-[11px]">{{ $cb->name }}</span>
<div class="flex-1 bg-slate-100 rounded-full h-2 overflow-hidden">
<div class="bg-orange-500 h-2 rounded-full" style="width: {{ $barW }}%;"></div>
</div>
<span class="text-[10px] font-semibold text-slate-700 w-9 text-right">{{ $cb->alumni_count }}</span>
</div>
@endforeach
</div>
</div>
</div>
<!-- Chart 3: Distribusi Bidang Karier Alumni (4 cols) -->
<div class="lg:col-span-4 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between">
<div>
<h3 class="text-sm font-bold text-slate-900">Distribusi Bidang Karier Alumni</h3>
<div class="mt-5 flex items-center justify-around gap-4">
<div class="relative w-32 h-32 rounded-full donut-career flex items-center justify-center shrink-0">
<div class="w-20 h-20 bg-white rounded-full flex flex-col items-center justify-center text-center shadow-inner">
<span class="text-base font-extrabold text-slate-900 leading-tight">{{ $kpis['total_alumni'] }}</span>
<span class="text-[10px] text-slate-400 font-medium">Alumni</span>
</div>
</div>
<div class="space-y-1.5 text-[11px] flex-1">
@php
  $progColors = ['#ea580c', '#f97316', '#fb923c', '#fdba74', '#64748b'];
  $totalProgAlumni = max(1, $programBreakdown->sum('alumni_count'));
@endphp
@foreach($programBreakdown as $idx => $pb)
@php
  $pct = round(($pb->alumni_count / $totalProgAlumni) * 100);
@endphp
<div class="flex items-center justify-between">
<div class="flex items-center gap-1.5">
<span class="w-2 h-2 rounded-full" style="background-color: {{ $progColors[$idx % count($progColors)] }}"></span>
<span class="text-slate-600 text-[11px] truncate max-w-[100px]">{{ $pb->name }}</span>
</div>
<span class="font-semibold text-slate-700 text-[10px]">{{ $pct }}% <span class="text-slate-400 font-normal">({{ $pb->alumni_count }})</span></span>
</div>
@endforeach
</div>
</div>
</div>
</div>
</div>
<!-- END: ChartsAnalyticsSection -->
<!-- BEGIN: DirectoryAndStoriesSection -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
<!-- Direktori Alumni Table (8 cols) -->
<div class="lg:col-span-8 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
<!-- Table Header Controls -->
<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-4">
<h3 class="text-sm font-bold text-slate-900">Direktori Alumni ({{ $alumniList->count() }})</h3>
<form action="{{ route('erp.alumni') }}" method="GET" class="flex items-center gap-2">
<div class="relative w-56">
<i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
<input name="q" value="{{ $filters['q'] ?? '' }}" class="w-full bg-slate-50 border border-slate-200 text-[11px] rounded-lg pl-8 pr-3 py-1.5 focus:outline-none focus:ring-1 focus:ring-orange-500 placeholder-slate-400" placeholder="Cari nama alumni, perusahaan..." type="text"/>
</div>
<select name="program_id" onchange="this.form.submit()" class="bg-white border border-slate-200 hover:bg-slate-50 text-slate-600 px-3 py-1.5 rounded-lg text-xs font-medium">
<option value="">Semua Program</option>
@foreach($programs as $prog)
  <option value="{{ $prog->id }}" @selected(($filters['program_id'] ?? '') == $prog->id)>{{ $prog->name }}</option>
@endforeach
</select>
</form>
</div>
<!-- Table Responsive Wrapper -->
<div class="overflow-x-auto">
<table class="w-full text-left text-xs border-collapse">
<thead>
<tr class="bg-slate-50/75 text-[11px] text-slate-500 font-semibold border-b border-slate-100">
<th class="py-2.5 px-3">Alumni Name</th>
<th class="py-2.5 px-3">Program</th>
<th class="py-2.5 px-3 text-center">Graduation Year</th>
<th class="py-2.5 px-3">Employer</th>
<th class="py-2.5 px-3">Position</th>
<th class="py-2.5 px-3">Country</th>
<th class="py-2.5 px-3 text-center">Employment Status</th>
<th class="py-2.5 px-3">Last Update</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 text-[11px]">
@forelse($alumniList as $al)
@php
  $flag = $flags[$al->country_iso2 ?? 'ID'] ?? '🌍';
  $isWorking = $al->current_employment_status === 'EMPLOYED';
@endphp
<tr class="hover:bg-slate-50/60 transition">
<td class="py-2.5 px-3 whitespace-nowrap">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded-full bg-orange-100 text-orange-700 font-bold text-[10px] flex items-center justify-center">{{ strtoupper(substr($al->full_name, 0, 2)) }}</div>
<div>
  <span class="font-semibold text-slate-800 block">{{ $al->full_name }}</span>
  <span class="text-[9px] text-slate-400">{{ $al->alumni_no }}</span>
</div>
</div>
</td>
<td class="py-2.5 px-3 text-slate-600 whitespace-nowrap">{{ $al->program_name }}</td>
<td class="py-2.5 px-3 text-slate-600 text-center">{{ \Carbon\Carbon::parse($al->graduation_date)->format('Y') }}</td>
<td class="py-2.5 px-3 text-slate-600 whitespace-nowrap">{{ $al->partner_name ?? '-' }}</td>
<td class="py-2.5 px-3 text-slate-600 whitespace-nowrap">{{ $al->current_position ?? '-' }}</td>
<td class="py-2.5 px-3 whitespace-nowrap">
<span class="inline-flex items-center gap-1 text-slate-700">
<span>{{ $flag }}</span> {{ $al->country_name ?? 'Indonesia' }}
</span>
</td>
<td class="py-2.5 px-3 text-center">
@if($isWorking)
<span class="bg-emerald-50 text-emerald-600 font-semibold px-2.5 py-0.5 rounded-full text-[10px]">Bekerja</span>
@else
<span class="bg-orange-50 text-orange-600 font-semibold px-2.5 py-0.5 rounded-full text-[10px]">{{ $al->current_employment_status }}</span>
@endif
</td>
<td class="py-2.5 px-3 text-slate-400 whitespace-nowrap">{{ $al->last_update_at ? \Carbon\Carbon::parse($al->last_update_at)->format('d M Y') : '-' }}</td>
</tr>
@empty
<tr>
  <td colspan="8" class="py-6 text-center text-slate-400">Tidak ada data alumni ditemukan.</td>
</tr>
@endforelse
</tbody>
</table>
</div>
</div>
<!-- Kisah Sukses Alumni (4 cols) -->
<div class="lg:col-span-4 bg-white p-5 rounded-2xl border border-slate-100 shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-4">
<h3 class="text-sm font-bold text-slate-900">Kisah Sukses Alumni</h3>
<span class="text-[11px] font-semibold text-orange-600">Mentor Aktif</span>
</div>
<div class="space-y-4">
@foreach($alumniList->take(3) as $story)
<div class="p-3 bg-slate-50/60 rounded-xl border border-slate-100/70 hover:bg-slate-50 transition">
<div class="flex items-center gap-3">
<div class="w-10 h-10 rounded-full bg-orange-500 text-white font-bold flex items-center justify-center text-xs ring-2 ring-orange-500/20">
  {{ strtoupper(substr($story->full_name, 0, 2)) }}
</div>
<div>
<h4 class="text-xs font-bold text-slate-900 leading-tight">{{ $story->full_name }}</h4>
<p class="text-[10px] text-slate-400 font-medium">Alumni {{ \Carbon\Carbon::parse($story->graduation_date)->format('Y') }} • {{ $story->program_name }}</p>
<p class="text-[10px] text-slate-700 font-semibold">{{ $story->partner_name ?? 'Global Partner' }} <span class="text-slate-400 font-normal">{{ $story->country_name ?? 'Indonesia' }}</span></p>
</div>
</div>
<p class="text-[11px] text-slate-600 mt-2.5 italic leading-relaxed">
<span class="text-orange-500 font-bold text-sm not-italic mr-0.5">“</span>Pendidikan di IDEA memberi saya fondasi kuat untuk karier internasional sebagai {{ $story->current_position ?? 'profesional' }} di {{ $story->partner_name ?? 'industri global' }}.<span class="text-orange-500 font-bold text-sm not-italic ml-0.5">”</span>
</p>
</div>
@endforeach
</div>
</div>
</div>
</div>
<!-- END: DirectoryAndStoriesSection -->
</main>
<!-- END: MainContent -->
</div>
<!-- END: MainContentWrapper -->
</div>
<!-- END: MainLayout -->
</body>
</html>
