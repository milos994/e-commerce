<?php include 'app/views/_global/header.php'; ?>

<article class="text-center my-5">
    <header>
        <h1 class="mb-5">Izmena kategorije</h1>
    </header>
    <form method="post">
        <label for="name">Ime kategorije: </label>
        <input type="text" name="name" id="name" required value="<?php echo htmlspecialchars($DATA['category']->name);?>"><br>
        
        <button type="submit">Izmeni kategoriju</button>
    </form>

</article>

<?php include 'app/views/_global/footer.php'; ?>
