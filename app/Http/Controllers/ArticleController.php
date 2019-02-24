<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function index(){
        $articles = Article::paginate(50);

        return view('articles.index',compact('articles'));
    }

    function create(){
        return view('articles.create');
    }
}
