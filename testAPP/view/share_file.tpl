<!doctype html>
<html lang="en">
<head>
    <{include file="head.tpl"}>
    <link rel="stylesheet" type="text/css" href="<{$webSiteInfo.pubSite}>/css/baiduyunpan-xz.css">
</head>
<body>
<div class="box">
    <{include file="header.tpl"}>

    <!-- main -->
    <div class="main">
        <h2 class="main-h3">
            当前位置：<a href="<{$webSiteInfo.webSite}>" class="main-h3-a">首页</a>&#160;>&#160; <a href="<{$menus.file}>" class=" main-h3-a2">百度云资源</a>
        </h2>
        <div class="resource">
            <div class="resource-center">
                <h2 class="resource-h2"><{$fileInfo.fileName}></h2>
            </div>
            <div class="main-x">
                <div class="main-x-left">
                    <!-- 图片轮播广告 -->
                    <script type="text/javascript">
                        var cpro_id = "u3021509";
                    </script>
                    <script type="text/javascript" src="http://cpro.baidustatic.com/cpro/ui/c.js"></script>
                </div>
                <div class="main-x-right">
                    <!-- 文件信息 -->
                    <ul>
                        <li class="x-right-li">
                            百度云会员：<a href="<{$userInfo.userUrl}>" target="_blank" class="x-right-li-a"><{$userInfo.userName}></a>
                        </li>
                        <li class="x-right-li">
                            收录时间：<span><{$fileInfo.shareTime}></span>
                        </li>
                        <li class="x-right-li">
                            文件大小：<span><{$fileInfo.size}></span>

                        </li>
                        <li class="x-right-li">
                            网&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#160;&#160;盘：<span>百度云盘</span>
                        </li>
                        <li class="x-right-li">
                            文件格式：<span><{$fileInfo.suffix}></span>
                        </li>
                        <li class="x-right-li">
                            文件类型：<span><{$fileInfo.typeName}></span>
                        </li>
                        <!-- 分享 -->
                        <li class="x-right-li x-right-li2">
                            收&nbsp;藏&nbsp;到&nbsp;：
                            <a title="" href="javascript:trigger_click('more');">
                                <img alt="" src="<{$webSiteInfo.pubSite}>/images/34.png" />
                            </a>
                            <a title="收藏到QQ空间" href="javascript:trigger_click('qzone');">
                                <img alt="收藏到QQ空间" src="<{$webSiteInfo.pubSite}>/images/35.png" />
                            </a>
                            <a title="收藏到新浪微博" href="javascript:trigger_click('tsina');">
                                <img alt="收藏到新浪微博" src="<{$webSiteInfo.pubSite}>/images/36.png" />
                            </a>
                            <a title="收藏到人人网" href="javascript:trigger_click('renren');">
                                <img alt="收藏到人人网" src="<{$webSiteInfo.pubSite}>/images/37.png" />
                            </a>
                            <a title="收藏到腾讯微博" href="javascript:trigger_click('tqq');">
                                <img alt="收藏到腾讯微博" src="<{$webSiteInfo.pubSite}>/images/38.png" />
                            </a>
                            <a title="收藏到微信" href="javascript:trigger_click('weixin');">
                                <img alt="收藏到微信" src="<{$webSiteInfo.pubSite}>/images/39.png" />
                            </a>
                        </li>
                    </ul>
                    <div class="main-xzfx">
                        <a href="<{$fileInfo.url}>" class="main-xzfx-a" target="_blank">进入百度资源</a>
                        <a href="<{$userInfo.userUrl}>" class="main-xzfx-a main-xzfx-a2" target="_">查看TA的相关资源</a>
                    </div>
                    <!-- 广告 -->
                    <script type="text/javascript">
                        var cpro_id = "u3021533";
                    </script>
                    <script type="text/javascript" src="http://cpro.baidustatic.com/cpro/ui/c.js"></script>
                </div>
            </div>
            <div class="main-x main-x2" style="height:400px;margin-bottom:15px;">
                <div class="main-x-left2" style="height:400px;">
                    <!-- 广告 -->
                    <script type="text/javascript">
                        var cpro_id = "u3021516";
                    </script>
                    <script type="text/javascript" src="http://cpro.baidustatic.com/cpro/ui/c.js"></script>
                </div>
                <div class="main-x-right main-x-right2" style="height:400px;">
                    <h2 class="main-x-right-h2">百度云盘相关资源</h2>
                    <ul>
                        <{foreach from=$likeFiles item=file}>
                        <li class="x-right-li3">
                            <a target="_blank" href="<{$file.fileUrl}>"><{$file.fileName}></a>
                        </li>
                        <{/foreach}>
                    </ul>
                </div>
            </div>
            <!-- 热门用户-->
            <div class="main-auto">
                <h2 class="main-bt-h2"><i class="bt-i"></i>热门用户</h2>
                <div class="maina-rmwz-div">
                    <div class="maina-nr-right">
                        <ul>
                            <{foreach from=$hotUserList item=user}>
                            <li class="maina-nr-right-li">
                                <div class="maina-right-li-img">
                                    <a href="<{$user.userUrl}>" target="_blank">
                                        <img src="<{$user.imgUrl}>" alt="<{$user.userName}>" />
                                    </a>
                                </div>
                                <strong class="maina-nr-y-strong"><a href="<{$user.userUrl}>" target="_blank"><{$user.userName}></a></strong>
                            </li>
                            <{/foreach}>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- 热门文件-->
            <div class="main-auto">
                <h2 class="main-bt-h2"><i class="bt-i"></i>热门资源</h2>
                <div class="maina-rmwz-div">
                    <div class="maina-nr-right">
                        <ul>
                            <{foreach from=$hotFileList item=file}>
                            <li class="maina-nr-right-li">
                                <div class="maina-right-li-img">
                                    <a href="<{$file.fileUrl}>" target="_blank">
                                        <img src="" alt="<{$file.fileName}>" />
                                    </a>
                                </div>
                                <strong class="maina-nr-y-strong"><a href="<{$file.fileUrl}>" target="_blank"><{$file.fileName}></a></strong>
                            </li>
                            <{/foreach}>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="explain">
                <h3 class="explain-h3">百度云盘相关说明</h3>
                <p class="explain-h3-p"><{$fileInfo.fileName}>为百度云网盘资源搜索结果，<{$fileInfo.fileName}>下载是直接跳转到百度云网盘，<{$file.fileName}>文件的安全性和完整性需要您自行判断，百度云盘-专业提供百度云搜索和百度云资源下载服务。</p>
            </div>
            <div class="main-sx">
                <p class="main-sx-p">上一个：
                    <a title="" href="<{$preFile.fileUrl}>"><{$preFile.fileName}></a>
                </p>
                <p class="main-sx-p">下一个：
                    <a title="" href="<{$nextFile.fileUrl}>"><{$nextFile.fileName}></a>
                </p>
            </div>
        </div>
        <!-- 右  -->
        <div class="main-right">
            <div class="member">
                <div class="member-top">
                    <h2 class="member-top-h2">百度云会员</h2>
                </div>
                <div class="member-imagess">
                    <a target="_blank" href="<{$userInfo.userUrl}>">
                        <img alt="会员图片" src="<{$userInfo.imgUrl}>" />
                        <p class="maember-img-p"><{$userInfo.userName}></p>
                    </a>
                </div>
                <div class="maember-x">
                    <a class="maember-x-a">
                        <span class="maember-x-a-span"><{$userInfo.count}></span>
                        <span class="maember-x-a-span maember-x-a-span2">分享数</span>
                    </a>
                    <a class="maember-x-a">
                        <span class="maember-x-a-span">888</span>
                        <span class="maember-x-a-span maember-x-a-span2">关注数</span>
                    </a>
                    <a class="maember-x-a">
                        <span class="maember-x-a-span">8888</span>
                        <span class="maember-x-a-span maember-x-a-span2">粉丝数</span>
                    </a>
                </div>
            </div>
            <!-- 广告 -->
            <div class="main-y-img">
                <a title="" target="_blank" href="javascripr:;">
                    <img alt="" src="" />
                </a>
            </div>
            <div class="ranklist-yp" style="min-height:380px;">
                <div class="ranklist-yp-dt">
                    <h2 class="dt-h2">TA的分享</h2>
                    <p class="rm-p"><a target="_blank" href="<{$userInfo.userUrl}>">更多></a>
                    </p>
                </div>
                <div class="yp-dt-center" style="min-height:380px;">
                    <ul>
                        <{foreach from=$userFiles item=file}>
                        <li class="dt-center-li">
                            <a target="_blank" href="<{$file.fileUrl}>"><{$file.fileName}></a>
                        </li>
                        <{/foreach}>
                    </ul>
                </div>
            </div>
            <!-- 广告 -->
            <div style="width:292px;margin-left: 1.5px;height:650px;margin-top:15px;0verflow:hidden;">
                <script type="text/javascript">
                    var cpro_id = "u3021633";
                </script>
                <script type="text/javascript" src="http://cpro.baidustatic.com/cpro/ui/c.js"></script>
            </div>
            <div class="ranklist-yp" style="min-height:760px;">
                <div class="ranklist-yp-dt">
                    <h2 class="dt-h2">搜索关键字</h2>
                </div>
                <div class="yp-dt-center" style="min-height:380px;">
                    <ul>
                        <{foreach from=$hotSearchList item=search}>
                        <li class="dt-center-li">
                            <a target="_blank" href="<{$search.searchUrl}>-0-0-0"><{$search.searchWord}></a>
                        </li>
                        <{/foreach}>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <{include file="footer.tpl"}>
</div>
</body>
</html>