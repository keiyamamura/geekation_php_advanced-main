<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT index</title>
</head>

<body>
    <?php

    use lib\Msg;
    use model\ContactModel;

    // var_dump($contact);
    if (ContactModel::getSession()) {
        $contact = ContactModel::getSession();
    }

    Msg::flush();
    ?>
    <h1>contact</h1>
    <form action="<?php echo CURRENT_URI; ?>" method="post">
        <div>
            name: <input type="text" name="name" value="<?php echo !empty($contact) ? h($contact->name) : ''; ?>">
        </div>
        <div>
            kana: <input type="text" name="kana" value="<?php echo !empty($contact) ? h($contact->kana) : ''; ?>">
        </div>
        <div>
            tel: <input type="tel" name="tel" value="<?php echo !empty($contact) ? h($contact->tel) : ''; ?>">
        </div>
        <div>
            email: <input type="email" name="email" value="<?php echo !empty($contact) ? h($contact->email) : ''; ?>">
        </div>
        <div>
            body: <textarea name="body"><?php echo !empty($contact) ? h($contact->body) : ''; ?></textarea>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</body>

</html>
