<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-8 column">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <div class="row clearfix">
                                <h3>
                                    <{$fileInfo.fileName}>
                                </h3>
                                <div class="col-md-3 column">
                                    <img alt="140x140" src="<{$websiteInfo.logoImg}>" />
                                </div>
                                <div class="col-md-9 column">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>百度会员：</td><td><{$fileInfo.userName}></td>
                                            <td>文件格式：</td><td><{$fileInfo.suffix}></td>
                                        </tr>
                                        <tr>
                                            <td>分享时间：</td><td><{$fileInfo.shareTime}></td>
                                            <td>文件大小：</td><td><{$fileInfo.size}></td>
                                        </tr>
                                        <tr>
                                            <td>文件类型：</td><td><{$fileIno.typeName}></td>
                                            <td>文件类型：</td><td><{$fileIno.typeName}></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <h3>相识资源</h3>
                            <table class="table">
                                <tbody>
                                <{foreach from=$likeFiles item=file}>
                                    <tr><td><{$file.fileName}><td></tr>
                                    <{/foreach}>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <h3>相同用户资源</h3>
                            <table class="table">
                                <tbody>
                                    <{foreach from=$likeFiles item=file}>
                                    <tr><td><{$file.fileName}><td></tr>
                                    <{/foreach}>
                                </tbody>
                            </table>
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