<!doctype html>
<html lang="en">
<head>
    <{include file="head.tpl"}>
    <link rel="stylesheet" type="text/css" href="<{$webSiteInfo.pubSite}>/css/share_user_2.css.css">
    <link rel="stylesheet" type="text/css" href="<{$webSiteInfo.pubSite}>/css/search_1.css.css">
</head>
<body>
<div class="box">
    <{include file="header.tpl"}>

    <!-- 百度云电影 -->
    <div class="main">
        <h2 class="main-h3">
            当前位置： <a href="<{$webSiteInfo.webSite}>" class="main-h3-a">首页</a> &nbsp;&gt;&nbsp; <a class=" main-h3-a2" href="<{$menus.search}>">百度云搜索</a>
        </h2>
        <div class="resource">
            <div class="resource-top">
                <h2 class="resource-h2">
                    <span style="color:green;font-size:15px;"><b style="color:red;"><{$searchInfo.word}></b> 百度云为您找到<b style="color:red;"><{$searchInfo.count}></b>条相关的百度云资源，<b style="color:red;"><{$searchInfo.word}></b>下载将跳转到百度网盘下载。</span>
                </h2>
            </div>
            <div class="resource-center">
                <ul>
                    <li class="resource-conter-li">
                        <a href="#">全部</a>
                    </li>
                    <{foreach from=$typesList item=suffixs key=type}>
                    <li class="resource-conter-li">
                        <a href="#"><{$type}></a>
                    </li>
                    <{/foreach}>
                </ul>
            </div>
            <div style="padding-left:16px;line-height:30px;border-bottom: 1px solid #eee;padding-bottom: 10px;">
                <ul>
                    <li class="resource-conter-li-suffix">
                        <a href="#">全部</a>
                    </li>
                    <{foreach from=$suffixList item=typeName key=suffix}>
                    <li class="resource-conter-li-suffix">
                        <a href="#"><{$suffix}></a>
                    </li>
                    <{/foreach}>

                </ul>
            </div>
            <{foreach from=$searchList item=file}>
            <span style="display:none;">0</span>
            <div class="main-x">
                <div class="main-x-left">
                    <h3 class="x-left-h3">
                        <!--查询字段为空查询结果为空情况的解决-->
                        <a target="_blank" href="<{$file.fileUrl}>"><{$file.fileName}></a>
                    </h3>
                    <ul class="x-left-ul">
                        <li class="x-left-li li-sj">类型：<{$file.typeName}><span>|</span>
                        </li>
                        <li class="x-left-li">格式： <{$file.suffix}> <span>|</span>
                        </li>
                        <li class="x-left-li li-cs">大小：<{$file.size}><span>|</span>
                        </li>
                        <li class="x-left-li">时间：<{$file.shareTime}>
                        </li>
                    </ul>
                </div>
                <div class="main-x-right">
                    <p class="x-right-p x-right-p2">
                        会员：<a href="<{$file.userUrl}>" target="_blank"><{$file.userName}></a>
                    </p>
                    <p class="x-right-p">
                        来源：百度网盘
                    </p>
                </div>
            </div>
            <{/foreach}>
            <!--下一页/1==100.go-->
            <div class="gow">
                <table class='pagesec'>
                    <tr>
                        <td class='prev'><a class='db' href="<{$pages.pre}>">上一页</a></td>
                        <td class="pnum"><a class="ab" href="<{$pages.first.url}>"><{$pages.first.page}></a></td>
                        <td class="pnum"><{$pages.preFix}></td>
                        <{foreach from=$pages.cur item=item}>
                        <td class="pnum"><a class="ab" href="<{$item.url}>"><{$item.page}></a></td>
                        <{/foreach}>
                        <td class="pnum"><{$pages.nextFix}></td>
                        <td class="pnum"><a class="ab" href="<{$pages.last.url}>"><{$pages.last.page}></a></td>
                        <td class='next'><a class='ab' href="<{$pages.next}>">下一页</a></td>
                    </tr>
                </table>
            </div>
            <!--底部广告-->

            <div class="main-images">
                广告
            </div>

        </div>
        <!-- 右  -->
        <div class="main-right">
            <!--动态-->
            <div class="ranklist-yp">
                <div class="ranklist-yp-dt">
                    <h2 class="dt-h2">
                        <span class="dt-h2-span">动态</span>百度云盘
                    </h2>
                </div>
                <div class="yp-dt-center">
                    <ul>
                        <{foreach from=$hotFileList item=file}>
                        <li class="dt-center-li">
                            <a target="_blank" href="<{$file.fileUrl}>"><{$file.fileName}></a>
                        </li>
                        <{/foreach}>
                    </ul>
                </div>
            </div>
            <!--推荐-->
            <div class="ranklist-yp ranklist-yp2" style="height:1020px;">
                <div class="ranklist-yp-dt">
                    <h2 class="dt-h2">
                        <span class="dt-h2-span dt-h2-span2">最新</span>搜索关键词
                    </h2>
                </div>
                <div class="yp-dt-center" style="height:1020px;line-height:26px;font-size:15px;">
                    <ul>
                        <{foreach from=$hotSearchList item=search}>
                        <li class="dt-center-li">
                            <a target="_blank" href="<{$search.searchUrl}>-1"><{$search.word}></a>&nbsp;&nbsp;
                        </li>
                        <{/foreach}>
                    </ul>
                </div>
            </div>
            <!--右下广告-->

            <div class="main-y-img">
                广告
            </div>
            <div class="main-y-img2">
                广告
            </div>
        </div>
    </div>

    <{include file="footer.tpl"}>
</div>
</body>
</html>