<?php

namespace App\Http\Controllers\Backend\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDO;
use DB;

class subcategoriesManagementController extends Controller
{


    public function index()
    {
        return view('backend.store.subcategoriesManagement');
       
    }
    public function destroy()
    {   
        return view('frontend.shopcart');
        /*
        $procedureName = 'system.del_subcategory';

        $bindings = [
            'subcategory_name'  => 'Dresses',
            'category_name'  => 'Girls',
        ];

        $result = DB::executeProcedure($procedureName, $bindings);

        dd($result);
           
        $pdo = DB::getPdo();
        $p1 = 'Dresses';
        $p2 = 'Girls';
        $stmt = $pdo->prepare("begin del_subcategory(:p1, :p2); end;");
        $stmt->bindParam(':p1', $p1, PDO::PARAM_INT);
        $stmt->bindParam(':p2', $p2, PDO::PARAM_INT);
        $stmt->execute();
        return view('frontend.shopcart');
        */
    }
}
