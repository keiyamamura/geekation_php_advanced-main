<?php
namespace model;

use model\AbstractModel;
use lib\Msg;

class ContactModel extends AbstractModel
{
    public int $id;
    public string $name;
    public string $kana;
    public string $tel;
    public string $email;
    public string $body;
    public int $del_flg;

    protected static $SESSION_NAME = '_contact';

    public static function validateName($val)
    {
        $res = true;

        if (empty($val)) {
            Msg::push(Msg::ERROR, '名前とふりがなを入力してください。');
            $res = false;
        } else {
            if (mb_strlen($val) > 10) {
                Msg::push(Msg::ERROR, '文字数は10桁以内です。');
                $res = false;
            }
        }

        return $res;
    }

    public function isValidName()
    {
        return static::validateName($this->name);
    }

    public function isValidKana()
    {
        return static::validateName($this->kana);
    }

    public static function validateTel($val)
    {
        $res = true;

        if (!empty($val)) {
            if (!preg_match("/^[0-9]+$/", $val)) {
                Msg::push(Msg::ERROR, '電話番号は、数字以外入力できません。');
                $res = false;
            }
        }

        return $res;
    }

    public function isValidTel()
    {
        return static::validateTel($this->tel);
    }

    public static function validateEmail($val)
    {
        $res = true;

        if (empty($val)) {
            Msg::push(Msg::ERROR, 'メールアドレスを入力してください。');
            $res = false;
        } else {
            if (!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/iD', $val)) {
                Msg::push(Msg::ERROR, '不正な形式のメールアドレスです。');
                $res = false;
            }
        }

        return $res;
    }

    public function isValidEmail()
    {
        return static::validateEmail($this->email);
    }

    public static function validateBody($val)
    {
        $res = true;

        if (empty($val)) {
            Msg::push(Msg::ERROR, 'お問い合わせ内容を入力してください。');
            $res = false;
        }

        return $res;
    }

    public function isValidBody()
    {
        return static::validateBody($this->body);
    }
}
