<?php

class admin {

    public function admin() {
        $this->read = new read();
        $this->con = new DB();
        $this->er = new errormsg();
        $this->qu = new query();
        $this->en = new Encryption();
    }

    public function activateUser($userId) {
        if ($userId) {
            $qry = "UPDATE users SET status='A' WHERE user_id='" . $userId . "'"; //User activate
            if ($this->con->execute($qry)) {//if success
                $cur = date('Y-m-d H:i:s');
                $settings = $this->getBookSheduleSettings();
                $daysPerRound = 7;
                if ($settings) {
                    $daysPerRound = $settings->days_for_round;
                }

                $qry2 = "UPDATE book_read_shedule SET shedule_starting='" . $cur . "',shedule_ending='" . date('Y-m-d H:i:s', strtotime($cur . ' + ' . $daysPerRound . ' day')) . "',active_shedule='1' WHERE user_id='" . $userId . "'"; //User deactivate
                if ($this->con->execute($qry2)) {
                    $this->er->createerror("User activated!", 0);
                    return true;
                }
                return true;
            }
            return false;
        }
    }

    public function deactivateUser($userId) {
        if ($userId) {
            $qry = "UPDATE users SET status='I' WHERE user_id='" . $userId . "'"; //User deactivate
            if ($this->con->execute($qry)) {//if success
                $qry2 = "UPDATE book_read_shedule SET shedule_starting='',shedule_ending='',active_shedule='0' WHERE user_id='" . $userId . "'"; //User deactivate
                if ($this->con->execute($qry2)) {
                    $this->er->createerror("User deactivated!", 0);
                    return true;
                }
            }
            return false;
        }
    }

    public function confirmUser($userId) {
        if ($userId) {
            $qry = "UPDATE users SET status='A',confirm='Y',last_subscription_date='" . date('Y-m-d H:i:s') . "' WHERE user_id='" . $userId . "'"; //User deactivate
            if ($this->con->execute($qry)) {//if success
                $this->er->createerror("User confirmed!", 0);
                $settings = $this->getBookSheduleSettings();
                $daysPerRound = 7;
                if ($settings) {
                    $daysPerRound = $settings->days_for_round;
                }
                $sheduleQry = "INSERT INTO book_read_shedule(user_id,shedule_starting,shedule_ending,active_shedule) VALUES('" . $userId . "','" . date('Y-m-d H:i:s') . "','" . date('Y-m-d H:i:s', strtotime($cur . ' + ' . $daysPerRound . ' day')) . "',1)";
                $this->con->execute($sheduleQry);
                return true;
            }
            return false;
        }
    }

    public function getBookSheduleSettings() {
        $qry
                = "SELECT * FROM book_shedule_settings";
        $settings = $this->con->queryUniqueObject($qry);
        return ($settings ? $settings : false);
    }

}

?>