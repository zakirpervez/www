<?php
ini_set('display_errors', 1);
require 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

}
?>
<div class="card" style="padding: 1%; background-color: aliceblue">
    <h2 id="contact-header">Contact</h2>
    <form method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input class="form-control" name="email" id="email" type="email" placeholder="Enter email id" style="width: 50%">
        </div>
        <div class="form-group">
            <label for="subject">Subject</label>
            <input class="form-control" name="subject" id="subject" placeholder="Enter subject" style="width: 50%">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" id="message"
                      style="width: 50%" rows="10" placeholder="Enter message"> </textarea>
        </div>
        <button class="btn btn-primary"
                style="background-color: #ea2aea; font-style: initial; font-weight: 500; text-shadow: 2px 2px rebeccapurple">Send</button>
    </form>
</div>

<?php require 'includes/footer.php'; ?>
