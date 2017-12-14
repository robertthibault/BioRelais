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
		$_SESSION['menuPrincipal']="Connexion";
	}
}


$messageErreurConnexion ='';
//$_SESSION['Statut']= 'VIS';
if(isset($_POST['login'] , $_POST['mdp'])){
    $unUtilisateur = new Utilisateur($_POST['login'] , $_POST['mdp']);
    $unUtilisateur->setStatut(UtilisateurDAO::RecupStatut($_POST['login']));

    if(utilisateurDAO::verification($unUtilisateur) && $unUtilisateur->getStatut()=='CLI'){
      $_SESSION['identification'] = 'Adherent' ;
      //$_SESSION['Statut'] = 'CLI';
    }
    else if(utilisateurDAO::verification($unUtilisateur) && $unUtilisateur->getStatut()=='PRO'){
          $_SESSION['identification'] = 'Producteurs' ;
          //$_SESSION['Statut'] = 'PRO';
    }
    else if(utilisateurDAO::verification($unUtilisateur) && $unUtilisateur->getStatut()=='DIR'){
          $_SESSION['identification'] = 'InscriptionClient' ;
          //$_SESSION['Statut'] = 'DIR';
    }
    else {
        $messageErreurConnexion = 'Login ou mot de passe incorrect !';
        $_SESSION['identification'] = 'Visiteurs';
    }
}



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

if(isset($_SESSION['identification']) && $_SESSION['identification']!= 'VIS'){
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("connexion", "images/deconnex.png" , "Deconnexion"));
}
else{
    $menuPrincipal->ajouterComposant($menuPrincipal->creerItemImage("connexion", "images/connex.png" , "Connexion"));
}


include_once dispatcher::dispatch($_SESSION['identification']);
