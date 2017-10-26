        <!-- footer -->
        <!-- 返回顶部 -->
        <div class="fhdb-fixed">
            <a href="#">
                <img src="<{$webSiteInfo.footerImg}>" alt="返回顶部" />
            </a>
        </div>
        <!-- 底部 -->
        <div class="footer">
            <div class="footer-auto">
                <div class="footer-left">
                    <a title="百度网盘" href="<{$webSiteInfo.webSite}>">
                        <img alt="百度网盘" src="<{$webSiteInfo.logoImg}>" />
                    </a>
                    <p>最快的百度网盘搜索引擎</p>
                </div>
                <div class="footer-center">
                    <div class="footer-center-div">
                        <a href="<{$menus.search}>">百度云搜索</a>
                        <a href="<{$menus.file}>">百度云资源</a>
                        <a href="<{$menus.user}>">百度云会员</a>
                    </div>
                    <div class="footer-center-div2">
                        <p>Copyright&#160;©&#160;2016-2017
                            <a href="<{$webSiteInfo.webSite}>">百度云盘（<{$webSiteInfo.webSite}>）</a>All&#160;Rights&#160;Reserved</p>
                        <p class="div2-p2">Email:2540054847@qq.com
                            <script src="http://s95.cnzz.com/stat.php?id=1258115369&web_id=1258115369" language="JavaScript"></script>
                        </p>
                    </div>
                    <div style="width:600px;margin: 0 auto;text-align:center; padding-top:4px;">
                        <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=43310102000217" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img src="<{$webSiteInfo.pubSite}>/images/gongan.png"" style="float:left;"/><p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">湘公网安备 43310102000217号</p></a>
                    </div>
                </div>
                <div class="footer-right">
                    <div class="footer-right-div">
                        <p>分享至：</p>
                        <a title="微博" href="trigger_click('tsina');" target="_blank">
                            <img alt="微博" src="<{$webSiteInfo.pubSite}>/images/weibo.png" />
                        </a>
                        <a title="微信" href="trigger_click('weixin');">
                            <img alt="微信" src="<{$webSiteInfo.pubSite}>/images/weixinhui.png" />
                        </a>
                        <a title="QQ空间" href="trigger_click('qzone');" target="_blank" style="padding-right:0;">
                            <img alt="QQ空间" src="<{$webSiteInfo.pubSite}>/images/QQhui.png" />
                        </a>
                    </div>
                    <div class="bdsharebuttonbox" style="display:none;">
                        <a id="more" href="#" class="bds_more" data-cmd="more"></a>
                        <a id="qzone" href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a>
                        <a id="tsina" href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a>
                        <a id="tqq" href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a>
                        <a id="weixin" href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a>
                        <a id="renren" href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a>
                    </div>
                    <script>
                        window._bd_share_config = {
                            "common": {
                                "bdSnsKey": {},
                                "bdText": "",
                                "bdMini": "2",
                                "bdMiniList": false,
                                "bdPic": "",
                                "bdStyle": "0",
                                "bdSize": "16"
                            },
                            "share": {},
                            "image": {
                                "viewList": ["qzone", "tsina", "tqq", "weixin", "renren"],
                                "viewText": "分享到：",
                                "viewSize": "16"
                            },
                            "selectShare": {
                                "bdContainerClass": null,
                                "bdSelectMiniList": ["qzone", "tsina", "tqq", "weixin", "renren"]
                            }
                        };
                        with(document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
                    </script>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<{$webSiteInfo.pubSite}>/js/_common.js"></script>
        <script type="text/javascript" src="<{$webSiteInfo.pubSite}>/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="<{$webSiteInfo.pubSite}>/js/jquery_own.js"></script>
        <script charset="gbk" src="http://www.baidu.com/js/opensug.js"></script>
