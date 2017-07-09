<?php require_once ('app/views/_global/header.php'); ?>

<article my-auto>

    <section class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 py-5">
                <div class="border rounded p-4  mt-5 mb-5">
                    <header class="text-center">
                        <h3>Da li želite da obrišete proizvod? <br>
                        <p class="mt-5 mb-5"><?php echo htmlspecialchars($DATA['product']->name);?></p></h3> 
                    </header>
                    <form class="text-center" method="post" action="<?php echo Configuration::BASE_URL; ?>admin/proizvodi/delete/<?php echo $DATA['product']->product_id;?>">
                        <input type="hidden" name="confirmed" value="1">
                        <button type="submit" class="btn btn-danger">Obriši proizvod</button>
                        <a class="btn btn-primary" href="<?php echo Configuration::BASE_URL; ?>admin/proizvodi">Odustani</a>
                    </form>
                    <?php if (isset($DATA['message'])): ?>
                        <p><?php echo htmlspecialchars($DATA['message']); ?></p>   
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</article>
<?php require_once ('app/views/_global/footer.php'); ?>
    