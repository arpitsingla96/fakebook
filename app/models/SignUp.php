<?php

	namespace Models ;

	class SignUp
	{
		public function __construct()
		{

		}

		public static function getDB()
		{
			include "../config/credentials.php" ;
			return new \PDO("mysql:db_name=".$db_connect['db_name'].";host=".$db_connect['server'] , $db_connect['username'] , $db_connect['password']) ;
		}

		public static function checkAndAddUser($username , $password , $fullname , $email)
		{
			$db = self::getDB() ;
			
			$checkUser = $db->prepare("SELECT * FROM users WHERE username = :username") ;
			$checkUser->execute(array(
				"username"=>$username
				)) ;
			$row = $checkUser->fetch(\PDO::FETCH_ASSOC);
			if($row)
			{
				return 0 ;
			}
			else
			{
				$password_hash = sha1($password) ;
				$addUser = $db->prepare("INSERT INTO users (fullname , email , username , password_hash) VALUES (:fullname , :email , :username , :password_hash)") ;
				$row = $addUser->execute(array(
					"username"=>$username,
					"password_hash"=>$password_hash,
					"fullname"=>$fullname,
					"email"=>$email
					));
				if($row)
				{
					session_start() ;
					$_SESSION['status']=1;
					$_SESSION['username'] = $username ;
					$_SESSION['email'] = $email ;
					$_SESSION['fullname'] = $fullname ;
					return 1 ;
				}
				else
				{
					return 2 ;
				}
			}
		}
	}
?>