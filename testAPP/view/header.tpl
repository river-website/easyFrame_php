<div class="header">
    <{include file='share.tpl'}>
    <div class="h-log">
        <img class="h-l-img" src="<{$websiteInfo.logoImg}>"  />
    </div>
    <div class="h-search">
        <div class="btn-group" data-toggle="buttons">
            <label class="btn btn-primary active">
                <input type="checkbox" autocomplete="off" checked>全部
            </label>
            <{foreach from=$typesList item=suffixs key=type}>
                <label class="btn btn-primary">
                    <input type="checkbox" autocomplete="off"> <{$type}>
                </label>
            <{/foreach}>
        </div>
        <div class="h-s-box">
            <input class="btn btn-default" type="button" value="Input">
        </div>
    </div>
</div>