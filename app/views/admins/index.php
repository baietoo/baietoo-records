<?php require APP_ROOT . '/views/inc/header.php'; ?>
<h1>Welcome Admin</h1>
<h2>Tasks for today: </h2>
<!-- TODO: load emails from mailgun
 check if sender is unique
if sender unique insert into emails table
else update emails table body column by appending the new email-->

<?php $emails = readEmails(); ?>
<?php foreach ($emails as $email): ?>
    <div class="card card-body mb-3">
        <h4 class="card-title">
            <?php echo $email['subject']; ?>
        </h4>
        <div class="bg-light p-2 mb-3">
            <?php echo $email['body']; ?>
        </div>
        <p class="card-text">From:
            <?php echo $email['from']; ?>
        </p>
        <div>
            <small>Created on
                <?php echo $email['created_at']; ?>
            </small>
        </div>
        <!-- // butons for delete and reply -->
        <div>
        <div class="btn-group" role="group" aria-label="Basic example">
            <a href="<?php echo URL_ROOT; ?>/admins/deleteEmail/<?php echo $email['id']; ?>" <button type="button"
                class="btn btn-danger">Delete</button>
            </a>
            <a href="<?php echo URL_ROOT; ?>/admins/deleteEmail/<?php echo $email['id']; ?>" <button type="button"
                class="btn btn-success">Reply</button>
            </a>
        </div>
        </div>
    </div>
<?php endforeach; ?>


<?php require APP_ROOT . '/views/inc/footer.php'; ?>