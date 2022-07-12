<?php
    session_start();
    $_SESSION['status'] = 'invalid';
    unset($_SESSION['email']);
    unset($_SESSION['user_role']);
    //pwede rin pathto
    echo "<script>window.location.href = './login.php'</script>";
    mysqli_close($connection);

?>
