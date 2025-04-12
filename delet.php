<?php
require 'functionss.php';

$id = $_GET['id'];
if (deleteStudent($conn, $id)) {
    header("Location: indexes.php");
} else {
    echo "Failed to delete.";
}
?>
