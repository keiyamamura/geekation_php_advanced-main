<?php

namespace controller\contact\check;

use db\ContactQuery;
use model\ContactModel;
use lib\Msg;

function get()
{
    require_once ROOT_PATH . 'Views/' . "contact/check.php";
}

function post()
{
    $contact = ContactModel::getSession();

    if (!empty($contact)) {
        ContactQuery::create($contact);
        Msg::push(Msg::INFO, '登録が完了しました。');
        ContactModel::clearSession();
        redirect(GO_CONTACT_INDEX);
    } else {
        Msg::push(Msg::ERROR, '登録に失敗しました。もう一度お試しください。');
        ContactModel::clearSession();
        redirect(GO_CONTACT_INDEX);
    }
}
