<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 *
 * @author Florent
 */
interface EX1_WBinterface {
	public function valide();
	public function pageKO();
	public function pageOK();
	public function sauveTXT();
	public function sauveXML($fichier);
	public function sauveBDR($table);
}

?>
