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