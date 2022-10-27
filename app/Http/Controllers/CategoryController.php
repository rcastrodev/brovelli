<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use App\Category;
use Illuminate\Http\Request;
use App\Imports\CategoryImport;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function content()
    {
        return view('administrator.category.content');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        
        if($request->hasFile('image'))
            $data['image'] = $request->file('image')->store('images/category','public');

        Category::create($data);
        
        return response()->json([], 201);
    }

    public function update(CategoryRequest $request)
    {
        $element = Category::find($request->input('id'));
        $data = $request->all();
        
        if($request->hasFile('image')){
            if(Storage::disk('public')->exists($element->image))
                Storage::disk('public')->delete($element->image);
            
            $data['image'] = $request->file('image')->store('images/category','public');
        }   
 
        $element->update($data);
    }

    public function find($id)
    {
        $content = Category::find($id);
        return response()->json(['content' => $content]);
    }

    public function destroy($id)
    {
        $element = Category::find($id);

        if(Storage::disk('public')->exists($element->image))
            Storage::disk('public')->delete($element->image);

        $element->delete();

        return response()->json([], 200);
    }


    public function getList()
    {
        $categories = Category::orderBy('order', 'ASC');
        return DataTables::of($categories)
        ->editColumn('image', function($category) {
            if (Storage::disk('public')->exists($category->image))
                return '<img src="'.asset($category->image).'" width="80" height="50" style="object-fit: cover;">';
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'image'])
        ->make(true);
    }

    public function import(Request $request) 
    {
        try {
            if (! $request->hasFile('categories')) return back();
                $result = Excel::import(new CategoryImport, $request->file('categories'));
            
            return back()->with('mensaje', 'Importación completada con exito');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back();
        }

    }

}
