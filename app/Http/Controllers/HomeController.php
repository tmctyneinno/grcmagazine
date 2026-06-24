<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function news()
    {
        return view('frontend.news');
    }

    public function fincrimeAML()
    {
        return view('frontend.fincrime-aml');
    }

    public function riskESG()
    {
        return view('frontend.risk-esg');
    }

    public function events()
    {
        return view('frontend.events');
    }

    public function showDetails($slug)
    {
        // ✅ Make sure we find the article
        $article = Article::where('slug', $slug)
            ->whereNotNull('published_at')
            ->firstOrFail();

        return view('frontend.postDetails', compact('article'));
    }
}