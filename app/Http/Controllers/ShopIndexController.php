<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ShopIndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $coordinates = [
            5.93333,
            43.116669,
        ];

        $shops = Shop::query()
            ->addDistance($coordinates)
            ->latest()
            ->get();

        return view('welcome', [
            'shops' => $shops,
        ]);
    }
}
