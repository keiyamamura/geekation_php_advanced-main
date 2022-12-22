<?php

namespace controller\contact\edit;

use model\ContactModel;
use db\ContactQuery;
use lib\Msg;

function get()
{
    require_once ROOT_PATH . 'Views/' . "contact/edit.php";

    $id = get_param('id', null, false);
    if (!empty($id)) {
        $contact = ContactQuery::fetchById($id);
    } else {
        redirect(GO_CONTACT_INDEX);
    }

    \view\contact\edit($contact);
}

function post()
{

    $contact        = new ContactModel;
    $contact->id    = (int) get_param('id', '');
    $contact->name  = get_param('name', '');
    $contact->kana  = get_param('kana', '');
    $contact->tel   = get_param('tel', '');
    $contact->email = get_param('email', '');
    $contact->body  = get_param('body', '');

    $get_id = (int) get_param('id', null, false);
    if ($contact->id !== $get_id) {
        Msg::push(Msg::ERROR, '不正な操作がありました。もう一度お試しください。');
        redirect(GO_CONTACT_INDEX);
    }

    if (($contact->isValidName()
        * $contact->isValidKana()
        * $contact->isValidTel()
        * $contact->isValidEmail()
        * $contact->isValidBody())) {
        ContactQuery::edit($contact);
        Msg::push(Msg::INFO, '更新が完了しました。');
        redirect(GO_CONTACT_INDEX);
    } else {
        Msg::push(Msg::ERROR, '更新に失敗しました。もう一度お試しください。');
        redirect(GO_REFERER);
    }
}
