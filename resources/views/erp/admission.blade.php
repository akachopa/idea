<!DOCTYPE html>
<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Admission Management - IDEA ERP</title>
<!-- Tailwind CSS v3 with Plugins -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Font Awesome Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
<!-- Google Fonts: Plus Jakarta Sans -->
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
              700: '#c2410c',
            }
          }
        }
      }
    }
  </script>
<style data-purpose="custom-scrollbars-and-base">
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background-color: #f8fafc;
      color: #1e293b;
    }
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
  </style>
</head>
<body class="bg-[#f4f6fa] text-slate-800 antialiased min-h-screen flex">
<!-- BEGIN: Sidebar -->
<aside class="w-64 bg-white border-r border-slate-200 flex flex-col justify-between shrink-0 min-h-screen z-20">
<div class="p-5">
<!-- Logo Brand -->
<div class="flex items-center justify-between mb-8">
<a href="{{ route('erp.dashboard') }}" class="flex items-center gap-2.5">
<div class="w-9 h-9 rounded-full border-2 border-orange-500 flex items-center justify-center text-orange-500 font-extrabold text-base">
<span class="inline-block w-4 h-4 rounded-full border-[3px] border-orange-500"></span>
</div>
<div>
<h1 class="text-base font-extrabold tracking-tight text-slate-900 leading-tight">IDEA ERP</h1>
<p class="text-[10px] text-slate-400 font-medium leading-none">Education for a Brighter Tomorrow</p>
</div>
</a>
<button class="text-slate-400 hover:text-slate-600 p-1">
<i class="fa-solid fa-chevron-left text-xs"></i>
</button>
</div>
<!-- Navigation Links -->
<nav class="space-y-1.5 font-medium text-xs">
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.dashboard') }}">
<i class="fa-solid fa-table-cells-large text-sm text-slate-400"></i>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold shadow-sm shadow-orange-500/30" href="{{ route('erp.admission') }}">
<i class="fa-solid fa-user-plus text-sm"></i>
<span>Admission</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.finance') }}">
<i class="fa-solid fa-wallet text-sm text-slate-400"></i>
<span>Finance</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.students') }}">
<i class="fa-solid fa-user-group text-sm text-slate-400"></i>
<span>Student Management</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.assessments') }}">
<i class="fa-regular fa-file-lines text-sm text-slate-400"></i>
<span>Assessment &amp; Certification</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.placements') }}">
<i class="fa-solid fa-briefcase text-sm text-slate-400"></i>
<span>Career &amp; Placement</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.partners') }}">
<i class="fa-solid fa-handshake text-sm text-slate-400"></i>
<span>Partners</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.alumni') }}">
<i class="fa-solid fa-graduation-cap text-sm text-slate-400"></i>
<span>Alumni</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 hover:bg-slate-50 transition-colors" href="{{ route('erp.reports') }}">
<i class="fa-solid fa-chart-simple text-sm text-slate-400"></i>
<span>Reports</span>
</a>
</nav>
</div>
<!-- Sidebar Bottom Promo Card -->
<div class="p-4 m-3 rounded-2xl bg-gradient-to-b from-orange-50/70 to-orange-100/60 border border-orange-200/60 relative overflow-hidden">
<div class="relative z-10">
<div class="h-28 flex items-center justify-center mb-2">
<img alt="Promo illustration" class="h-full object-contain rounded-lg mix-blend-multiply opacity-90" src="https://lh3.googleusercontent.com/aida-public/AB6AXuANY7ltMekNQFsvczc4fPfkmCR9fn16AVJPewHSbaUWo-Ep4g1HGGN1VyS24cwTPWPOS7PX465z-RTQVcrsxlHB469oahSNVtQt9BumtW6pbZ7SZU7p70UEDdAx1sEQvwXtbnRE23wGWCAorGTqg4tMp3F4MKEtbM9jttfG40ND2rb8gyTy3aazVVffhtZANcLiKNVDLpx4uKjN-AjATwkbZAJoPvqjQJRZCUnFoN4"/>
</div>
<h4 class="font-bold text-xs text-orange-950 leading-tight">Membangun<br/>Talenta Global<br/>dari Indonesia</h4>
<p class="text-[10px] text-slate-600 mt-1 mb-3 leading-relaxed">Pendidikan, peluang dan masa depan yang lebih baik.</p>
<a href="{{ route('erp.reports') }}" class="w-full py-2 px-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-semibold text-xs rounded-xl shadow-sm hover:from-orange-600 hover:to-orange-700 transition flex items-center justify-center gap-1.5">
<span>Bersama IDEA ERP</span>
<i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
</div>
</aside>
<!-- END: Sidebar -->
<!-- Main Content Wrapper -->
<div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
<!-- BEGIN: Topbar -->
<header class="h-16 bg-white border-b border-slate-200 px-6 flex items-center justify-between shrink-0 sticky top-0 z-10">
<!-- Search Input -->
<form action="{{ route('erp.admission') }}" method="GET" class="relative w-96">
<i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
<input name="q" value="{{ $filters['q'] ?? '' }}" class="w-full pl-9 pr-4 py-2 text-xs rounded-xl border border-slate-200 focus:outline-none focus:border-orange-500 focus:ring-1 focus:ring-orange-500 placeholder-slate-400 bg-slate-50/50" placeholder="Cari nama pendaftar, no registrasi, atau program..." type="text"/>
</form>
<!-- Topbar Actions & User Profile -->
<div class="flex items-center gap-4">
<button onclick="document.getElementById('modalAddApplicant').classList.remove('hidden')" class="px-3.5 py-2 bg-orange-600 hover:bg-orange-700 text-white text-xs font-bold rounded-xl shadow-sm flex items-center gap-1.5 transition">
  <i class="fa-solid fa-plus text-[10px]"></i>
  <span>Tambah Applicant</span>
