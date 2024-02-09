
$(document).ready(function(){

    function verif(e)
{
   
    var envoi = true;
    // Récupére la valeur saisie dans le champ input #prenom
    var lenom = $("#nom").val();
    var leprenom = $("#prenom").val();
    var email = $("#email").val();
    var tel = $("#tel").val();
    var adr = $("#adr").val();

    if (lenom === "")
    {
        envoi = false;
        $("#mes1").show();
        e.preventDefault();
    }
    else { 
        $("#mes1").hide();
    };

    if (leprenom === "")
    {
        envoi = false;
        $("#mes2").show();
        e.preventDefault();
    }
    else { 
        $("#mes2").hide();
    };

    if (email === "")
    {
        envoi = false;
        $("#mes3").show();
        e.preventDefault();
    }
    else { 
        $("#mes3").hide();
    };

    if (tel === "")
    {
        envoi = false;
        $("#mes4").show();
        console.log(envoi);
        e.preventDefault();
    }
    else { 
        $("#mes4").hide();
    };
    if (adr === "")
    {
        envoi = false;
        $("#mes5").show();
        e.preventDefault();
    }
    else { 
        $("#mes5").hide();
    };


};

$("#btn_envoyer").click(function(e)
{
   // Appel de la fonction verif()
    verif(e);
   
});
});
