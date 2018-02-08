@extends('layouts.app')

@section('content')
<main>
    <div class="container">
        <div class="under-header">
            <h2>Simple Upload</h2>
            <p>ユーザー登録処理をせずにチームデータ・マッチデータのアップロードが可能です。</p>
        </div>

        <div class="row">
            <div class="col-md-12 col-md-offset-0">
                <div class="card">
                    <div class="card-header lighten-1 white-text puerto-color text-center">
                        チームデータアップロード
                    </div>
                    <div class="card-body">
                        <form accept-charset="UTF-8" role="form" method="post" action="" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <label for="teamOwnerName">オーナー名:</label>
                                    <input type="text" name="teamOwnerName" class="form-control input-alternate" id="teamOwnerName" value="" style="padding: 0;">
                                </div>
                                <div class="form-group">
                                    <label for="teamComment">コメント:</label>
                                    <textarea name="teamComment" class="form-control input-alternate" rows="10" id="teamComment" style="padding: 4em;"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="teamDeletePassWord">削除パスワード:</label>
                                    <input type="text" name="teamDeletePassWord" class="form-control input-alternate" rows="5" id="teamDeletePassWord" value=""
                                        style="padding: 0;">
                                </div>
                                <div class="form-group">
                                    <label for="teamSearchTags">検索タグ</label>
                                    <select id="teamSearchTags" class="form-control" name="teamSearchTags">
                                        <option value="大会ゲスト許可">大会ゲスト許可</option>
                                        <option value="フリーOKE">フリーOKE</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input id="teamfile" type="file" style="display:none">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info" onclick="$('input[id=teamfile]').click();">チームファイル</button>
                                        </span>
                                        <input type="text" id="teamCover" name="teamFile" class="form-control" placeholder="select file...">
                                    </div>
                                    <p class="help-block">CHEチームデータが選択可能です</p>
                                </div>
                                <input type="hidden" name="_token" value="XIGNcCDHjdOGzZvM6taTIWiZ9eJchGq1IZuxOVg4">
                                <button type="submit" class="btn btn-block puerto-color">チームデータアップロード</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top: 30px;">
            <div class="col-md-12 col-md-offset-0">
                <div class="card">
                    <div class="card-header downy-color lighten-1 white-text text-center">
                        マッチデータアップロード
                    </div>
                    <div class="card-body">
                        <form accept-charset="UTF-8" role="form" method="post" action=""
                            enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <label for="matchOwnerName">オーナー名:</label>
                                    <input type="text" name="matchOwnerName" class="form-control input-alternate" id="matchOwnerName" value="" style="padding: 0;">
                                </div>
                                <div class="form-group">
                                    <label for="matchComment">コメント:</label>
                                    <textarea name="matchComment" class="form-control input-alternate" rows="5" id="matchComment" style="padding: 4em;"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="matchDeletePassWord">削除パスワード:</label>
                                    <input type="text" name="matchDeletePassWord" class="form-control input-alternate" rows="5" id="matchDeletePassWord" value="" style="padding: 0;">
                                </div>
                                <div class="form-group">
                                    <label for="matchSearchTags">検索タグ</label>
                                    <select id="matchSearchTags" class="form-control" name="matchSearchTags">
                                        <option value="ハーフリーグ">ハーフリーグ</option>
                                        <option value="フルリーグ">フルリーグ</option>
                                        <option value="トーナメント">トーナメント</option>
                                        <option value="上級演習所">上級演習所</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                        <input id="matchfile" type="file" style="display:none">
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info" onclick="$('input[id=matchfile]').click();">マッチファイル</button>
                                            </span>
                                            <input type="text" id="matchCover" name="matchFile" class="form-control" placeholder="select file...">
                                        </div>
                                        <p class="help-block">CHEマッチデータが選択可能です</p>
                                </div>
                                <input type="hidden" name="_token" value="XIGNcCDHjdOGzZvM6taTIWiZ9eJchGq1IZuxOVg4">
                                <button type="submit" class="btn btn-block downy-color">マッチデータアップロード</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection


@section('js')
<script>
    $('input[id=teamfile]').change(function () {
        $('#teamCover').val($(this).val());
    });
    $('input[id=matchfile]').change(function () {
        $('#matchCover').val($(this).val());
    });
</script>
<script type="text/javascript" src="https://project-europa.herokuapp.com/js/magicsuggest-conf.js"></script>
@endsection