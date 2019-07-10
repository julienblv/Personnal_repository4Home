<!DOCTYPE html>
<html lang="fr">
<li><a href="http://localhost/Dossier%20Php/Cpam_CPA/Login.php"> Deconnexion ?</a></li>
<head>
</head>



<body>

<form method="POST" action="Annuaire_Json.php">



<h1> CPAM PCA </h1>

<label>Vôtre CPAM :</label>
<select>
    <option value=''>--Choisissez une option--</option>
    <option> Haute-Garonne</option>
    <option> Tarn </option>
    <option> Aveyron </option>
    <option> Picardie</option>
</select>


<!--Tableau déroulant -->
<div style='margin-top:100px'>
<table border='1'>
    <tr>
        <td>nom</td>
        <td>batiment</td>
        <td>etage</td>
        <td>fixe</td>
        <td>portable</td>
        <td>fonction</td>
        <td>niveau</td>
        <td>type</td>

    </tr>
    <tr>
        <td>
            <div class='dropdown'>
                <button class='dropbtn' name = 'redir' >Blavette Julien</button>
                <div class='dropdown-content'>

                    <a href=''></a>
                   <li><a href="http://localhost/Dossier%20Php/Cpam_CPA/Modification_Annuaire.php">Liste Complète ?</a></li>               
               </div>
            </div>
        </td>


        
        <td>bat4</td>
        <td>11</td>
        <td>NULL</td>
        <td>0603912943</td>
        <td>Stage_Informatique</td>
        <td>Stagiaire</td>
        <td>NULL</td>
        
    </tr>
</table>
</div>

<!--mise en place d'un boutton action qui renvoies vers les scripts Json-->

<input type = 'submit' style='margin-top :100px' name = 'jason' value="Modifier Via Fichier Json et observer la Base de données">

<?php

