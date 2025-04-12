<?php
require 'functionss.php';
$id = $_GET['id'];
$student = getStudentById($conn, $id);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $class = $_POST['class'];

    if (updateStudent($conn, $id, $name, $class, $age, $student['city'])) {
        header("Location: indexes.php?msg=Updated successfully");
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<form method="POST">
    <input name="name" value="<?= htmlspecialchars($student['name']) ?>" required>
    <input name="age" type="number" value="<?= $student['age'] ?>" required>
    <input name="class" value="<?= htmlspecialchars($student['class']) ?>" required>
    <button type="submit">Update Student</button>
</form>

</body>
</html>
