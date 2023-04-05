<?php
$error = array();
 
// check admin
if (is_admin()){
    redirect(base_url('admin/?m=common&a=dashboard'));
}
 
// BƯỚC 2: check submit
if (is_submit('login'))
{    
    // get username & password
    $username = input_post('username');
    $password = input_post('password');
     
    // check username
    if (empty($username)){
        $error['username'] = 'No username be entered';
    }
     
    // check password
    if (empty($password)){
        $error['password'] = 'No password be entered';
    }
     
    // check error
    if (!$error)
    {
        // include file database user
        include_once('database/user.php');
         
        // get user info by username
        $user = db_user_get_by_username($username);
         
        // If no result
        if (empty($user)){
            $error['username'] = 'username was wrong';
        }
        // if password was wrong
        else if ($user['password'] != md5($password)){
            $error['password'] = 'password was wrong';
        }
         
        // if username & password are ok redirect to home page
        if (!$error){
            set_logged($user['username'], $user['level']);
            redirect(base_url('admin/?m=common&a=dashboard'));
        }
    }
}
 
?>
 
<?php include_once('widgets/header.php'); ?>
<h1>Login Page!</h1>
<form method="post" action="<?php echo base_url('admin/?m=common&a=login'); ?>">
    <table>
        <tr>
            <td>Username</td>
            <td>
                <input type="text" name="username" value=""/>
                <?php show_error($error, 'username'); ?>
            </td>
        </tr>
        <tr>
            <td>Password</td>
            <td>
                <input type="password" name="password" value=""/>
                <?php show_error($error, 'password'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="request_name" value="login"/>
            </td>
            <td>
                <input type="submit" name="login-btn" value="Đăng nhập"/>
            </td>
        </tr>
    </table>
</form>
<?php include_once('widgets/footer.php'); ?>
