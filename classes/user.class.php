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

        $user = $this->con->queryUniqueObject("SELECT user_id,first_name,email_address,status,confirm,last_subscription_date,subscription FROM users WHERE email_address='" . $email . "' AND password='" . $this->en->encode($password) . "'");
        if ($user) {
            if ($user->confirm != 'Y') {//check user active or inactive
                $this->er->createerror("Login failed! Still your account is not confirm", 1);
                return false;
            }
            if ($user->status != 'A') {//check user active or inactive
                $this->er->createerror("Login failed! Your account is temprely blocked", 1);
                return false;
            }

            /*             * * Get diffrence between register date and now date * *  */
            $date1 = strtotime($user->last_subscription_date);
            $date2 = time();
            $subTime = $date2 - $date1;
            //$y = ($subTime / (60 * 60 * 24 * 365));
            $d = ($subTime / (60 * 60 * 24)) % 365;
            //$h = ($subTime / (60 * 60)) % 24;
            //$m = ($subTime / 60) % 60;
            if ($d > ($user->subscription * 30)) {
                $this->er->createerror("Login failed! Your register period expired.. please contact your site admin", 1);
                return false;
            }
            
            //if success login create session and redirect to user profile
            $this->pr->craeteSession($this->en->encode('userId'), $this->en->encode($user->user_id));
            $this->pr->craeteSession($this->en->encode('userName'), $this->en->encode($user->first_name));
            $this->pr->craeteSession($this->en->encode('login'), $this->en->encode('TRUE'));

            $logUpdate = "UPDATE users SET last_login_date='" . date('Y-m-d H:i:s') . "' WHERE 	user_id='" . $user->user_id . "'";
            $this->con->execute($logUpdate);

            return true;
        }
        $this->er->createerror("Login failed! Email or password incorrect", 1);
        return false;
    }

    function getSheduleDetails($userId) {
        $qry = "SELECT * FROM book_read_shedule WHERE user_id='" . $userId . "'";
        $res = $this->con->queryUniqueObject($qry);
    }

    function curruntUserBook($userId) {

        $qry = "SELECT * FROM book_by_users WHERE user_id='" . $userId . "' AND status=1";
        if (!$res = $this->con->queryMultipleObjects($qry)) {
            
          
        }
    }

}

?>