<?php
require_once __DIR__ . '/controllers/TransactionController.php';



$transactions = transaction($_GET['id']);
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

        .card-img {
            height: 300px;
            /* ukuran gambar yang diinginkan */
            object-fit: cover;
            /* gambar akan menyesuaikan dirinya dengan mengabaikan aspek rasio */
            object-position: center;
            /* posisi gambar di tengah kontainer */
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
        <div class="album py-5 bg-light" style="min-height: 100vh;">
            <div class="container">
                <h1>Histori Transaksi / Pesanan</h1>
                <div class="row ">
                    <div class="col-12 my-3">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Nama</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Metode Pembayaran</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($transactions as $key => $transaction) : ?>
                                                <?php
                                                $buyer = json_decode($transaction['buyer']);
                                                $product = json_decode($transaction['produk']);
                                                ?>
                                                <tr>
                                                    <th scope="row"><?= $key + 1 ?></th>
                                                    <td><?= $transaction['created_at'] ?></td>
                                                    <td><?= $buyer->name ?></td>
                                                    <td><?= $buyer->email ?></td>

                                                    <td><?= $transaction['metode_pembayaran'] ?></td>
                                                    <td>Rp. <?= number_format($transaction['grand_total']) ?></td>
                                                    <td>
                                                        <?php
                                                        if ($transaction['status'] == 0) {
                                                            echo '<span class="badge rounded-pill text-bg-warning">Menunggu Konfirmasi Admin</span>';
                                                        } else {
                                                            echo '<span class="badge rounded-pill text-bg-success">Telah Dikonfirmasi Admin</span>';
                                                        }

                                                        ?>
                                                    </td>

                                                    <td>
                                                        <button data-bs-toggle="modal" data-bs-target="#detailModal-<?= $key + 1 ?>" class="btn btn-info btn-sm mb-2" href="">Detail</button>



                                                        <!-- Modal -->
                                                        <div class="modal fade" id="detailModal-<?= $key + 1 ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Transaksi</h1>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <p class="fs-6"> Data Pembeli</p>
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered">
                                                                                <tr>
                                                                                    <th>Nama</th>
                                                                                    <td>: <?= $buyer->name ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Email</th>
                                                                                    <td>: <?= $buyer->email ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Nomor Telepon</th>
                                                                                    <td>: <?= $buyer->phone_number ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Alamat</th>
                                                                                    <td>: <?= $buyer->address ?></td>
                                                                                </tr>
                                                                            </table>
                                                                        </div>
                                                                        <p class="fs-6 mt-3"> Data Produk</p>
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered">
                                                                                <tr>
                                                                                    <th>Nama Produk</th>
                                                                                    <td>: <?= $product->name ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Harga</th>
                                                                                    <td>: Rp. <?= number_format($product->price) ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Deskripsi Produk</th>
                                                                                    <td>: <?= $product->description ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Preview Produk</th>
                                                                                    <td>: <img src="<?= $product->image ?>" width="130" alt=""></td>
                                                                                </tr>

                                                                            </table>
                                                                        </div>
                                                                        <p class="fs-6 mt-3"> Total Pembayaran</p>
                                                                        <div class="table-responsive">
                                                                            <table class="table table-bordered">
                                                                                <tr>
                                                                                    <th>Harga Satuan</th>
                                                                                    <td>: Rp. <?= number_format($product->price) ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>PPN 11%</th>
                                                                                    <td>: Rp. <?= number_format(((int) $product->price * 11) / 100) ?></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Total</th>
                                                                                    <th>: Rp. <?= number_format($transaction['grand_total']) ?></th>
                                                                                </tr>

                                                                            </table>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>


                                            <?php endforeach ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

    </main>

    <footer class="text-muted py-5">
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