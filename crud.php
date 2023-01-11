<?php
include 'includes/header.php';
require_once 'php_scripts/functions.php';
if (isset($_SESSION['role']) && $_SESSION['role'] !== 'admin' || !isset($_SESSION['role'])) {
    header('Location: index.php');
    exit();
}
if (isset($_GET['delete_id']) && fetch_user($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete_user($id);
    header('Location: crud.php');
    exit();
} elseif (isset($_GET['delete_id'])) {
    header('Location: crud.php');
    exit();
}
?>

<div class="container mt-5">
    <h1 class="text-center">Employees</h1>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search_bar">
        <a href="add_employee.php" class="btn btn-success">Add Employee</a>
    </form>

    <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">USERNAME</th>
                <th scope="col">FIRSTNAME</th>
                <th scope="col">LASTNAME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">PASSWORD</th>
                <th scope="col">IMAGE</th>
                <th scope="col">ROLE</th>
                <th scope="col">ACTIONS</th>
            </tr>
        </thead>
        <tbody id="main_table">
            <tr>
                <td>4</td>
                <td>e89</td>
                <td>someon</td>
                <td>someon</td>
                <td>someon</td>
                <td>someon</td>
                <td><img src="assets/images/default_profile_image.png" alt="" style="width: 64px;"></td>
                <td>user</td>
                <td>
                    <a href="update_employee.php?id=" class="btn btn-primary">Edit</a>
                    <a href="?delete_id=" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>