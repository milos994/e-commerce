<?php require_once 'app/views/_global/header.php'; ?>

<main>

    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.1879475036053!2d20.454800715159283!3d44.81773557909862!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a6e056c9bb357%3A0x58b1f0ecae30d7a1!2sKneza+Mihaila%2C+Beograd!5e0!3m2!1sen!2srs!4v1490878855463" height="450" style="border:0" allowfullscreen></iframe>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                <section class="form">
                    <h3><?php echo $DATA['title']; ?></h3>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" id="ime" name="ime" placeholder="Unesite vase ime">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="prezime" name="prezime"  placeholder="Unesite vase prezime">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Unesite vas email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="poruka" rows="3" placeholder="Unesite vasu poruku"></textarea>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Posalji</button>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</main>
<?php require_once 'app/views/_global/footer.php'; ?>
