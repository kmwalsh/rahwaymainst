<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\Business;
use App\User;
use App\Http\Controllers\Controller;
use App\Repositories\DataRepository;

class HomeController extends Controller {

    private $repository;

    public function __construct(DataRepository $repository)
    {
        $this->middleware('verified');
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        if ( $request->user()['role'] === 'admin' ) {
            $businesses = Business::orderBy('created_at', 'desc')->get();
            return view('home', [
                'businesses' => $businesses,
                'superadmin' => true,
            ]);
        } else {
            return view('home', [
                'businesses' => $this->repository->forUser($request->user())['businesses'],
                'superadmin' => false,
            ]);
        }
    }

}