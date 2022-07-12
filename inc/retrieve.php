<?php
    require("./connection/database.php");

    function print_arr($arr) {
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }

    if(isset($_GET['columnName']) && isset($_GET['orderBy'])){
        $columnName = $_GET['columnName'];
        $orderBy = $GET['orderBy'];
        $orderBy = 'ASC';
        
        $query_retrieve_register = "SELECT * FROM register ORDER BY $columnName $orderBy";
    } else {
        // $query_retrieve_register = "SELECT a.first_name, a.last_name, a.email, b.name 'gender', c.name 'user_role' FROM register a JOIN reference_code b ON a.gender = b.ref_id JOIN reference_code c ON a.user_role = c.ref_id";
        $query_retrieve_register = "SELECT * FROM register";
    }


    // $query_retrieve_register = "SELECT * FROM register";
    
    $sql_retrieve_register = mysqli_query($connection,$query_retrieve_register) OR trigger_error('Query FAILED SQL:$query_create ERROR:'.mysqli_error($connection),E_USER_ERROR );

    $query_retrieve_references= "SELECT name, ref_id FROM reference_code";
    $sql_retrieve_references = mysqli_query($connection,$query_retrieve_references) OR trigger_error('Query FAILED SQL:$query_create ERROR:'.mysqli_error($connection),E_USER_ERROR );
    $references = [];
    while ($row = mysqli_fetch_array($sql_retrieve_references)) {
        // print_arr($row);
        $references[$row['ref_id']] = $row['name'];
    }

    print_arr($references);

?>