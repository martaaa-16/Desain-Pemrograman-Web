<?php include 'header.php'; ?>

<section class="gallery">
    <h2>Our Gallery</h2>
    <div class="grid">
        <?php
        $images = glob("img/gallery/*.jpg");
        foreach($images as $img){
            $caption = ucfirst(str_replace(['-', '_', '.jpg'], [' ', ' ', ''], basename($img)));
            echo "
                <div class='grid-item'>
                    <img src='$img' alt='$caption'>
                    <p class='caption'>$caption</p>
                </div>
            ";  
        }
        ?>
    </div>
</section>
<?php include 'footer.php'; ?>