</button>
<div class="h-6 w-px bg-slate-200"></div>
<!-- User Profile Pill -->
<div class="flex items-center gap-2.5 cursor-pointer">
<img alt="Sari Anggraini Profile" class="w-8 h-8 rounded-full object-cover border border-slate-200" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAs4gbciAEdS2O7xsGiKnMUnC_t9U5TJuYy246ngKW_nIK_ZVM2BG0m-hAiSfPzDLMdwSoOSDbob5F3_Mqo65uaLB-I5Z9q4DrhAOJ8iWJuFDLsOxX5L4ugCdyM7bQiZocBFeqshUD6YxlsM1hzO6khzzBj6-PUMnENJqDCO4RkSS-TOHWdGQTsx5qAvxEdxrXqb9jcFl16ICyrSBfDFuEIqYle0ffaacEBwA7gZ8I"/>
<div class="text-left">
<h4 class="text-xs font-bold text-slate-800 leading-tight">{{ $currentUser->full_name ?? 'Sari Anggraini' }}</h4>
<p class="text-[10px] text-slate-400 font-medium">{{ $currentUser->position_name ?? 'Head of Administration' }}</p>
</div>
<i class="fa-solid fa-chevron-down text-[10px] text-slate-400 ml-1"></i>
</div>
</div>
</header>
<!-- END: Topbar -->
<!-- Page Body -->
<main class="p-6 space-y-6">
@if(session('success'))
<div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-xs font-semibold flex items-center justify-between shadow-sm">
  <span>{{ session('success') }}</span>
  <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900">✕</button>
