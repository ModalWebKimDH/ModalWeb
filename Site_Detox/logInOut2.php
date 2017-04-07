<?php
function logIn($dbh){
    if (getUtilisateur($dbh,$_GET["login"])!=NULL && testerMdp($dbh,$_GET["login"],$_GET["password"])){
        $_SESSION['loggedIn']=true;
    }
    else{
        echo 'Erreur';
    }
    
}

function logOut(){
   unset($_SESSION['loggedIn']); 
}


