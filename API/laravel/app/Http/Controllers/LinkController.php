<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class LinkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function encurtarLink(Request $request)
    {
        /* if (Auth::check()) { */

        return response()->json(auth()->id());

        $linkOriginal = $request->input('link');
        $slug = $this->generateUniqueSlug();

        $user = User::where('id', auth()->id());
        $linkEncurtado = $user->userLinks->create([
            'link' => $linkOriginal,
            'slug' => $slug,
            'clicks' => 0,
        ]);

        $urlEncurtada = url("/{$slug}");

        return response()->json(['url_encurtada' => $urlEncurtada]);
        /* } else {
            return response()->json(['message' => 'Usuário não autenticado'], 401);
        } */
    }



    public function redirecionarLink($slug)
    {
        $link = Link::where('slug', $slug)->first();

        if ($link) {
            $link->clicks++;
            $link->save();

            return redirect($link->link);
        } else {
            return response()->json(['message' => 'Link não encontrado'], 404);
        }
    }

    public function listarLinks()
    {

        if (Auth::check()) {
            $user = Auth::user();

            $links = $user->userLinks()->with('link')->get();

            return response()->json(['links' => $links]);
        } else {

            return response()->json(['message' => 'Usuário não autenticado'], 401);
        }
    }

    private function generateUniqueSlug()
    {
        do {
            $slug = substr(uniqid(), 0, 8);
        } while (Link::where('slug', $slug)->exists());

        return $slug;
    }
}
