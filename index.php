<?php
require 'includes/header.php';

?> 
	<div class="row">
	<div class="col-md-4 user_details column" style="background-color: white">
		<div class="col-md-6">
			<a href="<?php echo $userLoggedIn; ?>">
			<img  src="<?php echo $user['profile_pic']?>">
			</a>
		</div>
		<div class="col-md-6 user_details_left_right">
			<a href="<?php echo $userLoggedIn; ?>"> 
				<div class="name">
				 <?php
				 if(strlen($user['first_name'])>11)
				  {   echo substr( $user['first_name'],0,10).".. ".$user['last_name'];
				  }
				 else
				 {
				 	echo $user['first_name']." ".$user['last_name'];
				 }
				 ?>
				</div>
			</a>
				<?php
				  echo "posts: ".$user['num_posts'];
				  echo "<br>";
				  echo "likes: ".$user['num_likes'];
				?>
		</div>
		
	</div>
	<div class="col-md-1 space">
		
	</div>
	<div class="col-md-7 column main-column" >
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

</div>
</body>

</html>
