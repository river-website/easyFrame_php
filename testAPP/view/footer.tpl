        <!-- footer -->
        <!-- 返回顶部 -->
        <div class="fhdb-fixed">
            <a href="#">
                <img src="__ROOT__<{$webSiteInfo.footerImg}>" alt="返回顶部" />
            </a>
        </div>
        <!-- 底部 -->
        <div class="footer">
            <div class="footer-auto">
                <div class="footer-left">
                    <a title="百度网盘" href="__ROOT__">
                        <img alt="百度网盘" src="__ROOT__<{$webSiteInfo.logoImg}>" />
                    </a>
                    <p>最快的百度网盘搜索引擎</p>
                </div>
                <div class="footer-center">
                    <div class="footer-center-div">
                        <a href="__ROOT__/search/ALL-ALL-ALL-1">百度云搜索</a>
                        <a href="__ROOT__/share_file/1">百度云资源</a>
                        <a href="__ROOT__/share_user/1">百度云会员</a>
                    </div>
                    <div class="footer-center-div2">
                        <p>Copyright&#160;©&#160;2016-2017
                            <a href="__ROOT__">百度云盘（baiduyunpan.com）</a>All&#160;Rights&#160;Reserved</p>
                        <p class="div2-p2">Email:2540054847@qq.com
                            <script src="http://s95.cnzz.com/stat.php?id=1258115369&web_id=1258115369" language="JavaScript"></script>
                        </p>
                    </div>
                    <div style="width:600px;margin: 0 auto;text-align:center; padding-top:4px;">
                        <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=43310102000217" style="display:inline-block;text-decoration:none;height:20px;line-height:20px;"><img src="http://www.baiduyunpan.com/images/gongan.png"" style="float:left;"/><p style="float:left;height:20px;line-height:20px;margin: 0px 0px 0px 5px; color:#939393;">湘公网安备 43310102000217号</p></a>
                    </div>
                </div>
                <div class="footer-right">
                    <div class="footer-right-div">
                        <p>分享至：</p>
                        <a title="微博" href="javascript:trigger_click('tsina');" target="_blank">
                            <img alt="微博" src="__ROOT__/images/12.png" />
                        </a>
                        <a title="微信" href="javascript:trigger_click('weixin');">
                            <img alt="微信" src="__ROOT__/images/13.png" />
                        </a>
                        <a title="QQ空间" href="javascript:trigger_click('qzone');" target="_blank" style="padding-right:0;">
                            <img alt="QQ空间" src="__ROOT__/images/14.png" />
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
        <script language="javascript" type="text/javascript">
            function addfavorite(obj, url, title) {
                !url ? url = location.href : null;
                !title ? title = document.title : null;
                try {
                    window.external.addFavorite(url, title);
                    return false;
                } catch (e) {
                    try {
                        window.sidebar.addPanel(title, url, "");
                        return false;
                    } catch (e) {
                        alert("加入收藏失败，请使用Ctrl+D进行添加");
                        if (location.href.toLowerCase().indexOf(obj.href.toLowerCase(), 0) >= 0) {
                            return false;
                        }
                    }
                }
            }
        </script>
        <script type="text/javascript">
            var txtObj = document.getElementById("alertSpan");
             //回调函数，用于获取用户当前选择的文字
            function show(str) {
                txtObj.innerHTML = str;
            }
            var params = {
                "XOffset": 0, //提示框位置横向偏移量,单位px
                "YOffset": 10, //提示框位置纵向偏移量,单位px
                "width": 326, //提示框宽度，单位px  
                "fontColor": "black", //提示框文字颜色
                "fontColorHI": "#FFF", //提示框高亮选择时文字颜色
                "fontSize": "15px", //文字大小
                "fontFamily": "宋体", //文字字体
                "borderColor": "gray", //提示框的边框颜色
                "bgcolorHI": "#2B91E3", //提示框高亮选择的颜色
                "sugSubmit": false //在选择提示词条是是否提交表单
            };
            BaiduSuggestion.bind("searchbox", params, show);
        </script>
        <script type="text/javascript" src="http://www.baiduyunpan.com/js/_common.js"></script>
        <script type="text/javascript" src="http://www.baiduyunpan.com/js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="http://www.baiduyunpan.com/js/jquery_own.js"></script>
        <script charset="gbk" src="http://www.baidu.com/js/opensug.js"></script>
        <script>
            $.setNavStyle('百度云下载');
        </script>