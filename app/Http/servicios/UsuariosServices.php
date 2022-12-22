<?php

namespace App\Http\servicios;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class UsuariosServices{

    private $baseUrl;
    private $tokenApi;
    
    public function  __construct(){
        $this->baseUrl = config('baseurl.base_url');
        $this->tokenApi = config('baseurl.token_api');
    }

 public function getUsuarios(){
        
    try{

        $url = $this->baseUrl.'/'.$this->tokenApi;
        $response = Http::get($url);
        $response = $response->json();
    
    }catch(\Exception $e){
        throw $e;

    }
    return $response;
  }

 
  public function getTransactions($id){

    try{

        $url = $this->baseUrl.'/'.$this->tokenApi.'/'.'transaction/'.$id;
        $response = Http::get($url);
        $response = $response->json();

    }catch(\Exception $e){
        throw $e;
    }
    return $response;

  }

  public function getUsuarioForId($id){
        
    try{
        
        $url = $this->baseUrl.'/'.$this->tokenApi;
        $response = Http::get($url);
        $response = json_decode($response, true);

        $usuarios = new Collection($response);
        $result = $usuarios->keyBy('user_id');
        $usuario = $result->get($id);
    
    }catch(\Exception $e){
        throw $e;

    }
    return $usuario;
  }

}