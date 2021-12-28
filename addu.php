<?php

session_start();
session_destroy();
if(!isset($_SESSION['name'])){
    header("location:login.php");
}

?>
<?php
$insert=false;
$update=false;
$delete=false;

$server="localhost";
$username="root";
$password="";
$dbname="signup";

$conn=mysqli_connect($server,$username,$password,$dbname);

if (!$conn) {
    ?>
    <script>
        alert("Could Not Connect");
    </script>
    <?php
}else{
    ?>
        <script>
            alert("Connect succefully");
        </script>
        <?php
}
?>

            <?php
if (isset($_GET['delete'])) {
    $id=$_GET['delete'];
    $delete=true;
    $sql="DELETE FROM `reg` WHERE `reg`.`id` = $id";
   $res=mysqli_query($conn,$sql);
}


if ($_SERVER['REQUEST_METHOD']=='POST') {






if (isset($_POST['editid'])) {
    
    $id=mysqli_real_escape_string($conn,$_POST['editid']);
    $username=mysqli_real_escape_string($conn,$_POST['editfname']);
$email=mysqli_real_escape_string($conn,$_POST['editemail']);
$phone=mysqli_real_escape_string($conn,$_POST['editphone']);
$password=mysqli_real_escape_string($conn,$_POST['editpassword']);
$cpassword=mysqli_real_escape_string($conn,$_POST['editcpassword']);

$sql="UPDATE `reg` SET  `name` = '$username', `email` = '$email', `phone` = '$phone', `password` = '$password', `cpassword` = '$cpassword' WHERE `reg`.`id` = $id";
$res=mysqli_query($conn,$sql);
if ($res) {
    $update=true;
}else{
    echo "could Not update";
}

}else{
$username=mysqli_real_escape_string($conn,$_POST['fname']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$password=mysqli_real_escape_string($conn,$_POST['password']);
$cpassword=mysqli_real_escape_string($conn,$_POST['cpassword']);

$sql="INSERT INTO `reg` ( `name`, `email`, `phone`, `password`, `cpassword`) VALUES ( '$username', '$email', '$phone', '$password', '$cpassword')";

$res=mysqli_query($conn,$sql);
if ($res) {
   $insert=true;
}else{
    echo "not insert succefully";
}
}
}










?>




                <!doctype html>
                <html lang="en">

                <head>
                    <!-- Required meta tags -->
                    <meta charset="utf-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                    <!-- Bootstrap CSS -->
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
                    <link rel="stylesheet" href="//cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
                    <title>Hello, world!</title>
                </head>

                <body>

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="home.php">Home</a>
  </div>
</nav>


                    <?php
    if($insert){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Your Account has been inserted successfully
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>×</span>
      </button>
    </div>";
    }
    ?>
                        <?php
    if($update){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Your Account has been update successfully
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>×</span>
      </button>
    </div>";
    }
    ?>
                        <?php
    if($delete){
      echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
      <strong>Success!</strong> Your Account has been delete successfully
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>×</span>
      </button>
    </div>";
    }
    ?>










                            <!-- Button trigger modal -->
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

                            <!-- Modal -->
                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel">UPDATE USER</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="container">

                                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                                    <div class="form-group">
                                                        <input type="hidden" id="editid" name=editid>
                                                        <label for="FullName">Full Name</label>
                                                        <input type="text" class="form-control" id="editfname" name="editfname" placeholder="Enter Your Full name" required>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="editemail" name="editemail" placeholder="Enter Your email" required>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="phone" class="form-control" id="editphone" name="editphone" placeholder="Enter Your contact" required>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="password">Password</label>
                                                        <input type="password" class="form-control" id="editpassword" name="editpassword" placeholder="type password" required>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Confirmpass">Confirmpassword</label>
                                                        <input type="password" class="form-control" id="editcpassword" name="editcpassword" placeholder="Enter Your Confirm password" required>

                                                    </div>

                                                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Update Account</button>



                                                </form>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>











                            <h1 class="text-center my-5"> ADD Account</h1>
                            <h4 class="text-center my-1"> Get Started With Your Free Account</h4>

                            <div class="container">

                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

                                    <div class="form-group">
                                        <label for="FullName">Full Name</label>
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter Your Full name" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your email" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter Your contact" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="type password" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="Confirmpass">Confirmpassword</label>
                                        <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Enter Your Confirm password" required>

                                    </div>

                                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">ADD Account</button>



                                </form>
                            </div>
                            <div class=" my-4">
                                <table class="table" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">Confirmpassword</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>


                                    <?php

$sql="SELECT * FROM `reg`";
$res=mysqli_query($conn,$sql);
$id=0;
while($row=mysqli_fetch_assoc($res)){

    $id=$id+1;
echo"<tr>
<th scope='row'>".$id."</th>
<td>".$row['name']."</td>
<td>".$row['email']."</td>
<td>".$row['phone']."</td>
<td>".$row['password']."</td>
<td>".$row['cpassword']."</td>
<td><button class='edit btn btn-sm btn-primary' id=".$row['id'].">Edit</button> <button class='delete btn btn-sm btn-danger' id=d".$row['id'].">Delete</button></td>
</tr>";

}
?>
                                        <tbody>
                                        </tbody>
                                </table>
                            </div>






                            <!-- Optional JavaScript; choose one of the two! -->

                            <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
                            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
                            <script src="//cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $('#myTable').DataTable();
                                });
                            </script>
                            <!-- Option 2: Separate Popper and Bootstrap JS -->
                            <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
                            <script>
                                edits = document.getElementsByClassName('edit');
                                Array.from(edits).forEach((element) => {
                                    element.addEventListener("click", (e) => {
                                        console.log("EDIT");
                                        tr = e.target.parentNode.parentNode;
                                        fname = tr.getElementsByTagName("td")[0].innerText;
                                        email = tr.getElementsByTagName("td")[1].innerText;
                                        phone = tr.getElementsByTagName("td")[2].innerText;
                                        password = tr.getElementsByTagName("td")[3].innerText;
                                        cpassword = tr.getElementsByTagName("td")[4].innerText;
                                        console.log(fname, email, phone, password, cpassword);

                                        editfname.value = fname;
                                        editemail.value = email;
                                        editphone.value = phone;
                                        editpassword.value = password;
                                        editcpassword.value = cpassword;
                                        editid.value = e.target.id;
                                        console.log(e.target.id);
                                        $('#editModal').modal('toggle');

                                    })
                                })
                                deletes = document.getElementsByClassName('delete');
                                Array.from(deletes).forEach((element) => {
                                    element.addEventListener("click", (e) => {
                                        console.log('delete');
                                        id = e.target.id.substr(1);
                                        if (confirm("Are you sure you want to delete this note!")) {
                                            console.log("yes");
                                            window.location = `addu.php?delete=${id}`;

                                        } else {
                                            console.log("no");
                                        }
                                    })


                                })
                            </script>
                </body>

                </html>