<?php 
 require "Model2s/config.php";
 require "Model2s/db.php";
 require "Model2s/product.php";

$product = new Product;

$id=$_POST['id'];
$infoCu=$product->getAllinfobyID($id);
$file= $_FILES['fileUpload'];

$imageFileType = $file['type'];
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" )
{
    return;
    echo "<script> alert('Upload không được vì không phải file ảnh')</script>";
    header("location:../admin/index.php");
}
$pathanh="";
if($file['name']=="")
{

    
    $pathanh=$infoCu[0]['pro_image'];
    
}
else
{
   
    $pathanh=$file['name'];
    move_uploaded_file($file['tmp_name'],"../images/".$file['name']);
}




$name=$_POST['name'];
$manu_id=$_POST['manu_id'];
$type_id=$_POST['type_id'];

$pro_image= $pathanh;

$desc=$_POST['description'];
$price=$_POST['price'];
$feauture=$_POST['feature'];

    if($product->UpdateProc($id,$name,$manu_id,$type_id,$price,$pro_image,$desc,$feauture)>0)
    {
        echo "Upload dc á";
    }
    else
    {
        echo "Upload sao á";
    }




     
 
     
header("location:../admin/index.php");




