<?php
ini_set('display_errors', 1);
require 'includes/init.php';
require 'includes/header.php';

$email = '';
$subject = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $errors = [];

    if ($email == '') {
        $errors[] = 'Please enter email';
    }

    if ($subject == '') {
        $errors[] = 'Please enter subject';
    }

    if ($message == '') {
        $errors[] = 'Please enter message';
    }

    if (empty($errors)) {

    }
}
?>
<div class="card" style="padding: 1%; background-color: aliceblue">
    <h2 id="contact-header">Contact</h2>
    <?php if (! empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $mError): ?>
                <li style="color: red"><?= $mError; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    <form method="post" id="contactForm">
        <div class="form-group">
            <label for="email">Email</label>
            <input value="<?= htmlspecialchars($email);?>" class="form-control" name="email" id="email" type="email" placeholder="Enter email id" style="width: 50%">
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input value="<?= htmlspecialchars($subject);?>" class="form-control" name="subject" id="subject" placeholder="Enter subject" style="width: 50%">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" id="message"
                      style="width: 50%" rows="10" placeholder="Enter message"><?= htmlspecialchars($message);?></textarea>
        </div>
        <button class="btn btn-primary"
                style="background-color: #ea2aea; font-style: initial; font-weight: 500; text-shadow: 2px 2px rebeccapurple">Send</button>
    </form>
</div>

<?php require 'includes/footer.php'; ?>
