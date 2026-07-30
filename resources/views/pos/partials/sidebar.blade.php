<!-- resources/views/pos/partials/sidebar.blade.php -->
<aside class="w-full lg:w-44 bg-[#211e2b] text-white flex flex-col justify-between p-3 shrink-0 border-r border-slate-700/50">
    <div>
        <!-- Title Header -->
        <div class="py-2 mb-4 text-center border-b border-slate-800">
            <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">Navigation</span>
        </div>

        <!-- Navigation Links Container (overflow-hidden prevents vertical scrollbars) -->
        <nav class="flex lg:flex-col items-center justify-center gap-4 overflow-hidden">
            
            <!-- Menu Link -->
            <a href="/menu" 
               class="flex flex-col items-center justify-center w-24 h-24 rounded-2xl transition duration-150 shrink-0 {{ request()->is('menu') ? 'bg-[#712bb1] text-white shadow-lg' : 'bg-[#322a40] hover:bg-[#712bb1] text-slate-300 hover:text-white' }}">
                <div class="w-9 h-9 rounded-full {{ request()->is('menu') ? 'bg-white/20' : 'bg-white/10' }} flex items-center justify-center mb-1">
                    <i class="fa-solid fa-utensils text-sm"></i>
                </div>
                <span class="text-[11px] font-extrabold tracking-wider">MENU</span>
            </a>

            <!-- Kitchen Link -->
            <a href="/kitchen" 
               class="flex flex-col items-center justify-center w-24 h-24 rounded-2xl transition duration-150 shrink-0 {{ request()->is('kitchen') ? 'bg-[#712bb1] text-white shadow-lg' : 'bg-[#322a40] hover:bg-[#712bb1] text-slate-300 hover:text-white' }}">
                <div class="w-9 h-9 rounded-full {{ request()->is('kitchen') ? 'bg-white/20' : 'bg-white/10' }} flex items-center justify-center mb-1">
                    <i class="fa-solid fa-kitchen-set text-sm"></i>
                </div>
                <span class="text-[11px] font-extrabold tracking-wider">KITCHEN</span>
            </a>

            <!-- Dashboard Link -->
            <a href="/dashboard" 
               class="flex flex-col items-center justify-center w-24 h-24 rounded-2xl transition duration-150 shrink-0 {{ request()->is('dashboard') ? 'bg-[#712bb1] text-white shadow-lg' : 'bg-[#322a40] hover:bg-[#712bb1] text-slate-300 hover:text-white' }}">
                <div class="w-9 h-9 rounded-full {{ request()->is('dashboard') ? 'bg-white/20' : 'bg-white/10' }} flex items-center justify-center mb-1">
                    <i class="fa-solid fa-chart-line text-sm"></i>
                </div>
                <span class="text-[11px] font-extrabold tracking-wider">DASHBOARD</span>
            </a>

        </nav>
    </div>
</aside>