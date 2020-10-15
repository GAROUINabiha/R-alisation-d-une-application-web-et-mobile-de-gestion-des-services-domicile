<?php
$db=new PDO("mysql:host=localhost;dbname=pfe","root","");
$results["error"]=false;
$results["message"]=[];
if(isset($_Post)){

if(empty($_Post["nom"]) && ! empty($_Post["prenom"]) && !empty($_Post["login"]) && !empty($_Post["email"]) && !empty($_Post["password"]) && !empty($_Post["password2"]) && !empty($_Post["numtel"]) && !empty($_Post["adresse"]) && !empty($_Post["datenaiss"])) {

$nom=$_Post["nom"];
$prenom=$_Post["prenom"];
$login=$_Post["login"];
$email=$_Post["email"];
$password=$_Post["password"];
$password2=$_Post["password2"];
$numtel=$_Post["numtel"];
$adresse=$_Post["adresse"];
$datenaiss=$_Post["datenaiss"];


//verification de nom

if(strlen($nom) < 2 || !preg_match("/^[a-zA-Z0-9_-]+$/", $nom) || strlen($nom) > 60){

$results["error"]=true;
$results['message']['nom']="nom invalide";

}

//verification de prenom


if(strlen($prenom)<2 || !preg_match("/^[a-zA-Z0-9_-]+$/", $prenom)|| strlen($prenom)>60){

$results["error"]=true;
$results['message']['prenom']="prenom invalide";
}

if(strlen($login)<2 || !preg_match("/^[a-zA-Z0-9_-]+$/", $login) || strlen($login)>60){

$results["error"]=true;
$results['message']['login']="login invalide";
}else {

$requete=$db->prepare("SELECT id FROM users where login = :login");
$requete->execute([':login'=> $login]);
$row=$requete->fetch();
if($row){
$results["error"]=true;
$results['message']['login']="login est deja pris";

}




}
//verification de l'email
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
$results["error"]=true;
$results['message']['email']="login invalide";
}else {

$requete=$db->prepare("SELECT id FROM user where email = :email");
$requete->execute([':email'=> $email]);
$row=$requete->fetch();
if($row){
$results["error"]=true;
$results['message']['email']="email existe deja";

}




}

//verification de password 

if($password!== $password2){

$results["error"]=true;
$results['message']['password']="les mot de passe doivent etre identique ";
}


if(strlen($adresse)<2 || !preg_match("/^[a-zA-Z0-9_-]+$/­", $adresse) || strlen($adresse)>60){

$results["error"]=true;
$results['message']['adresse']="adresse invalide";
}

if($results["error"]===false){
$password=password_hash($password,PASSWORD_BCRYPT);
$sql=$db->prepare("INSERT INTO user (nom,prenom,login,email,password,numtel,adresse,datenaiss) VALUES (:nom, :prenom, : login , :email,:password,:numtel,:adresse,:datenaiss)");
$sql->execute([":nom" => $nom, ":prenom"=> $prenom, ": login" => $login , ":email" => $email,":password" => $password,":numtel" => $numtel,":adresse"=>$adresse,":datenaiss"=>$datenaiss]);
if(!$sql){
$results["error"]=true;
$results['message']="Erreur lors de l'inscription";

}


} 




}else {
$results["error"]=true;
$results["message"]="veuillez remplir tous les champs ";

}
echo json_encode($results);
}
?>
<html>
<head><title>Inscription</title></head>
<body>
            <form method="post" action="inscrit.php">
                 <input class="form-control form-control-lg" placeholder="nom" type="text" name="nom" required><br>
              <input class="form-control form-control-lg" placeholder="prénom" type="text" name="prenom" required><br>
              <input class="form-control form-control-lg" placeholder="login" type="text" name="login" required><br>
              <input class="form-control form-control-lg" placeholder="e-mail" type="email" name="email" required><br>
              <input class="form-control form-control-lg" placeholder="password" type="password" name="password" required><br>
              <input class="form-control form-control-lg" placeholder="repassword" type="password" name="password2" required><br>
              <input class="form-control form-control-lg" placeholder="adresse" type="text" name="adresse" required><br>
             <input class="form-control form-control-lg" placeholder="numéro de tel" type="number" name="numtel" required><br>
             <input class="form-control form-control-lg" placeholder="date de naissance" type="date" name="datenaiss" required><br>
      <button type="submit"  >Ajouter</button>
          </form>
</body>
</html>