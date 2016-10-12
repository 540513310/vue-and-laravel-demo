<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Partner;
use App\Libs\Bos\BosClientProxy;

use Storage;



class partnerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('partner')->withPartners(Partner::all());
    }

    public function store(Request $request)
    {
        $timeStamp = '_'.date('Y_m_d');

        // 通过 Partner Model 插入一条数据进 partners 表
        $partner = new Partner; // 初始化 Partner 对象
        $partner->name = $request->get('partnerName'); // 将 POST 提交过了的 partnerName 字段的值赋给 partner 的 title 属性
        $partner->link = $request->get('partnerHref'); // 同上
        $partner->BOS_key = $request->get('partnerName').$timeStamp.'.png'; // 同上


        // 获取图片并保存于 BOS ，调用了一个个人封装的 BaiduBOS 远程文件系统，操作可参考laravel官方api
//        $imagePath = $request->file('partnerImg')->getRealPath();
//        $bosClient->client->putObjectFromFile('xjxx-website','partners/'.$partner->BOS_key , $imagePath);

        // convert PNG base64 to tmp.png
        $imageData = $request->get('partnerImg');
        list($type, $imageData) = explode(';', $imageData);
        list(, $imageData)      = explode(',', $imageData);
        $imageData = base64_decode($imageData);
        file_put_contents('tmp/partnerImg.png', $imageData);

        $bosClient = new BosClientProxy();
        $bosClient->client->putObjectFromFile('xjxx-website','partners/'.$partner->BOS_key , 'tmp/partnerImg.png');

        // 保存后删除 tmp.png
        @unlink('tmp/partnerImg.png');

        // 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if ($partner->save()) {
            return redirect('/partner'); // 保存成功，跳转到 文章管理 页
        } else {
            // 保存失败，跳回来路页面，保留用户的输入，并给出提示
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }

    }

    public function destroy($id)
    {

        $bosClient = new BosClientProxy();
        $bosClient->client->deleteObject('xjxx-website', 'partners/'.Partner::find($id)->BOS_key);
        Partner::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');;

    }

}
