<?php include ('app/views/_global/header.php'); ?>

    <main>
        <div class="container">
            <div class="sortirani-proizvodi">
                <section class="sortiranje mt-5 mb-5 mr-5">

                    <div class="card">
                        <div class="card-header" role="tablist" id="headingOne">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Cena
                                </a>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                            <div class="card-block">
                                <form action="cena">
                                    <input type="radio" name="jeftini" value="jeftini"> 5.000din-10.000din<br>
                                    <input type="radio" name="srednji" value="srednji"> 10.000din-15.000din<br>
                                    <input type="radio" name="malo-skuplji" value="malo-skuplji"> 15.000din-25.000din<br>
                                    <input type="radio" name="najskuplji" value="najskuplji"> 25.000din-50.000din<br>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tablist" id="headingTwo">
                                <h5 class="mb-0">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                        Prikaz sata
                                    </a>
                                </h5>
                            </div>

                            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="card-block">
                                    <form action="prikaz-sata">
                                        <input type="radio" name="analogni" value="analogni"> Analogni<br>
                                        <input type="radio" name="digitalni" value="digitalni"> Digitalni<br>
                                        <input type="radio" name="analogno-digitalni" value="analogno-digitalni"> Analogno-Digitalni
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" role="tablist" id="headingThree">
                            <h5 class="mb-0">
                                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Brend
                                </a>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="card-block">
                                <form action="brend">
                                    <input type="radio" name="jacques-lemans" value="jacques-lemans"> FRANCK MULLER<br>
                                    <input type="radio" name="jacques-lemans" value="jacques-lemans"> JACQUES LEMANS<br>
                                    <input type="radio" name="michael-kors" value="michael-kors"> MICHAEL KORS<br>
                                    <input type="radio" name="armani" value="armani"> ARMANI<br>
                                    <input type="radio" name="casio" value="casio"> CASIO<br>
                                    <input type="radio" name="festina" value="festina"> FESTINA<br>
                                    <input type="radio" name="fossil" value="fossil"> FOSSIL<br>
                                    <input type="radio" name="diesel" value="diesel"> DIESEL
                                </form>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="proizvodii mt-5 mb-5">
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
                </section>

            </div>
        </div>
    </main>

    <div class="product-list">

    </div>

<?php include 'app/views/_global/footer.php'; ?>