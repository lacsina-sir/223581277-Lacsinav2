<?php
include 'db.php';

$sql = "SELECT * FROM anime";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Library</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Anime Library</h1>
        <a href="add.php" class="button">Add New Anime</a>
        <table>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Genre</th>
                <th>Release Year</th>
                <th>Rating</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['title']; ?></td>
                <td><?= $row['genre']; ?></td>
                <td><?= $row['release_year']; ?></td>
                <td><?= $row['rating']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>" class="button">Edit</a>
                    <a href="delete.php?id=<?= $row['id']; ?>" class="button delete">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>
