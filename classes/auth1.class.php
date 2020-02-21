<?php
include_once 'MysqliDb.php';
include_once '../../includes/connection.php';
//$db = new Mysqlidb ('localhost', 'root', '', 'corephp');

class Auth extends MysqliDb
{
	public function __construct()
	{
		parent::__construct();
	}

	public function login($email, $password, $remember)
	{
		global $db;
		$return_array = array();

		$cols = Array ("id","email","password","is_admin","firstname","lastname");
		$users = $db->get ("users", null, $cols);

		if ($db->count > 0){
    		foreach ($users as $user)
    		 { 
    			if($user['email']==$email)
    			{
    					if ($user['password'] === $password)
						{
							if ($user['is_admin'] != 1)
							{
								$return_array['response'] = 'not_valid_role';

							}
							else
							{
								if ($remember)
								{
									$cookie_name  = 'rememberlogin';
									$cookie_value = $row['id'];
									setcookie($cookie_name, $cookie_value, time() + (86400 * 7), '/'); // 86400 = 1 day
								}

								$_SESSION['user_id']     = $user['id'];
								$_SESSION['email']       = $user['email'];
								$_SESSION['username']    = $user['firstname'].' '.$user['lastname'];
								$_SESSION['is_loggedin'] = true;

								$return_array['response'] = 'success';
							}
						}
    					
			    		else
						{
							$return_array['response'] = 'incorrect_password';
						}
    			}
    		
    	
    			else
				{
					$return_array['response'] = 'wrong_email';
				}

				return $return_array;
			}
		}
		}
	
/*

public function autologin()
	{
		if (isset($_COOKIE['rememberlogin']))
		{
			global $db
			$sql    = "SELECT * FROM users WHERE id=$_COOKIE[$cookie_name]";
			$result = $db->query($sql);

			if ($result->num_rows == 1)
			{
				while ($row = $result->fetch_assoc())
				{
					$_SESSION['user_id']     = $row['id'];
					$_SESSION['email']       = $row['email'];
					$_SESSION['username']    = $row['firstname'].' '.$row['lastname'];
					$_SESSION['is_loggedin'] = true;
				}

				return true;
			}
		}

		return false;
	}
*/
	public function is_loggedin()
	{
		if (isset($_SESSION['is_loggedin']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function logout()
	{
		session_destroy();
		setcookie('rememberlogin', '', time() - (86400 * 7), '/');
	}
}

		
?>