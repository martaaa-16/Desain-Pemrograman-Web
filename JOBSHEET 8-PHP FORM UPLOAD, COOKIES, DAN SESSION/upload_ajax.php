<?php
if (isset($_FILES['files'])) {
    $errors = array();
    $allowed_ext = array("jpg", "jpeg", "png", "gif");
    $target_dir = "uploads/";

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $total_files = count($_FILES['files']['name']);

    for ($i = 0; $i < $total_files; $i++) {
        $file_name = $_FILES['files']['name'][$i];
        $file_size = $_FILES['files']['size'][$i];
        $file_tmp = $_FILES['files']['tmp_name'][$i];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        if (!in_array($file_ext, $allowed_ext)) {
            $errors[] = "File $file_name bukan gambar yang valid (hanya JPG, JPEG, PNG, GIF).";
            continue;
        }

        if ($file_size > 2097152) {
            $errors[] = "Ukuran file $file_name terlalu besar (maksimal 2 MB).";
            continue;
        }

        if (move_uploaded_file($file_tmp, $target_dir . $file_name)) {
            echo "<p>File <b>$file_name</b> berhasil diunggah.</p>";
            echo "<img src='$target_dir$file_name' width='200' style='margin:5px;border:1px solid #ccc;'><br>";
        } else {
            $errors[] = "Gagal mengunggah file $file_name.";
        }
    }

    if (!empty($errors)) {
        echo "<hr><b>Kesalahan:</b><br>" . implode("<br>", $errors);
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>