<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>DATA BARANG</h1>
    <a href="{{ route('products.create') }}">Tambah produk </a>

    <table border="1">
        <tr>
            <td>Nama Produk</td>
            <td>Deskripsi</td>
            <td>Stok</td>
            <td>Harga</td>
            <td>Aksi</td>
        </tr>
        @forelse($products as $product)
        <tr>
            <td>{{ $product->title }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->price }}</td>
            <td>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                <a href="{{ route('products.edit', $product->id) }}">EDIT</a>
                @csrf
                @method('DELETE')
                <button type="submit">HAPUS</button>
                </form>
            </td>
        </tr>
        @empty
        Data Masih Kosong


        @endforelse
    </table>
</body>
</html>