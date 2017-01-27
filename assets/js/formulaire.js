

//@autor khadidja
// ce script doit valider les deux formulaire



//var validation=document.getElementById('ok');
//validation.addEventListener('click', f_valid);

var inscription=document.getElementById('valider');
 inscription.addEventListener('click', inscription_valide);

//var pseudo=document.getElementById("pseudo");
//var pseudo_m=document.getElementById("pseudo_manquant");
//var pseudo_valide=/^[a-zA-Z][a-z]+([-'\s][a-zA-Z][a-z]+)?/;

//var password=document.getElementById("password");
//var password_m=document.getElementById("password_manquant");

var nom=document.getElementById('nom');
var nom_manquant=document.getElementById('nom_manquant');
var nom_valide=/^[a-zA-Z][a-z]+([-'\s][a-zA-Z][a-z]+)?/;


var prenom=document.getElementById('prenom');
var preom_manquant=document.getElementById('prenom_manquant');
var prenom_valide=/^[a-zA-Z][a-z]+([-'\s][a-zA-Z][a-z]+)?/;

var pseudo2=document.getElementById('pseudo2');
var pseudo2_manquant=document.getElementById('pseudo2_manquant');
var pseudo2_valide=/^[a-zA-Z][a-z]+([-'\s][a-zA-Z][a-z]+)?/;

var password2=document.getElementById('password2');
var password2_manquant=document.getElementById('password2_manquant');
var password2_valide=// au moin 8 caraceteres a voir;

var confirmPassword=document.getElementById('confirmPassword_manquant');
var confirmPassworrd_manquant=document.getElementById('confirmPassword_manquant');
var confirmPassword_valide=confirmPassword_manquant.value;



/*function f_valid(e){
    
if(pseudo.validity.valueMissing){
e.preventDefault();
pseudo_manquant.textContent=" pseudo manquant !";
pseudo_manquant.style.color='red';
}

 if(pseudo_valide.test(pseudo.value)==false){
event.preventDefault();
pseudo_manquant.textContent='Format incorrecte !';
pseudo_manquant.style.color='orange';

}
else{
pseudo_manquant.textContent=pseudo.value;
pseudo_manquant.style.color='green';
}
 if(password.validity.valueMissing){
 e.preventDefault();
password_manquant.textContent="Mot de passe manquant !";
password_manquant.style.color='red';
} 
else {
 password_manquant.textContent=password.value;
password_manquant.style.color='green';
}*/



function inscription_valide(e){
if(nom.validity.valueMissing){
e.preventDefault();
pseudo_m.textContent=" Nom manquant !";
pseudo_m.style.color='red';
}

 if(nom_valide.test(nom.value)==false){
event.preventDefault();
nom_manquant.textContent='Format incorrecte !';
nom_manquant.style.color='orange';

}
//else{
//pseudo_m.textContent=pseudo.value;
//pseudo_m.style.color='green';
//}
else if(nom_valide.test(nom.value)==false){
event.preventDefault();
nom_manquant.textContent='Format incorrecte !';
nom_manquant.style.color='orange';

}
 if(prenom.validity.valueMissing){
 e.preventDefault();
password_m.textContent="Prénom manquant !";
password_m.style.color='red';
} 
else {
prenom_manquant.textContent=prenom.value;
password_m.style.color='green';
}
else if(prenom_valide.test(prenom.value)==false){
event.preventDefault();
prenom_manquant.textContent='Format incorrecte !';
prenom_manquant.style.color='orange';

}
if(pseudo2.validity.valueMissing){
 e.preventDefault();
pseudo2_manquant.textContent="Pseudo manquant !";
pseudo2_manquant.style.color='red';
} 
if(password2.validity.valueMissing){
 e.preventDefault();
password2_manquant.textContent="mot de passe manquant !";
password2_manquant.style.color='red';
} 
}
}