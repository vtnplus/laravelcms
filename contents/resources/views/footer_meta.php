</div><!--//End Main Body //-->	
	<!--{{append_css}}-->
	<script type="text/javascript" src="<?php echo resources_url("jquery/jquery-ui.js");?>"></script>
	<script type="text/javascript" src="<?php echo resources_url("jquery/jquery-fn.js");?>"></script>
	<script type="text/javascript" src="<?php echo resources_url("jquery/jquery.touchSwipe.js");?>"></script>
	<script type="text/javascript" src="<?php echo resources_url("jquery/jquery.countdown.js");?>"></script>
	<script type="text/javascript" src="<?php echo resources_url("jquery/phpjs.js");?>"></script>
	<script type="text/javascript" src="<?php echo resources_url("jquery/jquery.inputmask.js");?>"></script>
	<script type="text/javascript" src="<?php echo resources_url("owl-carousel/owl.carousel.min.js");?>"></script>

	<!-- Bootflat's JS files.-->
	
    <script type="text/javascript" src="<?php echo resources_url("bootstrap/js/icheck.min.js");?>"></script>
    <script type="text/javascript" src="<?php echo resources_url("bootstrap/js/bootstrap-select.min.js");?>"></script>
    <script type="text/javascript" src="<?php echo resources_url("bootstrap/js/bootstrap-tagsinput.js");?>"></script>

	
	<!--{{append_js}}-->
	<!-- Google Analytics -->
    <?php if(config("site.google_analytic")){ ?>
    <script>
    setTimeout(function(){
	    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	    ga('create', '<?php echo config("site.google_analytic");?>', 'auto');
	    ga('send', 'pageview');
	},200);
    </script>
    <!-- End Google Analytics -->
    <?php } ?>

    <script type="application/ld+json">{"@context": "http://schema.org", "@type":"Organization", "name":"<?php echo config("site.sitename");?>","url": "<?php echo base_url();?>", "logo":"<?php echo base_url(config("site.logo"));?>"}</script><script type="application/ld+json">{"@context":"http://schema.org", "@type":"Organization", "name":"<?php echo config("site.sitename");?>", "url":"<?php echo base_url();?>", "sameAs":["http://www.facebook.com/Newdaytravel", "http://twitter.com/newdaytravel", "http://instagram.com/newdaytravel"]}</script><script type="application/ld+json">{"@context":"http://schema.org", "@type":"Organization", "url":"<?php echo base_url();?>", "contactPoint":[{"@type":"ContactPoint", "telephone":"+84<?php echo config("site.hotline");?>", "contactType":"customer service"}]}</script>

</body>
</html>