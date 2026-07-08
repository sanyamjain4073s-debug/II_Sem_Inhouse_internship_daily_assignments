<?php
$Name = $_POST["Name"];
$Email = $_POST["Email"];
$phoneNumber = $_POST["phoneNumber"];
$birthDate = $_POST["birthDate"];
$address = $_POST["address"];
$country = $_POST["country"];
$pwdpassword = $_POST["pwdpassword"];
$pwdconfirmpassword = $_POST["pwdconfirmpassword"];



if(empty($Name )){
    echo "Name is empty <br>";
}
elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
    echo "email is invaid <br>";
}
elseif(strlen($phoneNumber)!= 10 || !filter_var($phoneNumber, FILTER_VALIDATE_INT)){
    echo "Phone number is invaid <br>";
}
elseif(empty($address)){
    echo "Address is empty <br>";
}
elseif(empty($birthDate)){
    echo "BirthDate is empty  <br>";
}
elseif(empty($country)){
    echo "Country is empty <br>";
}
elseif(empty($pwdpassword)){
    echo "Password is empty <br>";
}
elseif(empty($pwdconfirmpassword)) {
    echo "Confirm password is not same as password <br>";
}
else{
    echo "all values are valid <br>";
}

echo "vaue received : $Name   $Email  $phoneNumber $address  $birthDate $country $pwdpassword $pwdconfirmpassword";

$folder = "uploads/";

if(!is_dir($folder)){
    mkdir($folder, 0777, true);
}

if(isset($_FILES['myFile'])){
    $allowedTypes = ["jpg","jpeg","png","gif","webp"];
    $extension = strtolower(pathinfo($_FILES['myFile']['name'],PATHINFO_EXTENSION));

    $maxSize = 20 * 1024 * 1024;

    if(!in_array($extension, $allowedTypes)){
        die("Only JPG, JPEG, PNG, GIF, and WEBP files are allowed.");
    }

    if($_FILES['myFile']['size'] > $maxSize){
        die("File size exceeds the maximum limit of 20Mb.");
    }

    $newName = time() . "_" . rand(1000, 9999) . "." . $extension;

    $targetFile = $folder . $newName;

    if(move_uploaded_file($_FILES['myFile']['tmp_name'], $targetFile)){
        echo "Image uploaded successfully: " . $newName;
    }else{
        echo "Error uploading file.";
    }
}

?>
