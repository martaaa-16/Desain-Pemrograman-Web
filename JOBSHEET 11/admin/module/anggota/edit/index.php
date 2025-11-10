<div class="container-fluid">
    <div class="row">
        <?php
        require 'admin/template/menu.php';
        $id = $_GET['id'];
        
        // Query untuk mengambil data Anggota, Jabatan, dan User berdasarkan user_id
        $query = "SELECT a.*, j.jabatan, u.username, u.level FROM anggota a, jabatan j, user u WHERE a.jabatan_id = j.id AND a.user_id = u.id AND a.user_id = '$id'";
        $result = mysqli_query($koneksi, $query);
        $row = mysqli_fetch_assoc($result);

        // *** PERBAIKAN PENTING ***
        // Karena semua data digabungkan ke $row, kita tidak perlu $row_anggota dan $row_user lagi.
        // Cukup gunakan $row untuk semua data. 
        // Saya asumsikan Anda ingin menggunakan nilai $row di seluruh formulir.

        // Jika Anda ingin memecah data untuk kejelasan:
        // $nama = $row['nama'];
        // $jabatan_id = $row['jabatan_id'];
        // dll.
        ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Anggota</h1>
            </div>
            
            <form action="fungsi/edit.php?anggota=edit" method="POST">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-header"> Form Edit Anggota
                            </div>
                            <div class="card-body">
                                <input type="hidden" value="<?php echo $row['user_id']; ?>" name="id">
                                
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?= $row['nama']; ?>">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Jabatan:</label>
                                    <select class="form-select" name="jabatan" aria-label="Default select example">
                                        <option selected>Pilih Jabatan</option>
                                        <?php
                                        $query2 = "SELECT * FROM jabatan order by jabatan asc";
                                        $result2 = mysqli_query($koneksi, $query2);
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            ?>
                                            <option value="<?= $row2['id']; ?>" <?= ($row['jabatan_id'] == $row2['id']) ? 'selected' : '' ?>><?= $row2['jabatan']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Jenis Kelamin:</label>
                                    <br>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="L"
                                            <?= ($row['jenis_kelamin'] === "L") ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" value="P"
                                            <?= ($row['jenis_kelamin'] === "P") ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Alamat:</label>
                                    <textarea class="form-control" id="message-text"
                                        name="alamat"><?= $row['alamat']; ?></textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">No Telepon:</label>
                                    <input type="number" name="no_telp" class="form-control" id="recipient-name"
                                        value="<?= $row['no_telp']; ?>">
                                </div>

                                <hr class="border border-primary border-3 opacity-75">

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Username:</label>
                                    <input type="text" name="username" class="form-control" id="recipient-name"
                                        value="<?= $row['username']; ?>">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Password:</label>
                                    <input type="password" name="password" class="form-control" id="recipient-name"
                                        placeholder="Isi hanya jika ingin diubah">
                                </div>

                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Level:</label>
                                    <select class="form-select" name="level" aria-label="Default select example">
                                        <option>Pilih Level</option>
                                        <option value="user" <?= $row['level'] == 'user' ? 'selected' : ''; ?>>User</option>
                                        <option value="admin" <?= $row['level'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary"><i class="fa fa-floppy-o"
                                        aria-hidden="true"></i> Ubah</button>
                                <a href="index.php?page=anggota" class="btn btn-secondary"><i class="fa fa-times"
                                        aria-hidden="true"></i> Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>