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
                <{$userInfo.name}>
            </div>
        </div>
        <div class="m-types">
            <ul class="m-t-ul">
                <li class="m-t-u-li">全部</li>
                <{foreach from=$typeList item=type}>
                <li class="m-t-u-li"><{$type.name}></li>
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
                <li class="m-u-u-li"><{$file.name}></li>
                <li class="m-u-u-li"><{$file.type}></li>
                <li class="m-u-u-li"><{$file.size}></li>
                <{/foreach}>
            </ul>
        </div>
    </div>
    <{include file="footer.tpl"}>
</body>
</html>