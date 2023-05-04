<?php require APP_ROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URL_ROOT; ?>/posts" class="btn btn-light"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
<br>
<h1><?php echo $data['post']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by <?php echo $data['artist']->name; ?> on <?php echo $data['artist']->date_created; ?>
</div>
<p><?php echo $data['post']->body; ?></p>

<?php if ($data['post']->artist_id == $_SESSION['artist_id']) : ?>
    <hr>
    <?php $edit_path = URL_ROOT . "/posts/edit/{$data['post']->id}"; ?>

    <a href="<?php echo $edit_path ?>" 
        class="btn btn-dark">Edit
    </a>
    <?php $delete_path = URL_ROOT . "/posts/delete/{$data['post']->id}"; ?>
    <form class="pull-right" action="<?php echo $delete_path; ?>" method="post">
        <input type="submit" value="Delete" class="btn btn-danger">
    </form>
<?php endif; ?>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
