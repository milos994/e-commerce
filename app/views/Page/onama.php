<?php require_once 'app/views/_global/header.php'; ?>

<main>
    <div class="slika-radnje"></div>
    <div class="container">
        <div class="opis-radnje">
            <h3><?php echo $DATA['title']; ?></h3>
            <p><?php echo $DATA['prvi_pasus']; ?></p>
            <p><?php echo $DATA['drugi_pasus']; ?></p>
            <p><?php echo $DATA['treci_pasus']; ?></p>
        </div>
    </div>
</main>

<?php require_once 'app/views/_global/footer.php'; ?>
