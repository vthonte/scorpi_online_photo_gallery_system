<?php



//including the database connection file



//Get timestamp for generating id

$registration_time=getdate();



include_once("config.php");


$user_name = mysqli_real_escape_string($mysqli, $_POST['user_name']);

$user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);

$user_password = mysqli_real_escape_string($mysqli, $_POST['user_password']);



$user_recovery_email = mysqli_real_escape_string($mysqli, $_POST['user_recovery_email']);

$registration_date=date("d");
$registration_month=date("m");
$registration_year=date("Y");
$registration_hour=date("H");
$registration_minute=date("i");
$registration_second=date("s");
$registration_initial=$user_name[0];




$user_id= $registration_date.$registration_month.$registration_year.$registration_hour.$registration_minute.$registration_second.$registration_initial;





$query="SELECT * FROM $dbName";




$created_result= mysqli_query($mysqli,$query);



if(!$created_result)
{
$query="CREATE TABLE user (user_id varchar(50),user_name varchar(100),user_email varchar(100),user_password varchar(100),user_recovery_email varchar(100))";




$created_result= mysqli_query($mysqli,$query);

if($created_result)
{

echo ("Table created successfully");
}



}



//insert data to database
$query="INSERT INTO user(user_id,user_name,user_email,user_password,user_recovery_email) VALUES('$user_id','$user_name','$user_email','$user_password','$user_recovery_email')";
$result = mysqli_query($mysqli,$query);


if ($result=1)
{
echo ("updated successfully.");
header("location:workspace.php");
exit();
}
else{
	echo ("Update Failed. Did something went wrong?");
}







?>