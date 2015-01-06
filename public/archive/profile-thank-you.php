<?php 

$content = $db->fetchOne("SELECT content FROM pages WHERE id = '".get_option('thank-you')."'");

if ( $content ){
	echo $content;
}

?>