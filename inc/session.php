<?php
session_start();

function pathTo($destination){
    echo "<script>window.location.href = './inc/$destination.php'</script>";
}

if ($_SESSION['status'] == 'invalid' || empty($_SESSION['status'])){
    $_SESSION['status'] = 'invalid';
    //unset functions destroys/resets the variable inside it
    //specifically the user-defined
    unset($_SESSION['email']);
    pathTo('login');
} 

?>