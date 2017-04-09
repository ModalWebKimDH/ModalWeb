<?php
    session_name("sessiondetox" );
    // ne pas mettre d'espace dans le nom de session !
    session_start();
    if (!isset($_SESSION['initiated'])) {
        session_regenerate_id();
        $_SESSION['initiated'] = true;
    }
    // Décommenter la ligne suivante pour afficher le tableau $_SESSION pour le debuggage
    //print_r($_SESSION);

require('utilities/utils.php');
require('utilities/sql.php');
require ('logInOut.php');
require ('printForms.php');



$dbh = Database::connect();


//if($_GET["todo"] == "login") {
//    logIn($dbh);
//}
 

if(isset($_GET['page'])){
        $askedpage = $_GET['page'];
} 
else {
        $askedpage = 'welcome';
}

$authorized=checkPage($askedpage);

if($authorized){
    $pageTitle=getPageTitle($askedpage);
    }
else{
    $pageTitle='Erreur';
} 

//if($_SESSION["loggedIn"]) {
    // tout à l'heure on affichera le formulaire de déconnexion
//} else {
//    printLoginForm($askedPage);
//}


generateHTMLHeader($pageTitle,'style','bootstrap');

echo <<<CHAINE_DE_FIN
    <div class="container-fluid">

            <div class="navbar navbar-default navbar-fixed-top" role="navigation">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#infos" class="dropdown-toggle" data-toggle="dropdown">Informations<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?page=welcome">Accueil</a></li>
                                    <li><a href="index.php?page=quisommesnous">Qui sommes-nous ?</a></li>
                                    <li><a href="index.php?page=news">News</a></li>
                                </ul>
                            </li>
                            <li><a href="index.php?page=contact">Nous contacter</a></li>
                            <li><a href="index.php?page=calendrier">Calendrier</a></li>   
                            <li><a href="index.php?page=thes">Nos thés</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Nos recettes DétoX<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.php?page=smoothies">Smoothies</a></li>
                                    <li><a href="index.php?page=masques">Masques</a></li>
                                </ul>
                            </li>
                            <li><a href="index.php?page=degustations">Dégustations</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php?page=inscription">S'inscrire</a></li>
                            <li><a href="index.php?page=connexion">Connexion</a></li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div>
            </div>
CHAINE_DE_FIN;


generateMenu($page_list);
    
if ($authorized){
    include('content/content_'.$askedpage.'.php'); 
}
else{
    echo '<div class="jumbotron">
                <div class="row">
                    <p>Désolé, la page demandée n\'existe pas ou n\'est accessible qu\'aux tox.</p>
                </div>
            </div>';
 
}
generateHTMLFooter();
?>