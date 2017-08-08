<div class="header">
    <div class="h-types">
        <ul class="h-t-ul">
            <{foreach from=$typeList item=type}>
                <li class="h-t-u-li"><{$type}></li>
            <{/foreach}>
        </ul>
    </div>
    <div class="h-share">
        <ul class="h-s-ul">
            <{foreach from=$shareList item=share}>
                <li class="h-s-u-li"><{$share}></li>
            <{/foreach}>
        </ul>
    </div>
    <div class="h-log">
        <img class="h-l-img" src="<{$logImgPath}>"  />
    </div>
    <div class="h-search">
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
        <div class="h-s-box">
            <input class="btn btn-default" type="button" value="Input">
        </div>
    </div>
</div>