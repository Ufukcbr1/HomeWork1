<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
$servername = "localhost";
$username = "root";
$password = "password";
$database="ibp_project_lab";
// Create connection
$conn = new mysqli($servername, $username, $password,$database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully <br>";


//==========ADD=============
if($_REQUEST['islem']=="add"&&$_SERVER["REQUEST_METHOD"]=="POST"){ 
/*
$_SERVER["REQUEST_METHOD"]=="POST"

Form verilerini işlemek için sadece POST yöntemini kabul edebilirsiniz. Böylece, kullanıcıların URL üzerinden veri göndermesini veya sayfayı yenilemesini önleyebilirsiniz.*/



$fullname=$_REQUEST['namesurname'];
$email=$_REQUEST['email'];
$gender=$_REQUEST['gender'];

$sql="INSERT INTO students(full_name,email,gender) VALUES ('$fullname','$email','$gender')";//  tırnak içinde

$conn->query($sql);  //yürütme kısmı 

echo "Ekleme tamamlandı <br> <br>";
}

?>

*******Add a new student***************

<form action="?islem=add" method="POST">

Full Name:<input type=text name="namesurname" required> <br> <br> 

Email Address:<input type=email name="email" required>  <br>   <br> 

Gender:<input type="radio" name="gender" value= "Male"  required>Male

<input type="radio" name="gender" value= "Female" required>Female
<br><br>
<input type="submit" value="Sumbit">
<br>  <br>  


</form>

************Student List*********




<table border="1" width="550"> 
<tr> 
<td>id</td>
<td>full_name</td>
<td>email </td>
<td>gender</td>
</tr>

<?php 

$sql=("SELECT * FROM students");

foreach( $conn->query($sql) as $row)
{

?>

<tr>

<td><?=$row['id']?></td>  

<td><?=$row['full_name']?> </td>

<td> <?=$row['email']?>  </td>

<td><?=$row['gender']?>  </td> 

</tr>

<?php 

}

?>
</table>






</body>

</html>