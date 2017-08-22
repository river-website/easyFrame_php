<div class="header">
    <{include file='share.tpl'}>
    <div class="h-log">
        <img class="h-l-img" src="<{$websiteInfo.logoImg}>"  />
    </div>
    <div class="h-search">
        <div class="btn-group" role="group" aria-label="...">
            <button type="button" class="btn btn-default">全部</button>
            <{foreach from=$typesList item=suffixs key=type}>
                <button type="button" class="btn btn-default"><{$type}></button>
            <{/foreach}>
        </div>
        <div class="h-s-box">
            <div class="col-sm-4">
                   <div class="input-group">
                       <input type="text" class="form-control input-lg" onkeydown="onKeyDown(event)"/>
                       <span class="input-group-addon btn btn-primary">搜索</span>
                   </div>
                   <script type="text/javascript">
                       function onKeyDown(event){
                            var e = event || window.event || arguments.callee.caller.arguments[0];
                            if(e && e.keyCode==27){ // 按 Esc
                                //要做的事情
                            }
                            if(e && e.keyCode==113){ // 按 F2
                                //要做的事情
                            }
                            if(e && e.keyCode==13){ // enter 键
                                alert("此处回车触发搜索事件");
                            }
                       }
                   </script>
            </div>
    </div>
</div>