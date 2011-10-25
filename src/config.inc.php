<?php
//SERVER SETTINGS FOR DATABASE
$g_db = array(
    "host"       => 'localhost',
    "database"  => "faktura",
    "user"      => 'root',
    "pass"      => ''
);

$ldap_login = array(
    "base_dn"       => 'OU=benutzer,OU=ordner,DC=firma,DC=int',
    "ldap_usr_dom"  => "@firma.int",
    "hostname"      => 'firmdc0.firma.int'  
);

?>