<?php
require_once "connection17.php"; // Include the database connection file

function getAllStudents($conn){
    $sql = "SELECT * FROM student_system ORDER BY id ASC";
    return $conn->query($sql);
} 

function addstudent($conn, $name, $class, $age, $city){
    $stmt = $conn->prepare("INSERT INTO student_system (name, class, age, city) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $class, $age, $city); // "ssis" means string, string, integer, string
    return $stmt->execute();
}

function getStudentById($conn, $id){
    $stmt = $conn->prepare("SELECT * FROM student_system WHERE id = ? ORDER BY  id Asc");
    $stmt->bind_param("i", $id); // "i" means integer
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function updateStudent($conn, $id, $name, $class, $age, $city){
    $stmt = $conn->prepare("UPDATE student_system SET name = ?, class = ?, age = ?, city = ? WHERE id = ?");
    $stmt->bind_param("siisi", $name, $class, $age, $city, $id); // "ssis" means string, string, integer, string
    return $stmt->execute();
}

function deleteStudent($conn, $id){
    $stmt = $conn->prepare("DELETE FROM student_system WHERE id = ?");
    $stmt->bind_param("i", $id); // "i" means integer
    return $stmt->execute();
}
    
?>