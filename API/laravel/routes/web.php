<?php

use Illuminate\Support\Facades\Route;
use App\Models\Link;
use Illuminate\Support\Facades\Response;

Route::get('/{slug}', function ($slug) {
    $link = Link::where('slug', $slug)->first();

    if ($link) {
        return redirect($link->link);
    } else {
        $script = '<script>window.location.href = "http://localhost:5173/pagenotfound";</script>';
        return Response::make($script, 404);
    }
})->where('slug', '[\w\d]+');


