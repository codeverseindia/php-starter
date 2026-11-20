<?php
declare(strict_types=1);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/css/styles.css">
  <title>About | <?= e($appName) ?></title>
</head>
<body>
  <header>
    <nav aria-label="Main navigation">
      <a href="/">Home</a>
      <a href="/about" aria-current="page">About</a>
      <a href="/contact">Contact</a>
    </nav>
  </header>
  <main>
    <h1>About <?= e($appName) ?></h1>
    <p>This starter provides a lightweight foundation for building server-rendered PHP applications.</p>
  </main>
</body>
</html>
