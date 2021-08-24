<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PromoService;
use App\Http\Requests\PromoRequest;
use App\Models\Promo;

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
        return view('promos.index', compact('promos'));
    }

    public function create()
    {
        return view('promos.create');
    }

    public function store(PromoRequest $request)
    {
        $promo = $this->promoService->store($request);
        return redirect()->route('promos.index');
    }

    public function show($id)
    {
        $promo = $this->promoService->show($id);
        return view('promos.show', compact('promo'));
    }

    public function edit($id)
    {
        $promo = Promo::where('id', $id)->first();
        return view('promos.edit', compact('promo'));
    }

    public function update(PromoRequest $request, $id)
    {
        $promo = $this->promoService->update($request, $id);
        return redirect()->route('promos.index');
    }

    public function destroy($id)
    {
        $promo = $this->promoService->destroy($id);
        return redirect()->route('promos.index');
    }
 
}
