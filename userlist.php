<?php 
session_start();
require 'file/connection.php';

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $delete = mysqli_query ($conn,"DELETE FROM blooddinfo WHERE rid='$id'");
    $delete = mysqli_query ($conn,"DELETE FROM receivers WHERE id='$id'");
     $sql = "select  receivers.* from  receivers ";
     $result = mysqli_query ($conn, $sql);
}

if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select  receivers.* from  receivers where  rname='$searchKey'";
}else{
    $sql = "select  receivers.* from  receivers ";
}

$result = mysqli_query ($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title="Bloodbank | Receivers Donors"; ?>
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
            <label class="font-weight-bolder">Search User : </label>
                <input type="text" name="search" class="form-control">
               <option><?php echo @$_GET['search']; ?></option>

               <a href="userlist.php" class="btn btn-info mr-4"> Reset</a>
               <input type="submit" name="submit" class="btn btn-info" value="Search">
           </form>
        </div>

        <table class="table table-responsive table-striped rounded mb-5">
            <tr><th colspan="8" class="title">Users Registered</th></tr>
            <tr>
                <th>#</th>
                <th>User ID</th>
                <th>User Name</th>
                <th>User City</th>
                <th>User Email</th>
                <th>User Phone</th>
                <th>User Blood Group</th>
                <th>Action</th>
            </tr>

            <div>
                <?php
                if ($result) {
                    $row =mysqli_num_rows( $result);
                    if ($row) { 
                        // echo "<b> Total ".$row." </b>";
                }else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">Nothing to show.</b>';
            }
            ?>
            </div>

        <?php while($row = mysqli_fetch_array($result)) { ?>

            <tr>
                <td><?php echo ++$counter;?></td>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['rname'];?></td>
                <td><?php echo ($row['rcity']); ?></td>
                <td><?php echo ($row['remail']); ?></td>
                <td><?php echo ($row['rphone']); ?></td>
                <td><?php echo ($row['rbg']); ?></td>
                <td> <a href="userlist.php?id=<?php echo $row['id'];?>"
                 class='btn1'>REMOVE USER</a></td>
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