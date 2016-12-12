<?php 
$updateid = '8ad98ecb5e8bc1e5920429f62b395140';

$arv = array(
            'keyword'   => $updateid,
            'language' => getLanguage(),
            'stores_id' => getStores(),
            'users_id'  => getAuth(),
            'type'  => $type,
            'title'     =>  'Pin sạc dự phòng Pisen LCD Power Station 20000mAh Trắng',
            'content'   => '              <h2>Thông tin sản phẩm</h2>              <h3>Pin sạc dự ph&#242;ng Pisen LCD Power Station 20000mAh Trắng</h3>              <p>Pin sạc dự phòng Pisen LCD Power Station 20000mAh được thiết kế với kiểu dáng nhỏ gọn giúp bạn dễ dàng cất vào ba lô, túi xách mang đi bất cứ nơi đâu nhất là trong những chuyến công tác, du lịch dài ngày cùng bạn bè. Pin có dung lượng lớn 20000mAh, chu kì sạc 1000 lần, sạc nhanh chóng, hiệu quả và an toàn cho thiết bị của bạn. Sản phẩm có 2 cổng USB: 5V - 1A và 5V - 2A có thể sạc hai thiết bị cùng lúc. Ngoài ra, pin sạc dự phòng còn có màn hình LCD hiển thị phần trăm dung lượng pin thuận tiện cho người sử dụng theo dõi quá trình sạc, giúp người dùng duy trì tuổi thọ của sản phẩm cũng như bảo vệ thiết bị di động của mình.</p>          ',
            'gallery'   =>  'a:2:{s:3:"url";a:1:{i:0;s:61:"/contents/uploads/1/images/products/1466566464892_6380083.jpg";}s:5:"title";a:1:{i:0;s:25:"1466566464892_6380083.jpg";}}',
            'thumbs'    =>  '/contents/uploads/1/images/products/1466566464892_6380083.jpg',
            'created_at' => date("Y-m-d h:i:s"),
            'seo_urls'  => str_slug('Pin sạc dự phòng Pisen LCD Power Station 20000mAh Trắng').'.html',
            );
    $arvs = array(
            "prices" => '499000',
"special" => '<h2>Thông số sản phẩm</h2>              <table class="table table-bordered" id="tblGeneralAttribute">                  <tbody>                              <tr class="row-info">                                  <td><strong>Model</strong></td>                                  <td>LCD Power Station 20000mAh</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Chất liệu vỏ</strong></td>                                  <td>Nhựa</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Loại pin</strong></td>                                  <td>Li-Ion</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Th&#244;ng số nổi bật</strong></td>                                  <td>M&#224;n h&#236;nh LCD hiển thị trạng th&#225;i pin</td>                              </tr>                              <tr class="row-info">                                  <td><strong>T&#237;nh năng</strong></td>                                  <td>Sử dụng cho smartphone, m&#225;y t&#237;nh bảng, m&#225;y nghe nhạc,...</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Th&#244;ng số kĩ thuật</strong></td>                                  <td>Điện &#225;p ra: 5V - 1A/2A</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Dung lượng pin</strong></td>                                  <td>20.000 (mAh)</td>                              </tr>                                      </tbody>              </table><!-- end table.table -->',
    );
$arv = array_merge($arv, $arvs);

$read = db("Posts::Posts",$type)->language()->stores()->where("type",$type)->where("keyword",$updateid)->first();
if($read){
    $read->title     =  $arv["title"];
    $read->content   =  $arv["content"];
    $read->gallery   =  $arv["gallery"];
    $read->thumbs    =  $arv["thumbs"];
    $read->updated_at = date("Y-m-d h:i:s");
    $read->seo_urls  = str_slug($arv["title"]).'.html';
    $read->prices = $arvs['prices'];
$read->special = $arvs['special'];
    $read = support()->beforeSave($read);
    $read->save();
}else{

    $data = support()->beforeCreate($arv);
    $id = db("Posts::Posts",$type)->insertGetId(
        $data
    );
}
?>