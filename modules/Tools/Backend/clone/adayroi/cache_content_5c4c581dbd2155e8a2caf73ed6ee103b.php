<?php 
$updateid = '5c4c581dbd2155e8a2caf73ed6ee103b';

$arv = array(
            'keyword'   => $updateid,
            'language' => getLanguage(),
            'stores_id' => getStores(),
            'users_id'  => getAuth(),
            'type'  => $type,
            'title'     =>  'Samsung Galaxy J1 Mini 8GB (Hàng chính hãng)',
            'content'   => '              <h2>Thông tin sản phẩm</h2>              <h3>Samsung Galaxy J1 Mini 8GB (H&#224;ng ch&#237;nh h&#227;ng)</h3>              <p><img src="https://cdn02.static-adayroi.com/0/2016/09/05/1473049204796_9877171.jpg" /></p>  <p><img src="https://cdn02.static-adayroi.com/0/2016/06/17/1466158211306_9150917.jpg" /></p>          ',
            'gallery'   =>  'a:2:{s:3:"url";a:2:{i:0;s:61:"/contents/uploads/1/images/products/1461061186772_8015632.jpg";i:1;s:61:"/contents/uploads/1/images/products/1461061189942_8432410.jpg";}s:5:"title";a:2:{i:0;s:25:"1461061186772_8015632.jpg";i:1;s:25:"1461061189942_8432410.jpg";}}',
            'thumbs'    =>  '/contents/uploads/1/images/products/1461061186772_8015632.jpg',
            'created_at' => date("Y-m-d h:i:s"),
            'seo_urls'  => str_slug('Samsung Galaxy J1 Mini 8GB (Hàng chính hãng)').'.html',
            );
    $arvs = array(
            "prices" => '1600000',
"special" => '<h2>Thông số sản phẩm</h2>              <table class="table table-bordered" id="tblGeneralAttribute">                  <tbody>                              <tr class="row-info">                                  <td><strong>Chất liệu vỏ</strong></td>                                  <td>Nhựa</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Thời gian hoạt động</strong></td>                                  <td>Internet 7h (3G), 9h (Wifi), đ&#224;m thoại 8h (3G), ph&#225;t Video 7h, ph&#225;t Audio 29h</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Model</strong></td>                                  <td>J1 Mini</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Hệ điều h&#224;nh</strong></td>                                  <td>Android OS, v5.1 (Lollipop)</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Kết nối</strong></td>                                  <td>2G GSM 850/900/1800/1900, 3G HSDPA 900/2100, Wi-Fi 802.11 b/g/n, Wi-Fi Direct, Wi-Fi hotspot, Bluetooth, GPS</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Tốc độ CPU</strong></td>                                  <td>Quad-core 1.2 GHz</td>                              </tr>                              <tr class="row-info">                                  <td><strong>K&#237;ch thước</strong></td>                                  <td>126.6 x 63.1 x 10.8mm</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Bộ nhớ trong</strong></td>                                  <td>8GB</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Loại m&#224;n h&#236;nh</strong></td>                                  <td>TFT</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Độ ph&#226;n giải m&#224;n h&#236;nh</strong></td>                                  <td>480 x 800 pixels</td>                              </tr>                              <tr class="row-info">                                  <td><strong>RAM</strong></td>                                  <td>1GB</td>                              </tr>                              <tr class="row-info">                                  <td><strong>M&#224;u m&#224;n h&#236;nh</strong></td>                                  <td>256000 m&#224;u</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Chipset</strong></td>                                  <td>Spreadtrum SC8830</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Loại pin</strong></td>                                  <td>Li-ion</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Số khe SIM</strong></td>                                  <td>2 SIM 2 s&#243;ng</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Chip đồ họa</strong></td>                                  <td>Mali-400MP2</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Loại sim</strong></td>                                  <td>Micro SIM</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Khối lượng</strong></td>                                  <td>123 (g)</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Thời hạn bảo h&#224;nh</strong></td>                                  <td>12 (th&#225;ng)</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Camera sau</strong></td>                                  <td>5 (MP)</td>                              </tr>                              <tr class="row-info">                                  <td><strong>K&#237;ch thước m&#224;n h&#236;nh</strong></td>                                  <td>4 (inches)</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Dung lượng pin</strong></td>                                  <td>1.500 (mAh)</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Hỗ trợ thẻ nhớ</strong></td>                                  <td>128 (GB)</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Jack &#226;m thanh</strong></td>                                  <td>3,5 (mm)</td>                              </tr>                                              <tr class="row-more">                              <td colspan="2" style="background-color:white!important;cursor: pointer">                                  <img src="/build/assets/images/pages/details/product-specifications.see-more.icon.jpg"/>                                  Xem thêm                              </td>                          </tr>                  </tbody>              </table><!-- end table.table -->',
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