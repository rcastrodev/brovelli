<?php

namespace App\Http\Controllers;

use App\Page;
use App\Content;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Storage;

class DownloadListController extends Controller
{
    protected $page;

    public function __construct(){
        $this->page = Page::where('name', 'lista-de-precios')->first();
    }

    public function content()
    {
        return view('administrator.download-list.content');
    }
    
    public function createInfo(Request $request)
    {
        $data = $request->all();

        if($request->hasFile('content_3'))            
            $data['content_3'] = $request->file('content_3')->store('images/download-list','public');

        if($request->hasFile('content_4'))            
            $data['content_4'] = $request->file('content_4')->store('images/download-list','public');

        
        Content::create($data);

        return back()->with('mensaje', 'creado con exito');
    }

    public function updateInfo(Request $request)
    {
        $element= Content::find($request->input('id'));
        $data   = $request->all();
        
        if($request->hasFile('content_3')){
            if(Storage::disk('public')->exists($element->content_3))
                Storage::disk('public')->delete($element->content_3);
            
            $data['content_3'] = $request->file('content_3')->store('images/download-list','public');
        } 

        if($request->hasFile('content_4')){
            if(Storage::disk('public')->exists($element->content_4))
                Storage::disk('public')->delete($element->content_4);
            
            $data['content_4'] = $request->file('content_4')->store('images/download-list','public');
        } 

        $element->update($data);

        return back()->with('mensaje', 'Contenido actualizado con exito');
    }


    public function destroySlider($id)
    {
        $element = Content::find($id);
        if(Storage::disk('public')->exists($element->content_3))
            Storage::disk('public')->delete($element->content_3);

        if(Storage::disk('public')->exists($element->content_4))
            Storage::disk('public')->delete($element->content_4);
        
        $element->delete();
        
        return response()->json([], 200);
    }

    public function sliderGetList()
    {
        $sectionSlider = $this->page->sections()->where('name', 'section_1')->first();

        $sliders = $sectionSlider->contents()->orderBy('order', 'ASC');

        return DataTables::of($sliders)
        ->editColumn('content_2', function($slider){
            return Str::of($slider->content_2)->limit(300);
        })
        ->editColumn('content_3', function($slider){
            if (Storage::disk('public')->exists($slider->content_3)) 
                return 'Archivo cargado';
        })
        ->editColumn('content_4', function($slider){
            if (Storage::disk('public')->exists($slider->content_4)) 
                return 'Archivo cargado';
        })
        ->addColumn('actions', function($slider) {
            return '<button type="button" class="btn btn-sm btn-primary rounded-pill far fa-edit" data-toggle="modal" data-target="#modal-update-element" onclick="findContent('.$slider->id.')"></button><button class="btn btn-sm btn-danger rounded-pill" onclick="modalDestroy('.$slider->id.')" title="Eliminar slider"><i class="far fa-trash-alt"></i></button>';
        })
        ->rawColumns(['actions', 'content_2', 'content_3', 'content_4'])
        ->make(true);
    }
}

