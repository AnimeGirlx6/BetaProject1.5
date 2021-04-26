<?php
    include_once 'header.php';
?>
            <section class ='index-intro'>
               <h2> Sign Up </h2>
               <form action="includes/signup-in.php" method="POST"> 
                    <input type='text' name='name' placeholder='Full Name'>  
                    <input type='text' name='email' placeholder='Email'> 
                    <input type='text' name='uid' placeholder='Username'> 
                    <input type='password' name='pwd' placeholder='Password'> 
                    <input type='password' name='pwdrepeat' placeholder='Repeat Password'> 
                    <button type='submit' name='submit'>Sign Up</button>
                    

                </form> 
                <?php
    if(isset($_GET["error"]))
    {
      if($_GET["error"] == "emptyinput")
      {
        echo "<p>Fill in all the feilds";
      } 
      else if($_GET["error" == "invaliduid"])
      {
        echo "<p>Choose a proper user name</p>";
      } 
      else if($_GET["error" == "invaliemail"])
      {
        echo "<p>Choose a proper Email</p>";
      } 
      else if($_GET["error" == "passwordsdontmatch"])
      {
        echo "<p>Passwords don't match</p>";
      } 

      else if($_GET["error" == "stmtfailed"])
      {
        echo "<p>Something went wrong</p>";
      } 
      else if($_GET["error" == "usernametaken"])
      {
        echo "<p>Usename taken</p>";
      } 
      else if($_GET["error" == "invaliduid"])
      {
        echo "<p>Choose a proper user name</p>";
      } 
      else if ($_GET["error" == "signup-succesful"])
      {
        echo "<p>You have sugn up succesfully</p>";
      }
    }  

  ?>
            </section> 
        
 

           
      <?php
        include_once 'footer.php';
      ?>