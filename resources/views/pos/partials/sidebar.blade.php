<aside class="w-full lg:w-44 bg-[#211e2b] text-white flex flex-col justify-between p-3 shrink-0 border-r border-slate-700/50">
    <div>
        <div class="py-2 mb-4 text-center border-b border-slate-800">
            <span class="text-xs font-bold tracking-widest text-slate-400 uppercase">Navigation</span>
        </div>

        <nav class="flex lg:flex-col justify-center gap-4 overflow-x-auto">
            <a href="/menu" class="flex flex-col items-center justify-center w-25 h-20 rounded-2xl {{ request()->is('menu') ? 'bg-[#712bb1] text-white shadow-lg' : 'bg-[#322a40] hover:bg-[#712bb1] text-slate-300 hover:text-white' }} font-bold text-xs transition transform hover:scale-105 shrink-0 mx-auto">
                <div class="w-8 h-8 rounded-full {{ request()->is('menu') ? 'bg-white/20' : 'bg-white/10' }} flex items-center justify-center mb-1">
                    <i class="fa-solid fa-utensils text-sm"></i>
                </div>
                <span>MENU</span>
            </a>

            <a href="/kitchen" class="flex flex-col items-center justify-center w-25 h-20 rounded-2xl {{ request()->is('kitchen') ? 'bg-[#712bb1] text-white shadow-lg' : 'bg-[#322a40] hover:bg-[#712bb1] text-slate-300 hover:text-white' }} font-bold text-xs transition transform hover:scale-105 shrink-0 mx-auto">
                <div class="w-8 h-8 rounded-full {{ request()->is('kitchen') ? 'bg-white/20' : 'bg-white/10' }} flex items-center justify-center mb-1">
                    <i class="fa-solid fa-kitchen-set text-sm"></i>
                </div>
                <span>KITCHEN</span>
            </a>

            <a href="/dashboard" class="flex flex-col items-center justify-center w-25 h-20 rounded-2xl {{ request()->is('dashboard') ? 'bg-[#712bb1] text-white shadow-lg' : 'bg-[#322a40] hover:bg-[#712bb1] text-slate-300 hover:text-white' }} font-bold text-xs transition transform hover:scale-105 shrink-0 mx-auto">
                <div class="w-8 h-8 rounded-full {{ request()->is('dashboard') ? 'bg-white/20' : 'bg-white/10' }} flex items-center justify-center mb-1">
                    <i class="fa-solid fa-chart-line text-sm"></i>
                </div>
                <span>DASHBOARD</span>
            </a>
        </nav>
    </div>
</aside>