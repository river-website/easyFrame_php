<!doctype html>
<html lang="en">
<head>
    <{include file="head.tpl"}>
    <link rel="stylesheet" type="text/css" href="http://www.baiduyunpan.com/css/baiduyunpan-bjtp.css">
    <link rel="stylesheet" type="text/css" href="http://www.baiduyunpan.com/css/baiduyunpan-sy.css">
</head>
<body>
<div class="box">

    <div class="top">
        <div class="top-auto">
            <p class="top-left">
                百度云盘（<a href="javascript:;">baiduyunpan.com</a>）,是百度云搜索和百度网盘搜索引擎的官网，千万级的百度云资源下载，最好用的百度云搜索引擎！
            </p>
            <p class="top-right">
                <span onclick="javascript:trigger_click('more');" class="top-right-fx top-fx2">分享</span>
                <span onclick="addfavorite(this,'http://www.baiduyunpan.com/','资源下载_资源搜索和资源下载的官网，千万级的资源资源分享吧，搜索资源下载资源的百度网盘搜索引擎！');" class="top-right-sc">收藏</span>
                <span onclick="javascript:window.open('http://www.baiduyunpan.com/app/');" class="top-right-sm">移动客户端</span>
            </p>
        </div>
    </div>

    <!--搜索  -->
    <div class="search">
        <span id="search_init" style="display:none;">0</span>
        <span id="search_suffix" style="display:none;">全部</span>
        <div class="search-auto">
            <h2 class="search-left">
                <a title="百度云盘" href="http://www.baiduyunpan.com">
                    <img alt="百度云盘" src="http://www.baiduyunpan.com/images/logo.png"/></a>
            </h2>
            <div class="search-center">

            </div>
        </div>
    </div>

    <!-- 导航 nav -->
    <div class="nav">
        <div class="nav-auto">
            <ul class="nav-ul">
                <li class="nav-li"><a href="http://www.baiduyunpan.com/">百度云搜索</a>
                </li>
                <li class="nav-li"><a href="http://www.baiduyunpan.com/new/">百度云下载</a>
                </li>
                <li class="nav-li"><a href="http://www.baiduyunpan.com/movie/">百度云电影</a>
                </li>
                <li class="nav-li"><a href="http://www.baiduyunpan.com/users/">百度云会员</a>
                </li>
                <li class="nav-li"><a href="http://www.baiduyunpan.com/articlelist/">百度云资源</a>
                </li>
                <li class="nav-li"><a href="http://www.baiduyunpan.com/album/">百度云专辑</a>
                </li>
            </ul>
            <div class="nav-right">
                <a href="javascript:trigger_click('more');" class="nav-right-a">分享本站</a>
                <a href="javascript:addfavorite(this,'http://www.baiduyunpan.com/','百度云盘_百度云搜索和百度云下载的官网，千万级的百度云资源下载，最快的百度网盘搜索引擎！');" class="nav-right-a nav-right-a2">收藏本站</a>
                <a href="javascript:window.open('http://www.baiduyunpan.com/app/');" class="nav-right-a nav-right-a3">移动端</a>
            </div>
        </div>
    </div>

    <!-- 图片轮播广告 -->
    <div class="ad">
        <ul>
            <li class="ad-li">
                <img alt src="http://www.baiduyunpan.com/images/30.jpg" />
                <a target="_blank" href="javascripr:;" class="ad-a">￥2100.00/3100.00</a>
            </li>
        </ul>
    </div>

    <div class="search" style="margin-top:10px;">
        <span id="search_init" style="display:none;">0</span>
        <span id="search_suffix" style="display:none;">全部</span>
        <div class="search-auto">
            <div class="search-wrap">
                <a href="#" class="search-wrap-a">全部</a>
                <{foreach from=$typesList item=suffixs key=type}>
                <a href="#" class="search-wrap-a"><{$type}></a>
                <{/foreach}>
            </div>
            <form id="form1" class="search_form">
                <input type="text" id="searchbox" value="" class="form-key" name="key" onkeypress="if(event.keyCode==13) {searchyun();return false;}" placeholder="共27713995个资源，今日已更新353456" />
                <input type="button" onclick="searchyun();" value class="form-ss" />
                <i class="form-i"><img src="http://www.baiduyunpan.com/images/1.png" onclick="searchyun()" /></i>
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
                <script type="text/javascript" src="http://cpro.baidustatic.com/cpro/ui/c.js"></script>
            </div>
            <span>今日搜索：</span>
            <a target="_blank" href="/search/江苏省硬笔书法考试(45)-0-全部-0.html">江苏省硬笔书法考试(45)</a>   &nbsp;

            <a target="_blank" href="http://www.baiduyunpan.com/searchhot/0.html"><b>更多热门搜索...</b></a>
        </div>

    </div>

    <!--热门、推荐、动态 -->
    <div class="ranklist">
        <div class="ranklist-left">
            <div class="ranklist-left-rm">
                <h2 class="rm-h2">
                    <span class="rm-h2-span">热门</span>资源搜索</h2>
                <p class="rm-p">
                    <a href="http://www.baiduyunpan.com/searchhot/0.html" target="_blank">更多></a></p>
            </div>
            <div class="left-rm-center">
                <ul>
                    <span style="display:none;">0</span>
                    <li class="rm-center-li">
                        <span class="center-li-span">1</span>
                        <a target="_blank" href="http://www.baiduyunpan.com/search/Wildes.Japan-0-全部-0.html">Wildes.Japan</a></li>
                </ul>
            </div>
        </div>
        <div class="ranklist-xz">
            <div class="ranklist-xz-tj">
                <h2 class="tj-h2">
                    <span class="tj-h2-span">推荐</span>资源下载</h2>
                <p class="rm-p">
                    <a target="_blank" href="http://www.baiduyunpan.com/searchkeyhot/0.html">更多></a></p>
            </div>
            <div class="xz-tj-center">
                <ul>
                    <li class="tj-center-li">
                        <a target="_blank" href="http://www.baiduyunpan.com/search/表情奇幻冒险-0-全部-0.html">表情奇幻冒险</a></li>
                </ul>
            </div>
        </div>
        <!--动态-->
        <div class="ranklist-yp">
            <div class="ranklist-yp-dt">
                <h2 class="dt-h2">
                    <span class="dt-h2-span">动态</span>百度云盘</h2>
                <p class="rm-p">
                    <a target="_blank" href="http://www.baiduyunpan.com/articlelist/">更多></a></p>
            </div>
            <div class="yp-dt-center">
                <ul>
                    <li class="dt-center-li">
                        <a target="_blank" href="http://www.baiduyunpan.com/article/113033.html">中华苏维埃共和国壹圆市场价值最新行情多少</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- 图片轮播广告 -->
    <!-- <div class="ad">
    <ul>
    <li class="ad-li">
    <img alt src="http://www.baiduyunpan.com/images/30.jpg"/>
    <a target="_blank" href="javascripr:;" class="ad-a">￥2100.00/3100.00</a></li>
    </ul>
    </div>
    -->
    <!-- 百度云最新热门专题 -->
    <!-- <div class="member zxrmzt">
    <div class="member-top">
    <h2 class="member-h2 zxrmzt-h2">百度云最新热门专题</h2>
    <p class="rm-p"><a target="_blank" href="http://www.baiduyunpan.com/ztlist/1.html">更多></a></p></div>
    <div class="zxrmzt-div">
    <a href="http://www.baiduyunpan.com/zt/表情奇幻冒险-表情奇幻冒险.html" class="zxrmzt-a" target="_blank">表情奇幻冒险</a></div>
    <div class="cnxh"><p class="cnxh-p">猜你喜欢</p></div></div>
    -->
    <!-- 百度云会员 -->
    <div class="member">
        <div class="member-top">
            <h2 class="member-h2">百度云会员</h2>
            <p class="rm-p">
                <a target="_blank" href="http://www.baiduyunpan.com/users/">更多></a></p>
        </div>
        <div class="member-img">
            <ul>
                <li class="member-img-li">
                    <a target="_blank" href="http://www.baiduyunpan.com/user/3826276867-0-0.html">
                        <img alt="zouzou313414" src="http://himg.bdimg.com/sys/portrait/item/14e4dc14.jpg" /></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- 百度云下载最新资源 -->
    <div class="resource">
        <div class="resource-top">
            <h2 class="resource-h2">百度云盘最新资源</h2>
            <p class="rm-p">
                <a target="_blank" href="http://www.baiduyunpan.com/new/">更多></a></p>
        </div>
        <div class="resource-center">
            <ul>
                <li class="resource-conter-li resource-li2">分享名称</li>
                <li class="resource-conter-li resource-li3  li5">分享时间</li>
                <li class="resource-conter-li  li5">文件大小</li>
                <li class="resource-conter-li resource-li3  li5">下载次数</li>
                <li class="resource-conter-li  li5">网盘</li>
                <li class="resource-conter-li resource-li5  li5">分享者</li></ul>
        </div>
        <div class="resource-centerx">
            <ul>
                <li class="resource-conter-li resource-li7">
                    <i class="resource-i resource-sub"></i>
                    <a target="_blank" href="http://www.baiduyunpan.com/file/28062240.html">E03</a></li>
                <li class="resource-conter-li resource-li3 li6">
                    <label></label>2017-07-20
                    <span>|</span></li>
                <li class="resource-conter-li li6">未知
                    <span>|</span></li>
                <li class="resource-conter-li resource-li3 li6">2348次
                    <span>|</span></li>
                <li class="resource-conter-li li6">
                    <img class="resource-img" src="http://www.baiduyunpan.com/images/20.png" alt="百度云下载" />
                    <span>|</span></li>
                <li class="resource-conter-li resource-li5 li6">
                    <a href="http://www.baiduyunpan.com/user/1687121265-0-0.html" target="_blank">分段函函数</a></li>
            </ul>
        </div>
    </div>
    <div class="gow">
        <table class='pagesec'>
            <tr>
                <td class='rd'>
                    <span>第1/30000页</span></td>
                <td class='prev'>
                    <a class='db'>上一页</a></td>
                <td class='psec'></td>
                <td class='pnum'>
                    <a class='sel'>1</a></td>
                <td class='pnum'>
                    <a class='ab' href='/search/-0-全部-2.html'>2</a></td>
                <td class='pnum'>
                    <a class='ab' href='/search/-0-全部-3.html'>3</a></td>
                <td class='pnum'>
                    <a class='ab' href='/search/-0-全部-4.html'>4</a></td>
                <td class='pnum'>
                    <a class='ab' href='/search/-0-全部-5.html'>5</a></td>
                <td class='pnum'>
                    <a class='ab' href='/search/-0-全部-6.html'>6</a></td>
                <td class='pnum'>
                    <a class='ab' href='/search/-0-全部-7.html'>7</a></td>
                <td class='pnum'>
                    <a class='ab' href='/search/-0-全部-8.html'>8</a></td>
                <td class='pnum'>
                    <a class='ab' href='/search/-0-全部-9.html'>9</a></td>
                <td class='pnum'>
                    <a class='ab' href='/search/-0-全部-10.html'>10</a></td>
                <td class='pnum'>
                    <a class='ab' href='/search/-0-全部-11.html'>11</a></td>
                <td class='pnum'>
                    <a class='ab' href='/search/-0-全部-12.html'>12</a></td>
                <td class='pnum'>
                    <a class='ab' href='/search/-0-全部-13.html'>13</a></td>
                <td class='pnum'>
                    <a class='ab' href='/search/-0-全部-14.html'>14</a></td>
                <td class='pnum'>
                    <a class='ab' href='/search/-0-全部-15.html'>15</a></td>
                <td class='nsec'></td>
                <td class='next'>
                    <a class='ab' href='/search/-0-全部-2.html'>下一页</a></td>
                <td class='jmp'></td>
            </tr>
        </table>
    </div>
    <!--底部广告-->
    <!-- <div class="search-images resource-imsges">
    <a title="" target="_blank" href="javascripr:;">
    <img alt="" src="http://www.baiduyunpan.com/images/25.png"/></a></div>
    -->

    <!-- 百度云使用技巧 -->
    <div class="member syjq">
        <div class="member-top">
            <h2 class="member-h2 syjq-h2">百度云使用技巧</h2></div>
        <div class="stjq-div">
            <div class="stjq-left">
                <ul>
                    <li class="stjq-left-li">
                        <a target="_blank" href="http://www.baiduyunpan.com/file/27487497.html">百度云网盘使用教程.pdf</a></li>
                </ul>
            </div>
            <div class="stjq-left">
                <ul>
                    <li class="stjq-left-li">
                        <a target="_blank" href="http://www.baiduyunpan.com/file/27016275.html">百度云盘使用教程.docx</a></li>
                </ul>
            </div>
            <div class="stjq-left">
                <ul>
                    <li class="stjq-left-li">
                        <a target="_blank" href="http://www.baiduyunpan.com/file/27209810.html">如何使用百度云.docx</a></li>
                </ul>
            </div>
        </div>
    </div>

    <{include file="footer.tpl"}>
</div>
</body>
</html>