<?php include 'app/views/_global/header.php'; ?>

<article class="text-center my-5">
    <header>
        <h1 class="mb-5">Dodavanje nove kategorije</h1>
    </header>
    <form method="post">
        <label for="name">Ime kategorije: </label>
        <input type="text" name="name" id="name" required><br>
        
        <button type="submit">Dodaj kategoriju</button>
    </form>

</article>

<?php include 'app/views/_global/footer.php'; ?>
