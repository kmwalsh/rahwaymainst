<?php

namespace App\Http\Controllers;

use App\Business;
use App\BusinessClaim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

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
            'name'          => 'required|max:255',
            'description'   => 'required|max:255',
            'phone'         => 'required|max:20',
            'hours'         => 'required|max:1000',
            'address'       => 'required|max:255',
            'logo'          => 'mimes:jpeg,jpg,bmp,png,webp'
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

    public function editBusiness(Request $request) {
        $businesses = Business::where('id', $request->id)->first();
        return view('edit', [
            'business' => $businesses,
            'search'     => false,
        ]);
    }

    public function updateBusiness(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|max:255',
            'description'   => 'required|max:255',
            'phone'         => 'required|max:20',
            'hours'         => 'required|max:1000',
            'address'       => 'required|max:255',
            'logo'          => 'mimes:jpeg,jpg,bmp,png,webp'
        ]);
    
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }
        
        // HERE MUST GET BUSINESS THAT WE ARE UPDATING
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
    
        return back();        
    }

    public function claimBusinessForm(Request $request) {
        $businesses = Business::where('id', $request->id)->first();
    
        return view('claim', [
            'businesses' => $businesses,
            'user' => $request->user(),
        ]);
    }

    public function claimBusiness(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:25',
            'comments' => 'required|between:25,255',
        ]);
    
        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }
        
        $claim = new BusinessClaim;
        $claim->name = $request->name;
        $claim->email = $request->email;
        $claim->phone = $request->phone;
        $claim->comments = $request->comments;

        $claim->save();
    
        return back()->withInput()->with('message', 'Thank you for your business claim request. An administrator will review it and get back to you.');

    }

    // there are libraries that handle phone number formatting for international etc.
    // this is honestly good enough for now, don't need to install packages or anything
    // all phone numbers will be the standard US format anyways because hyperlocal site
    public static function formatPhone($number) {
        // Allow only Digits, remove all other characters.
        $number = preg_replace("/[^\d]/","",$number);
       
        // get number length.
        $length = strlen($number);
       
       // if number = 10
       if($length == 10) {
        $number = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "$1-$2-$3", $number);
       }
        
        return $number;
    }

    // there are libraries that handle phone number formatting for international etc.
    // this is honestly good enough for now, don't need to install packages or anything
    // all phone numbers will be the standard US format anyways because hyperlocal site
    public static function formatPhoneForDialing($number) {
        // Allow only Digits, remove all other characters.
        $number = preg_replace("/[^\d]/","",$number);
        return $number;
    }
}
