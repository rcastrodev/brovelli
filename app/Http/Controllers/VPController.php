<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VPController extends Controller
{
    function addVP(Request $request)
    {
        $vps = session('vps');
        $add = true; // Verificar
    
        // Si tiene valores
        if ($vps) {
            foreach ($vps as $k => $vp) {
                if($k == $request->id){
                    $vps[$k]['image'] = $request->image;   
                    $vps[$k]['code'] = $request->code;   
                    $vps[$k]['name'] = $request->name;   
                    $vps[$k]['diameter'] = $request->diameter;   
                    $vps[$k]['material'] = $request->material;   
                    $vps[$k]['amount'] = $request->amount + $vps[$k]['amount'];    
                    $add = false;
                }
            }
            // Si tiene pero no coincide con ninguno 
            if ($add){
                $vps[$request->id]['id']        = $request->id; 
                $vps[$request->id]['image']     = $request->image;   
                $vps[$request->id]['code']      = $request->code;   
                $vps[$request->id]['name']      = $request->name;   
                $vps[$request->id]['diameter']  = $request->diameter;   
                $vps[$request->id]['material']  = $request->material;   
                $vps[$request->id]['amount']    = $request->amount;    
            }
            
        }else{
            $vps[$request->id]['id']        = $request->id; 
            $vps[$request->id]['image']     = $request->image;   
            $vps[$request->id]['code']      = $request->code;   
            $vps[$request->id]['name']      = $request->name;   
            $vps[$request->id]['diameter']  = $request->diameter;   
            $vps[$request->id]['material']  = $request->material;   
            $vps[$request->id]['amount']    = $request->amount;   
        }

        session(['vps' => $vps]); 
        
        return response()->json([$vps], 201);
    }

    public function getSession(Request $request)
    {
        dd(session('vps'));
    }

    public function destroy($id)
    {
        $vps = session('vps');
        unset($vps[$id]);
        session(['vps' => $vps]);  
        return response()->json([session('vps')], 200);
    }
    
}
