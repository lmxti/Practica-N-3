<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perro;
// Ver para que sirve exeption
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Spatie\FlareClient\Http\Response as HttpResponse;

use App\Http\Requests\PerroRequest;

class PerroController extends Controller
{
    public function createPerro(PerroRequest $request){
        try {
            $perro = new Perro();
            $perro->name = $request->name;
            $perro->url = $request->url;
            $perro->descripcion = $request->descripcion;
            $perro->save();
            return response()->json([
                "message" => "Perro creado correctamente",
                "perro" => $perro
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                "message" => "Error al crear el perro",
                "error" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function viewPerro(PerroRequest $request){
        try {
            $perro = Perro::find($request->id);
            return response()->json([
                "message" => "Perro encontrado correctamente",
                "perro" => $perro
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                "message" => "Error al encontrar el perro",
                "error" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function updatePerro(PerroRequest $request){
        try {
            $perro = Perro::find($request->id);
            $perro->name = $request->name;
            $perro->url = $request->url;
            $perro->descripcion = $request->descripcion;
            $perro->save();
            return response()->json([
                "message" => "Perro actualizado correctamente",
                "perro" => $perro
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                "message" => "Error al actualizar el perro",
                "error" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    public function deletePerro(PerroRequest $request){
        try {
            $perro = Perro::find($request->id);
            $perro->delete();
            return response()->json([
                "message" => "Perro eliminado correctamente",
                "perro" => $perro
            ], Response::HTTP_OK);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                "message" => "Error al eliminar el perro",
                "error" => $e->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}


























