<?php

namespace App\Libs\Bos;

//define('__BOS_CLIENT_ROOT', dirname(__DIR__));

// 设置BosClient的Access Key ID、Secret Access Key和ENDPOINT

class BosConfig
{

    const CONFIG =  array(
        'credentials' => array(
            'ak' => '61c99e540e874c98a8cf7c68fce37479',
            'sk' => 'ba46662592b4461f843ba5bd956cd139',
        ),
        'endpoint' => 'http://gz.bcebos.com',
    );

}


?>