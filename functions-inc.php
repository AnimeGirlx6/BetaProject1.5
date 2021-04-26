<?php 
 //this document will have a bunch of functions we can refrence to 
 function emptyInputSignup($name,$email,$username,$pwd,$pwdrepeat)
 {
     $results;
     if(empty($name)|| empty($email) || empty($username) ||
         empty($pwd) || empty($pwdrepeat))
     {
        $results = true;
     } 
     else
     {
         $results = false;
     } 
     return $results;
 } 


 function invalidUid($username)
 {
     $results;
     if(!preg_match('/^[a-zA-Z0-9]*$/',($username)))
     {
        $results = true;
     } 
     else
     {
         $results = false;
     } 
     return $results;
 } 

 function invalidEmail($email)
 {
     $results;
     if(!filter_var($email, FILTER_VALIDATE_EMAIL))
     {
        $results = true;
     } 
     else
     {
         $results = false;
     } 
     return $results;
 }  


 function pwdMatch($pwd,$pwdrepeat)
 {
     $results;
     if($pwd !== $pwdrepeat)
     {
        $results = true;
     } 
     else
     {
         $results = false;
     } 
     return $results;
 } 


 function uidExists($username,$conn,$email)
 {
    $sql = "SELECT * FROM USERS WHERE USER_UID = ?
         OR USER_EMAIL = ?;";
    //prepared statement 
    $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt,$sql)) 
        {
            header("location: ../signup.php?error=statementfailed1"); 
            exit();
        } 
        mysqli_stmt_bind_param($stmt,"ss",$username,$email); 
        mysqli_stmt_execute($stmt);

        $resultsData = mysqli_stmt_get_result($stmt); 
            if($row = mysqli_fetch_assoc($resultsData))
            {
                return $row;
            } 
            else
            {
                $results = false;
                return $results;
            }
    mysqli_stmt_close($stmt);
 } 


 function createUser($username,$conn,$email)
 { 
     //WHY IS USER_NAME BLUE? DOES THE COMPILER THINK IT IS A FUNCTION?!
    $sql = "INSERT INTO USERS(USER_NAME, USER_EMAIL, USER_UID,
         USER_PWD ) VALUES(?,?,?,?);";
    //prepared statement 
    $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt,$sql)) 
        {
            header("location: ../signup.php?error=statementfailed2"); 
            exit();
        }  
        $hashPwd= password_hash($pwd,PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt,"ssss",$name,$email,
            $username,$hashPwd); 
        mysqli_stmt_execute($stmt); 
        mysqli_stmt_close($stmt); 

        header("location: ../signup.php?error=signup-succesful"); 
        exit(); 

        //stetment failed 5:32PM 4/26/2021

        
 }


