<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simple";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
var_dump($conn);die;
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//	include("dbLink.php");
//	$link=Connection();
	if(isset($_GET['id_node']) and isset($_GET['ph']) and isset($_GET['temp'])){
		if (empty($_GET["id_node"]) or empty($_GET["ph"]) or empty($_GET["temp"]))	{
			echo "ERROR empty(?ph=val&ph=val)";
		}
		else{
			$id_node=$_GET['id_node'];
			$ph=$_GET["ph"];
			$command = "INSERT INTO `ph` ";
			$slot = "(`id`, `id_node`, `time_record`, `ph`) ";
			$val = "VALUES (NULL, '".$id_node."' , 'null' , '".$ph."');";
			$query1 = $command . $slot . $val;
			$temp=$_GET["temp"];
			$command = "INSERT INTO `temp` ";
			$slot = "(`id`, `id_node`, `time_record`, `temp`) ";
			$val = "VALUES (NULL, '".$id_node."' , 'null' , '".$temp."')";
			$query2 = $command . $slot . $val;

//			echo "PostOK<br>";
//			printf("%s",$query1." == ".$query2);
//			mysqli_query($link,$query);
			mysqli_query($conn,$query1);
			mysqli_query($conn,$query2);
            var_dump(mysqli_query($conn,$query1));die;
		}
	}
	else {
		echo "ERROR set(?ph=)";
	}
?>
