<?php

$workend = strtotime($_POST['workend']);
$drivestart = strtotime($_POST['drive']);

$diff = $drivestart % $workend;

if ($diff != 0) {
    echo true;
} else {
    echo false;
}
?>