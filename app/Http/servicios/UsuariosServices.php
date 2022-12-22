<?php

namespace App\Http\servicios;

use Illuminate\Support\Facades\Http;

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
        $url = $this->baseUrl.'/'.$this->tokenApi.'/'.'transaction/'.$id;
        $url = $this->baseUrl.'/'.$this->tokenApi;
        $response = Http::get($url);
        $response = $response->json();
    
    }catch(\Exception $e){
        throw $e;

    }
    return $response;
  }

}