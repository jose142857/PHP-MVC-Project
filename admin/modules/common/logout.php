<?php

if (!defined('IN_SITE')) die('The request not found'); 
 
// delete session login
set_logout();
 
// redirect to login page
redirect(base_url('admin/?m=common&a=login'));

?>