<?php include 'app/views/_global/header.php'; ?>

<article class="text-center my-5">
    <header>
        <h1 class="mb-5">Izmena proizvoda</h1>
    </header>
    <form method="post">
        <label for="name">Ime proizvoda: </label>
        <input type="text" name="name" id="name" required value="<?php echo htmlspecialchars($DATA['product']->name);?>"><br>
        
        <label for="short_text">Kratak opis: </label>
        <input type="text" name="short_text" id="short_text" value="<?php echo htmlspecialchars($DATA['product']->short_text);?>"><br>
        
        <label for="long_text">Detaljan opis: </label>
        <textarea type="text" name="long_text" id="long_text"><?php echo htmlspecialchars($DATA['product']->long_text);?></textarea><br>
        
        <label for="cena">Cena: </label>
        <input type="text" name="cena" id="cena" value="<?php echo htmlspecialchars($DATA['product']->amount);?>"><br>
        
        <label for="prikaz_sata">Prikaz sata: </label>
        <input type="text" name="prikaz_sata" id="prikaz_sata" value="<?php echo htmlspecialchars($DATA['product']->prikaz_sata);?>"><br>
        
        <button type="submit">Izmeni proizvod</button>
    </form>

</article>

<?php include 'app/views/_global/footer.php'; ?>
