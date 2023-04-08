<?php

require_once __DIR__ . '/controllers/TransactionController.php';
require_once __DIR__ . '/controllers/ProductController.php';


$products = produk($_GET['id']);

if (isset($_POST['checkout'])) {
    checkout($_GET['id']);
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
    <title>eShoping</title>

    <link rel="canonical" href="">

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
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


</head>

<body>

    <header>
        <div class="collapse bg-dark" id="navbarHeader">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About</h4>
                        <p class="text-muted">Add some information about the album below, the author, or any other
                            background context. Make it a few sentences long so folks can pick up some informative
                            tidbits. Then, link them off to some social networking sites or contact information.</p>
                    </div>
                    <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Contact</h4>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">Follow on Twitter</a></li>
                            <li><a href="#" class="text-white">Like on Facebook</a></li>
                            <li><a href="#" class="text-white">Email me</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="25" height="25" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z" />
                    </svg> <strong> eShoping</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </header>

    <main>
        <div class="album py-5 bg-light " style="min-height: 100vh;">
            <div class="container mt-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">
                                <style>
                                    td {
                                        vertical-align: middle;
                                    }
                                </style>

                                <table class="table table-bordered">
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                    </tr>
                                    <tr>
                                        <td class="text-center"><img src="<?= $products['image'] ?>" class="img-fluid" width="80" alt=""></td>
                                        <td class="text-center"><?= $products['name'] ?></td>
                                        <td class="text-center">1</td>
                                        <td class="text-center">Rp <?= number_format($products['price']) ?></td>
                                    </tr>
                                </table>

                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="card">
                                        <div class="card-header">
                                            <p>Pengisian Form</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control" required>

                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" name="name" class="form-control" required>

                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Nomor Telepon</label>
                                                <input type="number" name="phone_number" class="form-control" required>

                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Alamat</label>
                                                <input type="text" name="address" class="form-control" required>

                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Metode Pembayaran</label>
                                                <select name="metode_pembayaran" class="form-control" id="" required>
                                                    <option value="">-- Pilih Metode Pembayaran --</option>
                                                    <option value="bank">Transfer Bank</option>
                                                    <option value="shopeepay">Shopee Pay</option>
                                                    <option value="gopay">Gopay</option>
                                                    <option value="dana">Dana</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Bukti Pembayaran (Gambar)</label>
                                                <input type="file" name="bukti" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="col-md-5 mt-5 mt-md-0 mt-lg-0">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Rincian</h5>
                                        <table class="table table-borderless">
                                            <tr>
                                                <td width="30%">PPN 11%</td>
                                                <td>: Rp. <?php

                                                            $ppn = ((int) $products['price'] * 11) / 100;
                                                            echo number_format($ppn);
                                                            ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="30%">Total</td>
                                                <th>: Rp. <?= number_format($products['price'] + $ppn) ?></td>
                                            </tr>
                                        </table>

                                        <div>
                                            <button type="submit" name="checkout" class="btn btn-success col-12">Checkout Now</button>
                                        </div>
                                    </div>
                                </div>
                                </form>
                                <div class="card mt-4">
                                    <div class="card-body table-responsive">
                                        <h5 class="text-warning">Informasi Metode Pembayaran</h5>
                                        <table class="table table-borderless">
                                            <tr>
                                                <th>Transfer Bank (BRI)</th>
                                                <td>: 123456789012 A/N Donny Salmanan</td>
                                            </tr>
                                            <tr>
                                                <th>Shopee Pay</th>
                                                <td>: 08123456789</td>
                                            </tr>
                                            <tr>
                                                <th>Gopay</th>
                                                <td>: 08123456789</td>
                                            </tr>
                                            <tr>
                                                <th>Dana</th>
                                                <td>: 08123456789</td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>

                            </div>


                        </div>


                    </div>

                </div>
            </div>

        </div>

    </main>

    <footer class=" text-muted py-5">
        <div class="container">
            <p class="float-end mb-1">
                <a href="#">Back to top</a>
            </p>

        </div>
    </footer>


    <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>

</body>

</html>