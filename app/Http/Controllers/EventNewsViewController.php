<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\berita;
use Illuminate\Http\Request;

class EventNewsViewController extends Controller
{
    /**
     * Display event & news listing page
     */
    public function index()
    {
        $events = Event::all();
        $news = berita::all();
        return view('event&news', compact('events', 'news'));
    }

    /**
     * Display news detail page
     */
    public function newsDetail(Request $request)
    {
        // Get news ID from query parameter or route
        $newsId = $request->query('id');
        
        if ($newsId) {
            $singleNews = berita::find($newsId);
        } else {
            // Default to first news if no ID provided
            $singleNews = berita::first();
        }
        
        // Get other news for sidebar
        $otherNews = berita::where('id', '!=', $singleNews?->id ?? 0)->limit(3)->get();
        
        return view('news', compact('singleNews', 'otherNews'));
    }

    /**
     * Display event detail page
     */
    public function eventDetail(Request $request)
    {
        // Get event ID from query parameter or route
        $eventId = $request->query('id');
        
        if ($eventId) {
            $singleEvent = Event::find($eventId);
        } else {
            // Default to first event if no ID provided
            $singleEvent = Event::first();
        }
        
        // Get other events for sidebar
        $otherEvents = Event::where('id', '!=', $singleEvent?->id ?? 0)->limit(3)->get();
        
        return view('event', compact('singleEvent', 'otherEvents'));
    }
}
