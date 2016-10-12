<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Article;
use App\Libs\Bos\UmUploader\UploaderProxy;
use App\Libs\Bos\BosClientProxy;


class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('article');
    }

    public function store(Request $request)
    {

        $timeStamp = '_'.date('Y_m_d');

        // 通过 Article Model 插入一条数据进 partners 表
        $article = new Article; // 初始化 Article 对象
        $article ->title = $request->get('articleName'); // 将 POST 提交过了的 partnerName 字段的值赋给 partner 的 title 属性
        $article ->content = $request->get('editorValue'); // 将 POST 提交过了的 partnerName 字段的值赋给 partner 的 title 属性
        $article ->description = $request->get('description'); // 将 POST 提交过了的 partnerName 字段的值赋给 partner 的 title 属性

        @$thisID = (int)(Article::orderBy('id', 'desc')->first()->id) + 1;

        if (!isset($thisID)) {
            $thisID = 1;
        }

        $article ->thumbnail = $thisID.$timeStamp.'.png' ; // bos key


        $imageData = $request->get('thumbImg');
        list($type, $imageData) = explode(';', $imageData);
        list(, $imageData)      = explode(',', $imageData);
        $imageData = base64_decode($imageData);
        file_put_contents('tmp/thumbImg.png', $imageData);

        $bosClient = new BosClientProxy();
        $bosClient->client->putObjectFromFile('xjxx-website','thumbs/'.$article ->thumbnail , 'tmp/thumbImg.png');

        // 保存后删除 tmp.png
        @unlink('tmp/thumbImg.png');


        // 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if ($article ->save()) {
            return redirect('/article'); // 保存成功，跳转到 文章管理 页
        } else {
            // 保存失败，跳回来路页面，保留用户的输入，并给出提示
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }

    }

    public function create(Request $request)
    {
        $timeStamp = time();

        $bosClient = new BosClientProxy();
        $imageName = $request->file('upfile')->getFilename() . $timeStamp . '.png';

        $imagePath = $request->file('upfile')->getRealPath();
        $bosClient->client->putObjectFromFile('xjxx-website','articles/'.$imageName , $imagePath);
        
        $resArr = [
            "originalName" => '',
            "name" => '',
            "url" => 'http://xjxx-website.gz.bcebos.com/articles/'.$imageName,
            "size"=> 1,
            "type"=>".png",
            "state"=>"SUCCESS",
        ];
        
        return json_encode($resArr);

    }
    
    public function showEditList(){
        return view('edit_article')->with('articles',Article::all()->sortByDesc("id"));
    }

    public function edit($ArticleId){

        $article = Article::find($ArticleId);
        return view('article')->with('article',$article);

    }

    public function update($ArticleId,Request $request){

        $timeStamp = '_'.date('Y_m_d');

        $article = Article::find($ArticleId); // 获取要修改的文章

        if ($article == null) {
            return "没文章啊";
        }

        $article ->title = $request->get('articleName'); // 将 POST 提交过了的 partnerName 字段的值赋给 partner 的 title 属性
        $article ->content = $request->get('editorValue'); // 将 POST 提交过了的 partnerName 字段的值赋给 partner 的 title 属性
        $article ->description = $request->get('description'); // 将 POST 提交过了的 partnerName 字段的值赋给 partner 的 title 属性

        if($request->get('thumbImg')) {

            @$thisID = (int)(Article::orderBy('id', 'desc')->first()->id) + 1;
            if (!isset($thisID)) {
                $thisID = 1;
            }
            $article ->thumbnail = $thisID.$timeStamp.'.png' ; // bos key

            $imageData = $request->get('thumbImg');
            list($type, $imageData) = explode(';', $imageData);
            list(, $imageData)      = explode(',', $imageData);
            $imageData = base64_decode($imageData);
            file_put_contents('tmp/thumbImg.png', $imageData);

            $bosClient = new BosClientProxy();
            $bosClient->client->putObjectFromFile('xjxx-website','thumbs/'.$article ->thumbnail , 'tmp/thumbImg.png');
            // 保存后删除 tmp.png
            @unlink('tmp/thumbImg.png');

        }

        // 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if ($article ->save()) {
            return redirect('/article/'. $ArticleId .'/edit'); // 保存成功，跳转到 文章管理 页
        } else {
            // 保存失败，跳回来路页面，保留用户的输入，并给出提示
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }

    }


}
