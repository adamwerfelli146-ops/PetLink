<?php
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : "Guest";
$pet = isset($_GET['pet']) ? htmlspecialchars($_GET['pet']) : "the pet";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Thank You!</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container" style="text-align:center; padding:50px;">
    <h1>Thank You, <?= $name ?>!</h1>
    <p>Your interest in adopting <?= $pet ?> has been noted.</p>
    <p>We will contact you soon to follow up on the adoption process.</p>
    <a href="index.php" class="adoption-btn" style="margin-top:30px; display:inline-block;">Back to Pet List</a>
</div>
</body>
</html>
