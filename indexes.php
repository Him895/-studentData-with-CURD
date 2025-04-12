<?php
require 'functionss.php';
require 'connection17.php';
$students = getAllStudents($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<a href="add.php" class="add-btn">+ Add Student</a>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Class</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = $students->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['age'] ?></td>
            <td><?= $row['class'] ?></td>
            <td class="action-links">
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> |
                <a href="delet.php?id=<?= $row['id'] ?>" class="delete" onclick="return confirm('Delete?')">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
</table>

</body>
</html>
