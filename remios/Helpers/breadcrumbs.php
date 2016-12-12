<?php
function breadcrumbs(){
	$title = config("register.seo.title.0");
	$data = view("breadcrumb",["title" => $title])->render();
echo '<div class="breadcrumbs" style="'.(config("register.pages.breadcrumbs.bg") ? "background-image:url('".config("register.pages.breadcrumbs.bg")."');" : "").'">
	'.$data.'
</div>';
}
