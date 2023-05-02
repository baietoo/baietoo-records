<?php require APP_ROOT . '/views/inc/header.php'; ?>

<div class="row">
    <div class="col-md-6">
        <h1>Posts</h1>
    </div>
    <div class="col-md-6">
        <a href="<?php echo URL_ROOT ?>/posts/add" class="btn btn-primary pull-right">
            <i class="fa-solid fa-pen-nib"></i> Add post
        </a>
    </div>
</div>

<h1><?php echo $data['title']; ?></h1>
<p><?php echo $data['description']; ?></p>

<?php require APP_ROOT . '/views/inc/footer.php'; ?>
