<?php require APP_ROOT . '/views/inc/header.php'; ?>

<div class="row mb-3 justify-content-between">
    <div class="col-4">
        <h1>Posts</h1>
    </div>
    <div class="col-4">
        <a href="<?php echo URL_ROOT ?>/posts/add" class="btn btn-primary pull-right">
            <i class="fa-solid fa-pen-nib"></i> Add post
        </a>
    </div>
</div>

<?php foreach ($data['posts'] as $post): ?>
    <div class="card card-body mb-3">
        <h4 class="card-title">
            <?php echo $post->title; ?>
        </h4>
        <div class="bg-light p-2 mb-3">
            Written by
            <?php echo $post->name; ?> on
            <?php echo $post->p_date_created; ?>
        </div>
        <p class="card-text">
            <?php echo $post->body; ?>
        </p>
        <!-- TODO: play a song not working yet, how to get the blob from mysql -->
        <!-- upload song to a folder and store filepath to mysql -->
        <!-- then include it as audio here -->

        <a href="<?php echo URL_ROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">More</a>
    </div>
<?php endforeach; ?>

<?php require APP_ROOT . '/views/inc/footer.php'; ?>