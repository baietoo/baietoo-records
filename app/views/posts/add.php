<?php require APP_ROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URL_ROOT; ?>/posts" class="btn btn-light"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
<div class="card card-body bg-light mt-5">
    <h2>Adauga O Piesa</h2>
    <p>minim 15 secunde sa ne putem face o idee</p>

    <!-- FORM -->
    <form action="<?php echo URL_ROOT; ?>/posts/add" method="post" enctype="multipart/form-data">

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

        <div class="mb-3">
            <label for="song_filename" name="song_filename" class="form-label">Incarca melodia</label>
            <input
                type="file"
                class="form-control <?php echo (!empty($data['song_filename_err'])) ? 'is-invalid' : ''; ?>"
                id="song_filename"
                name="song_filename"
                accept=".mp3, .wav"
                multiple
            > <?php echo $data['song_filename']; ?> 
            <span class="invalid-feedback">
                <?php echo $data['song_filename_err']; ?>
            </span>
        </div>

        <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->

        <input type="submit" value="Submit" class="btn btn-success btn-block">


    </form>


</div>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>