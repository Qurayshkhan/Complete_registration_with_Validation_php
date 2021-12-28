<?php

$server="localhost";
$username="root";
$password="";
$dbname="signup";

$conn=mysqli_connect($server,$username,$password,$dbname);

if($conn){
    ?>

<script>
    alert("succefully connected");
</script>

    <?php
}else{
    ?>

    <script>
        alert("DID not connected");
    </script>
    
        <?php
}



?>