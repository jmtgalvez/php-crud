<?php 

    require('./inc/retrieve.php'); 
    require('./inc/session.php');
    
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <style>
        table,th,td{
            border: 1px solid black;
        }
    </style>

</head>
<body>
    
    <div class="container">
        <div>
            <h1>Welcome! <?php echo $_SESSION['user_role']; echo " ".$_SESSION['email']?> </h1>
            <form action="./inc/logout.php" method="post">
                <input type="submit" class="btn btn-success" name="logout" value="Logout">

            </form>
        </div>
        <?php if ($_SESSION['user_role'] == 'User') { ?>
            <div class="user registration" id="divUser">
                <h3>Create User</h3>
                <form action="./inc/create.php" method="post">
                    <input type="text" name="first_name" class="form-control" placeholder="Enter First Name" required>
                    <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" required>
                    <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                    <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                    <select name="gender" id="gender" class="form-select">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>

                    <select name="user_role" id="user_role" class="form-select">
                        <option value="">User Role</option>
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>

                    <input type="submit" name="create" class="btn btn-primary" value="Create">
                </form>
            </div>
        <?php 
        } ?>

        
        <div class="admin display mt-5" id="divAdmin">
            <table class="table">
                <thead>
                    <tr>
                        <th><a href="?columnName=first_name&orderBy=<?php echo $orderBy; ?>">First Name</a></th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>User Role</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        while($row = mysqli_fetch_array($sql_retrieve_register)){
                            print_arr($row);
                    ?>
                            <tr>
                                <td><?php echo $row['first_name']?></td>
                                <td><?php echo $row['last_name']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php echo $references[$row['gender']]?></td>
                                <td><?php echo $references[$row['user_role']]?></td>
                                <td>
                                    
                                    <form action="./inc/update.php" method="post">
                                        <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
                                        <input type="submit" value="Update" name="update">
                                        <?php if($_SESSION['user_role'] == "Admin") {?>
                                            <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
                                            <input type="submit" value="Delete" name="delete" onclick="return confirm('Delete?')">
                                        <?php 
                                    } ?>
                                    </form>
                                   

                                </td>
                            </tr>
                        
                    <?php 
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script>
        $admin = document.getElementById('divAdmin');
        if(<?php $_SESSION['user_role']?> == "Admin"){
            $admin.show();
        }
    </script>
</body>
</html>