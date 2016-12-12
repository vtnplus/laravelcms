<?php
return [
	"leftmenu" => [
                    
                    "name" => "Điều chỉnh",
                    "icons" =>  "glyphicon glyphicon-cog",
                    "contents" => [
                            "settings" => "Cấu hình chung",
                            "settings/themes" => "Giao diện",
                            "settings/modules" => "Chức năng",
                            "settings/language" => "Ngôn ngữ",
                            "settings/menu" => "Điều chỉnh menu",
                            "settings/widget" => "Quản lý Widgets",
                            "settings/cache" => "Tạo bộ nhớ đệm (Cache)",
                            "settings/upgrade" => "Cập nhập phần mềm",             
                        ],
                    "sort"  => "z"
                ],        "topmenu" => [
                    
                    "name" => "Apps",
                    "icons" =>  "",
                    "contents" => ["posts/posts" => "Danh sách ứng dụng","posts/categories" => "Cài đặt ứng dụng",],
                "sort"  => "a"
                ]
];
?>