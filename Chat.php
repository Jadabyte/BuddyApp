<?php
    // simple chat class

class Chat {
    // DB variables
    var $Message;
    // constructor

    function SimpleChat() {
    }
    // adding to DB table posted message
    function acceptMessages() {
        if ($_COOKIE['member_name']) {
            if(isset($_POST['s_say']) && $_POST['s_message']) {
                $sUsername = $_COOKIE['member_name'];
            }
        }
    }

    function getMessages() {

    }

}

?>