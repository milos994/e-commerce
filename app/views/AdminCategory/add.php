<?php require_once 'app/views/_global/admin-header.php'; ?>

<article class="text-center my-5">
    <header>
        <h1 class="mb-5">Dodavanje nove kategorije</h1>
    </header>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 mb-5">
                <div class="border rounded p-4">
                    <form method="post">
                        <label class="pl-3">Ime kategorije: </label>
                        <input class="form-control pl-3" type="text" name="category_name" id="category_name" required><br>
                        <label class="pl-3">Slug: </label>
                        <input class="form-control pl-3" type="text" name="slug" id="slug" required><br>
                        
                        <button class="btn btn-success mt-3" type="submit">Dodaj kategoriju</button>
                        
                    </form>
                </div>
            </div>
        </div>
    </section>
</article>

<?php require_once 'app/views/_global/footer.php'; ?>
