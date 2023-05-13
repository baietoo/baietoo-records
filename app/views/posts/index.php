<?php require APP_ROOT . '/views/inc/header.php'; ?>
<?php flash('post_message'); ?>

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

        <div class="card">
            <div class="card-body text-center">
                <h5 class="h5 font-weight-bold">
                    <?php echo $post->name; ?> -
                    <?php echo $post->title; ?>
                </h5>
                <?php $audio_src = getFromBucket($post->song_filename); ?>
                <audio controls src="<?php echo $audio_src; ?>">
                    <a href="<?php echo $audio_src; ?>">
                        Download audio
                    </a>
                </audio>

            </div>
        </div>


        <a href="<?php echo URL_ROOT; ?>/posts/show/<?php echo $post->postId; ?>" class="btn btn-dark">More</a>
    </div>
<?php endforeach; ?>

<?php require APP_ROOT . '/views/inc/footer.php'; ?>