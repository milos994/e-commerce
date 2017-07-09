<?php require_once 'app/views/_global/admin-header.php'; ?>

<article class="text-center my-5">
    <header>
        <h1 class="mb-5">Izmena kategorije</h1>
    </header>
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6 mb-5">
                <div class="border rounded p-4">
                    <form method="post" action="<?php echo Configuration::BASE_URL; ?>admin/kategorije/edit/<?php echo $DATA['category']->product_category_id?>">
                        <label class="pl-3" for="category_name">Ime kategorije: </label>
                        <input class="form-control pl-3" type="text" name="category_name" id="category_name" required value="<?php echo htmlspecialchars($DATA['category']->category_name);?>"><br>
                        <label class="pl-3" for="slug">Slug: </label>
                        <input class="form-control pl-3" type="text" name="slug" id="slug" required value="<?php echo htmlspecialchars($DATA['category']->slug);?>"><br>
                        <button class="btn btn-success mt-3" type="submit">Izmeni kategoriju</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</article>

<?php require_once 'app/views/_global/footer.php'; ?>
