<?php

namespace view\contact;

use lib\Msg;

function edit($contact)
{
?>
    <div class="contact">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12 my-5">
                    <?php echo Msg::flush(); ?>
                    <h1 class="">お問い合わせ編集</h1>

                    <div class="mt-2">
                        <div class="login-form bg-white p-4 shadow-sm mx-auto rounded">
                            <form class="validate-form" action="<?php echo CURRENT_URI; ?>" method="post" novalidate>
                                <input type="hidden" name="id" value="<?php echo !empty($contact) ? h($contact->id) : ''; ?>">
                                <div class="form-group">
                                    <label for="name">名前</label>
                                    <input id="name" type="text" name="name" class="form-control validate-target" required maxlength="10" value="<?php echo !empty($contact) ? h($contact->name) : ''; ?>">
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
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <a href="<?php the_url(GO_CONTACT_INDEX); ?>" class="shadow-sm">戻る</a>
                                    </div>
                                    <div>
                                        <input type="submit" value="更新" class="btn btn-primary shadow-sm">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
