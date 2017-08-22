<html lang="en">
<head>
    <{include file="head.tpl"}>
</head>
<body>
    <{include file="header.tpl"}>
    <div class="main">
        <div class="m-body">
            <div class="m-fileInfo">
                <div class="m-f-center">
                    <h2 class="resource-h2"><{$fileInfo.fileName}></h2>
                </div>
                <div class="m-f-left">
                </div>
                <div class="m-f-right">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>百度会员：</td><td><{$fileInfo.userName}></td>
                            <td>文件格式：</td><td><{$fileInfo.suffix}></td>
                        </tr>
                        <tr>
                            <td>分享时间：</td><td><{$fileInfo.shareTime}></td>
                            <td>文件大小：</td><td><{$fileInfo.size}></td>
                        </tr>
                        <tr>
                            <td>文件类型：</td><td><{$fileIno.typeName}></td/tr>
                    </tbody>
                </table>
                </div>
            </div>
            <div class="m-likeFile">
                <div class="m-l-title">相似资源</div>
                <div class="m-l-ul">
                    <ul class="m-l-ul-ul">
                        <{foreach from=$likeFiles item=file}>
                            <li class="m-h-u-ul-li"><{$file.fileName}></li>
                        <{/foreach}>
                    </ul>
                </div>
            </div>
            <div class="m-userFile">
                <div class="m--title">相同用户资源</div>
                <div class="m-l-ul">
                    <ul class="m-l-ul-ul">
                        <{foreach from=$userFiles item=file}>
                        <li class="m-h-u-ul-li"><{$file.fileName}></li>
                        <{/foreach}>
                    </ul>
                </div>
            </div>
        </div>
        <div class="m-hot">
            <div class="m-h-url">
                <div class="m-h-div">热门资源</div>
                <ul class="m-h-u-ul">
                    <{foreach from=$hotFileList item=file}>
                    <li class="m-h-u-ul-li"><{$file.fileName}></li>
                    <{/foreach}>
                </ul>
            </div>
            <div class="m-h-search">
                <div class="m-h-s-title">热门搜索</div>
                <ul class="m-h-s-ul">
                    <{foreach from=$hotSearchList item=search}>
                    <li class="m-h-s-ul-li"><{$search.searchWord}></li>
                    <{/foreach}>
                </ul>
            </div>
            <div class="m-h-user">
                <div class="m-h-u-title">热门用户</div>
                <ul class="m-h-us-ul">
                    <{foreach from=$hotUserList item=user}>
                    <li class="m-h-us-ul-li"><{$user.userName}></li>
                    <{/foreach}>
                </ul>
            </div>
        </div>
    </div>
    <{include file="footer.tpl"}>
</body>
</html>
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                <div class="span12">
                </div>
            </div>
            <div class="row-fluid">
                <div class="span2">
                    <img alt="140x140" src="img/a.jpg" />
                </div>
                <div class="span6">
                    <div class="btn-group">
                        <button class="btn" type="button"><em class="icon-align-left"></em></button> <button class="btn" type="button"><em class="icon-align-center"></em></button> <button class="btn" type="button"><em class="icon-align-right"></em></button> <button class="btn" type="button"><em class="icon-align-justify"></em></button>
                    </div>
                    <form class="form-search">
                        <input class="input-medium search-query" type="text" /> <button type="submit" class="btn">查找</button>
                    </form>
                </div>
                <div class="span4">
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <div class="row-fluid">
                <div class="span8">
                    <div class="row-fluid">
                        <div class="span4">
                            <img alt="140x140" src="img/a.jpg" />
                        </div>
                        <div class="span8">
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <ol>
                                <li>
                                    新闻资讯
                                </li>
                                <li>
                                    体育竞技
                                </li>
                                <li>
                                    娱乐八卦
                                </li>
                                <li>
                                    前沿科技
                                </li>
                                <li>
                                    环球财经
                                </li>
                                <li>
                                    天气预报
                                </li>
                                <li>
                                    房产家居
                                </li>
                                <li>
                                    网络游戏
                                </li>
                            </ol>
                        </div>
                        <div class="span6">
                            <ol>
                                <li>
                                    新闻资讯
                                </li>
                                <li>
                                    体育竞技
                                </li>
                                <li>
                                    娱乐八卦
                                </li>
                                <li>
                                    前沿科技
                                </li>
                                <li>
                                    环球财经
                                </li>
                                <li>
                                    天气预报
                                </li>
                                <li>
                                    房产家居
                                </li>
                                <li>
                                    网络游戏
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="row-fluid">
                        <div class="span12">
                            <ol>
                                <li>
                                    新闻资讯
                                </li>
                                <li>
                                    体育竞技
                                </li>
                                <li>
                                    娱乐八卦
                                </li>
                                <li>
                                    前沿科技
                                </li>
                                <li>
                                    环球财经
                                </li>
                                <li>
                                    天气预报
                                </li>
                                <li>
                                    房产家居
                                </li>
                                <li>
                                    网络游戏
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <ol>
                                <li>
                                    新闻资讯
                                </li>
                                <li>
                                    体育竞技
                                </li>
                                <li>
                                    娱乐八卦
                                </li>
                                <li>
                                    前沿科技
                                </li>
                                <li>
                                    环球财经
                                </li>
                                <li>
                                    天气预报
                                </li>
                                <li>
                                    房产家居
                                </li>
                                <li>
                                    网络游戏
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12">
                            <ol>
                                <li>
                                    新闻资讯
                                </li>
                                <li>
                                    体育竞技
                                </li>
                                <li>
                                    娱乐八卦
                                </li>
                                <li>
                                    前沿科技
                                </li>
                                <li>
                                    环球财经
                                </li>
                                <li>
                                    天气预报
                                </li>
                                <li>
                                    房产家居
                                </li>
                                <li>
                                    网络游戏
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>