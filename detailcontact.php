
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
 <div class="panel panel-default">
<TABLE BORDER="2" class="table">
  <CAPTION> liste des contacts  </CAPTION>
   <tr class="warning">
 <th> id </th>
 <th> nom</th>
 <th> prenom </th>
 <th> fonction </th>
 <th> entreprise  </th>
 <th> tel </th>
 <th> IMAGE</th>

  </tr>
  
  
 <?php

    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
    $connection = new PDO('mysql:host=localhost;dbname=applicontact','root', '', $pdo_options);

    //pour recupérer la variable id et aller danslabase et faire la select//
  // $p=$_GET['id'];
 //echo $p;

    // On recupere tout le contenu de la table contact //
$reponse = $connection->query('SELECT id, nom, prenom, fonction, entreprise, tel, image FROM contact where id='.$_GET['id'].'');        


// On affiche le resultat
while ($donnees = $reponse->fetch())
{
    //On affiche les données dans le tableau
    echo "<tr>";
    echo "<td> $donnees[id] </td>";
    echo "<td> $donnees[nom] </td>";
    echo "<td> $donnees[prenom] </td>";
    echo "<td> $donnees[fonction] </td>";
    echo "<td> $donnees[entreprise] </td>";
    echo "<td> $donnees[tel] </td>";
     echo "<td> $donnees[image] </td>";

    echo "</tr>";
     
}

?>
   
</table>
</div>
</body>
</html>
