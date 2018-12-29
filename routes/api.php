<?php

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Photo;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\PhotoCollection;
use App\Http\Resources\Product as ProductResource;
use Illuminate\Support\Facades\DB;

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

    $page_size = $request->page_size;
    $handle = DB::table("products")
                //->join("brands","products.brandid","=","brands.id")
                //->select("products.id","products.categoryid","products.code","products.name","products.title");
                ;
    Log::info('key:'.$request->key);
    if($request->key){
        $handle->where('keys','like','%'.$request->key.'%');
    }
    return new ProductCollection($handle->paginate($page_size));
    //return new ProductCollection(Product::paginate($page_size));
});

Route::get('{id}/product', function ($id) {
    return new ProductResource(Product::find($id));
});

Route::get('/photos', function (Request $request) {
    return new PhotoCollection(Photo::all());
});

Route::get('{id}/photo', function ($id) {
    return new PhotoResource(Photo::find($id));
});

