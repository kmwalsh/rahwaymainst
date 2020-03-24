<?php

namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function search(Request $request) 
    {
        $q = $request->get( 'q' );
        $business = Business::where('name','LIKE','%'.$q.'%')->orWhere('description','LIKE','%'.$q.'%')->get();        
        if(count($business) > 0)
            return view('list',[
                'businesses' => $business,
                'superadmin' => false,
                'q'          => $q,
                'search'     => true,
            ]);
        else return view ('noResults',[
            'q'          => $q
        ]);
    }
}