<?php
/**
 * Created by PhpStorm.
 * User: lichao
 * Date: 2018/6/5
 * Time: 0:30
 */
//前台获取数据的接口文件
$goods = [
    [
        'id' => 1,
        'gname' => 'mac电脑',
        'price' => 12800,
        'num' => 1,
    ],
    [
        'id' => 2,
        'gname' => 'ipad',
        'price' => 3200,
        'num' => 3,
    ],
    [
        'id' => 3,
        'gname' => 'iphoneX',
        'price' => 9800,
        'num' => 1,
    ],
    [
        'id' => 4,
        'gname' => 'iphoneX',
        'price' => 100,
        'num' => 1,
    ],
];

echo json_encode($goods);







