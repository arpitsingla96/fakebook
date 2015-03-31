<?php
	
	namespace Controllers ;
	use Models\Posts ;

	class PostCreateController
	{
		protected $twig ;

		public function __construct()
		{
			$loader = new \Twig_Loader_Filesystem( __DIR__ . "/../views") ;
			$this->twig = new \Twig_Environment($loader) ;
		}

		public function get()
		{
			session_start() ;

			if(isset($_SESSION['status']) && $_SESSION['status'] == 1)
			{
				if(isset($_GET['link']) && isset($_GET['description']) && $_GET['link']!="" && $_GET['description']!="")
				{
					$username = $_SESSION['username'] ;
					$email = $_SESSION['email'] ;
					$post = $_GET['link'] ;
					$description = $_GET['description'] ;
					$new_post = array() ;
					$new_post = Posts::insertNewPost($post,$description) ;
					echo json_encode($new_post) ;
				}
				else
				{
					header('Location: /posts') ;
				}
			}
			else
			{
				header('Location : /') ;
			}
		}
	}
?>