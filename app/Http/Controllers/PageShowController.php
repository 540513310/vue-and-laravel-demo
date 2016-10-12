<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Partner;
use App\Article;


class PageShowController extends Controller
{
    public function showPartners()
    {
        return view('xj_partners')->with('partners',Partner::all());
    }

    public function newsIndex()
    {

        $articles = Article::orderBy('id', 'desc')->Paginate(5);

        return view('xj_news')->with('articles',$articles);
    }

    public function articleIndex(Request $requests)
    {
        $id = $requests->get('id');
        $article = Article::find($id);

        return view('xj_article')->with('article',$article);
    }

    public function agentIndex(Request $requests)
    {
        return view('xj_agent');
    }


}
