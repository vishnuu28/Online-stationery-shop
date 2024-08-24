<?php
include("header.php");
include("connect.php");

if(isset($_POST['btnlogin']))
{
  
  $email = $_POST['txtemail'];
  $pwd = $_POST['txtpwd'];
  
  $res1 = mysqli_query($con,"select * from admin_login where email_id='$email' and pwd='$pwd'");
  if(mysqli_num_rows($res1) > 0)
  {
    echo "<script>";
    echo "alert('Admin Login Successfully');";
    echo "window.location.href='admin_manage_cat.php';";
    echo "</script>";
  }else{
    $res2 = mysqli_query($con,"select * from customer_registration where email_id='$email' and pwd='$pwd'");
    if(mysqli_num_rows($res2) > 0)
    {
      echo "<script>";
      echo "alert('Customer Login Successfully');";
      echo "window.location.href='login.php';";
      echo "</script>";
    }else{
      echo "<script>";
      echo "alert('Check Your Email Id Or Password');";
      echo "window.location.href='login.php';";
      echo "</script>";
    }
  }

}
?>
 <div class="bg-light py-3">
      <div class="container">
        <div class="row">
        <div class="col-md-12 mb-0 text-center"><h2> <strong class="text-black">Login</strong></h2></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          
          <div class="col-md-6">

            <form  method="post">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Email</label>
                    <input type="text" class="form-control" name="txtemail">
                  </div>
                  <div class="col-md-12">
                    <label for="c_lname" class="text-black">Passwrod</label>
                    <input type="password" class="form-control" name="txtpwd">
                  </div>
                </div>
                
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary " name="btnlogin" value="LOGIN">
                    <a class="btn btn-primary " href="register.php">NEW USER CLICK HERE</a>
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-6 ml-auto">
          <img src="images/log1.gif" alt="Image placeholder" class="img-fluid rounded">

          </div>
        </div>
      </div>
    </div>
   

  
<?php
include("footer.php");
?>