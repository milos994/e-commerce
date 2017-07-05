<?php include 'app/views/_global/header.php'; ?>

<article class="text-center my-5">
    <header>
        <h1 class="mb-5">Izmena proizvoda</h1>
    </header>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 mb-5">
                <div class="border rounded p-4">
                    <form method="post">
                        <label for="name" class="pl-3">Ime proizvoda: </label>
                        <input class="form-control pl-3" type="text" name="name" id="name" required value="<?php echo htmlspecialchars($DATA['product']->name);?>"><br>

                        <label for="short_text" class="pl-3">Kratak opis: </label>
                        <input class="form-control pl-3" type="text" name="short_text" id="short_text" value="<?php echo htmlspecialchars($DATA['product']->short_text);?>"><br>

                        <label for="long_text" class="pl-3">Detaljan opis: </label>
                        <textarea class="form-control pl-3" rows="9" type="text" name="long_text" id="long_text"><?php echo htmlspecialchars($DATA['product']->long_text);?></textarea><br>

                        <label for="cena" class="pl-3">Cena: </label>
                        <input class="form-control pl-3" type="number" name="cena" id="cena" value="<?php echo htmlspecialchars($DATA['product']->amount);?>"><br>

                        <label for="prikaz_sata" class="pl-3">Prikaz sata: </label>
                        <input class="form-control pl-3" type="text" name="prikaz_sata" id="prikaz_sata" value="<?php echo htmlspecialchars($DATA['product']->prikaz_sata);?>"><br>
                        
                        <button class="btn btn-success" type="submit">Izmeni proizvod</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</article>

<?php include 'app/views/_global/footer.php'; ?>
