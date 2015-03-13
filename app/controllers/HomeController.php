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
			session_start() ;
			if(isset($_SESSION['status']) && $_SESSION['status']==1)
			{
				header('Location: /posts') ;
			}
			else
			{
				//header('Location:localhost/Projects/php-selfhost') ;
				echo $this->twig->render("index.html", array(
					"title" => "SignUp | Login")) ;
			}
		}
	}
?>