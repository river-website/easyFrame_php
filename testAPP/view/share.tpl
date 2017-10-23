<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title><{$webSiteInfo.title}></title>
        <meta name="Keywords" content="<{$webSiteInfo.keyWords}>;">
        <meta name="Description" content="<{$webSiteInfo.description}>;">
        <script type="text/javascript" src="http://www.baiduyunpan.com/js/_common.js"></script>
        <script type="text/javascript" src="http://www.baiduyunpan.com/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript">
(function(){
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https'){
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else{
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
        })();
        </script>
        <script type="text/javascript">
var _hmt = _hmt || [];
        (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?6ab851a9b902a812b1b358093a16cea1";
        var s = document.getElementsByTagName("script")[0]; 
        s.parentNode.insertBefore(hm, s);
        })();
        </script>
        <style type="text/css">
.baidu{font-size:14px;line-height:38px;font-family:arial}
        </style>
        <link rel="stylesheet" type="text/css" href="http://www.baiduyunpan.com/css/baiduyunpan-bjtp.css">
        <link rel="stylesheet" type="text/css" href="http://www.baiduyunpan.com/css/baiduyunpan-lb.css">
        <title></title>
    </head>
    <body>
        <div class="box">
            <!-- 导航 nav -->
            <div class="nav">
                <div class="nav-auto">
                    <ul class="nav-ul">
                        <li class="nav-li">
                            <a href="http://www.baiduyunpan.com/">百度云搜索</a>
                        </li>
                        <li class="nav-li">
                            <a href="http://www.baiduyunpan.com/new/">百度云下载</a>
                        </li>
                        <li class="nav-li">
                            <a href="http://www.baiduyunpan.com/movie/">百度云电影</a>
                        </li>
                        <li class="nav-li">
                            <a href="http://www.baiduyunpan.com/users/">百度云会员</a>
                        </li>
                        <li class="nav-li">
                            <a href="http://www.baiduyunpan.com/articlelist/">百度云资源</a>
                        </li>
                        <li class="nav-li">
                            <a href="http://www.baiduyunpan.com/album/">百度云专辑</a>
                        </li>
                    </ul>
                    <div class="nav-right">
                        <a href="javascript:trigger_click('more');" class="nav-right-a">分享本站</a> <a href="javascript:addfavorite(this,'http://www.baiduyunpan.com/','%E7%99%BE%E5%BA%A6%E4%BA%91%E7%9B%98_%E7%99%BE%E5%BA%A6%E4%BA%91%E6%90%9C%E7%B4%A2%E5%92%8C%E7%99%BE%E5%BA%A6%E4%BA%91%E4%B8%8B%E8%BD%BD%E7%9A%84%E5%AE%98%E7%BD%91%EF%BC%8C%E5%8D%83%E4%B8%87%E7%BA%A7%E7%9A%84%E7%99%BE%E5%BA%A6%E4%BA%91%E8%B5%84%E6%BA%90%E4%B8%8B%E8%BD%BD%EF%BC%8C%E6%9C%80%E5%BF%AB%E7%9A%84%E7%99%BE%E5%BA%A6%E7%BD%91%E7%9B%98%E6%90%9C%E7%B4%A2%E5%BC%95%E6%93%8E%EF%BC%81');" class="nav-right-a nav-right-a2">收藏本站</a> <a href="javascript:window.open('http://www.baiduyunpan.com/app/');" class="nav-right-a nav-right-a3">移动端</a>
                    </div>
                </div>
            </div>
            <!--搜索  -->
            <div class="search">
                <span id="search_init" style="display:none;">0</span> <span id="search_suffix" style="display:none;">全部</span>
                <div class="search-auto">
                    <h2 class="search-left">
                        <a title="百度云盘" href="<{$webSiteInfo.webSite}>"><img alt="百度云盘" src="<{$webSiteInfo.pubSite}>/images/logo.png"></a>
                    </h2>
                    <div class="search-center">
                        <div class="search-wrap">
                            <a href="#" class="search-wrap-a" id="0">全部</a> <{foreach from=$typesList item=suffixs key=type}>; <a href="#" class="search-wrap-a"><{$type}>;</a> <{/foreach}>;
                        </div>
                        <form id="form1" class="search_form">
                            <input type="text" id="searchbox" value="Wildes.Japan" class="form-key" name="key" onkeypress="if(event.keyCode==13) {searchyun();return false;}" placeholder="共27713995个资源，今日已更新726148"> <input type="button" onclick="searchyun();" value="" class="form-ss"> <i class="form-i"><img src="http://www.baiduyunpan.com/images/1.png" onclick="searchyun()"></i>
                        </form>
                    </div>
                </div>
            </div>
            <!-- 图片轮播广告 --><!-- <div class="ad">
 <ul>
  <li class="ad-li">
   <img alt src="http://www.baiduyunpan.com/images/30.jpg"/>
   <a target="_blank" href="javascripr:;" class="ad-a">￥2100.00/3100.00</a>
  </li>
