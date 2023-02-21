<?php



// Ontwikkelaar: Fedor
// Functie: validatie login



// Is de login button aangeklikt?
if (isset($_POST['login-btn'])){
// test of username gevuld is
if (strlen($_POST['username']) > 0 &&
  strlen($_POST['password']) > 0){
    echo "Ga verder";
  } else {
    echo "Username en password moeten gevuld zijn <br>";
  }
}

// connect database
include "connectpdo.php";

// select username
$found = true;

//test
if($found == true) {
  // user gevonden

  // create login session

  // go homepage
}else {
  // melding user not found
}

?>
