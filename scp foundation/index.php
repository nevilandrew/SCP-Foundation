<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="scp.css">

    <title>SCP Foundation</title>
  </head>
  <body class="container">

      <header>
          <nav>
    <ul class="nav_links">
        <li><a href="index.php">Home</a></li>
        <li><a href="location.php">location</a></li>
      </ul>
              </nav>
          <a class="cta" href="contact.html"><button>contact</button></a>
         </header>

    
         <?php include 'connection.php'; ?>

<h1>SCP Foundation</h1>

<!-- menu  -->
<div class="row">

    <div  class="col">

        <ul class="nav justify-content-center">
        <!-- loop through db and get item_no field and use as menu text and link -->
         <?php foreach($result as $menu_item): ?>

            <li class="nav-item">
                <a class="nav-link active" class="text-center" href="index.php?subject='<?php echo $menu_item['item']; ?>'">
                <?php echo $menu_item['item']; ?>
                </a>
            </li>

          <?php endforeach; ?>

        </ul>
    </div>
</div>

<!-- recordes are in below -->
<div class="row">
    <div  class="col">
            <?php
                // checking the subject have value 
                if(isset($_GET['subject']))
                {
                    // remove single quotes from subject get value
                    $item_number = trim($_GET['subject'], "'");

                    // run sql command to select record based on get value
                    $record = $connection->query("select * from subject where item='$item_number'") or die($connection->error());

                    // convert $record into an array for us to echo out on screen
                    $row = $record->fetch_assoc();
                    
                    // creating variable that can move data and dispalay
                    $item = $row['item'];
                    $object_class = $row['object_class'];
                    $image = $row['image'];
                    $procedures = $row['procedures'];
                    $description = $row['description'];
                    $Reference = $row['Reference'];

                    // replacing with\n
                    $procedures = str_replace('\n', '<br><br>', $procedures);
                    $description = str_replace('\n', '<br><br>', $description);
                    $Reference = str_replace('\n', '<br><br>', $Reference);
                    
                     //echoing items from database
                    echo "<h2>{$item}</h2>
                          <h3>{$object_class}</h3>
                          <p><img src='{$image}'></p>
                          <h3>Procedures</h3>
                          <p>{$procedures}</p>
                          <h3>Description</h3>
                          <p>{$description}</p>
                          <h3>Reference</h3>
                          <p>{$Reference}</p>";
                }

            ?>
            <! –– bottom design ––> 
            <div class="shine">
            
        <p>.............</p>
            </div>
    </div>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>