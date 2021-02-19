<?php
$Name = "";
$Email = "";
$Contact = "";

if(isset($_POST['Find']))
{
       try {
        $conn = new PDO("mysql:host=localhost;dbname=searchform","root","Tarunc1210@");
    } catch (PDOException $exc) {
        echo $exc->getMessage();
        exit();
    }
    
     $Name = $_POST['Name'];
    
     $sql = "SELECT * FROM find WHERE Name= :Name";
    
    $result = $conn->prepare($sql);
    
    $pdo = $result->execute(array(":Name"=>$Name));
    
    if($pdo)
    {
            
        if($result->rowCount()>0)
        {
            foreach($result as $row)
            {
                $Name = $row['Name'];
                $Email = $row['Email'];
                $Contact = $row['Contact'];
            
            }
            }
            else{
            echo 'No Data present';
        } }
}
?>
<!DOCTYPE html>
<html>
<head>
<title> SEARCH DATA </title>
<meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <form action="for.php" method="post" id="body">
        <div id="main">
            <h1 id="one">Search data </h1>
           <label id="a" class="abc" for="id">NAME TO SEARCH :</label>  <input id="b" class="abc" type="text" name="Name" value=""><br><br>

           <div id="oo"><input id="three" type="submit" name="Find" value="Find "></div>
           <div style="margin-left:1.5cm ">OUTPUT:</div> <br><br>
           <label id="a" class="abc" for="id"> EMAIL_ID :</label> <input id="b" class="abc" type="text" name="Email" value="<?php echo $Email;?>"><br><br>

           <label id="a" class="abc" for="id"> CONTACT_NO : </label><input id="b" class="abc" type="text" name="Contact" value="<?php echo $Contact;?>"><br><br>

            </div>
        </form>
       
    </body>

</html>