</ul>
 </div>-->
 <!-- 百度云电影 -->
            <div class="main">
                <h2 class="main-h3">
                    当前位置： <a href="http://www.baiduyunpan.com/main/" class="main-h3-a">首页</a> &nbsp;>;&nbsp; <a class=" main-h3-a2">百度云搜索</a>
                </h2>
                <div class="resource">
                    <div class="resource-top">
                        <h2 class="resource-h2">
                            <span style="color:green;font-size:15px;"><b style="color:red;">Wildes.Japan</b> 百度云为您找到<b style="color:red;">742</b>条相关的百度云资源，<b style="color:red;">Wildes.Japan</b>下载将跳转到百度网盘下载。</span>
                        </h2>
                    </div>
                    <div class="resource-center">
                        <ul>
                            <li class="resource-conter-li" id="b0">
                                <a href="javascript:searchyunId(0);">全部</a>
                            </li>
                            <li style="list-style: none"><{foreach from=$typesList item=suffixs key=type}>;
                            </li>
                            <li class="resource-conter-li">
                                <a href="javascript:searchyunId(1);"><{$type}>;</a>
                            </li>
                            <li style="list-style: none"><{/foreach}>;
                            </li>
                        </ul>
                    </div>
                    <div style="padding-left:16px;line-height:30px;border-bottom: 1px solid #eee;padding-bottom: 10px;">
                        <ul>
                            <li class="resource-conter-li-suffix">
                                <a href="#">全部</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">torrent</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">rmvb</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">mp4</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">avi</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">flv</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">mkv</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">vob</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">mp3</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">wav</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">pdf</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">doc</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">docx</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">wps</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">txt</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">rtf</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">ppt</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">xls</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">xlsx</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">pps</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">epub</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">jpg</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">bmp</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">gif</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">png</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">psd</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">iso</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">ghost</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">exe</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">apk</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">ipa</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">rar</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">zip</a>
                            </li>
                        </ul>
                    </div>
                    <{foreach from=$searchList item=search}> 
                    <span style="display:none;">0</span>
                    <div class="main-x">
                        <div class="main-x-left">
                            <h3 class="x-left-h3">
                                <!--查询字段为空查询结果为空情况的解决--> <a target="_blank" href="http://www.baiduyunpan.com/file/27292821.html">野性日本.<font style="color:red;">Wildes</font>.<font style="color:red;">Japan</font></a>
                            </h3>
                            <ul class="x-left-ul">
                                <li class="x-left-li li-sj">时间：2017-05-22<span>|</span>
                                </li>
                                <li class="x-left-li">大小： 未知 <span>|</span>
                                </li>
                                <li class="x-left-li li-cs">下载：1095次<span>|</span>
                                </li>
                                <li class="x-left-li">格式：.Japan
                                </li>
                            </ul>
                        </div>
                        <div class="main-x-right">
                            <p class="x-right-p x-right-p2">
                                会员：<a href="../user/2251194350-0-0.html" target="_blank">鸡毛巾</a>
                            </p>
                            <p class="x-right-p">
                                来源：百度网盘
                            </p>
                        </div>
                    </div>
                    <{/foreach}>
                     <!--下一页/1==100.go-->
                    <div class="gow">
                        <table class="pagesec">
                            <tbody>
                                <tr>
                                    <td class="rd">
                                        <span>第1/38页</span>
                                    </td>
                                    <td class="prev">
                                        <a class="db">上一页</a>
                                    </td>
                                    <td class="psec"></td>
                                    <td class="pnum">
                                        <a class="sel">1</a>
                                    </td>
                                    <td class="pnum">
                                        <a class="ab" href="/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-2.html">2</a>
                                    </td>
                                    <td class="pnum">
                                        <a class="ab" href="/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-3.html">3</a>
                                    </td>
                                    <td class="pnum">
                                        <a class="ab" href="/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-4.html">4</a>
                                    </td>
                                    <td class="pnum">
                                        <a class="ab" href="/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-5.html">5</a>
                                    </td>
                                    <td class="pnum">
                                        <a class="ab" href="/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-6.html">6</a>
                                    </td>
                                    <td class="pnum">
                                        <a class="ab" href="/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-7.html">7</a>
                                    </td>
                                    <td class="pnum">
                                        <a class="ab" href="/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-8.html">8</a>
                                    </td>
                                    <td class="pnum">
                                        <a class="ab" href="/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-9.html">9</a>
                                    </td>
                                    <td class="pnum">
                                        <a class="ab" href="/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-10.html">10</a>
                                    </td>
                                    <td class="nsec"></td>
                                    <td class="next">
                                        <a class="ab" href="/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-2.html">下一页</a>
                                    </td>
                                    <td class="jmp"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--底部广告--><!--
