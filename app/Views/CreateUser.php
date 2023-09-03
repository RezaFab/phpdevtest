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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <a href="<?= base_url('user') ?>" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali ke User Management
        </a>
        <h2><?= $header ?></h2>
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <form action="<?= $formAction ?>" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username:</label>
                <input type="text" id="username" name="username" class="form-control" required <?php if (isset($user)) : ?> value="<?= $user['username']; ?>" readonly disabled <?php endif; ?>>
                <span id="username-check"></span>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" required <?php if (isset($user)) : ?> value="<?= $user['nama']; ?>" <?php endif; ?>>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" id="alamat" name="alamat" class="form-control" required <?php if (isset($user)) : ?> value="<?= $user['alamat']; ?>" <?php endif; ?>>
            </div>
            <button type="submit" class="btn btn-success"><?= $submitButtonLabel ?></button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#username").keyup(function() {
                var username = $(this).val();

                $.ajax({
                    url: "<?= base_url('user/check_username'); ?>",
                    method: "post",
                    data: {
                        username: username
                    },
                    success: function(response) {
                        $("#username-check").html(response);
                    },
                });
            });
        });
    </script>
</body>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

</html>