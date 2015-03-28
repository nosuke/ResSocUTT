function EuroPays (label, capitale, habitants) {
	this.label = label;
	this.capitale = capitale;
	this.habitants = habitants;
	this.affiche = paysAffiche;
	this.init = paysInit;
	
	function paysAffiche() {
		document.writeln("<b>Fonction paysAffiche :</b><ul>");
		document.writeln("<li>Label = " + this.label + ".</li>");
		document.writeln("<li>Capitale = " + this.capitale + ".</li>");
		document.writeln("<li>Nombre d'habitants (en milliers) = " + this.habitants + ".</li></ul><br/>");
	}
	
	function paysInit() {
		document.writeln("<b>Fonction paysInit.</b><br/><br/>");
		alert("Bonjour ! Vous allez saisir un nouveau pays.");
		this.label = prompt("Veuillez rentrer le label de ce nouveau pays :");
		this.capitale = prompt("Veuillez rentrer la capitale de ce nouveau pays :");
		this.habitants = prompt("Veuillez rentrer le nombre d'habitants de ce nouveau pays (en milliers) :");
	}
}