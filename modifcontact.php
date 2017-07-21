


<?php
/**
* Page : rendez_vous.php
*/

//--------------------------------------------------------//
//Affichage des erreurs PHP : A mettre AU DEBUT de tes pages !
//--------------------------------------------------------//
//error_reporting(E_ALL);
 
//--------------------------------------------------------//
// Connexion à la BDD
//--------------------------------------------------------//
//require_once("Connexion.php");
$bdd = new PDO('mysql:host=localhost;dbname=applicontact', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//--------------------------------------------------------//
//récupération "porpre" des variables
//--------------------------------------------------------//
   /*$id = isset($_POST["id"]) ? $_POST["id"] : "";
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";
 $prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";
$fonction = isset($_POST["fonction"]) ? $_POST["fonction"] : "";
  $entreprise = isset($_POST["entreprise"]) ? $_POST["entreprise"] : "";
  $tel = isset($_POST["tel"]) ? $_POST["tel"] : "";
*/
  
  //echo $a;
//--------------------------------------------------------//
//traitement du Submit
//--------------------------------------------------------//

    


error_reporting( ~E_NOTICE );

  $imgFile = $_FILES['image']['name'];
   $tmp_dir = $_FILES['image']['tmp_name'];
   $imgSize = $_FILES['image']['size'];

if (isset($_POST['modif'])) {

 
 
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
    'tel' => $_POST['tel'],
    'id' => $_POST['id'],
    'image'=>$userpic
    
];

$sql = "UPDATE contact SET nom=:nom, prenom=:prenom, fonction=:fonction, entreprise=:entreprise, tel=:tel, image=:image where id=:id";
$status = $bdd->prepare($sql)->execute($row);
header('Location: Acceuil.php');


}

    //Récupération des infrormations du contact si elles existent
//------ --------------------------------------------------//
 $reponse = $bdd->query('SELECT * FROM contact where id='.$_GET['id'].'');     
 
    //On affiche les données dans le formulaire //


while ($donnees = $reponse->fetch())
{
?>

<!DOCTYPE html>
<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="icon" href="image/Ussd.png"/>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.css" />
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-theme.min.css" />
<script type="text/javascript" src="bootstrap/jquery.min.js"></script>
<head><title>Ma page modif</title></head>  
<body>

 <?php 
 //include("Acceuil.php"); 
 ?>

 <h3 class="text-muted">Update:Anthony stevens</h3>
     <hr>


<div class="container" display="inline-block">
   
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">  

<div style="height: 150px; ">
    
    </div><!-- /input-group -->
            
 
              
              

 <form id="form1"  enctype="multipart/form-data"  name="form1" method="POST" action="modifcontact.php">


<input class="input-group" type="file" name="image" accept="image/*" /> 
<img src="upload/<?php echo $donnees['image']; ?>" class="img-rounded" width="250px" height="250px" /></div> 
 <FIELDSET>
  <LEGEND align='top'><h1><fieldset>  MODIFIER UN contact  </fieldset></h1></LEGEND>
  
    
     

                                        <input name="id" type="hidden"  class="form-control" id="id" value="<?php echo $donnees['id']; ?>"/>


      Entrez votre  nouveau nom : <br/> <input class="form-control" type="text" name="nom" id="nom" value="<?php echo $donnees['nom']; ?> "/><br/>
    
    
     entrer votre nouveau prenom: <br/><input name="prenom"  class="form-control" type="text" id="prenom" value="<?php echo $donnees['prenom']; ?>" /><br/>
     
    
      Entrer Votre Fonction : <br/><input  name="fonction"  class="form-control" type="text" id="fonction" value="<?php echo $donnees['fonction']; ?>" /><br/>
    
    
      Entreer votre entreprise : <br/>
     <input  name="entreprise"  class="form-control" type="text" id="entreprise" value="<?php echo $donnees['entreprise']; ?>" /> <br/>
    
      
    
      Entreer  Votre TEL : <br/>
     <input name="tel" type="text"  class="form-control" id="tel" value="<?php echo $donnees['tel']; ?>" /> <br/><br/><br/>
    
     
    
    
     
          <ul class="nav nav-pills" style="float: right;">
               <li role="button"><input name="modif" type="submit" class="btn btn-success" class="ajouter" value="Modifier" /></li>
               <li role="button"><input name="Annuler" type="reset"  class="btn btn-warning" class="Annuler" value="Annuler" onclick='document.form1.action="Acceuil.php?fichier=0";document.form1.submit();'/>
               </li>
           </ul>


                     
     
   
  </FIELDSET>
  
  <?php
 
}
 
$reponse->closeCursor();
 
?>

 </form>

 </div>
      </div>
  </div>
</div>

</body>
</html> 



  