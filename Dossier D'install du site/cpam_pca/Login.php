<?php 
session_start();

if(isset($_POST) && !empty($_POST['login']) && !empty($_POST['mdp'])){
    extract($_POST);
    
//les variables sessions qui vont communiquer via ttes les pages 
//et permettre l'affichage et gestion du site selon si un admin ou user est connecté 
$_SESSION['admin'];

}
?>

<!DOCTYPE html>
<html lang="fr">
<meta http-equiv="Content-type" content="text/html;charset=UTF-8"/>


<head>


<link rel ="stylesheet" href="http://localhost/cpam_pca/bootstrap.min.css">
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet"  href="Style.css" type="text/css">
</head>

<body>

<div class="container-fluid">
    <br/>
<h1 class="txttitre3"> Bienvenue sur l'application CPAM PCA </h1>
<br/>

</div>

<div class="txtblock3">
<form method="POST" action= "http://localhost/cpam_pca/Login.php">
<br/>
<br/>
<b>Login </b>
<input type = 'txtbox' name='login'>
<br/>
<br/>
<b>Password </b>
<input type = 'password'name='mdp'>
<br/>
<br/>
<br/>
<br/>
<div class="password">
<b>VOtre CPAM </b>

<select name="id_cpam">
    <optgroup label="id_cpam">
        <option value="id_cpam">Haute-Garonne_(31)</option>
        <option value="id_cpam">Tarn_et_Garonne_(82)</option>
        <option value="id_cpam">Loire_Atlantique_(44)</option>
</div>
<div class='txtblock'>
<input type = 'submit' style='margin-top :100px'>


</form>



<?php




$login=$_POST['login'];
$mdp=$_POST['mdp'];
$id_cpam=$_POST['id_cpam'];

var_dump($_POST['login']);
var_dump($_POST['mdp']);
var_dump($_POST['id_cpam']);

var_dump($_POST);
    //Partie Utilisateur 

    $user="root";
    $pass="";
    $dbh = new PDO('mysql:host=localhost;dbname=annuaire', $user, $pass);
    
    $req=$dbh->query("SELECT id,id_cpam FROM gestion_des_comptes WHERE login_utilisateur='$login' AND mdp_utilisateur='$mdp'");
    $req2=$dbh->query("SELECT id_cpam FROM gestion_des_comptes WHERE id_cpam='$id_cpam'");

    //affichage bd//





 //affichage admin 
 if ($req=$dbh->query("SELECT '$login',admin_or_not FROM gestion_des_comptes WHERE admin_or_not=1")){
    echo "connecté en tant qu'admin, bienvenue employé: ".$login." ! ";
    //variable pour les autres pages qui gèrera l'affichage 
    $_SESSION['admin']="yes";
}
elseif($req=$dbh->query("SELECT '$login',admin_or_not FROM gestion_des_comptes WHERE admin_or_not=0")){
    //affichage user
    echo "connecté en tant qu'utilisateur, bienvenue employé: ".$login." ! ";
    $_SESSION['admin']="no";
}

$_POST['id_cpam'];
print_r($_POST['id_cpam']);


if($_POST['id_cpam']){

if($_POST['login'] && $_POST['mdp']){
    
        echo"</br>";
        sleep(1);
        sleep(1);    
        sleep(1);
        header('Location: http://localhost/cpam_pca/Annuaire.php');
        //formulaire qui fera que l'utilisateur pourra voir des contacts snas les modifier//
        $uti=$_POST['mdp'];
        }
        
    else {
            echo"les identifiants sont corrects mais la Cpam ne corresponds pas";
        }
    
}

if($_POST['login']!=$login && $_POST['mdp']!=$mdp){
        
    echo "erreur vous devez saisir des identifiants valides, vous avez peut être fait une erreur de syntaxe";
    }      

?>


</body>


</head>


</html>