    




<?php 
// include_once("dbcon.php"); 
$password = "";
$host = "localhost";
$db = "applicontact";
$username = "root";
$connection = new PDO("mysql:dbname=$db;host=$host", $username, $password);

$stmt = $connection->query('SELECT * FROM  contact');
while ($row = $stmt->fetch()) {
    echo $row['nom'] . "\n";
    echo $row['prenom'] . "\n";
    echo $row['fonction'] . "\n";
    echo $row['entreprise'] . "\n";
    echo $row['tel'] . "\n";
}


// if(isset($_POST['save'])){
    
//     $send = $connection->prepare("INSERT INTO contact(nom,prenom,fonction,entreprise,tel) VALUES 
//         (:nom, :prenom, :fonction, :entrprise, :tel)");
//       $send->bindParam(':nom',  $_POST['nom']);
//     $send->bindParam(':prenom',  $_POST['prenom']);
//     $send->bindParam(':fonction',  $_POST['fonction']);
//     $send->bindParam(':entreprise',  $_POST['entreprise']);
//     $send->bindParam(':tel', $_POST['tel']);
//          $send->execute();

// }

if (isset($_POST['save'])) {

$row = [
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'fonction' => $_POST['fonction'],
    'entreprise' => $_POST['entreprise'],
    'tel' => $_POST['tel']
];

$sql = "INSERT INTO contact SET nom=:nom, prenom=:prenom, fonction=:fonction, entreprise=:entreprise, tel=:tel ";
$status = $connection->prepare($sql)->execute($row);

if ($status) {
    $lastId = $connection->lastInsertId();
    echo $lastId;
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

    <div class="container" display="inline-block">
     <h3 class="text-muted">Update:Anthony stevens</h3>
     <hr>


     <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">  <center>
               <img src="images/man.png" class="img-responsive" alt="Some picture" width="100" height="107"></div> </center>
               <div class="col-md-6"><h1>inscriver vous !!!!!</h1>
                   <form name="inscription" method="post" action="Acceuil.php">
                    Entrez votre nom : <br/> <input type="text" name="nom"/> <br/>
                    Entrez votre prenom :  <br/> <input type="text" name="prenom"/><br/>
                    Entrez votre fonction  :   <br/> <input type="text" name="fonction"/> <br/>
                    Entrez votre entreprise :  <br/> <input type="text" name="entreprise"/><br/>
                    Entrez votre tel:  <br/> <input type="text" name="tel"/> <br/>
                    <br/><br/>
                    <ul class="nav nav-pills">

                      <li role="presentation"  ><input type="submit" class="btn btn-succes" name="save"/></li>
                      <li role="presentation"  ><input type="submit" class="btn btn-succes" name="cansel"/></li>
                      
                  </ul>  

              </form>

          </div>
      </div>
  </div>

  <div class="footer">copyright fkdgmail.com : ICAGI_2017</div>
  
</div> 

<script type="text/javascript" src="npm.js"></script>
<script type="text/javascript" src="bootstrap.js"></script>
<script type="text/javascript" src="bootstrap.min.js"></script>

</body>
</html>
//////////////////////////////////////////////
pour modifier
<html>
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    
     <link rel="icon" type="icon" href="image/Ussd.png" />
     <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
     <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
     <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css" />
     <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css" />
     <script type="text/javascript" src="bootstrap/jquery.min.js"></script>\

     

    <head><title>Ma page d'accueil</title></head>  
    <body>
        <div class="container" display="inline-block">
         
           <h3 class="text-muted">Update:Anthony stevens</h3>
          
    
      <hr>


<div class="container-fluid">
        <div class="row">
            <div class="col-md-6"><img src="images/man.png" class="img-responsive" alt="Some picture" width="110" height="107"></div>
            <div class="col-md-6"><h1>inscriver vous !!!!!</h1>
                   

             <form name="inscription" method="post" action=".php">
            Entrez votre nom : <br/> <input type="text" name="nom"/> <br/>
            Entrez votre prenom :  <br/> <input type="text" name="prenom"/><br/>
            Entrez votre fonction  :  <br/> <input type="text" name="fonction"/> <br/>
            Entrez votre entreprise :  <br/> <input type="text" name="entreprise"/><br/>
            Entrez votre tel:  <br/> <input type="text" name="tel"/> <br/>
           <br/><br/>
          <ul class="nav nav-pills">
          
  <li role="presentation"  class="label label-success"><a href="#">SAVE & CLOSE</a></li>
  <li role="presentation" class="label label-warning"><a href="#">CANCEL</a></li>
          </ul>  
        
         </form>

         
      
         
           </div>
        </div>
    </div>

  <div class="footer">copyright fkdgmail.com : ICAGI_2017</div>
  
</div> 

         <script type="text/javascript" src="npm.js"></script>
         <script type="text/javascript" src="bootstrap.js"></script>
         <script type="text/javascript" src="bootstrap.min.js"></script>


 
  </body>
</html>
<?php
// $conn = new PDO("mysql:host=$localhost; dbname=$applicontact, root, "");
// $conn->exec("SET CHARACTER SET utf8");      // Sets encoding UTF-8
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $connection = new PDO('mysql:host=localhost;dbname=applicontact','root', '', $pdo_options


      

 $sql = $connection->query('UPDATE `contact` SET `nom` = :nom, `prenom` = :prenom, `fonction` = :fonction, `entreprise` = :entreprise ,`tel` = :tel WHERE `id` = ".$donnees['id']"');


 
$nombre = $connection->exec($sql);           
if($nombre == 1)
{
    ?>
                 
    <p><strong>La modification a bien été prise en compte !</strong></p>
     
      <?php 
}
else
{
    ?>
                 
    <p><strong>La modification n'a pas été prise en compte !</strong></p>
                         
    <?php
}
$connexion->closeCursor();
?> 

////////////////////////////////////<!-- <?php   
   // try
{
  //  $bdd = new PDO('mysql:host=localhost;dbname=applicontact', 'root', '');
   // $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
}
 
     
// if(isset($_POST['id']))

 //   $sql= $connection->prepare= ('UPDATE `contact`
       // SET
          //  `nom` = \''.$_POST['nom'].'\'
          //  `prenom` = \''.$_POST['prenom'].'\'
          //  `fonction` = \''.$_POST['fonction'].'\'
           // `entreprise` = \''.$_POST['entreprise'].'\'
         //   `tel` = \''.$_POST['tel'].'\'
    //        
       // WHERE
         //   `id` = '.$_POST['id'].');
             
        }
 
 
// /*$reponse = $bdd->query('SELECT * FROM ouvrages WHERE id='.$_GET['id']);
// $donnees = $reponse->fetch();
// echo '<form action="" method="post">
// <input type="text" name="auteur" value="'.$donnees['auteur'].'"/>
// <input type="text" name="prix" value="'.$donnees['prix'].'"/>
// <input type="hidden" name="id" value="'.$donnees['id'].'"/>
// <input type="submit"/>';
 
// ?> --*/>








          <!-- 
     $donnees[id] ;
     $donnees[nom];
     $donnees[prenom];
     $donnees[fonction];
     $donnees[entreprise];
     $donnees[tel];
     
}
 // $sql = "SELECT * 
 //     FROM contact
 //    WHERE id = '.$a.'";


//  $a_datas = ":id"=>$id); 
//  try{ 
//    $stmt = $db->prepare($sql);
//    $retour = $stmt->execute();
//    $result = $stmt->fetchAll() //on stocke les resultats dans un array
//  $array_result = $result[0];
   
//  }catch(Exception $e){
//  echo "Erreur ! " .$e->getMessage();
//  } 
// }
 ?>

 -->

