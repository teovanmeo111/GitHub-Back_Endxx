<?php 
 require "Model2s/config.php";
 require "Model2s/db.php";
 require "Model2s/product.php";

$product = new Product;
$pointErr=0;
$file= $_FILES['fileUpload'];




$name=$_POST['name'];
$manu_id=$_POST['manu_id'];
$type_id=$_POST['type_id'];

$pro_image= $file['name'];

$desc=$_POST['description'];
$price=$_POST['price'];
$feauture=$_POST['feature'];

  

// work with files

$file_type=$file['type'];
$file_size=$file['size'];

    if($file_type != "image/jpg" && $file_type != "image/png" && $file_type != "image/jpeg"
    && $file_type != "image/gif" ) {
        $errors[]= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $pointErr=1;
    }
     
    if($file_size > 20971520) {
       $errors[]='Kích thước file không được lớn hơn 20MB';
       $pointErr=1;
    }

     if($pointErr==0)
     {
         
        $product->Product_Add($name,$manu_id,$type_id,$price,$pro_image,$desc,$feauture);
        move_uploaded_file($file['tmp_name'],"../images/".$file['name']);
        echo "Thêm thành công";
     }
     else
     {
         echo $errors;
     }
 
    
     if($pointErr==1)
     {
         echo "Lỗi là: $errors[0]";
     }
     ?>

    <button>  <a href="index.php"> Back   </a> </button>




