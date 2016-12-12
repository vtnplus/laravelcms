<?php
return [
	"leftmenu" => [
                    "injoin" => "parent",
                    "name" => "Tài khoản",
                    "icons" =>  "glyphicon glyphicon-user",
                    "contents" => [
                        "account/access/manager/saff" => "Người quản lý",
                        "account/access/manager/user" => "Thành viên",
                        "account/groups" => "Phân nhóm",
                        "account/access/manager/baned" => "Cấm truy cập",
                        "account/newlaster" => "New laster",           
                    ],
                    "sort" => "y"
                ],
                "topmenu" => [
                    "injoin" => "parent",
                    "name" => "Khách hàng",
                    "icons" =>  "",
                    "contents" => ["posts/posts" => "Bài Viết","posts/categories" => "Categories",]
                ]
];
?>