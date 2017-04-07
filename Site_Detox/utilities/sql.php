<?php

class Utilisateur {
    public $login;
    public $mdp;
    public $nom;
    public $prenom;
    public $promotion;
    public $naissance;
    public $email;
    public $feuille;
    
    public function __toString() {
        $date=explode("-",$this->naissance);
        if ($this->promotion==NULL){
            return '['.$this->login.'] '.$this->prenom.' <b>'.$this->nom.'</b>, né le '.$date[2].'/'.$date[1].'/'.$date[0].', <b>'.$this->email.'</b>';
        }
        else{
        return '['.$this->login.'] '.$this->prenom.' <b>'.$this->nom.'</b>, né le '.$date[2].'/'.$date[1].'/'.$date[0].', X'.$this->promotion.', <b>'.$this->email.'</b>';
        }
    }
    
    public static function getUtilisateur($dbh, $login) {
        global $dbh;
        $query = "SELECT * FROM `utilisateurs` WHERE `login`= '$login';";
        $sth = $dbh->prepare($query);
        $sth->setFetchMode(PDO::FETCH_CLASS, 'Utilisateur');
        $sth->execute();
        $user = $sth->fetch();
        $sth->closeCursor();
        return $user;
        
    }

    public static function insererUtilisateur($dbh,$login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille){
        global $dbh;
        if (getUtilisateur($dbh,$login)==NULL){
            $sth = $dbh->prepare("INSERT INTO `utilisateurs` (`login`, `mdp`, `nom`, `prenom`, `promotion`, `naissance`, `email`, `feuille`) VALUES(?,SHA1(?),?,?,?,?,?,?)");
            $sth->execute(array($login,$mdp,$nom,$prenom,$promotion,$naissance,$email,$feuille));
        }
        else{
            echo 'Login déjà utilisé';
        }
    }

    public static function testerMdp($dbh,$login,$mdp){
        global $dbh;
        $currentuser=getUtilisateur($dbh,$login);
        return ($currentuser->mdp==sha1($mdp));
}   
    
   
    
}



function requetesql($requetesql){ 
$dbh = Database::connect();
$query = $requetesql;
$sth = $dbh->prepare($query);
$request_succeeded = $sth->execute();
while ($courant =  $sth->fetch(PDO::FETCH_ASSOC)){
      echo $courant['nom'].' '.$courant['prenom'].', ';
    }
}

?>





 
