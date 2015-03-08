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

			// $_SERVER['REQUEST_METHOD']
		public function get()
		{
			if(isset($_SESSION['status']) && $_SESSION['status']==1)
			{
				header('Location : /posts')
			}
		}
	} ;
?>