<div class="main-images">
  <a title="" target="_blank" href="javascripr:;">
   <img alt="" src="http://www.baiduyunpan.com/images/26.png"/></a>
 </div>
 -->
                </div>
                <!-- 右  -->
                <div class="main-right">
                    <!--动态-->
                    <div class="ranklist-yp">
                        <div class="ranklist-yp-dt">
                            <h2 class="dt-h2">
                                <span class="dt-h2-span">动态</span>百度云盘
                            </h2>
                            <p class="rm-p">
                                <a target="_blank" href="http://www.baiduyunpan.com/articlelist/">更多>;</a>
                            </p>
                        </div>
                        <div class="yp-dt-center">
                            <ul>
                                <{foreach from=$hotFileList item=file}>
                                <li style="list-style: none"></li>
                                <li class="dt-center-li">
                                    <a target="_blank" href="http://www.baiduyunpan.com/article/113033.html"><{$file.fileName}></a>
                                </li>
                                <li style="list-style: none"><{/foreach}>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--推荐-->
                    <div class="ranklist-yp ranklist-yp2" style="height:1020px;">
                        <div class="ranklist-yp-dt">
                            <h2 class="dt-h2">
                                <span class="dt-h2-span dt-h2-span2">最新</span>搜索关键词
                            </h2>
                            <p class="rm-p">
                                <a target="_blank" href="http://www.baiduyunpan.com/new/">更多>;</a>
                            </p>
                        </div>
                        <div class="yp-dt-center" style="height:1020px;line-height:26px;font-size:15px;">
                            <ul>
                                <li style="list-style: none"><{foreach from=$hotSearchList item=search}>;
                                </li>
                                <li class="dt-center-li">
                                    <a target="_blank" href="http://www.baiduyunpan.com/search/%E5%B9%BF%E5%B7%9E%E5%A5%B3%E5%90%8C-0-%E5%85%A8%E9%83%A8-0.html"><{$search.searchWord}>;</a>&nbsp;&nbsp;
                                </li>
                                <li style="list-style: none"><{/foreach}>;
                                </li>
                            </ul>
                        </div>
                    </div><!--右下广告--><!--
 <div class="main-y-img">
  <a title="" target="_blank" href="javascripr:;">
   <img alt="" src="http://www.baiduyunpan.com/images/27.png"/></a>
 </div>
 <div class="main-y-img2">
  <a title="" target="_blank" href="javascripr:;" >
   <img alt="" src="http://www.baiduyunpan.com/images/28.png"/>
   <p class="y-img2-p">决明子</p>
  </a>
  <a title="" target="_blank" href="javascripr:;" style="float:right;">
   <img alt="" src="http://www.baiduyunpan.com/images/29.png"/>
   <p class="y-img2-p">交易</p>
  </a>
  <a title="" target="_blank" href="javascripr:;" >
   <img alt="" src="http://www.baiduyunpan.com/images/30.png"/>
   <p class="y-img2-p">减肥茶减</p>
  </a>
  <a title="" target="_blank" href="javascripr:;" style="float:right;">
   <img alt="" src="http://www.baiduyunpan.com/images/28.png"/>
   <p class="y-img2-p">决明子</p>
  </a>
  <p class="img2-p2">广告</p>
 </div>
 --><!-- 热门文章 --><!-- <div class="main-y-rmyz"> 
      <h2 class="main-y-rmyz-h2"><span class="main-y-rmyz-h2-span">热门文章</span></h2> 
      <div class="main-nr-right"> 
       <ul> 
        <li class="main-nr-right-li"> 
         <div class="main-right-li-img">
          <a href="/article/0.html" target="_blank"><img src="http://www.baiduyunpan.com/0" alt="0" /></a>
         </div> 
         <div class="main-nr-right-y"> 
          <strong class="main-nr-y-strong"><a href="/article/0.html" target="_blank">0</a></strong> 
          <p class="main-right-y-p">0</p> 
          <div class="main-center-div"> 
           <p class="main-right-y-z">网络收集</p> 
           <p class="main-center-div-y">0</p> 
          </div> 
         </div></li> 
       </ul> 
      </div> 
     </div>  -->
                </div>
            </div><!-- 返回顶部 -->
            <div class="fhdb-fixed">
                <a href="#"><img src="http://www.baiduyunpan.com/images/fhdb.png" alt="返回顶部"></a>
            </div><!-- 底部 -->
            <div class="footer">
                <div class="footer-auto">
                    <div class="footer-left">
                        <a title="百度网盘" href="http://www.baiduyunpan.com"><img alt="百度网盘" src="http://www.baiduyunpan.com/images/11.png"></a>
                        <p>
                            最快的百度网盘搜索引擎
                        </p>
                    </div>
                    <div class="footer-center">
                        <div class="footer-center-div">
                            <a href="http://www.baiduyunpan.com">百度云搜索</a> <a href="http://www.baiduyunpan.com/new/">百度云下载</a> <a href="http://www.baiduyunpan.com/movie/">百度云电影</a> <a href="http://www.baiduyunpan.com/users/">百度云会员</a>
                        </div>
                        <div class="footer-center-div2">
                            <p>
                                Copyright&nbsp;©&nbsp;2016-2017 <a href="http://www.baiduyunpan.com/">百度云盘（baiduyunpan.com）</a>All&nbsp;Rights&nbsp;Reserved
                            </p>
                            <p class="div2-p2">
                                湘ICP备13002661号-8 Email:2540054847@qq.com <script src="http://s95.cnzz.com/stat.php?id=1258115369&amp;web_id=1258115369" language="JavaScript" type="text/javascript">
