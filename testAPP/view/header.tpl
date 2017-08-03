<div class="header">
    <div class="h-menu">
        <ul class="h-m-ul">
            <{foreach from=$menuList item=menu}>
                <li class="h-m-u-li"><{$menu}></li>
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
        <div class="h-s-types">
            <ul class="h-s-t-ul">
                <{foreach from=$typeList item=type}>
                    <li class="h-s-t-u-li"><{$type}></li>
                <{/foreach}>
            </ul>
        </div>
        <div class="h-s-box"></div>
    </div>
</div>