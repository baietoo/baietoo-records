<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- MY CSS -->
        <!-- APP_ROOT . '/views/inc/navbar.php' -->
        <?php $my_css_path = URL_ROOT . '/public/css/style.css' ?>
        <link rel="stylesheet" type="text/css" href="<?php echo $my_css_path; ?>" />
        <!-- MY JS script -->
        <?php $my_js_path = URL_ROOT . '/public/js/main.js' ?>
        <script type="module" src="<?php echo $my_js_path; ?>"></script>
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <!-- FONT AWESOME -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css" integrity="sha384-QYIZto+st3yW+o8+5OHfT6S482Zsvz2WfOzpFSXMF9zqeLcFV0/wlZpMtyFcZALm" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- FAVICON -->
        <link rel="icon" type="image/x-icon" href="<?php echo FAVICON ?>">
        <!-- gMaps -->
        <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
        <title>
            <?php echo SITE_NAME; ?>
        </title>
    </head>

    <body>
        <?php require APP_ROOT . '/views/inc/navbar.php' ?>
        <div class="container">
