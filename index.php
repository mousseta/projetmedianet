<!DOCTYPE html>
<html>
<head>
	<title>association medianet</title>
	<link rel="stylesheet" href="/projetweb/view/style.css">
</head>
<?php
session_start();
require("modele/User.php");
require("controller/PdoGsb.php");
/* $user=new User('younsi','mousse','2004-05-02','mousse','123456','mousse.younsi@wanadoo.fr');
$dao=PdoGsb::getPdoGsb();
$dao->ajouterUser($user);
$liste=$dao->getLesUtilisateur();
//var_dump($liste);
foreach($liste as $user1){
    echo $user1->toString()."</br>";
}

$user=new User('younsi1','mousse1','2004-05-02','mousse','123456','mousse.younsi@wanadoo.fr');
$dao->updateUser($user,1);
$liste=$dao->getLesUtilisateur();
foreach($liste as $user1){
    echo $user1->toString()."</br>";
}
$dao->supprimerUser(1);
$liste=$dao->getLesUtilisateur();
foreach($liste as $user1){
    echo $user1->toString()."</br>";
} */
$dao=PdoGsb::getPdoGsb();

if (!isset($_SERVER['PATH_INFO'])){
$action = "/";
}
else {
    $action=$_SERVER['PATH_INFO'];
}
$_SESSION["existeuser"]=1;
switch  ($action){
    case "/":
       include("view/login.php");
        break;
    case "/userlogin":
        $login=$_POST["login"];
        $mdp=$_POST["password"];
        $user=$dao->getInfosUser($login, $mdp);
        if ($user!=null) {
            include("view/accueil.php");
           
        }else{
            $_SESSION["existeuser"]=0;
            include("view/login.php");

        }
        break;
    case "/enregistrer":
        include("view/enregistrement.php");
        
        break;
}

/* $dao=PdoGsb::getPdoGsb();
$action=$_POST["action"];
switch ($action) {
    case "ajouteruser":
        $nom=$_POST["nom"];
        $prenom=$_POST["prenom"];
        $datenaiss=$_POST["datenaiss"];
        $login=$_POST["login"];
        $password=$_POST["password"];
        $email=$_POST["email"];
        $user=new User($nom,$prenom, $datenaiss,$login, $password, $email);
        $dao->ajouterUser($user);
        break;
    case "userlogin":
        $login=$_POST["login"];
        $mdp=$_POST["password"];
        $user=$dao->getInfosUser($login, $mdp);
        if ($user!=null) {
            header('Location: http://localhost/projetweb/view/accueil.php');
        }
        break;
    case 2:
        echo "i égal 2";
        break;
    default:
        echo "i n'est ni égal à 2, ni à 1, ni à 0.";
} */
