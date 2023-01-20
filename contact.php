<?php
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $soil_type = $_POST['soil_type'];
  $country = $_POST['country'];
  $state = $_POST['state'];
  $district = $_POST['district'];
  $village = $_POST['village'];
  $rainfall = $_POST['rainfall'];
  
  $groundwater_availability = $_POST['groundwater_availability'];
  $subject = $_POST['subject'];

  //database connection
 

$conn = new mysqli('localhost','root','','testdata1');
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt= $conn->prepare("INSERT INTO contactdb2(firstname,lastname,email,soil_type,country,state,district,village,rainfall,groundwater_availability,subject) VALUES(?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssss",$firstname,$lastname,$email,$soil_type,$country,$state,$district,$village,$rainfall,$groundwater_availability,$subject);
    $output =$stmt->execute();
    echo $output;
    // echo "<h2> registration successfully...</h2>";
    echo "<h2>returning to login page</h2>";
    header('Location: home.html');
    $stmt->close();
    $conn->close();

}
?>