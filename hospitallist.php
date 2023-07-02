<?php 
session_start();
require 'file/connection.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $delete = mysqli_query ($conn,"DELETE FROM bloodinfo WHERE hid='$id'");
    $delete = mysqli_query ($conn,"DELETE FROM hospitals WHERE id='$id'");
     $sql = "select  hospitals.* from  hospitals ";
     $result = mysqli_query ($conn, $sql);
}

if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select  hospitals.* from  hospitals where  hname='$searchKey'";
}else{
    $sql = "select  hospitals.* from  hospitals ";
}
$result = mysqli_query ($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Bloodbank | Hospitals"; ?>
<?php require 'head.php'; ?>
<style>
    body{
    
    background-size: cover;
    min-height: 0;
    height: 900px;
  }
.login-form{
    width: calc(100% - 20px);
    max-height: 650px;
    max-width: 450px;
    background-color: white;
}

.btn1{
    background: #fff;
    color: red;
    /* font-size: 1.2em; */
    padding: 5px 15px;
    text-decoration: none;
}
.btn1:hover{
    background:red;
    color: #fff;
}
</style>
<body>
    <?php require 'header1.php'; ?>
    <div class="container cont">
        
        <?php require 'message.php'; ?>
        
        <div class="row col-lg-8 col-md-8 col-sm-12 mb-3">
            <form method="get" action="" style="margin-top:-20px; ">
            <label class="font-weight-bolder">Search Hospital : </label>
                <input type="text" name="search" class="form-control">
               <option><?php echo @$_GET['search']; ?></option>

               <a href="hospitallist.php" class="btn btn-info mr-4"> Reset</a>
               <input type="submit" name="submit" class="btn btn-info" value="Search">
           </form>
        </div>

        <table class="table table-responsive table-striped rounded mb-5">
            <tr><th colspan="7" class="title">Hospital Registered</th></tr>
            <tr>
                <th>#</th>
                <th>Hospital ID</th>
                <th>Hospital Name</th>
                <th>Hospital City</th>
                <th>Hospital Email</th>
                <th>Hospital Phone</th>
                <th>Action</th>
            </tr>

            <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                }else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">Nothing to show.</b>';
            }
            ?>
            </div>

        <?php while($row = mysqli_fetch_array($result)) { ?>

            <tr>
                <td><?php echo ++$counter;?></td>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['hname'];?></td>
                <td><?php echo ($row['hcity']); ?></td>
                <td><?php echo ($row['hemail']); ?></td>
                <td><?php echo ($row['hphone']); ?></td>
                <td> <a href="hospitallist.php?id=<?php echo $row['id'];?>"
                 class='btn1'>REMOVE HOSPITAL</a></td>
            </tr>

        <?php } ?>
        </table>
    </div>
    <?php require 'footer.php' ?>
</body>

<script type="text/javascript">
    $('.hospital').on('click', function(){
        alert("Hospital user can't request for blood.");
    });
</script>