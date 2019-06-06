<?php
/** 
 * Classe d'accès aux données. 
 **/


class PdoGsb{   		
      	private static $serveur='mysql:host=localhost';
      	private static $bdd='dbname=association';   		
      	private static $user='mousse' ;    		
      	private static $mdp='123456' ;	
		private static $monPdo;
		private static $monPdoGsb=null;
/**
 * Constructeur privé, crée l'instance de PDO qui sera sollicitée
 * pour toutes les méthodes de la classe
 */			

		//constructeur prive
		private function __construct(){
		    PdoGsb::$monPdo = new PDO(PdoGsb::$serveur.';'.PdoGsb::$bdd, PdoGsb::$user, PdoGsb::$mdp);
		    
		    
		}
		
/**
 * Fonction statique qui crée l'unique instance de la classe
 
 * Appel : $instancePdoGsb = PdoGsb::getPdoGsb();
 
 * @return l'unique objet de la classe PdoGsb
 */
public  static function getPdoGsb(){
    if(PdoGsb::$monPdoGsb==null){
        PdoGsb::$monPdoGsb= new PdoGsb();
    }
    return PdoGsb::$monPdoGsb;
}
/**
 * Retourne les informations d'un user
 
 * @param $login
 * @param $mdp
 * @return l'id, le nom et le prénom sous la forme d'un tableau associatif
 */
public function getInfosUser($login, $mdp){
    $user=null;
    $req = "select id,nom,prenom,datenaissance,login,password,email from user
		where user.login='$login' and user.password='$mdp'";
    $rs = PdoGsb::$monPdo->query($req);
    $laLigne = $rs->fetch();
    if ($laLigne != null)	{
        $id=$laLigne['id'];
        $nom= $laLigne['nom'];
        $prenom= $laLigne['prenom'];
        $datenaissance= $laLigne['datenaissance'];
        $login= $laLigne['login'];
        $password= $laLigne['password'];
        $email= $laLigne['email'];
        $user=new User($nom,$prenom,$datenaissance,$login,$password,$email);
        $user->setId($id);
    }
    return $user;
}


//ajoute un User
public function ajouterUser(User $user){
    
    $nom=$user->getNom();
    $prenom=$user->getPrenom();
    $datenaissance=$user->getDatenaissance();
    $login=$user->getLogin();
    $password=$user->getPassword();
    $email=$user->getEmail();
    $req = "insert into user(nom,prenom,datenaissance,login,password,email)  values ('$nom','$prenom','$datenaissance','$login','$password','$email')";
    PdoGsb::$monPdo->exec($req);
    
    
}
//supprime un user
public function supprimerUser($idUser){
    $req = "delete from user where user.id =$idUser ";
    PdoGsb::$monPdo->exec($req);
}

//recupere les utilisateurs
public function getLesUtilisateur(){
    $liste=array();
    $req = "select id,nom,prenom,datenaissance,login,password,email from  user";
    $res = PdoGsb::$monPdo->query($req);
    $laLigne = $res->fetch();
    while($laLigne != null)	{
        $id=$laLigne['id'];
        $nom= $laLigne['nom'];
        $prenom= $laLigne['prenom'];
        $datenaissance= $laLigne['datenaissance'];
        $login= $laLigne['login'];
        $password= $laLigne['password'];
        $email= $laLigne['email'];
        $user=new User($nom,$prenom,$datenaissance,$login,$password,$email);
        $user->setId($id);
        $liste[]=$user;
        $laLigne = $res->fetch();
    }
    return $liste;
}

//met a jour un utilisateur
public function updateUser(User $user,$id){
    $nom=$user->getNom();
    $prenom=$user->getPrenom();
    $datenaissance=$user->getDatenaissance();
    $login=$user->getLogin();
    $password=$user->getPassword();
    $email=$user->getEmail();
    $req = "update user set nom = '$nom', prenom='$prenom', datenaissance='$datenaissance',login='$login', password='$password', email='$email'
		where id ='$id'";
		PdoGsb::$monPdo->exec($req);
	}

	public function _destruct(){
		PdoGsb::$monPdo = null;
		
}
}
?>