</div>
@endif
<!-- BEGIN: Hero Banner -->
<section class="bg-gradient-to-r from-white via-orange-50/30 to-amber-100/50 border border-slate-200/80 rounded-2xl p-5 flex flex-col md:flex-row md:items-center justify-between gap-4 shadow-sm relative overflow-hidden">
<div>
<h2 class="text-xl font-extrabold text-slate-900 tracking-tight">Admission Management</h2>
<p class="text-xs text-slate-500 mt-1">Kelola proses penerimaan siswa dari pendaftaran hingga enrolment.</p>
</div>
<div class="flex items-center gap-6 z-10">
<div class="text-right">
<div class="text-xs font-bold text-slate-800">Senin, 21 Apr 2025</div>
<div class="text-[11px] text-slate-500">Semangat untuk hari yang produktif!</div>
</div>
<div class="hidden lg:flex items-center gap-3 border-l border-orange-200/80 pl-6">
<div class="text-right">
<span class="block text-xs font-bold text-slate-800 uppercase tracking-wider">People</span>
<span class="block text-xs font-bold text-slate-800 uppercase tracking-wider">Education</span>
<span class="block text-xs font-bold text-orange-600 uppercase tracking-wider">Opportunities</span>
<span class="block text-[9px] text-slate-500 tracking-tight">A Brighter Tomorrow</span>
</div>
</div>
</div>
</section>
<!-- END: Hero Banner -->
@php
  $totalApp = max(1, (int) ($pipelineSummary->total_applicants ?? 0));
  $verifiedApp = (int) ($pipelineSummary->verified_or_beyond ?? 0);
  $interviewApp = (int) ($pipelineSummary->interview_or_beyond ?? 0);
  $acceptedApp = (int) ($pipelineSummary->accepted_or_beyond ?? 0);
  $regApp = (int) (($statusCounts['REGISTRATION'] ?? 0) + ($statusCounts['ENROLLED'] ?? 0));
  $enrolledApp = (int) ($pipelineSummary->enrolled ?? 0);
