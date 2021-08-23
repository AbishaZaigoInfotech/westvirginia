<?php

namespace App\Services;

use App\Models\Promo;
use Illuminate\Http\Request;
use App\Http\Requests\PromoRequest;

class PromoService
{
    public function index(Request $request)
    {
        $limit = request('limit') ? request('limit') : config('stations.pageLimit');
        $promos = Promo::orderBy('id', 'desc')->paginate($limit);
        return $promos;
    }

    public function store(PromoRequest $request)
    {
        $promo = new Promo;
        $promo->title = $request->title;
        if($request->image!=NULL) {
            $image_name = 'image_' . time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->storeAs('/public/images/', $image_name);
            $promo->image = $image_name;
        }
        $promo->save();
        return $promo;
    }

    public function show($id)
    {
        $promo = Promo::where('id', $id)->first();
        return $promo;
    }

    public function update(PromoRequest $request, $id)
    {
        $promo = Promo::find($id);
        $promo->title = $request->title;
        if($request->image!=NULL) {
            $image_name = 'image_' . time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->storeAs('/public/images/', $image_name);
            $promo->image = $image_name;
        }
        $promo->save();
        return $promo;
    }

    public function destroy($id)
    {
        $promo = Promo::find($id);
        $promo->delete();
        return $promo;
    }

}

?>