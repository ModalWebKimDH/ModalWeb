<?php




$page_list = array(
   array(
    "name"=>"welcome",
    "title"=>"Bienvenue sur le site du Binet DétoX",
    "menutitle"=>"Accueil"),
  array(
    "name"=>"quisommesnous",
    "title"=>"Qui sommes-nous ?",
    "menutitle"=>"Qui sommes-nous ?"),
  array(
    "name"=>"news",
    "title"=>"News",
    "menutitle"=>"News"),
  array(
    "name"=>"contact",
    "title"=>"Nous contacter",
    "menutitle"=>"Nous contacter"),
    array(
    "name"=>"thes",
    "title"=>"Nos thés",
    "menutitle"=>"Nos thés"),
    array(
    "name"=>"smoothies",
    "title"=>"Smoothies",
    "menutitle"=>"Smoothies"),
    array(
    "name"=>"masques",
    "title"=>"Masques",
    "menutitle"=>"Masques"),
    array(
    "name"=>"degustations",
    "title"=>"Dégustations",
    "menutitle"=>"Dégustations"),
    array(
    "name"=>"connexion",
    "title"=>"Connexion",
    "menutitle"=>"Connexion"),
    array(
    "name"=>"inscription",
    "title"=>"S'inscrire",
    "menutitle"=>"S'inscrire"),
    array(
    "name"=>"calendrier",
    "title"=>"Calendrier des inscriptions",
    "menutitle"=>"Calendrier des inscriptions")
  );

function checkPage($askedpage){
    global $page_list;
    foreach($page_list as $page){
        if($page["name"]==$askedpage){
            return TRUE;}
    }
}

function getPageTitle($askedpage){
    global $page_list;
    foreach($page_list as $page){
        if($page["name"]==$askedpage){
        return $page["title"];
        }
    }
}
function generateHTMLHeader($titre,$feuillecssperso,$feuillecssbootstrap){
echo <<<CHAINE_DE_FIN
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>$titre</title>
 
        <!-- CSS Bootstrap -->
        <link href="css/$feuillecssbootstrap.css" rel="stylesheet">
 
        <!-- CSS Perso -->
        <link href="css/$feuillecssperso.css" rel="stylesheet">
 
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
CHAINE_DE_FIN;
}

function generateHTMLFooter(){
echo <<<CHAINE_DE_FIN
    </div>  
            <footer>
                <div id="auteurs">Kim Larioui &copy; 2015 & David-Henri Garnier &copy; 2015</div>  
            </footer>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="js/jquery.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.js"></script>
    </body>
</html>
CHAINE_DE_FIN;
}

function generateMenu($page_list){
  foreach($page_list as $page){
    echo $page["title"];
  }
}
?>