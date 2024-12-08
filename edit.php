<?php
include 'db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM anime WHERE id=$id";
$result = $conn->query($sql);
$anime = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $release_year = $_POST['release_year'];
    $rating = $_POST['rating'];

    $sql = "UPDATE anime SET title='$title', genre='$genre', release_year='$release_year', rating='$rating' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Anime</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Edit Anime</h1>
        <form method="POST">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?= $anime['title']; ?>" required>

            <label for="genre">Genre:</label>
            <input type="text" name="genre" id="genre" value="<?= $anime['genre']; ?>" required>

            <label for="release_year">Release Year:</label>
            <input type="number" name="release_year" id="release_year" value="<?= $anime['release_year']; ?>" required>

            <label for="rating">Rating:</label>
            <input type="number" step="0.1" name="rating" id="rating" value="<?= $anime['rating']; ?>" required>

            <button type="submit">Update Anime</button>
        </form>
    </div>
</body>
</html>
