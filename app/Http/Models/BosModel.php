<?php

namespace App\Http\Models;

use App\Libs\Bos\BosClientProxy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class BosModel extends Model
{
    protected $bucket = 'xjxx-datacenter';
    protected $bosKeyPrefix;

    public function uploadImage( $uploadFile ) {
  
  
      $timeStamp = '_'.date('Y_m_d');
      $imgOriginName = $uploadFile ->getClientOriginalName();
      $imgNameArr =  explode(".",$imgOriginName);
      $imgType = $imgNameArr[1];
      $bosKey = $this->bosKeyPrefix.Hash::make($imgNameArr[0]).$timeStamp.'.'.$imgType;

      $bosClient = new BosClientProxy();
      $bosClient->client->putObjectFromFile($this->bucket, $bosKey , $uploadFile->getRealPath());

      return $bosKey;
    }
  
    public function getUrl( $bosKey ) {

      if (is_int(strpos($bosKey,'http'))) return $bosKey;
  
      $bosClient = new BosClientProxy();
      $imgURL = $bosClient->client->generatePreSignedUrl($this->bucket, $bosKey, $bosClient->signArray);

      return $imgURL;
    }

    
}
