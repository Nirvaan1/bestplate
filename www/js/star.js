/////////////////////////////
/* Javascript fonctions.js */
/////////////////////////////

$(document).ready(function(){

    ///////////
    // Notation
    ///////////
    var srcIn='star uk-rating-filled'; //image au survol
    var srcOut='star uk-rating-star'; // image non survolée

    // Obtenir id numérique des étoiles au format star_numero
    function idNum(id)
    {
        var id=id.split('_');
        var id=id[1];
        return id;
    }

    // Survol des étoiles
    $('.star').hover(function(){
        var id=idNum($(this).attr('id')); // id numérique de l'étoile survolée
        var nbStars=$('.star').length; // Nombre d'étoiles de la classe .star
        var i; // Variable d'incrémentation
        for (i=1;i<=nbStars;i++)
        {
            if(i<=id) $('#star_'+i).attr({class:srcIn});
            else if(i>id) $('#star_'+i).attr({class:srcOut});
            if(i==id)$('#note').attr({value:i}); // affectation de la note au formulaire
        }
    },function(){});

    // Survol de la croix
    $('#clear_stars').hover(function(){
        $('.star').attr({class:srcOut});
        $('#note').attr({value:'0'});
    },function(){});
});
