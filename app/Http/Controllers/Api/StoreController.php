<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\Store;

use Exception;

class StoreController extends Controller
{
    public function getStores(Request $request, $id_user)
    {
        try {
            $stores = Store::all();

            return response()->json([
                'status' => 1,
                'message' => 'Store retornado com sucesso',
                'data' => $stores
            ]);
        } catch (Exception $ex) {
            Log::error("STORES GET: " . json_encode($ex));

            return response()->json([
                'status' => 0,
                'message' => 'Ocorreu um erro desconhecido. Tente novamente mais tarde.',
                'data' => null
            ]);
        }
    }

    public function postStore(Request $request)
    {
        try {
            $storeArray = $request->all();

            $store = new Store;
            $store->fill($storeArray);
            $store->save();

            return response()->json([
                'status' => 1,
                'message' => 'Empreendimento salvo com sucesso',
                'data' => null
            ]);
        } catch (Exception $ex) {
            Log::error("STORE SAVE: " . json_encode($ex));

            return response()->json([
                'status' => 0,
                'message' => 'Ocorreu um erro desconhecido. Tente novamente mais tarde.',
                'data' => null
            ], 500);
        }
    }
}