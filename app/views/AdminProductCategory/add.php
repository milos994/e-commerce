<?php include 'app/views/_global/header.php'; ?>

<article class="text-center my-5">
    <header>
        <h1 class="mb-5">Dodavanje nove kategorije</h1>
    </header>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 mb-5">
                <div class="border rounded p-4">
                    <form method="post">
                        <label class="pl-3" for="name">Ime kategorije: </label>
                        <input class="form-control pl-3" type="text" name="name" id="name" required><br>
                        
                        <button class="btn btn-success mt-3" type="submit">Dodaj kategoriju</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</article>

<?php include 'app/views/_global/footer.php'; ?>
