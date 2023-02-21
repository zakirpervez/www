<!DOCTYPE html>
<html>
<head>
    <title>Articles</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        li {
            padding: 0.5%;
        }
    </style>
</head>

<body>
<div class="container">
    <header>
        <h1>Articles</h1>
    </header>
    <nav>
        <ul class="nav">
            <?php if (AuthHelper::isLoggedIn()): ?>
                <li class="nav-item"><a href="/www/">Home</a></li>
                <li class="nav-item"><a href="/www/admin/">Admin</a></li>
                <li class="nav-item"><a href="/www/logout.php">Log out</a></li>
            <?php else : ?>
                <li class="nav-item"><a href="/www/login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
    <main>