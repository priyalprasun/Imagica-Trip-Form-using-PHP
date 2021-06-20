<?php
$insert=false;
    if(isset($_POST['name'])){
       
        //Set Connection variables
     $server = "localhost";
     $username = "root";
     $password = "";
         
     //Create a database connection
     $con = mysqli_connect($server, $username, $password);

     //Check for connection success
     if(!$con){
         die("Connection to database failed due to" .mysqli_connect_error());
        
     }
     // echo "Success connecting to db";


     // collect post variables
     $name = $_POST['name'];
     $age = $_POST['age'];
     $gender = $_POST['gender'];
     $email = $_POST['email'];
     $phone = $_POST['phone'];
     $desc = $_POST['desc'];
     $sql = "INSERT INTO  `trip` . `imagica` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Other`, `Date`)
     VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp()) ";
     // echo $sql;

    
     // Execute the query

     if($con->query($sql)== true){
        //  echo "Successfully Inserted";


        // Flag for successful insertion
        $insert=true;
     }
     else{
         echo " Error: $sql <br> $con->error ";
        
     }
      

     // close the database connection
     $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Imagica Trip</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100&family=Mate+SC&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.jpg" alt="Imagica">
    <div class="container">
        <h2> Imagica Trip </h2>
        <br>
        <p>Enter details and submit this form to confirm your participation in the trip</p><br>

        <?php
        if($insert==true){
        echo "<p class='submitMsg'>Thankyou for submitting. We are happy to see you joining for the Imagica Trip</p><br>";
        }
        ?>


    <form action="index.php" method="post">
          <input type="text" name="name" id="name" placeholder="Enter your name">
          <input type="text" name="age" id="age" placeholder="Enter your age">
          <input type="text" name="gender" id="gender" placeholder="Enter your gender">
          <input type="email" name="email" id="email" placeholder="Enter your email">
          <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
          <textarea name="desc" id="desc" cols="20" rows="5" placeholder="Enter any other information here"></textarea>
          <br>
          <button class="btn">Submit</button>
          
    </form>
    

    </div>
    <script src="index.js"></script>
     
</body>
</html>