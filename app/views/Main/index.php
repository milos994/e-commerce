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
                <div class="proizvod">
                    <figure>
                        <img src="<?php echo Configuration::BASE_URL ?>/assets/img/ar.jpg" alt="">
                        <figcaption>ARMANI AR1949-10</figcaption>
                    </figure>
                    <div class="detalji-proizvoda">
                        <p>32,900 din.</p>
                        <a href="korpa.php" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Dodaj u korpu</a>
                    </div>
                </div>
                <div class="proizvod">
                    <figure>
                        <img src="<?php echo Configuration::BASE_URL ?>/assets/img/jl.jpg" alt="">
                        <figcaption>JACQUES LEMANS 10MN</figcaption>
                    </figure>
                    <div class="detalji-proizvoda">
                        <p>29,999 din.</p>
                        <a href="korpa.php" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Dodaj u korpu</a>
                    </div>
                </div>
                <div class="proizvod">
                    <figure>
                        <img src="<?php echo Configuration::BASE_URL ?>/assets/img/mkjpg.jpg" alt="">
                        <figcaption>MICHAEL KORS MK6474</figcaption>
                    </figure>
                    <div class="detalji-proizvoda">
                        <p>32,390 din.</p>
                        <a href="korpa.php" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Dodaj u korpu</a>
                    </div>
                </div>
                <div class="proizvod">
                    <figure>
                        <img src="<?php echo Configuration::BASE_URL ?>/assets/img/fossil.jpg" alt="">
                        <figcaption>FOSSIL JR1009-10</figcaption>
                    </figure>
                    <div class="detalji-proizvoda">
                        <p>20,999 din.</p>
                        <a href="korpa.php" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Dodaj u korpu</a>
                    </div>
                </div>
                <div class="proizvod">
                    <figure>
                        <img src="<?php echo Configuration::BASE_URL ?>/assets/img/soliver.jpg" alt="">
                        <figcaption>S.OLIVER SO-227-61</figcaption>
                    </figure>
                    <div class="detalji-proizvoda">
                        <p>10,000 din.</p>
                        <a href="korpa.php" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Dodaj u korpu</a>
                    </div>
                </div>
                <div class="proizvod">
                    <figure>
                        <img src="<?php echo Configuration::BASE_URL ?>/assets/img/citizen.jpg" alt="">
                        <figcaption>CITIZEN BM910-109</figcaption>
                    </figure>
                    <div class="detalji-proizvoda">
                        <p>22,999 din.</p>
                        <a href="korpa.php" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Dodaj u korpu</a>
                    </div>
                </div>
                <div class="proizvod">
                    <figure>
                        <img src="<?php echo Configuration::BASE_URL ?>/assets/img/fosill-z.jpg" alt="">
                        <figcaption>FOSSIL CH308810</figcaption>
                    </figure>
                    <div class="detalji-proizvoda">
                        <p>16,599 din.</p>
                        <a href="korpa.php" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Dodaj u korpu</a>
                    </div>
                </div>
                <div class="proizvod">
                    <figure>
                        <img src="<?php echo Configuration::BASE_URL ?>/assets/img/fosill-1-z.jpg" alt="">
                        <figcaption>FOSSIL ES329-F10</figcaption>
                    </figure>
                    <div class="detalji-proizvoda">
                        <p>12,540 din.</p>
                        <a href="korpa.php" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Dodaj u korpu</a>
                    </div>
                </div>
                <div class="proizvod">
                    <figure>
                        <img src="<?php echo Configuration::BASE_URL ?>/assets/img/mk2.jpg" alt="">
                        <figcaption>MICHAEL KORS MK2618</figcaption>
                    </figure>
                    <div class="detalji-proizvoda">
                        <p>25,100 din.</p>
                        <a href="korpa.php" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Dodaj u korpu</a>
                    </div>
                </div>
                <div class="proizvod">
                    <figure>
                        <img src="<?php echo Configuration::BASE_URL ?>/assets/img/c1.jpg" alt="">
                        <figcaption>CITIZEN CA4215-04W</figcaption>
                    </figure>
                    <div class="detalji-proizvoda">
                        <p>22,091 din.</p>
                        <a href="korpa.php" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Dodaj u korpu</a>
                    </div>
                </div>
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