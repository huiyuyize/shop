<?php
return [
    //id
    'ACCESS_KEY_ID'=>env('ACCESS_KEY_ID'),
    //秘钥
    'ACCESS_KEY_SECRET'=>env('ACCESS_KEY_SECRET'),
    //短信签名
    'signName'=>env('signName'),
    //短信模板编号
    'templateCode'=>env('templateCode'),
    //短信模板中的字段
    'field'=>'code',
    //短信模板默认内容
    'content'=>rand(111111, 999999),
    //短信模板中可选参数
    'product'=> 'dsd',
];
