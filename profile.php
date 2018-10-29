<?php
include("includes/header.php");
require 'includes/classes/User.php';
require 'includes/classes/Post.php';

if (isset($_GET['profile_username'])) {
    $username = $_GET['profile_username'];
    $user_details_query = mysqli_query($con, "SELECT * FROM user WHERE username='$username'");
    $user_array = mysqli_fetch_array($user_details_query);
    if (count($user_array)==0) {
        header("Location: user_closed.php");
    }
    $num_friends = (substr_count($user_array['friend_array'], ",")) - 1;
}


if (isset($_POST['remove_friend'])) {
    $user = new User($con, $userLoggedIn);
    $user->removeFriend($username);

}

if (isset($_POST['add_friend'])) {
    $user = new User($con, $userLoggedIn);
    $user->addFriend($username);

}

if (isset($_POST['respond_request'])) {
    header("Location: requests.php");
 
}


?>

<style type="text/css">
    .wrapper {
        margin-left: 0px;
        padding-left: 0px;
    }
</style>

<div class="profile_left">
    <!-- <div style="margin-top: 5%;"></div> -->
    <img src="<?php echo $user_array['profile_pic']; ?>">

     <div class="profile_info">
        <p><?php echo "Posts: " . $user_array['num_posts']; ?></p>
        <p><?php echo "Likes: " . $user_array['num_likes']; ?></p>
        <p><?php echo "Friends: " . $num_friends ?></p>
    </div>

    <form action="<?php echo $username; ?>" method="POST">
        <?php 
            $profile_user_obj = new User($con, $username); 
            if ($profile_user_obj->isClosed() ) {
                header("Location: user_ closed.php");
            }

            $logged_in_user_obj = new User($con, $userLoggedIn);


            if ($userLoggedIn != $username) {
                if ($logged_in_user_obj->isFriend($username)) {
                    echo '<input type="submit" name="remove_friend" class="btn-danger btn" style="margin-right: 30%; margin-left: 30%; margin-top: 5%;" value="Remove friend"><br>';
                }
                elseif ($logged_in_user_obj->didRecieveRequest($username)) {
                    echo '<input type="submit" name="respond_reuquest" class="btn-success btn" style="margin-right: 30%; margin-left: 30%; margin-top: 5%;" value="Respond to request"><br>';
                }
                elseif ($logged_in_user_obj->didSendRequest($username)) {
                    echo '<input type="submit" name="" class="btn-info btn" style="margin-right: 30%; margin-left: 30%; margin-top: 5%;" value="Respond to request"><br>';
                }
                else{
                    echo '<input type="submit" name="add_friend" class="btn-success btn" style="margin-right: 30%; margin-left: 30%; margin-top: 5%;" value="Add Friend"><br>';
                }
            }

         ?>
              

    </form>

</div>
<!-- style="margin-left: 20%; margin-right: 5%; margin-top: 5%" -->
<div class="main_column column"  style="margin-left: 20%; margin-right: 5%; margin-top: 4%"  >
    <!-- <div style="margin-top: 3%;"></div> -->
    <?php
    echo $username;
    ?>
</div>

<!-- </div> -->
</body>
</html>