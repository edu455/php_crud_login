<?php
include 'includes/header.php';
require_once 'php_scripts/functions.php';
if(isset($_SESSION['username'])){
    header('Location: index.php');
    exit();
}
if(isset($_POST['submit'])){
    $username = validate_post_input('username');
    $password = validate_post_input('password');
    if(!$username){
        $errors['username'] = 'Username is required';
    }else if(strlen($username) > 255){
        $errors['username'] = 'Username must be less than 255 characters';
    }
    if(!$password){
        $errors['password'] = 'Password is required';
    }else if(strlen($password) > 255){
        $errors['password'] = 'Password must be less than 255 characters';
    }
    if(empty($errors)){
        $user = login_user($username,$password);
        if($user){
            $_SESSION['id']=$user['id'];
            $_SESSION['username']=$user['username'];
            $_SESSION['firstname']=$user['firstname'];
            $_SESSION['lastname']=$user['lastname'];
            $_SESSION['email']=$user['email'];
            $_SESSION['role']=$user['role'];
            $_SESSION['image']=$user['image'];
            header('Location: index.php');
            exit();
        }else{
            $errors['login'] = 'Invalid username or password';
        }
    }
}
?>


<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">Login</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Login</button>
                    </form>
                    <a href="register.php">Don't have an account?Sign in</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>