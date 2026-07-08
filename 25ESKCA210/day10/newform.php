<?php
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $txtName = mysqli_real_escape_string($conn, $_POST['txtName']);
    $txtrollno = mysqli_real_escape_string($conn, $_POST['txtrollno']);
    $Branch = mysqli_real_escape_string($conn, $_POST['Branch']);
    $cgpa =  $_POST['cgpa'];
    $txtphone_no = mysqli_real_escape_string($conn, $_POST['txtphone_no']);
    $pwdpassword = mysqli_real_escape_string($conn, $_POST['pwdpassword']);
}

$sql = "INSERT INTO user (name,  roll_no, branch, cgpa, phone_no, password)
VALUES ('$txtName', '$txtrollno', '$Branch', '$cgpa', '$txtphone_no', '$pwdpassword')";

if (mysqli_query($conn, $sql)){
    echo "Student Registered Successfully.";
}
else{
    echo "Error : " . mysqli_error($conn);
}


$txtName = $_POST["txtName"];
$txtrollno = $_POST["txtrollno"];
$Branch = $_POST["Branch"];
$cgpa = $_POST["cgpa"];
$txtphone_no = $_POST["txtphone_no"];
$pwdpassword = $_POST["pwdpassword"];




if(empty($txtName )){
    echo "Name is empty <br>";
}
elseif(empty($txtrollno)){
    echo "ROLL NO is empty <br>";
}
elseif(empty($Branch)){
    echo "Branch is empty <br>";
}
elseif(empty($cgpa)){
    echo "cgpa is empty  <br>";
}
elseif(strlen($txtphone_no)!= 10 || !filter_var($txtphone_no, FILTER_VALIDATE_INT)){
    echo "Phone number is invaid <br>";
}
elseif(empty($pwdpassword)){
    echo "Password is empty <br>";
}
else{
    echo "all values are valid <br>";
}

echo "vaue received : $txtName   $txtrollno   $Branch  $cgpa $txtphone_no  $pwdpassword ";


?>
