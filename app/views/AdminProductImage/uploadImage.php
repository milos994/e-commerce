<?php require_once 'app/views/_global/admin-header.php'; ?>

<article class="text-center my-5">
    <header>
        <h1 class="mb-5">Dodavanje nove slike</h1>
    </header>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 mb-5">
                <div class="border rounded p-4">
                    <form method="post" enctype="multipart/form-data">
                        <label class="pl-3" for="image">Izaberite sliku</label>
                        <input class="form-control pl-3" type="file" name="image" id="image" required><br>
                        
                        <button class="btn btn-success mt-3" type="submit">Dodaj sliku</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</article>

<?php require_once 'app/views/_global/footer.php'; ?>
