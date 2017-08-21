<html lang="en">
<head>
    <{include file="head.tpl"}>
</head>
<body>
    <{include file="header.tpl"}>
    <div class="main">
        <div class="m-userInfo">
            <div class="m-u-icon">
                <img src="<{$userInfo.imgUrl}>">
            </div>
            <div class="m-u-info">
                <table class="table table-hover">
                    <tbody>
                    <tr>
                        <td>百度会员：</td><td><{$userInfo.userName}></td>
                    </tr>
                    <tr>
                        <td>描述：</td><td><{$userInfo.userInfo}></td>
                    </tr>
                    <tr>
                        <td>分享文件：</td><td><{$fileInfo.shareCount}></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="m-types">
            <ul class="m-t-ul">
                <li class="m-t-u-li">全部</li>
                <{foreach from=$typesList item=type key=type}>
                <li class="m-t-u-li"><{$type}></li>
                <{/foreach}>
            </ul>
        </div>
        <div class="m-s-box">
            <input type="text" class="m-s-b-text">
            <input type="button" class="m-s-b-button">
        </div>
        <div class="m-userFile">
            <ul class="m-u-ul">
                <{foreach from=$userFiles item=file}>
                <li class="m-u-u-li"><{$file.id}></li>
                <li class="m-u-u-li"><{$file.fileName}></li>
                <li class="m-u-u-li"><{$file.suffix}></li>
                <li class="m-u-u-li"><{$file.size}></li>
                <li class="m-u-u-li"><{$file.shareTime}></li>
                <li class="m-u-u-li"><{$file.typeName}></li>
                <{/foreach}>
            </ul>
        </div>
    </div>
    <{include file="footer.tpl"}>
</body>
</html>