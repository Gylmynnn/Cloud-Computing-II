<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $origin = $_POST['origin'];
    $desc = $_POST['description'];
    $year = $_POST['year_found'];
    $photo = $_POST['photo_url'];

    $stmt = $connection->prepare("INSERT INTO collections (name, origin, description, year_found, photo_url) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssds", $name, $origin, $desc, $year, $photo);
    $stmt->execute();
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Tambah Koleksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container py-4">
    <h2>Tambah Koleksi Baru</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Asal</label>
            <input type="text" name="origin" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Tahun Ditemukan</label>
            <input type="number" name="year_found" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">URL Foto</label>
            <input type="text" name="photo_url" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</body>

</html>
