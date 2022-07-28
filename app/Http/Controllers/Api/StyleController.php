<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Models\Styles;

use Exception;

class StyleController extends Controller
{
    public function getStyles()
    {
        try {
            $estilos = Styles::all();

            return response()->json([
                'status' => 1,
                'message' => 'Estilos retornados com sucesso',
                'data' => $estilos
            ]);
        } catch (Exception $ex) {
            Log::error("STYLES GET: " . json_encode($ex));

            return response()->json([
                'status' => 0,
                'message' => 'Ocorreu um erro desconhecido. Tente novamente mais tarde.',
                'data' => null
            ]);
        }
    }
}
