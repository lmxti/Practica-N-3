<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Interaccion;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Spatie\FlareClient\Http\Response as HttpResponse;

use App\Http\Requests\InteraccionRequest;


class InteraccionController extends Controller
{
    public function createInteraccion(InteraccionRequest $request){
        try {
            $interaccion = new Interaccion();
            $interaccion->idPerroInteresado = $request->idPerroInteresado;
            $interaccion->idPerroCandidato = $request->idPerroCandidato;
            $interaccion->preferencia = $request->preferencia;
            $interaccion->save();
            return response()->json([
                "message" => "Interaccion creada correctamente",
                "interaccion" => $interaccion
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                "message" => "Error al crear la interaccion",
                "error" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function viewInteraccion(Request $request){
        try {
            $interaccion = Interaccion::find($request->id);
            return response()->json([
                "message" => "Interaccion encontrada correctamente",
                "interaccion" => $interaccion
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                "message" => "Error al encontrar la interaccion",
                "error" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function updateInteraccion(InteraccionRequest $request){
        try {
            $interaccion = Interaccion::find($request->id);
            $interaccion->idPerroInteresado = $request->idPerroInteresado;
            $interaccion->idPerroCandidato = $request->idPerroCandidato;
            $interaccion->preferencia = $request->preferencia;
            $interaccion->save();
            return response()->json([
                "message" => "Interaccion actualizada correctamente",
                "interaccion" => $interaccion
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                "message" => "Error al actualizar la interaccion",
                "error" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function deleteInteraccion(InteraccionRequest $request){
        try {
            $interaccion = Interaccion::find($request->id);
            $interaccion->delete();
            return response()->json([
                "message" => "Interaccion eliminada correctamente",
                "interaccion" => $interaccion
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                "message" => "Error al eliminar la interaccion",
                "error" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
