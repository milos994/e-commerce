<?php include 'app/views/_global/header.php'; ?>

<article class="text-center my-5">
    <header>
        <h1 class=" text-center mb-5">Dodavanje novog proizvoda</h1>
    </header>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 mb-5">
                <div class="border rounded p-4">
                    <form method="post">
                        <label for="name" class="pl-3">Ime proizvoda: </label>
                        <input type="text" class="form-control pl-3" name="name" id="name" required><br>

                        <label for="short_text" class="pl-3">Kratak opis: </label>
                        <input type="text" name="short_text" class="form-control pl-3" id="short_text"><br>

                        <label for="long_text" class="pl-3">Detaljan opis: </label>
                        <textarea rows="9" type="text" name="long_text" class="form-control pl-3" id="long_text"></textarea><br>

                        <label for="amount" class="pl-3">Cena: </label>
                        <input type="number" class="form-control pl-3" name="amount" id="amount"><br>

                        <label for="prikaz_sata" class="pl-3">Prikaz sata: </label>
                        <input type="text" class="form-control pl-3" name="prikaz_sata" id="prikaz_sata"><br>

                        <button type="submit" class="btn btn-success">Dodaj proizvod</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</article>

<?php include 'app/views/_global/footer.php'; ?>
