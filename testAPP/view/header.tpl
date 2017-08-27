        <!-- header -->
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