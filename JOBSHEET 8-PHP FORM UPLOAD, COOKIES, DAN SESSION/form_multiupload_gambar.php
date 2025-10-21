<!DOCTYPE html>
<html>
<head>
    <title>Multi Upload Gambar</title>
</head>
<body>
    <h2>Unggah Beberapa Gambar Sekaligus</h2>
    <form action="proses_upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="files[]" multiple="multiple" accept=".jpg, .jpeg, .png, .gif">
        <input type="submit" value="Unggah Gambar">
    </form>
</body>
</html>