$_POST['jason'];
if ($_POST['jason']==true){
    //Affichage de la base de données complète :
    echo "<h3>Voici la base de données sous forme de tableau Array() :</h3><br>";

        try {
            $user="root";
            $pass="";
            $dbh = new PDO('mysql:host=localhost;dbname=annuaire', $user, $pass);
            foreach($dbh->query('SELECT * from annuaire_comite_alerte') as $row) {
                echo "<h3>__________________________________________________________________________________________________</h3><br>";
                print_r($row);
                echo "<br>";
            }
            $dbh = null;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
echo "<h3>Affichage au format Json</h3>";

$Json_Data =
    '{
      "id": "id0",
      "fonction": "PC sécurité",
      "nom": "Vigile de surveillance",
      "portable": "",
      "fixe": "05.62.73.85.55",
      "batiment": "Siège",
      "etage": "",
      "photo": "",
      "type": "PCSECU",
      "niveau": "titulaire"
    },
    {
      "id": "id1",
      "fonction": "Resp. PCA titulaire",
      "nom": "Brice Jones",
      "portable": "06.07.54.29.23",
      "fixe": "05.62.73.84.86",
      "batiment": "Siège/IGH",
      "etage": "11/11.6",
      "photo": "homme.jpg",
      "type": "RPCA",
      "niveau": "titulaire"
    },
    {
      "id": "id2",
      "fonction": "Resp. PCA suppléant",
      "nom": "Rodolphe Lassalle",
      "portable": "06.48.74.04.07",
      "fixe": "05.62.73.85.05",
      "batiment": "Siège/IGH",
      "etage": "11/11.2",
      "photo": "0332477695040400025.jpg",
      "type": "RPCA",
      "niveau": "suppleant"
    },
    {
      "id": "id5",
      "fonction": "Resp. RIL titulaire",
      "nom": "Pascale Prat",
      "portable": "06.99.92.24.12",
      "fixe": "05.62.73.84.12",
      "batiment": "Siège Bat Cen",
      "etage": "3/3.43",
      "photo": "0663277695040400025.jpg",
      "type": "RPCA",
      "niveau": "titulaire"
    },
    {
      "id": "id6",
      "fonction": "Resp. RIL suppléant",
      "nom": "Sophie Grente",
      "portable": "06.03.54.69.95",
      "fixe": "05.62.73.81.52",
      "batiment": "Siège Bat Cen",
      "etage": "3/3.24",
      "type": "RPCA",
      "niveau": "suppleant",
      "photo": "0634277695040400025.jpg"
    },
    {
      "id": "id7",
      "fonction": "Resp. Gestion Immo titulaire",
      "nom": "Jonathan Glories",
      "fixe": "05.62.73.84.61",
      "portable": "06.65.60.95.30",
      "batiment": "Siège/IGH",
      "etage": "4/4.46",
      "photo": "homme.jpg",
      "type": "RPCA",
      "niveau": "titulaire"
    },
    {
      "id": "id9",
      "fonction": "Resp. RH titulaire",
      "nom": "Laurence Dabosi",
      "portable": "07.63.97.37.21",
      "fixe": "05.62.73.83.82",
      "batiment": "Siège Bat Cen",
      "etage": "5/5.26",
      "type": "RPCA",
      "niveau": "titulaire",
      "photo": "0189877695040400025.jpg"
    },
    {
      "id": "id10",
      "fonction": "Resp. RH suppléant",
      "nom": "Marie Ghys-Austruy",
      "portable": "07.62.66.04.16",
      "fixe": "05.62.73.81.37",
      "batiment": "Siège Bat Cen",
      "etage": "5/5.22",
      "type": "RPCA",
      "niveau": "suppleant",
      "photo": "femme.jpg"
    },
    {
      "id": "id11",
      "fonction": "Resp. informatique titulaire",
      "nom": "Carine Sarramia",
      "portable": "07.62.75.16.32",
      "fixe": "05.62.73.86.19",
      "batiment": "Siège/IGH",
      "etage": "11/11.09",
      "type": "RPCA",
      "niveau": "titulaire",
      "photo": "0364177695040400025.jpg"
    },
    {
      "id": "id12",
      "fonction": "Resp. informatique suppléant",
      "nom": "Anaïs Chauzy",
      "portable": "06.26.48.38.49",
      "fixe": "05.62.73.85.19",
      "batiment": "Siège/IGH",
      "etage": "11/11.5",
      "type": "RPCA",
      "niveau": "suppleant",
      "photo": "0624977695040400025.jpg"
    },
    {
      "id": "id13",
      "fonction": "Directeur général",
      "nom": "Michel Davila",
      "portable": "06.80.22.84.29",
      "fixe": "05.62.73.84.04",
      "batiment": "Siège Bat Cen",
      "etage": "4/4.23",
      "type": "DIRECTEUR",
      "niveau": "titulaire",
      "photo": "0626077695040400025.jpg"
    },
    {
      "id": "id14",
      "fonction": "Agent comptable",
      "nom": "Jean-Marie Bonifassi",
      "portable": "06.85.71.64.52",
      "fixe": "05.62.73.84.17",
      "batiment": "Siège Bat Cen",
      "etage": "4/4.28",
      "type": "DIRECTEUR",
      "niveau": "titulaire",
      "photo": "0498177695040400025.jpg"
    },
    {
      "id": "id15",
      "fonction": "Sous Directeur DSANTE",
      "nom": "Isabelle Tartarin",
      "portable": "07.62.99.52.65",
      "fixe": "05.62.73.84.34",
      "batiment": "Siège Bat Cen",
      "etage": "4/4.24",
      "type": "DIRECTEUR",
      "niveau": "titulaire",
      "photo": "0517477695040400025.jpg"
    },
    {
      "id": "id16",
      "fonction": "Sous Directeur DRC",
      "nom": "Christian Tiberti",
      "portable": "06.72.62.21.85",
      "fixe": "05.62.73.84.14",
      "batiment": "Siège Bat Cen",
      "etage": "4/4.27",
      "type": "DIRECTEUR",
      "niveau": "titulaire",
      "photo": "0635577695040400025.jpg"
    },
    {
      "id": "id17",
      "fonction": "Sous Directeur DPSI",
      "nom": "Jean Michel Huc",
      "portable": "06.77.62.06.48",
      "fixe": "05.62.73.84.19",
      "batiment": "Siège Bat Cen",
      "etage": "4/4.32",
      "type": "DIRECTEUR",
      "niveau": "titulaire",
      "photo": "0399777695040400025.jpg"
    },
    {
      "id": "id18",
      "fonction": "Sous Directeur DRA",
      "nom": "Stéphane Cobigo",
      "portable": "06.37.26.64.74",
      "fixe": "05.62.73.84.06",
      "batiment": "Siège Bat Cen",
      "etage": "4/4.22",
      "type": "DIRECTEUR",
      "niveau": "titulaire",
      "photo": "0341777695040400025.jpg"
    },
    {
      "id": "id19",
      "fonction": "Sous Directeur DCMP",
      "nom": "Edith Pageaux",
      "portable": "06.48.60.53.40",
      "fixe": "05.62.73.84.84",
      "batiment": "Siège Bat Cen",
      "etage": "4/4.36",
      "type": "DIRECTEUR",
      "niveau": "titulaire",
      "photo": "femme.jpg"
    },
    {
      "id": "id22",
      "fonction": "Resp. Prestations titulaire",
      "nom": "Fabienne Campariol-Siguier",
      "portable": "",
      "fixe": "05.62.73.82.59",
      "batiment": "Siège Bat Cen",
      "etage": "",
      "type": "MANAGER",
      "niveau": "titulaire",
      "photo": "0648277695040400025.jpg"
    },
    {
      "id": "id24",
      "fonction": "Resp. Communication titulaire",
      "nom": "Roselyne Jaume",
      "portable": "",
      "fixe": "05.61.14.75.01",
      "batiment": "12 Pl. St-Etienne",
      "etage": "3ème",
      "type": "MANAGER",
      "niveau": "titulaire",
      "photo": "0167477695040400025.jpg"
    },
    {
      "id": "id25",
      "fonction": "Resp. Communication suppléant",
      "nom": "Arnaud Coussemaeker",
      "portable": "06 78 29 53 02",
      "fixe": "05.61.14.75.55",
      "batiment": "12 Pl. St-Etienne",
      "etage": "3ème",
      "type": "MANAGER",
      "niveau": "suppleant",
      "photo": ""
    },
    {
      "id": "id26",
      "fonction": "Resp. Accueil publics siège",
      "nom": "Claudine Lafargue",
      "portable": "06.79.61.60.32",
      "fixe": "05.62.73.81.74",
      "batiment": "Siège Bat Cen",
      "etage": "E/E07",
      "type": "MANAGER",
      "niveau": "titulaire",
      "photo": "0183177695040400025.jpg"
    },
    {
      "id": "id28",
      "fonction": "Resp. Accueil publics siège adj",
      "nom": "Christophe Jacob",
      "portable": "",
      "fixe": "05.67.22.26.51",
      "batiment": "Siège Bat Cen",
      "etage": "E/E07",
      "type": "MANAGER",
      "niveau": "titulaire",
      "photo": "homme.jpg"
    },
    {
      "id": "id27",
      "fonction": "Resp. Accueil publics ext titulaire",
      "nom": "Claudine Lafargue",
      "portable": "06.79.61.60.32",
      "fixe": "05.62.73.81.74",
      "batiment": "Siège Bat Cen",
      "etage": "E/E07",
      "type": "MANAGER",
      "niveau": "titulaire",
      "photo": "0183177695040400025.jpg"
    },
    {
      "id": "id29",
      "fonction": "Resp unite GDB",
      "nom": "Eugenie Gleizes",
      "portable": "07.62.66.00.48",
      "fixe": "05.67.22.28.72",
      "batiment": "Saint Gaudens",
      "etage": "",
      "type": "RPCA",
      "niveau": "suppleant",
      "photo": "femme.jpg"
    },
    {
      "id": "id32",
      "fonction": "Cadres UIOSS",
      "nom": "Francoise Roig-Nortier",
      "portable": "",
      "fixe": "05.62.73.85.40",
      "batiment": "",
      "etage": "",
      "type": "RPCA",
      "niveau": "titulaire",
      "photo": "5516977695040400025.jpg"
    },
    {
      "id": "id33",
      "fonction": "Cadres UIOSS suppléant",
      "nom": "Christophe Rossignol",
      "portable": "",
      "fixe": "05.62.73.85.42",
      "batiment": "Siège RDC",
      "etage": "RDC/0.20",
      "type": "RPCA",
      "niveau": "suppleant",
      "photo": "homme.jpg"
    },
    {
      "id": "id34",
      "fonction": "RESP UNITE ARCHIVES",
      "nom": "Christophe Gayde",
      "portable": "07.62.66.02.64",
      "fixe": "05.67.22.28.00",
      "batiment": "Saint Martin",
      "etage": "",
      "type": "RPCA",
      "niveau": "titulaire",
      "photo": "0440577695040400025.jpg"
    },
    {
      "id": "id35",
      "fonction": "RESP SERVICE PFRS",
      "nom": "Latifa Colera",
      "portable": "07.62.65.98.79",
      "fixe": "05.62.73.83.42",
      "batiment": "La Plaine",
      "etage": "",
      "type": "RPCA",
      "niveau": "titulaire",
      "photo": "0376777695040400025.jpg"
    },
    {
      "id": "id37",
      "fonction": "RESP.UNIT.ACT.PROD.",
      "nom": "Jean-Paul Laborie",
      "portable": "",
      "fixe": "05.67.22.28.32",
      "batiment": "Blagnac",
      "etage": "",
      "type": "MANAGER",
      "niveau": "titulaire",
      "photo": "0061477695040400025.jpg"
    },
    {
      "id": "id38",
      "fonction": "RESP UNITE PRODUCTION",
      "nom": "Diane Nieudan",
      "portable": "07.62.66.03.67",
      "fixe": "05.67.22.28.31",
      "batiment": "Blagnac",
      "etage": "",
      "type": "RPCA",
      "niveau": "titulaire",
      "photo": "0426577695040400025.jpg"
    },
    {
      "id": "id47",
      "fonction": "RESP UNITE PRODUCTION",
      "nom": "Patrice Serna",
      "portable": "",
      "fixe": "05.67.22.28.22",
      "batiment": "Colomiers",
      "etage": "",
      "type": "RPCA",
      "niveau": "suppleant",
      "photo": "homme.jpg"
    },
    {
      "id": "id48",
      "fonction": "RESP UNITE PRODUCTION",
      "nom": "Elisabeth Jarrige",
      "portable": "05.67.22.28.21",
      "fixe": "05.",
      "batiment": "Colomiers",
      "etage": "",
      "type": "Manager",
      "niveau": "suppleant",
      "photo": "femme.jpg"
    },
    {
      "id": "id36",
      "fonction": "RESPONSABLE DE SERVICE",
      "nom": "Michael Parpillat",
      "portable": "07.62.66.01.99",
      "fixe": "05.67.22.28.20",
      "batiment": "Saint Orens de Gameville",
      "etage": "",
      "type": "RPCA",
      "niveau": "titulaire",
      "photo": "0650677695040400025.jpg"
    },
    {
      "id": "id40",
      "fonction": "RESP ACTIVITE PFS",
      "nom": "Sandrine DANIEL PAOLINETTI",
      "portable": "07.62.65.99.24",
      "fixe": "05.62.24.58.00",
      "batiment": "Labège",
      "etage": "",
      "type": "RPCA",
      "niveau": "titulaire",
      "photo": "0620977695040400025.jpg"
    },
    {
      "id": "id41",
      "fonction": "RESPONSABLE DE SERVICE",
      "nom": "Solange Martinez",
      "portable": "07.62.66.01.37",
      "fixe": "05.61.51.87.40",
      "batiment": "Muret",
      "etage": "",
      "type": "RPCA",
      "niveau": "titulaire",
      "photo": "0162477695040400025.jpg"
    },
    {
      "id": "id42",
      "fonction": "RESPONSABLE DE SERVICE",
      "nom": "Christophe SOLE",
      "portable": "07.62.65.99.31",
      "fixe": "05.67.22.29.50",
      "batiment": "Saint Jean",
      "etage": "",
      "type": "RPCA",
      "niveau": "titulaire",
      "photo": "0444477695040400025.jpg"
    },
    {
      "id": "id43",
      "fonction": "RESP UNITE PRODUCTION",
      "nom": "Christiane FARINES",
      "portable": "",
      "fixe": "05.67.22.28.71",
      "batiment": "Saint Gaudens",
      "etage": "",
      "type": "MANAGER",
      "niveau": "titulaire",
      "photo": "0147677695040400025.jpg"
    },
    {
      "id": "id44",
      "fonction": "RESPONSABLE DE SERVICE",
      "nom": "Valerie GIMENEZ",
      "portable": "07.62.66.04.67",
      "fixe": "05.34.46.28.01",
      "batiment": "Basso Cambo",
      "etage": "",
      "type": "RPCA",
      "niveau": "titulaire",
      "photo": "0337977695040400025.jpg"
    },
    {
      "id": "id45",
      "fonction": "RESP UNITE PRODUCTION",
      "nom": "Anne CARPUAT",
      "portable": "",
      "fixe": "05.34.41.91.31",
      "batiment": "DOC 31",
      "etage": "",
      "type": "MANAGER",
      "niveau": "titulaire",
      "photo": "0382577695040400025.jpg"
    },
    {
      "id": "id49",
      "fonction": "RESPONSABLE DE SERVICE",
      "nom": "Patrick Bellon",
      "portable": "07.62.66.00.14",
      "fixe": "05.61.14.75.54",
      "batiment": "Espace Santé",
      "etage": "",
      "type": "RPCA",
      "niveau": "titulaire",
      "photo": "homme.jpg"
    },
    {
      "id": "id46",
      "fonction": "RESPONSABLE DE SERVICE",
      "nom": "Corinne GIMENEZ-RAGAZZO",
      "portable": "07.62.66.00.98",
      "fixe": "05.67.76.29.82",
      "batiment": "Compans Caffarelli",
      "etage": "",
      "type": "RPCA",
      "niveau": "titulaire",
      "photo": "0310777695040400025.jpg"
    }';

  $PhpArray=json_decode($Json_Data,true);

  echo $Json_Data;
  

      
    


      
///////////////////////////////////possibilité de modification////////////////////////////////////////////
}

///////////////////////////////////////////////////////////////////////////////:
?>




</body>





</html>