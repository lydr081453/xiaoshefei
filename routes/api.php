<?php

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\Product as ProductResource;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/products', function (Request $request) {
        Log::info($request);
        $page_size = $request->page_size;

    return new ProductCollection(Product::paginate($page_size));
});

Route::get('{id}/product', function ($id) {
    return new ProductResource(Product::find($id));
});

