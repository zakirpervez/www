<?php
require 'includes/init.php';

$database = new Database();
$connection = $database->getDatabaseConnection();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $userData = new UserData();
    $userData->userId = $_POST['username'];
    $userData->password = $_POST['password'];
    $userData->lastLogin = date('Y-m-d');
    if (UserController::atuhenticateUser($connection, $userData)) {
        AuthHelper::login();
        Router::redirect('/www/');
        die('logged in successfully');
    } else {
        $error = 'Please eneter correct username and password';
    }
}
?>

<?php require 'includes/header.php' ?>
<?php if (!empty($error)) : ?>
    <p><?= $error; ?></p>
<?php endif; ?>
<h2>Login</h2>
<form method="post">
    <div class="form-group">
        <label for="username">User name</label>
        <input name="username" id="username" type="email" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input name="password" id="password" type="password" class="form-control"/>
    </div>
    <div>
        <button class="btn">Login</button>
    </div>
</form>
<?php require 'includes/footer.php' ?>