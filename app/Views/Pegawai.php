<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php include('_sidebar.php'); ?>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="container mt-5">
                    <h2>Data Pegawai</h2>
                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>

                    <a href="<?= base_url('/pegawai/create') ?>" class="btn btn-primary mb-3">Tambah Pegawai</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pegawai as $pegawai) : ?>
                                <tr>
                                    <td><?= $pegawai['id']; ?></td>
                                    <td>
                                        <?php if (empty($pegawai['foto'])) : ?>
                                            <img src="/Uploads/Placeholder/Portrait_Placeholder.png" alt="Foto Pegawai" width="100">
                                        <?php else : ?>
                                            <img src="/Uploads/<?= $pegawai['foto']; ?>" alt="Foto Pegawai" width="100">
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $pegawai['nama']; ?></td>
                                    <td><?= $pegawai['alamat']; ?></td>
                                    <td>
                                        <a href="<?= base_url('/pegawai/edit/' . $pegawai['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= base_url('/pegawai/delete/' . $pegawai['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pegawai ini?')">Hapus</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>