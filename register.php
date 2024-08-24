<?php
include("header.php");
include("connect.php");
?>
<script>
  function validation()
  {
    var v = /^[a-zA-Z ]+$/
    if(form1.txtname.value=="")
    {
      alert("Please Enter Your Name");
      form1.txtname.focus();
      return false;
    }else{
      if(!v.test(form1.txtname.value))
      {
        alert("Please Enter Only Characters in Your Name");
        form1.txtname.focus();
        return false;
      }
    }

    if(form1.txtadd.value=="")
    {
      alert("Please Enter Your Address");
      form1.txtadd.focus();
      return false;
    }

    if(form1.txtcity.value=="")
    {
      alert("Please Enter Your City Name");
      form1.txtcity.focus();
      return false;
    }else{
      if(!v.test(form1.txtcity.value))
      {
        alert("Please Enter Only Characters in Your City Name");
        form1.txtcity.focus();
        return false;
      }
    }

    var v = /^[0-9]{10,10}$/
    if(form1.txtmno.value=="")
    {
      alert("Please Enter Your Mobile No");
      form1.txtmno.focus();
      return false;
    }else if(form1.txtmno.value.length!=10)
    {
      alert("Please Enter Your Mobile No 10 Digit Long");
      form1.txtmno.focus();
      return false;
    }
    else{
      if(!v.test(form1.txtmno.value))
      {
        alert("Please Enter Only Digits in Your Mobile No");
        form1.txtmno.focus();
        return false;
      }
    }

    var v = /^[a-zA-Z0-9.-_]+@[a-zA-Z0-9.-_]+\.([a-zA-Z]{2,4})+$/
    if(form1.txtemail.value=="")
    {
      alert("Please Enter Your Email Id");
      form1.txtemail.focus();
      return false;
    }else{
      if(!v.test(form1.txtemail.value))
      {
        alert("Please Enter Valid Email ID");
        form1.txtemail.focus();
        return false;
      }
    }

    if(form1.txtpwd.value=="")
    {
      alert("Please Enter Your Password");
      form1.txtpwd.focus();
      return false;
    }else if(form1.txtpwd.value.length<6)
    {
      alert("Please Enter Your Password More than 6 Characters");
      form1.txtpwd.focus();
      return false;
    }else if(form1.txtpwd.value.length>10)
    {
      alert("Please Enter Your Password Less than 10 Characters");
      form1.txtpwd.focus();
      return false;
    }


    if(form1.gender[0].checked == false)
    {
      if(form1.gender[1].checked == false)
      {
        alert("Please Select Gender");
        return false;
      }
    }
  }
</script>

<?php

if(isset($_POST['btnregister']))
{
  $name = $_POST['txtname'];
  $add = $_POST['txtadd'];
  $city = $_POST['txtcity'];
  $mno = $_POST['txtmno'];
  $email = $_POST['txtemail'];
  $pwd = $_POST['txtpwd'];
  $gender = $_POST['gender'];


  $res1 = mysqli_query($con,"select * from customer_registration where email_id='$email'");
  if(mysqli_num_rows($res1) > 0)
  {
    echo "<script>";
    echo "alert('Email Id Already Exists');";
    echo "window.location.href='register.php';";
    echo "</script>";
  }else{
      //auto number code start...
      $res2 = mysqli_query($con,"select max(customer_id) from customer_registration");
      $cid=0;
      while($r2=mysqli_fetch_row($res2))
      {
        $cid = $r2[0];
      }
      $cid++;
      //auto number code end...

      $query = "insert into customer_registration values('$cid','$name','$add','$city','$mno','$email','$pwd','$gender')";
      if(mysqli_query($con,$query))
      {
        echo "<script>";
        echo "alert('Customer Registration Successfully');";
        echo "window.location.href='login.php';";
        echo "</script>";
      }
  }

}

?>
 <div class="bg-light py-3">
      <div class="container">
        <div class="row">
        <div class="col-md-12 mb-0 text-center"><h2> <strong class="text-black">Registration Form</strong></h2></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          
          <div class="col-md-6">

            <form name="form1" method="post">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                    <div class="col-md-12">
                        <label for="c_fname" class="text-black">Name</label>
                        <input type="text" class="form-control" name="txtname">
                    </div>
                    
                    <div class="col-md-12">
                        <label for="c_message" class="text-black">Address </label>
                        <textarea name="txtadd"  cols="30" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12">
                        <label for="c_fname" class="text-black">City</label>
                        <input type="text" class="form-control" name="txtcity">
                    </div>
                    <div class="col-md-12">
                        <label for="c_fname" class="text-black">Mobile No</label>
                        <input type="text" class="form-control" name="txtmno">
                    </div>
                    <div class="col-md-12">
                        <label for="c_fname" class="text-black">Email</label>
                        <input type="text" class="form-control" name="txtemail">
                    </div>
                    <div class="col-md-12">
                        <label for="c_lname" class="text-black">Passwrod</label>
                        <input type="password" class="form-control" name="txtpwd">
                    </div>
                    <div class="col-md-12">
                        <label for="c_lname" class="text-black">Select Gender</label>
                        <input type="radio" name="gender" value="MALE">MALE
                        <input type="radio" name="gender" value="FEMALE">FEMALE
                    </div>
                </div>
                <div class="form-group row">
                  <div class="col-lg-12">
                    <input type="submit" class="btn btn-primary btn-lg btn-block" name="btnregister" onclick="return validation();" value="REGISTER">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-6 ml-auto">
          <img src="images/reg2.gif" alt="Image placeholder" class="img-fluid rounded">

          </div>
        </div>
      </div>
    </div>
   

  
<?php
include("footer.php");
?>