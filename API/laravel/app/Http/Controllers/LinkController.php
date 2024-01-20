<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinkController extends Controller
{
    public function encurtarLink(Request $request)
    {
        $linkOriginal = $request->input('link');


        $slug = substr(uniqid(), 0, 16);


        $linkEncurtado = Link::create([
            'link' => $linkOriginal,
            'slug' => $slug,
        ]);

        
        $urlEncurtada = url("/{$slug}");

        return response()->json(['url_encurtada' => $urlEncurtada]);
    }
}
