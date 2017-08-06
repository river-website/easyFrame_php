<html lang="en">
    <head>
        <{include file='head.tpl'}>
    </head>
    <body>
    <{include file="header.tpl"}>
    <div class="h-searchWord">
        <ul class="h-s-ul">
            <{foreach from=$hotSearchList item=hotSearch}>
            <li class="h-s-t-u-li"><{$hotSearch.searchWord}></li>
            <{/foreach}>
        </ul>
    </div>
    <div class="h-yunUrl">
        <ul class="h-url-ul">
            <{foreach from=$hotUrlList item=hotUrl}>
            <li class="h-url-u-li"><{$hotUrl.name}></li>
            <{/foreach}>
        </ul>
    </div>
    <div class="h-yunUser">
        <ul class="h-user-ul">
            <{foreach from=$hotUserList item=hotUser}>
            <li class="h-user-u-li"><{$hotUser.name}></li>
            <{/foreach}>
        </ul>
    </div>
    <div class="m-yunUrl">
        <ul class="m-y-ul">
            <{foreach from=$newUrlList item=newUrl}>
            <li class="m-y-u-li"><{$newUrl.name}></li>
            <{/foreach}>
        </ul>
    </div>
    <{include file="footer.tpl"}>
    </body>
</html>