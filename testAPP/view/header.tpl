        <!-- header -->
        <!-- 导航 nav -->
        <div class="nav">
            <div class="nav-auto">
                <ul class="nav-ul">
                    <li class="nav-li"><a href="__ROOT__/search/ALL-ALL-ALL-1">百度云搜索</a></li>
                    <li class="nav-li"><a href="__ROOT__/share_file/1">百度云资源</a></li>
                    <li class="nav-li"><a href="__ROOT__/share_user/1">百度云会员</a></li>
                </ul>
                <div class="nav-right">
                    <a href="javascript:trigger_click('more');" class="nav-right-a">分享本站</a>
                    <a href="javascript:addfavorite(this,'__ROOT__','<{$webSiteInfo.shareInfo}>');" class="nav-right-a nav-right-a2">收藏本站</a>
                </div>
            </div>
        </div>
        <!--搜索  -->
        <div class="search">
            <div class="search-auto">
                <h2 class="search-left">
                 <a title="<{$webSiteInfo.logoTitle}>" href="__ROOT__">
                 <img alt="<{$webSiteInfo.logoTitle}>" src="__ROOT__<{$webSiteInfo.logoImg}>"/></a>
                </h2>
                <div class="search-center">
                    <div class="search-wrap">
                        <a href="#" class="search-wrap-a">全部</a>
                        <{foreach from=$typesList item=suffixs key=type}>
                        <a href="#" class="search-wrap-a"><{$type}></a>
                        <{/foreach}>
                    </div>
                    <form id="form1" class="search_form">
                        <input type="text" id="searchbox" value="" class="form-key" name="key" onkeypress="if(event.keyCode==13) {searchyun();return false;}" placeholder="共<{$webSiteInfo.fileCount}>个资源，今日已更新<{$webSiteInfo.fileNewCount}>" />
                        <input type="button" onclick="searchyun();" value class="form-ss" />
                        <i class="form-i"><img src="__ROOT__<{$webSiteInfo.logoImg}>" onclick="searchyun()" /></i>
                    </form>
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