<?php require_once 'app/views/_global/header.php'; ?>

<article class="row">
    <div class="col-12 col-md-6 col-lg-4 mx-auto my-5">
        <h1>Prijava na e-commerce</h1>
        <div class="page-content">
            <form method="post">
                <div class="form-group">
                    <label>Korisničko ime:</label><br>
                    <input type="text" name="username" required class="form-control"
                           pattern="^[A-z0-9_\-\.]{4,32}$" placeholder="Unesite korisničko ime">
                </div>

                <div class="form-group">
                    <label>Lozinka:</label><br>
                    <input type="password" name="password" required class="form-control"
                           pattern="^.{5,}$" placeholder="Unesite lozinku">
                </div>

                <div class="form-group text-right">
                    <button type="submit" class="btn btn-success">
                        Prijavite se
                    </button>
                </div>
            </form>
        </div>
    </div>
</article>

<?php if (isset($DATA['message'])): ?>
<p class="text-center"><?php echo htmlspecialchars($DATA['message']); ?></p>
<?php endif; ?>

<?php require_once 'app/views/_global/footer.php'; ?>
