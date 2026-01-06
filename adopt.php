<?php
include'config.php';  
$id = $_GET['id'];
$sql = "SELECT * FROM animals WHERE id='$id'";
$res = mysqli_query($conn, $sql);
$animal = mysqli_fetch_array($res);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    header("Location: thankyou.php?name=" . urlencode($name) . "&pet=" . urlencode($animal['name']));
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Adopt <?= $animal['name'] ?></title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<header>
    <h1>Interested in <?= $animal['name'] ?>?</h1>
</header>

<div class="animal-detail">
    <div class="animal-image-large">
        <img src="images/<?= $animal['img'] ?>" alt="<?= $animal['name'] ?>" style="width:100%; height:100%; object-fit: cover; border-radius:20px;">
    </div>
    <div class="animal-info">
        <h2><?= $animal['name'] ?> (<?= $animal['type'] ?>)</h2>
        <p><strong>Age:</strong> <?= $animal['age'] ?></p>
        <p><strong>Breed:</strong> <?= $animal['breed'] ?></p>
        <p><strong>Location:</strong> <?= $animal['location'] ?></p>
        <p><strong>Bio:</strong> <?= $animal['bio'] ?></p>

        <form class="adoption-form" method="post">
            <h3>Your Contact Information</h3>
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="tel" name="phone" placeholder="Phone Number" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>
</div>
</body>
</html>
