<?php

namespace App\Http\Controllers;

use App\Http\Services\Interfaces\ProductsContract;
use Illuminate\Http\Request;
use App\Http\Services\Interfaces\AuthContract;
use App\Http\Services\Interfaces\BasketContract;

class PageController extends Controller
{
    public function __construct(Request $request)
    {
        parent::__construct();
        view()->share('_dynamics', $request->_dynamics);
    }

    public function index(ProductsContract $productsContract)
    {
        //dd($this->user);
        $products = $productsContract->get();

        // dd($products);
        //$products = null;
        return view('pages.index', compact("products"));
    }

    public function basket(BasketContract $basketContract, ProductsContract $productsContract)
    {
        $basketList = $basketContract->get($this->user);
        $products = $productsContract->get();
        // dd($basketList);
        return view('pages.basket', compact("basketList", "products"));
    }

    public function catalog(ProductsContract $productsContract)
    {
        //$catalogs = $productsContract->get();
        $products = $productsContract->get();
        // dd($catalogs);
        return view('pages.catalog', compact("products"));
    }

    public function product(ProductsContract $productsContract, Request $request)
    {
        $products = $productsContract->get();
        $product = null;
        foreach($products as $key => $value)
        {   
            if($value["_id"] == $request->productId){
                $product = $value;
            }
        }

        if($product == null)
        {
            abort(404);
        }
        return view('pages.product', compact("product"));
    }

    public function profile(ProductsContract $productsContract, AuthContract $authContract)
    {
        $listBuyUser = $productsContract->getListBuy($this->user);
        $listBuyUser["orders"] = array_reverse($listBuyUser["orders"]);
        
        $listReferrals = $authContract->getReferrals($this->user);

        return view('pages.profile', compact("listReferrals", "listBuyUser"));
    }
}
