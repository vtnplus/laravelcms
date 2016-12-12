<?php
function social_sharing($atts = [], $content=""){
		extract( shortcode_atts( array(
	      "size"    => "",
	      "shadow"	=> false,
	      "circle"	=> false,
	      "class"	=>	"",
	      "url"	=> false,
	      "title"	=> "",
	      "image"	=> "",
	      "media"	=> ""
	    ), $atts ) );
	$size = ($size ? "azm-size-".$size : null);
	$options = config("site.social");
	
	if($shadow == "true"){
		$class .= "azm-long-shadow ";
	}
	if($circle == "true"){
		$class .= "azm-circle ";
	}
	$arvs = [
		"twitter"	=> 'http://twitter.com/intent/tweet?status=[TITLE]+[URL]',
		"pinterest"	=> 'http://pinterest.com/pin/create/bookmarklet/?media=[MEDIA]&url=[URL]&is_video=false&description=[TITLE]',
		"facebook"	=> 'http://www.facebook.com/sharer.php?u=[URL]&title=[TITLE]&img=[IMAGE]',
		"google-plus"	=> 'https://plus.google.com/share?url=[URL]',
		"reddit"	=> 'http://www.reddit.com/submit?url=[URL]&title=[TITLE]',
		"icio"	=> 'http://del.icio.us/post?url=[URL]&title=[TITLE]&notes=[DESCRIPTION]',
		"digg"	=> 'https://digg.com/submit?url=[URL]&title=[TITLE]',
		"tapiture"	=> 'http://tapiture.com/bookmarklet/image?img_src=[IMAGE]&page_url=[URL]&page_title=[TITLE]&img_title=[TITLE]&img_width=[IMG WIDTH]img_height=[IMG HEIGHT]',
		"stumbleupon"	=> 'http://www.stumbleupon.com/submit?url=[URL]&title=[TITLE]',
		"linkedin"	=> 'http://www.linkedin.com/shareArticle?mini=true&url=[URL]&title=[TITLE]&source=[SOURCE/DOMAIN]',
		"slashdot"	=> 'http://slashdot.org/bookmark.pl?url=[URL]&title=[TITLE]',
		"technorati"	=> 'http://technorati.com/faves?add=[URL]&title=[TITLE]',
		"posterous"	=> 'http://posterous.com/share?linkto=[URL]',
		"tumblr"	=> 'http://www.tumblr.com/share?v=3&u=[URL]&t=[TITLE]',
		"google-bookmarks"	=> 'http://www.google.com/bookmarks/mark?op=edit&bkmk=[URL]&title=[title]&annotation=[DESCRIPTION]',
		"newsvine"	=> 'http://www.newsvine.com/_tools/seed&save?u=[URL]&h=[TITLE]',
		"ping"	=> 'http://ping.fm/ref/?link=[URL]&title=[TITLE]&body=[DESCRIPTION]',
		"evernote"	=> 'http://www.evernote.com/clip.action?url=[URL]&title=[TITLE]',
		"friendfeed"	=> 'http://www.friendfeed.com/share?url=[URL]&title=[TITLE]',
		

		
	];
    $social = (is_array($options) ? $options : []);
    $code = [];
    foreach ($arvs as $key => $value) {
    	$urls = str_replace(['[URL]','[TITLE]','[IMAGE]','[MEDIA]'], [$url, $title, $image, $media], $value);
        if($key && $key != "private"){
        	$code[] = '<a href="'.$urls.'" class="btn btn-social azm-social '.$size.' '.$class.' azm-r-square azm-'.$key.'"><i class="fa fa-'.$key.'"></i> '.($size == "" ? $key : "").'</a>';
        }   
    }
    return implode($code,"\n");
}
add_shortcode("social_sharing","social_sharing");