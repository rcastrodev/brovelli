<?php

namespace App\Http\Controllers;

use App\VariableProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\VariableProductImport;
use App\Http\Requests\ProductVariableRequest;

class VariableProductController extends Controller
{
    public function store(ProductVariableRequest $request)
    {
        VariableProduct::create($request->all());
    }

    public function update(ProductVariableRequest $request)
    {
        $pv = VariableProduct::find($request->input('id'));
        $pv->update($request->all());
    }

    public function destroy($id)
    {
        VariableProduct::find($id)->delete();
    }

    public function import(Request $request) 
    {
        try {
            if (! $request->hasFile('variable-products')) return back();
                $result = Excel::import(new VariableProductImport, $request->file('variable-products'));

            return back()->with('mensaje', 'Importación completada con exito');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back();
        }


        
    }
}

