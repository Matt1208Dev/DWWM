var nameReg = "^[a-zA-Zéèàêëäï\\-\\ ]{1,50}$"; // REGEX POUR VERIFICATION DE NAME, SURNAME ET TOWN
var postalcodeReg = "^[0-9]{5}$"; // REGEX POUR VERIFICATION DU CODE POSTAL
var addressReg = "^[0-9]*[a-zA-Z0-9éèàêëäï\\-\\ ]{1,50}$"; // REGEX POUR VERIFICATION DE L ADRESSE
var emailReg = "^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$"; // REGEX POUR VERIFICATION DE L EMAIL


$(document).ready(function() 
{
    $("#envoi").click(function(e)         
    {
        var errorMessage;

        // Vérif champ nom
        if (!$("#yourName").val().match(nameReg)) 
        {
            $("#yourName").next(".error-message").addClass("alert alert-danger mt-2 py-2");
            errorMessage = $("#yourName").next(".error-message").show().text("Veuillez entrer votre nom.");
            
        }
        else
        {
            $("#yourName").next(".error-message").removeClass("alert alert-danger mt-2 py-2");
            $("#yourName").next(".error-message").text("");
            
        }

        // Vérif champ prénom
        if (!$("#surname").val().match(nameReg)) 
        {
            $("#surname").next(".error-message").addClass("alert alert-danger mt-2 py-2");
            errorMessage = $("#surname").next(".error-message").show().text("Veuillez entrer votre prénom.");
        }
        else
        {
            $("#surname").next(".error-message").removeClass("alert alert-danger mt-2 py-2");
            $("#surname").next(".error-message").text("");
            
        }

        // Vérif champ sexe
        if(!$("#sexf").is(':checked') && !$("#sexm").is(':checked'))
        {
            $("#radio-sexm").next(".error-message").addClass("alert alert-danger mt-2 py-2");
            errorMessage = $("#radio-sexm").next(".error-message").show().text("Veuillez cocher un champ.");
        }
        else
        {
            $("#radio-sexm").next(".error-message").removeClass("alert alert-danger mt-2 py-2");
            $("#radio-sexm").next(".error-message").text("");
            
        }

        // Verif champ dateOfBirth
        var diff = Date.now() - new Date(dateOfBirth.value).getTime();  // VERIFICATION DE L AGE DE L UTILISATEUR
        var majeur = (18*365*24*3600*1000); // age * jours dans une année * 24h * 3600 minutes * 1000 (millisecondes)
        if ($("#dateOfBirth").val() == "")
        {
            $("#dateOfBirth").next(".error-message").addClass("alert alert-danger mt-2 py-2");
            errorMessage = $("#dateOfBirth").next(".error-message").show().text("Veuillez renseigner votre date de naissance.");
        }
        else if (diff < majeur)
        {
            $("#dateOfBirth").next(".error-message").addClass("alert alert-danger mt-2 py-2");
            errorMessage = $("#dateOfBirth").next(".error-message").show().text("Vous devez être majeur pour envoyer ce formulaire !");
        }
        else
        {
            $("#dateOfBirth").next(".error-message").removeClass("alert alert-danger mt-2 py-2");
            $("#dateOfBirth").next(".error-message").text("");
        }

        // Verif champ postalCode
        if (!$("#postalcode").val().match(postalcodeReg)) 
        {
            $("#postalcode").next(".error-message").addClass("alert alert-danger mt-2 py-2");
            errorMessage = $("#postalcode").next(".error-message").show().text("Veuillez saisir votre code postal à 5 chiffres.");   
        }
        else
        {
            $("#postalcode").next(".error-message").removeClass("alert alert-danger mt-2 py-2");
            $("#postalcode").next(".error-message").text("");
        }

        // Verif champ address
        if (!$("#address").val().match(addressReg)) // CONTROLE DE SAISIE
        {
            $("#address").next(".error-message").addClass("alert alert-danger mt-2 py-2");
            errorMessage = $("#address").next(".error-message").show().text("Veuillez saisir une adresse valide.");   
        }
        else
        {
            $("#address").next(".error-message").removeClass("alert alert-danger mt-2 py-2");
            $("#address").next(".error-message").text("");
        }

        // Verif champ town
        if (!$("#town").val().match(nameReg)) 
        {
            $("#town").next(".error-message").addClass("alert alert-danger mt-2 py-2");
            errorMessage = $("#town").next(".error-message").show().text("Veuillez saisir votre ville.");   
        }
        else
        {
            $("#town").next(".error-message").removeClass("alert alert-danger mt-2 py-2");
            $("#town").next(".error-message").text("");
        }

        // Verif champ mail
        if (!$("#email").val().match(emailReg))
        {
            $("#email").next(".error-message").addClass("alert alert-danger mt-2 py-2");
            errorMessage = $("#email").next(".error-message").show().text("Veuillez saisir un email valide.");   
        }
        else
        {
            $("#email").next(".error-message").removeClass("alert alert-danger mt-2 py-2");
            $("#email").next(".error-message").text("");
        }

        // Verif champ select
        if ($("#subject-select").val() == "") 
        {
            $("#subject-select").next(".error-message").addClass("alert alert-danger mt-2 py-2");
            errorMessage = $("#subject-select").next(".error-message").show().text("Veuillez faire un choix dans la liste.");   
        }
        else
        {
            $("#subject-select").next(".error-message").removeClass("alert alert-danger mt-2 py-2");
            $("#subject-select").next(".error-message").text("");
        }

        // Verif champ question
        if ($("#question").val() == "")
        {
            $("#question").next(".error-message").addClass("alert alert-danger mt-2 py-2");
            errorMessage = $("#question").next(".error-message").show().text("Veuillez saisir votre question.");   
        }
        else
        {
            $("#question").next(".error-message").removeClass("alert alert-danger mt-2 py-2");
            $("#question").next(".error-message").text("");
        }

        // Verif champ accept
        if (!$("#accept").prop("checked"))
        {
            $("#accept-error").addClass("alert alert-danger mt-2 py-2");
            errorMessage = $("#accept-error").show().text("Vous devez accepter le traitement informatique pour envoyer ce formulaire");
        }
        else
        {
            $("#accept-error").removeClass("alert alert-danger mt-2 py-2");
            $("#accept-error").text("");
        }

        if (errorMessage)
        {
            e.preventDefault(); // BLOCAGE DU RECHARGEMENT DE LA PAGE
            
            return false;
        }
        else 
        {
            alert("Formulaire envoyé"); // MESSAGE DE VALIDATION D ENVOI DU FORMULAIRE
        }
    });
});