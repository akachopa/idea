<!DOCTYPE html>
<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>IDEA ERP - Student Management</title>
<!-- Tailwind CSS v3 CDN with forms and container queries -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Font Awesome Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
<script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: {
              50: '#fff7ed',
              100: '#ffedd5',
              500: '#f97316',
              600: '#ea580c',
              700: '#c2410c'
            }
          }
        }
      }
    }
  </script>
<style data-purpose="custom-styling">
    ::-webkit-scrollbar {
      width: 6px;
      height: 6px;
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
    .donut-chart {
      background: conic-gradient(
        #f97316 0% 35%,
        #fb923c 35% 60%,
        #fdba74 60% 75%,
        #b45309 75% 89%,
        #d97706 89% 100%
      );
    }
  </style>
</head>
<body class="bg-[#f8f9fa] text-slate-800 antialiased font-sans flex min-h-screen">
<!-- BEGIN: Sidebar -->
<aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between flex-shrink-0 min-h-screen sticky top-0 h-screen overflow-y-auto">
<div>
<!-- Brand Logo Header -->
<div class="p-6 flex items-center justify-between border-b border-slate-100">
<a href="{{ route('erp.dashboard') }}" class="flex items-center space-x-3">
<div class="w-9 h-9 rounded-full bg-gradient-to-tr from-brand-600 to-amber-400 flex items-center justify-center text-white shadow-sm ring-4 ring-orange-50">
<div class="w-4 h-4 rounded-full border-2 border-white"></div>
</div>
<div>
<h1 class="font-extrabold text-lg tracking-tight text-slate-900 leading-tight">IDEA ERP</h1>
<p class="text-[10px] text-slate-400 font-medium tracking-wide">Education for a Brighter Tomorrow</p>
</div>
</a>
<button class="text-slate-400 hover:text-slate-600 transition-colors">
<i class="fa-solid fa-chevron-left text-xs"></i>
</button>
</div>
<!-- Navigation Links -->
<nav class="p-4 space-y-1 text-sm font-medium">
<a class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.dashboard') }}">
<i class="fa-solid fa-shapes w-5 text-slate-400"></i>
<span>Dashboard</span>
</a>
<a class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.admission') }}">
<i class="fa-solid fa-user-plus w-5 text-slate-400"></i>
<span>Admission</span>
</a>
<a class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.finance') }}">
<i class="fa-solid fa-wallet w-5 text-slate-400"></i>
<span>Finance</span>
</a>
<!-- Active Page Link: Student Management -->
<a class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl bg-gradient-to-r from-brand-500 to-brand-600 text-white shadow-sm shadow-orange-200" href="{{ route('erp.students') }}">
<i class="fa-solid fa-user-group w-5 text-white"></i>
<span class="font-semibold">Student Management</span>
</a>
<a class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.assessments') }}">
<i class="fa-solid fa-certificate w-5 text-slate-400"></i>
<span>Assessment &amp; Certification</span>
</a>
<a class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.placements') }}">
<i class="fa-solid fa-briefcase w-5 text-slate-400"></i>
<span>Career &amp; Placement</span>
</a>
<a class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.partners') }}">
<i class="fa-solid fa-handshake w-5 text-slate-400"></i>
<span>Partners</span>
</a>
<a class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.alumni') }}">
<i class="fa-solid fa-graduation-cap w-5 text-slate-400"></i>
<span>Alumni</span>
</a>
<a class="flex items-center space-x-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.reports') }}">
<i class="fa-solid fa-chart-column w-5 text-slate-400"></i>
<span>Reports</span>
</a>
</nav>
</div>
<!-- Promo Banner Card in Sidebar -->
<div class="p-4">
<div class="rounded-2xl p-4 relative overflow-hidden bg-gradient-to-b from-orange-50 to-orange-100/70 border border-orange-200/60 shadow-sm">
<div class="w-12 h-12 rounded-xl bg-orange-200 flex items-center justify-center text-brand-600 mb-3 text-xl">
<i class="fa-solid fa-lightbulb"></i>
</div>
<h4 class="font-bold text-slate-900 leading-snug text-sm">Membangun Talenta Global dari Indonesia</h4>
<p class="text-[11px] text-slate-600 mt-1">Pendidikan, peluang dan masa depan yang lebih baik.</p>
<a href="{{ route('erp.reports') }}" class="mt-3.5 w-full py-2 px-3 bg-brand-500 hover:bg-brand-600 text-white font-medium text-xs rounded-xl shadow transition-colors flex items-center justify-center space-x-2">
<span>Bersama IDEA ERP</span>
<i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
</aside>
<!-- END: Sidebar -->
<!-- BEGIN: MainContentWrapper -->
<div class="flex-1 flex flex-col min-w-0">
<!-- BEGIN: TopBar -->
<header class="bg-white border-b border-slate-200 h-16 flex items-center justify-between px-8 sticky top-0 z-20">
<!-- Search Input -->
<form action="{{ route('erp.students') }}" method="GET" class="relative w-96">
<span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-400">
<i class="fa-solid fa-magnifying-glass text-xs"></i>
</span>
<input name="q" value="{{ $filters['q'] ?? '' }}" class="w-full pl-9 pr-4 py-1.5 text-xs bg-slate-50 border border-slate-200 rounded-lg text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-brand-500 focus:border-brand-500" placeholder="Cari data siswa, program, pembayaran, atau lainnya..." type="text"/>
</form>
<!-- Top Right Actions & Profile -->
<div class="flex items-center space-x-5">
<button class="relative text-slate-400 hover:text-slate-600 p-1">
<i class="fa-regular fa-bell text-lg"></i>
<span class="absolute top-0 right-0 w-2 h-2 bg-brand-500 rounded-full ring-2 ring-white"></span>
</button>
<div class="h-6 w-px bg-slate-200"></div>
<!-- User Profile Pill -->
<div class="flex items-center space-x-3 cursor-pointer">
<div class="w-9 h-9 rounded-full bg-slate-200 overflow-hidden ring-2 ring-orange-100 flex items-center justify-center font-bold text-slate-500">
            SA
          </div>
<div class="text-left hidden md:block">
<h5 class="text-xs font-bold text-slate-800 leading-none">{{ $currentUser->full_name ?? 'Sari Anggraini' }}</h5>
<span class="text-[10px] text-slate-400">{{ $currentUser->position_name ?? 'Head of Administration' }}</span>
</div>
<i class="fa-solid fa-chevron-down text-[10px] text-slate-400"></i>
</div>
</div>
</header>
<!-- END: TopBar -->
<!-- BEGIN: MainBody -->
<main class="p-8 space-y-6">
@if(session('success'))
<div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-xs font-semibold flex items-center justify-between shadow-sm">
  <span>{{ session('success') }}</span>
  <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900">✕</button>
</div>
@endif
<!-- Header Title & Greeting Section -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
<div>
<h2 class="text-2xl font-black text-slate-900 tracking-tight">Student Management</h2>
<p class="text-xs text-slate-500 mt-1">Kelola data siswa, pantau perkembangan, dan dukung perjalanan mereka bersama IDEA ERP.</p>
</div>
<div class="text-right">
<p class="text-xs font-bold text-slate-700">Senin, 21 Apr 2025</p>
<p class="text-[11px] text-slate-400">Semangat untuk hari yang produktif!</p>
</div>
</div>
<!-- BEGIN: KPICardsGrid -->
<div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4">
<!-- KPI 1: Active Students -->
<div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
<div class="w-10 h-10 rounded-xl bg-orange-50 text-brand-500 flex items-center justify-center mb-2">
<i class="fa-solid fa-users text-base"></i>
</div>
<div>
<p class="text-[11px] font-medium text-slate-400">Active Students</p>
<h3 class="text-2xl font-bold text-slate-900 mt-0.5">{{ $kpis['active_students'] }}</h3>
<p class="text-[10px] text-emerald-600 font-semibold mt-1">
<i class="fa-solid fa-arrow-up mr-0.5"></i>5% <span class="text-slate-400 font-normal">dari bulan lalu</span>
</p>
</div>
</div>
<!-- KPI 2: New Enrollment -->
<div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
<div class="w-10 h-10 rounded-xl bg-orange-50 text-brand-500 flex items-center justify-center mb-2">
<i class="fa-solid fa-graduation-cap text-base"></i>
</div>
<div>
<p class="text-[11px] font-medium text-slate-400">Total Enrollment</p>
<h3 class="text-2xl font-bold text-slate-900 mt-0.5">{{ $kpis['new_enrollment'] }}</h3>
<p class="text-[10px] text-emerald-600 font-semibold mt-1">
<i class="fa-solid fa-arrow-up mr-0.5"></i>18% <span class="text-slate-400 font-normal">dari bulan lalu</span>
</p>
</div>
</div>
<!-- KPI 3: Attendance Rate -->
<div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
<div class="w-10 h-10 rounded-xl bg-orange-50 text-brand-500 flex items-center justify-center mb-2">
<i class="fa-solid fa-chart-simple text-base"></i>
</div>
<div>
<p class="text-[11px] font-medium text-slate-400">Attendance Rate</p>
<h3 class="text-2xl font-bold text-slate-900 mt-0.5">{{ $kpis['attendance_rate'] }}%</h3>
<p class="text-[10px] text-emerald-600 font-semibold mt-1">
<i class="fa-solid fa-arrow-up mr-0.5"></i>3% <span class="text-slate-400 font-normal">dari bulan lalu</span>
</p>
</div>
</div>
<!-- KPI 4: Training Progress -->
<div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
<div class="w-10 h-10 rounded-xl bg-orange-50 text-brand-500 flex items-center justify-center mb-2">
<i class="fa-solid fa-book-open text-base"></i>
</div>
<div>
<p class="text-[11px] font-medium text-slate-400">Training Progress</p>
<h3 class="text-2xl font-bold text-slate-900 mt-0.5">{{ $kpis['training_progress'] }}%</h3>
<p class="text-[10px] text-emerald-600 font-semibold mt-1">
<i class="fa-solid fa-arrow-up mr-0.5"></i>8% <span class="text-slate-400 font-normal">dari bulan lalu</span>
</p>
</div>
</div>
<!-- KPI 5: Students in Dormitory -->
<div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
<div class="w-10 h-10 rounded-xl bg-orange-50 text-brand-500 flex items-center justify-center mb-2">
<i class="fa-solid fa-house-chimney text-base"></i>
</div>
<div>
<p class="text-[11px] font-medium text-slate-400">Students in Dormitory</p>
<h3 class="text-2xl font-bold text-slate-900 mt-0.5">{{ $kpis['dormitory_students'] }}</h3>
<p class="text-[10px] text-emerald-600 font-semibold mt-1">
<i class="fa-solid fa-arrow-up mr-0.5"></i>6% <span class="text-slate-400 font-normal">dari bulan lalu</span>
</p>
</div>
</div>
<!-- KPI 6: Graduation Ready -->
<div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
<div class="w-10 h-10 rounded-xl bg-orange-50 text-brand-500 flex items-center justify-center mb-2">
<i class="fa-solid fa-award text-base"></i>
</div>
<div>
<p class="text-[11px] font-medium text-slate-400">Graduation Ready</p>
<h3 class="text-2xl font-bold text-slate-900 mt-0.5">{{ $kpis['graduation_ready'] }}</h3>
<p class="text-[10px] text-emerald-600 font-semibold mt-1">
<i class="fa-solid fa-arrow-up mr-0.5"></i>25% <span class="text-slate-400 font-normal">dari bulan lalu</span>
</p>
</div>
</div>
</div>
<!-- END: KPICardsGrid -->
<!-- BEGIN: FiltersBar -->
<form action="{{ route('erp.students') }}" method="GET" class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex flex-wrap items-center justify-between gap-4">
<div class="flex flex-wrap items-center gap-3">
<span class="text-xs font-bold text-slate-700 mr-1">Filter:</span>
<!-- Dropdown 1: Cabang -->
<div class="relative">
<select name="branch_id" onchange="this.form.submit()" class="pl-8 pr-7 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-700 focus:ring-brand-500 focus:border-brand-500 appearance-none">
<option value="">Semua Cabang</option>
@foreach($branches as $b)
<option value="{{ $b->id }}" @selected(($filters['branch_id'] ?? '') == $b->id)>{{ $b->name }}</option>
@endforeach
</select>
<i class="fa-solid fa-location-dot absolute left-3 top-3 text-[11px] text-slate-400 pointer-events-none"></i>
<i class="fa-solid fa-chevron-down absolute right-2.5 top-3 text-[10px] text-slate-400 pointer-events-none"></i>
</div>
<!-- Dropdown 2: Batch -->
<div class="relative">
<select name="batch_id" onchange="this.form.submit()" class="pl-8 pr-7 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-700 focus:ring-brand-500 focus:border-brand-500 appearance-none">
<option value="">Semua Batch</option>
@foreach($batches as $bt)
<option value="{{ $bt->id }}" @selected(($filters['batch_id'] ?? '') == $bt->id)>{{ $bt->name }}</option>
@endforeach
</select>
<i class="fa-regular fa-calendar absolute left-3 top-3 text-[11px] text-slate-400 pointer-events-none"></i>
<i class="fa-solid fa-chevron-down absolute right-2.5 top-3 text-[10px] text-slate-400 pointer-events-none"></i>
</div>
<!-- Dropdown 3: Program -->
<div class="relative">
<select name="program_id" onchange="this.form.submit()" class="pl-8 pr-7 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-medium text-slate-700 focus:ring-brand-500 focus:border-brand-500 appearance-none">
<option value="">Semua Program</option>
@foreach($programs as $pr)
<option value="{{ $pr->id }}" @selected(($filters['program_id'] ?? '') == $pr->id)>{{ $pr->name }}</option>
@endforeach
</select>
<i class="fa-solid fa-graduation-cap absolute left-3 top-3 text-[11px] text-slate-400 pointer-events-none"></i>
<i class="fa-solid fa-chevron-down absolute right-2.5 top-3 text-[10px] text-slate-400 pointer-events-none"></i>
</div>
<a href="{{ route('erp.students') }}" class="text-xs font-semibold text-brand-600 hover:text-brand-700 ml-2">Reset Filter</a>
</div>
<!-- Search Input Filter -->
<div class="relative w-72">
<i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-xs text-slate-400"></i>
<input name="q" value="{{ $filters['q'] ?? '' }}" class="w-full pl-9 pr-3 py-1.5 text-xs bg-slate-50 border border-slate-200 rounded-xl placeholder-slate-400 focus:ring-brand-500 focus:border-brand-500" placeholder="Cari nama siswa, ID, atau program..." type="text"/>
</div>
</form>
<!-- END: FiltersBar -->
<!-- BEGIN: MidSectionGrid -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
<!-- Column 1: Weekly Class Schedule (5 Cols) -->
<div class="lg:col-span-5 bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-4">
<h3 class="font-bold text-slate-800 text-sm">Jadwal Kelas Minggu Ini ({{ count($schedules) }} Sesi)</h3>
<span class="text-xs font-semibold text-brand-600">Live PostgreSQL</span>
</div>
<div class="space-y-2.5">
@foreach($schedules as $sch)
<div class="flex items-center justify-between p-3 rounded-xl border border-slate-100 bg-slate-50/60 hover:bg-orange-50/40 transition">
  <div class="flex items-center gap-3">
    <div class="px-2.5 py-1.5 rounded-lg bg-orange-100 text-brand-700 text-center min-w-[56px]">
      <div class="text-xs font-extrabold">{{ substr($sch->start_time, 0, 5) }}</div>
      <div class="text-[9px] font-semibold uppercase">{{ date('d M', strtotime($sch->schedule_date)) }}</div>
    </div>
    <div>
      <div class="text-xs font-bold text-slate-800">{{ $sch->subject_name }}</div>
      <div class="text-[10px] text-slate-500">{{ $sch->class_name }} • {{ $sch->room_name }}</div>
    </div>
  </div>
  <span class="px-2 py-0.5 rounded-md text-[10px] font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200">{{ $sch->delivery_mode }}</span>
</div>
@endforeach
</div>
</div>
</div>
<!-- Column 2: Program Stats & Donut Chart (4 Cols) -->
<div class="lg:col-span-4 space-y-6 flex flex-col justify-between">
<!-- Bar Chart Card: Training Progress per Program -->
<div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex-1">
<div class="flex items-center justify-between mb-4">
<h3 class="font-bold text-slate-800 text-xs">Training Progress per Program</h3>
<div class="flex items-center space-x-1 text-[11px] text-slate-500 font-medium">
<span>Tahun Ini</span>
<i class="fa-solid fa-chevron-down text-[9px] text-slate-400"></i>
</div>
</div>
<!-- CSS Bar Chart -->
@php
  $progBarColors = ['bg-brand-500', 'bg-orange-400', 'bg-amber-400', 'bg-amber-600', 'bg-amber-300'];
@endphp
<div class="h-32 flex items-end justify-between gap-3 pt-4 px-2 border-b border-slate-100">
@foreach($programStats as $idx => $ps)
<div class="flex-1 flex flex-col items-center gap-1.5 h-full justify-end">
<span class="text-[10px] font-bold text-slate-700">{{ $ps->avg_progress }}%</span>
<div class="w-full {{ $progBarColors[$idx % count($progBarColors)] }} rounded-t-md" style="height: {{ max(20, $ps->avg_progress) }}%;"></div>
<span class="text-[9px] font-medium text-slate-500 truncate w-full text-center">{{ explode(' ', $ps->name)[0] }}</span>
</div>
@endforeach
</div>
</div>
<!-- Donut Chart Card: Distribusi Siswa per Program -->
<div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex-1">
<h3 class="font-bold text-slate-800 text-xs mb-3">Distribusi Siswa per Program</h3>
<div class="flex items-center justify-between gap-4">
<div class="relative w-28 h-28 flex-shrink-0">
<div class="w-full h-full rounded-full donut-chart flex items-center justify-center shadow-inner">
<div class="w-16 h-16 bg-white rounded-full flex flex-col items-center justify-center text-center shadow">
<span class="text-[9px] text-slate-400 font-medium">Total</span>
<span class="text-xs font-extrabold text-slate-800">{{ $kpis['new_enrollment'] }}</span>
<span class="text-[8px] text-slate-400">Siswa</span>
</div>
</div>
</div>
<div class="flex-1 space-y-1.5 text-[11px]">
@php
  $dotColors = ['bg-brand-500', 'bg-orange-400', 'bg-amber-400', 'bg-amber-700', 'bg-amber-500'];
  $totStd = max(1, $programStats->sum('student_count'));
@endphp
@foreach($programStats as $idx => $ps)
<div class="flex items-center justify-between">
<div class="flex items-center space-x-2">
<span class="w-2.5 h-2.5 rounded-full {{ $dotColors[$idx % count($dotColors)] }}"></span>
<span class="text-slate-600 truncate max-w-[95px]">{{ explode(' ', $ps->name)[0] }}</span>
</div>
<span class="font-bold text-slate-800">{{ round(($ps->student_count / $totStd) * 100) }}% <span class="text-[10px] font-normal text-slate-400">({{ $ps->student_count }})</span></span>
</div>
@endforeach
</div>
</div>
</div>
</div>
<!-- Column 3: Recent Activity & Notifications (3 Cols) -->
<div class="lg:col-span-3 bg-white p-5 rounded-2xl border border-slate-200 shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-4">
<h3 class="font-bold text-slate-800 text-xs">Aktivitas &amp; Notifikasi Terbaru</h3>
<a class="text-xs font-semibold text-brand-600 hover:text-brand-700 flex items-center space-x-1" href="{{ route('erp.assessments') }}">
<span>Lihat Semua</span>
<i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
<div class="space-y-4">
@foreach($students->take(5) as $st)
<div class="flex items-start space-x-3">
<div class="w-8 h-8 rounded-full bg-orange-100 text-brand-600 flex items-center justify-center flex-shrink-0 text-xs mt-0.5">
<i class="fa-solid fa-user-check"></i>
</div>
<div class="flex-1 min-w-0">
<div class="flex items-center justify-between">
<h5 class="text-xs font-bold text-slate-800 truncate">{{ $st->full_name }}</h5>
<span class="text-[10px] text-slate-400">{{ $st->student_no }}</span>
</div>
<p class="text-[11px] text-slate-500 leading-tight mt-0.5">{{ $st->program_name }} • Progress {{ round($st->progress_score) }}%</p>
</div>
</div>
@endforeach
</div>
</div>
</div>
</div>
<!-- END: MidSectionGrid -->
<!-- BEGIN: StudentTableSection -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
<!-- Table Action Header -->
<div class="p-5 flex items-center justify-between border-b border-slate-100">
<div>
<h3 class="font-bold text-slate-800 text-base">Daftar Siswa ({{ count($students) }} Data)</h3>
</div>
<div class="flex items-center space-x-3">
<a href="{{ route('erp.reports.export', ['type' => 'students']) }}" class="px-4 py-2 bg-slate-50 hover:bg-slate-100 text-slate-700 text-xs font-semibold rounded-xl border border-slate-200 transition-colors flex items-center space-x-2">
<i class="fa-solid fa-arrow-down text-slate-500"></i>
<span>Export CSV</span>
</a>
<button onclick="document.getElementById('modalAddStudent').classList.remove('hidden')" class="px-4 py-2 bg-brand-500 hover:bg-brand-600 text-white text-xs font-semibold rounded-xl shadow-sm transition-colors flex items-center space-x-2">
<i class="fa-solid fa-plus text-xs"></i>
<span>Tambah Siswa</span>
</button>
</div>
</div>
<!-- Table Responsive Container -->
<div class="overflow-x-auto">
<table class="w-full text-left text-xs">
<thead class="bg-slate-50/80 text-slate-400 text-[11px] uppercase tracking-wider font-semibold border-b border-slate-100">
<tr>
<th class="py-3 px-4 w-10 text-center">
<input class="rounded border-slate-300 text-brand-600 focus:ring-brand-500" type="checkbox"/>
</th>
<th class="py-3 px-4 font-semibold">Student ID</th>
<th class="py-3 px-4 font-semibold">Nama</th>
<th class="py-3 px-4 font-semibold">Program</th>
<th class="py-3 px-4 font-semibold">Batch</th>
<th class="py-3 px-4 font-semibold">Attendance</th>
<th class="py-3 px-4 font-semibold w-48">Training Progress</th>
<th class="py-3 px-4 font-semibold text-center">Status</th>
<th class="py-3 px-4 font-semibold text-center">Cabang</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 font-medium text-slate-700">
@foreach($students as $st)
@php
  $att = (int) round($st->attendance_score);
  $prog = (int) round($st->progress_score);
@endphp
<tr class="hover:bg-slate-50/70 transition-colors">
<td class="py-3.5 px-4 text-center">
<input class="rounded border-slate-300 text-brand-600 focus:ring-brand-500" type="checkbox"/>
</td>
<td class="py-3.5 px-4 font-mono font-medium text-slate-600">{{ $st->student_no }}</td>
<td class="py-3.5 px-4">
<div class="flex items-center space-x-2.5">
<div class="w-8 h-8 rounded-full bg-orange-100 text-brand-700 font-bold flex items-center justify-center text-xs ring-1 ring-orange-200">
  {{ strtoupper(substr($st->full_name, 0, 2)) }}
</div>
<span class="font-semibold text-slate-900">{{ $st->full_name }}</span>
</div>
</td>
<td class="py-3.5 px-4 text-slate-600">{{ $st->program_name }}</td>
<td class="py-3.5 px-4 text-slate-600">{{ $st->batch_name ?? 'Batch 2026' }}</td>
<td class="py-3.5 px-4">
<span class="font-bold {{ $att >= 85 ? 'text-emerald-600' : 'text-amber-600' }}">{{ $att }}%</span>
</td>
<td class="py-3.5 px-4">
<div class="flex items-center space-x-3">
<div class="w-full bg-slate-100 rounded-full h-2 overflow-hidden">
<div class="bg-brand-500 h-2 rounded-full" style="width: {{ $prog }}%"></div>
</div>
<span class="text-[11px] font-semibold text-slate-500 w-8 text-right">{{ $prog }}%</span>
</div>
</td>
<td class="py-3.5 px-4 text-center">
@if($st->student_status === 'GRADUATED')
<span class="inline-block px-3 py-1 text-[11px] font-semibold text-blue-700 bg-blue-50 rounded-full border border-blue-200">
  Graduated
</span>
@elseif($att < 80)
<span class="inline-block px-3 py-1 text-[11px] font-semibold text-amber-700 bg-amber-50 rounded-full border border-amber-200">
  Perlu Perhatian
</span>
@else
<span class="inline-block px-3 py-1 text-[11px] font-semibold text-emerald-700 bg-emerald-50 rounded-full border border-emerald-200">
  Aktif
</span>
@endif
</td>
<td class="py-3.5 px-4 text-center text-slate-500">
  {{ $st->branch_name }}
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
<!-- END: StudentTableSection -->
</main>
</div>

<!-- Modal Tambah Siswa -->
<div id="modalAddStudent" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-md overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
      <h3 class="text-sm font-extrabold text-slate-900">Tambah Siswa Baru</h3>
      <button onclick="document.getElementById('modalAddStudent').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">✕</button>
    </div>
    <form action="{{ route('erp.students.store') }}" method="POST" class="p-6 space-y-4 text-xs">
      @csrf
      <div>
        <label class="block font-semibold text-slate-700 mb-1">Nama Lengkap Siswa</label>
        <input type="text" name="full_name" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3" placeholder="Contoh: Bagas Adi Saputra"/>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Email</label>
          <input type="email" name="email" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3" placeholder="siswa@email.com"/>
        </div>
        <div>
          <label class="block font-semibold text-slate-700 mb-1">No. Telepon</label>
          <input type="text" name="phone" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3" placeholder="0813..."/>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Gender</label>
          <select name="gender" class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
            <option value="MALE">Laki-laki</option>
            <option value="FEMALE">Perempuan</option>
          </select>
        </div>
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Cabang</label>
          <select name="branch_id" class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
            @foreach($branches as $b)
              <option value="{{ $b->id }}">{{ $b->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Program</label>
          <select name="program_id" class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
            @foreach($programs as $pr)
              <option value="{{ $pr->id }}">{{ $pr->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Batch</label>
          <select name="batch_id" class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
            @foreach($batches as $bt)
              <option value="{{ $bt->id }}">{{ $bt->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="pt-2 flex justify-end gap-2">
        <button type="button" onclick="document.getElementById('modalAddStudent').classList.add('hidden')" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 font-semibold">Batal</button>
        <button type="submit" class="px-4 py-2 rounded-xl bg-brand-500 hover:bg-brand-600 text-white font-semibold shadow-sm">Simpan Siswa</button>
      </div>
    </form>
  </div>
</div>
</body></html>
