<?php

namespace App\Http\Controllers;

use App\Models\Item;

class ItemStockController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Administrador');
    }

    public function index()
    {
        $items = Item::latest()
            ->with('operations')
            ->paginate(10)
            ->withQueryString();

        return view('items-stock.index', [
            'items' => $items,
            'itemOptions' => Item::getOptions(),
        ]);
    }

    public function create()
    {
        return view('items-stock.create', [
            'itemOptions' => Item::getOptions(),
        ]);
    }
}