@endphp
<!-- BEGIN: KPI Stat Cards -->
<section class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4">
<!-- Card 1: Total Applicants -->
<div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex items-start gap-3">
<div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center shrink-0">
<i class="fa-solid fa-users text-sm"></i>
</div>
<div>
<span class="text-[11px] font-semibold text-slate-500 block">Total Applicants</span>
<span class="text-lg font-extrabold text-slate-900 block mt-0.5">{{ number_format($pipelineSummary->total_applicants ?? 0, 0, ',', '.') }}</span>
<div class="flex items-center gap-1 mt-1 text-[10px] text-emerald-600 font-bold">
<i class="fa-solid fa-arrow-up text-[9px]"></i>
<span>12%</span>
<span class="text-slate-400 font-normal ml-0.5">dari periode lalu</span>
</div>
</div>
</div>
<!-- Card 2: Verified -->
<div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex items-start gap-3">
<div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center shrink-0">
<i class="fa-regular fa-file-check text-sm fa-file"></i>
</div>
<div>
<span class="text-[11px] font-semibold text-slate-500 block">Verified</span>
<span class="text-lg font-extrabold text-slate-900 block mt-0.5">{{ number_format($verifiedApp, 0, ',', '.') }}</span>
<div class="flex items-center gap-1 mt-1 text-[10px] text-emerald-600 font-bold">
<i class="fa-solid fa-arrow-up text-[9px]"></i>
<span>18%</span>
<span class="text-slate-400 font-normal ml-0.5">dari periode lalu</span>
</div>
</div>
</div>
<!-- Card 3: Interview Scheduled -->
<div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex items-start gap-3">
<div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center shrink-0">
<i class="fa-regular fa-calendar-check text-sm"></i>
</div>
<div>
<span class="text-[11px] font-semibold text-slate-500 block">Interview Scheduled</span>
<span class="text-lg font-extrabold text-slate-900 block mt-0.5">{{ number_format($interviewApp, 0, ',', '.') }}</span>
<div class="flex items-center gap-1 mt-1 text-[10px] text-emerald-600 font-bold">
<i class="fa-solid fa-arrow-up text-[9px]"></i>
<span>14%</span>
<span class="text-slate-400 font-normal ml-0.5">dari periode lalu</span>
</div>
</div>
</div>
<!-- Card 4: Accepted -->
<div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex items-start gap-3">
<div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center shrink-0">
<i class="fa-solid fa-user-check text-sm"></i>
</div>
<div>
<span class="text-[11px] font-semibold text-slate-500 block">Accepted</span>
<span class="text-lg font-extrabold text-slate-900 block mt-0.5">{{ number_format($acceptedApp, 0, ',', '.') }}</span>
<div class="flex items-center gap-1 mt-1 text-[10px] text-emerald-600 font-bold">
<i class="fa-solid fa-arrow-up text-[9px]"></i>
<span>20%</span>
<span class="text-slate-400 font-normal ml-0.5">dari periode lalu</span>
</div>
</div>
</div>
<!-- Card 5: Enrolled -->
<div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm flex items-start gap-3">
<div class="w-10 h-10 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center shrink-0">
<i class="fa-solid fa-graduation-cap text-sm"></i>
</div>
<div>
<span class="text-[11px] font-semibold text-slate-500 block">Enrolled</span>
<span class="text-lg font-extrabold text-slate-900 block mt-0.5">{{ number_format($enrolledApp, 0, ',', '.') }}</span>
<div class="flex items-center gap-1 mt-1 text-[10px] text-emerald-600 font-bold">
<i class="fa-solid fa-arrow-up text-[9px]"></i>
<span>25%</span>
<span class="text-slate-400 font-normal ml-0.5">dari periode lalu</span>
</div>
</div>
</div>
</section>
<!-- END: KPI Stat Cards -->
<!-- Main Columns Grid Layout -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
<!-- LEFT COLUMN: Stepper + Filter + Data Table -->
<div class="lg:col-span-8 space-y-6">
<!-- BEGIN: Process Pipeline Stepper -->
<div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
<h3 class="text-xs font-bold text-slate-800 mb-4">Proses Admission</h3>
<div class="flex items-center justify-between overflow-x-auto py-2">
<!-- Step 1 -->
<div class="flex flex-col items-center min-w-[70px] text-center">
<div class="w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-sm font-semibold mb-2">
<i class="fa-regular fa-file-lines"></i>
</div>
<span class="text-[11px] font-semibold text-slate-700">Submitted</span>
<span class="text-xs font-bold text-slate-900 mt-0.5">{{ $pipelineSummary->total_applicants ?? 0 }}</span>
<span class="text-[10px] text-slate-400 font-medium">(100%)</span>
</div>
<div class="text-orange-300 font-light text-xs px-2"><i class="fa-solid fa-arrow-right"></i></div>
<!-- Step 2 -->
<div class="flex flex-col items-center min-w-[70px] text-center">
<div class="w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-sm font-semibold mb-2">
<i class="fa-regular fa-circle-check"></i>
</div>
<span class="text-[11px] font-semibold text-slate-700">Verification</span>
<span class="text-xs font-bold text-slate-900 mt-0.5">{{ $verifiedApp }}</span>
<span class="text-[10px] text-slate-400 font-medium">({{ round(($verifiedApp / $totalApp) * 100) }}%)</span>
</div>
<div class="text-orange-300 font-light text-xs px-2"><i class="fa-solid fa-arrow-right"></i></div>
<!-- Step 3 -->
<div class="flex flex-col items-center min-w-[70px] text-center">
<div class="w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-sm font-semibold mb-2">
<i class="fa-regular fa-calendar"></i>
</div>
<span class="text-[11px] font-semibold text-slate-700">Interview</span>
<span class="text-xs font-bold text-slate-900 mt-0.5">{{ $interviewApp }}</span>
<span class="text-[10px] text-slate-400 font-medium">({{ round(($interviewApp / $totalApp) * 100) }}%)</span>
</div>
<div class="text-orange-300 font-light text-xs px-2"><i class="fa-solid fa-arrow-right"></i></div>
<!-- Step 4 -->
<div class="flex flex-col items-center min-w-[70px] text-center">
<div class="w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-sm font-semibold mb-2">
<i class="fa-regular fa-user"></i>
</div>
<span class="text-[11px] font-semibold text-slate-700">Accepted</span>
<span class="text-xs font-bold text-slate-900 mt-0.5">{{ $acceptedApp }}</span>
<span class="text-[10px] text-slate-400 font-medium">({{ round(($acceptedApp / $totalApp) * 100) }}%)</span>
</div>
<div class="text-orange-300 font-light text-xs px-2"><i class="fa-solid fa-arrow-right"></i></div>
<!-- Step 5 -->
<div class="flex flex-col items-center min-w-[70px] text-center">
<div class="w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-sm font-semibold mb-2">
<i class="fa-regular fa-id-card"></i>
</div>
<span class="text-[11px] font-semibold text-slate-700">Registration</span>
<span class="text-xs font-bold text-slate-900 mt-0.5">{{ $regApp }}</span>
<span class="text-[10px] text-slate-400 font-medium">({{ round(($regApp / $totalApp) * 100) }}%)</span>
</div>
<div class="text-orange-300 font-light text-xs px-2"><i class="fa-solid fa-arrow-right"></i></div>
<!-- Step 6 -->
<div class="flex flex-col items-center min-w-[70px] text-center">
<div class="w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-sm font-semibold mb-2">
<i class="fa-solid fa-graduation-cap"></i>
</div>
<span class="text-[11px] font-semibold text-slate-700">Enrolled</span>
<span class="text-xs font-bold text-slate-900 mt-0.5">{{ $enrolledApp }}</span>
<span class="text-[10px] text-slate-400 font-medium">({{ round(($enrolledApp / $totalApp) * 100) }}%)</span>
</div>
</div>
</div>
<!-- END: Process Pipeline Stepper -->
<!-- BEGIN: Filter Pencarian -->
<div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
<h3 class="text-xs font-bold text-slate-800 mb-3.5">Filter Pencarian</h3>
<form action="{{ route('erp.admission') }}" method="GET" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-3 items-end">
<div>
<label class="block text-[11px] font-semibold text-slate-500 mb-1.5">Intake Period</label>
<select name="intake_id" class="w-full text-xs py-2 px-3 bg-white border border-slate-200 rounded-xl focus:ring-1 focus:ring-orange-500 focus:border-orange-500 text-slate-700">
<option value="">Semua Intake</option>
@foreach($intakes as $intake)
<option value="{{ $intake->id }}" @selected(($filters['intake_id'] ?? '') == $intake->id)>{{ $intake->name }}</option>
@endforeach
</select>
</div>
<div>
<label class="block text-[11px] font-semibold text-slate-500 mb-1.5">Branch</label>
<select name="branch_id" class="w-full text-xs py-2 px-3 bg-white border border-slate-200 rounded-xl focus:ring-1 focus:ring-orange-500 focus:border-orange-500 text-slate-700">
<option value="">Semua Branch</option>
@foreach($branches as $b)
<option value="{{ $b->id }}" @selected(($filters['branch_id'] ?? '') == $b->id)>{{ $b->name }}</option>
@endforeach
</select>
</div>
<div>
<label class="block text-[11px] font-semibold text-slate-500 mb-1.5">Program</label>
<select name="program_id" class="w-full text-xs py-2 px-3 bg-white border border-slate-200 rounded-xl focus:ring-1 focus:ring-orange-500 focus:border-orange-500 text-slate-700">
<option value="">Semua Program</option>
@foreach($programs as $pr)
<option value="{{ $pr->id }}" @selected(($filters['program_id'] ?? '') == $pr->id)>{{ $pr->name }}</option>
@endforeach
</select>
</div>
<div>
<label class="block text-[11px] font-semibold text-slate-500 mb-1.5">Status</label>
<select name="status" class="w-full text-xs py-2 px-3 bg-white border border-slate-200 rounded-xl focus:ring-1 focus:ring-orange-500 focus:border-orange-500 text-slate-700">
<option value="">Semua Status</option>
@foreach(['SUBMITTED' => 'Submitted', 'VERIFICATION' => 'Verification', 'INTERVIEW' => 'Interview', 'ACCEPTED' => 'Accepted', 'REGISTRATION' => 'Registration', 'ENROLLED' => 'Enrolled'] as $k => $v)
<option value="{{ $k }}" @selected(($filters['status'] ?? '') == $k)>{{ $v }}</option>
@endforeach
</select>
</div>
<div>
<button class="w-full py-2 px-3 bg-orange-500 hover:bg-orange-600 text-white font-semibold text-xs rounded-xl shadow-sm transition flex items-center justify-center gap-1.5 h-[38px]" type="submit">
<i class="fa-solid fa-magnifying-glass text-[11px]"></i>
<span>Terapkan Filter</span>
</button>
</div>
</form>
</div>
<!-- END: Filter Pencarian -->
<!-- BEGIN: Applicants Data Table -->
<div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
<div class="p-4 border-b border-slate-100 flex items-center justify-between">
<h3 class="text-xs font-bold text-slate-800">Daftar Applicant</h3>
<span class="text-[11px] text-slate-400 font-medium">Menampilkan {{ count($applicants) }} data dari PostgreSQL</span>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left text-xs whitespace-nowrap">
<thead class="bg-slate-50/80 text-slate-500 text-[11px] border-b border-slate-200 font-semibold">
<tr>
<th class="p-3 pl-4 w-4">
<input class="rounded border-slate-300 text-orange-500 focus:ring-orange-500 w-3.5 h-3.5" type="checkbox"/>
</th>
<th class="p-3 font-semibold">Registration No</th>
<th class="p-3 font-semibold">Applicant Name</th>
<th class="p-3 font-semibold">Program</th>
<th class="p-3 font-semibold">Branch</th>
<th class="p-3 font-semibold">Interview Date</th>
<th class="p-3 font-semibold text-center">Document Status</th>
<th class="p-3 font-semibold text-center">Payment Status</th>
<th class="p-3 font-semibold text-center">Final Status</th>
<th class="p-3 pr-4 font-semibold text-center">Ubah Status</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 text-slate-700">
@foreach($applicants as $app)
@php
  $docComplete = in_array($app->admission_status, ['INTERVIEW', 'ACCEPTED', 'REGISTRATION', 'ENROLLED']) || $app->doc_verification_status === 'VERIFIED';
  $payPaid = in_array($app->invoice_status, ['PAID', 'PARTIAL']) || in_array($app->admission_status, ['INTERVIEW', 'ACCEPTED', 'REGISTRATION', 'ENROLLED']);
  $statusBadgeMap = [
      'SUBMITTED' => ['bg-slate-100 text-slate-600 border-slate-200', 'Submitted'],
      'VERIFICATION' => ['bg-orange-50 text-orange-600 border-orange-200', 'Verification'],
      'INTERVIEW' => ['bg-sky-50 text-sky-600 border-sky-200', 'Interview'],
      'ACCEPTED' => ['bg-emerald-50 text-emerald-600 border-emerald-200', 'Accepted'],
      'REGISTRATION' => ['bg-purple-50 text-purple-600 border-purple-200', 'Registration'],
      'ENROLLED' => ['bg-teal-50 text-teal-600 border-teal-200', 'Enrolled'],
  ];
  [$badgeClass, $badgeLabel] = $statusBadgeMap[$app->admission_status] ?? ['bg-slate-100 text-slate-600 border-slate-200', $app->admission_status];
