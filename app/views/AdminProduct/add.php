<?php include 'app/views/_global/header.php'; ?>

<article class="text-center my-5">
    <header>
        <h1 class="mb-5">Dodavanje novog proizvoda</h1>
    </header>
    <form method="post">
        <label for="name">Ime proizvoda: </label>
        <input type="text" name="name" id="name" required><br>
        
        <label for="short_text">Kratak opis: </label>
        <input type="text" name="short_text" id="short_text"><br>
        
        <label for="long_text">Detaljan opis: </label>
        <textarea type="text" name="long_text" id="long_text"></textarea><br>
        
        <label for="amount">Cena: </label>
        <input type="number" name="amount" id="amount"><br>
        
        <label for="prikaz_sata">Prikaz sata: </label>
        <input type="text" name="prikaz_sata" id="prikaz_sata"><br>
        
        <button type="submit">Dodaj proizvod</button>
    </form>

</article>

<?php include 'app/views/_global/footer.php'; ?>
