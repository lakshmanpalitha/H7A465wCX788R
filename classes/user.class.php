<?php

class user {

    public function user() {
        $this->read = new read();
        $this->con = new DB();
        $this->er = new errormsg();
        $this->qu = new query();
        $this->en = new Encryption();
        $this->email = new email();
        $this->pr = new process();
    }

    function registerUser($userData) {
        if (!$userData) {
            return false;
        }
        if ($userData['password'] != $userData['confirm_password']) {
            $this->er->createerror("Confirm password missmach", 1); //genarate error for invalid password input
            return false;
        }

        $userData['password'] = $this->en->encode($userData['password']); //encode password befor save
        unset($userData['confirm_password']); //confirm password not need to save to the DB


        if (!$qry = $this->qu->insertQuery($userData, "users")) {//create insert qry for data to the 'user' table
            $this->er->createerror("Qry create failed", 1);
            return false;
        }
        if (!$this->con->execute($qry)) {//run the qry and insert data to 'user' table
            return false;
        }

        //inform to the customer registration success by email
        $massage = 'Dear ' . $userData['first_name'] . ",\r\n";
        $massage.="Thank you for registration from .....Your registration is done.you will recive confirmation mail shortly...\r\n";
        $massage.="Thank you,\r\n";
        $massage.="Web team.\r\n";
        $this->email->setEmail(null, "Registration Success", $massage);
        $this->email->send();
        
        return true;
    }

    function loginUser($email, $password) {

        $user = $this->con->queryUniqueObject("SELECT user_id,first_name,email_address,status FROM users WHERE email_address='" . $email . "' AND password='" . $this->en->encode($password) . "'");
        if ($user) {
            if ($user->email_address != $email) {//check correct user login
                $this->er->createerror("Login failed! email or password incorrect", 1);
                return false;
            }
            if ($user->status != 1) {//check user active or inactive
                $this->er->createerror("Login failed! your account not acctivated", 1);
                return false;
            }
            //if success login create session and redirect to user profile
            $this->pr->craeteSession($this->en->encode('userId'), $this->en->encode($user->user_id));
            $this->pr->craeteSession($this->en->encode('userName'), $this->en->encode($user->first_name));
            $this->pr->craeteSession($this->en->encode('login'), $this->en->encode('TRUE'));
        }
    }

}

?>