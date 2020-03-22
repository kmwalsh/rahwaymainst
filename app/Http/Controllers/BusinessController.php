<?php

namespace App\Http\Controllers;

use App\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BusinessController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the create dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function createBusiness(Request $request)
    {
        return view('createBusiness', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Show the create dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function changeBusinessStatus(Request $request)
    {
        $business = Business::where('id', $request->id)->first();
        $business->approved = !$business->approved;

        $business->update();

        return redirect('/home');
    }

    public function makeBusiness(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'phone' => 'required|max:12',
            'hours' => 'required|max:1000',
            'address' => 'required|max:255',
        ]);
    
        if ($validator->fails()) {
            return redirect('/create')
                ->withInput()
                ->withErrors($validator);
        }
        
        $business = new Business;
        $business->name = $request->name;
        $business->email = $request->user()->email;
        $business->description = $request->description;
        $business->address = $request->address;

        if ( !empty( $request->public_address ) ) {
            $business->public_address = 1;
        }

        if ( !empty( $request->address) ) {
            $business->map = $request->address;
        }
        
        if ( !empty( $request->phone ) ) {
            $business->phone = $request->phone;
        }

        if ( !empty( $request->store ) ) {
            $business->store = $request->store;
        }

        if ( !empty( $request->hours ) ) {
            $business->hours = $request->hours;
        }

        if ( !empty( $request->logo ) ) {
            $business->logo = $request->logo->store('logos');
        }

        $business->user_id = $request->user()->id;
        $business->save();
    
        return redirect('/home');
    }

    public function updateBusiness(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'phone' => 'required|max:12',
            'hours' => 'required|max:1000',
            'address' => 'required|max:255',
        ]);
    
        if ($validator->fails()) {
            return redirect('/home')
                ->withInput()
                ->withErrors($validator);
        }
        
        // HERE MUST GET BUSINESS THAT WE ARE UPDATING
        //$business = new Business;
        $business = Business::where('id',$request->id)->first();

        // now we update that business
        $business->name = $request->name;
        $business->email = $request->email;
        $business->description = $request->description;
        $business->address = $request->address;

        if ( !empty( $request->address) ) {
            $business->map = $request->address;
        }
        
        if ( !empty( $request->phone ) ) {
            $business->phone = $request->phone;
        }

        if ( !empty( $request->store ) ) {
            $business->store = $request->store;
        }

        if ( !empty( $request->hours ) ) {
            $business->hours = $request->hours;
        }

        if ( !empty( $request->logo ) ) {
            $business->logo = $request->logo->store('logos');
        }

        $business->save();
    
        return redirect('/home');        
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
