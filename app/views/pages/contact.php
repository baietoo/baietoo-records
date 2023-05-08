<?php require APP_ROOT . '/views/inc/header.php'; ?>
<div class="card card-body bg-light mt-5">
    <h2>Trimite-ne un mesaj</h2>
    <!-- FORM -->
    <form action="<?php echo URL_ROOT; ?>/pages/contact" method="post">
        <div class="mb-3">
            <label for="InputEmail" name="title" class="form-label">Email-ul tau</label>
            <input type="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                value="<?php echo $data['email']; ?>" id="InputEmail" name="email">
            <span class="invalid-feedback">
                <?php echo $data['email_err']; ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="body" name="body" class="form-label">Mesaj</label>
            <textarea class="form-control <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" id="body"
                name="body"><?php echo $data['body'];?></textarea>
            <span class="invalid-feedback">
                <?php echo $data['body_err']; ?>
            </span>
        </div>
        <input type="submit" value="Submit" class="btn btn-success btn-block">
    </form>
</div>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>