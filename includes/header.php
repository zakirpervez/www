<!DOCTYPE html>
<html>
    <head>
        <title>Articles</title>
        <meta charset="UTF-8">
    </head>

    <body>
        <header>
            <h1>Articles</h1>
        </header>
        <nav>
            <ul>
                <?php if(AuthHelper::isLoggedIn()): ?>
                    <li><a href="/www/">Home</a></li>
                    <li><a href="/www/admin/">Admin</a></li>
                    <li><a href="/www/logout.php">Log out</a></li>
                <?php else : ?>
                    <li><a href="/www/login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <main>