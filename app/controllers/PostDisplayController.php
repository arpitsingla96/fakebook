<?php
	
	namespace Controllers ;
	use Models\Posts ;

	class PostDisplayControllers
	{
		protected $twig ;

		public function __construct()
		{
			$loader = new \Twig_Loader_Filesystem( __DIR__ . "/../views") ;
			$this->twig = new \Twig_Environment($loader) ;
		}

		public function allPostsRequest()
		{
			if(isset($_SESSION['status']) && $_SESSION['status'] == 1)
			{
				$username = $_SESSION['username'] ;
				$fullname = $_SESSION['fullname'] ;
				$all_posts = array() ;
				$all_posts = Posts::displayAllPosts() ;
				$this->twig->render("posts.html" , array(
					"all_posts" => $all_posts,
					"username" => $username,
					"fullname" => $fullname,
					"title" => $title
					)) ;
			}
			else
			{
				$this->twig->render("login.html" , array(
					"error" => "Please login to Continue"
					)) ;
			}
		}
	}

?>