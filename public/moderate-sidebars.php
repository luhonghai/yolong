<?php

	if( $input->pc['update_sidebar_item'] ){
	
		$title = $input->pc['title'];
		$content = $input->pc['content'];
		$type = $input->pc['type'];		
		$position = $input->pc['position'];	
		$page = $input->pc['page'];		
		
		$data = array( 
		
			"title" => $title ,
			"content" => $content ,
			"type" => $type ,
			"position" => $position ,
			"page" => $page);
			
		$insert = $db->update("sidebars", $data, 'id='.$input->pc['update_sidebar_item']);
	
	}
	
	if( $input->pc['delete_sidebar'] ){
			
		$insert = $db->delete("sidebars", 'id='.$input->pc['delete_sidebar']);
	
	}
	
	if( $input->pc['new_sidebar_item'] ){
	
		$title = $input->pc['title'];
		$content = $input->pc['content'];
		$type = $input->pc['type'];		
		$position = $input->pc['position'];	
		$page = $input->pc['page'];		
		$timenow = time();		
		
		$data = array( "title" => $title ,
			"content" => $content ,
			"type" => $type ,
			"position" => $position ,
			"time" => $timenow ,
			"page" => $page );
			
		$insert = $db->insert("sidebars", $data);
		
		$sidebar_info = $db->fetchRow("SELECT * FROM sidebars WHERE time=" . $timenow);
		
		?>
		
		<div class="post new-post" id="ssu<?php echo $sidebar_info['id'];?>" style="">
			<form method="post" class="sky-form" id="update-sidebar-<?php echo $sidebar_info['id'];?>" style="padding: 15px;">
				<input name="update_sidebar_item" type="hidden" value="<?php echo $sidebar_info['id']; ?>">
				<input name="page" type="hidden" value="<?php echo $sidebar_info['page']; ?>">
				<div class="row">
					<div>
						<label class="input">
							<i class="icon-append fa fa-font"></i>
							<input required="" type="text" name="title" placeholder="Title" value="<?php echo $sidebar_info['title'];?>" >
						</label>
					</div>
				</div>
				<div class="row">
					<label class="label"><span style="color:red;">*</span></label>
					<label class="select">
						<select name="type">
							<option value='top-commenters' <?php echo ('top-commenters' == $sidebar_info['type']) ? "selected='selected'" : ''; ?>>Top Commenters</option>
							<option value='top-schools-confessions' <?php echo ('top-schools-confessions' == $sidebar_info['type']) ? "selected='selected'" : ''; ?>>Top Schools(Confessions)</option>
							<option value='top-schools-users' <?php echo ('top-schools-users' == $sidebar_info['type']) ? "selected='selected'" : ''; ?>>Top Schools(Confessions)</option>
							<option value='top-authors' <?php echo ('top-authors' == $sidebar_info['type']) ? "selected='selected'" : ''; ?>>Top Authors</option>
							<option value='top-challenges-takers' <?php echo ('top-challenges-takers' == $sidebar_info['type']) ? "selected='selected'" : ''; ?>>Top Challenge Takers</option>
							<option value='top-dares-takers' <?php echo ('top-dares-takers' == $sidebar_info['type']) ? "selected='selected'" : ''; ?>>Top Dare Takers</option>
							<option value='badges-rewards' <?php echo ('youtube' == $sidebar_info['type']) ? "selected='selected'" : ''; ?>>Badges & Rewards</option>
							<option value='youtube' <?php echo ('top-challenges-takers' == $sidebar_info['type']) ? "selected='selected'" : ''; ?>>YouTube</option>
							<option value='text' <?php echo ('top-dares-takers' == $sidebar_info['type']) ? "selected='selected'" : ''; ?>>Text</option>
							<option value='image' <?php echo ('youtube' == $sidebar_info['type']) ? "selected='selected'" : ''; ?>>Image</option>
						</select>
						<i></i>
					</label>
				</div>
				<div class="row">
					<div>
						<label class="input">
							<i class="icon-append fa fa-font"></i>
							<input required="" type="text" name="content" placeholder="Amount | YouTube Link" value="<?php echo $sidebar_info['content'];?>">
						</label>
					</div>
				</div>
				<div class="row">
					<div>
						<label class="input">
							<i class="icon-append fa fa-font"></i>
							<input required="" type="text" name="position" placeholder="Position" value="<?php echo $sidebar_info['position'];?>">
						</label>
					</div>
				</div>
				<div class="row">
					<button class="button delete-sidebar" data-id="<?php echo $sidebar_info['id'];?>"><i class="fa fa-trash-o"></i></button><button data-id="<?php echo $sidebar_info['id'];?> type="submit" class="button save-sidebar">Save</button>
				</div>
			</form>
        </div>
		
		<?php
	
	}
	
	