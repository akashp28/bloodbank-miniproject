<?php 
session_start();
require 'file/connection.php';

if(isset($_GET['trid1'])){
    $trid1=$_GET['trid1'];
    $select=mysqli_query($conn,"select * from receivertemp where trid='$trid1'");
    while($row=mysqli_fetch_array($select)){
    $trname=$row['trname'];
    $tremail=$row['tremail'];
    $trpassword=$row['trpassword'];
    $trphone=$row['trphone'];
    $trbg=$row['trbg'];
    $trcity=$row['trcity'];
    $trcard=$row['trcard'];
    $trcardno=$row['trcardno'];
}
    $approve=mysqli_query($conn,"insert into receivers(rname,remail,rpassword,rphone,rbg,rcity,rcard,idno)values('$trname','$tremail','$trpassword','$trphone','$trbg','$trcity','$trcard','$trcardno')");
    $delete = mysqli_query ($conn,"DELETE FROM receivertemp WHERE trid='$trid1'");
    $sql = "select  receivertemp.* from  receivertemp ";
     $result = mysqli_query ($conn, $sql);
}

if(isset($_GET['trid2'])){
    $trid2=$_GET['trid2'];
    $delete = mysqli_query ($conn,"DELETE FROM receivertemp WHERE trid='$trid2'");
     $sql = "select  receivertemp.* from  receivertemp ";
     $result = mysqli_query ($conn, $sql);
}

if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select  receivertemp.* from  receivertemp where  trname='$searchKey'";
}else{
    $sql = "select  receivertemp.* from  receivertemp ";
}
$result = mysqli_query ($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Donor Requests "; ?>
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
            <label class="font-weight-bolder">Search Donor : </label>
                <input type="text" name="search" class="form-control">
               <option><?php echo @$_GET['search']; ?></option>

               <a href="donorrequest.php" class="btn btn-info mr-4"> Reset</a>
               <input type="submit" name="submit" class="btn btn-info" value="Search">
           </form>
        </div>

        <table class="table table-responsive table-striped rounded mb-5">
            <tr><th colspan="10" class="title">Donor Requests</th></tr>
            <tr>
                <th>#</th>
                <th>Temp ID</th>
                <th>Donor Name</th>
                <th>Donor Email</th>
                <th>Donor Phone</th>
                <th>Donor BG</th>
                <th>Donor City</th>
                <th>Id Proof Type</th>
                <th>Id No.</th>
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
                <td><?php echo $row['trid'];?></td>
                <td><?php echo $row['trname'];?></td>
                <td><?php echo ($row['tremail']); ?></td>
                <td><?php echo ($row['trphone']); ?></td>
                <td><?php echo ($row['trbg']); ?></td>
                <td><?php echo ($row['trcity']); ?></td>
                <td><?php echo ($row['trcard']); ?></td>
                <td><?php echo ($row['trcardno']); ?></td>
            
                <td> <a href="donorrequest.php?trid1=<?php echo $row['trid'];?>" class='btn2'>APPROVE </a> <br><br>
                <a href="donorrequest.php?trid2=<?php echo $row['trid'];?>"
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