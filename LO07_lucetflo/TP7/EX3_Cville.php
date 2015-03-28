<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EX3_Cville
 *
 * @author Florent
 */
class Ville {
	private $nom;
	private $habitant;
	
	
	function __construct($nom, $habitant) {
		$this->nom = $nom;
		$this->habitant = $habitant;
	}
	
	public function getNom() {
		return $this->nom;
	}
	
	public function setNom($nom) {
		$this->nom = $nom;
	}
	
	public function getHabitant() {
		return $this->habitant;
	}
	
	public function setHabitant($habitant) {
		$this->habitant = $habitant;
	}
	
	public function __toString() {
		echo("-> Classe ville : <br /> \n
			- Nom : " + $this->$nom + "<br /> \n
			- Habitant (en millions) : " + $this->$habitant);
	}
}

?>
