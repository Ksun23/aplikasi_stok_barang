<div>
    <div class="navbar bg-base-100 px-[2cm] pt-[1cm]">
        <div class="flex-1">
            <a class="btn btn-ghost text-3xl">StokBarang.id</a>
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a class="font-semibold text-xl" href="/">Home</a></li>
                <li><a class="font-semibold text-xl" href="/about">About</a></li>
                <li><a class="font-semibold text-xl mr-2" href="/contact">Contact</a></li>
                @if(!Auth::check())
                <li><a class="font-semibold text-xl btn btn-primary mr-3" href="{{ route('auth.login') }}">Login</a></li>
                <li><a class="font-semibold text-xl btn" href="{{ route('auth.register') }}">Register</a></li>
                @else 
                <li><a class="btn btn-primary font-semibold text-xl" href="{{ route('dashboard') }}">Dashboard</a></li>
                <li><a class="font-semibold text-xl" href="{{ route('logout') }}">Logout</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>