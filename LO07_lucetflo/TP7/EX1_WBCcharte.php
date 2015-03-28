<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WBCcharte
 *
 * @author Florent
 */
class EX1_WBCcharte {
	static function html_css1() {
		$resultat = "  <style type='text/css'>\n";
		$resultat .= "   h1 ( color: navy; )\n";
		$resultat .= "  </style>\n";
		return $resultat;
	}
	
	static function html_head($titre) {
		$resultat = "<html>\n";
		$resultat .= " <head>\n";
		$resultat .= "  <title$titre</title>\n";
		$resultat .= self::html_css1();
		$resultat .= " </head>\n";
		return $resultat;
	}
	
	static function html_foot() {
		$resultat = " <hr/>\n";
		$resultat .= " </body>\n";
		$resultat .= "</html>\n";
		return $resultat;
	}
}

?>
