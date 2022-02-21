 <?php
session_start();
include 'server.php';

$email = $_POST['email'];
        $newpassword = $_POST['newpassword'];
        $confirmnewpassword = $_POST['confirmnewpassword'];
        $result = mysql_query("SELECT password FROM users WHERE 
email='$email'");
        if(!$result)
        {
        echo "The username you entered does not exist";
        }
        else if($password!= mysql_result($result, 0))
        {
        echo "You entered an incorrect password";
        }
        else($newpassword == $confirmnewpassword)
        $sql=mysql_query("UPDATE users SET password='$newpassword' where 
 email='$email'");
        if($sql)
        {
        echo "Congratulations You have successfully changed your password";
        }
       else
        {
       echo "Passwords do not match";
       }
      ?>
