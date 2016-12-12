/**
 *
 *
 * @author Josh Lobe
 * http://ultimatetinymcepro.com
 */
 
jQuery(document).ready(function($) {


	tinymce.PluginManager.add('youtube', function(editor, url) {
		
		
		editor.addButton('youtube', {
			
			image: url + '/images/youtube.png',
			tooltip: 'YouTube Video',
			onclick: open_youTube
		});
		
		function open_youTube() {
			
			editor.windowManager.open({
					
				title: 'Select YouTube Video',
				width: 900,
				height: 655,
				url: url+'/youTube.php'
			})
		}
		
	});
});