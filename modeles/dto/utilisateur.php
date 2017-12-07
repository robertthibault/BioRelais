<?php
class Utilisateur{
	private $login;
	private $mdp;
  private $prenom;
  private $nom;
  private $statut;

	public function __construct($unLogin  , $unMdp){
		$this->login = $unLogin;
		$this->mdp = $unMdp;
	}
  public function getLogin(){
		return $this->login;
	}

	public function setLogin($login){
		$this->login = $login;
	}

	public function getMdp(){
		return $this->mdp;
	}

	public function setMdp($mdp){
		$this->mdp = $mdp;
	}

	public function getPrenom(){
		return $this->prenom;
	}

	public function setPrenom($prenom){
		$this->prenom = $prenom;
	}

	public function getNom(){
		return $this->nom;
	}

	public function setNom($nom){
		$this->nom = $nom;
	}

	public function getStatut(){
		return $this->statut;
	}

	public function setStatut($statut){
		$this->statut = $statut;
	}
}

?>
