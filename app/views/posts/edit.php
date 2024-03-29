<?php require APP_ROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URL_ROOT; ?>/posts" class="btn btn-light"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
<div class="card card-body bg-light mt-5">
    <h2>Editeaza melodia</h2>
    <p>poti schimba si fisierul audio daca doresti</p>

    <!-- FORM -->
    <?php $edit_path = URL_ROOT . "/posts/edit/{$data['id']}"; ?>
    <form action="<?php echo $edit_path; ?>" method="post">

        <div class="mb-3">
            <label for="InputTitle" name="title" class="form-label">Song Name</label>
            <input type="text" class="form-control <?php echo (!empty($data['title_err'])) ? 'is-invalid' : ''; ?>"
                value="<?php echo $data['title']; ?>" id="InputTitle" name="title">
            <span class="invalid-feedback">
                <?php echo $data['title_err']; ?>
            </span>
        </div>

        <div class="mb-3">
            <label for="body" name="body" class="form-label">Descriere</label>
            <textarea class="form-control <?php echo (!empty($data['body_err'])) ? 'is-invalid' : ''; ?>" id="body"
                name="body"><?php echo $data['body'];?></textarea>
            <span class="invalid-feedback">
                <?php echo $data['body_err']; ?>
            </span>
        </div>

        <!-- <div class="mb-3">
            <label for="song" name="song" class="form-label">Incarca melodia</label>
            <input
                type="file"
                class="form-control <?php // echo (!empty($data['song_err'])) ? 'is-invalid' : ''; ?>"
                id="song"
                name="song"
                accept=".mp3, .wav"
                multiple
            > <?php // echo $data['song']; ?> 
            <span class="invalid-feedback">
                <?php // echo $data['song_err']; ?>
            </span>
        </div> -->

        <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->

        <input type="submit" value="Submit" class="btn btn-success btn-block">


    </form>


</div>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>