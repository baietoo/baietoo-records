<?php require APP_ROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <?php flash('register_success'); ?>
            <h2>Pagina de login</h2>
            <p>Hai inapoi in cont!</p>

            <!-- FORM -->
            <form action="<?php echo URL_ROOT; ?>/artists/login" method="post">

                <div class="mb-3">
                    <label for="InputEmail" name="email" class="form-label">Adresa email</label>
                    <input type="email"
                    class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $data['email']; ?>"
                    id="InputEmail" name="email" aria-describedby="emailHelp">
                    <span class="invalid-feedback"> <?php echo $data['email_err']; ?> </span>
                </div>

                <div class="mb-3">
                    <label for="Password" name="password" class="form-label">Parola</label>
                    <input type="password"
                    class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $data['password']; ?>"
                    id="Password" name="password" >
                    <span class="invalid-feedback"> <?php echo $data['password_err']; ?> </span>
                </div>

                <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->

                <div class="row">
                    <div class="col">
                        <button type="submit" value="Login" class="btn btn-success btn-block">Login</button>
                    </div>
                    <div class="col">
                        <a href="<?php echo URL_ROOT; ?>/artists/register" class="btn btn-light btn-block">
                            Nu ai cont la noi?</a>
                    </div>
                </div>

            </form>


        </div>
    </div>
</div>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>