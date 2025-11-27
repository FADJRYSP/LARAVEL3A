<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('products.store') }}" method="POST">
    @csrf
        <label>Nama :</label><input type="text" name="txtnama"> <br>
        <label>Deskripsi :</label><textarea name="textdeskripsi"></textarea> <br>
        <label>Stok :</label><input type="text" name="txtstok"> <br>
        <label>Harga :</label><input type="text" name="txtharga"> <br>
        <button type="submit">Simpan</button>
        <button type="reset">Batal</button>
    </form>
    <button onclick="window.location.href='{{ route('products.index') }}'">
    Back</button>
</body>
</html>