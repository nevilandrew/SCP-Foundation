<?php
        
        

    $mysqli = new mysqli('localhost','a30014426','nevilandrews9','a3001442_location') or die(mysqli_error($mysqli));


    if(isset($_POST['name']))
    {
        $name = $_POST['name'];
        $location = $_POST['location'];

        $mysqli ->query("insert into location (name, Location) values('$name','$location')") or die($mysqli->error);
            
            
        header("location: location.php");
    }
  
    
//retrive recods
$result = $mysqli->query("select * from location") or die ($mysqli->error);

if(isset($_GET['delete']))
{

    $id=$_GET['delete'];
    $mysqli ->query("delete from location where id=$id") or die ($mysqli->error);
      //redirect
    header("location: location.php");
}
?>