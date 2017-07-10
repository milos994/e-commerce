<?php require_once 'app/views/_global/admin-header.php'; ?>

<article class="text-center my-5">
    <header>
        <h1 class=" text-center mb-5">Dodavanje novog proizvoda</h1>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 mb-5">
                <div class="border rounded p-4">
                    <form method="post">
                        <label class="pl-3">Ime proizvoda: </label>
                        <input type="text" class="form-control pl-3" name="name" id="name" required 
                               pattern="([A-Za-z 0-9.,]+)" title="Ime proizvoda mora poceti velikim slovom!"><br>

                        <label  class="pl-3">Kratak opis: </label>
                        <input type="text" name="kopis" class="form-control pl-3" 
                               pattern="([A-Za-z 0-9.,]+)" title="Kratak opis proizvoda mora poceti velikim slovom!" id="short_text"><br>

                        <label class="pl-3">Detaljan opis: </label>
                        <textarea rows="9" name="dopis" class="form-control pl-3" id="long_text"></textarea><br>
                        
                        <label class="pl-3">Prikaz sata: </label>
                         <input type="radio" name="prikaz_sata" value="Analogni">Analogni<br>
                         <input type="radio" name="prikaz_sata" value="Digitalni">Digitalni<br>
                         
                         <label class="pl-3">Active </label>
                         <input type="radio" name="active" value="y">Yes<br>
                         <input type="radio" name="active" value="n">No<br>
                         
                        <label class="pl-3">Cena: </label>
                        <input type="number" class="form-control pl-3" name="cena"
                               id="amount"><br>

                        

                        <label class="pl-3">Kategorija: </label><br>
                        <?php foreach ($DATA['kategorije'] as $kategorija):
                            ?>
                        <input type="radio" name="kategorija" value="<?php echo $kategorija->product_category_id;?>"><?php echo $kategorija->category_name;?><br>

                            <?php
                        endforeach;
                        ?>


                        <button type="submit" class="btn btn-success">Dodaj proizvod</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</article>

<?php require_once 'app/views/_global/footer.php'; ?>
