<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #6EC1E4;
            background-size: cover;
            background-repeat: no-repeat;
            background-image: url('https://lyrid.co.id/wp-content/uploads/2023/02/tops.png'), linear-gradient(rgba(255, 255, 255, 0.4) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, 0.4) 1px, transparent 1px);
            animation: abstract 5s linear infinite alternate;
        }


        .login-wrapper {
            display: flex;
            align-items: center;
        }

        .welcome-text {
            flex: 1;
            padding: 20px;
            text-align: left;
            color: #ffff;
            animation: shrink 2s ease-in-out infinite alternate;
        }

        .login-container {
            min-width: 400px;
            max-width: 400px;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            background-color: #ffffff;
        }

        .logo {
            max-width: 100px;
            height: auto;
        }

        @keyframes shrink {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(0.9);
            }
        }
    </style>
</head>

<body>
    <div class="login-wrapper">
        <div class="welcome-text">
            <h2>Selamat Datang di <br> Aplikasi Pengelolaan Pegawai <br> PT.<img style="text-align: center;" src="https://lyrid.co.id/wp-content/uploads/2023/07/180x60-01-128x43.png" alt="Logo" class="logo"></h2>
        </div>
        <div class="login-container">
            <h2 class="text-center mt-3">Login</h2>
            <p>username : user1 <br> password : password</p>
            <form action="<?= base_url('auth/authenticate') ?>" method="post">
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" id="username" name="username" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Login</button>
                </div>
            </form>
            <?php if (session()->has('error')) : ?>
                <div class="alert alert-danger mt-3">
                    <?= session('error') ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>