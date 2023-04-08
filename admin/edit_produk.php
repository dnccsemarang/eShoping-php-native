<?php
require_once __DIR__ . '../../controllers/ProductController.php';


// Panggil fungsi untuk mengedit
$product = produk($_GET['id']);

if (isset($_POST['editProduk'])) {
    edit_produk($product['id_produk']);
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Dashboard Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: rgb(255, 255, 255);
            font-family: 'Poppins', sans-serif;
        }

        .sidebar {
            background-color: #bebebe;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="../assets/dist/css/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-secondary flex-md-nowrap p-0 shadow">
        <!-- Tampilan Dekstop  -->
        <a class="navbar-brand col-12 col-md-3 col-lg-2 me-0 px-4 fs-6 d-none d-md-block d-lg-block"" href=" #">
            <img src="../images/logo.png" width="70" class="" alt="">Admin Toko</a>

        <!-- Tampilan Mobile  -->
        <a class="navbar-brand col-12 col-md-3 col-lg-2 me-0 px-4 fs-6 d-block d-md-none d-lg-none"" href=" #">Admin Toko</a>

        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- <div class=" w-100 rounded-0 border-0"></div> -->

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3 d-flex" href="#">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                    </svg>
                    <span class="ms-2 align-self-center">Logout</span>
                </a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
                <div class="position-sticky pt-2 pt-md-3 mt-lg-3 sidebar-sticky">
                    <!-- <div class="card mx-2 mb-4">
                        <div class="card-body">
                            <img src="https://ui-avatars.com/api/?name=User&rounded=true" width="30" alt="">
                            <span>Username</span>
                        </div>
                    </div> -->
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link fs-6 " aria-current="page" href="#">
                                <span data-feather="home" class=" align-text-bottom"></span>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="product.php" class="nav-link fs-6 active" href="#">
                                <span class="align-text-bottom"></span>
                                Produk
                            </a>
                        </li>
                        <li class="nav-item">
                            <a hhref="transaction.php" class="nav-link fs-6" href="#">
                                <span class="align-text-bottom"></span>
                                Transaksi
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit Produk</h1>
                </div>


                <!-- Content -->

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Nama Produk</label>
                                    <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>" placeholder="Masukkan nama produk" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Harga</label>
                                    <input type="text" name="price" class="form-control" value="<?= $product['price'] ?>" placeholder="Masukkan harga produk" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Deskripsi</label>
                                    <input type="text" name="description" class="form-control" value="<?= $product['description'] ?>" placeholder="Masukkan deskripsi produk" required>
                                </div>
                                <div class="mb-3">
                                    <img src="../<?= $product['image'] ?>" width="120" alt="">
                                    <label class="form-label">Gambar Lama</label>
                                    <br>
                                    <br>
                                    <label class="form-label">Gambar</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="editProduk" class="btn btn-primary">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- End Content -->
        </div>

        </main>
    </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>

</html>