@endphp
<tr class="hover:bg-slate-50/60 transition-colors">
<td class="p-3 pl-4"><input class="rounded border-slate-300 text-orange-500 focus:ring-orange-500 w-3.5 h-3.5" type="checkbox"/></td>
<td class="p-3 font-medium text-slate-500">{{ $app->registration_no }}</td>
<td class="p-3 font-semibold text-slate-800">
<div class="flex items-center gap-2">
<div class="w-6 h-6 rounded-full bg-orange-100 text-orange-700 font-bold text-[10px] flex items-center justify-center shrink-0">
  {{ strtoupper(substr($app->full_name, 0, 2)) }}
</div>
<span>{{ $app->full_name }}</span>
</div>
</td>
<td class="p-3 text-slate-600">{{ $app->program_name ?? 'Hospitality' }}</td>
<td class="p-3 text-slate-600">{{ $app->branch_city ?? $app->branch_name }}</td>
<td class="p-3 text-slate-500 font-normal">
  {{ $app->interview_date ? date('d M Y H:i', strtotime($app->interview_date)) : '-' }}
</td>
<td class="p-3 text-center">
@if($docComplete)
<span class="inline-flex px-2 py-0.5 text-[10px] font-semibold rounded-md bg-emerald-50 text-emerald-600 border border-emerald-200">Complete</span>
@else
<span class="inline-flex px-2 py-0.5 text-[10px] font-semibold rounded-md bg-red-50 text-red-500 border border-red-200">Incomplete</span>
@endif
</td>
<td class="p-3 text-center">
@if($payPaid)
<span class="inline-flex px-2 py-0.5 text-[10px] font-semibold rounded-md bg-emerald-50 text-emerald-600 border border-emerald-200">Paid</span>
@else
<span class="inline-flex px-2 py-0.5 text-[10px] font-semibold rounded-md bg-amber-50 text-amber-600 border border-amber-200">Unpaid</span>
@endif
</td>
<td class="p-3 text-center">
<span class="inline-flex px-2.5 py-0.5 text-[10px] font-semibold rounded-md border {{ $badgeClass }}">{{ $badgeLabel }}</span>
</td>
<td class="p-3 pr-4 text-center">
<form action="{{ route('erp.admission.status', $app->id) }}" method="POST" class="inline-flex items-center gap-1">
  @csrf
  <select name="admission_status" onchange="this.form.submit()" class="text-[10px] py-1 pl-2 pr-6 rounded-lg border-slate-200 bg-slate-50 text-slate-700 focus:ring-orange-500 focus:border-orange-500">
    @foreach(['SUBMITTED', 'VERIFICATION', 'INTERVIEW', 'ACCEPTED', 'REGISTRATION', 'ENROLLED'] as $st)
      <option value="{{ $st }}" @selected($app->admission_status === $st)>{{ ucfirst(strtolower($st)) }}</option>
    @endforeach
  </select>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
