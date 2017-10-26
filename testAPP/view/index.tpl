<!doctype html>
<html lang="en">
<head>
    <{include file="head.tpl"}>
    <link rel="stylesheet" type="text/css" href="<{$webSiteInfo.pubSite}>/css/share_user_1.css">
    <link rel="stylesheet" type="text/css" href="<{$webSiteInfo.pubSite}>/css/sy.css">
</head>
<body>
<div class="box">

    <div class="top">
        <div class="top-auto">
            <p class="top-left">
                <{$webSiteInfo.logoTitle}>（<a href="#"><{$webSiteInfo.webSite}></a>）,是百度搜索和百度网盘搜索引擎的官网，千万级的百度云资源下载，最好用的百度云搜索引擎！
            </p>
            <p class="top-right">
                <span onclick="trigger_click('more')" class="top-right-fx top-fx2">分享</span>
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
                广告
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
                <i class="form-i"><img src="<{$webSiteInfo.pubSite}>/images/searchhui.png" id="indextest" onclick="searchyun();" data-bd-imgshare-binded="1"></i>
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
        <div class="search-images" style="padding:10px 0;">
            <div style="text-align:center;margin-bottom:5px;">

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