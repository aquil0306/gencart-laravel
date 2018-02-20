<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
     public function store(Request $request)
    {

        $store = Store::create($request->all());

        if ($store) {

            if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
                $path = $request->logo->store('public/logos');
                $store->logo = str_replace('public/', '', $path);
                $store->save();
            }

            if ($request->hasFile('banner') && $request->file('banner')->isValid()) {
                $path = $request->banner->store('public/banners');
                $store->banner = str_replace('public/', '', $path);
                $store->save();
            }
        }


        return $store;
    }
}
