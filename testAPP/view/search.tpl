<html lang="en">
<head>
    <{include file="head.tpl"}>
</head>
<body>
    <{include file="header.tpl"}>
    <div class="main">
        <div class="m-body">
            <div class="m-b-total">百度云为您找到17561条相关的百度云资源，dnf下载将跳转到百度网盘下载。</div>
            <div class="m-b-search">
                <div class="m-b-s-types">
                    <ul class="m-b-s-t-ul">
                        <{foreach from=$typeList item=type}>
                            <li class="m-b-s-t-li"></li>
                        <{/foreach}>
                    </ul>
                </div>
                <div class="m-b-s-suffix">
                    <ul class="m-b-s-s-ul">
                        <{foreach from=$suffixList item=suffix}>
                        <li class="m-b-s-s-li"></li>
                        <{/foreach}>
                    </ul>
                </div>
            </div>
            <div class="m-b-resource">
                <{foreach from=$searchList item=search}>
                    <div class="m-b-r-search">

                    </div>
                <{/foreach}>
            </div>
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
                    <{foreach from=$hotUserList item=hotUser}>
                    <li class="m-h-us-ul-li"></li>
                    <{/foreach}>
                </ul>
            </div>
        </div>
    </div>
    <{include file="footer.tpl"}>
</body>
</html>