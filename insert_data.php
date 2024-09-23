<?php
    include('config/conn.php');
    //Adding User
    if(isset($_POST['add']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        
        $qu = "insert into users (name , email) values ('$name' , '$email')";
        $res = mysqli_query($con , $qu);

        if($res == true)
        {
            echo "Data Saved Successfully";
        }
        else
        {
            echo "A problem has happened! Please try again..";
        }
    } 
?>