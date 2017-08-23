<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-1 column">
                </div>
                <div class="col-md-10 column">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <div class="row clearfix">
                                <div class="col-md-3 column">
                                <img alt="140x140" src="<{$websiteInfo.logoImg}>" />
                                </div>
                                <div class="col-md-7 column">
                                    <div class="btn-group nofollow">
                                        <button class="btn btn-default" type="button">
                                            <em class="glyphicon"></em>全部</button>
                                        <{foreach from=$typesList item=suffixs key=type}>
                                        <button class="btn btn-default" type="button">
                                            <em class="glyphicon"></em><{$type}></button>
                                        <{/foreach}>
                                    </div>
                                </div>
                                <div class="col-md-2 column">
                                <{include file='share.tpl'}>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1 column">
                </div>
            </div>
        </div>
    </div>
</div>