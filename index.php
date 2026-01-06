<?php

include 'config.php'; 
$sql = "SELECT * FROM animals";
$res = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pet Adoption Tunisia</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<header>
    <h1>PetLink</h1>
    <p>Find pets from different regions of Tunisia looking for a loving home.</p>
</header>

<div class="filters">
    <label>
        Type:
        <select id="typeFilter" onchange="filterPets()">
            <option value="All">All</option>
            <option value="Cat">Cat</option>
            <option value="Dog">Dog</option>
            <option value="Rabbit">Rabbit</option>
            <option value="Bird">Bird</option>
            <option value="Others">Others</option> 
        </select>
    </label>
</div>


<div class="animal-grid" id="animalGrid">
<?php while($a = mysqli_fetch_array($res)): ?>
    <div class="animal-card" data-type="<?= $a['type'] ?>">
        <div class="animal-image">
            <img src="images/<?= $a['img'] ?>" alt="<?= $a['name'] ?>" style="width:100%; height:100%; object-fit: cover;">
        </div>
        <div class="animal-info">
            <h3><?= $a['name'] ?> (<?= $a['type'] ?>)</h3>
            <p><strong>Age:</strong> <?= $a['age'] ?></p>
            <p><strong>Breed:</strong> <?= $a['breed'] ?></p>
            <p><strong>Gender:</strong> <?= $a['gender'] ?></p>
            <p><strong>Location:</strong> <?= $a['location'] ?></p>
            <p><strong>Bio:</strong> <?= $a['bio'] ?></p>
            <a href="adopt.php?id=<?= $a['id'] ?>" class="adoption-btn">Interested</a>
        </div>
    </div>
<?php endwhile; ?>
</div>
</div>

<script>
function filterPets() {
    const filter = document.getElementById("typeFilter").value;
    const cards = document.querySelectorAll(".animal-card");

    cards.forEach(card => {
        const type = card.dataset.type;

        if(filter == "All") {
            card.style.display = "block";
        } else if(filter == "Others") {
            if(type != "Cat" && type != "Dog" && type != "Rabbit" && type != "Bird") {
                card.style.display = "block";
            } else {
                card.style.display = "none";
            }
        } else {
            card.style.display = (type == filter) ? "block" : "none";
        }
    });
}

</script>
</body>
</html>
