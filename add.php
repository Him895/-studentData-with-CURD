<?php 
require 'functionss.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $class = $_POST['class'];
    $age = $_POST['age'];
    $city = $_POST['city'];

    if(addstudent($conn, $name, $class, $age, $city)){
         header("Location: indexes.php?msg=Student added successfully");
         exit;
        
    } else {
        $error = "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link CSS here -->
</head>
<body>

<form action="" method="post">
    <?php if (isset($error)): ?>
        <div class="message"><?= $error ?></div>
    <?php endif; ?>

    <input type="text" name="name" placeholder="Name" required>
    <input type="number" name="class" placeholder="Class" required>
    <input type="number" name="age" placeholder="Age" required>
    <input type="text" name="city" placeholder="City" required>
    <button type="submit">Add Student</button>
</form>

</body>
</html>
