<?php require_once 'app/views/_global/header.php'; ?>
<article class="container">
    <div class="row centered-form">
        <div class="col-12 col-md-6 col-lg-6 mx-auto my-5">

            <h3 class="text-center mb-5">Registrujte se na ecommerce</h3>

            <form method="post">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control input-sm" placeholder="Ime">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="surname" id="surname" class="form-control input-sm" placeholder="Prezime">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email adresa">
                </div>
                <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control input-sm" placeholder="Korisnicko ime">
                </div>

                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Lozinka">
                </div>

                <button type="submit" class="btn btn-info btn-block">
                    Registruj se
                </button>
            </form>
        </div>
    </div>
</article>

<?php require_once 'app/views/_global/footer.php'; ?>