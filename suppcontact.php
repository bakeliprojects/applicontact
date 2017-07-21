<?php 
if(isset($_GET['id']))
{
	$password = "";
	$host = "localhost";
	$db = "applicontact";
	$username = "root";
	$connection = new PDO("mysql:dbname=$db;host=$host", $username, $password);

	/*$id=$_GET['id'];
	
	$req="DELETE from contact where id=:id";
	$exe=execute($connection, $req);
header('Location:Acceuil.php');
*/
$id = $_GET['id'];
 $sql = "DELETE FROM contact WHERE id = $id";
 $q = array('id' => $id);
 $req = $connection -> prepare($sql);
 $req -> execute($q);
 header('Location:Acceuil.php');


	if($req)
	{
		echo"<script> alert('le contact  supprimer avec succés');
		 eval(parent.location='suppcontact.php');</script>";
		 header('location:Acceuil.php');
		     
	}
	else
	{
	echo"<script> alert(' le contact n'a pas été supprimer');
	 eval(parent.location='Acceuil.php');</script>";
print("Deleted $req rows.\n");
}
}