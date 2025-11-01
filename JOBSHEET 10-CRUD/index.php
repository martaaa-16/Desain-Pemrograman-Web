<?php
include "auth.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?= $_SESSION['csrf_token'] ?>">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <title>Data Anggota</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php" style="color: white;">CRUD Dengan Ajax</a>
    </nav>

    <div class="container" style="margin: 30px;">
        <h2>Data Anggota</h2>
        <form method="post" class="form-data" id="form-data">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nama:</label>
                        <input type="hidden" name="id" id="id">
                        <input type="text" name="nama" id="nama" class="form-control" required="true">
                    </div>
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Jenis Kelamin:</label><br>
                        <input type="radio" name="jenis_kelamin" id="jenkel1" value="L" required="true"> Laki-laki
                        <input type="radio" name="jenis_kelamin" id="jenkel2" value="P" required="true"> Perempuan
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>Alamat:</label>
                        <input name="alamat" id="alamat" class="form-control" required="true">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <label>No Telepon:</label>
                        <input type="number" name="no_telp" id="no_telp" class="form-control" required="true">
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="form-group">
                        <button type="button" name="simpan" id="simpan" class="btn btn-primary">
                            <i class="fa fa-save"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <div class="data"></div>
    </div>

    <div class="text-center">
        <p>&copy; <?= date('Y'); ?> | Desain Dan Pemrograman Web |
            <a href="https://google.com/">Google</a>
        </p>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Load data saat halaman pertama kali dibuka
            $.ajaxSetup({
                headers: {
                    'Csrf-Token': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.data').load('data.php');
        });
    </script>
</body>
</html>
