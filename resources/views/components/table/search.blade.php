@props(['action'])

<form method="GET" action="{{ $action }}">
    <div class="flex items-center gap-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari usaha..." class="poppins bg-slate-100 px-3 py-1 transition delay-50 duration:300 hover:ring-2 hover:ring-teal-500 hover:ring-offset-2 focus:outline-none">
        <button type="submit" class="poppins-medium bg-teal-500 text-slate-100 px-3 py-1 transition delay-50 duration:300 hover:bg-teal-600">Cari</button>
    </div>
</form>