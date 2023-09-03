<style>
    #sidebar {
        background-color: #0C517A;
        color: white;
        width: 200px;
        min-height: 100vh;
        transition: all 0.3s;
    }

    #logout-button {
        color: white;
    }

    #sidebar.active {
        margin-left: -250px;
    }

    .logo {
        max-width: 150px;
        height: auto;
        margin-bottom: 20px;
    }

    .nav-link {
        color: white;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
    <div class="position-sticky">
        <div class="text-center mb-4">
            <img style="padding-top: 20px;" src="https://lyrid.co.id/wp-content/uploads/2023/07/180x60-01-128x43.png" alt="Logo" class="logo">
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="/dashboard">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/user">
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/pegawai">
                    Pegawai
                </a>
            </li>
            <a style="margin-top: 20px;" href="#" class="btn btn-danger" data-toggle="modal" data-target="#logoutModal">Logout</a>

        </ul>

    </div>
</nav>

<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Konfirmasi Logout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin logout?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="<?= base_url('/auth/logout') ?>" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>