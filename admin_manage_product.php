<?php
include("admin_header.php");
include("connect.php");

?>
<script>
  function validation()
  {
    var v = /^[a-zA-Z ]+$/
    if(form1.txtname.value=="")
    {
      alert("Please Enter Product Name");
      form1.txtname.focus();
      return false;
    }else{
      if(!v.test(form1.txtname.value))
      {
        alert("Please Enter Only Characters in Product Name");
        form1.txtname.focus();
        return false;
      }
    }

    if(form1.selcat.value=="0")
    {
      alert("Please Select Category");
      form1.selcat.focus();
      return false;
    }

    if(form1.txtdesc.value=="")
    {
      alert("Please Enter Description");
      form1.txtdesc.focus();
      return false;
    }

    var v = /^[0-9]{1,10}$/
    if(form1.txtprice.value=="")
    {
      alert("Please Enter Product Price");
      form1.txtprice.focus();
      return false;
    }else if(parseInt(form1.txtprice.value)<=0)
    {
      alert("Please Enter Product Price Greater than 0");
      form1.txtprice.focus();
      return false;
    }
    else{
      if(!v.test(form1.txtprice.value))
      {
        alert("Please Enter Only Digits in Product Price");
        form1.txtprice.focus();
        return false;
      }
    }

    var fname = document.getElementById("txtimg").value;
    var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase();
    if(document.getElementById("txtimg").value=="")
    {
        alert("Please Select Image");
        return false;
    }else{
        if(!(ext=="png" || ext=="jpg" || ext=="jpeg" || ext =="webp"))
        {
            alert("Please Select Product Image In Proper Format Like webp, png, jpg or jpeg");
            return false;
        }
    }
  }

  function update_validation()
  {
    var v = /^[a-zA-Z ]+$/
    if(form1.txtname.value=="")
    {
      alert("Please Enter Product Name");
      form1.txtname.focus();
      return false;
    }else{
      if(!v.test(form1.txtname.value))
      {
        alert("Please Enter Only Characters in Product Name");
        form1.txtname.focus();
        return false;
      }
    }

    if(form1.selcat.value=="0")
    {
      alert("Please Select Category");
      form1.selcat.focus();
      return false;
    }

    if(form1.txtdesc.value=="")
    {
      alert("Please Enter Description");
      form1.txtdesc.focus();
      return false;
    }

    var v = /^[0-9]{1,10}$/
    if(form1.txtprice.value=="")
    {
      alert("Please Enter Product Price");
      form1.txtprice.focus();
      return false;
    }else if(parseInt(form1.txtprice.value)<=0)
    {
      alert("Please Enter Product Price Greater than 0");
      form1.txtprice.focus();
      return false;
    }
    else{
      if(!v.test(form1.txtprice.value))
      {
        alert("Please Enter Only Digits in Product Price");
        form1.txtprice.focus();
        return false;
      }
    }

    var fname = document.getElementById("txtimg").value;
    var ext = fname.substr(fname.lastIndexOf(".")+1).toLowerCase();
    if(document.getElementById("txtimg").value!="")
    {
       
        if(!(ext=="png" || ext=="jpg" || ext=="jpeg" || ext =="webp"))
        {
            alert("Please Select Product Image In Proper Format Like webp, png, jpg or jpeg");
            return false;
        }
    }
  }
</script>

<?php

if(isset($_POST['btnsave']))
{
  $name = $_POST['txtname'];
  $catid = $_POST['selcat'];
  $desc = $_POST['txtdesc'];
  $price = $_POST['txtprice'];
  

  //auto number code start...
  $res2 = mysqli_query($con,"select max(product_id) from product_detail");
  $pid=0;
  while($r2=mysqli_fetch_row($res2))
  {
    $pid = $r2[0];
  }
  $pid++;
  //auto number code end...
  $tmppath = $_FILES["txtimg"]["tmp_name"];
  $ipath = "prod_img/".$pid."_".time().".png";
  $query = "insert into product_detail values('$pid','$name','$catid','$desc','$price','$ipath')";
  if(mysqli_query($con,$query))
  {
    move_uploaded_file($tmppath,$ipath);
    echo "<script>";
    echo "alert('Product Saved Successfully');";
    echo "window.location.href='admin_manage_product.php';";
    echo "</script>";
    }
}

if(isset($_REQUEST['pdid']))
{
    $pid = $_REQUEST['pdid'];
    $query="delete from product_detail where product_id='$pid'";
    if(mysqli_query($con,$query))
    {
        echo "<script>";
        echo "alert('Product Deleted Successfully');";
        echo "window.location.href='admin_manage_product.php';";
        echo "</script>";
    }
}

