<?php require_once 'app/views/_global/header.php'; ?>

    <main>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" >
                <div class="carousel-item active">
                    <img class="img-fluid" src="<?php echo Configuration::BASE_URL ?>/assets/img/carousel01.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="img-fluid" src="<?php echo Configuration::BASE_URL ?>/assets/img/carousel02.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="img-fluid" src="<?php echo Configuration::BASE_URL ?>/assets/img/carousel03.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="container">
            <h3>Najnoviji proizvodi</h3>
            <section class="proizvodi">
                <?php foreach (@$DATA['products'] as $product): ?>
                <form method="post" action="">

                    <div class="proizvod">
                        <a href="<?php echo Misc::link('product/' . $product->id); ?>">
                            <figure>
                                <img src="<?php echo Configuration::BASE_URL ?>assets/img/<?php echo $product->product_id?>.jpg">
                                <figcaption><?php echo htmlspecialchars($product->name); ?></figcaption>
                            </figure>
                        </a>
                        <div class="detalji-proizvoda">
                            <p><?php echo htmlspecialchars($product->amount); ?> din.</p>
                            <input type="number" hidden name="proizvod" value="<?php echo htmlspecialchars($product->product_id); ?>">
                            <input type="submit" href="korpa.php" value="Add to cart" class="btn btn-primary btn-sm">
                        </div>
                    </div>
                </form> 
                <?php endforeach; ?>
                    
            </section>
        </div>
        <div class="clearfix"></div>
        <article class="izjave-nasih-kupaca">
            <div class="container">
                <article class="izjave">
                    <div class="izjava-kupca">
                        <div class="kupac">
                            <div class="slika-kupca">
                                <img src="<?php echo Configuration::BASE_URL ?>/assets/img/kupac1.jpg" alt="">
                            </div>
                            <div class="ime-kupca">
                                <h6><strong>Petar Petrovic</strong></h6>
                            </div>
                        </div>
                        <div class="izjava">
                            <p>
                                <em>"Veliki izbor muskih satova po najpovoljnijim cenama."</em>
                            </p>
                        </div>
                    </div>
                    <div class="izjava-kupca">
                        <div class="kupac">
                            <div class="slika-kupca">
                                <img src="<?php echo Configuration::BASE_URL ?>/assets/img/kupac2.jpg" alt="">
                            </div>
                            <div class="ime-kupca">
                                <h6><strong>Milica Nedic</strong></h6>
                            </div>
                        </div>
                        <div class="izjava">
                            <p>
                                <em>"Ljubazni ljudi sa najboljim i najpovoljnijim satovima."</em>
                            </p>
                        </div>
                    </div>
                    <div class="izjava-kupca">
                        <div class="kupac">
                            <div class="slika-kupca">
                                <img src="<?php echo Configuration::BASE_URL ?>/assets/img/kupac3.jpg" alt="">
                            </div>
                            <div class="ime-kupca">
                                <h6><strong>Danijel Obradovic</strong></h6>
                            </div>
                        </div>
                        <div class="izjava">
                            <p>
                                <em>"Odlican izbor satova sa najpovoljnijim cenama."</em>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </article>

        <div class="container">
            <section class="social-icon">
                <h3>Pratite nas na:</h3>
                <div id="social">
                    <a class="facebookBtn smGlobalBtn" href="https://www.facebook.com/" ></a>
                    <a class="twitterBtn smGlobalBtn" href="https://twitter.com/"></a>
                    <a class="googleplusBtn smGlobalBtn" href="https://plus.google.com/" ></a>
                    <a class="linkedinBtn smGlobalBtn" href="https://www.linkedin.com/uas/login" ></a>
                    <a class="pinterestBtn smGlobalBtn" href="https://www.pinterest.com/" ></a>
                    <a class="tumblrBtn smGlobalBtn" href="https://www.tumblr.com/" ></a>
                    <a class="rssBtn smGlobalBtn" href="https://www.rss.com/" ></a>
                </div>
            </section>
        </div>
    </main>

<?php require_once 'app/views/_global/footer.php'; ?>