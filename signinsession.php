<?php
        include 's.php';
        $conn = OpenCon();
        session_start();

        if (isset($_POST['submit'])){
            $username=$_POST['username'];           
            $password=$_POST['password'];
            $sqll="SELECT * FROM users WHERE Username='".$username."'and Password='".$password."'
            limit 1";
            $result=mysqli_query($conn,$sqll);
            
            if(mysqli_num_rows($result)==1)
            {
                $_SESSION['login_user']=$username;
            
                echo '<script language="javascript">';
                echo 'alert("login Sucessful")';
                echo '</script>';
                header( "refresh:0; url=account.php" );
                  
                
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("login failed")';
                echo '</script>';
                header( "refresh:0; url=signin.php" );
                
                
            }
        }
      
            CloseCon($conn);
      ?>