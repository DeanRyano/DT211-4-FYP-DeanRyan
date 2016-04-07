<?php
exec("http://192.168.0.4:8094/delPics.sh");
header('Location http://192.168.0.8090/?success=true');
?>
