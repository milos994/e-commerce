<?php require_once 'app/views/_global/header.php'; ?>

<h1>Lista kategorija</h1>
<p>
    <?php foreach (@$DATA['products'] as $product): ?>
        <div class="proizvod">
            <figure>
                <a href="<?php echo Misc::link('product/' . $product->id); ?>">
                    <img src="img/ar.jpg" alt="">
                    <figcaption><?php echo htmlspecialchars($product->name); ?></figcaption>
                </a>
            </figure>
            <div class="detalji-proizvoda">
                <p><?php echo htmlspecialchars($product->amount); ?> din.</p>
                <a href="korpa.php" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Dodaj u korpu</a>
            </div>
        </div>
    <?php endforeach; ?>
</p>
<?php require_once 'app/views/_global/footer.php'; ?>