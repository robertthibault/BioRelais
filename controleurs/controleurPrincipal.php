<?php

require_once 'configs/param.php';
require_once 'lib/menu.php';
require_once 'lib/formulaire.php';
require_once 'lib/tableau.php';
require_once 'lib/dispatcher.php';
require_once 'modeles/dao.php';


if(isset($_GET['menuPrincipal'])){
	$_SESSION['menuPrincipal']= $_GET['menuPrincipal'];
}
else{
	if(!isset($_SESSION['menuPrincipal'])){
		$_SESSION['menuPrincipal']="connexion";
	}
}

/*
$messageErreurConnexion ='';
if(isset($_POST['login'] , $_POST['mdp'])){
    $unUtilisateur = new Utilisateur($_POST['login'] , $_POST['mdp']);
    $_SESSION['identification'] = utilisateurDAO::verification($unUtilisateur);
    if($_SESSION['identification']){
        $_SESSION['menuPrincipal']="equipe";
    }
    else {
        $messageErreurConnexion = 'Login ou mot de passe incorrect !';
    }
}
*/

$menuPrincipal = new Menu("menuPrincipal");

/*
if(isset($_SESSION['identification']) && $_SESSION['identification']){
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("equipe",
        "images/equipe.png" , "Equipes"));
}else
{
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("equipeC",
        "images/equipe.png" , "Equipes"));
}
*/

if(isset($_SESSION['identification']) && $_SESSION['identification']){
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("connexion", "images/deconnex.png" , "D�connexion"));
}
else{
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("connexion", "images/connex.png" , "Connexion"));
}


include_once dispatcher::dispatch($_SESSION['menuPrincipal']);
