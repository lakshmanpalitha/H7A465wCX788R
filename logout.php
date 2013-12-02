<?php

include('include/include.php');
if ($pr->getSession('login') == $en->encode('TRUE')) {

    $pr->unsetSession('userId');
    $pr->unsetSession('userName');
    $pr->unsetSession('login');
    $pr->unsetSession('level');
    $pr->redirect('index.php');
}
?>
