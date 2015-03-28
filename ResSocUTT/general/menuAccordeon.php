<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>

<script type="text/javascript">

$(document).ready( function () {
    // On cache les sous-menus.
    $(".relations ul.sousMenuRelation").hide();
    // On sélectionne tous les objets de liste portant la classe "relation"
    // et on remplace l'élément span qu'ils contiennent par un lien.
    $(".relations li.relation span").each( function () {
        // On stocke le contenu du span.
        var TexteSpan = $(this).text();
        $(this).replaceWith('<a href="" title="Afficher le sous-menu">' + TexteSpan + '<\/a>') ;
    } ) ;

    // On modifie l'évènement "click" sur les liens dans les objets de liste
    // qui portent la classe "relation".
    $(".relations li.relation > a").click( function () {
        // Si le sous-menu était déjà ouvert, on le referme.
        if ($(this).next("ul.sousMenuRelation:visible").length != 0) {
            $(this).next("ul.sousMenuRelation").slideUp("normal", function () { $(this).parent().removeClass("open") });
        }
        // Si le sous-menu est caché, on l'affiche :
        else {
            // $(".relations ul.sousMenuRelation").slideUp("normal", function () { $(this).parent().removeClass("open") });
            $(this).next("ul.sousMenuRelation").slideDown("normal", function () { $(this).parent().addClass("open") });
        }
        // On empêche le navigateur de suivre le lien.
        return false;
    });
} ) ;

</script>