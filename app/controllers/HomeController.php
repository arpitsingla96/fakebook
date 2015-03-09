<?php

	namespace Controllers;

	class HomeController
	{

		protected $twig ;

		public function __construct()
		{
			$loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views') ;
			$this->twig = new \Twig_Environment($loader) ;
		}

		public function get()
		{
			if(isset($_SESSION['status']) && $_SESSION['status']==1)
			{
				header('Location : /posts') ;
				error_log("hi") ;
			}
			else
			{
				//header('Location:localhost/Projects/php-selfhost') ;
				echo $this->twig->render("index.html", array(
					"title" => "SignUp | Login")) ;
				error_log("hi1") ;
			}
		}
	}
?>