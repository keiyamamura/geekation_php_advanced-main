<?php
namespace db;

use db\DataSource;
use model\ContactModel;

class ContactQuery
{
    public static function fetchByAll()
    {
        $db = new DataSource;
        $sql = 'SELECT id, name, kana, tel, email, body FROM contacts WHERE del_flg = 0 ORDER BY id DESC';
        $result = $db->selectAll($sql, [], DataSource::CLS, ContactModel::class);

        return $result;
    }

    public static function fetchById($id)
    {
        $db = new DataSource;
        $sql = 'SELECT id, name, kana, tel, email, body FROM contacts WHERE id = :id AND del_flg = 0';
        $result = $db->selectOne($sql, [
            'id' => $id
        ], DataSource::CLS, ContactModel::class);

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

    public static function edit($contact)
    {
        $db = new DataSource;
        $sql = "UPDATE contacts SET name = :name, kana = :kana, tel = :tel, email = :email, body = :body
                WHERE id = :id";

        return $db->execute($sql, [
            ':id' => $contact->id,
            ':name' => $contact->name,
            ':kana' => $contact->kana,
            ':tel' => $contact->tel,
            ':email' => $contact->email,
            ':body' => $contact->body
        ]);
    }

    public static function destroy($id)
    {
        $db = new DataSource;
        $sql = "UPDATE contacts SET del_flg = 1
                WHERE id = :id";

        return $db->execute($sql, [
            ':id' => $id,
        ]);
    }
}
