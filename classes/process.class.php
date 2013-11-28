<?php

class process {

    public function process() {
        $this->read = new read();
        $this->con = new DB();
        $this->er = new errormsg();
        $this->qu = new query();
        $this->en = new Encryption();
       
    }

    public function sessionCheck() {
        if ($this->session->logedin)
            return true;
        return false;
    }

    public function redirect($url) {
        echo '<meta http-equiv="refresh" content="0;url=' . $url . '">';
        exit;
    }

    public function craeteSession($sessionName, $value=true) {
        if (isset($_SESSION[$sessionName])) {
            unset($_SESSION[$sessionName]);
        }
        $_SESSION[$sessionName] = $value;
    }

    public function checkSession() {
        if (isset($_SESSION['adv']) || isset($_SESSION['adt'])) {
            return true;
        }
        return false;
    }

    public function getSession($sessionName) {
        if (!isset($_SESSION[$sessionName]) && empty($_SESSION[$sessionName])) {
            return false;
        }
        return $_SESSION[$sessionName];
    }

    public function unsetSession($sessionName) {
        if (!isset($_SESSION[$sessionName])) {
            return false;
        }
        unset($_SESSION[$sessionName]);
        return true;
    }
}

?>