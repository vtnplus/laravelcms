INSERT INTO `categories` (`id`, `parent_id`, `pages_maps`, `type`, `subtype`, `title`, `icons`, `thumbnails`, `description`, `content`, `comments`, `tags`, `options`, `status`, `display_as`, `show_subcat`, `sorts`, `views`, `stores_id`, `users_id`, `language`, `groups_access`, `seo_urls`, `meta_keyword`, `meta_description`) VALUES ('1', '0', '', 'products', '', 'Destops 245', '', '', '', '', '0', '', '', '1', '', '0', '1', '0', '{stores_id}', '0', 'vn', '0', 'destops.html', '', ''),
('2', '0', '1', 'products', '', 'Laptop & Notebook', '', '', '', '', '0', '', '', '1', '', '0', '2', '0', '{stores_id}', '0', 'vn', '0', 'laptop-notebook.html', '', ''),
('3', '0', '', 'products', '', 'Components', '', '', '', '', '0', 'main, catalog, hotline', '', '1', '', '0', '8', '0', '{stores_id}', '0', 'vn', '0', 'components.html', '', ''),
('4', '0', '', 'products', '', 'Tablets', '', '', '', '<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="https://cdn02.static-adayroi.com/0/2016/09/16/1473993933381_8742577.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="https://cdn02.static-adayroi.com/0/2016/09/16/1473991516542_5660512.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
  </div>

  
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>', '0', '', '', '1', '', '0', '4', '0', '{stores_id}', '0', 'vn', '0', 'tablets.html', '', ''),
('5', '0', '', 'products', '', 'Software', '', '', '', '', '0', '', '', '1', '', '0', '5', '0', '{stores_id}', '0', 'vn', '0', 'software.html', '', '');


INSERT INTO `categories` (`id`, `parent_id`, `pages_maps`, `type`, `subtype`, `title`, `icons`, `thumbnails`, `description`, `content`, `comments`, `tags`, `options`, `status`, `display_as`, `show_subcat`, `sorts`, `views`, `stores_id`, `users_id`, `language`, `groups_access`, `seo_urls`, `meta_keyword`, `meta_description`) VALUES ('6', '0', '', 'products', '', 'Phones & PDAs', '', '', '', '', '0', '', '', '1', '', '0', '6', '0', '{stores_id}', '0', 'vn', '0', 'phones-pdas.html', '', ''),
('7', '0', '', 'products', '', 'Cameras', '', '', '', '', '0', '', '', '1', '', '0', '3', '0', '{stores_id}', '0', 'vn', '0', 'cameras.html', '', ''),
('8', '0', '', 'products', '', 'MP3 Players', '', '', '', '', '0', '', '', '1', '', '0', '7', '0', '{stores_id}', '0', 'vn', '0', 'mp3-players.html', '', ''),
('10', '0', '', 'blogs', '', 'Test Catalog', '', '', '', '', '0', '', '', '0', '', '0', '0', '0', '{stores_id}', '0', '', '0', 'test-catalog.html', '', '');
INSERT INTO `languages` (`id`, `name`, `country_code`, `language_code`, `folder`, `status`, `domain`) VALUES ('1', 'Tiếng việt', 'vn', 'vi', 'vn', '1', ''),
('2', 'English', 'GB', 'en', 'GB', '1', ''),
('3', 'China', 'CN', 'zh', 'CN', '1', '');
INSERT INTO `mail_template` (`id`, `keyword`, `subject`, `content`, `send_number`, `language`, `stores_id`, `users_id`, `type`, `layout`, `created_at`, `updated_at`) VALUES ('1', 'register', 'Đăng ký tài khoản', 'Chào bạn<br>Bạn vừa đăng ký thành công tài khoản tại {site_name}', '0', 'vn', '{stores_id}', '0', 'main', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('2', 'forgetpassword', 'Quên mật khẩu', 'Bạn vùa yêu cầu gởi lại mật khẩu tại đây', '0', 'vn', '{stores_id}', '0', 'main', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('3', 'users', 'User Controller', '', '0', 'vn', '{stores_id}', '0', 'templates', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
('4', 'welcome', 'Welcome', '<table border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td height="55"> </td>
</tr>
<tr>
<td align="left">
<div class="contentEditableContainer contentTextEditable">
<div class="contentEditable" align="center">
<h2>Will this be your welcome email?</h2>
</div>
</div>
</td>
</tr>
<tr>
<td height="15"> </td>
</tr>
<tr>
<td align="left">
<div class="contentEditableContainer contentTextEditable">
<div class="contentEditable" align="center">
<p>Here’s what you can say: Thanks again for signing up to the newsletter! You’re all set up, and will be getting the emails once per week. Meanwhile, you can check out our <a target="_blank" href="#" class="link1">Getting Started</a> section to get the most out of your new account. <br> <br> Have questions? Get in touch with us via Facebook or Twitter, or email our support team. <br> <br> Cheers, <br> <span style="color: #222222;">Peter Parker</span></p>
</div>
</div>
</td>
</tr>
<tr>
<td height="55"> </td>
</tr>
<tr>
<td align="center">
<table>
<tbody>
<tr>
<td style="background: #1A54BA; padding: 15px 18px; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;" align="center" bgcolor="#1A54BA">
<div class="contentEditableContainer contentTextEditable">
<div class="contentEditable" align="center"><a target="_blank" href="#" class="link2" style="color: #ffffff;">Activate your Account</a></div>
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td height="20"> </td>
</tr>
</tbody>
</table>', '0', 'vn', '{stores_id}', '1', 'main', '', '2016-10-30 03:15:53', '0000-00-00 00:00:00'),
('12', 'validate_email', 'Active Account', '<table border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
<tbody>
<tr>
<td height="55"> </td>
</tr>
<tr>
<td align="left">
<div class="contentEditableContainer contentTextEditable">
<div class="contentEditable" align="center">
<h2>Chào bạn</h2>
</div>
</div>
</td>
</tr>
<tr>
<td height="15"> </td>
</tr>
<tr>
<td align="left">
<div class="contentEditableContainer contentTextEditable">
<div class="contentEditable" align="center">
<p>Bạn vừa gởi yêu cầu đăng ký tài khoản tại {sitename}. Với mã xát nhận là {code} Vui lòng click vào link bên dười để xát nhận<span style="color: #222222;"></span></p>
</div>
</div>
</td>
</tr>
<tr>
<td height="55"> </td>
</tr>
<tr>
<td align="center">
<table>
<tbody>
<tr>
<td style="background: #1A54BA; padding: 15px 18px; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px;" align="center" bgcolor="#1A54BA">
<div class="contentEditableContainer contentTextEditable">
<div class="contentEditable" align="center"><a target="_blank" href="#" class="link2" style="color: #ffffff;">Activate your Account</a></div>
</div>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td height="20"> </td>
</tr>
</tbody>
</table>', '0', 'vn', '{stores_id}', '1', 'main', '', '2016-10-30 03:18:03', '0000-00-00 00:00:00');



INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('1', 'Banners', '', 'banners', 'banners', '', '', '', '1', 'images', '1', 'vn', '{stores_id}', '2016-10-30 23:40:53', '0000-00-00 00:00:00'),
('2', 'Manufacturer', '', 'manufacturer', 'manufacturer', '', '', '', '1', 'images', '1', 'vn', '{stores_id}', '2016-10-30 23:40:53', '0000-00-00 00:00:00'),
('3', 'Product', '', 'product', 'product', '', '', '', '1', 'images', '1', 'vn', '{stores_id}', '2016-10-30 23:40:53', '0000-00-00 00:00:00'),
('4', 'Apple_cinema_30.jpg', '', 'thumnails/apple_cinema_30.jpg', 'apple_cinema_30.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:53', '0000-00-00 00:00:00'),
('6', 'Canon_eos_5d_1.jpg', '', 'thumnails/canon_eos_5d_1.jpg', 'canon_eos_5d_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('7', 'Canon_eos_5d_2.jpg', '', 'thumnails/canon_eos_5d_2.jpg', 'canon_eos_5d_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('8', 'Canon_eos_5d_3.jpg', '', 'thumnails/canon_eos_5d_3.jpg', 'canon_eos_5d_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('9', 'Canon_logo.jpg', '', 'thumnails/canon_logo.jpg', 'canon_logo.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('10', 'Compaq_presario.jpg', '', 'thumnails/compaq_presario.jpg', 'compaq_presario.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('11', 'Gift-voucher-birthday.jpg', '', 'thumnails/gift-voucher-birthday.jpg', 'gift-voucher-birthday.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('12', 'Hp_1.jpg', '', 'thumnails/hp_1.jpg', 'hp_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('13', 'Hp_2.jpg', '', 'thumnails/hp_2.jpg', 'hp_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('14', 'Hp_3.jpg', '', 'thumnails/hp_3.jpg', 'hp_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('15', 'Hp_banner.jpg', '', 'thumnails/hp_banner.jpg', 'hp_banner.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('16', 'Htc_touch_hd_1.jpg', '', 'thumnails/htc_touch_hd_1.jpg', 'htc_touch_hd_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('17', 'Htc_touch_hd_2.jpg', '', 'thumnails/htc_touch_hd_2.jpg', 'htc_touch_hd_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('18', 'Htc_touch_hd_3.jpg', '', 'thumnails/htc_touch_hd_3.jpg', 'htc_touch_hd_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('19', 'Imac_1.jpg', '', 'thumnails/imac_1.jpg', 'imac_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('20', 'Imac_2.jpg', '', 'thumnails/imac_2.jpg', 'imac_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('21', 'Imac_3.jpg', '', 'thumnails/imac_3.jpg', 'imac_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('22', 'Iphone_1.jpg', '', 'thumnails/iphone_1.jpg', 'iphone_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('23', 'Iphone_2.jpg', '', 'thumnails/iphone_2.jpg', 'iphone_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('24', 'Iphone_3.jpg', '', 'thumnails/iphone_3.jpg', 'iphone_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('25', 'Iphone_4.jpg', '', 'thumnails/iphone_4.jpg', 'iphone_4.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('26', 'Iphone_5.jpg', '', 'thumnails/iphone_5.jpg', 'iphone_5.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('27', 'Iphone_6.jpg', '', 'thumnails/iphone_6.jpg', 'iphone_6.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('28', 'Ipod_classic_1.jpg', '', 'thumnails/ipod_classic_1.jpg', 'ipod_classic_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('29', 'Ipod_classic_2.jpg', '', 'thumnails/ipod_classic_2.jpg', 'ipod_classic_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('30', 'Ipod_classic_3.jpg', '', 'thumnails/ipod_classic_3.jpg', 'ipod_classic_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:54', '0000-00-00 00:00:00'),
('31', 'Ipod_classic_4.jpg', '', 'thumnails/ipod_classic_4.jpg', 'ipod_classic_4.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('32', 'Ipod_nano_1.jpg', '', 'thumnails/ipod_nano_1.jpg', 'ipod_nano_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00'),
('33', 'Ipod_nano_2.jpg', '', 'thumnails/ipod_nano_2.jpg', 'ipod_nano_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00'),
('34', 'Ipod_nano_3.jpg', '', 'thumnails/ipod_nano_3.jpg', 'ipod_nano_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00'),
('35', 'Ipod_nano_4.jpg', '', 'thumnails/ipod_nano_4.jpg', 'ipod_nano_4.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00'),
('36', 'Ipod_nano_5.jpg', '', 'thumnails/ipod_nano_5.jpg', 'ipod_nano_5.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('37', 'Ipod_shuffle_1.jpg', '', 'thumnails/ipod_shuffle_1.jpg', 'ipod_shuffle_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00'),
('38', 'Ipod_shuffle_2.jpg', '', 'thumnails/ipod_shuffle_2.jpg', 'ipod_shuffle_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00'),
('39', 'Ipod_shuffle_3.jpg', '', 'thumnails/ipod_shuffle_3.jpg', 'ipod_shuffle_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00'),
('40', 'Ipod_shuffle_4.jpg', '', 'thumnails/ipod_shuffle_4.jpg', 'ipod_shuffle_4.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00'),
('41', 'Ipod_shuffle_5.jpg', '', 'thumnails/ipod_shuffle_5.jpg', 'ipod_shuffle_5.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('42', 'Ipod_touch_1.jpg', '', 'thumnails/ipod_touch_1.jpg', 'ipod_touch_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00'),
('43', 'Ipod_touch_2.jpg', '', 'thumnails/ipod_touch_2.jpg', 'ipod_touch_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00'),
('44', 'Ipod_touch_3.jpg', '', 'thumnails/ipod_touch_3.jpg', 'ipod_touch_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00'),
('45', 'Ipod_touch_4.jpg', '', 'thumnails/ipod_touch_4.jpg', 'ipod_touch_4.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00'),
('46', 'Ipod_touch_5.jpg', '', 'thumnails/ipod_touch_5.jpg', 'ipod_touch_5.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('47', 'Ipod_touch_6.jpg', '', 'thumnails/ipod_touch_6.jpg', 'ipod_touch_6.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00'),
('48', 'Ipod_touch_7.jpg', '', 'thumnails/ipod_touch_7.jpg', 'ipod_touch_7.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:55', '0000-00-00 00:00:00'),
('49', 'Macbook_1.jpg', '', 'thumnails/macbook_1.jpg', 'macbook_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('50', 'Macbook_2.jpg', '', 'thumnails/macbook_2.jpg', 'macbook_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('51', 'Macbook_3.jpg', '', 'thumnails/macbook_3.jpg', 'macbook_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('52', 'Macbook_4.jpg', '', 'thumnails/macbook_4.jpg', 'macbook_4.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('53', 'Macbook_5.jpg', '', 'thumnails/macbook_5.jpg', 'macbook_5.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('54', 'Macbook_air_1.jpg', '', 'thumnails/macbook_air_1.jpg', 'macbook_air_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('55', 'Macbook_air_2.jpg', '', 'thumnails/macbook_air_2.jpg', 'macbook_air_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('56', 'Macbook_air_3.jpg', '', 'thumnails/macbook_air_3.jpg', 'macbook_air_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('57', 'Macbook_air_4.jpg', '', 'thumnails/macbook_air_4.jpg', 'macbook_air_4.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('58', 'Macbook_pro_1.jpg', '', 'thumnails/macbook_pro_1.jpg', 'macbook_pro_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('59', 'Macbook_pro_2.jpg', '', 'thumnails/macbook_pro_2.jpg', 'macbook_pro_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('60', 'Macbook_pro_3.jpg', '', 'thumnails/macbook_pro_3.jpg', 'macbook_pro_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('61', 'Macbook_pro_4.jpg', '', 'thumnails/macbook_pro_4.jpg', 'macbook_pro_4.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('62', 'Nikon_d300_1.jpg', '', 'thumnails/nikon_d300_1.jpg', 'nikon_d300_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('63', 'Nikon_d300_2.jpg', '', 'thumnails/nikon_d300_2.jpg', 'nikon_d300_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('64', 'Nikon_d300_3.jpg', '', 'thumnails/nikon_d300_3.jpg', 'nikon_d300_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('65', 'Nikon_d300_4.jpg', '', 'thumnails/nikon_d300_4.jpg', 'nikon_d300_4.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('66', 'Nikon_d300_5.jpg', '', 'thumnails/nikon_d300_5.jpg', 'nikon_d300_5.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('67', 'Palm_logo.jpg', '', 'thumnails/palm_logo.jpg', 'palm_logo.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('68', 'Palm_treo_pro_1.jpg', '', 'thumnails/palm_treo_pro_1.jpg', 'palm_treo_pro_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('69', 'Palm_treo_pro_2.jpg', '', 'thumnails/palm_treo_pro_2.jpg', 'palm_treo_pro_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('70', 'Palm_treo_pro_3.jpg', '', 'thumnails/palm_treo_pro_3.jpg', 'palm_treo_pro_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00'),
('71', 'Samsung_banner.jpg', '', 'thumnails/samsung_banner.jpg', 'samsung_banner.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:56', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('72', 'Samsung_syncmaster_941bw.jpg', '', 'thumnails/samsung_syncmaster_941bw.jpg', 'samsung_syncmaster_941bw.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:57', '0000-00-00 00:00:00'),
('73', 'Samsung_tab_1.jpg', '', 'thumnails/samsung_tab_1.jpg', 'samsung_tab_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:57', '0000-00-00 00:00:00'),
('74', 'Samsung_tab_2.jpg', '', 'thumnails/samsung_tab_2.jpg', 'samsung_tab_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:57', '0000-00-00 00:00:00'),
('75', 'Samsung_tab_3.jpg', '', 'thumnails/samsung_tab_3.jpg', 'samsung_tab_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:57', '0000-00-00 00:00:00'),
('76', 'Samsung_tab_4.jpg', '', 'thumnails/samsung_tab_4.jpg', 'samsung_tab_4.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:57', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('77', 'Samsung_tab_5.jpg', '', 'thumnails/samsung_tab_5.jpg', 'samsung_tab_5.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:57', '0000-00-00 00:00:00'),
('78', 'Samsung_tab_6.jpg', '', 'thumnails/samsung_tab_6.jpg', 'samsung_tab_6.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:57', '0000-00-00 00:00:00'),
('79', 'Samsung_tab_7.jpg', '', 'thumnails/samsung_tab_7.jpg', 'samsung_tab_7.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:57', '0000-00-00 00:00:00'),
('80', 'Sony_logo.jpg', '', 'thumnails/sony_logo.jpg', 'sony_logo.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:57', '0000-00-00 00:00:00'),
('81', 'Sony_vaio_1.jpg', '', 'thumnails/sony_vaio_1.jpg', 'sony_vaio_1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:57', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('82', 'Sony_vaio_2.jpg', '', 'thumnails/sony_vaio_2.jpg', 'sony_vaio_2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:57', '0000-00-00 00:00:00'),
('83', 'Sony_vaio_3.jpg', '', 'thumnails/sony_vaio_3.jpg', 'sony_vaio_3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:57', '0000-00-00 00:00:00'),
('84', 'Sony_vaio_4.jpg', '', 'thumnails/sony_vaio_4.jpg', 'sony_vaio_4.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-30 23:40:57', '0000-00-00 00:00:00'),
('85', 'Sony vaio', 'Sony 300k', 'thumnails/sony_vaio_5.jpg', 'sony_vaio_5.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-31 04:22:58', '0000-00-00 00:00:00'),
('86', 'BMW', 'Mot con voi', 'thumnails/full-width-img-01.png', 'full-width-img-01.png', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-10-31 04:21:49', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('90', 'Nữ Thần Bài Ma Cao II ( 2016) | Phim Thần Bài Hay Nhất 2016 | Phim Thần Bài Mới Nhất 2016 | Thần Bài', '', 'thumnails/lXNzzd03s4k.jpg', 'lXNzzd03s4k.jpg', '', 'lXNzzd03s4k', 'youtube', '1', 'video', '0', 'vn', '{stores_id}', '2016-10-31 13:50:41', '0000-00-00 00:00:00'),
('91', 'Phim Thần Bài Ma Cao 4 Full HD Thuyết Minh Tiếng Việt', '', 'thumnails/mWSC8SPwmM8.jpg', 'mWSC8SPwmM8.jpg', '', 'mWSC8SPwmM8', 'youtube', '1', 'video', '0', 'vn', '{stores_id}', '2016-10-31 13:54:09', '0000-00-00 00:00:00'),
('92', 'Thần Bài Sát Gái T O P full có thuyết minh 2016', '', 'thumnails/7AQmo946Ey0.jpg', '7AQmo946Ey0.jpg', '', '7AQmo946Ey0', 'youtube', '1', 'video', '0', 'vn', '{stores_id}', '2016-10-31 13:54:32', '0000-00-00 00:00:00'),
('93', 'Bg1', 'Bg1', 'thumnails/bg1.jpg', 'bg1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-11-02 11:33:45', '0000-00-00 00:00:00'),
('94', 'Bg4', 'Bg4', 'thumnails/bg4.jpg', 'bg4.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-11-02 15:20:25', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('95', 'Bg5', 'Bg5', 'thumnails/bg5.jpg', 'bg5.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-11-02 15:20:36', '0000-00-00 00:00:00'),
('96', 'Logo', 'Logo', 'thumnails/logo.png', 'logo.png', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-11-07 12:35:02', '0000-00-00 00:00:00'),
('97', 'Serv1', 'Serv1', 'thumnails/serv1.jpg', 'serv1.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-11-08 18:54:51', '0000-00-00 00:00:00'),
('98', 'Serv2', 'Serv2', 'thumnails/serv2.jpg', 'serv2.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-11-08 18:55:33', '0000-00-00 00:00:00'),
('99', 'Serv3', 'Serv3', 'thumnails/serv3.jpg', 'serv3.jpg', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-11-08 18:56:01', '0000-00-00 00:00:00');


INSERT INTO `media` (`id`, `name`, `alt`, `thumbs`, `paths`, `folder`, `code`, `classname`, `users_id`, `type`, `isdir`, `language`, `stores_id`, `created_at`, `updated_at`) VALUES ('100', 'Laravel', 'Laravel', 'thumnails/laravel.png', 'laravel.png', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-11-09 18:01:22', '0000-00-00 00:00:00'),
('101', 'Jquery', 'Jquery', 'thumnails/jquery.png', 'jquery.png', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-11-09 18:01:49', '0000-00-00 00:00:00'),
('102', 'Bootstrap', 'Bootstrap', 'thumnails/bootstrap.png', 'bootstrap.png', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-11-09 18:02:23', '0000-00-00 00:00:00'),
('103', 'Html', 'Html', 'thumnails/html.png', 'html.png', '', '', '', '1', 'images', '0', 'vn', '{stores_id}', '2016-11-09 18:02:57', '0000-00-00 00:00:00');
INSERT INTO `navigation` (`id`, `name`, `description`, `icons`, `links`, `groups`, `parent_id`, `sorts`, `types`, `targets`, `class`, `animate_class`, `stickers`, `htmlcode`, `stores_id`, `language`, `data_form`) VALUES ('2', 'Danh mục', '', '', 'catalog', 'header', '0', '2', 'dropdown', 'hover', '', '', 'a:4:{s:4:"name";s:0:"";s:5:"align";s:4:"left";s:5:"class";s:0:"";s:6:"styles";s:0:"";}', '[catalog type="products" icons="glyphicon glyphicon-ok"][/catalog]', '{stores_id}', 'vn', ''),
('3', 'Sản phẩm', '', '', 'products', 'header', '5', '2', '', '', '', '', '', '', '{stores_id}', 'vn', ''),
('4', 'Services', '', 'fa-gift', 'services', 'header', '0', '1', 'mega', 'hover', '', '', 'a:4:{s:4:"name";s:0:"";s:5:"align";s:4:"left";s:5:"class";s:0:"";s:6:"styles";s:1:"a";}', '[posts type="services"][/posts]', '{stores_id}', 'vn', ''),
('5', 'Gioi thieu', '', '', 'pages/aboutus.html', 'header', '0', '3', 'dropdown', 'hover', '', '', 'a:4:{s:4:"name";s:4:"Left";s:5:"align";s:4:"left";s:5:"class";s:0:"";s:6:"styles";s:5:"Arrow";}', '', '{stores_id}', 'vn', ''),
('6', 'Liên hệ', '', '', 'pages/contact.html', 'header', '5', '1', '', '', '', '', '', '', '{stores_id}', 'vn', '');


INSERT INTO `navigation` (`id`, `name`, `description`, `icons`, `links`, `groups`, `parent_id`, `sorts`, `types`, `targets`, `class`, `animate_class`, `stickers`, `htmlcode`, `stores_id`, `language`, `data_form`) VALUES ('8', 'Danh mục', '', '', 'catalog', 'header', '0', '2', 'dropdown', 'hover', '', '', 'a:3:{s:4:"name";s:0:"";s:5:"class";s:0:"";s:6:"styles";s:0:"";}', '[catalog type="products"][/catalog]', '{stores_id}', 'GB', ''),
('9', 'Sản phẩm', '', '', 'products', 'header', '0', '5', '', '', '', '', '', '', '{stores_id}', 'GB', ''),
('10', 'Services', '', 'fa-gift', 'services', 'header', '0', '1', 'dropdown', '', '', '', 'a:3:{s:4:"name";s:4:"Left";s:5:"class";s:7:"Primary";s:6:"styles";s:5:"Arrow";}', '', '{stores_id}', 'GB', ''),
('11', 'About Us', '', '', 'pages/aboutus.html', 'header', '0', '3', '', '', '', '', 'a:3:{s:4:"name";s:4:"Left";s:5:"class";s:7:"Primary";s:6:"styles";s:5:"Arrow";}', '', '{stores_id}', 'GB', ''),
('12', 'Contact us', '', '', 'pages/contact.html', 'header', '0', '4', '', '', '', '', 'a:3:{s:4:"name";s:4:"Left";s:5:"class";s:7:"Primary";s:6:"styles";s:5:"Arrow";}', '', '{stores_id}', 'GB', '');


INSERT INTO `navigation` (`id`, `name`, `description`, `icons`, `links`, `groups`, `parent_id`, `sorts`, `types`, `targets`, `class`, `animate_class`, `stickers`, `htmlcode`, `stores_id`, `language`, `data_form`) VALUES ('13', '目录', '', '', 'catalog', 'header', '0', '2', 'dropdown', 'hover', '', '', 'a:3:{s:4:"name";s:4:"Left";s:5:"class";s:7:"Primary";s:6:"styles";s:5:"Arrow";}', '[catalog type="products"][/catalog]', '{stores_id}', 'CN', ''),
('14', '制品', '', '', 'products', 'header', '0', '5', '', '', '', '', 'a:3:{s:4:"name";s:4:"Left";s:5:"class";s:7:"Primary";s:6:"styles";s:5:"Arrow";}', '', '{stores_id}', 'CN', ''),
('15', '服务', '', 'fa-gift', 'services', 'header', '0', '1', 'dropdown', '', '', '', 'a:3:{s:4:"name";s:4:"Left";s:5:"class";s:7:"Primary";s:6:"styles";s:5:"Arrow";}', '', '{stores_id}', 'CN', ''),
('16', '介绍', '', '', 'pages/aboutus.html', 'header', '0', '3', '', '', '', '', 'a:3:{s:4:"name";s:4:"Left";s:5:"class";s:7:"Primary";s:6:"styles";s:5:"Arrow";}', '', '{stores_id}', 'CN', ''),
('17', '连接的', '', '', 'pages/contact.html', 'header', '0', '4', '', '', '', '', 'a:3:{s:4:"name";s:4:"Left";s:5:"class";s:7:"Primary";s:6:"styles";s:5:"Arrow";}', '', '{stores_id}', 'CN', '');



INSERT INTO `pages` (`id`, `stores_id`, `parent_id`, `type`, `status`, `title`, `thumbs`, `description`, `content`, `options`, `language`, `pages_maps`, `display_as`, `redirect_to`, `tags`, `visists`, `orders`, `seo_urls`, `meta_title`, `meta_keyword`, `meta_descritpion`, `created_at`, `updated_at`, `expires_at`, `as_router`, `users_id`) VALUES ('1', '{stores_id}', '0', '', '1', 'Home', '', '', '[social size="48" shadown="true"]', 'a:1:{s:11:"breadcrumbs";s:0:"";}', 'vn', '', '', '', '', '0', '0', 'support.html', '', '', '', '2016-11-12 17:51:58', '2016-11-12 17:51:58', '2016-11-12 17:51:58', '1', '1'),
('2', '{stores_id}', '0', '', '1', 'Contact', '', '', '<p   style="position: relative;"><img class="amite-hover fullwith" style="max-width: 100%;" src="http://localhost/media/images/data/bg4.jpg" alt="Bg4" data-mce-src="/media/images/data/bg4.jpg" data-mce-style="max-width: 100%;"></p>', 'a:1:{s:11:"breadcrumbs";s:34:"/contents/uploads/1/images/bg5.jpg";}', 'vn', '', 'contact.php', '', '', '0', '0', 'contact.html', '', '', '', '2016-11-11 00:26:10', '2016-11-10 12:26:10', '2016-11-11 00:26:10', '0', '1'),
('3', '{stores_id}', '0', '', '1', 'Porfolio', '', '', '', '', 'vn', '', 'portfolio.php', '', '', '0', '0', 'porfolio.html', '', '', '', '2016-11-02 18:16:11', '2016-11-02 18:16:11', '2016-11-02 18:16:11', '0', '1'),
('4', '{stores_id}', '0', '', '1', 'Services', '', '', '<div class="row">
<div class="col-xs-12 col-sm-6"><img class="amite-hover fullwith" style="max-width: 100%;" src="/media/images/data/serv1.jpg" alt="Serv1"></div>
<div class="col-xs-12 col-sm-6">
<h2 class="customs-title">Welcome To My Services</h2>
<br><br>Suspendisse bibendum cursus luctus. Donec consequat malesuada felis at faucibus. Nulla dapibus malesuada libero, ut iaculis elit mattis quis. Suspendisse bibendum cursus luctus. Donec consequat malesuada felis at faucibus. Nulla dapibus malesuada libero, ut iaculis elit mattis quis. Suspendisse bibendum cursus luctus. Donec consequat malesuada felis at faucibus. Nulla dapibus malesuada libero, ut iaculis elit mattis quis. Suspendisse bibendum cursus <span style="text-decoration: underline;">luctus.</span> Donec consequat malesuada felis at faucibus. Nulla dapibus malesuada libero, ut iaculis elit mattis quis. Suspendisse bibendum cursus luctus. Donec consequat malesuada felis at faucibus. Nulla dapibus malesuada libero, ut iaculis elit mattis quis. Suspendisse bibendum cursus luctus. Donec consequat malesuada felis at faucibus. Nulla dapibus malesuada libero, ut iaculis elit mattis quis</div>
</div>
<br><hr><br>
<div class="row">
<div class="col-xs-12 col-sm-6">
<h2 class="customs-title">Welcome To My Services</h2>
<br><br>Suspendisse bibendum cursus luctus. Donec consequat malesuada felis at faucibus. Nulla dapibus malesuada libero, ut iaculis elit mattis quis. Suspendisse bibendum cursus luctus. Donec consequat malesuada felis at faucibus. Nulla dapibus malesuada libero, ut iaculis elit mattis quis. Suspendisse bibendum cursus luctus. Donec consequat malesuada felis at faucibus. Nulla dapibus malesuada libero, ut iaculis elit mattis quis. Suspendisse bibendum cursus luctus. Donec consequat malesuada felis at faucibus. Nulla dapibus malesuada libero, ut iaculis elit mattis quis. Suspendisse bibendum cursus luctus. Donec consequat malesuada felis at faucibus. Nulla dapibus malesuada libero, ut iaculis elit mattis quis. Suspendisse bibendum cursus luctus. Donec consequat malesuada felis at faucibus. Nulla dapibus malesuada libero, ut iaculis elit mattis quis</div>
<div class="col-xs-12 col-sm-6"><img class="amite-hover fullwith" style="max-width: 100%;" src="/media/images/data/serv2.jpg" alt="Serv2"></div>
</div>', 'a:2:{s:11:"breadcrumbs";s:0:"";s:4:"apps";a:3:{s:11:"meetourteam";s:3:"yes";s:7:"aboutus";s:2:"no";s:7:"contact";s:2:"no";}}', 'vn', '', 'services.php', '', '', '0', '0', 'services.html', '', '', '', '2016-11-08 23:48:57', '2016-11-08 11:48:57', '2016-11-08 23:48:57', '1', '1'),
('5', '{stores_id}', '0', '', '1', 'Project', '', '', '', '', 'vn', '', 'project.php', '', 'hcm, hanoi, haiphong', '0', '0', 'project.html', '', '', '', '2016-11-03 00:15:51', '2016-11-02 12:15:51', '2016-11-03 00:15:51', '0', '1');


INSERT INTO `pages` (`id`, `stores_id`, `parent_id`, `type`, `status`, `title`, `thumbs`, `description`, `content`, `options`, `language`, `pages_maps`, `display_as`, `redirect_to`, `tags`, `visists`, `orders`, `seo_urls`, `meta_title`, `meta_keyword`, `meta_descritpion`, `created_at`, `updated_at`, `expires_at`, `as_router`, `users_id`) VALUES ('6', '{stores_id}', '0', '', '1', 'About Us', '', '', '', '', 'vn', '', 'about.php', '', '', '0', '0', 'about-us.html', '', '', '', '2016-11-02 18:17:53', '2016-11-02 18:17:53', '2016-11-02 18:17:53', '0', '1'),
('7', '{stores_id}', '0', '', '1', 'Blog&rsquo;s', '', '', '', 'a:1:{s:11:"breadcrumbs";s:34:"/contents/uploads/1/images/bg4.jpg";}', 'vn', '', 'blogs.php', '', '', '0', '0', 'blogs.html', '', '', '', '2016-11-08 18:52:27', '2016-11-08 18:52:27', '2016-11-08 18:52:27', '1', '1'),
('8', '{stores_id}', '0', '', '1', 'Sản phẩm', '', '', '<div class="row"><div   style="" class="col-xs-12 col-sm-3"><h1 class="text-center"><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div><div   style="" class="col-xs-12 col-sm-3"><h1 class="text-center"><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div><div   style="" class="col-xs-12 col-sm-3"><h1 class="text-center"><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div><div   style="" class="col-xs-12 col-sm-3"><h1 class="text-center"><i class="glyphicon glyphicon-home">&nbsp;</i></h1><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div></div><div class="row"><div   style="" class="col-xs-12 col-sm-6"><img data-mce-selected="1" src="/contents/resources/views/images/no-image.png" style="width: 100%;" data-mce-src="/contents/resources/views/images/no-image.png" data-mce-style="width: 100%;"></div><div   style="" class="col-xs-12 col-sm-6"><h2 class="customs-title">Sample Title</h2><p>Enter Text contents</p></div></div><div class="row"><div   style="" class="col-xs-12 col-sm-6"><br data-mce-bogus="1"></div><div   style="" class="col-xs-12 col-sm-6"><br data-mce-bogus="1"></div></div>', 'a:1:{s:11:"breadcrumbs";s:0:"";}', 'vn', '', 'products.php', '', '', '0', '0', 'products.html', '', '', '', '2016-11-11 00:37:58', '2016-11-10 12:37:58', '2016-11-11 00:37:58', '1', '1'),
('9', '{stores_id}', '0', '', '1', 'Home', '', '', '<p>VTN PLUS là công ty chuyên cung cấp các giải pháp phát triển hệ thống mạng thông tin toàn cầu. Trên công nghệ Internet và ứng dụng mobile. Mọi chi tiết thông tin xem thêm tại website http://thietkewebvip.com hoặc đường dây nóng 0903908078. Email : contact@thietkewebvip.com</p>', 'a:1:{s:11:"breadcrumbs";s:0:"";}', 'GB', '', 'support.php', '', '', '0', '0', 'support.html', '', '', '', '2016-11-08 15:40:47', '2016-11-08 15:40:47', '2016-11-08 15:40:47', '1', '1'),
('10', '{stores_id}', '0', '', '1', 'Partner', '', '', '', 'a:1:{s:11:"breadcrumbs";s:0:"";}', 'vn', '', '', '', '', '0', '0', 'partner.html', '', '', '', '2016-11-09 18:00:37', '2016-11-09 18:00:37', '2016-11-09 18:00:37', '1', '1');


INSERT INTO `pages` (`id`, `stores_id`, `parent_id`, `type`, `status`, `title`, `thumbs`, `description`, `content`, `options`, `language`, `pages_maps`, `display_as`, `redirect_to`, `tags`, `visists`, `orders`, `seo_urls`, `meta_title`, `meta_keyword`, `meta_descritpion`, `created_at`, `updated_at`, `expires_at`, `as_router`, `users_id`) VALUES ('15', '{stores_id}', '0', '', '1', 'SÀI GÒN - ĐÀ LẠT ', '', '', '<ul>
<li class="chan">
<p style="text-align: justify;"><strong>Du lịch Đà Lạt:</strong> Đà Lạt từ lâu đã là một thiên đường du lịch nghỉ dưỡng hấp dẫn du khách với phong cảnh tuyệt đẹp, khí hậu ôn hòa dễ chịu và con người phố núi đôn hậu, mến khách. Đến xứ mộng mơ với <strong>tour du lịch Đà Lạt</strong> 3 ngày 2 đêm do <strong>Du lịch Tuổi Trẻ</strong> tổ chức, quý khách không chỉ được đắm mình trong khung cảnh yên bình đậm chất thơ của đồi thông quanh năm xanh biếc, con đường dốc thoai thoải, hồ Xuân Hương êm đềm… mà còn được ghé thăm nhiều điểm du lịch nổi tiếng như: <strong>Thác Datanla, Thung Lũng Tình Yêu, Đường Hầm Đất Sét…</strong></p>
<div class="clear"></div>
</li>
<li class="le">
<h4><strong>Ngày 1: SÀI GÒN - ĐÀ LẠT </strong></h4>
<p style="text-align: justify;"><strong><img style="width: 250px; height: 190px; float: left;" src="http://tuoitretour.com/vnt_upload/tour/01_2016/du-lich-da-lat-3b.jpg" alt="du-lich-da-lat-3b">05h30 </strong>Du Lịch Tuổi Trẻ đón quý khách tại điểm hẹn. Đoàn lên xe bắt đầu chuyến hành trình khám phá thành phố ngàn hoa Đà Lạt. Đoàn dùng bữa sáng tại <strong>nhà hàng Tâm Châu - Dầu Giây, </strong>sau đó tiếp tục hành trình đi Đà Lạt. Trên đường, quý khách sẽ được chiêm ngưỡng vẻ đẹp của <strong>Đèo Chuối, KDL Madagui </strong>với thiên nhiên trong lành, rừng xanh mát mắt được ôm ấp vỗ về bởi dòng sông Đạ Huoai  huyền thoại<strong>, đèo Bảo Lộc</strong>…</p>
<p style="text-align: justify;"><strong>Trưa: </strong>Qúy khách dùng cơm trưa tại nhà hàng <strong>Memories Bảo Lộc</strong>, sau đó tiếp tục hành trình đi Đà Lạt. Trên đường đến <strong>đèo Prenn,</strong> đoàn ghé tham quan <strong>thác Đatanla</strong>, một trong những thác nước đẹp nhất Tây Nguyên với dòng nước trắng xóa đổ xuống ào ạt và âm thanh vang vọng khắp núi rừng. Quý khách có thể tận hưởng cảm giác mạnh với<strong> hệ thống máng trượt hiện đại </strong>tại đây <em>(chi phí máng trượt tự túc)</em>.</p>
<p style="text-align: justify;"><strong>Chiều: </strong>Đến Đà Lạt, quý khách nhận phòng khách sạn, dùng cơm tối, sau đó tự do đi dạo, khám phá Đà Lạt về đêm.</p>
<div class="clear"></div>
</li>
<li class="chan">
<h4><strong style="line-height: 1.6em;">Ngày 2: VƯỜN HOA THÀNH PHỐ – ĐƯỜNG HẦM ĐẤT SÉT</strong></h4>
<p style="text-align: justify;"><strong><img style="width: 250px; height: 190px; float: left;" src="http://tuoitretour.com/vnt_upload/tour/01_2016/du-lich-da-lat-5d.jpg" alt="du-lich-da-lat-5d">Sáng: </strong>Quý khách dùng bữa sáng tại nhà hàng. Đoàn khởi hành tham quan <strong>vườn hoa thành phố. </strong>Nằm cạnh Hồ Xuân Hương, <strong>vườn hoa thành phố</strong> là nơi hội tụ hương sắc ngàn hoa phố núi. Vườn hiện là nơi trưng bày “bộ sưu tập” về hoa lớn nhất và đầy đủ nhất của Đà Lạt. Đoàn đến <strong>đồi Robin,</strong> quý khách đi cáp treo <em>(tự túc)</em> ngắm toàn cảnh thành phố Đà Lạt. Qúy khách tiếp tục tham quan <strong>Thiền Viện Trúc Lâm</strong> tận hưởng không gian thanh tịnh chốn Thiền môn. Từ thiền viện, quý khách còn có thể ngắm nhìn toàn cảnh <strong>hồ Tuyền Lâm </strong>thơ mộng. Đoàn dùng cơm trưa, sau đó về khách sạn nghỉ ngơi.</p>
<p style="text-align: justify;"><strong>Chiều: </strong>Đoàn đến tham quan <em><strong>Đường hầm đất sét</strong></em>, nơi tái hiện về lịch sử thành phố Đà Lạt từ thủa ban sơ cho tới một thành phố năng động, hiện đại ngày nay. Đây là một điểm tham quan mới lạ và vô cùng hấp dẫn du khách ở Đà Lạt mộng mơ.</p>
<p style="text-align: justify;"><strong>Tối: </strong>Đoàn dùng cơm tối. Qúy khách tự do dạo chơi <strong>Hồ Xuân Hương</strong>, thuê xe máy khám phá Đà Lạt về đêm và <strong>thưởng thức café tại khu Hoà Bình</strong>.</p>
<div class="clear"></div>
</li>
<li class="le">
<h4><strong>Ngày 3: ĐÀ LẠT – SÀI GÒN</strong></h4>
<p style="text-align: justify;"><strong><img style="width: 250px; height: 190px; float: left;" src="http://tuoitretour.com/vnt_upload/tour/01_2016/du-lich-da-lat-2e_2.jpg" alt="du-lich-da-lat-2e_2">Sáng: </strong>Đoàn trả phòng khách sạn, dùng điểm tâm sáng. Xe đưa đoàn đến <strong>chợ Đà Lạt</strong> mua sắm đặc sản và quà lưu niệm, sau đó khởi hành về Sài Gòn. Trên đường về, xe ghé trạm dừng chân Bảo Lộc để quý khách tham quan và thưởng thức đặc sản trà, café miễn phí.</p>
<p style="text-align: justify;"><strong>Trưa: </strong>Đoàn dùng cơm trưa tại <strong>Bảo Lộc </strong>và tiếp tục khởi hành về Sài Gòn.</p>
<p style="text-align: justify;"><strong>Chiều: </strong>Đoàn về đến thành phố kết thúc chương trình tham quan. Du lịch Tuổi Trẻ chào tạm biệt và hẹn gặp lại quý khách trong những hành trình thú vị khác!</p>
</li>
</ul>', 'a:1:{s:11:"breadcrumbs";s:0:"";}', 'CN', '', '', '', '', '0', '0', 'support.html', '', '', '', '2016-11-11 12:53:03', '0000-00-00 00:00:00', '2016-11-11 12:48:18', '1', '1'),
('16', '{stores_id}', '0', '', '1', 'SÀI GÒN - ĐÀ LẠT ', '', '', '<p style="text-align: justify;"> <strong>5点半</strong>旅游青年接你会合。访问总线开始的旅程，发现大叻花的城市。在<strong>潭洲餐厅</strong>代表团早餐<strong>-斗纸桥，</strong>然后继续前往大叻。在路上，你会欣赏<strong>峡谷香蕉，KDL Madagui</strong>之美与自然的清新，绿意盎然的森林眼睛被拥抱Huoai传说中的<strong>河流，峡谷保禄</strong>得安慰... </p><p style="text-align: justify;"> <strong>午餐：</strong>在餐馆<strong>回忆保禄</strong>游客<strong>的</strong>午餐<strong>，</strong>然后继续前往大叻。在途中<strong>到Prenn通行证，</strong>驻足参观<strong>Datanla瀑布，</strong>在中部高地最美丽的瀑布用白水冲下来一个，声音在林中回荡。客人可以享受这里<strong>的现代滑动系统</strong> <em>（成本槽除外）</em>惊险刺激<em>。</em> </p><p style="text-align: justify;"> <strong>PM：</strong>到达大叻，你会得到一个酒店房间，吃饭，然后行走自如，探索大叻夜</p>', 'a:1:{s:11:"breadcrumbs";s:0:"";}', 'CN', '', '', '', '', '0', '0', 'support.html', '', '', '', '2016-11-11 12:53:49', '0000-00-00 00:00:00', '2016-11-11 12:53:45', '1', '1'),
('17', '{stores_id}', '0', '', '1', 'SÀI GÒN - ĐÀ LẠT ', '', '', '<p style="text-align: justify;"> <strong>5点半</strong>旅游青年接你会合。访问总线开始的旅程，发现大叻花的城市。在<strong>潭洲餐厅</strong>代表团早餐<strong>-斗纸桥，</strong>然后继续前往大叻。在路上，你会欣赏<strong>峡谷香蕉，KDL Madagui</strong>之美与自然的清新，绿意盎然的森林眼睛被拥抱Huoai传说中的<strong>河流，峡谷保禄</strong>得安慰... </p><p style="text-align: justify;"> <strong>午餐：</strong>在餐馆<strong>回忆保禄</strong>游客<strong>的</strong>午餐<strong>，</strong>然后继续前往大叻。在途中<strong>到Prenn通行证，</strong>驻足参观<strong>Datanla瀑布，</strong>在中部高地最美丽的瀑布用白水冲下来一个，声音在林中回荡。客人可以享受这里<strong>的现代滑动系统</strong> <em>（成本槽除外）</em>惊险刺激<em>。</em> </p><p style="text-align: justify;"> <strong>PM：</strong>到达大叻，你会得到一个酒店房间，吃饭，然后行走自如，探索大叻夜</p>', 'a:1:{s:11:"breadcrumbs";s:0:"";}', 'GB', '', '', '', '', '0', '0', 'support.html', '', '', '', '2016-11-11 12:54:20', '0000-00-00 00:00:00', '2016-11-11 12:53:45', '1', '1'),
('18', '{stores_id}', '0', '', '1', 'SAIGON - DA LAT', '', '', '<p style="text-align: justify;"> <strong>5:30</strong> Travel Youth pick you up at the rendezvous. Visit the bus begins journey to discover Da Lat flower city. Delegation breakfast at <strong>Tam Chau restaurant - Dau Giay,</strong> then continue on to Da Lat. On the way, you will admire the beauty of the <strong>Gorge Bananas, KDL Madagui</strong> with fresh natural, lush green forests eyes are comforted by cuddling Huoai legendary <strong>river, gorge Bao Loc</strong> ... </p><p style="text-align: justify;"> <strong>Lunch:</strong> Guest lunch at a restaurant <strong>Memories Bao Loc,</strong> then continue on to Da Lat. On the way to <strong>the Prenn Pass,</strong> stop to visit <strong>Datanla waterfall,</strong> one of the most beautiful waterfalls in the Central Highlands with white water rushing down and the sound echoed through the forest. Guests can enjoy the thrills with <strong>modern slide system</strong> here <em>(cost chutes excluded).</em> </p><p style="text-align: justify;"> <strong>PM:</strong> Arrive in Da Lat, you get a hotel room, dinner, then walk freely, explore Da Lat night </p>', 'a:1:{s:11:"breadcrumbs";s:0:"";}', 'GB', '', '', '', '', '0', '0', 'support.html', '', '', '', '2016-11-11 12:55:03', '0000-00-00 00:00:00', '2016-11-11 12:53:45', '1', '1');
INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('1', '', 'blogs', 'New Document', '/contents/uploads/1/images/bg4.jpg', 'Personal time management skills are essential for professional & personal success in any area of life. Those able to successfully implement time management strategies are able to control their workload rather than spend each day in a frenzy of activity reacting to crisis after crisis.', '<div class="post_details_wr ">
<div class="stm_post_info">
<div class="post_thumbnail">
<div class="wpb_wrapper">
<p><img class="fullwith" style="max-width: 100%;" src="/media/images/data/bg4.jpg" alt="Bg4"><br><!-- pagebreak -->Many businesses, large and small, have a huge source of great ideas that can help them improve, innovate, and grow, and yet so many of these companies never think of using this amazing corporate asset. What is this highly valuable asset? Its own people. Says Morgan Fraud, the author of The Thinking Corporation, “Given that we are all capable of contributing new ideas, the question becomes how do you successfully generate, capture, process and implement ideas?” Becoming an organization capable of answering this question can benefit in a number of ways:</p>
</div>
</div>
</div>
</div>
<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1452700243026">
<div class="wpb_column vc_column_container vc_col-sm-6">
<div class="vc_column-inner ">
<div class="wpb_wrapper">
<div class="wpb_text_column wpb_content_element ">
<div class="wpb_wrapper">
<ul>
<li style="margin-bottom: 15px;"><strong>Growth through innovation/creativity:</strong><br> <span style="font-size: 13px;">Rather than be constrained by ideas for new products, services and new markets coming from just a few people, a Thinking Corporation can tap into the employees.</span></li>
<li style="margin-bottom: 15px;"><strong>Increased profits:</strong><br> <span style="font-size: 13px;">The corporation will experience an increase in profits due to savings in operating costs as well as sales from new products, services and ventures.</span></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="wpb_column vc_column_container vc_col-sm-6">
<div class="vc_column-inner ">
<div class="wpb_wrapper">
<div class="wpb_text_column wpb_content_element ">
<div class="wpb_wrapper">
<ul>
<li style="margin-bottom: 15px;"><strong>Higher business values:</strong><br> <span style="font-size: 13px;">The link between profits and business value means that the moment a corporation creates a new sustainable level of profit, the business value is adjusted accordingly.</span></li>
<li style="margin-bottom: 15px;"><strong>Lower staff turnover:</strong><br> <span style="font-size: 13px;">This, combined with the culture that must exist for innovation and creativity to flourish, means that new employees will be attracted to the organization.</span></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>', '', '0', '', '0', '{stores_id}', 'vn', '3', '0', '0', '', '', '1', '2016-11-06 12:27:27', '2016-11-06 12:27:27', '2016-11-06 12:27:27', '2016-11-06 12:27:27', 'new-document.html', '0', '0'),
('2', '', 'flexslider', 'New Slider', '', '', '', '', '0', '', '0', '{stores_id}', 'vn', '0', '0', '0', '', '', '0', '2016-09-19 22:45:43', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'new-slider.html', '0', '0'),
('3', '', 'flexslider', 'New Items Slider', 'uploads/slider/slidebg2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '0', '0', '2', '', '', '0', '2016-09-19 22:46:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'new-items-slider.html', '0', '0'),
('4', '', 'flexslider', 'New Items Slider', 'uploads/slider/slidebg1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '0', '0', '2', '', '', '0', '2016-09-19 22:46:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'new-items-slider.html', '0', '0'),
('5', '', 'testimonial', 'New Document', '', '', '', '', '0', '', '0', '{stores_id}', 'vn', '0', '0', '0', '', '', '1', '2016-10-01 20:31:31', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'new-document.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('6', 'company-hosting', 'pricestable', 'Company Hosting', '', '', 'Number of Websites
Free Domain Registration
Web Space
Email Accounts
MySQL Databases
Free App Store
cPanel Control Panel : yes/no
Free Daily Backups
Search Engine Optimization
99.9% Uptime Guarantee
Bandwidth
Free Setup
Advanced Security Features
Cloud Hosting
Marketing Offers & Credits
24/7/365 Support
Website Builder
30 Day Money Back Guarantee', 'a:5:{s:6:"prices";s:15:"Company Hosting";s:9:"pricesoff";s:15:"Company Hosting";s:5:"class";s:15:"Company Hosting";s:5:"links";s:15:"Company Hosting";s:6:"button";s:15:"Company Hosting";}', '0', '', '0', '{stores_id}', 'vn', '0', '0', '0', '', '', '0', '2016-09-25 10:51:58', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'company-hosting.html', '0', '0'),
('7', '', 'pricestable', 'Basic', '', '', 'a:18:{s:18:"number-of-websites";s:2:"10";s:24:"free-domain-registration";s:1:"1";s:9:"web-space";s:6:"1000MB";s:14:"email-accounts";s:2:"10";s:15:"mysql-databases";s:2:"10";s:14:"free-app-store";s:2:"10";s:20:"cpanel-control-panel";s:6:"yes/no";s:18:"free-daily-backups";s:4:"week";s:26:"search-engine-optimization";s:0:"";s:20:"999-uptime-guarantee";s:0:"";s:9:"bandwidth";s:0:"";s:10:"free-setup";s:0:"";s:26:"advanced-security-features";s:0:"";s:13:"cloud-hosting";s:0:"";s:24:"marketing-offers-credits";s:0:"";s:14:"247365-support";s:0:"";s:15:"website-builder";s:0:"";s:27:"30-day-money-back-guarantee";s:0:"";}', 'a:6:{s:6:"prices";s:5:"20000";s:9:"pricesoff";s:0:"";s:4:"time";s:2:"1m";s:5:"class";s:0:"";s:5:"links";s:1:"#";s:6:"button";s:3:"Mua";}', '0', '', '0', '{stores_id}', 'vn', '0', '0', '6', '', '', '0', '2016-09-25 11:45:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'basic.html', '0', '0'),
('8', '', 'pricestable', 'Co', '', '', 'a:17:{s:18:"number-of-websites";s:0:"";s:24:"free-domain-registration";s:0:"";s:9:"web-space";s:0:"";s:14:"email-accounts";s:0:"";s:15:"mysql-databases";s:0:"";s:14:"free-app-store";s:0:"";s:18:"free-daily-backups";s:0:"";s:26:"search-engine-optimization";s:0:"";s:20:"999-uptime-guarantee";s:0:"";s:9:"bandwidth";s:0:"";s:10:"free-setup";s:0:"";s:26:"advanced-security-features";s:0:"";s:13:"cloud-hosting";s:0:"";s:24:"marketing-offers-credits";s:0:"";s:14:"247365-support";s:0:"";s:15:"website-builder";s:0:"";s:27:"30-day-money-back-guarantee";s:0:"";}', 'a:6:{s:6:"prices";s:5:"40000";s:9:"pricesoff";s:0:"";s:4:"time";s:2:"1m";s:5:"class";s:0:"";s:5:"links";s:1:"#";s:6:"button";s:3:"Mua";}', '0', '', '0', '{stores_id}', 'vn', '0', '0', '6', '', '', '0', '2016-09-25 15:19:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'co.html', '0', '0'),
('9', 'flat-prices', 'pricestable', 'Flat Prices', '', '', '', '', '0', '', '0', '{stores_id}', 'vn', '0', '0', '0', '', '', '0', '2016-09-25 11:55:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'flat-prices.html', '0', '0'),
('10', '', 'pricestable', 'Pro', '', '', 'a:17:{s:18:"number-of-websites";s:0:"";s:24:"free-domain-registration";s:0:"";s:9:"web-space";s:0:"";s:14:"email-accounts";s:0:"";s:15:"mysql-databases";s:0:"";s:14:"free-app-store";s:0:"";s:18:"free-daily-backups";s:0:"";s:26:"search-engine-optimization";s:0:"";s:20:"999-uptime-guarantee";s:0:"";s:9:"bandwidth";s:0:"";s:10:"free-setup";s:0:"";s:26:"advanced-security-features";s:0:"";s:13:"cloud-hosting";s:0:"";s:24:"marketing-offers-credits";s:0:"";s:14:"247365-support";s:0:"";s:15:"website-builder";s:0:"";s:27:"30-day-money-back-guarantee";s:0:"";}', 'a:6:{s:6:"prices";s:5:"60000";s:9:"pricesoff";s:0:"";s:4:"time";s:2:"1m";s:5:"class";s:0:"";s:5:"links";s:1:"#";s:6:"button";s:3:"Mua";}', '0', '', '0', '{stores_id}', 'vn', '0', '0', '6', '', '', '0', '2016-09-25 15:20:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'pro.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('11', '', 'pricestable', 'Gold', '', '', 'a:17:{s:18:"number-of-websites";s:0:"";s:24:"free-domain-registration";s:0:"";s:9:"web-space";s:0:"";s:14:"email-accounts";s:0:"";s:15:"mysql-databases";s:0:"";s:14:"free-app-store";s:0:"";s:18:"free-daily-backups";s:0:"";s:26:"search-engine-optimization";s:0:"";s:20:"999-uptime-guarantee";s:0:"";s:9:"bandwidth";s:0:"";s:10:"free-setup";s:0:"";s:26:"advanced-security-features";s:0:"";s:13:"cloud-hosting";s:0:"";s:24:"marketing-offers-credits";s:0:"";s:14:"247365-support";s:0:"";s:15:"website-builder";s:0:"";s:27:"30-day-money-back-guarantee";s:0:"";}', 'a:6:{s:6:"prices";s:5:"80000";s:9:"pricesoff";s:0:"";s:4:"time";s:2:"1m";s:5:"class";s:0:"";s:5:"links";s:1:"#";s:6:"button";s:3:"Mua";}', '0', '', '0', '{stores_id}', 'vn', '0', '0', '6', '', '', '0', '2016-09-25 15:20:21', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'gold.html', '0', '0'),
('13', '', 'pricestable', 'S1', '', '', 'Mysql : 15
Domain : 77
Conga : 99', 'a:6:{s:6:"prices";s:0:"";s:9:"pricesoff";s:0:"";s:4:"time";s:2:"1m";s:5:"class";s:0:"";s:5:"links";s:0:"";s:6:"button";s:0:"";}', '0', '', '0', '{stores_id}', 'vn', '0', '0', '9', '', '', '0', '2016-09-25 12:02:55', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 's1.html', '0', '0'),
('14', '', 'pricestable', 'New Prices Tables', '', '', '', '', '0', '9', '0', '{stores_id}', 'vn', '0', '0', '9', '', '', '0', '2016-09-25 11:56:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'new-prices-tables.html', '0', '0'),
('15', '', 'pricestable', 'New Prices Tables', '', '', '', '', '0', '9', '0', '{stores_id}', 'vn', '2', '0', '9', '', '', '0', '2016-10-31 16:01:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'new-prices-tables.html', '0', '0'),
('16', '', 'blogs', 'New Document', '/contents/uploads/1/images/bg5.jpg', 'Personal time management skills are essential for professional & personal success in any area of life. Those able to successfully implement time management strategies are able to control their workload rather than spend each day in a frenzy of activity reacting to crisis after crisis.', '<div class="post_details_wr ">
<div class="stm_post_info">
<div class="post_thumbnail">
<div class="wpb_wrapper">
<p>Many businesses, large and small, have a huge source of great ideas that can help them improve, innovate, and grow, and yet so many of these companies never think of using this amazing corporate asset. What is this highly valuable asset? Its own people. Says Morgan Fraud, the author of The Thinking Corporation, “Given that we are all capable of contributing new ideas, the question becomes how do you successfully generate, capture, process and implement ideas?” Becoming an organization capable of answering this question can benefit in a number of ways:</p>
</div>
</div>
</div>
</div>
<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1452700243026">
<div class="wpb_column vc_column_container vc_col-sm-6">
<div class="vc_column-inner ">
<div class="wpb_wrapper">
<div class="wpb_text_column wpb_content_element ">
<div class="wpb_wrapper">
<ul>
<li style="margin-bottom: 15px;"><strong>Growth through innovation/creativity:</strong><br> <span style="font-size: 13px;">Rather than be constrained by ideas for new products, services and new markets coming from just a few people, a Thinking Corporation can tap into the employees.</span></li>
<li style="margin-bottom: 15px;"><strong>Increased profits:</strong><br> <span style="font-size: 13px;">The corporation will experience an increase in profits due to savings in operating costs as well as sales from new products, services and ventures.</span></li>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="wpb_column vc_column_container vc_col-sm-6">
<div class="vc_column-inner ">
<div class="wpb_wrapper">
<div class="wpb_text_column wpb_content_element ">
<div class="wpb_wrapper">
<ul>
<li style="margin-bottom: 15px;"><strong>Higher business values:</strong><br> <span style="font-size: 13px;">The link between profits and business value means that the moment a corporation creates a new sustainable level of profit, the business value is adjusted accordingly.</span></li>
<li style="margin-bottom: 15px;"><strong>Lower staff turnover:</strong><br> <span style="font-size: 13px;">This, combined with the culture that must exist for innovation and creativity to flourish, means that new employees will be attracted to the organization.</span></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 12:35:32', '2016-11-06 12:35:32', '2016-11-06 12:35:32', '2016-11-06 12:35:32', '', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('17', '', 'blogs', 'Khong co gi kkk', '/contents/uploads/1/images/bg1.jpg', 'Personal time management skills are essential for professional & personal success in any area of life. Those able to successfully implement time management strategies are able to control their workload rather than spend each day in a frenzy of activity reacting to crisis after crisis.', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-05 23:39:19', '2016-11-05 23:39:19', '2016-11-05 23:39:19', '2016-11-05 23:39:19', '', '0', '0'),
('18', 'sliderhome', 'slider', 'New Slider', '', '', 'a:8:{s:5:"width";s:4:"auto";s:6:"height";s:3:"580";s:4:"skin";s:13:"ms-skin-metro";s:6:"srceen";s:7:"customs";s:10:"set_offset";s:0:"";s:10:"transition";s:9:"fadeBasic";s:7:"dataset";s:7:"customs";s:8:"parallax";s:12:"mouse:x-only";}', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-13 19:56:01', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0', '0'),
('19', '', 'slider', 'New Layer', '/contents/uploads/1/images/bg4.jpg', '', 'a:8:{s:8:"video_bg";s:27:"/contents/uploads/video.mp4";s:9:"thumnails";s:0:"";s:4:"text";a:1:{i:0;s:18:"Welcome to my site";}s:4:"left";a:1:{i:0;s:3:"391";}s:3:"top";a:1:{i:0;s:3:"241";}s:5:"class";a:1:{i:0;s:0:"";}s:3:"eff";a:1:{i:0;s:12:"easeOutQuint";}s:6:"styles";a:1:{i:0;s:172:"left: 391px; top: 241px; background-color: rgba(238, 224, 197, 0.4); font-size: 59px; padding: 0px 42px; border-radius: 100px; width: 655px; height: 76px; overflow: hidden;";}}', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '18', '', '', '1', '2016-11-10 01:32:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0', '0'),
('23', '', 'products', 'Apple Cinema 30 Ich', '/contents/uploads/1/images/apple_cinema_30.jpg', '', '', '', '2', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-07 10:35:49', '2016-11-07 10:35:49', '2016-11-07 10:35:49', '2016-11-07 10:35:49', 'apple-cinema-30jpg.html', '150000000', '0'),
('24', '', 'products', 'Canon_eos_5d_1.jpg', '/contents/uploads/1/images/canon_eos_5d_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'canon-eos-5d-1jpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('25', '', 'products', 'Canon_eos_5d_2.jpg', '/contents/uploads/1/images/canon_eos_5d_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'canon-eos-5d-2jpg.html', '0', '0'),
('26', '', 'products', 'Canon_eos_5d_3.jpg', '/contents/uploads/1/images/canon_eos_5d_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'canon-eos-5d-3jpg.html', '0', '0'),
('27', '', 'products', 'Canon_logo.jpg', '/contents/uploads/1/images/canon_logo.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'canon-logojpg.html', '0', '0'),
('28', '', 'products', 'Compaq_presario.jpg', '/contents/uploads/1/images/compaq_presario.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'compaq-presariojpg.html', '0', '0'),
('29', '', 'products', 'Gift-voucher-birthday.jpg', '/contents/uploads/1/images/gift-voucher-birthday.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'gift-voucher-birthdayjpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('30', '', 'products', 'Hp_1.jpg', '/contents/uploads/1/images/hp_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'hp-1jpg.html', '0', '0'),
('31', '', 'products', 'Hp_2.jpg', '/contents/uploads/1/images/hp_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'hp-2jpg.html', '0', '0'),
('32', '', 'products', 'Hp_3.jpg', '/contents/uploads/1/images/hp_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'hp-3jpg.html', '0', '0'),
('33', '', 'products', 'Hp_banner.jpg', '/contents/uploads/1/images/hp_banner.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'hp-bannerjpg.html', '0', '0'),
('34', '', 'products', 'Htc_touch_hd_1.jpg', '/contents/uploads/1/images/htc_touch_hd_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'htc-touch-hd-1jpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('35', '', 'products', 'Htc_touch_hd_2.jpg', '/contents/uploads/1/images/htc_touch_hd_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'htc-touch-hd-2jpg.html', '0', '0'),
('36', '', 'products', 'Htc_touch_hd_3.jpg', '/contents/uploads/1/images/htc_touch_hd_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'htc-touch-hd-3jpg.html', '0', '0'),
('37', '', 'products', 'Imac_1.jpg', '/contents/uploads/1/images/imac_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'imac-1jpg.html', '0', '0'),
('38', '', 'products', 'Imac_2.jpg', '/contents/uploads/1/images/imac_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'imac-2jpg.html', '0', '0'),
('39', '', 'products', 'Imac_3.jpg', '/contents/uploads/1/images/imac_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'imac-3jpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('40', '', 'products', 'Iphone_1.jpg', '/contents/uploads/1/images/iphone_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'iphone-1jpg.html', '0', '0'),
('41', '', 'products', 'Iphone_2.jpg', '/contents/uploads/1/images/iphone_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'iphone-2jpg.html', '0', '0'),
('42', '', 'products', 'Iphone_3.jpg', '/contents/uploads/1/images/iphone_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'iphone-3jpg.html', '0', '0'),
('43', '', 'products', 'Iphone_4.jpg', '/contents/uploads/1/images/iphone_4.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'iphone-4jpg.html', '0', '0'),
('44', '', 'products', 'Iphone_5.jpg', '/contents/uploads/1/images/iphone_5.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'iphone-5jpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('45', '', 'products', 'Iphone_6.jpg', '/contents/uploads/1/images/iphone_6.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:16', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'iphone-6jpg.html', '0', '0'),
('46', '', 'products', 'Ipod_classic_1.jpg', '/contents/uploads/1/images/ipod_classic_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-classic-1jpg.html', '0', '0'),
('47', '', 'products', 'Ipod_classic_2.jpg', '/contents/uploads/1/images/ipod_classic_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-classic-2jpg.html', '0', '0'),
('48', '', 'products', 'Ipod_classic_3.jpg', '/contents/uploads/1/images/ipod_classic_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-classic-3jpg.html', '0', '0'),
('49', '', 'products', 'Ipod_classic_4.jpg', '/contents/uploads/1/images/ipod_classic_4.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-classic-4jpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('50', '', 'products', 'Ipod_nano_1.jpg', '/contents/uploads/1/images/ipod_nano_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-nano-1jpg.html', '0', '0'),
('51', '', 'products', 'Ipod_nano_2.jpg', '/contents/uploads/1/images/ipod_nano_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-nano-2jpg.html', '0', '0'),
('52', '', 'products', 'Ipod_nano_3.jpg', '/contents/uploads/1/images/ipod_nano_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-nano-3jpg.html', '0', '0'),
('53', '', 'products', 'Ipod_nano_4.jpg', '/contents/uploads/1/images/ipod_nano_4.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-nano-4jpg.html', '0', '0'),
('54', '', 'products', 'Ipod_nano_5.jpg', '/contents/uploads/1/images/ipod_nano_5.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-nano-5jpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('55', '', 'products', 'Ipod_shuffle_1.jpg', '/contents/uploads/1/images/ipod_shuffle_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-shuffle-1jpg.html', '0', '0'),
('56', '', 'products', 'Ipod_shuffle_2.jpg', '/contents/uploads/1/images/ipod_shuffle_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-shuffle-2jpg.html', '0', '0'),
('57', '', 'products', 'Ipod_shuffle_3.jpg', '/contents/uploads/1/images/ipod_shuffle_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-shuffle-3jpg.html', '0', '0'),
('58', '', 'products', 'Ipod_shuffle_4.jpg', '/contents/uploads/1/images/ipod_shuffle_4.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-shuffle-4jpg.html', '0', '0'),
('59', '', 'products', 'Ipod_shuffle_5.jpg', '/contents/uploads/1/images/ipod_shuffle_5.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-shuffle-5jpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('60', '', 'products', 'Ipod_touch_1.jpg', '/contents/uploads/1/images/ipod_touch_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-touch-1jpg.html', '0', '0'),
('61', '', 'products', 'Ipod_touch_2.jpg', '/contents/uploads/1/images/ipod_touch_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-touch-2jpg.html', '0', '0'),
('62', '', 'products', 'Ipod_touch_3.jpg', '/contents/uploads/1/images/ipod_touch_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-touch-3jpg.html', '0', '0'),
('63', '', 'products', 'Ipod_touch_4.jpg', '/contents/uploads/1/images/ipod_touch_4.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-touch-4jpg.html', '0', '0'),
('64', '', 'products', 'Ipod_touch_5.jpg', '/contents/uploads/1/images/ipod_touch_5.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-touch-5jpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('65', '', 'products', 'Ipod_touch_6.jpg', '/contents/uploads/1/images/ipod_touch_6.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-touch-6jpg.html', '0', '0'),
('66', '', 'products', 'Ipod_touch_7.jpg', '/contents/uploads/1/images/ipod_touch_7.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'ipod-touch-7jpg.html', '0', '0'),
('67', '', 'products', 'Macbook_1.jpg', '/contents/uploads/1/images/macbook_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'macbook-1jpg.html', '0', '0'),
('68', '', 'products', 'Macbook_2.jpg', '/contents/uploads/1/images/macbook_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'macbook-2jpg.html', '0', '0'),
('69', '', 'products', 'Macbook_3.jpg', '/contents/uploads/1/images/macbook_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'macbook-3jpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('70', '', 'products', 'Macbook_4.jpg', '/contents/uploads/1/images/macbook_4.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'macbook-4jpg.html', '0', '0'),
('71', '', 'products', 'Macbook_5.jpg', '/contents/uploads/1/images/macbook_5.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'macbook-5jpg.html', '0', '0'),
('72', '', 'products', 'Macbook_air_1.jpg', '/contents/uploads/1/images/macbook_air_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'macbook-air-1jpg.html', '0', '0'),
('73', '', 'products', 'Macbook_air_2.jpg', '/contents/uploads/1/images/macbook_air_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'macbook-air-2jpg.html', '0', '0'),
('74', '', 'products', 'Macbook_air_3.jpg', '/contents/uploads/1/images/macbook_air_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'macbook-air-3jpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('75', '', 'products', 'Macbook_air_4.jpg', '/contents/uploads/1/images/macbook_air_4.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'macbook-air-4jpg.html', '0', '0'),
('76', '', 'products', 'Macbook_pro_1.jpg', '/contents/uploads/1/images/macbook_pro_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'macbook-pro-1jpg.html', '0', '0'),
('77', '', 'products', 'Macbook_pro_2.jpg', '/contents/uploads/1/images/macbook_pro_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'macbook-pro-2jpg.html', '0', '0'),
('78', '', 'products', 'Macbook_pro_3.jpg', '/contents/uploads/1/images/macbook_pro_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'macbook-pro-3jpg.html', '0', '0'),
('79', '', 'products', 'Macbook_pro_4.jpg', '/contents/uploads/1/images/macbook_pro_4.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'macbook-pro-4jpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('80', '', 'products', 'Nikon_d300_1.jpg', '/contents/uploads/1/images/nikon_d300_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'nikon-d300-1jpg.html', '0', '0'),
('81', '', 'products', 'Nikon_d300_2.jpg', '/contents/uploads/1/images/nikon_d300_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'nikon-d300-2jpg.html', '0', '0'),
('82', '', 'products', 'Nikon_d300_3.jpg', '/contents/uploads/1/images/nikon_d300_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'nikon-d300-3jpg.html', '0', '0'),
('83', '', 'products', 'Nikon_d300_4.jpg', '/contents/uploads/1/images/nikon_d300_4.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'nikon-d300-4jpg.html', '0', '0'),
('84', '', 'products', 'Nikon_d300_5.jpg', '/contents/uploads/1/images/nikon_d300_5.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'nikon-d300-5jpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('85', '', 'products', 'Palm_logo.jpg', '/contents/uploads/1/images/palm_logo.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'palm-logojpg.html', '0', '0'),
('86', '', 'products', 'Palm_treo_pro_1.jpg', '/contents/uploads/1/images/palm_treo_pro_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'palm-treo-pro-1jpg.html', '0', '0'),
('87', '', 'products', 'Palm_treo_pro_2.jpg', '/contents/uploads/1/images/palm_treo_pro_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'palm-treo-pro-2jpg.html', '0', '0'),
('88', '', 'products', 'Palm_treo_pro_3.jpg', '/contents/uploads/1/images/palm_treo_pro_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'palm-treo-pro-3jpg.html', '0', '0'),
('89', '', 'products', 'Samsung_banner.jpg', '/contents/uploads/1/images/samsung_banner.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'samsung-bannerjpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('90', '', 'products', 'Samsung_syncmaster_941bw.jpg', '/contents/uploads/1/images/samsung_syncmaster_941bw.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'samsung-syncmaster-941bwjpg.html', '0', '0'),
('91', '', 'products', 'Samsung_tab_1.jpg', '/contents/uploads/1/images/samsung_tab_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'samsung-tab-1jpg.html', '0', '0'),
('92', '', 'products', 'Samsung_tab_2.jpg', '/contents/uploads/1/images/samsung_tab_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'samsung-tab-2jpg.html', '0', '0'),
('93', '', 'products', 'Samsung_tab_3.jpg', '/contents/uploads/1/images/samsung_tab_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'samsung-tab-3jpg.html', '0', '0'),
('94', '', 'products', 'Samsung_tab_4.jpg', '/contents/uploads/1/images/samsung_tab_4.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'samsung-tab-4jpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('95', '', 'products', 'Samsung_tab_5.jpg', '/contents/uploads/1/images/samsung_tab_5.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'samsung-tab-5jpg.html', '0', '0'),
('96', '', 'products', 'Samsung_tab_6.jpg', '/contents/uploads/1/images/samsung_tab_6.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'samsung-tab-6jpg.html', '0', '0'),
('97', '', 'products', 'Samsung_tab_7.jpg', '/contents/uploads/1/images/samsung_tab_7.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'samsung-tab-7jpg.html', '0', '0'),
('98', '', 'products', 'Sony_logo.jpg', '/contents/uploads/1/images/sony_logo.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sony-logojpg.html', '0', '0'),
('99', '', 'products', 'Sony_vaio_1.jpg', '/contents/uploads/1/images/sony_vaio_1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sony-vaio-1jpg.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('100', '', 'products', 'Sony_vaio_2.jpg', '/contents/uploads/1/images/sony_vaio_2.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sony-vaio-2jpg.html', '0', '0'),
('101', '', 'products', 'Sony_vaio_3.jpg', '/contents/uploads/1/images/sony_vaio_3.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sony-vaio-3jpg.html', '0', '0'),
('102', '', 'products', 'Sony_vaio_4.jpg', '/contents/uploads/1/images/sony_vaio_4.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sony-vaio-4jpg.html', '0', '0'),
('103', '', 'products', 'Sony vaio', '/contents/uploads/1/images/sony_vaio_5.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'sony-vaio.html', '0', '0'),
('104', '', 'products', 'BMW', '/contents/uploads/1/images/full-width-img-01.png', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'bmw.html', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('105', '', 'products', 'Bg1', '/contents/uploads/1/images/bg1.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'bg1.html', '0', '0'),
('106', '', 'products', 'Bg4', '/contents/uploads/1/images/bg4.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'bg4.html', '0', '0'),
('107', '', 'products', 'Bg5', '/contents/uploads/1/images/bg5.jpg', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-06 16:59:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'bg5.html', '0', '0'),
('108', '', 'services', 'Top Skilled Team', '/contents/uploads/1/images/serv1.jpg', 'Mauris rhoncus pretium porttitor. Cras scelerisque commodo odio. Phasellus dolor enim, faucibus egestas scelerisque hendrerit, aliquet sed lorem.', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-08 18:54:58', '2016-11-08 18:54:58', '2016-11-08 18:54:58', '2016-11-08 18:54:58', 'top-skilled-team', '0', '0'),
('109', '', 'services', 'Better Customer Support', '/contents/uploads/1/images/serv2.jpg', 'Mauris rhoncus pretium porttitor. Cras scelerisque commodo odio. Phasellus dolor enim, faucibus egestas scelerisque hendrerit, aliquet sed lorem.', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-08 18:55:37', '2016-11-08 18:55:37', '2016-11-08 18:55:37', '2016-11-08 18:55:37', 'better-customer-support', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('110', '', 'services', 'Beautiful Office Space', '/contents/uploads/1/images/serv3.jpg', 'Mauris rhoncus pretium porttitor. Cras scelerisque commodo odio. Phasellus dolor enim, faucibus egestas scelerisque hendrerit, aliquet sed lorem.', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-08 18:56:23', '2016-11-08 18:56:23', '2016-11-08 18:56:23', '2016-11-08 18:56:23', 'beautiful-office-space', '0', '0'),
('111', '', 'services', 'Beautiful Office Space', '/contents/uploads/1/images/serv2.jpg', 'Mauris rhoncus pretium porttitor. Cras scelerisque commodo odio. Phasellus dolor enim, faucibus egestas scelerisque hendrerit, aliquet sed lorem.', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-08 19:13:52', '2016-11-08 19:13:52', '2016-11-08 19:13:52', '2016-11-08 19:13:52', 'beautiful-office-space', '0', '0'),
('112', '', 'partner', 'Laravel', '/contents/uploads/1/images/laravel.png', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-09 18:01:33', '2016-11-09 18:01:33', '2016-11-09 18:01:33', '2016-11-09 18:01:33', 'laravel', '0', '0'),
('113', '', 'partner', 'Jquery', '/contents/uploads/1/images/jquery.png', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-09 18:01:54', '2016-11-09 18:01:54', '2016-11-09 18:01:54', '2016-11-09 18:01:54', 'jquery', '0', '0'),
('114', '', 'partner', 'Bootstrap', '/contents/uploads/1/images/bootstrap.png', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-09 18:02:27', '2016-11-09 18:02:27', '2016-11-09 18:02:27', '2016-11-09 18:02:27', 'bootstrap', '0', '0');


INSERT INTO `posts` (`id`, `keyword`, `type`, `title`, `thumbs`, `description`, `content`, `options`, `categories_id`, `pages_maps`, `group_id`, `stores_id`, `language`, `users_id`, `groups_access`, `parent_id`, `tags`, `related_id`, `status`, `created_at`, `updated_at`, `display_at`, `expires_at`, `seo_urls`, `prices`, `prices_off`) VALUES ('115', '', 'partner', 'HTML 5', '/contents/uploads/1/images/html.png', '', '', '', '0', '', '0', '{stores_id}', 'vn', '1', '0', '0', '', '', '1', '2016-11-09 18:03:02', '2016-11-09 18:03:02', '2016-11-09 18:03:02', '2016-11-09 18:03:02', 'html-5', '0', '0');


INSERT INTO `settings` (`id`, `stores_id`, `language`, `name`, `data`) VALUES ('1', '{stores_id}', 'vn', 'sitename', 'Demo Lumen Site API'),
('2', '{stores_id}', 'vn', 'description', 'seo, marketing, laravel, cms, crm, ERP, php, linux, hosting'),
('3', '{stores_id}', 'vn', 'keyword', 'seo, marketing, laravel, cms, crm, ERP, php, linux, hosting'),
('4', '{stores_id}', 'vn', 'google_analytic', 'UA-12078642-3'),
('5', '{stores_id}', 'vn', 'language', 'vn');


INSERT INTO `settings` (`id`, `stores_id`, `language`, `name`, `data`) VALUES ('6', '{stores_id}', 'vn', 'templates', 'default'),
('7', '{stores_id}', 'vn', 'templates_admin', 'default'),
('8', '{stores_id}', 'vn', 'page_default', ''),
('9', '{stores_id}', 'vn', 'popup_id', ''),
('10', '{stores_id}', 'vn', 'email', 'thietkewebvip@gmail.com');


INSERT INTO `settings` (`id`, `stores_id`, `language`, `name`, `data`) VALUES ('11', '{stores_id}', 'vn', 'hotline', '0903908078'),
('12', '{stores_id}', 'vn', 'hotline_1', ''),
('13', '{stores_id}', 'vn', 'hotline_2', ''),
('14', '{stores_id}', 'vn', 'time_zone', 'Asia/Ho_Chi_Minh'),
('15', '{stores_id}', 'vn', 'time_short_format', 'd-m-Y');


INSERT INTO `settings` (`id`, `stores_id`, `language`, `name`, `data`) VALUES ('16', '{stores_id}', 'vn', 'time_long_format', 'D M Y h:i:s A'),
('17', '{stores_id}', 'vn', 'address', 'LK 10, CC Khang Gia, P14, Phan Huy Ich, Go Vap, HCM'),
('18', '{stores_id}', 'vn', 'country', 'VN'),
('19', '{stores_id}', 'vn', 'city', 'HCM'),
('20', '{stores_id}', 'vn', 'stase', '');


INSERT INTO `settings` (`id`, `stores_id`, `language`, `name`, `data`) VALUES ('21', '{stores_id}', 'vn', 'opendor', '7 - 5h PM / 2 - 6'),
('22', '{stores_id}', 'vn', 'header_tags', ''),
('23', '{stores_id}', 'vn', 'footer_tags', ''),
('24', '{stores_id}', 'vn', 'users_can_register', 'yes'),
('25', '{stores_id}', 'vn', 'users_register_welcome', 'yes');


INSERT INTO `settings` (`id`, `stores_id`, `language`, `name`, `data`) VALUES ('26', '{stores_id}', 'vn', 'users_register_action', ''),
('27', '{stores_id}', 'vn', 'users_register_groups', 'none'),
('28', '{stores_id}', 'vn', 'smtp_server', 'smtp.gmail.com'),
('29', '{stores_id}', 'vn', 'smtp_username', 'contact@thietkewebvip.com'),
('30', '{stores_id}', 'vn', 'smtp_password', 'anhkhoa');


INSERT INTO `settings` (`id`, `stores_id`, `language`, `name`, `data`) VALUES ('31', '{stores_id}', 'vn', 'smtp_port', '587'),
('32', '{stores_id}', 'vn', 'smtp_encryption', 'tls'),
('33', '{stores_id}', 'vn', 'logo', '/contents/uploads/1/images/logo.png'),
('34', '{stores_id}', 'vn', 'icons', ''),
('35', '{stores_id}', 'vn', 'page_editter', '');


INSERT INTO `settings` (`id`, `stores_id`, `language`, `name`, `data`) VALUES ('36', '{stores_id}', 'vn', 'google_api', 'AIzaSyBGKSEZZtmH_hDKwTPhCRnPppD9mTQ_bok'),
('37', '{stores_id}', 'vn', 'social', 'a:6:{s:7:"private";s:0:"";s:7:"android";s:0:"";s:7:"twitter";s:0:"";s:7:"youtube";s:0:"";s:12:"youtube-play";s:0:"";s:8:"whatsapp";s:0:"";}');

INSERT INTO `templates` (`id`, `title`, `type`, `language`, `stores_id`, `users_id`, `content`, `cache_name`, `created_at`, `updated_at`) VALUES ('1', 'New Document', '', 'vn', '{stores_id}', '1', '', '', '2016-11-09 11:28:41', '0000-00-00 00:00:00');
INSERT INTO `users` (`id`, `gender`, `first_name`, `mid_name`, `last_name`, `display_name`, `thumbnail`, `email`, `password`, `remember_token`, `parent_id`, `is_active`, `is_admin`, `is_public`, `is_banned`, `api_key`, `subscr_id`, `roles_id`, `oauth_uid`, `oauth_provider`, `oauth_token`, `oauth_token_secret`, `password_reset_hash`, `language`, `created_at`, `updated_at`, `expires_on`, `created_by`, `edited_by`, `last_login`, `last_login_ip`, `options`, `street_address`, `city`, `country`, `state`, `zipcode`, `phone`, `user_information`, `website_url`, `profiles_url`) VALUES ('1', 'Mr.', 'Võ', 'Văn', 'Khoa', '', '/contents/uploads/1/avatar.jpg', 'thietkewebvip@gmail.com', '$2y$10$kMGSmXZqO2v6bT14PHnRSOUwqOKSA6M7k2ZJK7NWYDqpEXTxU6p0W', 'PZCKHeqkA6ae1F7UeMfkUMUc740xacoshGFzDYE640CUPV2j5gpTOdDJTy48', '', '1', '1', '1', '0', '$2y$10$LNxPY/qlKAqygGm8OGH05OTZktcPYBSUwBM0elD7PZ.f.GSJuncgO', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '2016-11-09 11:40:23', '', '', '1', '', '', 'a:1:{s:6:"social";a:2:{s:7:"private";s:0:"";s:7:"android";s:0:"";}}', 'A703 Khang Gia Building, P14, Phan Huy Ích, Gò Vấp', 'Tp. Hồ Chí Minh', 'VN', '', '', '(+84) 0903-908-078', '', '', ''),
('3', 'Mr.', 'Nguyễn', 'Thị cẩm', 'Giang', '', '', 'client@gmail.com', '$2y$10$GgllwpVUFB7zq.gkyaZapO./oMDYdEdpmXRNJKiVimwv10CMaDj3C', '', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', 'A703 Khang Gia Building, P14, Phan Huy Ích, Gò Vấp', 'Tp. Hồ Chí Minh', '', '', '', '123456789', '', '', ''),
('4', 'Mr.', 'Nguyen', 'Thi', 'Khoa', '', '/contents/uploads/1/avatar.png', 'camgiang.nguyen@gmail.com', '$2y$10$8hdv6fCXI7vl/DIHYvB5ZOu31XIK236IW.7CWt4llnwAJyF9n8WF.', 'ytZU4hlDAk6iS1r664bNDGlM0ZZumIYhWrQUxMcbH7lafgmfeKkDIm2ykRff', '', '1', '0', '1', '0', '$2y$10$8qblLLDPdFeANtch6tYkYOthBcza9VHU7mfrxb4JRSoC3t.rqIYiy', '', '1', '', '', '', '', '', '', '0000-00-00 00:00:00', '2016-11-12 07:08:24', '', '', '4', '', '', 'a:1:{s:6:"social";a:3:{s:7:"private";s:0:"";s:4:"css3";s:0:"";s:7:"android";s:0:"";}}', 'A703 Khang Gia Building, P14, Phan Huy Ích, Gò Vấp', 'Tp. Hồ Chí Minh', 'VN', 'Sai Gon', '', '(+84) 0987-123-123', '', '', ''),
('5', 'Mr.', 'Nguyễn', '', 'Phúc', '', '', 'ntthienphuc6195@gmail.com', '$2y$10$w5ORLH8944z3DuLREyS9JO3Dt3rfDTx6qZE4HzYqbqDxIVKShQk2O', '', '', '1', '0', '0', '0', '$2y$10$TNmG9MOU7LhqtsMKDLFeW.QVGJqJ7Nws9ekRUBhztUoDkJz5NUb5G', '', '2', '', '', '', '', '', '', '0000-00-00 00:00:00', '2016-11-12 05:36:16', '', '', '1', '', '', 'a:1:{s:6:"social";a:1:{s:7:"private";s:0:"";}}', '', '', 'AF', '', '', '', '', '', ''),
('6', '', '', '', '', '', '', 'phungnguyenbdsbd@gmail.com', '$2y$10$brKulc2MvE94LzvGCVvj/OBzNJiz8b..P./GaR9QNvNNea7snXD5u', 'sxbuQ3wTl02dNmIs0MfCULstUKktUIvbsV6LiFIikbqy1MDqgYdo8AZqgdLt', '', '1', '', '', '0', '$2y$10$S9G6ANwZVSZr/IXyPgJKQe/.IIXKfPlwBQpQq5Iv7Vu3AzfMiFUH.', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '2016-08-20 07:16:42', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');


INSERT INTO `users` (`id`, `gender`, `first_name`, `mid_name`, `last_name`, `display_name`, `thumbnail`, `email`, `password`, `remember_token`, `parent_id`, `is_active`, `is_admin`, `is_public`, `is_banned`, `api_key`, `subscr_id`, `roles_id`, `oauth_uid`, `oauth_provider`, `oauth_token`, `oauth_token_secret`, `password_reset_hash`, `language`, `created_at`, `updated_at`, `expires_on`, `created_by`, `edited_by`, `last_login`, `last_login_ip`, `options`, `street_address`, `city`, `country`, `state`, `zipcode`, `phone`, `user_information`, `website_url`, `profiles_url`) VALUES ('7', '', '', '', '', '', '', 'lyhoangthy1610@gmai.com', '$2y$10$bqYr35D3AFo/FX1FIQ8pzORnABiGCg76zY1czAveTLJd9CLILI66m', 'ItJAp4PqdJp6uRxKjkTKkKsXlMCLJiOWTJyM2WeJrS414NnmSkOJOFIiSiOS', '', '1', '', '', '0', '$2y$10$32iA5pbalGyM52hMJ1E/POR1GS18Ocmd6MrHMUJGGUAcm.UCBme86', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '2016-09-06 08:24:13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('8', 'Mr.', '', '', '', '', '', 'admin@rao.vn', '$2y$10$VSB0.NHFyVZm857iv.uMpOPhMnnL/evMIpAAfYj79xng.DWn8imWG', '', '', '', '', '', '0', '$2y$10$WKoUOxjxFNVnGv62UisgGO1oxvUCeuud8t/sKuCJywzsd7ZbX1z2y', '', '', '', '', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

INSERT INTO `users_roles` (`id`, `roles_name`, `roles_lever`, `roles_access`, `updated_at`, `created_at`) VALUES ('1', 'Member', '0', 'a:4:{s:4:"view";a:10:{s:11:"posts/posts";s:1:"1";s:16:"posts/categories";s:1:"1";s:10:"pages/home";s:1:"1";s:27:"posts/content/manager/blogs";s:1:"1";s:30:"posts/content/manager/products";s:1:"1";s:32:"catalog/content/manager/products";s:1:"1";s:27:"account/access/manager/user";s:1:"1";s:14:"account/groups";s:1:"1";s:28:"account/access/manager/baned";s:1:"1";s:17:"account/newlaster";s:1:"1";}s:4:"edit";a:10:{s:11:"posts/posts";s:1:"1";s:16:"posts/categories";s:1:"1";s:10:"pages/home";s:1:"1";s:27:"posts/content/manager/blogs";s:1:"1";s:30:"posts/content/manager/products";s:1:"1";s:32:"catalog/content/manager/products";s:1:"1";s:27:"account/access/manager/user";s:1:"1";s:14:"account/groups";s:1:"1";s:28:"account/access/manager/baned";s:1:"1";s:17:"account/newlaster";s:1:"1";}s:6:"delete";a:10:{s:11:"posts/posts";s:1:"1";s:16:"posts/categories";s:1:"1";s:10:"pages/home";s:1:"1";s:27:"posts/content/manager/blogs";s:1:"1";s:30:"posts/content/manager/products";s:1:"1";s:32:"catalog/content/manager/products";s:1:"1";s:27:"account/access/manager/user";s:1:"1";s:14:"account/groups";s:1:"1";s:28:"account/access/manager/baned";s:1:"1";s:17:"account/newlaster";s:1:"1";}s:6:"report";a:10:{s:11:"posts/posts";s:1:"1";s:16:"posts/categories";s:1:"1";s:10:"pages/home";s:1:"1";s:27:"posts/content/manager/blogs";s:1:"1";s:30:"posts/content/manager/products";s:1:"1";s:32:"catalog/content/manager/products";s:1:"1";s:27:"account/access/manager/user";s:1:"1";s:14:"account/groups";s:1:"1";s:28:"account/access/manager/baned";s:1:"1";s:17:"account/newlaster";s:1:"1";}}', '2016-10-27 02:33:17', '0000-00-00 00:00:00');
INSERT INTO `widgets` (`id`, `stores_id`, `language`, `namespace`, `title`, `content`, `status`, `targets`, `sorts`, `icons`, `display_as`, `groups_access`, `layout`, `customs_key`) VALUES ('3', '{stores_id}', '', 'Modules\Stores\Widgets\Html', 'About Us', 'a:4:{s:7:"__title";s:1:"1";s:8:"sizeRows";a:3:{s:2:"lg";s:8:"col-lg-3";s:2:"sm";s:8:"col-sm-2";s:2:"xs";s:9:"col-xs-12";}s:4:"html";s:325:"Personal time management skills are essential for professional & personal success in any area of life. Those able to successfully implement time management strategies are able to control their workload rather than spend each day in a frenzy of activity reacting to crisis after crisis.
<br>
[social size="32" circle="true"]";s:9:"shortcode";s:1:"1";}', '0', 'widgets-footer', '1', 'fa-android', '', '0', '', ''),
('4', '{stores_id}', 'vn', 'Modules\Posts\Widgets\Posts', 'Mới cập nhập', 'a:7:{s:7:"__title";s:1:"1";s:4:"type";s:4:"auto";s:7:"sort_by";s:10:"updated_at";s:8:"order_by";s:4:"desc";s:5:"limit";s:1:"5";s:4:"size";s:7:"size-xs";s:4:"tags";s:0:"";}', '0', 'widgets-left', '2', 'fa-ambulance', '', '0', '', ''),
('6', '{stores_id}', 'vn', 'Modules\Stores\Widgets\Html', 'New Video', 'a:2:{s:7:"__title";s:1:"1";s:4:"html";s:123:"<iframe width="100%" height="200" src="https://www.youtube.com/embed/oZxn0rAOvHc" frameborder="0" allowfullscreen></iframe>";}', '0', 'widgets-right', '3', 'fa-apple', '', '0', '', ''),
('7', '{stores_id}', 'vn', 'Modules\Stores\Widgets\Contact', 'Văn phòng chính', 'a:8:{s:7:"__title";s:1:"1";s:8:"sizeRows";a:3:{s:2:"lg";s:8:"col-lg-3";s:2:"sm";s:8:"col-sm-2";s:2:"xs";s:9:"col-xs-12";}s:7:"company";s:0:"";s:7:"address";s:0:"";s:5:"phone";s:0:"";s:5:"email";s:0:"";s:7:"website";s:0:"";s:4:"html";s:0:"";}', '0', 'widgets-footer', '2', 'fa-adn', '', '0', '', ''),
('8', '{stores_id}', 'vn', 'Modules\Posts\Widgets\Posts', 'News', 'a:8:{s:7:"__title";s:1:"1";s:8:"sizeRows";a:3:{s:2:"lg";s:8:"col-lg-3";s:2:"sm";s:8:"col-sm-2";s:2:"xs";s:9:"col-xs-12";}s:4:"type";s:5:"blogs";s:7:"sort_by";s:5:"title";s:8:"order_by";s:4:"desc";s:5:"limit";s:2:"10";s:4:"size";s:7:"size-xs";s:4:"tags";s:0:"";}', '0', 'widgets-footer', '4', 'fa-align-justify', '', '0', '', '');


INSERT INTO `widgets` (`id`, `stores_id`, `language`, `namespace`, `title`, `content`, `status`, `targets`, `sorts`, `icons`, `display_as`, `groups_access`, `layout`, `customs_key`) VALUES ('9', '{stores_id}', 'vn', 'Modules\Posts\Widgets\Posts', 'Post Manager', 'a:7:{s:7:"__title";s:1:"1";s:4:"type";s:4:"auto";s:7:"sort_by";s:2:"id";s:8:"order_by";s:4:"desc";s:5:"limit";s:2:"10";s:4:"size";s:7:"size-xs";s:4:"tags";s:0:"";}', '0', 'widgets-right', '2', 'fa-align-justify', '', '0', '', ''),
('10', '{stores_id}', 'vn', 'Modules\Catalog\Widgets\Catalog', 'Catalog', 'a:1:{s:7:"__title";s:1:"1";}', '0', 'widgets-right', '1', 'fa-folder-open', '', '0', '', ''),
('11', '{stores_id}', 'vn', 'Modules\Stores\Widgets\Contact', 'Chi nhánh HCM', 'a:8:{s:7:"__title";s:1:"1";s:8:"sizeRows";a:3:{s:2:"lg";s:8:"col-lg-3";s:2:"sm";s:8:"col-sm-2";s:2:"xs";s:9:"col-xs-12";}s:7:"company";s:16:"VTN Plus Co.,Ltd";s:7:"address";s:51:"LK 10, CC Khang Gia, P14, Phan Huy Ich, Go Vap, HCM";s:5:"phone";s:11:"09909090909";s:5:"email";s:14:"contact@rao.vn";s:7:"website";s:13:"http://rao.vn";s:4:"html";s:0:"";}', '0', 'widgets-footer', '3', 'fa-anchor', '', '0', '', ''),
('12', '{stores_id}', 'vn', 'Modules\Catalog\Widgets\Catalog', 'Chuyên mục', 'a:2:{s:7:"__title";s:1:"1";s:13:"__access_page";a:2:{i:0;s:1:"7";i:1;s:1:"2";}}', '0', 'widgets-left', '1', 'fa-folder-open', '', '0', '', ''),
('13', '{stores_id}', 'vn', 'Modules\Stores\Widgets\Tagcloud', 'Tag&rsquo;s Cloud', 'a:2:{s:7:"__title";s:1:"1";s:4:"html";s:51:"Personal, management, skills,essential,professional";}', '0', 'widgets-left', '3', 'fa-tags', '', '0', '', '');


