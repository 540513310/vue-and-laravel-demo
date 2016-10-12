<?php

namespace App\Http\Controllers;

use App\Http\Models\CustomizationSubtype;
use App\Http\Models\FaceApiUser;
use Intervention\Image\ImageManagerStatic as IImage;
use App\Http\Models\FaceImage;
use App\Libs\Facepp\Facepp;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\Partner;
use App\Libs\Bos\BosClientProxy;



class ApiTryonController extends Controller
{
    
    public function index(Request $request)
    {
        $errors = [
            0 => '成功',
            1 => '未提供api_key',
            2 => '非法用户',
            3 => '域名匹配出错'
        ];

        $secret = $request->get('key');
        if (!$secret) {
            return $errors[1];
        }
        $valid_user = FaceApiUser::where('secret',$secret)->first();
        if (!$valid_user) {
            return $errors[2];
        }

        $allow_host = $valid_user->host;
        if ($allow_host !== $request->header()->get('Origin')) {
            return $errors[3];
        }

        return $errors[0];
    } 
    

    public function store(Request $request)
    {

        $errors = [
           0 => '成功',
           1 => '未提供api_key',
           2 => '非法用户',
           3 => '域名匹配出错'
        ];
    
        $secret = $request->get('key');
        if (!$secret) {
            return $errors[1];
        }
        $valid_user = FaceApiUser::where('secret',$secret)->first();
        if (!$valid_user) {
            return $errors[2];
        }

        $allow_host = $valid_user->host;

//        if ($allow_host !== $request->headers->get('Origin')) {
//            return $errors[3];
//        }


        $upload_image = $request->file('user-image');

        $new_face = null;
        if ($upload_image) {
            $new_face =  $this->saveFile($upload_image);;
        }

        $url_image = $request->get('url');
        if ($url_image) {
            $new_face =  $this->saveUrl($url_image);
        }

        if($new_face)
        {
            return json_encode($new_face->result);
        }

        return '无法识别用户数据';
    
    }
    
    public function ajaxAllGlass()
    {
        return CustomizationSubtype::where('customizable_type','frame')->get()->pluck(['img']);
    }

    public function ajaxgetResult(Request $request)
    {
        $query_face = FaceImage::findOrfail($request->get('face'));
        return json_encode($query_face->result);
    }

    private function saveFile($upload_image)
    {
        $facepp = new Facepp();

        $file_path = $upload_image->getRealPath();
        $params['img']  = $file_path;
        $md5_hash =  md5_file($file_path);

        $params['attribute'] = 'gender,age,race,smiling,glass,pose';

        $response               = $facepp->execute('/detection/detect',$params);

        $face_image = FaceImage::where('md5',$md5_hash )->first();
        if (!$face_image) {
            $face_image = FaceImage::create([
               'img' => $upload_image,
               'result' => $response['body'],
               'md5' => $md5_hash
            ]);

        } else {
            $updated = $face_image->update([
               'img' => $upload_image,
               'result' => $response['body'],
            ]);

            if($updated) {
                $face_image->updated = 'true';
            }
        }

        return $face_image;
    }

    private function saveUrl($url_image)
    {
        $facepp = new Facepp();

        $params['url']          = $url_image;
        $params['attribute'] = 'gender,age,race,smiling,glass,pose';
        $md5_hash =  md5($params['url']);

        $response               = $facepp->execute('/detection/detect',$params);

        $face_image = FaceImage::where('md5',$md5_hash )->first();
        if (!$face_image) {
            $face_image = FaceImage::create([
               'img' => $params['url'],
               'result' => $response['body'],
               'md5' => $md5_hash
            ]);

        } else {
            $updated = $face_image->update([
               'img' => $params['url'],
               'result' => $response['body'],
            ]);

            if($updated) {
                $face_image->updated = 'true';
            }
        }

        return $face_image;
    }
    
    


}
