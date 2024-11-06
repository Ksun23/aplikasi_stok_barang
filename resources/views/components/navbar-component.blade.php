<div>
    <div class="navbar bg-base-100 px-[2cm] pt-[1cm]">
        <div class="flex-1">
            <a class="btn btn-ghost text-3xl">StokBarang.id</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a class="font-semibold text-xl" href="/">Beranda</a></li>
                <li><a class="font-semibold text-xl" href="/about">Tentang</a></li>
                <li><a class="font-semibold text-xl mr-2" href="/contact">Kontak</a></li>
                @if(!Auth::check())
                <li><a class="font-semibold text-xl btn btn-primary mr-3" href="{{ route('auth.login') }}">Login</a></li>
                <li><a class="font-semibold text-xl btn" href="{{ route('auth.register') }}">Register</a></li>
                @else 
                <li><a class="font-semibold text-xl" href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li><a class="font-semibold text-white text-xl btn btn-error" href="{{ route('logout') }}">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>