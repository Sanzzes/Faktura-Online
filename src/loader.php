<?php

/*
 * @Author Steven Bohm <sbohm@synetics.de>
 * @Copyright 2011 by Synetics GmbH Düsseldorf
 */

// Implementierung des Autoloaders
class Autoloader {
        public static function load($class) {
                include_once "src/classes/".$class.".class.php";
        }
}

?>
