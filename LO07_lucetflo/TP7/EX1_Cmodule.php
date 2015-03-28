<?php
require_once "EX1_WBCcharte.php";

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cmodule
 *
 * @author Florent
 */
class Module implements WBinterface {
	private $sigle;
	private $label;
	private $categorie;
	private $effectif;
	private $listeErreurs = array();
	
	
	function __construct($sigle, $label, $categorie, $effectif, $listeErreurs) {
		setSigle($sigle);
		setLabel($label);
		setCategorie($categorie);
		setEffectif($effectif);
		setListeErreurs($listeErreurs);
	}
	
	
	function valide() {
		$resultat = TRUE;
		
		$sigle = filter_input(INPUT_GET, "sigle", FILTER_SANITIZE_STRING);
		echo ("?? [$sigle]<br/>\n");
		if (strlen($sigle) == 0) {
			$resultat = FALSE;
			$this->listeErreurs["sigle"] = "Le sigle n'est pas défini.";
		}
		
		$label = filter_input(INPUT_GET, "label", FILTER_SANITIZE_STRING);
		echo ("?? [$label]<br/>\n");
		if (strlen($label) == 0) {
			$resultat = FALSE;
			$this->listeErreurs["label"] = "Le label n'est pas défini.";
		}
		
		$effectif = filter_input(INPUT_GET, "effectif", FILTER_SANITIZE_NUMBER_INT);
		echo ("?? [$effectif]<br/>\n");
		if (strlen($effectif) == 0) {
			$resultat = FALSE;
			$this->listeErreurs["effectif"] = "L'effectif n'est pas défini.";
		}
		
		return $resultat;
	}
	
	function pageKO() {
		echo EX1_WBCcharte::html_head("Les WebBean de Florent");
		echo ("<h2>Vos saisies ne sont pas correctes.</h2>");
		foreach ($this->listeErreurs as $key => $value) {
			echo ("$key => $value <br />\n");
		}
		echo EX1_WBCcharte::html_foot();
	}
	
	public function pageOK() {
		echo EX1_WBCcharte::html_head("Les WebBean de Florent");
		echo ("<h2>Vos saisies sont correctes.</h2>");
		foreach ($_GET as $key => $value) {
			echo ("$key => $value <br />\n");
		}
	}
	
	public function pageFoot() {
		echo EX1_WBCcharte::html_foot();
	}
	
	public function sauveTXT() {
		$resultat = $this->sigle . ";";
		$resultat .= $this->label . ";";
		$resultat .= $this->categorie . ";";
		$resultat .= $this->effectif . ";";
		return $resultat;
	}
	
	public function sauveXML($fichier) {
		return "xml";
	}
	
	public function sauveBDR($table) {
		$resultat = "insert into " . $table . " values (";
		$resultat .= "'" . $this->sigle . "',";
		$resultat .= "'" . $this->label . "',";
		$resultat .= "'" . $this->categorie . "',";
		$resultat .= "'" . $this->effectif . "')";
		return $resultat;
	}
	
	
	public function getSigle() {
		return $this->sigle;
	}
	
	public function getLabel() {
		return $this->label;
	}
	
	public function getCategorie() {
		return $this->categorie;
	}
	
	public function getEffectif() {
		return $this->effectif;
	}
	
	public function getListeErreurs() {
		return $this->listeErreurs;
	}	
	
	
	public function setSigle($sigle) {
		$this->sigle = $sigle;
	}
	
	public function setLabel($label) {
		$this->label = $label;
	}
	
	public function setCategorie($categorie) {
		$this->categorie = $categorie;
	}
	
	public function setEffectif($effectif) {
		$this->effectif = $effectif;
	}
	
	public function setListeErreurs($listeErreurs) {
		$this->listeErreurs = $listeErreurs;
	}
	
	
	public function __toString() {
		echo("-> Classe module : <br /> \n
			- Sigle : " + getSigle() + "<br /> \n
			- Label : " + getLabel() + "<br /> \n
			- Catégorie : " + getCategorie() + "<br /> \n
			- Effectif : " + getEffectif());
	}
}

?>
