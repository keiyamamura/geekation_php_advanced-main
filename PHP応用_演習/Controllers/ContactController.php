<?php

namespace controller;

use model\ContactModel;
use model\Contact;
use lib\Msg;

class ContactController
{
    public static function index()
    {
        require_once ROOT_PATH . 'Views/' . "contact/index.php";
        $contact = new Contact();
        $lists = $contact->fetchByAll();

        \view\contact\index($lists);
    }

    public static function check()
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
            redirect(GO_CONFIRM);
        } else {
            Msg::push(Msg::ERROR, '登録失敗');
            redirect(GO_REFERER);
        }
    }

    public static function confirm()
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

    public static function complete()
    {
        $contact = ContactModel::getSession();

        if (!empty($contact)) {
            Contact::create($contact);
            Msg::push(Msg::INFO, '登録が完了しました。');
            ContactModel::clearSession();
            redirect(GO_CONTACT_INDEX);
        } else {
            Msg::push(Msg::ERROR, '登録に失敗しました。もう一度お試しください。');
            ContactModel::clearSession();
            redirect(GO_CONTACT_INDEX);
        }
    }

    public static function edit()
    {
        require_once ROOT_PATH . 'Views/' . "contact/edit.php";

        $id = get_param('id', null, false);
        if (!empty($id)) {
            $contact = Contact::fetchById($id);
        } else {
            redirect(GO_CONTACT_INDEX);
        }

        \view\contact\edit($contact);
    }

    public static function update()
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
            Contact::edit($contact);
            Msg::push(Msg::INFO, '更新が完了しました。');
            redirect(GO_CONTACT_INDEX);
        } else {
            Msg::push(Msg::ERROR, '更新に失敗しました。もう一度お試しください。');
            redirect(GO_REFERER);
        }
    }

    public static function destroy()
    {
        $id = get_param('id', '');
        if (!empty($id)) {
            Contact::destroy($id);
            Msg::push(Msg::INFO, '削除が完了しました。');
            redirect(GO_CONTACT_INDEX);
        } else {
            redirect(GO_CONTACT_INDEX);
        }
    }
}
