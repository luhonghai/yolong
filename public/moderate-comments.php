<?php

	if( $input->pc['add_comment'] ){
	
		$post_id = $input->pc['add_comment'];
		$comment = $input->pc['comment'];
		$anonymous = $input->pc['anonymous'];
		
		if ( get_option('publish_comments_directly') == 1){
			$status = 1;
		} else {
			$status = 0;
		}
		
		$timenow = time();
		
		$data = array(
			"post_id" => $post_id , 
			"user_id" => $user_info['id'] , 
			"anonymous" => $anonymous ,
			"comment" => $comment ,
			"date" => $timenow , 
			"status" => $status);
			
		$insert = $db->insert("comments", $data);
		
		add_points('comment');
		
		$comment_info = $db->fetchRow("SELECT * FROM posts WHERE date=" . $input->gc['id'] . " AND user_id=".$user_info['id']);
		
		$current_user = userinfo($comment_info['user_id']);
		?>
		<tr class="opening" id="su<?php echo $comment_info['id']; ?>">
			<td class="opening-logo">
				<a href="opening.html"><img src="<?php echo ( $comment_info['anonymous'] == 1 ) ? 'http://www.gravatar.com/avatar/00000000000000000000000000000000?s=60' : get_gravatar($current_user['email'], 60); ?>" alt="Logo"></a>
			</td>
			<td class="opening-meta">
				<h2>
					<a href="index.php?view=post&id=<?php echo $comment_info['id']; ?>" class="opening-name"><?php echo ( $comment_info['anonymous'] == 1 ) ? "Anonymous" : $current_user['username']; ?></a>
						<?php if ( $user_info['role'] == 1 || $user_info['id'] == $current_user['id']){ ?>
						- <a class="opening-name edit-comment" data-id="<?php echo $comment_info['id']; ?>" data-comment="<?php echo $comment_info['comment']; ?>"><i class="fa fa-edit"></i></a> - <a class="opening-name edit-comment" data-id="<?php echo $comment_info['id']; ?>"><i class="fa fa-trash-o"></i></a>
						<?php } ?>
				</h2>
				<p>
					<?php echo $comment_info['comment']; ?>
				</p>
				<div class="post-meta">
				<?php if ( $comment_info['anonymous'] == 1 ) { ?>
					<span class="post-author"><i class="fa fa-user"></i> <a title="Anonymous Post" rel="author">Anonymous</a></span>
					<?php } else { ?>
					<span class="post-author"><i class="fa fa-user"></i> <a href="./index.php?view=user&user-id=<?php echo $comment_info['user_id']; ?>" title="Posts by <?php echo $current_user['username']; ?>" rel="author"><?php echo get_username($comment_info['user_id']); ?></a></span>
					<span class="post-author"><i class="fa fa-user"></i> <?php echo $current_user['genre']; ?> </span>
					<span class="post-author"><i class="fa fa-user"></i> <?php echo $current_user['age']; ?></span>
					<?php } ?>
					<span class="post-date"><time datetime="<?php echo date("y-m-d",$comment_info['date']); ?>"><i class="fa fa-clock-o"></i> <?php echo date("M d, y",$comment_info['date']); ?></time></span>
				</div>
			</td>
		</tr>
		
		<?
		
		
	}
	
	if( $input->pc['delete_comment'] ){
	
		$comment_id = $input->pc['comment_id'];
		$user_id = $user_info['id'];
			
		$insert = $db->delete("comments", "id=$comment_id AND user_id=$user_id");
		
	}