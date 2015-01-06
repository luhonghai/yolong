<?php

if (isset($_POST['action'])) {
	switch ($_POST['action']) {
		// Iframe upload action
		case 'upload':
			$file   = @$_FILES['ip-file'];
			$obj_id = isset($userID) ? $userID : $_POST['obj_id'];
			$type   = $_POST['type'];

			$image_picker->upload($file, $type, $obj_id);
		break;

		//HTML5 upload / webcam upload / iframe save \w crop
		case 'save':
			$_POST['obj_id'] = isset($userID) ? $userID : $_POST['obj_id'];
			$image_picker->save_cropped($_POST);
		break;
	}
}

?>