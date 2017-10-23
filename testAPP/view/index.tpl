<!doctype html>
<html lang="en">
<head>
    <{include file="head.tpl"}>
    <link rel="stylesheet" type="text/css" href="http://www.<{$webSiteInfo.pubSite}>unpan.com/css/<{$webSiteInfo.pubSite}>unpan-bjtp.css">
    <link rel="stylesheet" type="text/css" href="http://www.<{$webSiteInfo.pubSite}>unpan.com/css/<{$webSiteInfo.pubSite}>unpan-sy.css">
</head>
<body>
<div class="box">

    <div class="top">
        <div class="top-auto">
            <p class="top-left">
                <{$webSiteInfo.logoTitle}>（<a href="javascript:;"><{$webSiteInfo.webSite}></a>）,是百度搜索和百度网盘搜索引擎的官网，千万级的百度云资源下载，最好用的百度云搜索引擎！
            </p>
            <p class="top-right">
                <span onclick="javascript:trigger_click('more');" class="top-right-fx top-fx2">分享</span>
                <span onclick="addfavorite(this,'<{$webSiteInfo.webSite}>','资源下载_资源搜索和资源下载的官网，千万级的资源资源分享吧，搜索资源下载资源的百度网盘搜索引擎！');" class="top-right-sc">收藏</span>
            </p>
        </div>
    </div>

    <div class="header">
        <div class="header-auto">
            <h2 class="header-left">
                <a title="百度云下载" href="<{$webSiteInfo.webSite}>">
                    <img alt="百度云下载" src="<{$webSiteInfo.logoImg}>" data-bd-imgshare-binded="1"></a>
            </h2>
            <div class="header-right">

                <!-- 广告隐藏
                 <script type="text/javascript">
                    /*首页头部*/
                    var cpro_id = "u3020870";
                </script>
                <div style="margin-left:400px;float:left;">
                <script type="text/javascript" src="http://cpro.baidustatic.com/cpro/ui/c.js"></script>
                </div>
                  -->
                <ul class="bdyp-sygg-ul">

                </ul>
            </div>
        </div>
    </div>
    <!-- 导航 nav -->
    <div class="nav">
        <div class="nav-auto">
            <ul>
                <li class="nav-li"><a href="<{$menus.search}>">百度云搜索</a></li>
                <li class="nav-li"><a href="<{$menus.file}>">百度云资源</a></li>
                <li class="nav-li"><a href="<{$menus.user}>">百度云会员</a></li>
            </ul>
        </div>
    </div>
    <!-- 图片轮播广告 -->
    <!-- <div class="ad">
    <ul>
     <li class="ad-li">
      <img alt src="http://www.<{$webSiteInfo.pubSite}>unpan.com/images/30.jpg"/>
      <a target="_blank" href="javascripr:;" class="ad-a">￥2100.00/3100.00</a>
     </li>
   </ul>
    </div>
    -->

    <!--搜索  -->
    <div class="search" style="margin-top:10px;">
        <div class="search-auto">
            <div class="search-wrap">
                <a href="#" class="search-wrap-a wrap-a2">全部</a>
                <{foreach from=$typesList item=suffixs key=type}>
                <a href="#" class="search-wrap-a"><{$type}></a>
                <{/foreach}>
            </div>

            <form id="form1" class="search_form">
                <input type="text" id="searchbox" class="form-key" name="key" onkeypress="if(event.keyCode==13) {searchyun();return false;}" placeholder="共27724631个资源，今日已更新839423" autocomplete="off">
                <input type="button" onclick="searchyun();" value="" class="form-ss">
                <i class="form-i"><img src="<{$webSiteInfo.pubSite}>/images/1.png" id="indextest" onclick="searchyun();" data-bd-imgshare-binded="1"></i>
            </form>

            <div class="search_info">
                <a href="javascripr:;" class="search-info-a">百度云下载已收录
                    <span>2772万</span>个百度云资源</a>
                <span class="info-span">|</span>
                <a href="javascripr:;" class="search-info-a">使用百度云搜索<span>3.7亿</span>次</a>
                <span class="info-span">|</span>
                <a href="javascripr:;" class="search-info-a">总下载次数&gt;<span>7.73亿</span>次</a>
            </div>
        </div>
        <!--
         <div class="search-right">
         <a href="javascript:;" class="search-right-a">点击支持我们</a>
         <a href="javascript:;" class="search-right-a search-right-a2">提建议给我们</a>
         </div>
        -->
        <div class="search-images" style="padding:10px 0;">
            <div style="text-align:center;margin-bottom:5px;">
                <script type="text/javascript">
                    /*首页搜索框下面*/
                    var cpro_id = "u3020850";
                </script>
                <script type="text/javascript" src="http://cpro.baidustatic.com/cpro/ui/c.js"></script><div id="BAIDU_SSP__wrapper_u3020850_0"><iframe id="iframeu3020850_0" name="iframeu3020850_0" src="http://pos.baidu.com/xctm?rdid=3020850&amp;dc=3&amp;di=u3020850&amp;dri=0&amp;dis=0&amp;dai=1&amp;ps=453x410&amp;dcb=___adblockplus&amp;dtm=HTML_POST&amp;dvi=0.0&amp;dci=-1&amp;dpt=none&amp;tsr=0&amp;tpr=1506315235832&amp;ti=%E7%99%BE%E5%BA%A6%E4%BA%91%E7%9B%98_%E7%99%BE%E5%BA%A6%E4%BA%91%E6%90%9C%E7%B4%A2%2C%E7%BD%91%E7%9B%98%E6%90%9C%E7%B4%A2%2C%E7%99%BE%E5%BA%A6%E4%BA%91%E8%B5%84%E6%BA%90%2C%E7%99%BE%E5%BA%A6%E7%BD%91%E7%9B%98%E6%90%9C%E7%B4%A2%E5%BC%95%E6%93%8E!&amp;ari=2&amp;dbv=2&amp;drs=1&amp;pcs=1920x974&amp;pss=1920x604&amp;cfv=0&amp;cpl=4&amp;chi=4&amp;cce=true&amp;cec=UTF-8&amp;tlm=1506315235&amp;rw=974&amp;ltu=http%3A%2F%2Fwww.<{$webSiteInfo.pubSite}>unpan.com%2F&amp;ltr=http%3A%2F%2F39.108.148.255%2Findex.php%2Fpc%2Findex&amp;ecd=1&amp;uc=1920x1040&amp;pis=-1x-1&amp;sr=1920x1080&amp;tcn=1506315236&amp;qn=1ccdad96e4b49dab&amp;tt=1506315235804.31.31.33" width="640" height="60" align="center,center" vspace="0" hspace="0" marginwidth="0" marginheight="0" scrolling="no" frameborder="0" style="border:0;vertical-align:bottom;margin:0;width:640px;height:60px" allowtransparency="true"></iframe></div>
            </div>
            <span>今日搜索：</span>
            <{foreach from=$todySearchList item=search}>
            <a target="_blank" href="<{$search.searchUrl}>"><{$search.searchWord}></a>   &nbsp;
            <{/foreach}>
            <a target="_blank" href="<{$menus.search}>"><b>更多热门搜索...</b></a>
        </div>

    </div>

    <!--热门、推荐、动态  -->

    <div class="ranklist">
        <div class="ranklist-left">
            <div class="ranklist-left-rm">
                <h2 class="rm-h2"><span class="rm-h2-span">热门</span>资源搜索</h2>
                <p class="rm-p"><a href="<{$menus.search}>" target="_blank">更多&gt;</a></p>
            </div>
            <div class="left-rm-center">
                <ul>
                    <{foreach from=$hotSearchList item=search}>
                    <li class="rm-center-li">
                        <span class="center-li-span">1</span>
                        <a target="_blank" href="<{$search.searchUrl}>"><{$search.searchWord}></a>
                    </li>
                    <{/foreach}>
                </ul>
            </div>
        </div>

        <div class="ranklist-xz">
            <div class="ranklist-xz-tj">
                <h2 class="tj-h2"><span class="tj-h2-span">推荐</span>资源下载</h2>

                <p class="rm-p"><a target="_blank" href="<{$menus.fil}>">更多&gt;</a></p>
            </div>
            <{foreach from=$hotFileList item=file}>
            <div class="xz-tj-center">
                <ul>
                    <li class="tj-center-li">
                        <a target="_blank" href="<{$file.fileUrl}>"><{$file.fileName}></a>
                    </li>
                </ul>
            </div>
            <{/foreach}>
        </div>
        <!--动态-->
        <div class="ranklist-yp">
            <div class="ranklist-yp-dt">
                <h2 class="dt-h2"><span class="dt-h2-span">动态</span>百度云盘</h2>
                <p class="rm-p"><a target="_blank" href="http://www.<{$webSiteInfo.pubSite}>unpan.com/articlelist/">更多&gt;</a></p>
            </div>
            <div class="yp-dt-center">
                <ul>

                    <li class="dt-center-li">
                        <a target="_blank" href="http://www.<{$webSiteInfo.pubSite}>unpan.com/article/113034.html">【第432期】中国历史故事——老师中的老师（第3册）</a>

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- 图片轮播广告 -->
    <!-- <div class="ad">
     <ul>
      <li class="ad-li">
       <img alt src="http://www.<{$webSiteInfo.pubSite}>unpan.com/images/30.jpg"/>
       <a target="_blank" href="javascripr:;" class="ad-a">￥2100.00/3100.00</a>
      </li>
    </ul>
     </div>
     -->

    <!-- 百度云最新热门专题 -->
    <!--
     <div class="member zxrmzt" >
     <div class="member-top">
      <h2 class="member-h2 zxrmzt-h2">百度云最新热门专题</h2>
      <p class="rm-p"><a target="_blank" href="http://www.<{$webSiteInfo.pubSite}>unpan.com/ztlist/1.html">更多></a></p>
     </div>
     <div class="zxrmzt-div">
       <a href="http://www.<{$webSiteInfo.pubSite}>unpan.com/zt/三浦展-三浦展.html" class="zxrmzt-a" target="_blank">三浦展</a>
     </div>
     <div class="cnxh"><p class="cnxh-p">猜你喜欢</p></div>
     </div>
    -->
    <!-- 百度云会员 -->
    <div class="member">
        <div class="member-top">
            <h2 class="member-h2">百度云会员</h2>
            <p class="rm-p"><a target="_blank" href="<{$menus.user}>">更多&gt;</a></p>
        </div>
        <div class="member-img">
            <ul>
                <div class="xz-tj-center">
                    <ul>
                        <{foreach from=$hotUserList item=user}>
                        <li class="member-img-li">
                            <a target="_blank" href="<{$user.userUrl}>">
                                <img alt="zouzou313414" src="<{$user.imgUrl}>" data-bd-imgshare-binded="1"></a>
                        </li>
                        <{/foreach}>
                    </ul>
                </div>
            </ul>
        </div>
    </div>
    <!-- 百度云下载最新资源 -->
    <div class="resource">
        <div class="resource-top">
            <h2 class="resource-h2">百度云盘最新资源</h2>
            <p class="rm-p"><a target="_blank" href="<{$menus.file}>">更多&gt;</a></p>
        </div>
        <div class="resource-center">
            <ul>
                <li class="resource-conter-li resource-li2">分享名称</li>
                <li class="resource-conter-li resource-li3  li5">分享时间</li>
                <li class="resource-conter-li  li5">文件大小</li>
                <li class="resource-conter-li resource-li3  li5">下载次数</li>
                <li class="resource-conter-li  li5">网盘</li>
                <li class="resource-conter-li resource-li5  li5">分享者</li>
            </ul>
        </div>
        <{foreach from=$newFileList item=file}>
        <div class="resource-centerx">
            <ul>
                <li class="resource-conter-li resource-li7">
                    <i class="resource-i resource-yp"></i>
                    <a target="_blank" href="<{$file.fileUrl}>"><{$file.fileName}></a>
                </li>
                <li class="resource-conter-li resource-li3 li6"><label></label><{$file.shareTime}><span>|</span></li>
                <li class="resource-conter-li li6">
                    <{$file.size}>
                    <span>|</span></li>
                <li class="resource-conter-li resource-li3 li6">999次<span>|</span></li>
                <li class="resource-conter-li li6"><img class="resource-img" src="http://www.<{$webSiteInfo.pubSite}>unpan.com/images/20.png" alt="百度云下载" data-bd-imgshare-binded="1"><span>|</span></li>
                <li class="resource-conter-li resource-li5 li6"><a href="<{$file.userUrl}>" target="_blank"><{$file.userName}></a></li>
            </ul>
        </div>
        <{/foreach}>
        <div class="gow">
            <table class="pagesec">
                <tbody><tr><td class="rd"><span>第1/30000页</span></td><td class="prev"><a class="db">上一页</a></td>
                    <td class="psec"></td>
                    <td class="pnum"><a class="sel">1</a></td><td class="pnum"><a class="ab" href="/search/-0-全部-2.html">2</a></td><td class="pnum"><a class="ab" href="/search/-0-全部-3.html">3</a></td><td class="pnum"><a class="ab" href="/search/-0-全部-4.html">4</a></td><td class="pnum"><a class="ab" href="/search/-0-全部-5.html">5</a></td><td class="pnum"><a class="ab" href="/search/-0-全部-6.html">6</a></td><td class="pnum"><a class="ab" href="/search/-0-全部-7.html">7</a></td><td class="pnum"><a class="ab" href="/search/-0-全部-8.html">8</a></td><td class="pnum"><a class="ab" href="/search/-0-全部-9.html">9</a></td><td class="pnum"><a class="ab" href="/search/-0-全部-10.html">10</a></td><td class="pnum"><a class="ab" href="/search/-0-全部-11.html">11</a></td><td class="pnum"><a class="ab" href="/search/-0-全部-12.html">12</a></td><td class="pnum"><a class="ab" href="/search/-0-全部-13.html">13</a></td><td class="pnum"><a class="ab" href="/search/-0-全部-14.html">14</a></td><td class="pnum"><a class="ab" href="/search/-0-全部-15.html">15</a></td>
                    <td class="nsec"></td>
                    <td class="next"><a class="ab" href="/search/-0-全部-2.html">下一页</a></td><td class="jmp"></td></tr></tbody></table>
        </div>
        <!--底部广告-->
        <!--
       <div class="search-images resource-imsges">
         <a title="" target="_blank" href="javascripr:;">
          <img alt="" src="http://www.<{$webSiteInfo.pubSite}>unpan.com/images/25.png"/></a>
        </div>
        -->
    </div>


    <!-- 百度云使用技巧 -->
    <div class="member syjq">
        <div class="member-top">
            <h2 class="member-h2 syjq-h2">百度云使用技巧</h2>
        </div>
        <div class="stjq-div">
            <div class="stjq-left">
                <ul>
                    <li class="stjq-left-li">
                        <a target="_blank" href="http://www.<{$webSiteInfo.pubSite}>unpan.com/file/27487497.html">百度云网盘使用教程.pdf</a>
                    </li>
                </ul>
            </div>
            <div class="stjq-left">
                <ul>
                    <li class="stjq-left-li">
                        <a target="_blank" href="http://www.<{$webSiteInfo.pubSite}>unpan.com/file/27016275.html">百度云盘使用教程.docx</a>
                    </li>
                </ul>
            </div>

            <div class="stjq-left">
                <ul>
                    <li class="stjq-left-li">
                        <a target="_blank" href="http://www.<{$webSiteInfo.pubSite}>unpan.com/file/27209810.html">如何使用百度云.docx</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <{include file="footer.tpl"}>
</div>
</body>
</html>