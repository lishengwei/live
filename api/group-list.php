<?php
include_once dirname(__FILE__) . '/../config.php';

$channelsGroups = ChannelsGroup::getAll();
$resp           = [];
if (!empty($channelsGroups)) {
    foreach ($channelsGroups as $group) {
        $resp[] = [
            'group_name' => $group,
        ];
    }
}

echo json_encode([
    'code' => 0,
    'data' => $resp,
]);