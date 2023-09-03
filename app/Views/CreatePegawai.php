<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <a href="<?= base_url('pegawai') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali ke Data Pegawai
        </a>
        <h2><?= $header ?></h2>

        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (isset($validation)) : ?>
            <?php if ($validation->getErrors()) : ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($validation->getErrors() as $error) : ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <form action="<?= $formAction ?>" method="post" enctype="multipart/form-data">
            <?php if (isset($pegawai) && $pegawai['foto']) : ?>
                <div class="mb-3">
                    <label for="currentFoto" class="form-label">Foto Saat Ini:</label>
                    <img src="/Uploads/<?= $pegawai['foto']; ?>" alt="Foto Pegawai" width="100">
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <input type="file" id="foto" name="foto" class="form-control" <?php if (isset($pegawai)) : ?> <?php endif; ?>>
                <small class="text-muted">Harap unggah file berformat JPEG/JPG dengan ukuran maksimal 300KB.</small>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" required <?php if (isset($pegawai)) : ?> value="<?= $pegawai['nama']; ?>" <?php endif; ?>>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" id="alamat" name="alamat" class="form-control" required <?php if (isset($pegawai)) : ?> value="<?= $pegawai['alamat']; ?>" <?php endif; ?>>
            </div>
            <button type="submit" class="btn btn-success"><?= $submitButtonLabel ?></button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>