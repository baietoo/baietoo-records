<?php require APP_ROOT . '/views/inc/header.php'; ?>
<div class="row">
    <div class="col-md6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Creeaza-ti contul de artist</h2>
            <p>Te ajutam sa iti impartasesti muzica!</p>

            <!-- FORM -->
            <form action="<?php echo URL_ROOT; ?>/artists/register" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Numele Artistului</label>
                    <input 
                    type="text"
                    class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $data['name']; ?>"
                    id="name" name="name">
                    <span class="invalid-feedback"> <?php echo $data['name_err']; ?> </span>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Adresa email</label>
                    <input type="email"
                    class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $data['email']; ?>"
                    id="email" name="email" aria-describedby="emailHelp">
                    <!-- <div id="emailHelp" class="form-text">Ramane intre noi, nu il transmitem nimanui.</div> -->
                    <span class="invalid-feedback"> <?php echo $data['email_err']; ?> </span>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Parola</label>
                    <input type="password"
                    class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $data['password']; ?>"
                    id="password" name="password">
                    <span class="invalid-feedback"> <?php echo $data['password_err']; ?> </span>
                </div>
                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirma Parola</label>
                    <input type="password"
                    class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"
                    value="<?php echo $data['confirm_password']; ?>"
                    id="confirm_password" name="confirm_password">
                    <!-- <div id="emailHelp" class="form-text">Mai baga o data parola sa vedem daca e la fel.</div> -->
                    <span class="invalid-feedback"> <?php echo $data['confirm_password_err']; ?> </span>
                </div>
                <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <div class="row">
                    <div class="col">
                        <button type="submit" value="register" class="btn btn-success btn-block">Inregistrare</button>
                    </div>
                    <div class="col">
                        <a href="<?php echo URL_ROOT; ?>/artists/login" class="btn btn-light btn-block">
                        Ai deja cont la noi?
                        </a>
                    </div>
                </div>

            </form>


        </div>
    </div>
</div>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>