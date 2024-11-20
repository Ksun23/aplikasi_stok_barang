@extends ('layout')

@section ('title')
    Dashboard | Barang Rusak
@endsection

@section ('content')
<div class="w-[100%] h-screen">
    <div class="grid grid-cols-4 grid-rows-1 mt-[1cm]">
        <div class="px-[3cm] col-span-1">
            <x-menu-component />
        </div>
    </div>
</div>
@endsection