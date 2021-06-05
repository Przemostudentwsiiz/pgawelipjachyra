<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Product;
use DB;
use Session;

class ProductsController extends Controller
{
    public function showProducts(Request $request)
    {
        //try{
        //$products_selection = DB::select("select products_selection() as products_selection from products FETCH FIRST 1 ROWS ONLY");
        //$category = Category::where('name_of_category', $type)->first();
        //$subcategory = Sub_category::where('id_category', $category->id)->first();

        /*
         $favourite_products = DB::table('products')
            ->join('favorite_products', 'favorite_products.id_product', '=', 'products.id_product')
            ->select('products.id_product', 'products.name', 'products.prize')
            ->where('favorite_products.id_ushop', '=', $id)
            ->get();

    
           SELECT * FROM products p
            INNER JOIN sub_categories sb ON sb.id_sub_category = p.id_sub_category 
            INNER JOIN categories c ON c.id_category = sb.id_category 
            INNER JOIN images i ON i.id_product = p.id_product
            WHERE sb.name_of_subcategory='Shorts' AND c.name_of_category='Women';
             */
        //$category = $request->input('type');
         //$subcategory = $request->input('subcategory');
     
        //$cos = Request::input('type');
        //var_dump($cos);
       // var_dump($subcategory);
      // $url = explode("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");

       //var_dump($url[3]);
       // $allParams = $request->all();
        //var_dump($allParams);
          /*
        foreach ($allParams as $key => $value) {

            var_dump($value);   
        }*/
 
        // $allparams is an associative array, you can also read individual element as $allparams['model']
   
        
        $url = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        $category = $url[2];
        $subcategory = $_GET['subcategory'];
        Session::put('category', $category);
      

        //dd($subcategory);
        //$category = $request->input('type');
         //$subcategory = $request->input('subcategory');
        /*
        $products_selection = DB::table('products p as products_selection')
        ->join('sub_categories sb', 'sb.id_sub_category', '=', 'p.id_sub_category')
        ->join('categories c', 'c.id_category', '=', 'sb.id_category')
        ->where('sb.name_of_subcategory', '=', $subcategory)
        ->where('c.name_of_category', '=',  $category)
        ->select('p.id_product', 'p.name', 'p.prize', 'p.size_of_product')
        ->get();*/
      
        $products_selection = DB::table('products p as products_selection')
        ->join('sub_categories sb', 'sb.id_sub_category', '=', 'p.id_sub_category')
        ->join('categories c', 'c.id_category', '=', 'sb.id_category')
        ->where('sb.name_of_subcategory', '=', $subcategory)
        ->where('c.name_of_category', '=',  $category)
        ->select('p.id_product', 'p.name', 'p.prize', 'p.size_of_product')
        ->get();
        
        
        $products_shop_view = DB::select("select products_shop_view('$subcategory','$category') as products_shop_view from images FETCH FIRST 1 ROWS ONLY");
        //dd($image_for_product);
        /*
        $data2 = DB::table('images')
        ->join('products p', 'p.id_product', '=', 'images.id_product')
        ->where('images.id_product', '=', )
        ->select('images.image')
        ->get();
        dd($data2);*/
        
        return view('frontend.shop', compact('products_selection','products_shop_view'));

        /*
        }
        catch(Exception $e){
            //return view('frontend.firstlookpage');
            report($e);
        }*/
    }
    
}
