
    
    <?php if(config("site.comments_by") == "facebook"){ ?>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));
        </script>
        <div class="fb-comments" data-href="<?php echo $url;?>" data-numposts="5" data-width="100%"></div>

      <?php }else if(config("site.comments_by") == "google"){ ?>

       <div id="google_comments"> Đang tải...</div>
       <script type="text/javascript" src="https://apis.google.com/js/plusone.js" type="text/javascript">{lang: 'vi'}</script>
       <script type="text/javascript">
       $(document).ready(function(){
        var width = $(this).parent().width();
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            if($("#google_comments").hasClass("loaddingReadyComments") == false){
              
              $("#google_comments").addClass("loaddingReadyComments");

              gapi.comments.render('google_comments',{
                href: "<?php echo $url;?>",
                width: width,
                first_party_property: 'BLOGGER',
                view_type: 'FILTERED_POSTMOD'
              });
            }

            
        });
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
            $("#google_comments, #google_comments iframe").css({"width" : "100%"});
        });
        
        
       });
       
       
      </script>
      

    <?php } ?>
    
  