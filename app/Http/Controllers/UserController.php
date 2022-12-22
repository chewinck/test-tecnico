<?php

/* declare(strict_types=1); */

namespace App\Http\Controllers;


use App\Http\servicios\UsuariosServices;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class UserController extends Controller{
    
    private UsuariosServices $usuariosService;

    public function  __construct(){

        $this->usuariosService = new UsuariosServices();
    }


    // metodo que consume API usuarios
    public function listar(Request $request){

        $data = $this->usuariosService->getUsuarios();
        $data = ($this->paginate($data, $request));

      return view('usuarios.listar')->with(['data'=> $data]);
    }


    // método que consume API de transacciones de usuarios
    public function transacciones (int $id, Request $request ) {
         
         $data = $this->usuariosService->getTransactions($id);
         $data = ($this->paginate($data, $request));
         return view('usuarios.transacciones')->with(['data'=> $data]);             
    }

    // método que consume API y encuentra un usuario específico con trasacciones
    public function findUser($id){

        $data = $this->usuariosService->getTransactions($id);
        $usuario = $this->usuariosService->getUsuarioForId($id);
        Log::info('Se consume el API de un usuario especifico con sus transacciones');
    
        return response()->json([
            'usuario' => $usuario,
            'transactions' => $data
            
        ]);
    }


    //metodo que se encarga de paginar y ordenar
    public function paginate($items, $request, $perPage = 15, $page = null){
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items)->sortBy('created_at', SORT_REGULAR, true);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path'  => $request->url(),
            'query' =>$request->query()
        ]);
    }
   
}