<!-- END: Applicants Data Table -->
</div>
<!-- RIGHT COLUMN: Upcoming Interviews & Aktivitas Terkini -->
<div class="lg:col-span-4 space-y-6">
<!-- BEGIN: Upcoming Interviews -->
<div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
<div class="flex items-center justify-between mb-4">
<h3 class="text-xs font-bold text-slate-800">Upcoming Interviews</h3>
<a class="text-orange-600 hover:text-orange-700 text-xs font-semibold flex items-center gap-1" href="{{ route('erp.admission', ['status' => 'INTERVIEW']) }}">
<span>Lihat Semua</span>
<i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
<!-- List of Upcoming Interviews -->
<div class="space-y-3.5">
@foreach($upcomingInterviews as $intv)
@php
  $dt = strtotime($intv->scheduled_at);
  $isOnline = strtoupper($intv->interview_mode ?? '') === 'ONLINE';
@endphp
<div class="flex items-center justify-between gap-3 p-2 hover:bg-slate-50 rounded-xl transition">
<div class="flex items-center gap-2.5">
<div class="text-center w-8 shrink-0">
<span class="block text-xs font-extrabold text-orange-600 leading-tight">{{ date('d', $dt) }}</span>
<span class="block text-[9px] font-semibold text-orange-500 uppercase">{{ date('M', $dt) }}</span>
</div>
<span class="text-xs text-slate-400 font-medium">{{ date('H:i', $dt) }}</span>
<div class="w-7 h-7 rounded-full bg-orange-100 text-orange-700 font-bold text-[10px] flex items-center justify-center ml-1">
  {{ strtoupper(substr($intv->full_name, 0, 2)) }}
