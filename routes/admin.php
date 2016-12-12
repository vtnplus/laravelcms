<?php
$app->get('/', 'Remios\Apps\Admin@getIndex');
if(file_exists(base_path("profiles/router.php"))){
	include_once base_path("profiles/router.php");
}


if(config("register.router.blogs")){
    config(["register.menu.leftmenu.n.contents.posts/content/manager/blogs" =>  "Bài viết Blog's"]);
    config(["register.menu.leftmenu.n.contents.catalog/content/manager/blogs" =>  "Chuyên mục Blog's"]);
}

if(config("register.router.project")){
    config(["register.menu.leftmenu.n.contents.posts/content/manager/project" =>  "Công trình đã làm"]);
}

if(config("register.router.partner")){
    config(["register.menu.leftmenu.n.contents.posts/content/manager/partner" =>  "Khách hàng & Đối tác"]);
}

if(config("register.router.services")){
    config(["register.menu.leftmenu.n.contents.posts/content/manager/services" =>  "Dịch vụ khách hàng"]);
}

if(config("register.router.support")){
    config(["register.menu.leftmenu.n.contents.posts/content/manager/support" =>  "Tài liệu & Hướng dẫn"]);
}

if(config("register.router.gallery")){
    config(["register.menu.leftmenu.n.contents.posts/content/manager/gallery" =>  "Hình ảnh hoạt động"]);
}

if(config("register.router.video")){
    config(["register.menu.leftmenu.n.contents.posts/content/manager/video" =>  "Video"]);
}
