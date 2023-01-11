<?php
function validate_post_input($data){
    $input=$_POST[$data]??='';
    return htmlspecialchars(stripslashes($input));
}
function fetch_all_users(){
    global $conn;
    $sql="SELECT * FROM employees";
    $result=mysqli_query($conn,$sql);
    if(mysqli_num_rows($result)>0){
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
    else{
        return [];
    }
}
function fetch_user($id){
    global $conn;
    $query='SELECT * FROM employees WHERE id=?';
    $stmt=mysqli_prepare($conn,$query);
    $stmt->bind_param('s',$id);
    if($stmt->execute()){
        $result=$stmt->get_result();
        if($result->num_rows>0){
            return $result->fetch_assoc();
        }else{
            return [];
        }
    }
    else{
        die("Error: ".$stmt->error);
    }
}
function insert_user($username,$firstname,$lastname,$email,$password,$image,$role){
    global $conn;
    $query='INSERT INTO employees (username,firstname,lastname,email,password,image,role) VALUES(?,?,?,?,?,?,?)';
    $stmt=mysqli_prepare($conn,$query);
    $stmt->bind_param('sssssss',$username,$firstname,$lastname,$email,$password,$image,$role);
    if(!$stmt->execute()){
        die("Error: ".$stmt->error);
    }
}
function update_user($id,$username,$firstname,$lastname,$email,$password,$image,$role){
    global $conn;
    $old_user=fetch_user($id);
    delete_image($old_user['image']);
    $query='UPDATE employees SET username=?,firstname=?,lastname=?,email=?,password=?,image=?,role=? WHERE id=?';
    $stmt=mysqli_prepare($conn,$query);
    $stmt->bind_param('ssssssss',$username,$firstname,$lastname,$email,$password,$image,$role,$id);
    if(!$stmt->execute()){
        die("Error: ".$stmt->error);
    }
}
function delete_user($id){
    global $conn;
    $query='DELETE FROM employees WHERE id=?';
    $stmt=mysqli_prepare($conn,$query);
    $stmt->bind_param('s',$id);
    if(!$stmt->execute()){
        die("Error: ".$stmt->error);
    }
}
function delete_image($name){
    $path='assets/images/'.$name;
    if(file_exists($path)){
        unlink($path);
    }
}