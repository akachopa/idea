<!DOCTYPE html>
<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Assessment &amp; Certification - IDEA ERP</title>
<!-- Tailwind CSS CDN with forms and container queries plugins -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            primary: {
              DEFAULT: '#FF5C26',
              light: '#FFF0EA',
              dark: '#E04A18'
            },
            sidebar: '#F8F9FA',
            canvas: '#F5F6F8'
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif']
          }
        }
      }
    }
  </script>
<style data-purpose="custom-styling">
    @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .custom-scrollbar::-webkit-scrollbar {
      width: 5px;
      height: 5px;
    }
    .custom-scrollbar::-webkit-scrollbar-thumb {
      background: #E2E8F0;
      border-radius: 9999px;
    }
  </style>
</head>
<body class="bg-[#F5F6F8] text-slate-800 antialiased flex min-h-screen overflow-x-hidden text-[13px]">
<!-- BEGIN: LeftSidebar -->
<aside class="w-[230px] flex-shrink-0 bg-white border-r border-slate-200/80 flex flex-col justify-between py-5 px-3 min-h-screen" data-purpose="main-sidebar">
<div class="space-y-6">
<!-- Logo Header -->
<div class="flex items-center justify-between px-3">
<a href="{{ route('erp.dashboard') }}" class="flex items-center gap-2.5">
<div class="w-8 h-8 rounded-full border-[3px] border-[#FF5C26] flex items-center justify-center">
<div class="w-2.5 h-2.5 bg-[#FF5C26] rounded-full"></div>
</div>
<div>
<h1 class="text-sm font-black tracking-tight leading-none text-slate-900">IDEA ERP</h1>
<p class="text-[9px] text-slate-400 font-medium leading-tight mt-0.5">Education for a Brighter Tomorrow</p>
</div>
</a>
<button aria-label="Collapse menu" class="text-slate-400 hover:text-slate-600">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M15 19l-7-7 7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</button>
</div>
<!-- Navigation Links -->
<nav class="space-y-1" data-purpose="sidebar-nav">
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 font-medium hover:bg-slate-50 transition-colors" href="{{ route('erp.dashboard') }}">
<svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span class="text-xs">Dashboard</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 font-medium hover:bg-slate-50 transition-colors" href="{{ route('erp.admission') }}">
<svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span class="text-xs">Admission</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 font-medium hover:bg-slate-50 transition-colors" href="{{ route('erp.finance') }}">
<svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span class="text-xs">Finance</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 font-medium hover:bg-slate-50 transition-colors" href="{{ route('erp.students') }}">
<svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span class="text-xs">Student Management</span>
</a>
<!-- Assessment & Certification (Active) -->
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl bg-[#FF5C26] text-white font-medium shadow-sm shadow-[#FF5C26]/30" href="{{ route('erp.assessments') }}">
<svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span class="text-xs font-semibold">Assessment &amp; Certification</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 font-medium hover:bg-slate-50 transition-colors" href="{{ route('erp.placements') }}">
<svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span class="text-xs">Career &amp; Placement</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 font-medium hover:bg-slate-50 transition-colors" href="{{ route('erp.partners') }}">
<svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span class="text-xs">Partners</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 font-medium hover:bg-slate-50 transition-colors" href="{{ route('erp.alumni') }}">
<svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M12 14l9-5-9-5-9 5 9 5z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path><path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span class="text-xs">Alumni</span>
</a>
<a class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-slate-600 font-medium hover:bg-slate-50 transition-colors" href="{{ route('erp.reports') }}">
<svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
<span class="text-xs">Reports</span>
</a>
</nav>
</div>
<!-- Promotional Card at Bottom Sidebar -->
<div class="mt-8 rounded-2xl bg-gradient-to-b from-[#FFF5F1] to-[#FFEBE4] p-3 text-center border border-[#FFE0D5] relative overflow-hidden">
<div class="h-28 w-full flex items-center justify-center relative mb-2">
<div class="w-20 h-20 rounded-full bg-[#FFDEC9]/70 absolute -top-1"></div>
<div class="relative z-10 flex flex-col items-center">
<div class="w-10 h-10 rounded-full bg-[#3D2C2E] relative flex items-center justify-center">
<div class="w-6 h-6 rounded-full bg-[#FFD1BA]"></div>
</div>
<div class="w-14 h-10 bg-[#FF6B35] rounded-t-xl mt-0.5 flex flex-col items-center justify-start pt-1">
<div class="w-2 h-4 bg-white/40 rounded-full"></div>
</div>
</div>
</div>
<p class="text-[12px] font-bold text-[#E64A19] leading-snug">Membangun<br/>Talenta Global<br/>dari Indonesia</p>
<p class="text-[9px] text-slate-500 mt-1 leading-tight">Pendidikan, peluang dan masa depan yang lebih baik.</p>
<a href="{{ route('erp.reports') }}" class="mt-3 w-full py-2 bg-[#FF5C26] hover:bg-[#E04A18] text-white font-semibold text-[11px] rounded-xl flex items-center justify-center gap-1.5 shadow-sm shadow-[#FF5C26]/30 transition-all">
<span>Bersama IDEA ERP</span>
<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</a>
</div>
</aside>
<!-- END: LeftSidebar -->
<!-- BEGIN: MainContentWrapper -->
<div class="flex-1 flex flex-col min-w-0">
<!-- BEGIN: TopBar -->
<header class="h-14 bg-white border-b border-slate-200/80 px-6 flex items-center justify-between sticky top-0 z-30" data-purpose="topbar">
<!-- Search Input -->
<form action="{{ route('erp.assessments') }}" method="GET" class="w-96 relative">
<span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</span>
<input name="q" value="{{ $filters['q'] ?? '' }}" class="w-full pl-9 pr-4 py-1.5 bg-[#F9FAFB] border border-slate-200 rounded-lg text-xs placeholder-slate-400 focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#FF5C26] focus:border-[#FF5C26] transition-all" placeholder="Cari data siswa, program, atau sertifikat..." type="text"/>
</form>
<!-- Right Header Actions -->
<div class="flex items-center gap-5">
<button onclick="document.getElementById('modalAddCert').classList.remove('hidden')" class="px-3.5 py-1.5 bg-[#FF5C26] hover:bg-[#E04A18] text-white font-semibold text-xs rounded-xl shadow-sm transition">
  + Terbitkan Sertifikat
</button>
<!-- User Profile Pill -->
<div class="flex items-center gap-2.5 pl-3 border-l border-slate-200 cursor-pointer">
<div class="w-8 h-8 rounded-full bg-slate-200 overflow-hidden ring-1 ring-slate-200">
<img alt="Sari Anggraini Avatar" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBww2U0EXS0oUukh7C6Z2cHG6k3NcJBmvlDSVR0JUvRfJlkjjRSsSXYGDF-zW-LAi3reqU_e6JJQ8KsNAeGEwaSln6DmhOgRndxK4BeSFMSnuLVNzdtyjW-nkiEljDK8jEKnKilVBxu1wBd8o9Zi2nTSVf8UTZaFNqtVub2orkcPzTN4G_UUFdmD5KR9hnYywkPEl5g8_tPTvVRlwDhv5qBRVGnX4ZdQziEnPPChFs"/>
</div>
<div class="text-left">
<h4 class="text-xs font-bold leading-tight text-slate-800">{{ $currentUser->full_name ?? 'Sari Anggraini' }}</h4>
<p class="text-[10px] text-slate-400 leading-tight">{{ $currentUser->position_name ?? 'Head of Administration' }}</p>
</div>
<svg class="w-3.5 h-3.5 text-slate-400 ml-0.5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</div>
</div>
</header>
<!-- END: TopBar -->
<!-- BEGIN: MainContentArea -->
<main class="flex-1 p-6 space-y-5 custom-scrollbar overflow-y-auto">
@if(session('success'))
<div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-xs font-semibold flex items-center justify-between shadow-sm">
  <span>{{ session('success') }}</span>
  <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900">✕</button>
</div>
@endif
<!-- BEGIN: PageHeader -->
<section class="bg-white rounded-2xl border border-slate-200/80 p-5 relative overflow-hidden flex items-center justify-between" data-purpose="page-hero">
<div class="space-y-1 z-10 max-w-xl">
<div class="flex items-center gap-3">
<h2 class="text-2xl font-bold tracking-tight text-slate-900">Assessment &amp; Certification</h2>
</div>
<p class="text-xs text-slate-500">Kelola pelaksanaan asesmen, pantau kompetensi siswa, dan terbitkan sertifikasi.</p>
</div>
<div class="text-right z-10 hidden sm:block">
<div class="text-xs font-semibold text-slate-700">Senin, 21 Apr 2025</div>
<div class="text-[11px] text-slate-400">Semangat untuk hari yang produktif!</div>
</div>
<div class="absolute right-0 top-0 bottom-0 w-2/5 opacity-15 pointer-events-none bg-gradient-to-l from-orange-400 via-amber-200 to-transparent flex items-center justify-end pr-6">
<div class="text-right">
<span class="block text-2xl font-black uppercase text-slate-800 tracking-wider">People</span>
<span class="block text-lg font-bold text-slate-800">Education Opportunities</span>
<span class="text-xs text-slate-600 tracking-widest font-mono">A Brighter Tomorrow</span>
</div>
</div>
</section>
<!-- END: PageHeader -->
<!-- BEGIN: KpiCardsSection -->
<section class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3.5" data-purpose="kpi-cards">
<!-- Card 1: Assessment Completed -->
<div class="bg-white p-3.5 rounded-2xl border border-slate-200/80 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex flex-col justify-between">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-xl bg-orange-50 text-[#FF5C26] flex items-center justify-center flex-shrink-0">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</div>
<span class="text-[10px] text-slate-500 font-medium leading-tight">Assessment Completed</span>
</div>
<div class="mt-2.5">
<span class="text-xl font-extrabold text-slate-900 block leading-tight">{{ $kpis['assessed'] }}</span>
<div class="flex items-center gap-1 text-[10px] mt-1 font-semibold text-emerald-600">
<span>↑ 12%</span>
<span class="text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
</div>
<!-- Card 2: Competent -->
<div class="bg-white p-3.5 rounded-2xl border border-slate-200/80 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex flex-col justify-between">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-xl bg-amber-50 text-amber-500 flex items-center justify-center flex-shrink-0">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</div>
<span class="text-[10px] text-slate-500 font-medium leading-tight">Competent</span>
</div>
<div class="mt-2.5">
<span class="text-xl font-extrabold text-slate-900 block leading-tight">{{ $kpis['competent'] }}</span>
<div class="flex items-center gap-1 text-[10px] mt-1 font-semibold text-emerald-600">
<span>↑ 8%</span>
<span class="text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
</div>
<!-- Card 3: Need Remedial -->
<div class="bg-white p-3.5 rounded-2xl border border-slate-200/80 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex flex-col justify-between">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-xl bg-orange-100/70 text-orange-600 flex items-center justify-center flex-shrink-0">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</div>
<span class="text-[10px] text-slate-500 font-medium leading-tight">Need Remedial</span>
</div>
<div class="mt-2.5">
<span class="text-xl font-extrabold text-slate-900 block leading-tight">{{ $kpis['remedial'] }}</span>
<div class="flex items-center gap-1 text-[10px] mt-1 font-semibold text-rose-500">
<span>↑ 15%</span>
<span class="text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
</div>
<!-- Card 4: Placement Ready -->
<div class="bg-white p-3.5 rounded-2xl border border-slate-200/80 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex flex-col justify-between">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center flex-shrink-0">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</div>
<span class="text-[10px] text-slate-500 font-medium leading-tight">Placement Ready</span>
</div>
<div class="mt-2.5">
<span class="text-xl font-extrabold text-slate-900 block leading-tight">{{ $kpis['placement_ready'] }}</span>
<div class="flex items-center gap-1 text-[10px] mt-1 font-semibold text-emerald-600">
<span>↑ 11%</span>
<span class="text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
</div>
<!-- Card 5: Certificates Issued -->
<div class="bg-white p-3.5 rounded-2xl border border-slate-200/80 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex flex-col justify-between">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-xl bg-orange-50 text-[#FF5C26] flex items-center justify-center flex-shrink-0">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</div>
<span class="text-[10px] text-slate-500 font-medium leading-tight">Certificates Issued</span>
</div>
<div class="mt-2.5">
<span class="text-xl font-extrabold text-slate-900 block leading-tight">{{ $kpis['certificates_issued'] }}</span>
<div class="flex items-center gap-1 text-[10px] mt-1 font-semibold text-emerald-600">
<span>↑ 20%</span>
<span class="text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
</div>
<!-- Card 6: Expiring Certificates -->
<div class="bg-white p-3.5 rounded-2xl border border-slate-200/80 shadow-[0_1px_3px_rgba(0,0,0,0.02)] flex flex-col justify-between">
<div class="flex items-center gap-2">
<div class="w-8 h-8 rounded-xl bg-orange-100 text-orange-600 flex items-center justify-center flex-shrink-0">
<svg class="w-4 h-4" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</div>
<span class="text-[10px] text-slate-500 font-medium leading-tight">Expiring Certificates</span>
</div>
<div class="mt-2.5">
<span class="text-xl font-extrabold text-slate-900 block leading-tight">{{ $kpis['expiring_certificates'] }}</span>
<div class="flex items-center gap-1 text-[10px] mt-1 font-semibold text-rose-500">
<span>↑ 25%</span>
<span class="text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
</div>
</section>
<!-- END: KpiCardsSection -->
<!-- BEGIN: ChartsSection -->
<section class="grid grid-cols-1 lg:grid-cols-12 gap-4" data-purpose="charts-row">
<!-- 1. Student Readiness Score Chart -->
<div class="lg:col-span-5 bg-white p-4 rounded-2xl border border-slate-200/80 flex flex-col justify-between">
<div class="flex items-center justify-between mb-3">
<h3 class="text-xs font-bold text-slate-800">Student Readiness Score</h3>
<div class="flex items-center text-[10px] text-slate-500 font-medium cursor-pointer">
<span>6 bulan terakhir</span>
<svg class="w-3 h-3 ml-1 text-slate-400" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</div>
</div>
<div class="relative w-full h-44 pt-2">
<div class="absolute inset-0 flex flex-col justify-between text-[9px] text-slate-400 pointer-events-none pb-6 pl-6">
<div class="border-b border-slate-100 w-full relative"><span class="absolute -left-6 -top-2">100</span></div>
<div class="border-b border-slate-100 w-full relative"><span class="absolute -left-6 -top-2">80</span></div>
<div class="border-b border-slate-100 w-full relative"><span class="absolute -left-6 -top-2">60</span></div>
<div class="border-b border-slate-100 w-full relative"><span class="absolute -left-6 -top-2">40</span></div>
<div class="border-b border-slate-100 w-full relative"><span class="absolute -left-6 -top-2">20</span></div>
<div class="border-b border-slate-100 w-full relative"><span class="absolute -left-6 -top-2">0</span></div>
</div>
<svg class="w-full h-full pl-6 pb-6 overflow-visible" preserveaspectratio="none" viewbox="0 0 350 140">
<defs>
<lineargradient id="areaGradient" x1="0" x2="0" y1="0" y2="1">
<stop offset="0%" stop-color="#FF5C26" stop-opacity="0.25"></stop>
<stop offset="100%" stop-color="#FF5C26" stop-opacity="0.0"></stop>
</lineargradient>
</defs>
<polygon fill="url(#areaGradient)" points="10,65 75,56 145,50 215,44 285,38 345,28 345,140 10,140"></polygon>
<polyline fill="none" points="10,65 75,56 145,50 215,44 285,38 345,28" stroke="#FF5C26" stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"></polyline>
<circle class="fill-[#FF5C26] stroke-white stroke-2" cx="10" cy="65" r="3.5"></circle>
<text fill="#334155" font-size="9" font-weight="bold" text-anchor="middle" x="10" y="52">62</text>
<circle class="fill-[#FF5C26] stroke-white stroke-2" cx="75" cy="56" r="3.5"></circle>
<text fill="#334155" font-size="9" font-weight="bold" text-anchor="middle" x="75" y="44">68</text>
<circle class="fill-[#FF5C26] stroke-white stroke-2" cx="145" cy="50" r="3.5"></circle>
<text fill="#334155" font-size="9" font-weight="bold" text-anchor="middle" x="145" y="38">72</text>
<circle class="fill-[#FF5C26] stroke-white stroke-2" cx="215" cy="44" r="3.5"></circle>
<text fill="#334155" font-size="9" font-weight="bold" text-anchor="middle" x="215" y="32">76</text>
<circle class="fill-[#FF5C26] stroke-white stroke-2" cx="285" cy="38" r="3.5"></circle>
<text fill="#334155" font-size="9" font-weight="bold" text-anchor="middle" x="285" y="26">80</text>
<circle class="fill-[#FF5C26] stroke-white stroke-2" cx="345" cy="28" r="3.5"></circle>
<text fill="#334155" font-size="9" font-weight="bold" text-anchor="middle" x="345" y="16">85</text>
</svg>
<div class="absolute bottom-0 left-6 right-0 flex justify-between text-[9px] text-slate-400 font-medium">
<span>Jan</span><span>Feb</span><span>Mar</span><span>Apr</span><span>Mei</span><span>Jun</span>
</div>
</div>
</div>
<!-- 2. Completion per Program Progress Bars -->
<div class="lg:col-span-4 bg-white p-4 rounded-2xl border border-slate-200/80 flex flex-col justify-between">
<div class="flex items-center justify-between mb-2">
<h3 class="text-xs font-bold text-slate-800">Completion per Program</h3>
<div class="flex items-center text-[10px] text-slate-500 font-medium cursor-pointer">
<span>Tahun Ini</span>
<svg class="w-3 h-3 ml-1 text-slate-400" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</div>
</div>
<div class="space-y-3 my-auto">
@foreach($programCompletion as $pc)
<div>
<div class="flex justify-between items-center text-[11px] mb-1">
<span class="text-slate-600 font-medium">{{ $pc->name }}</span>
<span class="font-bold text-slate-800">{{ $pc->completion_rate }}%</span>
</div>
<div class="h-3 w-full bg-slate-100 rounded-full overflow-hidden">
<div class="h-full bg-gradient-to-r from-[#FF7A45] to-[#FF5C26] rounded-full" style="width: {{ $pc->completion_rate }}%"></div>
</div>
</div>
@endforeach
</div>
</div>
<!-- 3. Assessment Status Donut Chart -->
<div class="lg:col-span-3 bg-white p-4 rounded-2xl border border-slate-200/80 flex flex-col justify-between">
<div class="flex items-center justify-between mb-1">
<h3 class="text-xs font-bold text-slate-800">Assessment Status</h3>
<div class="flex items-center text-[10px] text-slate-500 font-medium cursor-pointer">
<span>Tahun Ini</span>
<svg class="w-3 h-3 ml-1 text-slate-400" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</div>
</div>
@php
  $totAssessed = max(1, $kpis['assessed']);
  $compPct = round(($kpis['competent'] / $totAssessed) * 100);
  $remPct = max(0, 100 - $compPct);
@endphp
<div class="flex items-center gap-3 my-auto">
<div class="relative w-28 h-28 flex items-center justify-center flex-shrink-0">
<svg class="w-full h-full -rotate-90" viewbox="0 0 36 36">
<path class="text-slate-100" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4.5"></path>
<path class="text-[#FF5C26]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="{{ $compPct }}, 100" stroke-linecap="round" stroke-width="4.5"></path>
<path class="text-[#FF9F43]" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="{{ $remPct }}, 100" stroke-dashoffset="-{{ $compPct }}" stroke-linecap="round" stroke-width="4.5"></path>
</svg>
<div class="absolute inset-0 flex flex-col items-center justify-center text-center">
<span class="text-xs font-extrabold text-slate-800 leading-tight">{{ $kpis['assessed'] }}</span>
<span class="text-[8px] text-slate-400 font-medium leading-none">Total<br/>Asesmen</span>
</div>
</div>
<div class="space-y-2 text-[10px]">
<div>
<div class="flex items-center gap-1.5 font-bold text-slate-800">
<span class="w-2 h-2 rounded-full bg-emerald-500"></span>
<span>Competent</span>
</div>
<p class="text-[9px] text-slate-400 pl-3.5">{{ $compPct }}% ({{ $kpis['competent'] }})</p>
</div>
<div>
<div class="flex items-center gap-1.5 font-bold text-slate-800">
<span class="w-2 h-2 rounded-full bg-[#FF5C26]"></span>
<span>Need Remedial</span>
</div>
<p class="text-[9px] text-slate-400 pl-3.5">{{ $remPct }}% ({{ $kpis['remedial'] }})</p>
</div>
</div>
</div>
</div>
</section>
<!-- END: ChartsSection -->
<!-- BEGIN: MidSection (Schedule & Activities) -->
<section class="grid grid-cols-1 lg:grid-cols-12 gap-4" data-purpose="schedules-and-activities">
<!-- Table: Upcoming Assessment Schedule -->
<div class="lg:col-span-8 bg-white p-4 rounded-2xl border border-slate-200/80 flex flex-col justify-between">
<div class="flex items-center justify-between mb-3">
<h3 class="text-xs font-bold text-slate-800">Upcoming Assessment Schedule</h3>
<span class="text-[11px] font-semibold text-[#FF5C26]">Data PostgreSQL</span>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left text-[11px]">
<thead>
<tr class="text-slate-400 border-b border-slate-100 font-medium">
<th class="pb-2.5 font-normal">Tanggal</th>
<th class="pb-2.5 font-normal">Waktu</th>
<th class="pb-2.5 font-normal">Program</th>
<th class="pb-2.5 font-normal">Jenis Asesmen</th>
<th class="pb-2.5 font-normal">Lokasi</th>
<th class="pb-2.5 font-normal">Peserta</th>
<th class="pb-2.5 font-normal text-right">Status</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100">
@foreach($upcomingAssessments as $as)
@php
  $dt = strtotime($as->scheduled_at);
@endphp
<tr>
<td class="py-2.5 text-slate-700 font-medium">{{ date('d M Y', $dt) }}</td>
<td class="py-2.5 text-slate-500">{{ date('H:i', $dt) }}</td>
<td class="py-2.5 text-slate-700 font-medium">{{ $as->program_name }}</td>
<td class="py-2.5 text-slate-500">{{ $as->name }} ({{ $as->assessment_type }})</td>
<td class="py-2.5 text-slate-500">{{ $as->location }}</td>
<td class="py-2.5 text-slate-600 font-medium">{{ max($as->participant_count, 24) }}</td>
<td class="py-2.5 text-right">
<span class="inline-block px-2.5 py-0.5 rounded-full text-[10px] font-medium bg-emerald-50 text-emerald-600 border border-emerald-100">{{ $as->status === 'COMPLETED' ? 'Selesai' : 'Sesuai Jadwal' }}</span>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
<!-- Recent Certification Activities -->
<div class="lg:col-span-4 bg-white p-4 rounded-2xl border border-slate-200/80 flex flex-col justify-between">
<div class="flex items-center justify-between mb-3">
<h3 class="text-xs font-bold text-slate-800">Recent Certification Activities</h3>
<a class="text-[11px] font-semibold text-[#FF5C26] hover:underline flex items-center gap-1" href="{{ route('erp.reports') }}">
              Lihat Semua
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M14 5l7 7m0 0l-7 7m7-7H3" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</a>
</div>
<div class="space-y-3">
@foreach($certificates->take(5) as $cert)
<div class="flex items-start gap-2.5">
<div class="w-7 h-7 rounded-full bg-orange-50 text-[#FF5C26] flex items-center justify-center flex-shrink-0 mt-0.5">
<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</div>
<div class="flex-1 min-w-0">
<p class="text-[11px] font-bold text-slate-800 leading-tight">{{ $cert->title }}</p>
<p class="text-[10px] text-slate-500 leading-tight">{{ $cert->student_name }} - {{ $cert->program_name }}</p>
</div>
<span class="text-[10px] text-slate-400 font-medium">{{ date('d M', strtotime($cert->issue_date)) }}</span>
</div>
@endforeach
</div>
</div>
</section>
<!-- END: MidSection -->
<!-- BEGIN: BottomTableSection (Daftar Sertifikasi) -->
<section class="bg-white p-4 rounded-2xl border border-slate-200/80 space-y-4" data-purpose="daftar-sertifikasi-section">
<!-- Header & Filter Controls -->
<form action="{{ route('erp.assessments') }}" method="GET" class="flex flex-col md:flex-row md:items-center justify-between gap-3">
<h3 class="text-xs font-bold text-slate-800">Daftar Sertifikasi ({{ count($certificates) }} Data)</h3>
<div class="flex flex-wrap items-center gap-2.5">
<!-- Filter Program -->
<div class="relative">
<select name="program_id" onchange="this.form.submit()" class="appearance-none bg-slate-50 border border-slate-200 rounded-lg text-[11px] py-1.5 pl-3 pr-7 text-slate-600 focus:outline-none focus:ring-1 focus:ring-[#FF5C26] focus:border-[#FF5C26]">
<option value="">Semua Program</option>
@foreach($programs as $pr)
<option value="{{ $pr->id }}" @selected(($filters['program_id'] ?? '') == $pr->id)>{{ $pr->name }}</option>
@endforeach
</select>
<svg class="w-3.5 h-3.5 text-slate-400 absolute right-2 top-2 pointer-events-none" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</div>
<!-- Filter Jenis Sertifikat -->
<div class="relative">
<select name="cert_type_id" onchange="this.form.submit()" class="appearance-none bg-slate-50 border border-slate-200 rounded-lg text-[11px] py-1.5 pl-3 pr-7 text-slate-600 focus:outline-none focus:ring-1 focus:ring-[#FF5C26] focus:border-[#FF5C26]">
<option value="">Semua Jenis Sertifikat</option>
@foreach($certificationTypes as $ct)
<option value="{{ $ct->id }}" @selected(($filters['cert_type_id'] ?? '') == $ct->id)>{{ $ct->name }}</option>
@endforeach
</select>
<svg class="w-3.5 h-3.5 text-slate-400 absolute right-2 top-2 pointer-events-none" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</div>
<!-- Search Table -->
<div class="relative">
<span class="absolute inset-y-0 left-0 flex items-center pl-2.5 pointer-events-none text-slate-400">
<svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewbox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
</span>
<input name="q" value="{{ $filters['q'] ?? '' }}" class="pl-8 pr-3 py-1.5 bg-slate-50 border border-slate-200 rounded-lg text-[11px] placeholder-slate-400 focus:outline-none focus:ring-1 focus:ring-[#FF5C26] focus:border-[#FF5C26] w-56" placeholder="Cari nama siswa atau sertifikat..." type="text"/>
</div>
</div>
</form>
<!-- Table Element -->
<div class="overflow-x-auto">
<table class="w-full text-left text-[11px]">
<thead>
<tr class="text-slate-400 border-b border-slate-100 font-medium">
<th class="pb-2.5 font-normal w-10">No</th>
<th class="pb-2.5 font-normal">Certificate No</th>
<th class="pb-2.5 font-normal">Student Name</th>
<th class="pb-2.5 font-normal">Program</th>
<th class="pb-2.5 font-normal text-center">Assessment Score</th>
<th class="pb-2.5 font-normal">Certificate Type</th>
<th class="pb-2.5 font-normal">Issue Date</th>
<th class="pb-2.5 font-normal">Expiry</th>
<th class="pb-2.5 font-normal text-center">Status</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100">
@foreach($certificates as $idx => $cert)
<tr class="hover:bg-slate-50/60">
<td class="py-2.5 text-slate-400">{{ $idx + 1 }}</td>
<td class="py-2.5 font-mono text-slate-500">{{ $cert->certificate_no }}</td>
<td class="py-2.5 font-semibold text-slate-800">{{ $cert->student_name }}</td>
<td class="py-2.5 text-slate-600">{{ $cert->program_name }}</td>
<td class="py-2.5 font-bold text-slate-800 text-center">{{ round($cert->score) }}</td>
<td class="py-2.5 text-slate-600">{{ $cert->cert_type_name }}</td>
<td class="py-2.5 text-slate-600">{{ date('d M Y', strtotime($cert->issue_date)) }}</td>
<td class="py-2.5 text-slate-600">{{ $cert->expiry_date ? date('d M Y', strtotime($cert->expiry_date)) : '-' }}</td>
<td class="py-2.5 text-center">
@if($cert->status === 'EXPIRING')
<span class="inline-block px-3 py-0.5 rounded-full text-[10px] font-semibold bg-orange-50 text-orange-600">Akan Kedaluwarsa</span>
@else
<span class="inline-block px-3 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-600">Aktif</span>
@endif
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</section>
<!-- END: BottomTableSection -->
</main>
</div>

<!-- Modal Terbitkan Sertifikat -->
<div id="modalAddCert" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-md overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
      <h3 class="text-sm font-extrabold text-slate-900">Terbitkan Sertifikat Baru</h3>
      <button onclick="document.getElementById('modalAddCert').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">✕</button>
    </div>
    <form action="{{ route('erp.assessments.certificate.store') }}" method="POST" class="p-6 space-y-4 text-xs">
      @csrf
      <div>
        <label class="block font-semibold text-slate-700 mb-1">Pilih Siswa</label>
        <select name="student_id" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
          @foreach($studentsList as $st)
            <option value="{{ $st->id }}">{{ $st->student_no }} - {{ $st->full_name }} ({{ $st->program_name }})</option>
          @endforeach
        </select>
      </div>
      <div>
        <label class="block font-semibold text-slate-700 mb-1">Jenis Sertifikasi</label>
        <select name="certification_type_id" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
          @foreach($certificationTypes as $ct)
            <option value="{{ $ct->id }}">{{ $ct->name }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label class="block font-semibold text-slate-700 mb-1">Judul Sertifikat</label>
        <input type="text" name="title" required value="Hospitality Service Excellence Certificate" class="w-full rounded-xl border-slate-200 text-xs py-2 px-3"/>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Nilai Asesmen (0-100)</label>
          <input type="number" name="score" value="90" min="0" max="100" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3"/>
        </div>
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Tanggal Terbit</label>
          <input type="date" name="issue_date" value="{{ date('Y-m-d') }}" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3"/>
        </div>
      </div>
      <div class="pt-2 flex justify-end gap-2">
        <button type="button" onclick="document.getElementById('modalAddCert').classList.add('hidden')" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 font-semibold">Batal</button>
        <button type="submit" class="px-4 py-2 rounded-xl bg-[#FF5C26] hover:bg-[#E04A18] text-white font-semibold shadow-sm">Simpan Sertifikat</button>
      </div>
    </form>
  </div>
</div>
</body></html>
