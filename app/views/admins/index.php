<?php require APP_ROOT . '/views/inc/header.php'; ?>
<h1>Welcome Admin</h1>
<h2>Tasks for today: </h2>
<!-- load emails from mailgun -->
<?php $emails = readEmails(); ?>
<?php foreach($emails as $email): ?>
    <div class="card card-body mb-3">
        <h4 class="card-title"><?php echo $email['subject']; ?></h4>
        <div class="bg-light p-2 mb-3">
            <?php echo $email['body']; ?>
        </div>
        <p class="card-text">From: <?php echo $email['from']; ?></p>
    </div>
<?php endforeach; ?>


<?php require APP_ROOT . '/views/inc/footer.php'; ?>