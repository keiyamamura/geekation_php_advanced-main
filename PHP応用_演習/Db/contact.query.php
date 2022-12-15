<?php
namespace db;

use db\DataSource;

class ContactQuery
{
    public static function fetchByAll()
    {
        $db = new DataSource;
        $sql = 'SELECT name, kana, tel, email, body FROM contacts WHERE del_flg = 0 ORDER BY id DESC';
        $result = $db->selectAll($sql, DataSource::CLS, static::class);

        return $result;
    }

    public static function create($contact)
    {
        $db = new DataSource;
        $sql = "INSERT INTO contacts (name, kana, tel, email, body)
                VALUES (:name, :kana, :tel, :email, :body)";

        return $db->execute($sql, [
            ':name' => $contact->name,
            ':kana' => $contact->kana,
            ':tel' => $contact->tel,
            ':email' => $contact->email,
            ':body' => $contact->body
        ]);
    }
}
