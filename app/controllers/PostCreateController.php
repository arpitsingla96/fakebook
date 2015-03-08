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

		public function newPostRequest()
		{
			session_start() ;

			if(isset($_SESSION['status']) && $_SESSION['status'] == 1)
			{
				if(isset($_POST['link']) && isset($_POST['description']) && $_POST['link']!="" && $_POST['description']!="")
				{
					$username = $_SESSION['username'] ;
					$email = $_SESSION['email'] ;
					$post = $_POST['link'] ;
					$description = $_POST['description'] ;
					$new_post = array() ;
					$new_post = Posts::insertNewPost($post,$description) ;
					echo json_encode($new_post) ;
				}
				else
				{
					header('Location : /posts')
				}
			}
			else
			{
				header('Location : /') ;
			}
		}
	}
?>