</div>
<div class="leading-tight">
<div class="text-xs font-bold text-slate-800">{{ $intv->full_name }}</div>
<div class="text-[10px] text-slate-400">{{ $intv->program_name ?? 'Hospitality' }}</div>
</div>
</div>
<div class="flex items-center gap-2">
@if($isOnline)
<span class="px-2 py-0.5 text-[10px] font-semibold bg-emerald-50 text-emerald-600 rounded-md border border-emerald-200">Online</span>
@else
<span class="px-2 py-0.5 text-[10px] font-semibold bg-orange-50 text-orange-600 rounded-md border border-orange-200">Onsite</span>
@endif
</div>
</div>
@endforeach
</div>
</div>
<!-- END: Upcoming Interviews -->
<!-- BEGIN: Aktivitas Admission Terbaru -->
<div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm">
<div class="flex items-center justify-between mb-4">
<h3 class="text-xs font-bold text-slate-800">Aktivitas Admission Terbaru</h3>
<a class="text-orange-600 hover:text-orange-700 text-xs font-semibold flex items-center gap-1" href="{{ route('erp.reports') }}">
<span>Lihat Semua</span>
<i class="fa-solid fa-arrow-right text-[10px]"></i>
</a>
</div>
<!-- Activity Items List -->
<div class="space-y-4">
@foreach($applicants->take(4) as $act)
<div class="flex items-start gap-3">
<div class="w-8 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center shrink-0 mt-0.5">
<i class="fa-regular fa-user text-xs"></i>
</div>
<div class="flex-1 min-w-0">
<div class="flex items-center justify-between">
<h5 class="text-xs font-bold text-slate-800">Status: {{ ucfirst(strtolower($act->admission_status)) }}</h5>
<span class="text-[10px] text-slate-400">{{ $act->submitted_at ? date('H:i', strtotime($act->submitted_at)) : '10:24' }}</span>
</div>
<p class="text-[11px] text-slate-500 truncate">{{ $act->full_name }} ({{ $act->registration_no }})</p>
</div>
</div>
@endforeach
</div>
</div>
<!-- END: Aktivitas Admission Terbaru -->
</div>
</div>
</main>
</div>

