<?php
      $servername = "localhost";
      $username = "root";
      $password = "Tarunc1210@";
      $dbname = "form";
      
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User info</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div>
        <?php
       $a=$_POST['abc'];
       if(isset($a)){
           $first_name=$_POST['first_name'];
           $last_name=$_POST['last_name'];
           $email=$_POST['email'];
           $contact=$_POST['phone_no'];
        

           $sql ="INSERT INTO info (first_name,Last_name,email_id,contact_no) VALUES (?,?,?,?)";
           $insert=$conn->prepare($sql);
           $result=$insert->execute([$first_name,$last_name,$email, $contact]);
           if($result){
               echo "successfull";
            
           }
           else{
              echo "unsuccessfull";
           }
       }
    
        ?>
    </div>
    <div>
        <form action="index.php" method='post' id="body">
            <div id="main">
                <h1  id="one">Information</h1>
                <div  id="two"> <label for="first_name" id="a" class="abc">First Name:</label> <br>
                <input id="b" class="abc" type="text" name="first_name" required><br>
                 <label id="c" class="abc" for="last_name">Last Name:</label><br>
                <input id="d" class="abc" type="text" name="last_name" required><br>
                <label id="e" class="abc" for="email">Email address:</label><br>
                <input id="f" class="abc" type="text" name="email" required><br>
                <label id="g" class="abc" for="phone_no">Contact no:</label><br>
                <input id="h" class="abc" type="text" name="phone_no" required><br>
                </div>
              <div id="oo"><input  id="three"  type="submit" name="abc" value="Submit">
                </div>
            </div>
        </form>
    </div>
</body>
</html>