<?php

/* declare(strict_types=1); */

namespace App\Http\Controllers;


use App\Http\servicios\UsuariosServices;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

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
    public function transacciones (int $id ) {
        $mensaje = '';
            
         /* $data = $this->ordenar($response); */

         return $data = $this->usuariosService->getTransactions($id);

         if(empty($data)){
            $mensaje = 'El usuario aun no tiene transacciones';
         }

         
    }

    public function findUser($id){
         $data = $this->usuariosService->getUsuarioForId($id);

        return response()->json([
            'data' => $data
        ]);
    }

    public function paginate($items, $request, $perPage = 15, $page = null)
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, [
            'path'  => $request->url(),
            'query' =>$request->query()
        ]);
    }

   
    // metodo que ordena por fecha de creación de forma descendente
    public function ordenar($response){
        
        $data = json_decode($response, true);
        $data = collect($data)->sortBy('created_at', SORT_REGULAR, true);
        return $data;
    }
}
