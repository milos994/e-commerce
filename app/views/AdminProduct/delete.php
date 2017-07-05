<?php require_once ('app/views/_global/header.php'); ?>

<article class="blok">
    <header>
        <h3>Da li želite da obrišete proizvod? <br> <?php echo htmlspecialchars($DATA['product']->name);?></h3>
    </header>
    
    <form method="post" action="<?php echo Configuration::BASE_URL; ?>admin/proizvodi/delete/<?php echo $DATA['product']->product_id;?>">
        <input type="hidden" name="confirmed" value="1">
        <button type="submit" class="btn btn-danger">Obriši proizvod</button>
        <a href="<?php echo Configuration::BASE_URL; ?>admin/proizvodi">Odustani</a>
    </form>
    <?php if (isset($DATA['message'])): ?>
        <p><?php echo htmlspecialchars($DATA['message']); ?></p>   
    <?php endif; ?>
</article>
<?php require_once ('app/views/_global/footer.php'); ?>
    