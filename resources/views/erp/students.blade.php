<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IDEA ERP - Student Management</title>
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
  $avatars = [
    'https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=80&q=80',
    'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=80&q=80',
    'https://images.unsplash.com/photo-1494790108377-be9c29b29330?auto=format&fit=crop&w=80&q=80',
    'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=80&q=80',
    'https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=80&q=80',
  ];
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
          <a href="{{ route('erp.finance') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="coins" class="w-5 h-5"></i><span>Finance</span></a>
          <a href="{{ route('erp.students') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-brand-500 to-amber-500 text-white shadow-md shadow-brand-500/20"><i data-lucide="users" class="w-5 h-5"></i><span>Student Management</span></a>
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
          <form action="{{ route('erp.students') }}" method="GET" class="relative w-full">
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
            <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Student Management</h1>
            <p class="text-sm text-slate-600 mt-1">Kelola data siswa, pantau perkembangan, dan dukung perjalanan mereka bersama IDEA ERP.</p>
          </div>
          <div class="flex items-center gap-8">
            <div class="text-left md:text-right">
              <div class="text-sm font-bold text-slate-800">Senin, 21 Apr 2025</div>
              <div class="text-xs text-slate-500 mt-0.5">Semangat untuk hari yang produktif!</div>
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
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="users" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Active Students</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['active_students'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 5% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="graduation-cap" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">New Enrollment</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['new_enrollment'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 18% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="bar-chart-2" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Attendance Rate</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['attendance_rate'] }}%</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 3% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="book-open" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Training Progress</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['training_progress'] }}%</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 8% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="home" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Students in Dormitory</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['dormitory_students'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 6% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="award" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Graduation Ready</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['graduation_ready'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 25% <span class="text-slate-400 font-normal">dari bulan lalu</span></div></div>
          </div>
        </div>

        <!-- FILTER BAR -->
        <form action="{{ route('erp.students') }}" method="GET" class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex flex-wrap items-center justify-between gap-3 text-xs">
          <div class="flex flex-wrap items-center gap-3">
            <span class="font-bold text-slate-700">Filter:</span>
            <select name="branch_id" onchange="this.form.submit()" class="px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl font-semibold">
              <option value="">📍 Semua Cabang</option>
              @foreach($branches as $b)
                <option value="{{ $b->id }}" @selected(($filters['branch_id'] ?? '') == $b->id)>{{ $b->name }}</option>
              @endforeach
            </select>
            <select name="batch_id" onchange="this.form.submit()" class="px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl font-semibold">
              <option value="">📅 Semua Batch</option>
              @foreach($batches as $bt)
                <option value="{{ $bt->id }}" @selected(($filters['batch_id'] ?? '') == $bt->id)>{{ $bt->name }}</option>
              @endforeach
            </select>
            <select name="program_id" onchange="this.form.submit()" class="px-3.5 py-2 bg-slate-50 border border-slate-200 rounded-xl font-semibold">
              <option value="">🎓 Semua Program</option>
              @foreach($programs as $pr)
                <option value="{{ $pr->id }}" @selected(($filters['program_id'] ?? '') == $pr->id)>{{ $pr->name }}</option>
              @endforeach
            </select>
          </div>
          <div class="flex items-center gap-3 flex-1 sm:flex-initial justify-end">
            <a href="{{ route('erp.students') }}" class="font-bold text-brand-600 hover:underline">Reset Filter</a>
            <div class="relative w-64">
              <i data-lucide="search" class="w-3.5 h-3.5 text-slate-400 absolute left-3 top-1/2 -translate-y-1/2"></i>
              <input type="text" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Cari nama siswa, ID, atau program..." class="w-full pl-9 pr-3 py-2 bg-slate-50 border border-slate-200 rounded-xl" />
            </div>
          </div>
        </form>

        <!-- MIDDLE GRID: SCHEDULE + CHARTS + ACTIVITIES -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
          <!-- Jadwal Kelas Minggu Ini -->
          <div class="lg:col-span-5 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-3">
              <h3 class="font-bold text-slate-800 text-base">Jadwal Kelas Minggu Ini</h3>
              <a href="{{ route('erp.students') }}" class="text-xs font-bold text-brand-600">Lihat Semua →</a>
            </div>
            <div class="flex items-center justify-center gap-4 text-xs font-bold text-slate-700 mb-4">
              <button class="p-1 rounded hover:bg-slate-100">‹</button>
              <span>21 – 27 Apr 2025</span>
              <button class="p-1 rounded hover:bg-slate-100">›</button>
            </div>
            <div class="overflow-x-auto">
              <div class="min-w-[420px]">
                <div class="grid grid-cols-8 text-center text-[11px] text-slate-500 pb-2 border-b border-slate-100">
                  <div></div>
                  <div><b class="text-slate-700">Sen</b><br>21 Apr</div>
                  <div><b class="text-slate-700">Sel</b><br>22 Apr</div>
                  <div><b class="text-slate-700">Rab</b><br>23 Apr</div>
                  <div><b class="text-slate-700">Kam</b><br>24 Apr</div>
                  <div><b class="text-slate-700">Jum</b><br>25 Apr</div>
                  <div><b class="text-slate-700">Sab</b><br>26 Apr</div>
                  <div><b class="text-slate-700">Min</b><br>27 Apr</div>
                </div>
                <!-- Rows -->
                <div class="grid grid-cols-8 items-center text-[10px] py-3 border-b border-slate-50 gap-1">
                  <div class="text-slate-400">08:00</div>
                  <div class="col-span-2 bg-orange-100 text-brand-600 font-bold p-2 rounded-lg">Hospitality<br>Basic</div>
                  <div></div>
                  <div class="col-span-2 bg-orange-50 text-brand-600 font-bold p-2 rounded-lg">F&amp;B Service</div>
                  <div class="col-span-2"></div>
                </div>
                <div class="grid grid-cols-8 items-center text-[10px] py-3 border-b border-slate-50 gap-1">
                  <div class="text-slate-400">10:00</div>
                  <div class="col-span-2"></div>
                  <div class="col-span-2 bg-blue-50 text-blue-600 font-bold p-2 rounded-lg">Culinary<br>Practical</div>
                  <div></div>
                  <div class="col-span-2 bg-red-50 text-red-600 font-bold p-2 rounded-lg">Japanese<br>Language</div>
                </div>
                <div class="grid grid-cols-8 items-center text-[10px] py-3 border-b border-slate-50 gap-1">
                  <div class="text-slate-400">13:00</div>
                  <div></div>
                  <div class="col-span-3 bg-emerald-50 text-emerald-700 font-bold p-2 rounded-lg">English<br>Communication</div>
                  <div class="col-span-3"></div>
                </div>
                <div class="grid grid-cols-8 items-center text-[10px] py-3 gap-1">
                  <div class="text-slate-400">15:00</div>
                  <div></div>
                  <div class="col-span-2 bg-purple-50 text-purple-700 font-bold p-2 rounded-lg">Housekeeping<br>Training</div>
                  <div class="col-span-4"></div>
                </div>
              </div>
            </div>
          </div>

          <!-- Middle Column: Training Progress + Distribusi Siswa -->
          <div class="lg:col-span-4 space-y-6">
            <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
              <div class="flex items-center justify-between mb-3">
                <h3 class="font-bold text-slate-800 text-sm">Training Progress per Program</h3>
                <span class="text-xs text-slate-500">Tahun Ini ▾</span>
              </div>
              @php
                $barColors = ['bg-brand-500', 'bg-orange-400', 'bg-orange-300', 'bg-amber-700/60', 'bg-orange-200'];
              @endphp
              <div class="h-36 flex items-end justify-between gap-2.5 pt-4 px-2 border-b border-slate-100 text-[10px]">
                @foreach($programStats as $idx => $pStat)
                @php
                  $hPx = max(36, (int) round(($pStat->avg_progress / 100) * 100));
                @endphp
                <div class="flex flex-col items-center flex-1">
                  <b class="mb-1">{{ $pStat->avg_progress }}%</b>
                  <div class="w-full {{ $barColors[$idx % count($barColors)] }} rounded-t" style="height: {{ $hPx }}px;"></div>
                  <span class="mt-1.5 text-slate-500 truncate max-w-[60px]">{{ explode(' ', $pStat->name)[0] }}</span>
                </div>
                @endforeach
              </div>
            </div>

            <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
              <h3 class="font-bold text-slate-800 text-sm mb-3">Distribusi Siswa per Program</h3>
              @php
                $totalStdSum = max(1, $programStats->sum('student_count'));
                $dotColors = ['bg-brand-500', 'bg-orange-400', 'bg-orange-300', 'bg-amber-700', 'bg-orange-200'];
              @endphp
              <div class="flex items-center justify-between gap-4">
                <div class="w-28 h-28 rounded-full flex items-center justify-center shrink-0" style="background: conic-gradient(#F97316 0% 35%, #FB923C 35% 60%, #FDBA74 60% 75%, #B45309 75% 89%, #FED7AA 89% 100%);">
                  <div class="w-20 h-20 bg-white rounded-full flex flex-col items-center justify-center text-center">
                    <span class="text-[10px] text-slate-400">Total</span>
                    <span class="text-base font-extrabold text-slate-900">{{ $kpis['new_enrollment'] }}</span>
                    <span class="text-[10px] text-slate-400">Siswa</span>
                  </div>
                </div>
                <div class="space-y-1.5 text-xs flex-1">
                  @foreach($programStats as $idx => $pStat)
                  @php
                    $pct = (int) round(($pStat->student_count / $totalStdSum) * 100);
                  @endphp
                  <div class="flex justify-between">
                    <span><span class="inline-block w-2 h-2 rounded-full {{ $dotColors[$idx % count($dotColors)] }} mr-1.5"></span>{{ explode(' ', $pStat->name)[0] }}</span>
                    <b>{{ $pct }}% <span class="text-slate-400 font-normal">({{ $pStat->student_count }})</span></b>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>

          <!-- Right Column: Aktivitas & Notifikasi Terbaru -->
          <div class="lg:col-span-3 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-sm">Aktivitas &amp; Notifikasi Terbaru</h3>
              <a href="{{ route('erp.reports') }}" class="text-xs font-bold text-brand-600">Lihat Semua →</a>
            </div>
            <div class="space-y-3.5 text-xs">
              <div class="flex justify-between gap-2"><div><b>Pendaftaran siswa baru</b><div class="text-slate-500 text-[11px]">Andi Wijaya terdaftar pada program Hospitality (Batch Sep 2025)</div></div><span class="text-slate-400 text-[10px]">10:24</span></div>
              <div class="flex justify-between gap-2"><div><b>Kehadiran kelas</b><div class="text-slate-500 text-[11px]">Tingkat kehadiran program Culinary minggu ini mencapai 92%</div></div><span class="text-slate-400 text-[10px]">09:18</span></div>
              <div class="flex justify-between gap-2"><div><b>Progres pelatihan meningkat</b><div class="text-slate-500 text-[11px]">Rata-rata progress program Hospitality naik 8% dari bulan lalu</div></div><span class="text-slate-400 text-[10px]">08:45</span></div>
              <div class="flex justify-between gap-2"><div><b>Penempatan asrama</b><div class="text-slate-500 text-[11px]">Siti Rahma ditempatkan di Dormitory A (kamar 204)</div></div><span class="text-slate-400 text-[10px]">19 Apr</span></div>
              <div class="flex justify-between gap-2"><div><b>Sertifikat diterbitkan</b><div class="text-slate-500 text-[11px]">5 siswa telah menyelesaikan modul Housekeeping Basic</div></div><span class="text-slate-400 text-[10px]">19 Apr</span></div>
              <div class="flex justify-between gap-2"><div><b class="text-red-600">Perlu perhatian</b><div class="text-slate-500 text-[11px]">3 siswa dengan kehadiran di bawah 75%</div></div><span class="text-slate-400 text-[10px]">19 Apr</span></div>
            </div>
          </div>
        </div>

        <!-- DAFTAR SISWA TABLE -->
        <div class="bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
          <div class="flex items-center justify-between mb-4">
            <h3 class="font-bold text-slate-800 text-base">Daftar Siswa</h3>
            <div class="flex items-center gap-2 text-xs">
              <a href="{{ route('erp.reports.export', ['type' => 'students']) }}" class="px-3.5 py-2 border border-slate-200 rounded-xl font-bold text-slate-700 bg-slate-50">↓ Export</a>
              <button onclick="document.getElementById('modalAddStudent').classList.remove('hidden')" class="px-4 py-2 bg-brand-500 text-white rounded-xl font-bold">+ Tambah Siswa</button>
            </div>
          </div>
          <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
              <thead>
                <tr class="bg-[#F5F1E8] text-slate-600 font-bold">
                  <th class="py-3 px-3 rounded-l-lg"><input type="checkbox"/></th>
                  <th class="py-3 px-3">Student ID</th><th class="py-3 px-3">Nama</th><th class="py-3 px-3">Program</th><th class="py-3 px-3">Batch</th><th class="py-3 px-3">Attendance</th><th class="py-3 px-3">Training Progress</th><th class="py-3 px-3 text-center">Status</th><th class="py-3 px-3 rounded-r-lg text-center">Action</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-slate-100 font-medium">
                @foreach($students as $idx => $std)
                @php
                  $attScore = (int) round($std->attendance_score ?? 90);
                  $progScore = (int) round($std->progress_score ?? 82);
                @endphp
                <tr class="hover:bg-slate-50/80">
                  <td class="py-3 px-3"><input type="checkbox"/></td>
                  <td class="py-3 px-3">{{ $std->student_no }}</td>
                  <td class="py-3 px-3 flex items-center gap-2 font-bold">
                    <img src="{{ $avatars[$idx % count($avatars)] }}" class="w-6 h-6 rounded-full object-cover"/>
                    <span>{{ $std->full_name }}</span>
                  </td>
                  <td class="py-3 px-3">{{ $std->program_name }}</td>
                  <td class="py-3 px-3">{{ $std->batch_name ?? 'Batch 2026' }}</td>
                  <td class="py-3 px-3 {{ $attScore >= 85 ? 'text-emerald-600' : 'text-brand-600' }} font-bold">{{ $attScore }}%</td>
                  <td class="py-3 px-3">
                    <div class="flex items-center gap-2">
                      <div class="w-28 h-2 bg-slate-100 rounded-full"><div class="h-full bg-brand-500 rounded-full" style="width: {{ $progScore }}%"></div></div>
                      <span>{{ $progScore }}%</span>
                    </div>
                  </td>
                  <td class="py-3 px-3 text-center">
                    @if($std->student_status === 'ACTIVE')
                      <span class="px-3 py-0.5 rounded-full bg-emerald-50 text-emerald-600 font-bold">Aktif</span>
                    @elseif($std->student_status === 'GRADUATED')
                      <span class="px-3 py-0.5 rounded-full bg-blue-50 text-blue-600 font-bold">Lulus</span>
                    @else
                      <span class="px-3 py-0.5 rounded-full bg-orange-50 text-brand-600 font-bold">Perlu Perhatian</span>
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

  <!-- Modal Tambah Siswa -->
  <div id="modalAddStudent" class="fixed inset-0 bg-slate-900/50 backdrop-blur-xs z-50 hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl border border-slate-200 shadow-xl w-full max-w-md overflow-hidden">
      <div class="p-4 border-b border-slate-100 flex items-center justify-between">
        <h3 class="text-sm font-extrabold text-slate-900">Tambah Siswa Baru</h3>
        <button onclick="document.getElementById('modalAddStudent').classList.add('hidden')" class="text-slate-400 hover:text-slate-600">✕</button>
      </div>
      <form action="{{ route('erp.students.store') }}" method="POST" class="p-5 space-y-3.5 text-xs">
        @csrf
        <div>
          <label class="block font-semibold text-slate-600 mb-1">Nama Lengkap Siswa</label>
          <input name="full_name" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" placeholder="Nama lengkap..." />
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Email</label>
            <input name="email" type="email" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" placeholder="siswa@email.id" />
          </div>
          <div>
            <label class="block font-semibold text-slate-600 mb-1">No. HP</label>
            <input name="phone" required class="w-full px-3 py-2 border border-slate-200 rounded-xl" placeholder="0812..." />
          </div>
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Gender</label>
            <select name="gender" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
              <option value="MALE">Laki-laki</option>
              <option value="FEMALE">Perempuan</option>
            </select>
          </div>
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Cabang</label>
            <select name="branch_id" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
              @foreach($branches as $b)
                <option value="{{ $b->id }}">{{ $b->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="grid grid-cols-2 gap-3">
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Program</label>
            <select name="program_id" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
              @foreach($programs as $pr)
                <option value="{{ $pr->id }}">{{ $pr->name }}</option>
              @endforeach
            </select>
          </div>
          <div>
            <label class="block font-semibold text-slate-600 mb-1">Batch</label>
            <select name="batch_id" class="w-full px-3 py-2 border border-slate-200 rounded-xl">
              @foreach($batches as $bt)
                <option value="{{ $bt->id }}">{{ $bt->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="pt-2 flex justify-end gap-2">
          <button type="button" onclick="document.getElementById('modalAddStudent').classList.add('hidden')" class="px-4 py-2 rounded-xl border border-slate-200 text-slate-600 font-semibold">Batal</button>
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
