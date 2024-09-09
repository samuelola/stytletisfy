<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vendor;
use App\Models\User;
use Auth;
use App\Http\Requests\VendorRequest;
use App\Library\Utilities;
use App\Http\Resources\VendorResource;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorRequest $request)
    {
        $user = User::find(Auth::user()->id);
        foreach($user->vendors as $vendor){
           $find_vendor = Vendor::where('id',$vendor->id)->orderByDesc('created_at')->first();
           $vendor_data = $request->validated();
           $find_vendor->update($vendor_data);
           return Utilities::sendResponse(new VendorResource($find_vendor), 'Vendor saved successfully.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
