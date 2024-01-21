<?php

use Illuminate\Support\Facades\Route;
use App\Models\Link;

Route::get('/{slug}', function ($slug) {
    $link = Link::where('slug', $slug)->first();

    if ($link) {
        return redirect($link->link);
    } else {
        abort(404);
    }
})->where('slug', '[\w\d]+');


