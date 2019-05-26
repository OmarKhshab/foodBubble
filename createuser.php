	<?php
      
        $fName="";
        $lName="";
        $birthday="";
        $username="";           
        $password="";
        $email="";
        $phone="";

        include 's.php';
 
        $conn = OpenCon();
 
        session_start();

      
        if (isset($_POST['submit'])){
            
            $fName=$_POST['fName'];
            $lName=$_POST['lName'];
            $birthday=$_POST['birthday'];
            $username=$_POST['username'];           
            $password=$_POST['password'];
            $email=$_POST['email'];
            $phone=$_POST['phone'];
            
            $query = "INSERT INTO users (FirstName,LastName,Birthday,Username,Password,Email,PhoneNumber) VALUES ('$fName','$lName','$birthday','$username','$password','$email','$phone')";
            
            mysqli_query($conn,$query);
            
            echo "signup successfully!!!" ;  
            
            $sqll="SELECT * FROM users WHERE Username='".$username."'and Password='".$password."'
            limit 1";
            $result=mysqli_query($conn,$sqll);
            
             if(mysqli_num_rows($result)==1)
            {
                $_SESSION['login_user']=$username;
            
                
                header( "refresh:0; url=account.php" );
                  
                
            }
            
        }
      
            CloseCon($conn);
      ?>