<?php
namespace db;

use db\DataSource;

class ContactQuery
{
    public int $id;
    public string $name;
    public string $kana;
    public string $tel;
    public string $email;
    public string $body;
    public int $del_flg;

    public static function fetchByAll()
    {
        $db = new DataSource;
        $sql = 'SELECT name, kana, tel, email, body FROM contacts WHERE del_flg = 0 ORDER BY id DESC';
        $result = $db->selectAll($sql, DataSource::CLS, static::class);

        return $result;
    }
}
