<html lang="en">
<head>
    <{include file="head.tpl"}>
</head>
<body>
    <{include file="header.tpl"}>
    <div class="main">
        <div class="m-body">
            <div class="m-fileInfo">
                <dl class="dl-horizontal">
                    <dt>百度会员：</dt>
                    <dd><{$fileInfo.userName}></dd>
                    <dt>百度会员：</dt>
                    <dd><{$fileInfo.userName}></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>百度会员：</dt>
                    <dd><{$fileInfo.userName}></dd>
                    <dt>百度会员：</dt>
                    <dd><{$fileInfo.userName}></dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>百度会员：</dt>
                    <dd><{$fileInfo.userName}></dd>
                    <dt>百度会员：</dt>
                    <dd><{$fileInfo.userName}></dd>
                </dl>

                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td></td><td><{$fileInfo.userName}></td>
                            <td>文件格式：</td><td><{$fileInfo.suffix}></td>
                        </tr>
                        <tr>
                            <td>分享时间：</td><td><{$fileInfo.shareTime}></td>
                            <td>文件大小：</td><td><{$fileInfo.size}></td>
                        </tr>
                        <tr>
                            =====
                            <td>文件类型：</td><td>文件类型</td/tr>
                    </tbody>
                </table>
            </div>
            <div class="m-likeFile">

            </div>
            <div class="m-userFile"></div>
        </div>
        <div class="m-hot">
            <div class="m-h-url">
                <ul class="m-h-u-ul">
                    <{foreach from=$hotUrlList item=hotUrl}>
                    <li class="m-h-u-ul-li"></li>
                    <{/foreach}>
                </ul>
            </div>
            <div class="m-h-search">
                <ul class="m-h-s-ul">
                    <{foreach from=$hotSearchList item=hotSearch}>
                    <li class="m-h-s-ul-li"></li>
                    <{/foreach}>
                </ul>
            </div>
            <div class="m-h-user">
                <ul class="m-h-us-ul">
                    <{foreach from=$hotSearchList item=hotSearch}>
                    <li class="m-h-us-ul-li"></li>
                    <{/foreach}>
                </ul>
            </div>
        </div>
    </div>
    <{include file="footer.tpl"}>
</body>
</html>