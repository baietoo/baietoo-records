<?php
    session_start();

    # TODO: improve readability

    function flash($name = '', $message = '', $class = 'alert alert-success'){
        if(strlen($name)){
            setSession($message, $name, $class);
        }
    }

    function setSession($message, $name, $class){
        $s_class = $name . '_class';
        if(strlen($message) && strlen($_SESSION[$name]) === 0){
            unsetSession($name, $s_class);
            $_SESSION[$name] = $message;
            $_SESSION[$s_class] = $class;
        } elseif(strlen($message) === 0 && strlen($_SESSION[$name])){
            $class = strlen($_SESSION[$s_class]) ? $_SESSION[$s_class] : ''; 
            echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
            unsetSession($name, $s_class);
        }
    }

    function unsetSession($name, $session_class){
        if(strlen($_SESSION[$name])){
            unset($_SESSION[$name]);
        }
        if(strlen($_SESSION[$session_class])){
            unset($_SESSION[$session_class]);
        }
    }
    function isLoggedIn(){
        if(isset($_SESSION['artist_id'])){
            return true;
        }
        return false;
    }
?>