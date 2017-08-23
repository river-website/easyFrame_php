<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-8 column">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <div class="row clearfix">
                                <div class="col-md-3 column">
                                <img src="<{$userInfo.imgUrl}>">
                                </div>
                                <div class="col-md-9 column">
                                    <table class="table table-hover">
                                        <tbody>
                                        <tr>
                                            <td>百度会员：</td><td><{$userInfo.userName}></td>
                                        </tr>
                                        <tr>
                                            <td>描述：</td><td><{$userInfo.userInfo}></td>
                                        </tr>
                                        <tr>
                                            <td>分享文件：</td><td><{$fileInfo.shareCount}></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-12 column">
                                    <div class="btn-group nofollow">
                                        <button class="btn btn-default" type="button">
                                            <em class="glyphicon"></em>全部</button>
                                        <{foreach from=$typesList item=suffixs key=type}>
                                        <button class="btn btn-default" type="button">
                                            <em class="glyphicon"></em><{$type}></button>
                                        <{/foreach}>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                        <ul class="m-u-ul">
            <{foreach from=$userFiles item=file}>
            <li class="m-u-u-li"><{$file.id}></li>
            <li class="m-u-u-li"><{$file.fileName}></li>
            <li class="m-u-u-li"><{$file.suffix}></li>
            <li class="m-u-u-li"><{$file.size}></li>
            <li class="m-u-u-li"><{$file.shareTime}></li>
            <li class="m-u-u-li"><{$file.typeName}></li>
            <{/foreach}>
        </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 column">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                        <h3>
                        热门资源
                    </h3>
                    <ol>
                        <{foreach from=$hotFileList item=file}>
                        <li><{$file.fileName}></li>
                        <{/foreach}>
                    </ol>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                        <h3>
                        热门用户
                    </h3>
                    <ol>
                        <{foreach from=$hotUserList item=user}>
                        <li><{$user.userName}></li>
                        <{/foreach}>
                    </ol>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                        <h3>
                        热门搜索
                    </h3>
                    <ol>
                        <{foreach from=$hotSearchList item=search}>
                        <li><{$search.searchWord}></li>
                        <{/foreach}>
                    </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>