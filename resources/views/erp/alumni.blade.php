<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>IDEA ERP - Alumni Tracking</title>
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
  $flagMap = [
    'ID' => '🇮🇩', 'SG' => '🇸🇬', 'JP' => '🇯🇵', 'US' => '🇺🇸',
    'AE' => '🇦🇪', 'AU' => '🇦🇺', 'GB' => '🇬🇧', 'FR' => '🇫🇷', 'TH' => '🇹🇭',
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
          <a href="{{ route('erp.students') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="users" class="w-5 h-5"></i><span>Student Management</span></a>
          <a href="{{ route('erp.assessments') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="file-check-2" class="w-5 h-5"></i><span>Assessment &amp; Certification</span></a>
          <a href="{{ route('erp.placements') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="briefcase" class="w-5 h-5"></i><span>Career &amp; Placement</span></a>
          <a href="{{ route('erp.partners') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-brand-50 hover:text-brand-600 transition"><i data-lucide="handshake" class="w-5 h-5"></i><span>Partners</span></a>
          <a href="{{ route('erp.alumni') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-brand-500 to-amber-500 text-white shadow-md shadow-brand-500/20"><i data-lucide="graduation-cap" class="w-5 h-5"></i><span>Alumni</span></a>
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
          <form action="{{ route('erp.alumni') }}" method="GET" class="relative w-full">
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
            <h1 class="text-2xl lg:text-3xl font-extrabold text-slate-900 tracking-tight">Alumni Tracking</h1>
            <p class="text-sm text-slate-600 mt-1">Pantau perjalanan karier alumni IDEA dan jaringan global mereka.</p>
          </div>
          <div class="flex items-center gap-8">
            <div class="text-left md:text-right">
              <div class="text-sm font-bold text-slate-800">Senin, 21 Apr 2025</div>
              <div class="text-xs text-slate-500 mt-0.5">Alumni kami, dampak nyata di dunia.</div>
            </div>
          </div>
        </div>
      </div>

      <!-- MAIN -->
      <main class="p-4 lg:p-8 space-y-6 max-w-[1600px] w-full mx-auto">
        <!-- 6 KPI CARDS -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4">
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="users" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Total Alumni</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['total_alumni'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 12% <span class="text-slate-400 font-normal">dari tahun lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="briefcase" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Employed Alumni</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['employed_alumni'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 15% <span class="text-slate-400 font-normal">dari tahun lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="globe" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">International Alumni</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['intl_alumni'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 20% <span class="text-slate-400 font-normal">dari tahun lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="coins" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Average Starting Salary</div><div class="text-xl font-extrabold text-slate-900 mt-0.5">Rp 12,5 Jt</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 18% <span class="text-slate-400 font-normal">dari tahun lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="bar-chart-2" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Alumni Survey Response</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">82%</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 6% <span class="text-slate-400 font-normal">dari tahun lalu</span></div></div>
          </div>
          <div class="bg-white rounded-2xl p-4 custom-shadow border border-slate-100 flex items-start gap-3">
            <div class="w-10 h-10 rounded-xl bg-brand-50 text-brand-500 flex items-center justify-center shrink-0"><i data-lucide="user-check" class="w-5 h-5"></i></div>
            <div><div class="text-xs text-slate-500">Active Mentors</div><div class="text-2xl font-extrabold text-slate-900 mt-0.5">{{ $kpis['active_mentors'] }}</div><div class="text-[11px] font-semibold text-emerald-600 mt-1">↑ 25% <span class="text-slate-400 font-normal">dari tahun lalu</span></div></div>
          </div>
        </div>

        <!-- ROW 2: 3 CHARTS -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
          <!-- Status Pekerjaan Alumni -->
          <div class="lg:col-span-4 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <h3 class="font-bold text-slate-800 text-base mb-4">Status Pekerjaan Alumni</h3>
            <div class="flex items-center justify-between gap-4">
              <div class="w-36 h-36 rounded-full flex items-center justify-center shrink-0" style="background: conic-gradient(#F97316 0% 82%, #FDBA74 82% 92%, #CBD5E1 92% 97%, #E2E8F0 97% 100%);">
                <div class="w-24 h-24 bg-white rounded-full flex flex-col items-center justify-center text-center">
                  <span class="text-xl font-extrabold text-slate-900">100%</span>
                  <span class="text-xs text-slate-500">Bekerja</span>
                </div>
              </div>
              <div class="space-y-2.5 text-xs flex-1">
                <div class="flex justify-between"><span><span class="inline-block w-2.5 h-2.5 rounded-full bg-brand-500 mr-1.5"></span>Bekerja <span class="text-slate-400 block pl-4">({{ $kpis['employed_alumni'] }})</span></span><b>100%</b></div>
                <div class="flex justify-between"><span><span class="inline-block w-2.5 h-2.5 rounded-full bg-orange-300 mr-1.5"></span>Melanjutkan Studi <span class="text-slate-400 block pl-4">(0)</span></span><b>0%</b></div>
                <div class="flex justify-between"><span><span class="inline-block w-2.5 h-2.5 rounded-full bg-slate-300 mr-1.5"></span>Wirausaha <span class="text-slate-400 block pl-4">(0)</span></span><b>0%</b></div>
                <div class="flex justify-between"><span><span class="inline-block w-2.5 h-2.5 rounded-full bg-slate-200 mr-1.5"></span>Lainnya <span class="text-slate-400 block pl-4">(0)</span></span><b>0%</b></div>
              </div>
            </div>
          </div>

          <!-- Alumni Berdasarkan Negara -->
          <div class="lg:col-span-4 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-3">
              <h3 class="font-bold text-slate-800 text-base">Alumni Berdasarkan Negara</h3>
              <span class="text-xs text-slate-500">Negara Teratas ▾</span>
            </div>
            @php
              $maxCountryCount = max(1, $countryBreakdown->max('alumni_count'));
            @endphp
            <div class="space-y-2 text-xs">
              @foreach($countryBreakdown as $co)
              @php
                $wPct = max(8, (int) round(($co->alumni_count / $maxCountryCount) * 85));
              @endphp
              <div class="flex items-center gap-2">
                <span class="w-28 truncate">{{ $flagMap[$co->iso2] ?? '🌐' }} {{ $co->name }}</span>
                <div class="flex-1 h-2.5 bg-slate-100 rounded"><div class="h-full bg-brand-500 rounded" style="width: {{ $wPct }}%"></div></div>
                <b class="w-10 text-right">{{ $co->alumni_count }}</b>
              </div>
              @endforeach
            </div>
          </div>

          <!-- Distribusi Bidang Karier Alumni -->
          <div class="lg:col-span-4 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <h3 class="font-bold text-slate-800 text-base mb-4">Distribusi Bidang Karier Alumni</h3>
            @php
              $totalProgAlumni = max(1, $programBreakdown->sum('alumni_count'));
              $pColors = ['bg-brand-500', 'bg-orange-400', 'bg-slate-400', 'bg-slate-300', 'bg-slate-500'];
            @endphp
            <div class="flex items-center justify-between gap-4">
              <div class="w-36 h-36 rounded-full flex items-center justify-center shrink-0" style="background: conic-gradient(#F97316 0% 32%, #FB923C 32% 50%, #94A3B8 50% 66%, #CBD5E1 66% 78%, #64748B 78% 86%, #E2E8F0 86% 100%);">
                <div class="w-24 h-24 bg-white rounded-full flex flex-col items-center justify-center text-center">
                  <span class="text-lg font-extrabold text-slate-900">{{ $kpis['total_alumni'] }}</span>
                  <span class="text-xs text-slate-500">Alumni</span>
                </div>
              </div>
              <div class="space-y-2 text-xs flex-1">
                @foreach($programBreakdown as $idx => $pb)
                @php
                  $pct = (int) round(($pb->alumni_count / $totalProgAlumni) * 100);
                @endphp
                <div class="flex justify-between">
                  <span><span class="inline-block w-2.5 h-2.5 rounded-full {{ $pColors[$idx % count($pColors)] }} mr-1.5"></span>{{ explode(' ', $pb->name)[0] }}</span>
                  <b>{{ $pct }}% <span class="text-slate-400 font-normal">({{ $pb->alumni_count }})</span></b>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        <!-- ROW 3: DIREKTORI ALUMNI & KISAH SUKSES -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
          <div class="lg:col-span-8 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
              <h3 class="font-bold text-slate-800 text-base">Direktori Alumni</h3>
              <form action="{{ route('erp.alumni') }}" method="GET" class="flex items-center gap-2 text-xs">
                <input type="text" name="q" value="{{ $filters['q'] ?? '' }}" placeholder="Cari nama alumni, perusahaan, atau posisi..." class="px-3 py-2 border border-slate-200 rounded-xl bg-slate-50 w-64" />
                <button type="submit" class="px-3.5 py-2 border border-slate-200 rounded-xl bg-slate-50 font-bold">Filter</button>
              </form>
            </div>
            <div class="overflow-x-auto">
              <table class="w-full text-left text-xs">
                <thead>
                  <tr class="bg-[#F5F1E8] text-slate-600 font-bold">
                    <th class="py-2.5 px-3 rounded-l-lg">Alumni Name</th><th class="py-2.5 px-3">Program</th><th class="py-2.5 px-3">Graduation Year</th><th class="py-2.5 px-3">Employer</th><th class="py-2.5 px-3">Position</th><th class="py-2.5 px-3">Country</th><th class="py-2.5 px-3 text-center">Employment Status</th><th class="py-2.5 px-3 rounded-r-lg">Last Update</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 font-medium">
                  @foreach($alumniList as $al)
                  <tr>
                    <td class="py-3 px-3 font-bold">{{ $al->full_name }}</td>
                    <td class="py-3 px-3">{{ $al->program_name }}</td>
                    <td class="py-3 px-3">{{ $al->graduation_date ? date('Y', strtotime($al->graduation_date)) : '2025' }}</td>
                    <td class="py-3 px-3">{{ $al->partner_name ?? 'Global Hospitality' }}</td>
                    <td class="py-3 px-3">{{ $al->current_position }}</td>
                    <td class="py-3 px-3">{{ $flagMap[$al->country_iso2] ?? '🌐' }} {{ $al->country_name }}</td>
                    <td class="py-3 px-3 text-center"><span class="px-2.5 py-0.5 rounded-full bg-emerald-50 text-emerald-600 font-bold">Bekerja</span></td>
                    <td class="py-3 px-3">{{ $al->last_update_at ? date('d M Y', strtotime($al->last_update_at)) : '12 Apr 2025' }}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <!-- Kisah Sukses Alumni -->
          <div class="lg:col-span-4 bg-white rounded-2xl p-5 custom-shadow border border-slate-100">
            <div class="flex items-center justify-between mb-4">
              <h3 class="font-bold text-slate-800 text-base">Kisah Sukses Alumni</h3>
              <a href="{{ route('erp.alumni') }}" class="text-xs font-bold text-brand-600">Lihat Semua →</a>
            </div>
            <div class="space-y-5 text-xs">
              <div class="pb-4 border-b border-slate-100">
                <div class="flex items-center gap-3 mb-2">
                  <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=100&q=80" class="w-12 h-12 rounded-full object-cover" />
                  <div>
                    <div class="font-bold text-slate-900">Andi Wijaya</div>
                    <div class="text-slate-400 text-[11px]">Alumni 2025 • Hospitality</div>
                    <div class="font-semibold text-slate-700">Marriott Hotels, Singapore</div>
                  </div>
                </div>
                <p class="text-slate-600 italic leading-relaxed">"Pendidikan di IDEA memberi saya fondasi kuat untuk karier internasional. Sekarang saya memimpin tim di salah satu hotel terbaik di Asia."</p>
              </div>
              <div class="pb-4 border-b border-slate-100">
                <div class="flex items-center gap-3 mb-2">
                  <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=crop&w=100&q=80" class="w-12 h-12 rounded-full object-cover" />
                  <div>
                    <div class="font-bold text-slate-900">Siti Rahma</div>
                    <div class="text-slate-400 text-[11px]">Alumni 2025 • Culinary</div>
                    <div class="font-semibold text-slate-700">Four Seasons, Tokyo</div>
                  </div>
                </div>
                <p class="text-slate-600 italic leading-relaxed">"Dukungan mentor dan jaringan alumni sangat membantu saya mencapai posisi ini. Saya ingin terus berbagi ilmu dengan adik-adik di IDEA."</p>
              </div>
              <div>
                <div class="flex items-center gap-3 mb-2">
                  <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80" class="w-12 h-12 rounded-full object-cover" />
                  <div>
                    <div class="font-bold text-slate-900">Kevin Hartono</div>
                    <div class="text-slate-400 text-[11px]">Alumni 2025 • Business</div>
                    <div class="font-semibold text-slate-700">Accor Group, Singapore</div>
                  </div>
                </div>
                <p class="text-slate-600 italic leading-relaxed">"Dari IDEA ke dunia profesional, pengalaman belajar di sini membentuk cara saya berpikir dan memimpin."</p>
              </div>
            </div>
          </div>
        </div>
      </main>
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
