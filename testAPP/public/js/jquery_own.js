 var emId="0";
 var initId = document.getElementById("search_init").innerHTML;
 emId = initId;
 //get last part of url
 function gethost()
 {
	 site_host = window.location.host;
	 site_url = window.location.href;
	 //alert(site_url);
	 bd_position = parseInt(site_url.indexOf("baiduyunpan"));
	 if(bd_position>0)
	 {
		 site_host = "http://"+site_host+""
	 }
	 else
	 {
		 site_host = "http://"+site_host+""
	 }
     //alert(site_host);	 
	 return site_host;
 }
 function getLastPartOfUrl()
 {
	 userHref = window.location.href;
     userIdStart = parseInt(userHref.lastIndexOf("/"))+1;
	 urlLength = parseInt(userHref.length);	 
	 userSearch = userHref.substr(userIdStart,urlLength-userIdStart);	 
	 return userSearch;
 } 

 //查询
 function searchyun()
 {	
    aa= window.form1.key.value; 
	
	
    if(aa==""||aa==null)
    {
		alert("请输入要搜索的关键字!")
	}	
    else
    {        
		suffix = document.getElementById("search_suffix").innerHTML;
		window.location.href=gethost()+"/search/"+aa+"-"+emId+"-全部-0.html";
	}		
	//alert(emId);    
 }
 function searchyunId(emId)
 {	
    aa= window.form1.key.value;	
	suffix = document.getElementById("search_suffix").innerHTML;
    window.location.href=gethost()+"/search/"+aa+"-"+emId+"-全部-0.html";
 }
 function searchyunUser(emId)
 {
	 userSearch = getLastPartOfUrl();//get the last part of url	 
	 userIdEnd = parseInt(userSearch.indexOf("-"));
	 userId = userSearch.substring(0,userIdEnd);
	 emId = emId.replace(/bottom/,"");
	 targetUrl = gethost()+"/user/"+userId+"-"+emId+"-0.html";	
	 window.location.href=targetUrl;	 
 } 
function searchyunwap()
 {	
    aa= this.form1.key.value;	
    if(aa==""||aa==null)
    {
		alert("请输入要搜索的关键字!")
	}	
    else
    {		
		window.location.href="http://m.baiduyunpan.com/search/"+aa+".html";
	}	
    
 } 
 function searchMovie(cat,format,p)
 {	
	window.location.href=gethost()+"/movie/"+cat+"-"+format+"-"+p+".html";
 }
 function searchMovieIn(cs)
 {
	 var category = "喜剧,恐怖,爱情,动作,科幻,战争,犯罪,动画,古装,奇幻,武侠,悬疑";
	 var suffix = "BT种子,MP4视频,RMVB视频,AVI视频,MKV视频,FLV视频";
 }
  
 $(document).ready(function(){
	 $("a.search-wrap-a").removeClass("wrap-a2");
	 $("li.resource-conter-li").removeClass("li-qb");
	 $("#b"+initId).addClass("li-qb");
	 $("#"+initId).addClass("wrap-a2");
	 
	 suffix = document.getElementById("search_suffix").innerHTML;
	
	 $("li.resource-conter-li-suffix").children().filter(":contains('"+suffix+"')").parent().addClass("wrap-a2");	
 }); 
 $(document).ready(function(){
	  $("a.search-wrap-a").click(function(){
		 $("a.search-wrap-a").removeClass("wrap-a2");
		 $(this).addClass("wrap-a2");
		 emId = $(this).attr("id");
		 //alert(emId);
	  });
	  //查询后缀名，文件格式
      $("li.resource-conter-li-suffix").click(function(){
		  $("li.resource-conter-li-suffix").removeClass("wrap-a2");
		  $(this).addClass("wrap-a2");
		  document.getElementById("search_suffix").innerHTML = $(this).text();
		  aa= window.form1.key.value; 
    
		suffix = document.getElementById("search_suffix").innerHTML;
		window.location.href=gethost()+"/search/"+aa+"-"+emId+"-"+suffix+"-0.html";
		
         //searchyun()；
          //$(this).addClass("wrap-a2");	
	      //alert($(this).text());
		  //emId = $(this).attr("id");
	  });  
 });
 
 
 
 //control user page
 $(document).ready(function(){
	 lastPartUrl = getLastPartOfUrl();//get last part of url
	 searchPart = lastPartUrl.split("-");//return string array
	 cat = searchPart[1];//return category
     $("li.main-bottom-li").removeClass("main-bottom-li2");	 
	 $("#bottom"+cat).parent().addClass("main-bottom-li2");
	 $("li.main-bottom-li").children().click(function(){		 
		 emId = $(this).attr("id");
		 searchyunUser(emId);
         		 
	 });    
 });
 //jQuery函数定义
jQuery.extend({
   setNavStyle:function (elementText) {	   
	$("li.nav-li").removeClass("nav_li2");
	$("li.nav-li").children().filter(":contains('"+elementText+"')").parent().addClass("nav-li2");
   } 
}); 
//--调用 <script>$.setNavStyle('百度云会员');</script>，有一定的延迟
function trigger_click(elId)
{
	document.getElementById(elId).click();
}
//电脑版和手机版本
function isDeskMobile(name)
{  
   document.cookie="isMobile="+name;
   window.location.href="http://"+name+".baiduyunpan.com";  
}
 
 


 
 
