<?php 
if($mysql->connect_error) {
echo "Connection failed: ". $mysql ->connect_error;
} else {
echo "Connected successfully\n";
}

?>
