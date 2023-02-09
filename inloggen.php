<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<ul>
        <li class="terugg"><a class="btn btn-dark" href="hoofdpagina.html">Terug</a></li>
    </ul>
    <br>

<div class="container" >
<form method="POST">
    Username : <input class="form-control" type="text" name="username" required/>
    <br>
    Email : <input class="form-control" type="email" name="email" required/>
    <br>
    Password : <input class="form-control" type="text" name="password" required/>
    <br>
    <button class="btn btn-dark" type="submit" name="register">Registreren</button>
    <a class="btn btn-light" href="inlog.php">loggin</a>


</form>
</div>

<?php
$username = "root";
$password = "";
$database = new PDO("mysql:host=localhost; dbname=;",$username,$password);


//controleer of de enail lijkt op een andere

if(isset($_POST['register'])){
       $checkEmail = $database->prepare("SELECT * FROM inlogg WHERE Email = :Email");

    $email = $_POST['email'];
     $checkEmail->bindParam("Email" ,$email);
    $checkEmail->execute();

if($checkEmail->rowCount()>0){
      echo '<div class="alert alert-danger" role="alert">
      Fout
      </div>';
}else{
    $name =$_POST['username'];
    $password =$_POST['password'];
    $email =$_POST['email'];
    



//om gegevens te invoegen

        $addUser = $database->prepare("INSERT INTO inlogg(username,Password,Email) VALUES(:username,:Password,:Email)");
     $addUser->bindParam("username",$name);
     $addUser->bindParam("Password",$password);
      $addUser->bindParam("Email",$email);

 if($addUser->execute()){
        echo '<div class="alert alert-success">
        Oke
        </div>';
 }else{
        echo '<div class="alert alert-danger" role="alert">
        Fout
        </div>';
    }
 
  }



}


?>