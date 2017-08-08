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
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>文件名</th>
                    <th>类型</th>
                    <th>大小</th>
                </tr>
            </thead>
            <tbody>
                <{foreach from=$newUrlList item=newUrl}>
                <tr>
                    <td><{$newUrl.name}></td>
                    <td><{$newUrl.suffix}></td>
                    <td><{$newUrl.size}></td>
                </tr>
                <{/foreach}>
            </tbody>
        </table>
    </div>
    <{include file="footer.tpl"}>
    </body>
</html>