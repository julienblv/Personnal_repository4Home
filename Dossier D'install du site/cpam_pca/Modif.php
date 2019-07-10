
<?php 
session_save_path();
session_start();
if(isset($_POST) && !empty($_POST['id']))
{
    extract($_POST);
}

// notre session ci dessus qui nous permet de récupérer l'id //
?>


<!DOCTYPE html>
<html lang="fr">

<head>


<link rel ="stylesheet" href="http://localhost/cpam_pca/bootstrap.min.css">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
<link rel="stylesheet"  href="Style.css" type="text/css">
</head>



<body>

<div class="container-fluid">
    <h1 class="txttitre2"> CPAM PCA </h1>

    <div class='liens'>
<meta http-equiv="Content-type" content="text/html"/>
<li id='liens'><a href="http://localhost/cpam_pca/Login.php"> Deconnexion ?</a></li>
<li id='liens'><a href="http://localhost/cpam_pca/Modif.php"> Modifier le contact ?</a></li>
<li id='liens'><a href="http://localhost/cpam_pca/Annuaire.php"> Retour à la liste ?</a></li>
<br/>
</div>


</div>



<?php

$_SESSION['id'];

//récup d'un formulaire qui permet de voir si c'est un admin ou user connect

$id=$_SESSION['id'];


$user="root";
$pass="";
$dbh = new PDO('mysql:host=localhost;dbname=annuaire', $user, $pass);

$req=$dbh->query("SELECT * FROM annuaire_comite_alerte WHERE id like '$id'");


while($resulta = $req->fetch()){
    echo"<div class='txtblock2'>";
    echo "<br>";
    echo "<br>";
    echo "<b>Nom</b>  ";
    echo "<input type='txtbox' value='". $resulta['nom']."'/><br><br>";
    echo "<b>Batiment</b>";
    echo "<input type='txtbox' value=' ". $resulta['batiment']."'/><br><br>";
    echo "<b>Etage</b>  ";
    echo "<input type='txtbox' value=' ". $resulta['etage']."'/><br><br>";
    echo "<b>Fixe</b>  ";
    echo "<input type='txtbox' value=' ". $resulta['fixe']."'/><br><br>";
    echo "<b>Portable</b>  ";
    echo "<input type='txtbox' value=' ". $resulta['portable']."'/><br><br>";
    echo "<b>Niveau</b>  ";
    echo "<input type='txtbox' value=' ". $resulta['niveau']."'/><br><br>";
    echo "<b>Fonction</b>  ";
    echo "<input type='txtbox' value=' ". $resulta['fonction']."'/><br><br>";
    echo "<b>Type</b>  ";
    echo "<input type='txtbox' value=' ". $resulta['type']."'/><br><br>";
    echo"</div>";
}
?>

<form method="POST" action="http://localhost/cpam_pca/Modif.php">


<?php

$nom=$resulta['nom'];
$batiment=$resulta['batiment'];
$etage=$resulta['etage'];
$fixe=$resulta['fixe'];
$portable=$resulta['portable'];
$niveau=$resulta['niveau'];
$fonction=$resulta['fonction'];
$type=$resulta['type'];




?>


<input type="Submit" class="button_center2" value="modifier le contact" name ="push">

</form>

<?php 

//insertion dans la database :
if(isset($_POST['push'])){
        
        // set the PDO error mode to exception
    
        // on utilise  exec() car la variable ne retourne rien 
        $result=$dbh->prepare("INSERT INTO 'annuaire_comite_alerte' ('nom', 'batiment', 'etage', 'fixe', 'portable', 'niveau', 'fonction', 'type')
        VALUES (?, ?, ?, ?, ?, ?, ?, ?");
        $result->execute(array($nom,$batiment,$etage,$fixe,$fonction,$portable,$niveau,$type));
        echo "New record created successfully";
        echo"<li><a href='http://localhost/cpam_pca/Annuaire.php'>Cliquez ici pour retourner sur la liste</a></li>";
        }
   
else{
        echo"insertion failed";
    }
?>
</form>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>