<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PromoService;
use App\Http\Requests\PromoRequest;
use App\Models\Promo;
use App\Http\Resources\PromoCollection;

class PromoController extends Controller
{
    //
    public function __construct(PromoService $promoService)
    {
        $this->promoService = $promoService;
    }

    public function index(Request $request)
    {
        $promos = $this->promoService->index($request);
        if($promos){
            $promoDetail['promos'] = PromoCollection::collection($promos);
            return apiResponse("Promos listed sucessfully", 200, $promoDetail);
        }else{
            return apiResponse("Promos are not listed", 400, (object)[]);
        }
    }

    public function show($id)
    {
        $promo = $this->promoService->show($id);
        if($promo){
            $promoDetail = new PromoCollection($promo);
            return apiResponse("Promo details listed sucessfully", 200, $promoDetail);
        }else{
            return apiResponse("Promo details are not listed", 400, (object)[]);
        }
    }

}
