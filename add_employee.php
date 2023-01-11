<?php
include 'includes/header.php';
require_once 'php_scripts/functions.php';
$errors=[];
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $username = validate_post_input('username');
    $firstname = validate_post_input('firstname');
    $lastname = validate_post_input('lastname');
    $email = validate_post_input('email');
    $password = validate_post_input('password');
    $role = $_POST['role'];
    //Validating image
    if (empty($_FILES['image']['name'])) {
        $image_ext ='png';
        $image_hash = 'default_profile_image';
    } else {
        $image_ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $image_hash = (empty($_FILES['image']['name'])) ? 'default_profile_image.png' : sha1(uniqid());
        if ($_FILES['image']['size'] > 5000000) {
            $errors[] = 'Image size must be less than 5MB';
        } elseif (!in_array($image_ext, ['jpg', 'jpeg', 'png'])) {
            $errors[] = 'Image must be jpg,jpeg or png';
        }
    }
    $image_name = $image_hash . '.' . $image_ext;

    var_dump($username);
    var_dump($firstname);
    var_dump($lastname);
    var_dump($email);
    var_dump($password);
    var_dump($role);
    //Sanitizing user
    if (!$username) {
        $errors['username'] = 'Username is required';
    } elseif (strlen($username) > 255) {
        $errors['username'] = 'Username must be less than 255 characters';
    }
    //Sanitizing firstname
    if (!$firstname) {
        $errors['firstname'] = 'Firstname is required';
    } elseif (strlen($firstname) > 255) {
        $errors['firstname'] = 'Firstname must be less than 255 characters';
    }
    //Sanitizing lastname
    if (!$lastname) {
        $errors['lastname'] = 'Lastname is required';
    } elseif (strlen($lastname) > 255) {
        $errors['lastname'] = 'Lastname must be less than 255 characters';
    }
    //Sanitizing email
    if (!$email) {
        $errors['email'] = 'Email is required';
    } elseif (strlen($email) > 255) {
        $errors['email'] = 'Email must be less than 255 characters';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Not a valid email';
    }
    //Sanitizing password
    if (!$password) {
        $errors['password'] = 'Password is required';
    } elseif (strlen($password) > 255) {
        $errors['password'] = 'Password must be less than 255 characters';
    }
    //Validating role
    if (!$role) {
        $errors['role'] = 'Role is required';
    } elseif (!in_array($role, ['admin', 'user'])) {
        $errors['role'] = 'Role must be admin or user';
    }
    //Validating image



    var_dump($image_name);
    if (empty($errors)) {
        move_uploaded_file($_FILES['image']['tmp_name'], 'assets/images/' . $image_name);
        insert_user($username, $firstname, $lastname, $email, $password, $image_name, $role);
        header('Location: index.php');
    }
}
?>
<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" >
                </div>
                <div class="mb-3">
                    <label for="firstname" class="form-label">Firstname</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" >
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Lastname</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" >
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>
                <div class="mb-3 form-check">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" id="role" class="form-control">
                        <option value="admin">Admin</option>
                        <option value="user">User</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>

</div>




<?php
include 'includes/footer.php';
?>