<?php require_once 'app/views/_global/admin-header.php'; ?>

<article class="text-center my-5">
    <header>
        <h1 class="mb-5">Izmena proizvoda</h1>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 mb-5">
                <div class="border rounded p-4">
                    <form method="post" action="<?php echo Configuration::BASE_URL; ?>admin/proizvodi/edit/<?php echo htmlspecialchars($DATA['proizvod']->product_id);?>">
                        <label class="pl-3">Ime proizvoda: </label>
                        <input class="form-control pl-3" type="text" name="name" id="name" 
                            pattern="([A-Za-z 0-9.,]+)" title="Ime proizvoda mora poceti velikim slovom!" required value="<?php echo htmlspecialchars($DATA['proizvod']->name);?>"><br>

                        <label class="pl-3">Kratak opis: </label>
                        <input class="form-control pl-3" type="text" name="short_text" id="short_text"
                              pattern="([A-Za-z 0-9.,]+)" title="Kratak opis proizvoda mora poceti velikim slovom!" value="<?php echo htmlspecialchars($DATA['proizvod']->short_text);?>"><br>

                        <label class="pl-3">Detaljan opis: </label>
                        <textarea class="form-control pl-3" rows="9"  name="long_text"
                                id="long_text"><?php echo htmlspecialchars($DATA['proizvod']->long_text);?></textarea><br>

                        <label class="pl-3">Cena: </label>
                        <input class="form-control pl-3" type="number" name="amount"
                               id="cena" value="<?php echo htmlspecialchars($DATA['proizvod']->amount);?>"><br>

                        <label class="pl-3">Prikaz sata: </label>
                         <input type="radio" name="prikaz_sata" value="Analogni">Analogni<br>
                         <input type="radio" name="prikaz_sata" value="Digitalni">Digitalni<br>
                         <label class="pl-3">Active: </label>
                         <input type="radio" name="active" value="y">Yes<br>
                         <input type="radio" name="active" value="n">No<br>
                         
                         <label class="pl-3">Kategorija: </label><br>
                        <?php foreach ($DATA['kategorije'] as $kategorija):
                            ?>
                        <input type="radio" name="kategorija" value="<?php echo $kategorija->product_category_id;?>"><?php echo $kategorija->category_name;?><br>

                            <?php
                        endforeach;
                        ?>
                        
                        <button class="btn btn-success" type="submit">Izmeni proizvod</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</article>

<?php require_once 'app/views/_global/footer.php'; ?>
