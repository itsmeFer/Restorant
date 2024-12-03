<h1>Menu Restoran</h1>
<table>
    <thead>
        <tr>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($menus as $menu)
            <tr>
                <td>{{ $menu->name }}</td>
                <td>{{ $menu->category }}</td>
                <td>Rp {{ number_format($menu->price, 0, ',', '.') }}</td>
                <td>{{ $menu->description }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
