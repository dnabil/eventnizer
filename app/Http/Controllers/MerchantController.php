<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMerchantRequest;
use App\Http\Requests\UpdateMerchantRequest;
use App\Models\MerchantVerification;
use Illuminate\Support\Arr;
use PhpParser\Node\Stmt\TryCatch;

class MerchantController extends Controller
{

    public function registerView()
    {
        return view('register-merchant', [
            'title' => 'Registrasi Mitra | eventnizer',
            'provinces' => \Indonesia::allProvinces()
        ]);
    }
    public function editView()
    {
        $user = auth()->user();
        try {
            $merchant = $user->merchant->where('id', $user->id)->with('product')->first();
        } catch (\Throwable $th) {
            return redirect('/')->with('error', 'Anda bukan mitra/merchant');
        }
        return view('merchant.edit', [
            'title' => 'edit mitra | eventnizer',
            'merchant' => $merchant
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $userID = auth()->user()->id;
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:50',
            'provinsi' => "numeric",
            'kecamatan' => "numeric",
            'kelurahan' => "numeric",
        ]);


        //appends default photo and generate unique slug
        $arr = array();
        $arr += ['id' => $userID];
        $arr += ['name' => $validatedData['name']];
        $arr += ['description' => $validatedData['description']];
        $arr += ['photo' => "/img/merchant/default.jpg"];
        $arr += ['slug' => unique_random('merchants', 'slug', 15)];
        $arr += [config('laravolt.indonesia.table_prefix') . "province_id" => $request->get('provinsi')];
        $arr += [config('laravolt.indonesia.table_prefix') . "city_id" => $request->get('kota')];
        $arr += [config('laravolt.indonesia.table_prefix') . "district_id" => $request->get('kecamatan')];


        Merchant::create($arr);

        //untuk sementara merchant langsung terverifikasi
        MerchantVerification::create([
            'merchant_id' => $arr['id'],
            'isValid' => 1
        ]);
        return redirect('/')->with('success', 'Ajuan pendaftaran mitra telah berhasil dikirim');
    }

    /**
     * Menampilkan view profil mitra.
     *
     */
    public function index($slug)
    {
        $merchant = Merchant::with(['province', 'city', 'district', 'user', 'product'])->where('slug', $slug)->first();
        return view('merchant-profile', [
            'title' => $merchant->name . " | eventnizer",
            'merchant' => $merchant
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMerchantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerchantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show(Merchant $merchant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchant $merchant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMerchantRequest  $request
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerchantRequest $request, Merchant $merchant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchant $merchant)
    {
        //
    }
}