if(isset($_REQUEST['peid']))
{
    $pid = $_REQUEST['peid'];
    $res3=mysqli_query($con,"select * from product_detail where product_id='$pid'");
    $r3=mysqli_fetch_array($res3);
    $name1=$r3[1];
    $cat1=$r3[2];
    $desc1=$r3[3];
    $price1=$r3[4];
    $img1=$r3[5];
}


if(isset($_POST['btnupdate']))
{
  $name = $_POST['txtname'];
  $catid = $_POST['selcat'];
  $desc = $_POST['txtdesc'];
  $price = $_POST['txtprice'];
  
  $pid = $_REQUEST['peid'];

  if($_FILES['txtimg'][size]>0)
  {
    $tmppath = $_FILES["txtimg"]["tmp_name"];
    $ipath = "prod_img/".$pid."_".time().".png";
    move_uploaded_file($tmppath,$ipath);
    $query = "update product_detail set product_name='$name',cat_id='$catid',description='$desc',price='$price',product_img='$ipath' where product_id='$pid'";
  }else{
    $query = "update product_detail set product_name='$name',cat_id='$catid',description='$desc',price='$price' where product_id='$pid'";
  }
  
  if(mysqli_query($con,$query))
  {
    echo "<script>";
    echo "alert('Product Updated Successfully');";
    echo "window.location.href='admin_manage_product.php';";
    echo "</script>";
    }
}
?>
 <div class="bg-light py-3">
      <div class="container">
        <div class="row">
        <div class="col-md-12 mb-0 text-center">
            <h2> <strong class="text-black">MANAGE PRODUCT</strong></h2></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          
          <div class="col-md-6">

            <form  method="post" name="form1" enctype="multipart/form-data">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Product Name</label>
                    <input type="text" class="form-control" name="txtname" value="<?php echo $name1; ?>">
                  </div>
                  
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Select Category</label>
                    <select class="form-control" name="selcat" >
                        <option value="0">--Select Category--</option>
                        <?php
                        $qur5=mysqli_query($con,"select * from category_master");
                        while($q5=mysqli_fetch_array($qur5))
                        {
                            ?>
                            <option value="<?php echo $q5[0]; ?>" <?php if($q5[0]==$cat1){ echo "selected='selected'"; } ?> ><?php echo $q5[1]; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                  </div>
                  
                  <div class="col-md-12">
                        <label for="c_message" class="text-black">Description </label>
                        <textarea name="txtdesc"  cols="30" rows="3" class="form-control"><?php echo $desc1;  ?></textarea>
                    </div>
                </div>
                
            
              </div>
           
          </div>
          <div class="col-md-6">

              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Price</label>
                    <input type="text" class="form-control" name="txtprice" value="<?php echo $price1; ?>">
                  </div>
                  
                </div>
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Select Image</label>
                    <input type="file" class="form-control" name="txtimg" id="txtimg">
                  </div>
                  
                </div>
                
                <div class="form-group row">
                  <div class="col-lg-12">
                    <?php
                    if(isset($_REQUEST['peid']))
                    {
                    ?>
                      <img src='<?php echo $img1; ?>' style="width:150px; height: 150px;" />
                        <input type="submit" class="btn btn-primary " name="btnupdate" value="UPDATE" onclick="return update_`validation();">
                    <?php
                    }else{
                    ?>
                        <input type="submit" class="btn btn-primary " name="btnsave" value="SAVE" onclick="return validation();">
                    <?php
                    }
                    ?>
                    
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="col-md-12 ml-auto">
            <?php
            $qur1 = mysqli_query($con,"select * from product_detail");
            if(mysqli_num_rows($qur1)>0){
                echo "<table class='table table-bordered'>
                        <tr>
                            <th>PRODUCT ID</td>
                            <th>PRODUCT NAME</td>
                            <th>CATEGORY</th>
                            <th>DESCRIPTION</th>
                            <th>PRICE</th>
                            <th>PRODUCT IMAGE</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>";
                    while($q1=mysqli_fetch_array($qur1))
                    {
                        echo "<tr>";
                        echo "<td>$q1[0]</td>";
                        echo "<td>$q1[1]</td>";
                        //echo "<td>$q1[2]</td>";
                        $qur2 = mysqli_query($con,"select * from category_master where cat_id='$q1[2]'");
                        $q2=mysqli_fetch_array($qur2);
                        echo "<td>$q2[1]</td>";
                        echo "<td>$q1[3]</td>";
                        echo "<td>$q1[4]</td>";
                        echo "<td><img src='$q1[5]' style='width:150px; height:150px'></td>";
                        echo "<td><a href='admin_manage_product.php?peid=$q1[0]'>EDIT</a></td>";
                        echo "<td><a href='admin_manage_product.php?pdid=$q1[0]'>DELETE</a></td>";
                        echo "</tr>";
                    }
                echo "</table>";
            }else{
                echo "<h2>No Product Found</h2>";
            }
            ?>

          </div>
        </div>
      </div>
    </div>
   

  
<?php
include("footer.php");
?>