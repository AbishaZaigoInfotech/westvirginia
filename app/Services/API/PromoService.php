<?php

namespace App\Services\API;

use App\Models\Promo;
use Illuminate\Http\Request;
use App\Http\Requests\PromoRequest;

class PromoService
{

    public function index(Request $request)
    {
        try{
            $promos = Promo::get();
            return $promos;
        } catch (\Exception $e) {
            return false;
        }
    }

    public function show($id)
    {
        try{
            $promo = Promo::where('id', $id)->first();
            return $promo;
        } catch (\Exception $e) {
            return false;
        }
    }

}

?>