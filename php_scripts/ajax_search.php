<?php
include 'database.php';
if (isset($_POST['name']) && !empty($_POST['name'])) {
    global $conn;
    $name = '%' . $_POST['name'] . '%';
    $query = 'select * from employees where firstname like ?';
    $stmt = mysqli_prepare($conn, $query);
    $stmt->bind_param('s', $name);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
            echo json_encode($rows);
        }
    } else {
        die('Query failed: ' . $stmt->errno);
    }
}
if (isset($_POST['action']) && $_POST['action'] == 'fetch_all') {
    global $conn;
    $query = 'select * from employees';
    $result = mysqli_query($conn, $query);
    if ($result->num_rows > 0) {
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo json_encode($rows);
    }
}
