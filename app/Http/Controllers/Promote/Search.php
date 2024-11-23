<?php

namespace App\Http\Controllers\Promote;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Promotion;
use App\Models\Gallery;

class Search extends Controller
{
    public function index(Request $req)
    {

        $menu = Menu::query()
            ->where('name', 'LIKE', '%' . $req->keyword . '%')
            ->orWhere('price', 'LIKE', '%' . $req->keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $req->keyword . '%')
        ->get();

        return view(
            'promote.search',
            [
                'menu' => $menu,
                'category' => Category::all(),
            ]
        );

    }

    public function indexw(Request $req)
    {

        $menu = Menu::query()
            ->where('name', 'LIKE', '%' . $req->keyword . '%')
            ->orWhere('price', 'LIKE', '%' . $req->keyword . '%')
            ->orWhere('description', 'LIKE', '%' . $req->keyword . '%')
        ->get();

        return view(
            'promote-w.menuw',
            [
                'menu' => Menu::all(),
                'category' => Category::all(),
            ]
        );

    }
}
