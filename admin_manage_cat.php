<?php
include("admin_header.php");
include("connect.php");

?>
<script>
  function validation()
  {
    var v = /^[a-zA-Z ]+$/
    if(form1.txtcat.value=="")
    {
      alert("Please Enter Category");
      form1.txtcat.focus();
      return false;
    }else{
      if(!v.test(form1.txtcat.value))
      {
        alert("Please Enter Only Characters in Category");
        form1.txtcat.focus();
        return false;
      }
    }

    
  }
</script>

<?php

if(isset($_POST['btnsave']))
{
  $cat = $_POST['txtcat'];
  

  //auto number code start...
  $res2 = mysqli_query($con,"select max(cat_id) from category_master");
  $cid=0;
  while($r2=mysqli_fetch_row($res2))
  {
    $cid = $r2[0];
  }
  $cid++;
  //auto number code end...

  $query = "insert into category_master values('$cid','$cat')";
  if(mysqli_query($con,$query))
  {
    echo "<script>";
    echo "alert('Category Saved Successfully');";
    echo "window.location.href='admin_manage_cat.php';";
    echo "</script>";
    }
}

if(isset($_REQUEST['cdid']))
{
    $cid = $_REQUEST['cdid'];
    $query="delete from category_master where cat_id='$cid'";
    if(mysqli_query($con,$query))
    {
        echo "<script>";
        echo "alert('Category Deleted Successfully');";
        echo "window.location.href='admin_manage_cat.php';";
        echo "</script>";
    }
}

if(isset($_REQUEST['ceid']))
{
    $cid = $_REQUEST['ceid'];
    $res3=mysqli_query($con,"select * from category_master where cat_id='$cid'");
    $r3=mysqli_fetch_array($res3);
    $cat1=$r3[1];
}


if(isset($_POST['btnupdate']))
{
  $cat = $_POST['txtcat'];
  $cid=$_REQUEST['ceid'];
  
  $query = "update category_master set category='$cat' where cat_id='$cid'";
  if(mysqli_query($con,$query))
  {
    echo "<script>";
    echo "alert('Category Updated Successfully');";
    echo "window.location.href='admin_manage_cat.php';";
    echo "</script>";
    }
}
?>
 <div class="bg-light py-3">
      <div class="container">
        <div class="row">
        <div class="col-md-12 mb-0 text-center">
            <h2> <strong class="text-black">MANAGE CATEGORY</strong></h2></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          
          <div class="col-md-6">

            <form  method="post" name="form1">
              
              <div class="p-3 p-lg-5 border">
                <div class="form-group row">
                  <div class="col-md-12">
                    <label for="c_fname" class="text-black">Category</label>
                    <input type="text" class="form-control" name="txtcat" value="<?php echo $cat1; ?>">
                  </div>
                  
                </div>
                
                <div class="form-group row">
                  <div class="col-lg-12">
                    <?php
                    if(isset($_REQUEST['ceid']))
                    {
                    ?>
                        <input type="submit" class="btn btn-primary " name="btnupdate" value="UPDATE" onclick="return validation();">
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
          <div class="col-md-6 ml-auto">
            <?php
            $qur1 = mysqli_query($con,"select * from category_master");
            if(mysqli_num_rows($qur1)>0){
                echo "<table class='table table-bordered'>
                        <tr>
                            <th>CATEGORY ID</td>
                            <th>CATEGORY</th>
                            <th>EDIT</th>
                            <th>DELETE</th>
                        </tr>";
                    while($q1=mysqli_fetch_array($qur1))
                    {
                        echo "<tr>";
                        echo "<td>$q1[0]</td>";
                        echo "<td>$q1[1]</td>";
                        echo "<td><a href='admin_manage_cat.php?ceid=$q1[0]'>EDIT</a></td>";
                        echo "<td><a href='admin_manage_cat.php?cdid=$q1[0]'>DELETE</a></td>";
                        echo "</tr>";
                    }
                echo "</table>";
            }else{
                echo "<h2>No Category Found</h2>";
            }
            ?>

          </div>
        </div>
      </div>
    </div>
   

  
<?php
include("footer.php");
?>