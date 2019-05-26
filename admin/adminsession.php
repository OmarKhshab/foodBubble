<?php
        include 's.php';
        $conn = OpenCon();
        session_start();

        if (isset($_POST['submit'])){
            $adminname=$_POST['username'];           
            $password=$_POST['password'];
            $sqll="SELECT * FROM admin WHERE adUsername='".$adminname."'and adPassword='".$password."'
            limit 1";
            $result=mysqli_query($conn,$sqll);
            
            ///////////////////////////////////////
            if(mysqli_num_rows($result)==1)
            {
                $_SESSION['login_admin']=$adminname;
            
                header( "refresh:0; url=AdminAddNewRestaurant.php" );
                  
                
            }
            else
            {
                echo '<script language="javascript">';
                echo 'alert("login failed")';
                echo '</script>';
                header( "refresh:0; url=adminsignin.php" );
                
                
            }
        }
      
            CloseCon($conn);
      ?>