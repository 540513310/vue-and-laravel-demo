<?php
require_once 'Facepp.php';
########################
###     example      ###
########################
$facepp = new \App\Libs\Facepp\Facepp();
$facepp->api_key       = '3ff1ef920dd5cd207d6462a830297209';
$facepp->api_secret    = 'aXmC6XWFyFq6kFuP1NvK-y3m8EfSXo9p';

#detect local image 
$params['img']          = '1.jpg';
$params['attribute']    = 'gender,age,race,smiling,glass,pose';

$response               = $facepp->execute('/detection/detect',$params);
print_r($response);


#detect image by url
$params['url']          = 'http://www.faceplusplus.com.cn/wp-content/themes/faceplusplus/assets/img/demo/1.jpg';
$response               = $facepp->execute('/detection/detect',$params);
print_r($response);

if($response['http_code'] == 200) {
    #json decode 
    $data = json_decode($response['body'], 1);
    
    #get face landmark
    foreach ($data['face'] as $face) {
        $response = $facepp->execute('/detection/landmark', array('face_id' => $face['face_id']));
        print_r($response);
    }
    
    #create person 
    $response = $facepp->execute('/person/create', array('person_name' => 'unique_person_name'));
    print_r($response);

    #delete person
    $response = $facepp->execute('/person/delete', array('person_name' => 'unique_person_name'));
    print_r($response);

}

