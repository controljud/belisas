<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\Establishment;

use Exception;

class EstablishmentController extends Controller
{
    public function getEstablishments(Request $request, $id_user)
    {
        try {
            $establishments = Establishment::all();

            return response()->json([
                'status' => 1,
                'message' => 'Store retornado com sucesso',
                'data' => $establishments
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

    public function postEstablishment(Request $request)
    {
        try {
            $establishmentArray = $request->all();

            $establishment = new Establishment;
            $establishment->fill($establishmentArray);
            $establishment->save();

            return response()->json([
                'status' => 1,
                'message' => 'Estabelecimento salvo com sucesso',
                'data' => null
            ]);
        } catch (Exception $ex) {
            Log::error("ESTABLISHMENT SAVE: " . json_encode($ex));

            return response()->json([
                'status' => 0,
                'message' => 'Ocorreu um erro desconhecido. Tente novamente mais tarde.',
                'data' => null
            ], 500);
        }
    }
}