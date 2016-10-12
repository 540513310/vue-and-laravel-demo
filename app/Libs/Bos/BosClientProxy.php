<?php
/**
 * Created by PhpStorm.
 * User: zjx
 * Date: 2016/7/14
 * Time: 14:58
 */

namespace App\Libs\Bos;

use BaiduBce\BceClientConfigOptions;
use BaiduBce\Util\Time;
use BaiduBce\Util\MimeTypes;
use BaiduBce\Http\HttpHeaders;
use BaiduBce\Services\Bos\BosClient;
use BaiduBce\Services\Bos\CannedAcl;
use BaiduBce\Services\Bos\BosOptions;
use BaiduBce\Auth\SignOptions;
use BaiduBce\Log\LogFactory;

require_once 'BaiduBce.phar';


class BosClientProxy
{

    public $client;
    public $signArray;

    public function __construct()
    {

        $this->client = new BosClient(BosConfig::CONFIG);

        $Sign_OPtions = array(
            SignOptions::TIMESTAMP=>new \DateTime(),
            SignOptions::EXPIRATION_IN_SECONDS=>300,
        );

        $this->signArray = array(BosOptions::SIGN_OPTIONS => $Sign_OPtions);
    }

}




?>