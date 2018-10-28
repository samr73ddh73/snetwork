<?php
class Post
{
	private $user;
	private $con;

	public function __construct($con,$user)
	{
		$this->con=$con;
		$this->user_obj=new User($con,$user) ;
	}

	public function submitPost($body,$user_to)
	{
		$body=strip_tags($body);
		$body=mysqli_real_escape_string($this->con,$body);//it escapes the single quotes present in the body,so as mysql donot get confused//
		$check_empty=preg_replace('/\s/', '', $body); //Deletes all the spaces
		if($check_empty!="")
		{
			//current time:
			$date_added=date("Y-m-d H:i:s");

			//get username
			$added_by=$this->user_obj->getUsername();

			if($user_to ==$added_by)
			{
				$user_to="none";
			}

			
			$query = mysqli_query($this->con, "INSERT INTO posts VALUES('', '$body', '$added_by', '$user_to', '$date_added', 'no', 'no', '0')");
			$returned_id = mysqli_insert_id($this->con);

            // Insert notification
            // Update post count for user
            $num_posts = $this->user_obj->getNumPosts();
            $num_posts++;
            $update_query = mysqli_query($this->con, "UPDATE user SET num_posts='$num_posts' WHERE username='$added_by'");
        }
    }


		


}
?>