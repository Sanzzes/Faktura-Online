<?php

/**
 * Description of functions
 *
 * @author Steven Bohm <sbohm@synetics.de>
 */
class mobile_class {

    public function set_session($session_array) {
        session_start();
        $_SESSION["user_id"] = $session_array[0];
        $_SESSION["user_username"] = $session_array[1];
        $_SESSION["user_name"] = $session_array[2];
        $_SESSION["user_rights"] = $session_array[3];
        $_SESSION["logged"] = $session_array[4];

    }

}

?>
