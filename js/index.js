<html>
<body>
 <img src="http://192.168.100.149:8081" width="500" height="400">
 <br/>
 
 <?php
  	$result = file_get_contents("http://192.168.100.149/getImage.php");
	$array = explode (",", $result);
	for($i =0;$i<10;$i++){
		echo "<img border=\"0\" src=\"$array[$i]\" width=\"200px\" ></img>";
	}
 ?>
</body>
</html>