<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT CHECK</title>
</head>

<body>
    <?php

    use lib\Msg;
    use model\ContactModel;

    Msg::flush();
    $contact = ContactModel::getSession();
    ?>
    <h1>check</h1>
    <form action="<?php echo CURRENT_URI; ?>" method="post">
        <div>
            name: <span><?php echo $contact->name; ?></span>
        </div>
        <div>
            kana: <span><?php echo $contact->name; ?></span>
        </div>
        <div>
            tel: <span><?php echo $contact->name; ?></span>
        </div>
        <div>
            email: <span><?php echo $contact->name; ?></span>
        </div>
        <div>
            <span>body:</span><br>
            <span><?php echo nl2br($contact->body); ?></span>
        </div>
        <p>上記の内容でよろしいですか？</p>
        <div>
            <a href="<?php echo the_url(GO_CONTACT_INDEX); ?>">キャンセル</a>
            <input type="submit">
        </div>
    </form>
</body>

</html>
