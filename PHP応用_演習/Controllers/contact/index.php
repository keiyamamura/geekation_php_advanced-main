<?php

namespace controller\contact\index;

use model\ContactModel;
use lib\Msg;

function get()
{
    require_once ROOT_PATH . 'Views/' . "contact/index.php";
}

function post()
{
    $contact        = new ContactModel;
    $contact->name  = get_param('name', '');
    $contact->kana  = get_param('kana', '');
    $contact->tel   = get_param('tel', '');
    $contact->email = get_param('email', '');
    $contact->body  = get_param('body', '');

    ContactModel::setSession($contact);

    if (($contact->isValidName()
    * $contact->isValidKana()
            * $contact->isValidTel()
            * $contact->isValidEmail()
            * $contact->isValidBody())) {

        Msg::push(Msg::INFO, '登録内容はこちらでよろしいですか？');
        redirect(GO_CHECK);
    } else {
        Msg::push(Msg::ERROR, '登録失敗');
        redirect(GO_REFERER);
    }
}
