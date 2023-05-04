<?php require APP_ROOT . '/views/inc/header.php'; ?>
<a href="<?php echo URL_ROOT; ?>/posts" class="btn btn-light"> <i class="fa-solid fa-arrow-left"></i> Go Back</a>
<br>
<h1><?php echo $data['post']->title; ?></h1>
<?php require APP_ROOT . '/views/inc/footer.php'; ?>
