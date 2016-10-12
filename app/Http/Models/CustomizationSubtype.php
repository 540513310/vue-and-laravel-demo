<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomizationSubtype extends BosModel
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [];
    protected $bosKeyPrefix = 'customization/subtypes/';

    public function setImgAttribute($data)
    {
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
