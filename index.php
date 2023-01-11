<?php
include 'includes/header.php';
require_once 'php_scripts/functions.php';
if (isset($_GET['delete_id']) && fetch_user($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    delete_user($id);
    header('Location: index.php');
    exit();
} elseif (isset($_GET['delete_id'])) {
    header('Location: index.php');
    exit();
}
?>

<div class="container mt-5">
    <h1 class="text-center">Employees</h1>
    <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
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
        <tbody>
            <?php foreach (fetch_all_users() as $user) :; ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['username']; ?></td>
                    <td><?php echo $user['firstname']; ?></td>
                    <td><?php echo $user['lastname']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['password']; ?></td>
                    <td><img src="assets/images/<?php echo $user['image']; ?>" alt="" style="width: 64px;"></td>
                    <td><?php echo $user['role']; ?></td>
                    <td>
                        <a href="update_employee.php?id=<?php echo $user['id']; ?>" class="btn btn-primary">Edit</a>
                        <a href="?delete_id=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include 'includes/footer.php'; ?>