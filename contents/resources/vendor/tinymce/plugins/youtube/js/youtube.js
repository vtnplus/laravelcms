var youtput='placeholder';
var secure='https';
var max=30;
var key='AIzaSyA9Pac6D9thvPkiHpms1ZwxzhE9i_cIjLw';
var slider=true;
var order='relevance';
var suggest=true;
var width=560;
var height=315;
var data={
	"youtubeurl":'Youtube URL',
	"youtubeSkin":'Skin',
	"youtubeSkinD":'dark',
	"youtubeSkinL":'light',
	"youtubeWidth":'width',
	"youtubeHeight":'height',
	"youtubeSearch":'Search',
	"youtubeTitle":'Title',
	"youtubeADDclose":'Insert and Close',
	"youtubeADD":'Insert',
	"youtubeLOAD":'Load More',
	"width":width,
	"height":height};

function youtubesearch(){
	$(function(){
		YTDataV3.init({key:key,order:order});
		if(suggest){
			$('#inpKeywords').keyup(
				function(){
					var val=$(this).val();
					jQTubeUtil.suggest(val,function(response){
						var html='';
						for(s in response.suggestions){
							var sug=response.suggestions[s];
							html+='<li><a href="#">'+sug+'</a></li>';
						}
if(response.suggestions.length)
$('.autocomplete').html(html).fadeIn(500);else
$('.autocomplete').fadeOut(500);});});}
$('#btnSearch').click(function(){$('#inpKeywords, #btnSearch').blur();show_videos();$('.autocomplete').fadeOut(500);return false;});$(document).on('click','.autocomplete a',function(){var text=$(this).text();$('#inpKeywords').val(text);$('.autocomplete').fadeOut(500);show_videos();return false;});function show_videos(){$('#hidPage').val(1);var val=$('#inpKeywords').val();var parametersObject={"q":val,"start-index":document.getElementById("hidPage").value,"max-results":max,"order":order}
$('.videos').addClass('preloader').html('');YTDataV3.search(parametersObject,function(response){if(response.totalResults==0){$(".videos").show().text(' No results !');$('#load_more').hide();return false;}
if(response.totalResults<max){$('#load_more').hide();}
var html='';for(v in response.videos){html+=template(response.videos[v]);}
$('.videos').removeClass('preloader').html(html);});$('#load_more').show(500);}});};function convertQuotes(string){return string.replace(/["']/g,"");}
function template(video){html='';html+='<li>';html+='<div class="row listbox"><div class="col-xs-5"><a href="javascript:selectVideo(\''+video.id.videoId+'\',\''+convertQuotes(video.snippet.title)+'\')">';html+='<img src="'+video.snippet.thumbnails.medium.url+'" class="img-rounded" alt="'+video.snippet.title+'" title="'+video.snippet.title+'" />';html+='</a></div>';html+='<div class="col-sx-7 listboxText"><a href="javascript:selectVideo(\''+video.id.videoId+'\',\''+convertQuotes(video.snippet.title)+'\')">'+video.snippet.title+'</a>';html+='<small>'+video.snippet.description+'</small>';html+='</div></div>';html+='</li>';return html;}
function loadmore(){$('#hidPage').val($('#hidPage').val()*1+1);var start=($('#hidPage').val()*max+1-max);var val=$('.form-horizontal').find('#inpKeywords').val();var parametersObject={'q':val,'max-results':max,'order':order,'next_page':true}
YTDataV3.search(parametersObject,function(response){var html='';for(v in response.videos){html+=template(response.videos[v]);}
$('.videos').removeClass('preloader').append(html);});}
function selectVideo(Id,title){var sUrl=secure+'://www.youtube.com/watch?v='+Id;$('#inpURL').val(sUrl);$('#titleURL').val(title);$('#preview').html(get_video_iframe());}
function I_InsertHTML(sHTML){if(getVideoId($('#inpURL').val())==''){return false;}
parent.tinymce.activeEditor.insertContent(sHTML);}
function I_Close(){parent.tinymce.activeEditor.windowManager.close();}
function get_video_iframe(){var sEmbedUrl=secure+'://www.youtube.com/embed/'+getVideoId($('#inpURL').val());var sHTML='<iframe title="'+$('#titleURL').val()+'" width="290" height="230" src="'+sEmbedUrl+'?wmode=opaque&modestbranding=1&theme='+$('#skinURL').val()+'" frameborder="0" allowfullscreen></iframe>';return sHTML;}
function I_Insert(){var sEmbedUrl=secure+'://www.youtube.com/embed/'+getVideoId($('#inpURL').val());var sTitle=$("#titleURL").val().substring(0,125);if(youtput=='placeholder')
var sHTML='<img src="'+secure+'://img.youtube.com/vi/'+getVideoId($('#inpURL').val())+'/0.jpg" alt="'+sTitle+'" width="'+$('#widthURL').val()+'" height="'+$('#heightURL').val()+'" data-video="youtube" data-skin="'+$('#skinURL').val()+'" data-id="'+getVideoId($('#inpURL').val())+'">';else
var sHTML='<iframe title="'+sTitle+'" width="'+$('#widthURL').val()+'" height="'+$('#heightURL').val()+'" src="'+sEmbedUrl+'?wmode=opaque&theme='+$('#skinURL').val()+'" frameborder="0" allowfullscreen></iframe>';I_InsertHTML(sHTML);}
function getVideoId(url){return url.replace(/^.*((v\/)|(embed\/)|(watch\?))\??v?=?([^\&\?]*).*/,'$5');}
$.get('forms.html',function(template){

	filled=Mustache.render(template,data);
	$('#template-container').append(filled);
	youtubesearch();});