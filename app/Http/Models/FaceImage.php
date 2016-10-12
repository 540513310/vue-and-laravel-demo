<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class FaceImage extends BosModel
{
    protected $guarded = [];

    protected $bosKeyPrefix = 'face_images/';

    public function setImgAttribute($data)
    {
        if (is_int(strpos($data,'http'))) {
            return $this->attributes['img'] = $data;
        };

        if(!!$data) {
            $bosKey = $this->uploadImage($data);
            $this->attributes['img'] = $bosKey;
        }
    }

    public function getImgAttribute()
    {

        if (!!$this->attributes['img'])
        {
            return $this->getUrl($this->attributes['img']);
        }

    }
    
}
