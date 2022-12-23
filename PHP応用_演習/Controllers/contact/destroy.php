<?php

namespace controller\contact\destroy;

use model\ContactModel;
use db\ContactQuery;
use lib\Msg;

function post()
{
    $id = get_param('id', '');
    if (!empty($id)) {
        ContactQuery::destroy($id);
        Msg::push(Msg::INFO, '削除が完了しました。');
        redirect(GO_CONTACT_INDEX);
    } else {
        redirect(GO_CONTACT_INDEX);
    }
}
