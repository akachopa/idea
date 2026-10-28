<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IDEA ERP - Finance Overview</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/lucide@latest"></script>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
          colors: {
            brand: { 50: '#FFF7ED', 100: '#FFEDD5', 500: '#F97316', 600: '#EA580C' }
          }
        }
      }
    }
  </script>
  <style>
    body { background-color: #FAF6F0; color: #1E293B; }
    .custom-shadow { box-shadow: 0 2px 10px -2px rgba(0, 0, 0, 0.04), 0 1px 3px -1px rgba(0, 0, 0, 0.02); }
  </style>
</head>
@php
  $totalBilling = (float) ($invoiceTotals->total_billing ?? 0);
  $totalPaid = (float) ($invoiceTotals->total_paid ?? 0);
  $totalOut = (float) ($invoiceTotals->total_outstanding ?? 0);
@endphp
<body class="antialiased">
  <div class="flex min-h-screen relative">
    <div id="sidebarOverlay" onclick="toggleSidebar()" class="fixed inset-0 bg-black/40 z-40 hidden lg:hidden"></div>

    <!-- SIDEBAR -->
    <aside id="sidebar" class="w-64 bg-[#F7F3EB] border-r border-[#EBE5DA] flex flex-col justify-between fixed lg:sticky top-0 h-screen z-50 transition-transform duration-300 -translate-x-full lg:translate-x-0 shrink-0 select-none overflow-y-auto">
      <div>
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
          <button onclick="toggleSidebar()" class="text-slate-400 hover:text-slate-600"><i data-lucide="chevron-left" class="w-5 h-5"></i></button>
        </div>

        <nav class="p-3.5 space-y-1 text-sm font-semibold">
          <a href="{{ route('erp.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="layout-grid" class="w-5 h-5"></i><span>Dashboard</span></a>
          <a href="{{ route('erp.admission') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="user-plus" class="w-5 h-5"></i><span>Admission</span></a>
          <a href="{{ route('erp.finance') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-brand-500 to-amber-500 text-white shadow-md shadow-brand-500/20"><i data-lucide="coins" class="w-5 h-5"></i><span>Finance</span></a>
          <a href="{{ route('erp.students') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="users" class="w-5 h-5"></i><span>Student Management</span></a>
          <a href="{{ route('erp.assessments') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="file-check-2" class="w-5 h-5"></i><span>Assessment &amp; Certification</span></a>
          <a href="{{ route('erp.placements') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="briefcase" class="w-5 h-5"></i><span>Career &amp; Placement</span></a>
          <a href="{{ route('erp.partners') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="handshake" class="w-5 h-5"></i><span>Partners</span></a>
          <a href="{{ route('erp.alumni') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="graduation-cap" class="w-5 h-5"></i><span>Alumni</span></a>
          <a href="{{ route('erp.reports') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="bar-chart-3" class="w-5 h-5"></i><span>Reports</span></a>
        </nav>
      </div>

      <div class="p-3.5">
        <div class="relative rounded-2xl bg-gradient-to-b from-[#FCEAD2] to-[#F8DEC0] p-4 overflow-hidden border border-amber-200/60">
          <div class="flex justify-center mb-2">
            <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=300&q=80" alt="Global Talent" class="w-28 h-28 object-cover rounded-full border-4 border-white/80 shadow-sm" />
          </div>
          <h4 class="font-extrabold text-brand-600 text-sm leading-snug">Membangun<br>Talenta Global<br>dari Indonesia</h4>
          <p class="text-[11px] text-slate-600 mt-1.5 leading-relaxed">Pendidikan, peluang dan masa depan yang lebih baik.</p>
          <a href="{{ route('erp.reports') }}" class="mt-3 w-full py-2 px-3 bg-gradient-to-r from-brand-500 to-amber-500 text-white font-bold text-xs rounded-full flex items-center justify-center gap-1.5 shadow-sm">
            <span>Bersama IDEA ERP</span><i data-lucide="arrow-right" class="w-3.5 h-3.5"></i>
          </a>
        </div>
      </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col min-w-0">
      <header class="h-20 bg-[#FAF6F0]/90 backdrop-blur-sm sticky top-0 z-30 px-4 lg:px-8 flex items-center justify-between border-b border-[#EBE5DA]/70">
        <div class="flex items-center gap-3 flex-1 max-w-xl">
          <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg bg-white border border-slate-200 text-slate-700"><i data-lucide="menu" class="w-5 h-5"></i></button>
          <form action="{{ route('erp.finance') }}" method="GET" class="relative w-full">
            <i data-lucide="search" class="w-4 h-4 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2"></i>
            <input type="text" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Cari data siswa, program, pembayaran, atau lainnya..." class="w-full pl-11 pr-4 py-2.5 text-sm bg-[#F3EFE6] border border-[#E6DFD3] rounded-full focus:outline-none focus:bg-white focus:border-brand-500 transition" />
          </form>
        </div>
        <div class="flex items-center gap-4 ml-4">
          <button class="relative p-2.5 rounded-full bg-white border border-slate-200/80 text-slate-700"><i data-lucide="bell" class="w-5 h-5"></i><span class="w-2.5 h-2.5 bg-brand-500 rounded-full absolute top-1.5 right-1.5 border-2 border-white"></span></button>
          <div class="flex items-center gap-3 pl-2">
            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=120&q=80" class="w-10 h-10 rounded-full object-cover border-2 border-white shadow-sm" />
            <div class="hidden sm:block">
              <div class="text-sm font-bold text-slate-800 leading-none">{{ $currentUser->full_name ?? 'Sari Anggraini' }}</div>
              <div class="text-xs text-slate-500 mt-1">{{ $currentUser->position_name ?? 'Head of Administration' }}</div>
            </div>
            <i data-lucide="chevron-down" class="w-4 h-4 text-slate-400 hidden sm:block"></i>
          </div>
        </div>
      </header>

      <!-- HERO -->
      <div class="bg-gradient-to-r from-[#FAF6F0] via-[#FAF6F0]/90 to-[#F3E9D8] border-b border-[#EBE5DA]/60 px-4 lg:px-8 py-6">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
          <div>
            <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Finance Overview</h1>
            <p class="text-sm text-slate-600 mt-1">Ringkasan keuangan, pembayaran, dan status penagihan IDEA ERP.</p>
          </div>
          <div class="flex items-center gap-8">
            <div class="text-left md:text-right">
              <div class="text-sm font-bold text-slate-800">Senin, 21 Apr 2025</div>
              <div class="text-xs text-slate-500 mt-0.5">Kelola keuangan hari ini untuk pendidikan yang lebih baik esok hari.</div>
            </div>
            <div class="hidden xl:block pl-6 border-l border-slate-300/80 text-xs font-semibold text-slate-700 leading-snug">
              People<br>Education<br>Opportunities<br><span class="text-brand-600 font-bold">A Brighter Tomorrow</span>
            </div>
          </div>
        </div>
      </div>

      <!-- MAIN -->
      <main class="p-4 lg:p-8 space-y-6 max-w-[1600px] w-full mx-auto">
        @if(session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-2xl text-xs font-semibold flex items-center justify-between custom-shadow">
          <span>{{ session('success') }}</span>
          <button onclick="this.parentElement.remove()" class="text-emerald-600 hover:text-emerald-900">✕</button>
        </div>
        @endif

        <!-- 6 KPI CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="receipt" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Student Billing</div><div class="text-lg font-extrabold text-slate-900 mt-0.5">Rp {{ number_format($totalBilling / 1000000, 1, ',', '.') }} Jt</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 12% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="coins" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Cash In</div><div class="text-lg font-extrabold text-slate-900 mt-0.5">Rp {{ number_format($totalCashIn / 1000000, 1, ',', '.') }} Jt</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 18% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="credit-card" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Outstanding Payment</div><div class="text-lg font-extrabold text-slate-900 mt-0.5">Rp {{ number_format($totalOut / 1000000, 1, ',', '.') }} Jt</div><div class="text-[11px] font-semibold text-red-500 mt-1">↑ 8% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="wallet" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Expense</div><div class="text-lg font-extrabold text-slate-900 mt-0.5">Rp {{ number_format($totalExpense / 1000000, 1, ',', '.') }} Jt</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↓ 6% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="hand-coins" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Receivable</div><div class="text-lg font-extrabold text-slate-900 mt-0.5">Rp {{ number_format($totalOut / 1000000, 1, ',', '.') }} Jt</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↓ 10% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="bar-chart-2" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Net Cash</div><div class="text-lg font-extrabold text-slate-900 mt-0.5">Rp {{ number_format($netCash / 1000000, 1, ',', '.') }} Jt</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 22% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
        </div>

        <!-- ROW 2: 3 CHARTS -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
          <!-- Revenue vs Expense -->
          <div class="lg:col-span-5 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-2">
              <h3 class="font-bold text-slate-800 text-base">Revenue vs Expense</h3>
              <span class="text-xs text-slate-500">12 bulan terakhir ▾</span>
            </div>
            <div class="flex items-center gap-4 text-xs mb-4">
              <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-brand-500"></span>Revenue (Cash In)</span>
              <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-orange-200"></span>Expense</span>
            </div>
            <div class="h-44 flex items-end justify-between gap-2 pt-4 px-2 border-b border-slate-100">
              <div class="flex items-end gap-1 flex-1"><div class="w-full bg-brand-500 h-20 rounded-t"></div><div class="w-full bg-orange-200 h-14 rounded-t"></div></div>
              <div class="flex items-end gap-1 flex-1"><div class="w-full bg-brand-500 h-20 rounded-t"></div><div class="w-full bg-orange-200 h-14 rounded-t"></div></div>
              <div class="flex items-end gap-1 flex-1"><div class="w-full bg-brand-500 h-24 rounded-t"></div><div class="w-full bg-orange-200 h-16 rounded-t"></div></div>
              <div class="flex items-end gap-1 flex-1"><div class="w-full bg-brand-500 h-28 rounded-t"></div><div class="w-full bg-orange-200 h-16 rounded-t"></div></div>
              <div class="flex items-end gap-1 flex-1"><div class="w-full bg-brand-500 h-20 rounded-t"></div><div class="w-full bg-orange-200 h-12 rounded-t"></div></div>
              <div class="flex items-end gap-1 flex-1"><div class="w-full bg-brand-500 h-24 rounded-t"></div><div class="w-full bg-orange-200 h-14 rounded-t"></div></div>
              <div class="flex items-end gap-1 flex-1"><div class="w-full bg-brand-500 h-20 rounded-t"></div><div class="w-full bg-orange-200 h-12 rounded-t"></div></div>
              <div class="flex items-end gap-1 flex-1"><div class="w-full bg-brand-500 h-24 rounded-t"></div><div class="w-full bg-orange-200 h-16 rounded-t"></div></div>
              <div class="flex items-end gap-1 flex-1"><div class="w-full bg-brand-500 h-28 rounded-t"></div><div class="w-full bg-orange-200 h-16 rounded-t"></div></div>
              <div class="flex items-end gap-1 flex-1"><div class="w-full bg-brand-500 h-24 rounded-t"></div><div class="w-full bg-orange-200 h-14 rounded-t"></div></div>
              <div class="flex items-end gap-1 flex-1"><div class="w-full bg-brand-500 h-28 rounded-t"></div><div class="w-full bg-orange-200 h-16 rounded-t"></div></div>
              <div class="flex items-end gap-1 flex-1"><div class="w-full bg-brand-500 h-24 rounded-t"></div><div class="w-full bg-orange-200 h-16 rounded-t"></div></div>
            </div>
          </div>

          <!-- Tren Koleksi Pembayaran -->
          <div class="lg:col-span-4 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-2">
              <h3 class="font-bold text-slate-800 text-base">Tren Koleksi Pembayaran</h3>
              <span class="text-xs text-slate-500">Tahun Ini ▾</span>
            </div>
            <div class="flex items-center gap-4 text-xs mb-3">
              <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-brand-500"></span>Jumlah Pembayaran</span>
              <span class="flex items-center gap-1.5"><span class="w-2.5 h-2.5 rounded-full bg-orange-300"></span>Target Koleksi</span>
            </div>
            <svg viewBox="0 0 400 150" class="w-full h-44">
              <polyline fill="none" stroke="#FDBA74" stroke-width="2" stroke-dasharray="4,4" points="20,115 55,105 90,95 125,85 160,92 195,88 230,82 265,78 300,72 335,68 370,60" />
              <polyline fill="none" stroke="#F97316" stroke-width="2.5" points="20,105 55,92 90,82 125,70 160,82 195,78 230,72 265,68 300,62 335,55 370,45" />
            </svg>
          </div>

          <!-- Outstanding Billing Donut -->
          <div class="lg:col-span-3 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <h3 class="font-bold text-slate-800 text-base mb-4">Outstanding Billing</h3>
            <div class="flex items-center justify-between gap-3 h-44">
              <div class="w-32 h-32 rounded-full flex items-center justify-center shrink-0" style="background: conic-gradient(#F97316 0% 45%, #FB923C 45% 80%, #94A3B8 80% 100%);">
                <div class="w-22 h-22 w-[88px] h-[88px] bg-white rounded-full flex flex-col items-center justify-center text-center">
                  <span class="text-sm font-extrabold text-slate-900">Rp {{ number_format($totalOut / 1000000, 1, ',', '.') }} Jt</span>
                  <span class="text-[10px] text-slate-400">Total<br>Outstanding</span>
                </div>
              </div>
              <div class="space-y-2 text-xs">
                <div><span class="inline-block w-2 h-2 rounded-full bg-brand-500 mr-1.5"></span>Belum Jatuh Tempo <b>45%</b><div class="text-[10px] text-slate-400 pl-3.5">(Rp {{ number_format(($invoiceTotals->partial_outstanding ?? 0) / 1000000, 1, ',', '.') }} Jt)</div></div>
                <div><span class="inline-block w-2 h-2 rounded-full bg-orange-400 mr-1.5"></span>Jatuh Tempo <b>35%</b><div class="text-[10px] text-slate-400 pl-3.5">(Rp {{ number_format(($invoiceTotals->unpaid_outstanding ?? 0) / 1000000, 1, ',', '.') }} Jt)</div></div>
                <div><span class="inline-block w-2 h-2 rounded-full bg-slate-400 mr-1.5"></span>Terlambat <b>20%</b><div class="text-[10px] text-slate-400 pl-3.5">(Rp {{ number_format(($invoiceTotals->overdue_outstanding ?? 0) / 1000000, 1, ',', '.') }} Jt)</div></div>
              </div>
            </div>
          </div>
        </div>

        <!-- ROW 3: SUMMARY BY PROGRAM & AKTIVITAS TERBARU -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
          <div class="lg:col-span-7 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-base">Student Billing Summary by Program</h3>
              <span class="text-xs text-slate-500">Tahun Ini ▾</span>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-left text-xs">
                <thead>
                  <tr class="bg-[#F5F1E8] text-slate-600 font-bold">
                    <th class="py-2.5 px-3 rounded-l-lg">No</th><th class="py-2.5 px-3">Program</th><th class="py-2.5 px-3">Total Billing</th><th class="py-2.5 px-3">Paid</th><th class="py-2.5 px-3">Outstanding</th><th class="py-2.5 px-3 rounded-r-lg">Collection Rate</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                  @foreach($programBillingSummary as $idx => $pBill)
                  @php
                    $cRate = $pBill->total_billing > 0 ? (int) round(($pBill->total_paid / $pBill->total_billing) * 100) : 100;
                  @endphp
                  <tr>
                    <td class="py-3 px-3">{{ $idx + 1 }}</td>
                    <td class="py-3 px-3 font-bold">{{ $pBill->name }}</td>
                    <td class="py-3 px-3">Rp {{ number_format($pBill->total_billing, 0, ',', '.') }}</td>
                    <td class="py-3 px-3">Rp {{ number_format($pBill->total_paid, 0, ',', '.') }}</td>
                    <td class="py-3 px-3">Rp {{ number_format($pBill->total_outstanding, 0, ',', '.') }}</td>
                    <td class="py-3 px-3 flex items-center gap-2">
                      <span class="{{ $cRate >= 75 ? 'text-emerald-600' : 'text-brand-600' }} font-bold">{{ $cRate }}%</span>
                      <div class="w-20 h-2 bg-slate-100 rounded-full"><div class="{{ $cRate >= 75 ? 'bg-emerald-500' : 'bg-brand-500' }} h-full rounded-full" style="width: {{ $cRate }}%"></div></div>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="lg:col-span-5 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-base">Aktivitas Terbaru</h3>
              <a href="{{ route('erp.reports') }}" class="text-xs font-bold text-brand-600">Lihat Semua →</a>
            </div>
            <div class="space-y-3.5 text-xs">
              @foreach($recentPayments as $pay)
              <div class="flex justify-between">
                <div><b>Pembayaran diterima ({{ $pay->payment_no }})</b><div class="text-slate-500">Rp {{ number_format($pay->amount, 0, ',', '.') }} dari {{ $pay->full_name }} ({{ $pay->program_name ?? 'Program' }})</div></div>
                <span class="text-slate-400">{{ date('d M', strtotime($pay->payment_date)) }}</span>
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- ROW 4: DAFTAR BILLING & PEMBAYARAN -->
        <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
          <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
            <h3 class="font-bold text-slate-800 text-base">Daftar Billing &amp; Pembayaran</h3>
            <form action="{{ route('erp.finance') }}" method="GET" class="flex flex-wrap items-center gap-2 text-xs">
              <input type="text" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Cari invoice, nama siswa, atau program..." class="px-3 py-2 border border-slate-200 rounded-xl bg-slate-50 w-60" />
              <select name="program_id" onchange="this.form.submit()" class="px-3 py-2 border border-slate-200 rounded-xl bg-slate-50">
                <option value="">Semua Program</option>
                @foreach($programs as $pr)
                <option value="{{ $pr->id }}" @selected(($filters['program_id'] ?? '') == $pr->id)>{{ $pr->name }}</option>
                @endforeach
              </select>
              <select name="status" onchange="this.form.submit()" class="px-3 py-2 border border-slate-200 rounded-xl bg-slate-50">
                <option value="">Semua Status</option>
                <option value="PAID" @selected(($filters['status'] ?? '') === 'PAID')>Lunas</option>
                <option value="PARTIAL" @selected(($filters['status'] ?? '') === 'PARTIAL')>Sebagian</option>
                <option value="OVERDUE" @selected(($filters['status'] ?? '') === 'OVERDUE')>Terlambat</option>
              </select>
              <a href="{{ route('erp.reports.export', ['type' => 'finance']) }}" class="px-3.5 py-2 border border-brand-200 text-brand-600 font-bold rounded-xl bg-brand-50">↓ Export</a>
              <button type="button" onclick="document.getElementById('modalAddInvoice').classList.remove('hidden')" class="px-3.5 py-2 bg-brand-500 text-white font-bold rounded-xl">+ Buat Invoice</button>
            </form>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
              <thead>
                <tr class="bg-[#F5F1E8] text-slate-600 font-bold">
                  <th class="py-3 px-3 rounded-l-lg">Invoice No</th><th class="py-3 px-3">Student Name</th><th class="py-3 px-3">Program</th><th class="py-3 px-3">Due Date</th><th class="py-3 px-3">Amount</th><th class="py-3 px-3">Paid</th><th class="py-3 px-3">Outstanding</th><th class="py-3 px-3 text-center">Status</th><th class="py-3 px-3 rounded-r-lg text-center">Aksi</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100 font-medium">
                @foreach($invoices as $inv)
                <tr>
                  <td class="py-3 px-3">{{ $inv->invoice_no }}</td>
                  <td class="py-3 px-3 font-bold">{{ $inv->student_name }}</td>
                  <td class="py-3 px-3">{{ $inv->program_name ?? 'Hospitality' }}</td>
                  <td class="py-3 px-3">{{ date('d M Y', strtotime($inv->due_date)) }}</td>
                  <td class="py-3 px-3">Rp {{ number_format($inv->total_amount, 0, ',', '.') }}</td>
                  <td class="py-3 px-3">Rp {{ number_format($inv->paid_amount, 0, ',', '.') }}</td>
                  <td class="py-3 px-3">Rp {{ number_format($inv->outstanding_amount, 0, ',', '.') }}</td>
                  <td class="py-3 px-3 text-center">
                    @if($inv->status === 'PAID')
                      <span class="px-3 py-0.5 rounded-full bg-emerald-50 text-emerald-600 font-bold">Lunas</span>
                    @elseif($inv->status === 'PARTIAL')
                      <span class="px-3 py-0.5 rounded-full bg-orange-50 text-brand-600 font-bold">Sebagian</span>
                    @else
                      <span class="px-3 py-0.5 rounded-full bg-red-50 text-red-500 font-bold">Terlambat</span>
                    @endif
                  </td>
                  <td class="py-3 px-3 text-center">•••</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>

  <!-- Modal Buat Invoice -->
  <div id="modalAddInvoice" class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-md overflow-hidden">
      <div class="p-4 border-b border-slate-100 flex items-center justify-between">
        <h3 class="text-sm font-extrabold text-slate-900">Catat Invoice &amp; Pembayaran Siswa</h3>
        <button onclick="document.getElementById('modalAddInvoice').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">✕</button>
      </div>
      <form action="{{ route('erp.finance.invoice.store') }}" method="POST" class="p-5 space-y-3.5 text-xs">
        @csrf
        <div>
          <label class="block font-semibold text-slate-600 mb-1">Pilih Siswa</label>
          <select name="student_id" required class="w-full px-3 py-2 border border-slate-200 rounded-xl">
            @foreach($studentsList as $st)
              <option value="{{ $st->id }}">{{ $st->student_no }} - {{ $st->full_name }} ({{ $st->program_name }})</option>
            @endforeach
          </select>
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Total Tagihan (Rp)</label>
            <input name="total_amount" type="number" value="18000000" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" />
          </div>
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Jumlah Dibayar (Rp)</label>
            <input name="paid_amount" type="number" value="18000000" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" />
          </div>
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Jatuh Tempo</label>
            <input name="due_date" type="date" value="{{ date('Y-m-d', strtotime('+30 days')) }}" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" />
          </div>
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Metode Pembayaran</label>
            <select name="payment_method" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
              <option value="BANK_TRANSFER">Bank Transfer</option>
              <option value="VIRTUAL_ACCOUNT">Virtual Account</option>
              <option value="QRIS">QRIS</option>
            </select>
          </div>
        </div>
        <div class="pt-2 flex justify-end gap-2">
          <button type="button" onclick="document.getElementById('modalAddInvoice').classList.add('hidden')" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 font-semibold">Batal</button>
          <button type="submit" class="px-4 py-2 rounded-xl bg-brand-500 hover:bg-brand-600 text-white font-semibold shadow-sm">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    lucide.createIcons();
    function toggleSidebar() {
      document.getElementById('sidebar').classList.toggle('-translate-x-full');
      document.getElementById('sidebarOverlay').classList.toggle('hidden');
    }
  </script>
</body>
</html>
