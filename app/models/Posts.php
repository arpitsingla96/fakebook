<?php

	use namespace Models ;

	class Posts
	{

		public function __construct()
		{

		}

		public static function getDB()
		{
			include "../config/credentials.php" ;
			return new \PDO("mysql:dbname=" . $db_connect['db_name'] . ";host=" . $db_connect['server'] , $db_connect['username'] , $db_connect['password']) ;
		}

		public static function insertNewPost($post, $description)
		{
			$db = self::getDB() ;

			$username = $_SESSION['username'] ;
			$email = $_SESSION['email'] ;

			$query = $db->prepare("INSERT INTO posts (username, post, email, description) VALUES (:username, :post, :email, :description) ") ;
			$result = $query->execute(array(
				"username"=>$username,
				"email"=>$email,
				"post"=>$post,
				"description"=>$description
				)) ;
			if($result)
			{
				self::displayNewPost($post,$description) ;
			}
		}

		public static function displayNewPost($post,$description)
		{
			$username = $_SESSION['username'] ;
			$email = $_SESSION['email'] ;

			$getTimeForPost = $db->prepare("SELECT time FROM posts WHERE post=:post AND username=:username") ;
			$result = $getTimeForPost->execute(array(
				"post"=>$post,
				"username"=>$username
				)) ;
			if($result)
			{
				$new_post=$result->fetch(\PDO::FETCH_ASSOC) ;
				$new_post['post'] = $post ;
				$new_post['description'] = $description ;
				$new_post['username'] = $username ;
				return $new_post ;
			}
			
		}

		public static function displayAllPosts()
		{
			$get_all_posts = $db->prepare("SELECT * FROM posts ORDER BY time DESC") ;
			$get_all_posts->execute() ;
			$all_posts = array() ;
			while($row=$get_all_posts->fetch(\PDO::FETCH_ASSOC))
			{
				$all_posts[] = $row;
			}
			return $all_posts ;
		}
	}
?>