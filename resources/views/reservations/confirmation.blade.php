<h3>Makanan yang Dipilih:</h3>
<ul>
    @foreach ($selectedMenus as $menuId)
        @php
            $menu = \App\Models\Menu::find($menuId);
        @endphp
        @if ($menu && $menu->category === 'Makanan')
            <li>{{ $menu->name }} - Rp {{ number_format($menu->price, 0, ',', '.') }}</li>
        @endif
    @endforeach
</ul>

<h3>Minuman yang Dipilih:</h3>
<ul>
    @foreach ($selectedMenus as $menuId)
        @php
            $menu = \App\Models\Menu::find($menuId);
        @endphp
        @if ($menu && $menu->category === 'Minuman')
            <li>{{ $menu->name }} - Rp {{ number_format($menu->price, 0, ',', '.') }}</li>
        @endif
    @endforeach
</ul>
