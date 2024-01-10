<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natty Bake</title>
    <link rel="shortcut icon" href="<?= base_url() ?>public/Assets/logo.png" type="image/x-icon">
    <?= $this->include("bootstrap") ?> 
    <link rel="stylesheet" href="<?= base_url() ?>public/css/main.css">
   
</head>
<body>
  
    <?= $this->renderSection('content') ?>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="<?= base_url() ?>public/js/main.js"></script>
</body>
</html>
