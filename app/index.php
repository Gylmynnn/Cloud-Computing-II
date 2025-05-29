<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Museum CRUD Digital</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container py-4">
    <h1 class="mb-4">Daftar Koleksi Museum</h1>
    <a href="create.php" class="btn btn-primary mb-3">Tambah Koleksi</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Nama</th>
                <th>Asal</th>
                <th>Tahun</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = $connection->query("SELECT * FROM collections ORDER BY id DESC");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['name']}</td>
                    <td>{$row['origin']}</td>
                    <td>{$row['year_found']}</td>
                    <td>{$row['description']}</td>
                    <td><img src='{$row['photo_url']}' width='100'></td>
                    <td>
                        <a href='edit.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                        <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin hapus?')\">Hapus</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>
