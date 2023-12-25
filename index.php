<?php
$name1 = $_REQUEST['name1'];
$phone1 = $_REQUEST['phone1'];
$doctor = $_REQUEST['doctor'];
$date = $_REQUEST['date'];
$Specialty = $_REQUEST['Specialty'];
$time = $_REQUEST['time'];


if(isset($_GET['set'])){
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "medico";
    $conn = mysqli_connect($host,$username,$password,$database);
    $insert = "insert into appointnent values($name1,$phone1,$doctor,$date,$Specialty,$time)";
    mysqli_query($conn,$insert);
    if($conn){
        echo "Registration Is Done";
    }
    else{
        echo "Failed Is Done";
    }

}



$name2 = $_REQUEST['name2'];
$phone2 = $_REQUEST['phone2'];
$textarea = $_REQUEST['txt'];



if(isset($_GET['send'])){
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "medico";
    $conn = mysqli_connect($host,$username,$password,$database);
    $insert = "insert into FEEDBACK values($name2,$phone2,$txt)";
    mysqli_query($conn,$insert);
    if($conn){
        echo "THANK YOU";
    }

}


$specialists = $database -> prepare("SELECT specialists FROM specialization");
$specialist = $database -> prepare("SELECT specialist FROM specialization");
$dr_name = $database -> prepare("SELECT name FROM doctors");
$location = $database -> prepare("SELECT location FROM doctors");
$price = $database -> prepare("SELECT price FROM doctors");
$image = $database -> prepare("SELECT image  FROM doctors");

if (isset($_GET['btn_search'])) {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "medico";
    $conn = mysqli_connect($host,$username,$password,$database);
    $btn_search = mysqli_real_escape_string($conn, $_GET['btn_search']);
    $sql = "SELECT specialist FROM specialization WHERE symptoms LIKE '%$btn_search%'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class="specialist"><p>YOU SHOULD VISIT A</p></div>";
        }
    } else {
        echo "No results found for '$btn_search'";
    }
}


if (isset($_GET['btn_search'])) {
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "medico";
    $conn = mysqli_connect($host,$username,$password,$database);
    $btn_search = mysqli_real_escape_string($conn, $_GET['btn_search']);
    $sql = "SELECT specialist FROM specialization, SELECT name FROM doctors
    ,SELECT location FROM doctors,SELECT price FROM doctorsSELECT image  FROM doctors";
    $result = $conn->query($sql);
    if ($specialist == $specialists ) {
        
        while ($row = $result->fetch_assoc()) {
            echo "
        <div class="card">
        <div class="img-container">
            <img src="$image[0]">
        </div>
        <h3>$dr_name[0]</h3>
        <p>$location[0]</p>
        <p>$price[0]</p>
        </div>
        <div class="card">
        <div class="img-container">
            <img src="$image[1]">
        </div>
        <h3>$dr_name[1]</h3>
        <p>$location[1]</p>
        <p>$price[1]</p>
        </div>
        <div class="card">
        <div class="img-container">
            <img src="$image[2]">
        </div>
        <h3>$dr_name[2]</h3>
        <p>$location[2]</p>
        <p>$price[2]</p>
        </div>";
        }
    } else {
        echo "No results found for '$btn_search'";
    }
}

?>