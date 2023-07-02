<?php 
session_start();
require 'file/connection.php';

if(isset($_GET['thid1'])){
    $thid1=$_GET['thid1'];
    $select=mysqli_query($conn,"select * from hospitaltemp where thid='$thid1'");
    while($row=mysqli_fetch_array($select)){
    $thname=$row['thname'];
    $themail=$row['themail'];
    $thpassword=$row['thpassword'];
    $thphone=$row['thphone'];
    $thcity=$row['thcity'];
    $thregid=$row['thregid'];
    }
    $approve=mysqli_query($conn,"insert into hospitals(hname,hemail,hpassword,hphone,hcity,regid)values('$thname','$themail','$thpassword','$thphone','$thcity','$thregid')");
    $delete = mysqli_query ($conn,"DELETE FROM hospitaltemp WHERE thid='$thid1'");
    $sql = "select  hospitaltemp.* from  hospitaltemp ";
     $result = mysqli_query ($conn, $sql);
}

if(isset($_GET['thid2'])){
    $thid2=$_GET['thid2'];
    $delete = mysqli_query ($conn,"DELETE FROM hospitaltemp WHERE thid='$thid2'");
     $sql = "select  hospitaltemp.* from  hospitaltemp ";
     $result = mysqli_query ($conn, $sql);
}

if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select  hospitaltemp.* from  hospitaltemp where  thname='$searchKey'";
}else{
    $sql = "select  hospitaltemp.* from  hospitaltemp ";
}
$result = mysqli_query ($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Hospital Requests "; ?>
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
.btn2{
    background: #fff;
    color: green;
    /* font-size: 1.2em; */
    padding: 5px 15px;
    text-decoration: none;
}
.btn2:hover{
    background:green;
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

               <a href="hospitalrequest.php" class="btn btn-info mr-4"> Reset</a>
               <input type="submit" name="submit" class="btn btn-info" value="Search">
           </form>
        </div>

        <table class="table table-responsive table-striped rounded mb-5">
            <tr><th colspan="8" class="title">Hospitals Requests</th></tr>
            <tr>
                <th>#</th>
                <th>Temp ID</th>
                <th>Hospital Name</th>
                <th>Hospital City</th>
                <th>Hospital Email</th>
                <th>Hospital Phone</th>
                <th>Hopital Reg. ID</th>
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
                <td><?php echo $row['thid'];?></td>
                <td><?php echo $row['thname'];?></td>
                <td><?php echo ($row['thcity']); ?></td>
                <td><?php echo ($row['themail']); ?></td>
                <td><?php echo ($row['thphone']); ?></td>
                <td><?php echo ($row['thregid']); ?></td>
            
                <td> <a href="hospitalrequest.php?thid1=<?php echo $row['thid'];?>" class='btn2'>APPROVE </a>&nbsp &nbsp 
                <a href="hospitalrequest.php?thid2=<?php echo $row['thid'];?>"
                 class='btn1'>REJECT</a></td>
                <?php  ?>
            </tr>

        <?php } ?>
        </table>
    </div>
    <?php require 'footer.php' ?>
</body>

<!-- <script type="text/javascript">
    $('.hospital').on('click', function(){
        alert("Hospital user can't request for blood.");
    });
</script> -->