</script>
                            </p>
                        </div>
                        <div style="width:600px;margin: 0 auto;text-align:center; padding-top:4px;">
                            <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=43310102000217" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img src="http://www.baiduyunpan.com/images/gongan.png" style="float:left;"></a>
                            <p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">
                                湘公网安备 43310102000217号
                            </p>
                        </div>
                    </div>
                    <div class="footer-right">
                        <div class="footer-right-div">
                            <p>
                                分享至：
                            </p><a title="微博" href="javascript:trigger_click('tsina');" target="_blank"><img alt="微博" src="http://www.baiduyunpan.com/images/12.png"></a> <a title="微信" href="javascript:trigger_click('weixin');"><img alt="微信" src="http://www.baiduyunpan.com/images/13.png"></a> <a title="QQ空间" href="javascript:trigger_click('qzone');" target="_blank" style="padding-right:0;"><img alt="QQ空间" src="http://www.baiduyunpan.com/images/14.png"></a>
                        </div>
                        <div class="bdsharebuttonbox" style="display:none;">
                            <a id="more" href="#" class="bds_more" data-cmd="more"></a> <a id="qzone" href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a> <a id="tsina" href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a> <a id="tqq" href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a> <a id="weixin" href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a> <a id="renren" href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                        </div><script type="text/javascript">
window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","weixin","renren"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","weixin","renren"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
                        </script>
                    </div>
                </div>
            </div><script language="javascript" type="text/javascript">
function addfavorite(obj,url,title) { 
            !url ? url = location.href : null;
            !title ? title = document.title : null;
            try{   
            window.external.addFavorite(url, title); 
            return false;
            }catch(e){   
            try{   
            window.sidebar.addPanel(title, url, ""); 
            return false;  
            }catch(e){   
            alert("加入收藏失败，请使用Ctrl+D进行添加"); 
            if(location.href.toLowerCase().indexOf(obj.href.toLowerCase(),0)>=0){return false;} 
            }   
            }   
            }
            </script> <script charset="gbk" src="http://www.baidu.com/js/opensug.js" type="text/javascript">
</script> <script type="text/javascript">
var txtObj = document.getElementById("alertSpan");
            //回调函数，用于获取用户当前选择的文字
            function show(str){
            txtObj.innerHTML = str;
            }
            var params = {
            "XOffset":0, //提示框位置横向偏移量,单位px
            "YOffset":10, //提示框位置纵向偏移量,单位px
            "width":326, //提示框宽度，单位px   
            "fontColor":"black", //提示框文字颜色
            "fontColorHI":"#FFF",   //提示框高亮选择时文字颜色
            "fontSize":"15px",      //文字大小
            "fontFamily":"宋体",  //文字字体
            "borderColor":"gray",   //提示框的边框颜色
            "bgcolorHI":"#2B91E3",      //提示框高亮选择的颜色
            "sugSubmit":false       //在选择提示词条是是否提交表单
            };
            BaiduSuggestion.bind("searchbox",params,show);  
            </script>
        </div><script type="text/javascript" src="http://www.baiduyunpan.com/js/jquery_own.js">
</script><script type="text/javascript">
$.setNavStyle('百度云下载');
        </script><!-- i2:1503741837.0278 -->
    </body>
</html>