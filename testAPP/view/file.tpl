<html lang="en">
<head>
    <include src="head" />
</head>
<body>
    <include src="header" />
    <div class="main">
        <div class="m-body">
            <div class="m-fileInfo"></div>
            <div class="m-likeFile"></div>
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
    <include src="'footer" />
</body>
</html>