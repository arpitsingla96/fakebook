<?php

	namespace Models ;

	class Login
	{
		public function __construct()
		{

		}

		public static function getDB()
		{
			include "../config/credentials.php" ;
			return new \PDO("mysql:dbname=".$db_connect['db_name'].";host=".$db_connect['server'] ,  $db_connect['username'] , $db_connect['password']); 
		}


		public static function authenticate($username , $password)
		{
			$db = self::getDB() ;

			$checkUser = $db->prepare("SELECT * FROM users WHERE username=:username") ;
			$checkUser->execute(array(
				"username"=>$username
				)) ;
			$row=$checkUser->fetch(\PDO::FETCH_ASSOC) ;
			if($row)
			{
				if($row['password'] === $password)
				{
					$_SESSION['status']=1;
					$_SESSION['username'] = $row["username"] ;
					$_SESSION['email'] = $row["email"] ;
					$_SESSION['fullname'] = $row["fullname"] ;
					return 0 ;
				}
				else
				{
					return 2 ;
				}
			}
			else
			{
				return 1 ;
			}
		}
	} ;
?>