<?php
require 'includes/header.php';
require 'includes/classes/User.php';
require 'includes/classes/Post.php';

if (isset($_POST['post'])) {
    $post = new Post($con, $userLoggedIn);
    $post->submitPost($_POST['post_text'], 'none');
}


?> 

        <div class="row">

		    <div class="col-md-3 user_details column" style="background-color: white">
				<div class="col-md-6">
					<a href="<?php echo $userLoggedIn; ?>">
					<img  src="<?php echo $user['profile_pic']?>">
					</a>
				</div>
				<div class="col-md-6 user_details_left_right">
					<div class="name">
						<a href="<?php echo $userLoggedIn; ?>"> 
						 <?php
						 if(strlen($user['first_name'])>11){   
						  	echo substr( $user['first_name'],0,10).".. ".$user['last_name'];
						  }
						 else{
						 	echo $user['first_name']." ".$user['last_name'];
						 }
						 ?>
						 </a>
					</div>
					
						<?php
						  echo "posts: ".$user['num_posts'];
						  echo "<br>";
						  echo "likes: ".$user['num_likes'];
						?>
				</div>
				
			</div>
			<div class="col-md-1 space">
				

			</div>
			<div class="col-md-8 column main-column" >
				<form class="post_form" action="index.php" method="POST">
					<div class="form-group">
						<textarea name="post_text" id="post_text" placeholder="What's new?" class="form-control"></textarea>
					</div>
					<div class="form-group">
						<input type="submit" name="post" value="post" 
						id="post_btn" >
				    </div>
				    <hr>

				</form>
			</div>
		</div>
</body>

</html>
