<?php

namespace App\Http\Controllers;

use App\Models\MerchantVerification;
use App\Http\Requests\StoreMerchantVerificationRequest;
use App\Http\Requests\UpdateMerchantVerificationRequest;

class MerchantVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMerchantVerificationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerchantVerificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MerchantVerification  $merchantVerification
     * @return \Illuminate\Http\Response
     */
    public function show(MerchantVerification $merchantVerification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MerchantVerification  $merchantVerification
     * @return \Illuminate\Http\Response
     */
    public function edit(MerchantVerification $merchantVerification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMerchantVerificationRequest  $request
     * @param  \App\Models\MerchantVerification  $merchantVerification
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerchantVerificationRequest $request, MerchantVerification $merchantVerification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MerchantVerification  $merchantVerification
     * @return \Illuminate\Http\Response
     */
    public function destroy(MerchantVerification $merchantVerification)
    {
        //
    }
}
