<?php

$txtName = $_POST["txtName"];
$txtEmail = $_POST["txtEmail"];
$txtNumber = $_POST["txtNumber"];



if(empty($txtName )){
    echo "Name is empty <br>";
}
elseif(!filter_var($txtEmail, FILTER_VALIDATE_EMAIL)){
    echo "email is invaid <br>";
}
elseif(strlen($txtNumber)!= 10 || !filter_var($txtNumber, FILTER_VALIDATE_INT)){
    echo "Phone number is invaid <br>";
}

else{
    echo "all values are valid <br>";
}

echo "vaue received : $txtName   $txtEmail  $txtNumber  ";

?>
