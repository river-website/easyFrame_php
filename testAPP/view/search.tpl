            <!-- 百度云电影 -->
            <div class="main">
                <h2 class="main-h3">
                    当前位置： <a href="http://www.baiduyunpan.com/main/" class="main-h3-a">首页</a> &nbsp;&gt;&nbsp; <a class=" main-h3-a2">百度云搜索</a>
                </h2>
                <div class="resource">
                    <div class="resource-top">
                        <h2 class="resource-h2">
                            <span style="color:green;font-size:15px;"><b style="color:red;"><{$searchInfo.word}></b> 百度云为您找到<b style="color:red;"><{$searchInfo.count}></b>条相关的百度云资源，<b style="color:red;"><{$searchInfo.word}></b>下载将跳转到百度网盘下载。</span>
                        </h2>
                    </div>
                    <div class="resource-center">
                        <ul>
                            <li class="resource-conter-li" id="b0">
                                <a href="javascript:searchyunId(0);">全部</a>
                            </li>
                            <{foreach from=$typesList item=suffixs key=type}>
                            <li class="resource-conter-li">
                                <a href="javascript:searchyunId(1);"><{$type}></a>
                            </li>
                            <{/foreach}>
                        </ul>
                    </div>
                    <div style="padding-left:16px;line-height:30px;border-bottom: 1px solid #eee;padding-bottom: 10px;">
                        <ul>
                            <li class="resource-conter-li-suffix">
                                <a href="#">全部</a>
                            </li>
                            <li class="resource-conter-li-suffix">
                                <a href="#">torrent</a>
                            </li>
                        </ul>
                    </div>
                    <{foreach from=$searchList item=file}>
                    <span style="display:none;">0</span>
                    <div class="main-x">
                        <div class="main-x-left">
                            <h3 class="x-left-h3">
                                <!--查询字段为空查询结果为空情况的解决-->
                                 <a target="_blank" href="../share_file/<{$file.id}>"><{$file.fileName}></a>
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
                                会员：<a href="../share_user/<{$file.userID}>/1" target="_blank"><{$file.userName}></a>
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
                                <td class='rd'>
                                    <span>第1/38页</span>
                                </td>
                                <td class='prev'>
                                    <a class='db'>上一页</a>
                                </td>
                                <td class='psec'></td>
                                <td class='pnum'>
                                    <a class='sel'>1</a>
                                </td>
                                <td class='pnum'>
                                    <a class='ab' href='/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-2.html'>2</a>
                                </td>
                                <td class='pnum'>
                                    <a class='ab' href='/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-3.html'>3</a>
                                </td>
                                <td class='pnum'>
                                    <a class='ab' href='/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-4.html'>4</a>
                                </td>
                                <td class='pnum'>
                                    <a class='ab' href='/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-5.html'>5</a>
                                </td>
                                <td class='pnum'>
                                    <a class='ab' href='/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-6.html'>6</a>
                                </td>
                                <td class='pnum'>
                                    <a class='ab' href='/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-7.html'>7</a>
                                </td>
                                <td class='pnum'>
                                    <a class='ab' href='/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-8.html'>8</a>
                                </td>
                                <td class='pnum'>
                                    <a class='ab' href='/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-9.html'>9</a>
                                </td>
                                <td class='pnum'>
                                    <a class='ab' href='/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-10.html'>10</a>
                                </td>
                                <td class='nsec'></td>
                                <td class='next'>
                                    <a class='ab' href='/search/Wildes.Japan-0-%E5%85%A8%E9%83%A8-2.html'>下一页</a>
                                </td>
                                <td class='jmp'></td>
                            </tr>
                        </table>
                    </div>
                    <!--底部广告-->
                    
                    <div class="main-images">
                        <a title="" target="_blank" href="javascripr:;">
                        <img alt="" src="http://www.baiduyunpan.com/images/26.png"/></a>
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
                                    <a target="_blank" href="../share_file/<{$file.fileID}>"><{$file.fileName}></a>
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
                                    <a target="_blank" href="../search/<{$search.word}>"><{$search.word}></a>&nbsp;&nbsp;
                                </li>
                                <{/foreach}>
                            </ul>
                        </div>
                    </div>
                    <!--右下广告-->
                    
                    <div class="main-y-img">
                        <a title="" target="_blank" href="javascripr:;">
                        <img alt="" src="http://www.baiduyunpan.com/images/27.png"/></a>
                    </div>
                    <div class="main-y-img2">
                        <a title="" target="_blank" href="javascripr:;" >
                            <img alt="" src="http://www.baiduyunpan.com/images/28.png"/>
                            <p class="y-img2-p">决明子</p>
                        </a>
                        <a title="" target="_blank" href="javascripr:;" style="float:right;">
                            <img alt="" src="http://www.baiduyunpan.com/images/29.png"/>
                        <p class="y-img2-p">交易</p>
                        </a>
                        <a title="" target="_blank" href="javascripr:;" >
                            <img alt="" src="http://www.baiduyunpan.com/images/30.png"/>
                            <p class="y-img2-p">减肥茶减</p>
                        </a>
                        <a title="" target="_blank" href="javascripr:;" style="float:right;">
                            <img alt="" src="http://www.baiduyunpan.com/images/28.png"/>
                            <p class="y-img2-p">决明子</p>
                        </a>
                        <p class="img2-p2">广告</p>
                    </div>
                </div>
            </div>