<!-- Modal Tambah Applicant -->
<div id="modalAddApplicant" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-md overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
      <h3 class="text-sm font-extrabold text-slate-900">Tambah Applicant Baru</h3>
      <button onclick="document.getElementById('modalAddApplicant').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">✕</button>
    </div>
    <form action="{{ route('erp.admission.store') }}" method="POST" class="p-6 space-y-4 text-xs">
      @csrf
      <div>
        <label class="block font-semibold text-slate-700 mb-1">Nama Lengkap</label>
        <input type="text" name="full_name" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3 focus:ring-orange-500 focus:border-orange-500" placeholder="Contoh: Nabila Syakieb"/>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Email</label>
          <input type="email" name="email" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3 focus:ring-orange-500 focus:border-orange-500" placeholder="email@domain.com"/>
        </div>
        <div>
          <label class="block font-semibold text-slate-700 mb-1">No. Telepon / WA</label>
          <input type="text" name="phone" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3 focus:ring-orange-500 focus:border-orange-500" placeholder="0812..."/>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Gender</label>
          <select name="gender" class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
            <option value="FEMALE">Perempuan</option>
            <option value="MALE">Laki-laki</option>
          </select>
        </div>
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Channel Sumber</label>
          <select name="source_channel" class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
            <option value="INSTAGRAM">Instagram</option>
            <option value="WEBSITE">Website</option>
            <option value="SCHOOL_ROADSHOW">School Roadshow</option>
            <option value="REFERRAL">Referral</option>
          </select>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Cabang (Branch)</label>
          <select name="branch_id" class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
            @foreach($branches as $b)
              <option value="{{ $b->id }}">{{ $b->name }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Program Pilihan</label>
          <select name="program_id" class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
            @foreach($programs as $pr)
              <option value="{{ $pr->id }}">{{ $pr->name }}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div>
        <label class="block font-semibold text-slate-700 mb-1">Status Awal</label>
        <select name="admission_status" class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
          <option value="SUBMITTED">Submitted</option>
          <option value="VERIFICATION">Verification</option>
          <option value="INTERVIEW">Interview</option>
          <option value="ACCEPTED">Accepted</option>
        </select>
      </div>
      <div class="pt-2 flex justify-end gap-2">
        <button type="button" onclick="document.getElementById('modalAddApplicant').classList.add('hidden')" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 font-semibold">Batal</button>
        <button type="submit" class="px-4 py-2 rounded-xl bg-orange-600 hover:bg-orange-700 text-white font-semibold shadow-sm">Simpan ke Database</button>
      </div>
    </form>
  </div>
</div>
</body></html>
