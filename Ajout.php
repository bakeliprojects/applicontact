<?php 
// include_once("dbcon.php"); 
$password = "";
$host = "localhost";
$db = "applicontact";
$username = "root";
$connection = new PDO("mysql:dbname=$db;host=$host", $username, $password);

/*$stmt = $connection->query('SELECT * FROM  contact');
while ($row = $stmt->fetch()) {
    echo $row['nom'] . "\n";
    echo $row['prenom'] . "\n";
    echo $row['fonction'] . "\n";
    echo $row['entreprise'] . "\n";
    echo $row['tel'] . "\n";
}*/
  
error_reporting( ~E_NOTICE );

  $imgFile = $_FILES['image']['name'];
   $tmp_dir = $_FILES['image']['tmp_name'];
   $imgSize = $_FILES['image']['size'];

if (isset($_POST['save'])) {

 
 
   $upload_dir = 'upload/'; // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;
    
   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 5000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$userpic);
    }
    
  }


$row = [
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'fonction' => $_POST['fonction'],
    'entreprise' => $_POST['entreprise'],
    'tel'=> $_POST['tel'], 
    'image'=>$userpic
    
];
  

$sql = "INSERT INTO contact SET nom=:nom, prenom=:prenom, fonction=:fonction, entreprise=:entreprise, tel=:tel, image=:image";
$status = $connection->prepare($sql)->execute($row);

if ($status) {
    $lastId = $connection->lastInsertId();
   // echo $lastId;
}
}
?>


<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="icon" href="image/Ussd.png" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css" />
<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
<head><title>Ma page d'accueil</title></head>  
<body>


<h3 class="text-muted">new costomer</h3>
     <hr>

    <div class="container" display="inline-block">
     

     <div class="container-fluid" >
        <div class="row">
            <div class="col-md-6">  

          <div style="height: 150px; "></div>  
               <form name="inscription"  enctype="multipart/form-data" method="post" action="Ajout.php">
             <!--  <img src="images/man.png" class="img-responsive" alt="Some picture" width="160" height="107"></div>  -->
             <input class="input-group" type="file" name="image" accept="image/*" /> IMAGE</div> 

               <div class="col-md-6"><h1>inscriver vous !!!!!</h1>
                   
                    <h>Entrez votre nom : </h2> <br/> <input class="form-control" type="text" placeholder="Your name" name="nom"/> <br/>
                    Entrez votre prenom :  <br/> <input class="form-control" type="text" name="prenom"/><br/>
                    Entrez votre fonction :   <br/> <input class="form-control" type="text" name="fonction"/> <br/>
                    Entrez votre entreprise :  <br/> <input class="form-control" type="text" name="entreprise"/><br/>
                    Entrez votre tel:  <br/> <input class="form-control" type="text" name="tel"/> <br/> <br/>
                     
                    <ul class="nav nav-pills" style="float: right;">
                      
                      <li role="button"><input type="submit" class="btn btn-success" name="save" value="AJOUTER" /></li>

                      <li role="button"> 
                     <input name="Annuler" type="reset"  class="btn btn-warning" class="Annuler" value="CANCEL" onclick='document.form1.action="Acceuil.php?fichier=0";document.form1.submit();'/></li>
                   </ul>
                    
              </form>

          </div>
      </div>
  </div>
</div>

<div class="panel panel-default">
  
  <div class="panel-footer">copyright fkdgmail.com : ICAGI_2017</div>
  
</div> 

<script type="text/javascript" src="npm.js"></script>
<script type="text/javascript" src="bootstrap.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>

</body>
</html>