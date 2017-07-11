<?php require_once 'app/views/_global/header.php'; ?>

<main>
    <div class="container">
        <section class="mt-5">
            <h3><?php echo $DATA['title']; ?></h3>
            <div class="korpa-proizvodi">
                <?php foreach($DATA['proizvodi'] as $proizvod) { ?>
                    <div class="korpa-proizvod">
                        <div class="slika-proizvod"><img src="<?php echo Configuration::BASE_URL ?>assets/img/<?php echo $proizvod->product_id?>.jpg" alt=""></div>
                        <div class="model-proizvod"><p><?php echo $proizvod->name; ?></p></div>
                        <div class="cena-proizvod"><p><?php echo number_format($proizvod->amount, 2, '.', ','); ?> din.</p></div>
                    </div>
                <?php } ?>
                <div class="text-right">
                    <?php if(sizeof($DATA['proizvodi']) > 0) { ?>
                    <form action="<?php echo Misc::link('cart/remove'); ?>" method="post">
                        <input type="hidden" value="<?php echo $DATA['proizvodi'][0]->cart_id; ?>" name="cart_id">
                        <input type="submit" class="btn btn-danger" value="Isprazni korpu">
                    </form>
                    <?php } ?>
                    <form action="<?php echo Misc::link('cart/buy'); ?>">
                        <input type="submit" class="btn btn-success" value="Kupi">
                    </form>
                </div>
            </div>
        </section>
    </div>
</main>

<?php require_once 'app/views/_global/footer.php'; ?>
