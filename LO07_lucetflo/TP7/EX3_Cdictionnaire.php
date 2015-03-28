<?php
include 'EX3_Cville.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EX3_Cdictionnaire
 *
 * @author Florent
 */
class Dictionnaire {
	private $contenu = array(
		"France" => array(),
		"Belgique" => array(),
		"Espagne" => array(),
		"Allemagne" => array()
	);
	
	
	function init() {
		$this->addVille("Espagne", new Ville("Séville", 1));
		$this->addVille("France", new Ville("Paris", 6));
		$this->addVille("Belgique", new Ville("Bruxelles", 2));
		$this->addVille("Espagne", new Ville("Madrid", 5));
		$this->addVille("Allemagne", new Ville("Berlin", 3));
		$this->addVille("France", new Ville("Lyon", 2));
		$this->addVille("Belgique", new Ville("Liège", 1));
		$this->addVille("Espagne", new Ville("Barcelone", 3));
		$this->addVille("Allemagne", new Ville("Hambourg", 4));
	}
					
	function addVille($pays, $ville) {
		$this->contenu[$pays][sizeof($this->contenu[$pays])] = $ville;
	}
	
	function affiche() {
		$nbCle = 0;
		echo "Contenu du dictionnaire : <br/><br/>";
		foreach ($this->contenu as $pays => $villes) {
			$nbCle++;
			echo "Les villes de $pays (clé $nbCle) sont : <br/>";
			foreach ($villes as $ville) {
				echo "- La ville " . $ville->getNom() . ", qui possède " . $ville->getHabitant() . " million(s) d'habitants.<br/>";
			}
			echo "<br/>";
		}
		echo "<br/>";
	}
}

?>
