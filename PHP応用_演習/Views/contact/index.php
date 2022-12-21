<?php
use lib\Msg;
use model\ContactModel;

if (ContactModel::getSession()) {
    $contact = ContactModel::getSession();
}
?>
<div class="contact">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12 my-5">
                <?php echo Msg::flush();?>
                <h1 class="">お問い合わせフォーム</h1>
                <div class="mt-2">
                    <div class="login-form bg-white p-4 shadow-sm mx-auto rounded">
                        <form class="validate-form" action="<?php echo CURRENT_URI; ?>" method="post" novalidate>
                            <div class="form-group">
                                <label for="name">名前</label>
                                <input id="name" type="text" name="name" class="form-control validate-target" required maxlength="10" autofocus value="<?php echo !empty($contact) ? h($contact->name) : ''; ?>">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="kana">ふりがな</label>
                                <input id="kana" type="text" name="kana" class="form-control validate-target" required maxlength="10" value="<?php echo !empty($contact) ? h($contact->kana) : ''; ?>">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="tel">電話番号</label>
                                <input id="tel" type="text" name="tel" class="form-control validate-target" pattern="[0-9]+" maxlength="11" value="<?php echo !empty($contact) ? h($contact->tel) : ''; ?>">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="email">メールアドレス</label>
                                <input id="email" type="text" name="email" class="form-control validate-target" pattern="^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$" maxLength="100" required value="<?php echo !empty($contact) ? h($contact->email) : ''; ?>">
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <label for="body">お問い合わせ内容</label>
                                <textarea id="body" name="body" cols="30" rows="5" class="form-control validate-target" required><?php echo !empty($contact) ? h($contact->body) : ''; ?></textarea>
                                <div class="invalid-feedback"></div>
                            </div>
                            <div class="text-right">
                                <div>
                                    <input type="submit" class="btn btn-primary shadow-sm">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 my-5">
                <h1 class="">お問い合わせ一覧</h1>
                <div class="mt-2">
                    <div class="login-form bg-white p-4 shadow-sm mx-auto rounded">
                        <table class="table">
                            <thead class="align-items-center">
                                <tr class="table-primary">
                                    <th scope="col">氏名</th>
                                    <th scope="col">ふりがな</th>
                                    <th scope="col">電話番号</th>
                                    <th scope="col">メールアドレス</th>
                                    <th scope="col">お問い合わせ内容</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <th scope="row" class="align-middle">test1</th>
                                    <td class="align-middle">テスト1</td>
                                    <td class="align-middle">09011111111</td>
                                    <td class="align-middle">test1@test.com</td>
                                    <td class="align-middle">test1 test1 </td>
                                    <td>
                                        <div class="align-items-center text-right">
                                            <a href="" class="btn btn-primary mr-2">編集</a>
                                            <input type="submit" value="削除" class="btn btn-danger shadow-sm">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="align-middle">test2</th>
                                    <td class="align-middle">テスト2</td>
                                    <td class="align-middle">09022222222</td>
                                    <td class="align-middle">test2@test.com</td>
                                    <td class="align-middle">test2 test2 </td>
                                    <td>
                                        <div class="align-items-center text-right">
                                            <a href="" class="btn btn-primary mr-2">編集</a>
                                            <input type="submit" value="削除" class="btn btn-danger shadow-sm">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row" class="align-middle">test3</th>
                                    <td class="align-middle">テスト3</td>
                                    <td class="align-middle">09033333333</td>
                                    <td class="align-middle">test3@test.com</td>
                                    <td class="align-middle">test3 test3 test3</td>
                                    <td class="align-middle">
                                        <div class="align-items-center text-right">
                                            <a href="" class="btn btn-primary mr-2">編集</a>
                                            <input type="submit" value="削除" class="btn btn-danger shadow-sm">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
