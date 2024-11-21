<div>
    <div class="navbar bg-base-100 px-[2cm] pt-[1cm]">
        <div class="flex-1">
            <a class="btn btn-ghost text-3xl">StokBarang.id</a>
            <div class="divider divider-horizontal"></div>
            @if(!Auth::check())
            @if(request()->path() == '/')
            <h1 class="font-semibold text-xl">Home</h1>
            @else
            <h1 class="font-semibold text-xl">{{ ucfirst(request()->path()) }}</h1>
            @endif
            @else
            <a class="font-semibold text-xl mr-3">Hello, {{ Auth::user()->name }}</a>
            @endif
            @if(session('success'))
            <div class="alert alert-success w-[7cm]" id="success-alert">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('success-alert').style.display = 'none';
                }, 3000); // 3 seconds
            </script>
            @endif
            
        </div>
        <div class="flex-none">
            <ul class="menu menu-horizontal px-1">
                <li><a class="font-semibold text-xl" href="/">Beranda</a></li>
                <li><a class="font-semibold text-xl" href="/about">Tentang</a></li>
                <li><a class="font-semibold text-xl mr-2" href="/contact">Kontak</a></li>
                @if(!Auth::check())
                <li><a class="font-semibold text-xl btn btn-primary mr-3" href="{{ route('auth.login') }}">Masuk</a></li>
                <li><a class="font-semibold text-xl btn" href="{{ route('auth.register') }}">Daftar</a></li>
                @else
                <li><a class="font-semibold text-xl btn btn-primary mr-4" href="{{ route('dashboard.index') }}">Dasbor</a></li>
                <li><a class="font-semibold text-white text-xl btn btn-error" href="{{ route('logout') }}">keluar</a></li>
                @endif
            </ul>
        </div>
    </div>
</div>