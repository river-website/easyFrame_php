<div class="header">
    <div class="h-types">
        <ul class="h-t-ul">
            <{foreach from=$typeList item=type}>
                <li class="h-t-u-li"><{$type.name}></li>
            <{/foreach}>
        </ul>
    </div>
    <{include file='share.tpl'}>
    <div class="h-log">
        <img class="h-l-img" src="<{$websiteInfo.logoImg}>"  />
    </div>
    <div class="h-search">
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary active">
                <input type="checkbox" autocomplete="off" checked>全部
            </label>
            <{foreach from=$typeList item=type}>
                <label class="btn btn-primary">
                    <input type="checkbox" autocomplete="off"> <{$type.name}>
                </label>
            <{/foreach}>
        </div>
        <div class="h-s-box">
            <input class="btn btn-default" type="button" value="Input">
        </div>
    </div>
</div>