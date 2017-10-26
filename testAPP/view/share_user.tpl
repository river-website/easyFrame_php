<!doctype html>
<html lang="en">
<head>
    <{include file="head.tpl"}>
    <link rel="stylesheet" type="text/css" href="<{$webSiteInfo.pubSite}>/css/share_user_1.css">
    <link rel="stylesheet" type="text/css" href="<{$webSiteInfo.pubSite}>/css/share_user_2.css">
</head>
<body>
<div class="box">
    <{include file="header.tpl"}>

    <div class="main">
        <h2 class="main-h3">
            当前位置： <a href="<{$webSiteInfo.webSite}>" class="main-h3-a">首页</a> &nbsp;&gt;&nbsp; <a href="<{$menus.user}>" class=" main-h3-a">百度云会员</a> &nbsp;&gt;&nbsp; <span style="color: #2E99EB;"><{$userInfo.userName}>的百度网盘</span>
        </h2>
        <div class="main-center">
            <div class="main-ain">
                <div class="main-center-left">
                    广告
                </div>
                <div class="main-center-right">
                    <h2 class="main-right-h2">
                        <{$userInfo.userName}>分享的百度云资源
                    </h2>
                    <p style="margin-bottom:20px;"><{$userInfo.userUrl}></p>
                    <p class="main-right-p">
                        <img src="<{$userInfo.imgUrl}>">
                    </p>
                    <h6 class="main-right-h6">
                        <a href="" target="_blank"><{$userInfo.userName}> <span>(TA的百度网盘)</span></a>
                    </h6>
                    <ul class="main-right-ul">
                        <li class="x-right-li">分享数：<span><{$userInfo.count}></span>次
                        </li>
                        <li class="x-right-li x-right-li2">更新时间：<span style="color:#888;">2017-07-14 22:04:23</span>
                        </li>
                        <li class="x-right-li">关注数：<span>2</span>
                        </li>
                        <li class="x-right-li x-right-li2">收&nbsp;藏&nbsp;到&nbsp;： <a title="" href="javascript:trigger_click('more');"><img alt="" src="http://www.baiduyunpan.com/images/34.png"></a> <a title="收藏到QQ空间" href="javascript:trigger_click('qzone');"><img alt="收藏到QQ空间" src="http://www.baiduyunpan.com/images/35.png"></a> <a title="收藏到新浪微博" href="javascript:trigger_click('tsina');"><img alt="收藏到新浪微博" src="http://www.baiduyunpan.com/images/36.png"></a> <a title="收藏到人人网" href="javascript:trigger_click('renren');"><img alt="收藏到人人网" src="http://www.baiduyunpan.com/images/37.png"></a> <a title="收藏到腾讯微博" href="javascript:trigger_click('tqq');"><img alt="收藏到腾讯微博" src="http://www.baiduyunpan.com/images/38.png"></a> <a title="收藏到微信" href="javascript:trigger_click('weixin');"><img alt="收藏到微信" src="http://www.baiduyunpan.com/images/39.png"></a>
                        </li>
                        <li class="x-right-li">粉丝数：<span>115</span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-bottom">
                <ul class="main-bottom-ul" id="bottom">
                    <!-- <li class="main-bottom-li main-bottom-li2">
                        <a href="#" id="bottom0">全部</a>
                    </li> -->
                    <{foreach from=$typesList item=suffixs key=type}>
                    <li class="main-bottom-li">
                        <a href="#"><{$type}></a>
                    </li>
                    <{/foreach}>
                </ul>
                <form class="search-bottom">
                    <input type="text" class="input-bottom" name="key" value="" placeholder="搜TA的分享资源"> <input type="submit" value="" class="input-tj"> <i class="input-tj-i"><img src="http://www.baiduyunpan.com/images/49.png"></i>
                </form>
            </div>
        </div>
        <!-- 百度云盘最新资源 -->
        <div class="resource">
            <div class="resource-top">
                <h2 class="resource-h2">
                    <{$userInfo.userName}>全部资源
                </h2>
            </div>
            <div class="resource-center">
                <ul>
                    <li class="resource-conter-li resource-li2">文件名</li>
                    <li class="resource-conter-li resource-li3 li5">百度会员</li>
                    <li class="resource-conter-li li5">文件类型</li>
                    <li class="resource-conter-li resource-li3 li5">文件格式</li>
                    <li class="resource-conter-li li5">网盘</li>
                    <li class="resource-conter-li resource-li5 li5">文件大小</li>
                    <li class="resource-conter-li resource-li5 li5">分享时间</li>
                </ul>
            </div>
            <{foreach from=$userFiles item=file}>
            <div class="resource-centerx">
                <ul>
                    <li class="resource-conter-li resource-li7">
                        <a target="_blank" href="<{$file.fileUrl}>"><{$file.fileName}></a>
                    </li>
                    <li class="resource-conter-li resource-li3 li6"><{$userInfo.userName}><span>|</span>
                    </li>
                    <li class="resource-conter-li li6"><{$file.typeName}><span>|</span>
                    </li>
                    <li class="resource-conter-li resource-li3 li6"><{$file.suffix}><span>|</span>
                    </li>
                    <li class="resource-conter-li li6">
                        <img class="resource-img" src="<{$webSiteInfo.pubSite}>/images/20.png"><span>|</span>
                    </li>
                    <li class="resource-conter-li resource-li5 li6"><{$file.size}>
                    </li>
                    <li class="resource-conter-li resource-li5 li6"><{$file.shareTime}>
                    </li>
                </ul>
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
        </div>
    </div>

    <{include file="footer.tpl"}>
</div>
</body>
</html>