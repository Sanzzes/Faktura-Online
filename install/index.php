<?php
if(file_exists('../src/config.inc.php')){
header("Location: ../");
}else{
header("Location: install.php");
} 
?>