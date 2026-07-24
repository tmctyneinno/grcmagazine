<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Event; 
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

    public function technologyAIRegTech()
    {
        return view('frontend.technologyAIRegTech');
    }

    public function governanceRiskEsg(){
        return view('frontend.governanceRiskEsg');
    }

    public function events()
    {
        return view('frontend.events');
    }

    public function showDetails($slug)
    {
        $article = Article::where('slug', $slug)
            ->whereNotNull('published_at')
            ->firstOrFail();

        // If you need to process the image URL for the view:
        if ($article->image) {
            $article->image_url = asset('storage/' . $article->image);
        } else {
            $article->image_url = 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80';
        }

        return view('frontend.postDetails', compact('article'));
    }

    // ✅ New Method for Event Details
    public function showEventDetails($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();

        // Process image URL for the view
        if ($event->image) {
            $event->image_url = asset('storage/' . $event->image);
        } else {
            $event->image_url = 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80';
        }

        return view('frontend.eventDetails', compact('event'));
    }
}