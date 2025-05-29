<?php
include 'config.php';
$id = $_GET['id'];
$result = $connection->query("SELECT * FROM collections WHERE id = $id");
$data = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $origin = $_POST['origin'];
    $desc = $_POST['description'];
    $year = $_POST['year_found'];
    $photo = $_POST['photo_url'];

    $stmt = $connection->prepare("UPDATE collections SET name=?, origin=?, description=?, year_found=?, photo_url=? WHERE id=?");
    $stmt->bind_param("sssisi", $name, $origin, $desc, $year, $photo, $id);
    $stmt->execute();
    header('Location:index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Koleksi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container py-4">
    <h2>Edit Koleksi</h2>
    <form method="post">
        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input type="text" name="name" value="<?= $data['name'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Asal</label>
            <input type="text" name="origin" value="<?= $data['origin'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Tahun Ditemukan</label>
            <input type="number" name="year_found" value="<?= $data['year_found'] ?>" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control"><?= $data['description'] ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">URL Foto</label>
            <input type="text" name="photo_url" value="<?= $data['photo_url'] ?>" class="form-control">
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</body>

</html>
