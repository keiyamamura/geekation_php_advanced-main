<?php

namespace controller\contact\check;

use db\ContactQuery;
use model\ContactModel;
use lib\Msg;

function get()
{
    $contact = ContactModel::getSession();

    if (empty($contact)) {
        redirect(GO_CONTACT_INDEX);
    }

    if (($contact->isValidName()
        * $contact->isValidKana()
        * $contact->isValidTel()
        * $contact->isValidEmail()
        * $contact->isValidBody())) {
        require_once ROOT_PATH . 'Views/' . "contact/check.php";
    } else {
        ContactModel::clearSession();
        Msg::clearSession();
        Msg::push(Msg::ERROR, '不正な操作がありました。もう一度お試しください。');
        redirect(GO_CONTACT_INDEX);
    }
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
