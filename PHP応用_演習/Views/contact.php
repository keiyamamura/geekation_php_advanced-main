<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACT</title>
</head>
<body>
    <?php
    use lib\Msg;

    Msg::flush();
    ?>
    <h1>contact</h1>
    <form action="<?php echo CURRENT_URI; ?>" method="post">
        <div>
            name: <input type="text" name="name">
        </div>
        <div>
            kana: <input type="text" name="kana">
        </div>
        <div>
            tel: <input type="tel" name="tel">
        </div>
        <div>
            email: <input type="email" name="email">
        </div>
        <div>
            body: <textarea name="body"></textarea>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</body>
</html>
