<?php
if (isset($_POST['signup-submit'])){

    require "db.inc.php";

    $username= $_POST['name'];
    $mail= $_POST['mail'];
    $password= $_POST['pwd'];

    if(empty($username) || empty($mail)|| empty($password)){

        header("Location: ../signup.php?error=emptyfields&name=".$username."&mail=".$mail );
        exit();

    }

    else if(!filter_var($mail, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z]*$/", $username)){

        header("Location: ../signup.php?error=invalidmailname");
        exit();

    }
    
    else if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){

        header("Location: ../signup.php?error=invalidmail&name=".$username);
        exit();

    }
    
    else if(!preg_match("/^[a-zA-Z]*$/", $username)){

        header("Location: ../signup.php?error=invalidname&mail=".$mail);
        exit();

    }

    else{

        $sql="SELECT Email FROM customers WHERE Email=?";
        $stmt=mysqli_stmt_init($con);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $mail);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck=mysqli_stmt_num_rows($stmt);

            if($resultCheck>0){

                header("Location: ../signup.php?error=emailtaken&mail=".$mail);
                exit();
            }

            else{
                $sql="INSERT INTO customers (Username, Email, UserPassword, Balance) VALUES (?,?,?,100.0)";
                $stmt=msqli_stmt_init($con);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else{

                    $hashedPassword= password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "sss", $username, $mail,$hashedPassword);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../login.php");
                    exit();

                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($con);
}

else{

    header("Location: ../signup.php");
    exit();

}
