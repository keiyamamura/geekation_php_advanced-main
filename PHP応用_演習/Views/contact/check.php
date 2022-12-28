<?php
use lib\Msg;
use model\ContactModel;

$contact = ContactModel::getSession();
?>
<div class="contact">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12 my-5">
                <?php echo Msg::flush(); ?>
                <h1 class="">お問い合わせ内容の確認</h1>
                <div class="mt-2">
                    <div class="login-form bg-white p-4 shadow-sm mx-auto rounded">
                        <form class="validate-form" action="<?php echo CURRENT_URI; ?>" method="post">
                            <div class="form-group">
                                <label>名前</label>
                                <input type="text" name="name" class="form-control" value="<?php echo h($contact->name); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>ふりがな</label>
                                <input type="text" name="kana" class="form-control" value="<?php echo h($contact->kana); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>電話番号</label>
                                <input type="text" name="tel" class="form-control" value="<?php echo h($contact->tel); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>メールアドレス</label>
                                <input type="text" name="email" class="form-control" value="<?php echo h($contact->email); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>お問い合わせ内容</label>
                                <textarea name="body" cols="30" rows="5" class="form-control" readonly><?php echo h($contact->body); ?></textarea>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <a href="<?php echo the_url(GO_CONTACT_INDEX); ?>" class="btn btn-danger shadow-sm">やり直す</a>
                                </div>
                                <div>
                                    <input type="submit" value="登録" class="btn btn-primary shadow-sm">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../js/contact.js"></script>
