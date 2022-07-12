<?php
    require ('../connection/database.php');
    session_start();

    if(isset($_POST['login'])){
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (empty($email) || empty($password)){
            echo "<script>alert('Please fill up the email and password')</script>";
        } else {
            $check_query = "SELECT * FROM register a JOIN reference_code b ON a.user_role = b.ref_id   WHERE email = '$email'";
            $query_match = mysqli_query($connection, $check_query) OR
            trigger_error('QUERY FAILED! SQL: $check_query ERROR:'.
            mysqli_error($connection), E_USER_ERROR);

            // echo "<sript>alert('".$query_match."')</sript>";

            $mysql_array = mysqli_fetch_array($query_match);
            $current_password = $mysql_array['password'];
            echo var_dump($current_password);
            echo var_dump($password);
            // die();

            if ( mysqli_num_rows($query_match) > 0 && !password_verify($password, $current_password) ) {
                $_SESSION['status'] = 'valid';
                $_SESSION['email'] = $mysql_array['email'];
                $_SESSION['user_role'] = $mysql_array['name'];
                echo "<script>window.location.href = '../index.php'</script>";
            } else {
                $_SESSION['status'] = 'invalid';
                echo "<script>alert('Log in failed! Wrong password!')</script>";
                // echo "<script>window.location.href = './login.php'</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
       <form action="./login.php" method="post">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="login" value="Login">
       </form>
        
        <script src="" async defer></script>
    </body>
</html>