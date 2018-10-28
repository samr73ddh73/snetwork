<?php
class User
{
	private $user;
	private $con;

	public function __construct($con,$user)
	{
		$this->con=$con;
		$userDetailsQuery = mysqli_query($con,"SELECT * FROM user WHERE username='$user'");
		if (!$userDetailsQuery)
	{
    	printf("Error: %s\n", mysqli_error($con));
    	exit();
	}
		// $this->user=mysqli_fetch_array($userDetailsQuery); 
	}


	public function getUsername()
	{
		return $this->user['username'];
	}
	public function getFirstAndLastName()
	{
		$username=$this->user['username'];
		$query=mysqli_query($this->con,"select first_name,last_name from user where 
			username='$username");
		$row=mysqli_fetch_array($query);
		return $row['first_name']." ".$row['last_name'];
	}

	 public function getNumPosts() {
        $username = $this->user['username'];
        $query = mysqli_query($this->con, "SELECT num_posts FROM user WHERE username='$username'");
        $row = mysqli_fetch_array($query);
        return $row['num_posts'];
    }
	public function isClosed() {
        $username = $this->user['username'];
        $query = mysqli_query($this->con, "SELECT user_closed FROM user WHERE username='$username'");
        $row = mysqli_fetch_array($query);
        
        if($row['user_closed'] == 'yes') {
            return true;
        } else {
            return false;
        }
    }
    
    public function isFriend($username_to_check) {
        $usernameComma = "," . $username_to_check . ",";
        if (strstr($this->user['friend_array'], $usernameComma) || $username_to_check == $this->user['username']) {
            return true;
        } else {
            return false;
        }
    }
    
    public function getProfilePic() {
        $username = $this->user['username'];
        $query = mysqli_query($this->con, "SELECT profile_pic FROM user WHERE username='$username'");
        $row = mysqli_fetch_array($query);
        return $row['profile_pic'];
    }
}
?>