<?php
declare(strict_types=1);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/css/styles.css">
  <title><?= e($appName) ?></title>
</head>
<body>
  <header>
    <nav aria-label="Main navigation">
      <a href="/" aria-current="page">Home</a>
      <a href="/about">About</a>
      <a href="/contact">Contact</a>
    </nav>
  </header>
  <main>
    <section>
      <p>LightPHP Core</p>
      <h1>Welcome to <?= e($appName) ?></h1>
      <p>Your application is ready. Start building your project.</p>
    </section>
  </main>
</body>
</html>
