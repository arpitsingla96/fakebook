<?php

	namespace Controllers ;
	use Models\SignUp ;

	class SignUpController
	{
		protected $twig ;

		public function __construct()
		{
			$loader = new \Twig_Loader_Filesystem(__DIR__ . "/../views") ;
			$this->twig = new \Twig_Environment($loader) ;
		}

		public function post()
		{
			if(!isset($_POST['username']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['fullname']) || !isset($_POST['cpassword']))
			{
				header('Location : \signup') ;
			}
			else
			{
				$username = $_POST['username'] ;
				$password = $_POST['password'] ;
				$email = $_POST['email'] ;
				$fullname = $_POST['fullname'] ;
				$cpassword = $_POST['cpassword'] ;
				if($cpassword!==$password)
				{
					echo $this->twig->render("signup.html", array(
						"title"=>"Fakebook | SignUp",
						"error"=>"Passwords don't match"
						)) ;
				}
				else
				{
					$result = SignUp::checkAndAddUser($username, $password, $fullname, $email) ;
					if($result == 0)
					{
						echo $this->twig->render("signup.html",array(
							"title"=>"Fakebook | SignUp",
							"error"=>"Username already exits..."
							)) ;
					}
					else if($result == 2)
					{
						echo $this->twig->render("signup.html",array(
							"title"=>"Fakebook | SignUp",
							"error"=>"Could not complete signup. Please try again later..."
							)) ;
					}
					else if($result == 1)
					{
						header('Location: /posts') ;
					}
				}
			}
		}
	}
?>