<?php

namespace App\Http\Controllers\promote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Promotion;
use App\Models\Gallery;

class promote extends Controller
{

    public function index()
    {
        $promotion = Promotion::all();
        return view(
            'promote.index',
            [
                'promotion' => Promotion::all(),
            ]
        );
    }

    public function indexw()
    {
        $promotion = Promotion::all();
        return view(
            'promote-w.indexw',
            [
                'promotion' => Promotion::all(),
            ]
        );
    }

    public function menu()
    {
        return view(
            'promote.menu',
            [
                'menu' => Menu::all(),
                'category' => Category::all(),
            ]
        );
    }

    public function menuw()
    {
        return view(
            'promote-w.menuw',
            [
                'menu' => Menu::all(),
                'category' => Category::all(),
            ]
        );
    }

    public function promotion()
    {
        return view(
            'promote.promotion',
            [
                'promotion' => Promotion::all(),
            ]
        );
    }

    public function promotionw()
    {
        return view(
            'promote-w.promotionw',
            [
                'promotion' => Promotion::all(),
            ]
        );
    }

    public function gallery()
    {
        return view(
            'promote.gallery',
            [
                'gallery' => Gallery::all(),
            ]
        );
    }

    public function galleryw()
    {
        return view(
            'promote-w.galleryw',
            [
                'gallery' => Gallery::all(),
            ]
        );
    }

    public function detail()
    {
        return view('promote.detail');
    }
}
