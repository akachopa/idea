<!DOCTYPE html>
<html lang="id"><head>
<meta charset="utf-8"/>
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<title>Finance Overview - IDEA ERP</title>
<!-- Tailwind CSS v3 CDN with plugins -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<!-- Tailwind Configuration -->
<script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            brand: {
              orange: '#f95f24',
              orangeLight: '#ffede5',
              orangeDark: '#e04910',
              grayBg: '#f8fafc',
              border: '#f1f5f9',
            }
          },
          fontFamily: {
            sans: ['Inter', 'system-ui', '-apple-system', 'Segoe UI', 'Roboto', 'sans-serif'],
          }
        }
      }
    }
  </script>
<!-- Phosphor Icons (for clean UI icons) -->
<script src="https://unpkg.com/@phosphor-icons/web"></script>
<!-- Custom CSS for specific charts and details -->
<style data-purpose="custom-scrollbars-and-chart">
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
<body class="bg-[#f4f6f9] text-slate-800 font-sans antialiased min-h-screen flex text-[13px]">
<!-- BEGIN: Sidebar Navigation -->
<aside class="w-64 bg-white border-r border-slate-200/80 shrink-0 flex flex-col justify-between min-h-screen sticky top-0 h-screen select-none" data-purpose="sidebar">
<div>
<!-- Brand Logo Header -->
<div class="h-16 px-6 flex items-center justify-between border-b border-slate-100">
<a href="{{ route('erp.dashboard') }}" class="flex items-center gap-3">
<div class="w-9 h-9 rounded-full bg-gradient-to-tr from-brand-orange to-amber-500 flex items-center justify-center shadow-sm shadow-orange-300">
<span class="w-4 h-4 rounded-full bg-white block"></span>
</div>
<div class="leading-tight">
<h1 class="font-extrabold tracking-tight text-slate-900 text-base leading-none">IDEA ERP</h1>
<span class="text-[10px] text-slate-400 font-medium tracking-wide">Education for a Brighter Tomorrow</span>
</div>
</a>
<button class="text-slate-400 hover:text-slate-600 p-1 rounded-lg transition-colors">
<i class="ph ph-caret-left text-base"></i>
</button>
</div>
<!-- Navigation Links -->
<nav class="p-4 space-y-1">
<a class="flex items-center gap-3.5 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-all group" href="{{ route('erp.dashboard') }}">
<i class="ph ph-squares-four text-lg text-slate-400 group-hover:text-slate-700"></i>
<span>Dashboard</span>
</a>
<a class="flex items-center gap-3.5 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-all group" href="{{ route('erp.admission') }}">
<i class="ph ph-user-plus text-lg text-slate-400 group-hover:text-slate-700"></i>
<span>Admission</span>
</a>
<!-- Active Link: Finance -->
<a class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-xl font-semibold bg-gradient-to-r from-brand-orange to-[#ff6c37] text-white shadow-md shadow-orange-500/25" href="{{ route('erp.finance') }}">
<i class="ph-bold ph-wallet text-lg text-white"></i>
<span>Finance</span>
</a>
<a class="flex items-center gap-3.5 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-all group" href="{{ route('erp.students') }}">
<i class="ph ph-users-three text-lg text-slate-400 group-hover:text-slate-700"></i>
<span>Student Management</span>
</a>
<a class="flex items-center gap-3.5 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-all group" href="{{ route('erp.assessments') }}">
<i class="ph ph-file-text text-lg text-slate-400 group-hover:text-slate-700"></i>
<span>Assessment &amp; Certification</span>
</a>
<a class="flex items-center gap-3.5 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-all group" href="{{ route('erp.placements') }}">
<i class="ph ph-briefcase text-lg text-slate-400 group-hover:text-slate-700"></i>
<span>Career &amp; Placement</span>
</a>
<a class="flex items-center gap-3.5 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-all group" href="{{ route('erp.partners') }}">
<i class="ph ph-handshake text-lg text-slate-400 group-hover:text-slate-700"></i>
<span>Partners</span>
</a>
<a class="flex items-center gap-3.5 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-all group" href="{{ route('erp.alumni') }}">
<i class="ph ph-student text-lg text-slate-400 group-hover:text-slate-700"></i>
<span>Alumni</span>
</a>
<a class="flex items-center gap-3.5 px-3 py-2.5 rounded-xl font-medium text-slate-600 hover:bg-slate-50 hover:text-slate-900 transition-all group" href="{{ route('erp.reports') }}">
<i class="ph ph-chart-bar text-lg text-slate-400 group-hover:text-slate-700"></i>
<span>Reports</span>
</a>
</nav>
</div>
<!-- Sidebar Bottom Promo Card -->
<div class="p-4">
<div class="relative overflow-hidden rounded-2xl bg-gradient-to-b from-orange-100/70 via-orange-50 to-white p-4 border border-orange-200/50 shadow-sm">
<div class="relative z-10">
<div class="h-24 w-full flex items-center justify-center mb-2">
<svg class="h-20 w-auto drop-shadow-sm" fill="none" viewbox="0 0 160 120" xmlns="http://www.w3.org/2000/svg">
<rect fill="#FDBA74" height="70" opacity="0.4" rx="8" width="90" x="35" y="45"></rect>
<circle cx="80" cy="42" fill="#FED7AA" r="22"></circle>
<path d="M68 38C68 31.3726 73.3726 26 80 26C86.6274 26 92 31.3726 92 38C92 41.5 90.5 45.5 88 47.5L88 56C88 57.1046 87.1046 58 86 58H74C72.8954 58 72 57.1046 72 56L72 47.5C69.5 45.5 68 41.5 68 38Z" fill="#1E293B"></path>
<path d="M52 110C52 86.804 70.804 68 94 68C101.408 68 108.358 70.0825 114.286 73.6875C118.995 76.5518 120.912 82.2618 119.539 87.5457L114.619 106.516C114.07 108.631 112.164 110.125 109.98 110.125H52V110Z" fill="#F97316"></path>
<circle cx="80" cy="46" fill="#FDBA74" r="14"></circle>
<rect fill="#E2E8F0" height="18" rx="2" width="12" x="74" y="80"></rect>
</svg>
</div>
<h3 class="text-xs font-bold text-brand-orange uppercase tracking-wide">Membangun Talenta Global</h3>
<p class="text-xs font-bold text-slate-800 leading-snug">dari Indonesia</p>
<p class="text-[11px] text-slate-500 mt-1 leading-relaxed">Pendidikan, peluang dan masa depan yang lebih baik.</p>
<a href="{{ route('erp.reports') }}" class="mt-3 w-full py-2 px-3 bg-brand-orange hover:bg-brand-orangeDark text-white font-medium text-xs rounded-xl flex items-center justify-center gap-1.5 shadow-sm transition-colors">
<span>Bersama IDEA ERP</span>
<i class="ph ph-arrow-right text-xs"></i>
</a>
</div>
</div>
</div>
</aside>
<!-- END: Sidebar Navigation -->
<!-- BEGIN: Main Dashboard Content Area -->
<div class="flex-1 flex flex-col min-w-0">
<!-- BEGIN: Top Navigation Bar -->
<header class="h-16 bg-white border-b border-slate-200/80 px-8 flex items-center justify-between sticky top-0 z-30" data-purpose="topbar">
<!-- Search Input Form -->
<form action="{{ route('erp.finance') }}" method="GET" class="relative w-96">
<span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-slate-400">
<i class="ph ph-magnifying-glass text-base"></i>
</span>
<input name="q" value="{{ $filters['q'] ?? '' }}" class="w-full bg-[#f8fafc] border border-slate-200 text-xs rounded-xl pl-10 pr-4 py-2 text-slate-700 placeholder-slate-400 focus:outline-none focus:border-brand-orange focus:ring-1 focus:ring-brand-orange transition-all" placeholder="Cari data siswa, program, pembayaran, atau lainnya..." type="search"/>
</form>
<!-- Right Topbar Controls -->
<div class="flex items-center gap-5">
<button onclick="document.getElementById('modalAddInvoice').classList.remove('hidden')" class="px-3.5 py-2 bg-brand-orange hover:bg-brand-orangeDark text-white font-semibold text-xs rounded-xl shadow-sm flex items-center gap-1.5 transition">
  <i class="ph-bold ph-plus text-xs"></i>
  <span>Buat Invoice / Pembayaran</span>
</button>
<div class="h-6 w-px bg-slate-200"></div>
<!-- User Profile Card -->
<div class="flex items-center gap-3 cursor-pointer select-none">
<img alt="Sari Anggraini Avatar" class="w-9 h-9 rounded-full object-cover border border-slate-200 shadow-sm" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAIt-vH7bWMS_QbTo5aVVByM6k8n2bzTUUGQLALSqjKUMJSEQzYejYTONf9NLdxRbY57DWZ4468bGVYKoTFvzCNhTsVka9w7VnBVwFZ50Ea_wClh4IItbPITEn753RbR0aJqE5vWEfwyDdnny31RJBRwiPzwXiBj_hL0MfNgigvWqefE8hCw2R9YzgJ_bmrmjzGejQIbO07W3bWU_0ClJtaGpVLAiLsHE-2lPgYGx0"/>
<div class="leading-tight text-left">
<h4 class="text-xs font-semibold text-slate-800 flex items-center gap-1">
              {{ $currentUser->full_name ?? 'Sari Anggraini' }}
              <i class="ph ph-caret-down text-[10px] text-slate-400"></i>
</h4>
<span class="text-[11px] text-slate-400 font-medium">{{ $currentUser->position_name ?? 'Head of Administration' }}</span>
</div>
</div>
</div>
</header>
<!-- END: Top Navigation Bar -->
<!-- BEGIN: Main Scrollable Content -->
<main class="flex-1 p-8 space-y-6">
@if(session('success'))
<div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl text-xs font-semibold flex items-center justify-between shadow-sm">
  <span>{{ session('success') }}</span>
  <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900">✕</button>
</div>
@endif
<!-- BEGIN: Header Hero Banner -->
<section class="relative overflow-hidden rounded-2xl bg-white border border-slate-200/80 shadow-sm p-6 flex flex-col md:flex-row items-start md:items-center justify-between gap-4" data-purpose="banner-header">
<div class="absolute right-0 top-0 bottom-0 w-2/5 opacity-20 pointer-events-none overflow-hidden hidden md:block">
<img alt="Interior Architecture" class="w-full h-full object-cover object-right" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDaAa0JoDrHccvdK39ohJ6dycSRG650X98vcOEHJWxJQd_RVLUvEKtKlxx1hp8odsvNwqwRgw_pPYHBBXBwjGgplBzyagIiORbw5okkgeA63soLtldfl5FI14qhcX5tYGMoWlDRYjL3dnH4iZLe37XSwGYm_B6tnfna-o9pwC2dVZthjTeseTIxTMnOxYkMPGJVaygu6_2NGrw9Xuxt8HgALsgiH-zNTPnjeT-rvjU"/>
<div class="absolute inset-0 bg-gradient-to-r from-white via-white/80 to-transparent"></div>
</div>
<div class="relative z-10">
<h2 class="text-2xl font-bold text-slate-900 tracking-tight">Finance Overview</h2>
<p class="text-xs text-slate-500 mt-1">Ringkasan keuangan, pembayaran, dan status penagihan IDEA ERP.</p>
</div>
<div class="relative z-10 flex items-center gap-8">
<div class="text-left md:text-right">
<div class="text-xs font-bold text-slate-800">Senin, 21 Apr 2025</div>
<div class="text-[11px] text-slate-500 mt-0.5">Kelola keuangan hari ini untuk pendidikan yang lebih baik esok hari.</div>
</div>
<div class="hidden lg:block text-right border-l pl-6 border-slate-200">
<div class="text-[11px] font-bold text-slate-800 leading-tight">People<br/>Education<br/>Opportunities</div>
<div class="text-[9px] text-brand-orange font-semibold mt-0.5">A Brighter Tomorrow</div>
</div>
</div>
</section>
<!-- END: Header Hero Banner -->
<!-- BEGIN: 6 KPI Cards Grid -->
<section class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-6 gap-4" data-purpose="kpi-metrics-grid">
<!-- Card 1: Student Billing -->
<div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm hover:shadow transition-shadow">
<div class="flex items-center justify-between mb-2">
<div class="w-9 h-9 rounded-xl bg-orange-50 text-brand-orange flex items-center justify-center">
<i class="ph ph-receipt text-lg"></i>
</div>
</div>
<span class="text-[11px] font-medium text-slate-500 block">Student Billing</span>
<div class="text-lg font-bold text-slate-900 mt-0.5 tracking-tight">Rp {{ number_format(($invoiceTotals->total_billing ?? 0) / 1000000, 1, ',', '.') }} Jt</div>
<div class="flex items-center gap-1.5 mt-2 text-[11px] text-emerald-600 font-semibold">
<i class="ph ph-arrow-up text-xs"></i>
<span>12%</span>
<span class="text-[10px] text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
<!-- Card 2: Cash In -->
<div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm hover:shadow transition-shadow">
<div class="flex items-center justify-between mb-2">
<div class="w-9 h-9 rounded-xl bg-orange-50 text-amber-600 flex items-center justify-center">
<i class="ph ph-coins text-lg"></i>
</div>
</div>
<span class="text-[11px] font-medium text-slate-500 block">Cash In</span>
<div class="text-lg font-bold text-slate-900 mt-0.5 tracking-tight">Rp {{ number_format(($totalCashIn ?? 0) / 1000000, 1, ',', '.') }} Jt</div>
<div class="flex items-center gap-1.5 mt-2 text-[11px] text-emerald-600 font-semibold">
<i class="ph ph-arrow-up text-xs"></i>
<span>18%</span>
<span class="text-[10px] text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
<!-- Card 3: Outstanding Payment -->
<div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm hover:shadow transition-shadow">
<div class="flex items-center justify-between mb-2">
<div class="w-9 h-9 rounded-xl bg-red-50 text-red-500 flex items-center justify-center">
<i class="ph ph-credit-card text-lg"></i>
</div>
</div>
<span class="text-[11px] font-medium text-slate-500 block">Outstanding Payment</span>
<div class="text-lg font-bold text-slate-900 mt-0.5 tracking-tight">Rp {{ number_format(($invoiceTotals->total_outstanding ?? 0) / 1000000, 1, ',', '.') }} Jt</div>
<div class="flex items-center gap-1.5 mt-2 text-[11px] text-red-500 font-semibold">
<i class="ph ph-arrow-up text-xs"></i>
<span>8%</span>
<span class="text-[10px] text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
<!-- Card 4: Expense -->
<div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm hover:shadow transition-shadow">
<div class="flex items-center justify-between mb-2">
<div class="w-9 h-9 rounded-xl bg-amber-50 text-amber-700 flex items-center justify-center">
<i class="ph ph-wallet text-lg"></i>
</div>
</div>
<span class="text-[11px] font-medium text-slate-500 block">Expense</span>
<div class="text-lg font-bold text-slate-900 mt-0.5 tracking-tight">Rp {{ number_format(($totalExpense ?? 0) / 1000000, 1, ',', '.') }} Jt</div>
<div class="flex items-center gap-1.5 mt-2 text-[11px] text-emerald-600 font-semibold">
<i class="ph ph-arrow-down text-xs"></i>
<span>6%</span>
<span class="text-[10px] text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
<!-- Card 5: Receivable -->
<div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm hover:shadow transition-shadow">
<div class="flex items-center justify-between mb-2">
<div class="w-9 h-9 rounded-xl bg-orange-50 text-brand-orange flex items-center justify-center">
<i class="ph ph-hand-coins text-lg"></i>
</div>
</div>
<span class="text-[11px] font-medium text-slate-500 block">Receivable</span>
<div class="text-lg font-bold text-slate-900 mt-0.5 tracking-tight">Rp {{ number_format(($invoiceTotals->total_outstanding ?? 0) / 1000000, 1, ',', '.') }} Jt</div>
<div class="flex items-center gap-1.5 mt-2 text-[11px] text-emerald-600 font-semibold">
<i class="ph ph-arrow-down text-xs"></i>
<span>10%</span>
<span class="text-[10px] text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
<!-- Card 6: Net Cash -->
<div class="bg-white rounded-2xl p-4 border border-slate-200/80 shadow-sm hover:shadow transition-shadow">
<div class="flex items-center justify-between mb-2">
<div class="w-9 h-9 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center">
<i class="ph ph-chart-line-up text-lg"></i>
</div>
</div>
<span class="text-[11px] font-medium text-slate-500 block">Net Cash</span>
<div class="text-lg font-bold text-slate-900 mt-0.5 tracking-tight">Rp {{ number_format(($netCash ?? 0) / 1000000, 1, ',', '.') }} Jt</div>
<div class="flex items-center gap-1.5 mt-2 text-[11px] text-emerald-600 font-semibold">
<i class="ph ph-arrow-up text-xs"></i>
<span>22%</span>
<span class="text-[10px] text-slate-400 font-normal">dari bulan lalu</span>
</div>
</div>
</section>
<!-- END: 6 KPI Cards Grid -->
<!-- BEGIN: Visual Charts Grid (3 Columns) -->
<section class="grid grid-cols-1 lg:grid-cols-12 gap-5" data-purpose="charts-section">
<!-- Chart 1: Revenue vs Expense Bar Chart (5 cols) -->
<div class="lg:col-span-5 bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-3">
<h3 class="font-bold text-slate-900 text-sm">Revenue vs Expense</h3>
<div class="flex items-center gap-1 text-[11px] text-slate-500 bg-slate-50 px-2.5 py-1 rounded-lg border border-slate-200 cursor-pointer">
<span>12 bulan terakhir</span>
<i class="ph ph-caret-down text-[10px]"></i>
</div>
</div>
<!-- Legend -->
<div class="flex items-center gap-4 text-[11px] mb-3">
<div class="flex items-center gap-1.5">
<span class="w-2.5 h-2.5 rounded-full bg-brand-orange"></span>
<span class="text-slate-600 font-medium">Revenue (Cash In)</span>
</div>
<div class="flex items-center gap-1.5">
<span class="w-2.5 h-2.5 rounded-full bg-slate-300"></span>
<span class="text-slate-600 font-medium">Expense</span>
</div>
</div>
</div>
<!-- SVG Bar Graphic -->
<div class="relative mt-2">
<div class="absolute left-[30%] -top-8 bg-white border border-slate-200 shadow-md rounded-lg p-2 z-20 text-[10px] leading-tight pointer-events-none">
<div class="font-semibold text-slate-700 mb-1">Periode Aktif</div>
<div class="text-brand-orange font-medium flex items-center gap-1">● Revenue: <span class="font-bold">Rp {{ number_format(($totalCashIn ?? 0) / 1000000, 1, ',', '.') }} Jt</span></div>
<div class="text-slate-500 font-medium flex items-center gap-1">● Expense: <span class="font-bold">Rp {{ number_format(($totalExpense ?? 0) / 1000000, 1, ',', '.') }} Jt</span></div>
</div>
<svg class="w-full h-44 overflow-visible text-[9px] text-slate-400 font-sans" viewbox="0 0 460 170">
<line stroke="#f1f5f9" stroke-width="1" x1="30" x2="450" y1="10" y2="10"></line>
<text fill="#94a3b8" x="2" y="14">400 jt</text>
<line stroke="#f1f5f9" stroke-width="1" x1="30" x2="450" y1="50" y2="50"></line>
<text fill="#94a3b8" x="2" y="54">300 jt</text>
<line stroke="#f1f5f9" stroke-width="1" x1="30" x2="450" y1="90" y2="90"></line>
<text fill="#94a3b8" x="2" y="94">200 jt</text>
<line stroke="#f1f5f9" stroke-width="1" x1="30" x2="450" y1="130" y2="130"></line>
<text fill="#94a3b8" x="2" y="134">100 jt</text>
<line stroke="#e2e8f0" stroke-width="1" x1="30" x2="450" y1="150" y2="150"></line>
<text fill="#94a3b8" x="20" y="154">0</text>
<rect fill="#f95f24" height="90" rx="2" width="7" x="42" y="60"></rect>
<rect fill="#e2e8f0" height="45" rx="2" width="7" x="50" y="105"></rect>
<text fill="#64748b" x="44" y="164">Jan</text>
<rect fill="#f95f24" height="80" rx="2" width="7" x="75" y="70"></rect>
<rect fill="#e2e8f0" height="35" rx="2" width="7" x="83" y="115"></rect>
<text fill="#64748b" x="77" y="164">Feb</text>
<rect fill="#f95f24" height="95" rx="2" width="7" x="108" y="55"></rect>
<rect fill="#e2e8f0" height="50" rx="2" width="7" x="116" y="100"></rect>
<text fill="#64748b" x="110" y="164">Mar</text>
<rect fill="#f95f24" height="115" rx="2" width="7" x="141" y="35"></rect>
<rect fill="#cbd5e1" height="70" rx="2" width="7" x="149" y="80"></rect>
<text fill="#f95f24" font-weight="600" x="143" y="164">Apr</text>
<rect fill="#f95f24" height="80" rx="2" width="7" x="174" y="70"></rect>
<rect fill="#e2e8f0" height="40" rx="2" width="7" x="182" y="110"></rect>
<text fill="#64748b" x="176" y="164">Mei</text>
<rect fill="#f95f24" height="65" rx="2" width="7" x="207" y="85"></rect>
<rect fill="#e2e8f0" height="35" rx="2" width="7" x="215" y="115"></rect>
<text fill="#64748b" x="210" y="164">Jun</text>
<rect fill="#f95f24" height="75" rx="2" width="7" x="240" y="75"></rect>
<rect fill="#e2e8f0" height="45" rx="2" width="7" x="248" y="105"></rect>
<text fill="#64748b" x="244" y="164">Jul</text>
<rect fill="#f95f24" height="105" rx="2" width="7" x="273" y="45"></rect>
<rect fill="#e2e8f0" height="60" rx="2" width="7" x="281" y="90"></rect>
<text fill="#64748b" x="276" y="164">Agu</text>
<rect fill="#f95f24" height="85" rx="2" width="7" x="306" y="65"></rect>
<rect fill="#e2e8f0" height="50" rx="2" width="7" x="314" y="100"></rect>
<text fill="#64748b" x="309" y="164">Sep</text>
<rect fill="#f95f24" height="95" rx="2" width="7" x="339" y="55"></rect>
<rect fill="#e2e8f0" height="55" rx="2" width="7" x="347" y="95"></rect>
<text fill="#64748b" x="343" y="164">Okt</text>
<rect fill="#f95f24" height="80" rx="2" width="7" x="372" y="70"></rect>
<rect fill="#e2e8f0" height="42" rx="2" width="7" x="380" y="108"></rect>
<text fill="#64748b" x="375" y="164">Nov</text>
<rect fill="#f95f24" height="88" rx="2" width="7" x="405" y="62"></rect>
<rect fill="#e2e8f0" height="52" rx="2" width="7" x="413" y="98"></rect>
<text fill="#64748b" x="409" y="164">Des</text>
</svg>
</div>
</div>
<!-- Chart 2: Tren Koleksi Pembayaran Line Chart (4 cols) -->
<div class="lg:col-span-4 bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-3">
<h3 class="font-bold text-slate-900 text-sm">Tren Koleksi Pembayaran</h3>
<div class="flex items-center gap-1 text-[11px] text-slate-500 bg-slate-50 px-2.5 py-1 rounded-lg border border-slate-200 cursor-pointer">
<span>Tahun Ini</span>
<i class="ph ph-caret-down text-[10px]"></i>
</div>
</div>
<div class="flex items-center gap-4 text-[11px] mb-3">
<div class="flex items-center gap-1.5">
<span class="w-2.5 h-2.5 rounded-full bg-brand-orange"></span>
<span class="text-slate-600 font-medium">Jumlah Pembayaran</span>
</div>
<div class="flex items-center gap-1.5">
<span class="w-2.5 h-2.5 rounded-full bg-amber-300"></span>
<span class="text-slate-600 font-medium">Target Koleksi</span>
</div>
</div>
</div>
<div class="relative mt-2">
@php
  $colRateOverall = ($invoiceTotals->total_billing ?? 0) > 0
      ? round((($invoiceTotals->total_paid ?? 0) / $invoiceTotals->total_billing) * 100)
      : 80;
@endphp
<div class="absolute left-[36%] top-2 bg-white border border-slate-200 shadow-md rounded-lg px-2 py-1 z-20 text-[10px] leading-tight text-center pointer-events-none">
<span class="text-slate-400 font-semibold block text-[9px]">Realisasi</span>
<span class="font-bold text-slate-900">Rp {{ number_format(($invoiceTotals->total_paid ?? 0) / 1000000, 1, ',', '.') }} Jt</span>
<span class="text-[9px] text-slate-500 block">({{ $colRateOverall }}% dari billing)</span>
</div>
<svg class="w-full h-44 overflow-visible text-[9px] text-slate-400 font-sans" viewbox="0 0 380 170">
<line stroke="#f1f5f9" stroke-width="1" x1="30" x2="370" y1="10" y2="10"></line>
<text fill="#94a3b8" x="0" y="14">400 jt</text>
<line stroke="#f1f5f9" stroke-width="1" x1="30" x2="370" y1="50" y2="50"></line>
<text fill="#94a3b8" x="0" y="54">300 jt</text>
<line stroke="#f1f5f9" stroke-width="1" x1="30" x2="370" y1="90" y2="90"></line>
<text fill="#94a3b8" x="0" y="94">200 jt</text>
<line stroke="#f1f5f9" stroke-width="1" x1="30" x2="370" y1="130" y2="130"></line>
<text fill="#94a3b8" x="0" y="134">100 jt</text>
<line stroke="#e2e8f0" stroke-width="1" x1="30" x2="370" y1="150" y2="150"></line>
<text fill="#94a3b8" x="18" y="154">0</text>
<path d="M 40 120 L 70 110 L 100 100 L 130 92 L 160 88 L 190 85 L 220 78 L 250 72 L 280 66 L 310 60 L 340 52 L 365 48" fill="none" stroke="#fcd34d" stroke-linecap="round" stroke-width="2"></path>
<path d="M 40 125 L 70 115 L 100 106 L 130 96 L 160 92 L 190 94 L 220 86 L 250 80 L 280 74 L 310 68 L 340 58 L 365 52" fill="none" stroke="#f95f24" stroke-linecap="round" stroke-width="2.5"></path>
<line opacity="0.4" stroke="#f95f24" stroke-dasharray="3 3" x1="130" x2="130" y1="50" y2="150"></line>
<circle cx="40" cy="125" fill="#f95f24" r="3"></circle>
<circle cx="70" cy="115" fill="#f95f24" r="3"></circle>
<circle cx="100" cy="106" fill="#f95f24" r="3"></circle>
<circle cx="130" cy="96" fill="#f95f24" r="4.5" stroke="#fff" stroke-width="2"></circle>
<circle cx="160" cy="92" fill="#f95f24" r="3"></circle>
<circle cx="190" cy="94" fill="#f95f24" r="3"></circle>
<circle cx="220" cy="86" fill="#f95f24" r="3"></circle>
<circle cx="250" cy="80" fill="#f95f24" r="3"></circle>
<circle cx="280" cy="74" fill="#f95f24" r="3"></circle>
<circle cx="310" cy="68" fill="#f95f24" r="3"></circle>
<circle cx="340" cy="58" fill="#f95f24" r="3"></circle>
<circle cx="365" cy="52" fill="#f95f24" r="3"></circle>
<text fill="#64748b" x="34" y="164">Jan</text>
<text fill="#64748b" x="64" y="164">Feb</text>
<text fill="#64748b" x="94" y="164">Mar</text>
<text fill="#f95f24" font-weight="600" x="124" y="164">Apr</text>
<text fill="#64748b" x="154" y="164">Mei</text>
<text fill="#64748b" x="184" y="164">Jun</text>
<text fill="#64748b" x="214" y="164">Jul</text>
<text fill="#64748b" x="244" y="164">Agu</text>
<text fill="#64748b" x="274" y="164">Sep</text>
<text fill="#64748b" x="304" y="164">Okt</text>
<text fill="#64748b" x="334" y="164">Nov</text>
<text fill="#64748b" x="358" y="164">Des</text>
</svg>
</div>
</div>
<!-- Chart 3: Outstanding Billing Donut Chart (3 cols) -->
<div class="lg:col-span-3 bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-2">
<h3 class="font-bold text-slate-900 text-sm">Outstanding Billing</h3>
</div>
</div>
<div class="flex items-center justify-center gap-4 py-2">
<div class="relative w-32 h-32 shrink-0">
<svg class="w-full h-full transform -rotate-90" viewbox="0 0 36 36">
<circle cx="18" cy="18" fill="none" r="14" stroke="#f1f5f9" stroke-width="4.5"></circle>
<circle cx="18" cy="18" fill="none" r="14" stroke="#94a3b8" stroke-dasharray="87.96" stroke-dashoffset="0" stroke-linecap="round" stroke-width="4.5"></circle>
<circle cx="18" cy="18" fill="none" r="14" stroke="#fb923c" stroke-dasharray="87.96" stroke-dashoffset="17.6" stroke-linecap="round" stroke-width="4.5"></circle>
<circle cx="18" cy="18" fill="none" r="14" stroke="#f95f24" stroke-dasharray="87.96" stroke-dashoffset="48.4" stroke-linecap="round" stroke-width="4.5"></circle>
</svg>
<div class="absolute inset-0 flex flex-col items-center justify-center text-center">
<span class="text-xs font-bold text-slate-900">Rp {{ number_format(($invoiceTotals->total_outstanding ?? 0) / 1000000, 1, ',', '.') }} Jt</span>
<span class="text-[9px] text-slate-400 font-medium">Total Outstanding</span>
</div>
</div>
<div class="space-y-2 text-[11px]">
<div>
<div class="flex items-center gap-1.5 font-medium text-slate-700">
<span class="w-2.5 h-2.5 rounded-full bg-brand-orange shrink-0"></span>
<span>Partial / Cicilan</span>
</div>
<div class="pl-4 text-[10px] text-slate-500 font-semibold">Rp {{ number_format(($invoiceTotals->partial_outstanding ?? 0) / 1000000, 1, ',', '.') }} Jt</div>
</div>
<div>
<div class="flex items-center gap-1.5 font-medium text-slate-700">
<span class="w-2.5 h-2.5 rounded-full bg-amber-400 shrink-0"></span>
<span>Unpaid</span>
</div>
<div class="pl-4 text-[10px] text-slate-500 font-semibold">Rp {{ number_format(($invoiceTotals->unpaid_outstanding ?? 0) / 1000000, 1, ',', '.') }} Jt</div>
</div>
<div>
<div class="flex items-center gap-1.5 font-medium text-slate-700">
<span class="w-2.5 h-2.5 rounded-full bg-slate-400 shrink-0"></span>
<span>Overdue</span>
</div>
<div class="pl-4 text-[10px] text-slate-500 font-semibold">Rp {{ number_format(($invoiceTotals->overdue_outstanding ?? 0) / 1000000, 1, ',', '.') }} Jt</div>
</div>
</div>
</div>
</div>
</section>
<!-- END: Visual Charts Grid -->
<!-- BEGIN: Middle Section (Billing Summary Table & Recent Activities) -->
<section class="grid grid-cols-1 lg:grid-cols-12 gap-5" data-purpose="summary-and-activities">
<!-- Summary by Program Table (7 cols) -->
<div class="lg:col-span-7 bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-4">
<h3 class="font-bold text-slate-900 text-sm">Student Billing Summary by Program</h3>
<div class="flex items-center gap-1 text-[11px] text-slate-500 bg-slate-50 px-2.5 py-1 rounded-lg border border-slate-200 cursor-pointer">
<span>Tahun Ini</span>
<i class="ph ph-caret-down text-[10px]"></i>
</div>
</div>
<div class="overflow-x-auto">
<table class="w-full text-left text-xs">
<thead>
<tr class="text-slate-400 border-b border-slate-100 font-medium pb-2 text-[11px]">
<th class="py-2.5 pl-2 font-normal">No</th>
<th class="py-2.5 font-normal">Program</th>
<th class="py-2.5 font-normal">Total Billing</th>
<th class="py-2.5 font-normal">Paid</th>
<th class="py-2.5 font-normal">Outstanding</th>
<th class="py-2.5 pr-2 font-normal">Collection Rate</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-50">
@foreach($programBillingSummary as $idx => $prog)
@php
  $rate = $prog->total_billing > 0 ? round(($prog->total_paid / $prog->total_billing) * 100) : 0;
@endphp
<tr class="hover:bg-slate-50/60 transition-colors">
<td class="py-3 pl-2 text-slate-400">{{ $idx + 1 }}</td>
<td class="py-3 font-medium text-slate-800">{{ $prog->name }}</td>
<td class="py-3 text-slate-600">Rp {{ number_format($prog->total_billing, 0, ',', '.') }}</td>
<td class="py-3 text-slate-600">Rp {{ number_format($prog->total_paid, 0, ',', '.') }}</td>
<td class="py-3 text-slate-600">Rp {{ number_format($prog->total_outstanding, 0, ',', '.') }}</td>
<td class="py-3 pr-2">
<div class="flex items-center gap-2">
<span class="{{ $rate >= 75 ? 'text-emerald-600' : 'text-amber-500' }} font-bold text-[11px] w-7">{{ $rate }}%</span>
<div class="w-20 bg-slate-100 rounded-full h-2 overflow-hidden">
<div class="{{ $rate >= 75 ? 'bg-emerald-500' : 'bg-amber-500' }} h-2 rounded-full" style="width: {{ $rate }}%"></div>
</div>
</div>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
<!-- Recent Activities Card (5 cols) -->
<div class="lg:col-span-5 bg-white rounded-2xl p-5 border border-slate-200/80 shadow-sm flex flex-col justify-between">
<div>
<div class="flex items-center justify-between mb-4">
<h3 class="font-bold text-slate-900 text-sm">Aktivitas Pembayaran Terbaru</h3>
<a class="text-brand-orange hover:text-brand-orangeDark font-medium text-xs flex items-center gap-1" href="{{ route('erp.reports') }}">
<span>Lihat Semua</span>
<i class="ph ph-arrow-right text-xs"></i>
</a>
</div>
<div class="space-y-4">
@foreach($recentPayments as $pay)
<div class="flex items-start justify-between gap-3">
<div class="flex items-start gap-3">
<div class="w-8 h-8 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center shrink-0 mt-0.5">
<i class="ph ph-credit-card text-base"></i>
</div>
<div>
<h4 class="text-xs font-semibold text-slate-800">Pembayaran diterima ({{ $pay->payment_no }})</h4>
<p class="text-[11px] text-slate-500 mt-0.5">Rp {{ number_format($pay->amount, 0, ',', '.') }} dari {{ $pay->full_name }}</p>
<span class="text-[10px] text-slate-400 font-normal">({{ $pay->program_name ?? 'Program Reguler' }} • {{ $pay->payment_method }})</span>
</div>
</div>
<span class="text-[10px] text-slate-400 font-medium shrink-0">{{ $pay->payment_date ? date('d M', strtotime($pay->payment_date)) : 'Hari ini' }}</span>
</div>
@endforeach
</div>
</div>
</div>
</section>
<!-- END: Middle Section -->
<!-- BEGIN: Bottom Section (Daftar Billing & Pembayaran Table) -->
<section class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm" data-purpose="billing-payments-table-section">
<!-- Table Header & Controls -->
<form action="{{ route('erp.finance') }}" method="GET" class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-5">
<h3 class="font-bold text-slate-900 text-base">Daftar Billing &amp; Pembayaran</h3>
<div class="flex flex-wrap items-center gap-3">
<!-- Search bar -->
<div class="relative w-64">
<span class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-slate-400">
<i class="ph ph-magnifying-glass text-xs"></i>
</span>
<input name="q" value="{{ $filters['q'] ?? '' }}" class="w-full bg-[#f8fafc] border border-slate-200 text-xs rounded-xl pl-9 pr-3 py-1.5 text-slate-700 placeholder-slate-400 focus:outline-none focus:border-brand-orange focus:ring-1 focus:ring-brand-orange transition-all" placeholder="Cari invoice, nama siswa, atau program..." type="text"/>
</div>
<!-- Program Filter -->
<div class="relative">
<select name="program_id" onchange="this.form.submit()" class="appearance-none bg-[#f8fafc] border border-slate-200 text-xs text-slate-600 rounded-xl pl-3 pr-8 py-1.5 focus:outline-none focus:border-brand-orange cursor-pointer">
<option value="">Semua Program</option>
@foreach($programs as $pr)
<option value="{{ $pr->id }}" @selected(($filters['program_id'] ?? '') == $pr->id)>{{ $pr->name }}</option>
@endforeach
</select>
<i class="ph ph-caret-down text-[10px] text-slate-400 absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none"></i>
</div>
<!-- Status Filter -->
<div class="relative">
<select name="status" onchange="this.form.submit()" class="appearance-none bg-[#f8fafc] border border-slate-200 text-xs text-slate-600 rounded-xl pl-3 pr-8 py-1.5 focus:outline-none focus:border-brand-orange cursor-pointer">
<option value="">Semua Status</option>
<option value="PAID" @selected(($filters['status'] ?? '') === 'PAID')>Lunas (PAID)</option>
<option value="PARTIAL" @selected(($filters['status'] ?? '') === 'PARTIAL')>Sebagian (PARTIAL)</option>
<option value="OVERDUE" @selected(($filters['status'] ?? '') === 'OVERDUE')>Terlambat (OVERDUE)</option>
<option value="UNPAID" @selected(($filters['status'] ?? '') === 'UNPAID')>Belum Bayar (UNPAID)</option>
</select>
<i class="ph ph-caret-down text-[10px] text-slate-400 absolute right-2.5 top-1/2 -translate-y-1/2 pointer-events-none"></i>
</div>
<!-- Export Button -->
<a href="{{ route('erp.reports.export', ['type' => 'finance']) }}" class="flex items-center gap-1.5 border border-brand-orange text-brand-orange hover:bg-orange-50 font-medium text-xs px-3.5 py-1.5 rounded-xl transition-colors">
<i class="ph ph-export text-xs"></i>
<span>Export CSV</span>
</a>
</div>
</form>
<!-- Invoices Data Table -->
<div class="overflow-x-auto">
<table class="w-full text-left text-xs">
<thead>
<tr class="bg-slate-50 text-slate-400 font-semibold border-y border-slate-100 text-[11px]">
<th class="py-3 px-3">Invoice No</th>
<th class="py-3 px-3">Student Name</th>
<th class="py-3 px-3">Program</th>
<th class="py-3 px-3">Due Date</th>
<th class="py-3 px-3">Amount</th>
<th class="py-3 px-3">Paid</th>
<th class="py-3 px-3">Outstanding</th>
<th class="py-3 px-3 text-center">Status</th>
<th class="py-3 px-3 text-center">Cabang</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100">
@foreach($invoices as $inv)
@php
  $statusMap = [
      'PAID' => ['bg-emerald-50 text-emerald-600 border-emerald-100', 'Lunas'],
      'PARTIAL' => ['bg-amber-50 text-amber-600 border-amber-100', 'Sebagian'],
      'OVERDUE' => ['bg-red-50 text-red-600 border-red-100', 'Terlambat'],
      'UNPAID' => ['bg-slate-100 text-slate-600 border-slate-200', 'Belum Bayar'],
  ];
  [$stClass, $stText] = $statusMap[$inv->status] ?? ['bg-slate-100 text-slate-600 border-slate-200', $inv->status];
@endphp
<tr class="hover:bg-slate-50/60 transition-colors">
<td class="py-3 px-3 font-medium text-slate-700">{{ $inv->invoice_no }}</td>
<td class="py-3 px-3">
<div class="flex items-center gap-2.5">
<div class="w-6 h-6 rounded-full bg-orange-100 text-brand-orange font-bold text-[10px] flex items-center justify-center shrink-0">
  {{ strtoupper(substr($inv->student_name, 0, 2)) }}
</div>
<span class="font-medium text-slate-800">{{ $inv->student_name }}</span>
</div>
</td>
<td class="py-3 px-3 text-slate-600">{{ $inv->program_name ?? 'Admission Fee' }}</td>
<td class="py-3 px-3 text-slate-500">{{ date('d M Y', strtotime($inv->due_date)) }}</td>
<td class="py-3 px-3 font-medium text-slate-800">Rp {{ number_format($inv->total_amount, 0, ',', '.') }}</td>
<td class="py-3 px-3 text-slate-600">Rp {{ number_format($inv->paid_amount, 0, ',', '.') }}</td>
<td class="py-3 px-3 text-slate-500">Rp {{ number_format($inv->outstanding_amount, 0, ',', '.') }}</td>
<td class="py-3 px-3 text-center">
<span class="inline-block px-2.5 py-0.5 rounded-full text-[11px] font-semibold border {{ $stClass }}">
                    {{ $stText }}
                  </span>
</td>
<td class="py-3 px-3 text-center text-slate-500">
  {{ $inv->branch_name }}
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</section>
<!-- END: Bottom Section -->
</main>
</div>

<!-- Modal Buat Invoice / Pembayaran -->
<div id="modalAddInvoice" class="hidden fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-50 flex items-center justify-center p-4">
  <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-md overflow-hidden">
    <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
      <h3 class="text-sm font-extrabold text-slate-900">Buat Invoice &amp; Pembayaran Siswa</h3>
      <button onclick="document.getElementById('modalAddInvoice').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">✕</button>
    </div>
    <form action="{{ route('erp.finance.invoice.store') }}" method="POST" class="p-6 space-y-4 text-xs">
      @csrf
      <div>
        <label class="block font-semibold text-slate-700 mb-1">Pilih Siswa</label>
        <select name="student_id" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
          @foreach($studentsList as $st)
            <option value="{{ $st->id }}">{{ $st->student_no }} - {{ $st->full_name }} ({{ $st->program_name }})</option>
          @endforeach
        </select>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Total Tagihan (Rp)</label>
          <input type="number" name="total_amount" value="8500000" min="100000" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3"/>
        </div>
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Jumlah Dibayar (Rp)</label>
          <input type="number" name="paid_amount" value="8500000" min="0" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3"/>
        </div>
      </div>
      <div class="grid grid-cols-2 gap-3">
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Jatuh Tempo</label>
          <input type="date" name="due_date" value="{{ date('Y-m-d', strtotime('+14 days')) }}" required class="w-full rounded-xl border-slate-200 text-xs py-2 px-3"/>
        </div>
        <div>
          <label class="block font-semibold text-slate-700 mb-1">Metode Pembayaran</label>
          <select name="payment_method" class="w-full rounded-xl border-slate-200 text-xs py-2 px-3">
            <option value="BANK_TRANSFER">Bank Transfer</option>
            <option value="VIRTUAL_ACCOUNT">Virtual Account</option>
            <option value="CASH">Cash / Tunai</option>
          </select>
        </div>
      </div>
      <div class="pt-2 flex justify-end gap-2">
        <button type="button" onclick="document.getElementById('modalAddInvoice').classList.add('hidden')" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 font-semibold">Batal</button>
        <button type="submit" class="px-4 py-2 rounded-xl bg-brand-orange hover:bg-brand-orangeDark text-white font-semibold shadow-sm">Simpan Transaksi</button>
      </div>
    </form>
  </div>
</div>
</body></html>
