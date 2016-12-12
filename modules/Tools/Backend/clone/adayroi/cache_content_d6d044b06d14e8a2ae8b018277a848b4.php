<?php 
$updateid = 'd6d044b06d14e8a2ae8b018277a848b4';

$arv = array(
            'keyword'   => $updateid,
            'language' => getLanguage(),
            'stores_id' => getStores(),
            'users_id'  => getAuth(),
            'type'  => $type,
            'title'     =>  'Điện thoại Masstel F20',
            'content'   => '              <h2>Thông tin sản phẩm</h2>              <h3>Điện thoại Masstel F20</h3>              <p>Kiểu dáng nhỏ gọn, chắc chắn<br>  Điện thoại di động Masstel F20&nbsp;được thiết kế dạng thanh đơn giản kết hợp với màu sắc tinh tế, đáp ứng sở thích của nhiều người dùng khác nhau. Kiểu dáng nhỏ gọn đi kèm màn hình màu và bàn phím lớn cho khả năng thao tác thoải mái. Máy có trọng lượng nhẹ giúp bạn sử dụng liên tục không gây mỏi tay.<br>  <br>  Hỗ trợ chụp hình, nghe nhạc MP3<br>  Mặc dù nằm trong dòng điện thoại phổ thông, nhưng Masstel F20&nbsp;vẫn được trang bị camera có độ phân giải VGA giúp bạn chụp hình và quay video dễ dàng. Ngoài ra, máy còn nhiều tính năng giải trí khác như: Nghe đài FM, chơi game, nghe nhạc, phát video với thẻ nhớ gắn ngoài lên đến 16GB.<br>  <br>  Tích hợp 2 khe cắm SIM<br>  Masstel F20&nbsp;hỗ trợ 2 SIM với chế độ chờ song song, cho bạn thoải mái liên lạc với người thân, đồng nghiệp. Dung lượng pin 1000mAh đủ để người dùng sử dụng cả ngày cho việc liên lạc lẫn giải trí.</p>          ',
            'gallery'   =>  'a:2:{s:3:"url";a:1:{i:0;s:61:"/contents/uploads/1/images/products/1471506245474_6624500.jpg";}s:5:"title";a:1:{i:0;s:25:"1471506245474_6624500.jpg";}}',
            'thumbs'    =>  '/contents/uploads/1/images/products/1471506245474_6624500.jpg',
            'created_at' => date("Y-m-d h:i:s"),
            'seo_urls'  => str_slug('Điện thoại Masstel F20').'.html',
            );
    $arvs = array(
            "prices" => '599000',
"special" => '<h2>Thông số sản phẩm</h2>              <table class="table table-bordered" id="tblGeneralAttribute">                  <tbody>                              <tr class="row-info">                                  <td><strong>Model</strong></td>                                  <td>F20</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Kết nối</strong></td>                                  <td>Bluetooth; GPRS/EDGE; Micro USB</td>                              </tr>                              <tr class="row-info">                                  <td><strong>K&#237;ch thước</strong></td>                                  <td>104.2 x 51.5 x 19.15mm</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Loại m&#224;n h&#236;nh</strong></td>                                  <td>TFT</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Độ ph&#226;n giải m&#224;n h&#236;nh</strong></td>                                  <td>240 x 320 pixcel</td>                              </tr>                              <tr class="row-info">                                  <td><strong>M&#224;u m&#224;n h&#236;nh</strong></td>                                  <td>262.144 m&#224;u</td>                              </tr>                              <tr class="row-info">                                  <td><strong>T&#237;nh năng kh&#225;c</strong></td>                                  <td>Xem phim 3GP, MP4; Nghe nhạc MP3; Ghi &#226;m; FM radio</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Số khe SIM</strong></td>                                  <td>2</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Loại sim</strong></td>                                  <td>SIM thường</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Nguồn gốc</strong></td>                                  <td>Ch&#237;nh h&#227;ng</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Thời hạn bảo h&#224;nh</strong></td>                                  <td>12 (th&#225;ng)</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Camera sau</strong></td>                                  <td>0,3 (MP)</td>                              </tr>                              <tr class="row-info">                                  <td><strong>K&#237;ch thước m&#224;n h&#236;nh</strong></td>                                  <td>2,4 (inches)</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Dung lượng pin</strong></td>                                  <td>1.000 (mAh)</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Hỗ trợ thẻ nhớ</strong></td>                                  <td>16 (GB)</td>                              </tr>                              <tr class="row-info">                                  <td><strong>Jack &#226;m thanh</strong></td>                                  <td>3,5 (mm)</td>                              </tr>                                              <tr class="row-more">                              <td colspan="2" style="background-color:white!important;cursor: pointer">                                  <img src="/build/assets/images/pages/details/product-specifications.see-more.icon.jpg"/>                                  Xem thêm                              </td>                          </tr>                  </tbody>              </table><!-- end table.table -->',
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