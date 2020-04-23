
<?php

    // Create Database credential variables
    $user = "a30014426";
    $password = "nevilandrews9";
    $db = "a3001442_SCP";

    // Create php db connection object
    $connection = new mysqli('localhost', $user, $password, $db) or die(mysqli_error($connection));

    // Get all data from the table and save in a variable for use on our page application
    $result = $connection->query("select * from subject") or die($connection->error());
//to display items in the webpage
    if(isset($_POST['item']))
    {
        $item = $_POST['item'];//item number heading
        $object_class = $_POST['object_class'];//object class display
        $procedures = $_POST['procedures'];//procides head
        $description = $_POST['description'];//description display
        $image = $_post['image'];
        $Reference = $_post['Reference'];
//retriving data from database
        $mysqli->query("insert into subject(item, object_class,image,procedures,description,Reference) values('$item', '$object_class','$image','$procedures','$description','$Reference')") or die($mysqli->error);

        header("Location: index.php");
    }

?>
