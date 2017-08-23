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
<div class="m-file">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>文件名</th>
            <th>类型</th>
            <th>大小</th>
        </tr>
        </thead>
        <tbody>
        <{foreach from=$newShareList item=newShare}>
            <tr>
                <td><{$newShare.fileName}></td>
                <td><{$newShare.suffix}></td>
                <td><{$newShare.size}></td>
            </tr>
            <{/foreach}>
        </tbody>
    </table>
</div>