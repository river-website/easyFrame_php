<html lang="en">
<head>
    <{include file="head.tpl"}>
</head>
<body>
    <{include file="header.tpl"}>
    <div class="main">
        <div class="m-body">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Library</a></li>
                <li class="active">Data</li>
            </ol>
            <div class="m-b-total">百度云为您找到17561条相关的百度云资源，dnf下载将跳转到百度网盘下载。</div>
            <div class="m-b-search">
                <div class="m-b-s-types">
                    <div class="btn-group" data-toggle="buttons">
                        <label class="btn btn-primary active">
                            <input type="checkbox" autocomplete="off" checked>全部
                        </label>
                        <{foreach from=$typeList item=type}>
                        <label class="btn btn-primary">
                            <input type="checkbox" autocomplete="off"> type.name
                        </label>
                        <{/foreach}>
                    </div>
                </div>
                <div class="m-b-s-suffix">
                    <ul class="m-b-s-s-ul">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary active">
                                <input type="checkbox" autocomplete="off" checked>全部
                            </label>
                            <{foreach from=$suffixList item=suffix}>
                            <label class="btn btn-primary">
                                <input type="checkbox" autocomplete="off"> suffix.name
                            </label>
                            <{/foreach}>
                        </div>
                    </ul>
                </div>
            </div>
            <div class="m-b-resource">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>文件名</th>
                        <th>类型</th>
                        <th>大小</th>
                    </tr>
                    </thead>
                    <tbody>
                    <{foreach from=$searchList item=search}>
                        <tr>
                            <td><{$search.name}></td>
                            <td><{$search.suffix}></td>
                            <td><{$search.size}></td>
                        </tr>
                        <{/foreach}>
                    </tbody>
                </table>
            </div>
            <div class="m-b-page">
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="<{$page.preUrl}>" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <{foreach from=$pageList item=page}>
                            <li><a href="<{$page.url}>"><{$page.id}></a></li>
                        <{/foreach}>
                        <li>
                            <a href="<{$page.nextUrl}>" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
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