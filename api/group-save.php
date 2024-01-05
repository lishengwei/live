<?php
include_once dirname(__FILE__) . '/../config.php';

$key = $_POST['group_name'] ?? '';
$res = ChannelsGroup::set($key, $_POST);

echo json_encode([
    'code' => $res ? 0 : -1,
    'data' => [
        'res' => $res,
    ]
]);