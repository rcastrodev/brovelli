<?php

namespace App\Http\Controllers;

use SEO;
use App\Data;
use App\Page;
use App\Content;
use App\Product;
use App\Service;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class PagesController extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = Data::first();
    }

    public function home()
    {
        $page = Page::where('name', 'home')->first();
        SEO::setTitle('home');
        SEO::setDescription(strip_tags($this->data->description));
        $sections   = $page->sections;
        $sliders    = $sections->where('name', 'section_1')->first()->contents;
        $section2   = $sections->where('name', 'section_2')->first()->contents()->first();
        $categories = Category::orderBy('order', 'ASC')->get();
        $news = Content::where('section_id', 7)->orderBy('order', 'ASC')->get();
        return view('paginas.index', compact('sliders', 'categories', 'section2', 'news'));
    }

    public function empresa()
    {
        $page = Page::where('name', 'empresa')->first();
        SEO::setTitle('empresa');
        SEO::setDescription(strip_tags($this->data->description));
        $sections = $page->sections;
        $sliders = $sections->where('name', 'section_1')->first()->contents()->orderBy('order', 'ASC')->get();
        $section2 = $sections->where('name', 'section_2')->first()->contents()->first();
        $section3s = $sections->where('name', 'section_3')->first()->contents()->orderBy('order', 'ASC')->get();
        $section4s = $sections->where('name', 'section_4')->first()->contents()->orderBy('content_2', 'ASC')->get();
        return view('paginas.empresa', compact('sliders', 'section2', 'section3s', 'section4s'));
    }


    public function categorias()
    {
        $categories = Category::orderBy('order', 'ASC')->get();
        return view('paginas.categorias', compact('categories'));
    }

    public function categoria($id)
    {
        $element = Category::findOrFail($id);
        $categories = Category::orderBy('order', 'ASC')->get();
        $products = $element->products;
        SEO::setTitle($element->name);
        return view('paginas.categoria', compact('element', 'products', 'categories'));
    }

    public function producto($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::orderBy('order', 'ASC')->get();
        SEO::setTitle($product->name);
        SEO::setDescription(strip_tags($product->description));
        return view('paginas.producto', compact('product', 'categories'));
    }

    public function novedades(Request $request)
    {
        SEO::setTitle('novedades');
        SEO::setDescription(strip_tags($this->data->description)); 
        $newss = Content::where('section_id', 7)->orderBy('order', 'ASC')->get();
        if ($request->get('categoria')) 
            $newss = Content::where('content_3', $request->get('categoria'))->orderBy('order', 'ASC')->get();
        
        return view('paginas.novedades', compact('newss'));
    }

    public function novedad(Content $new)
    {
        SEO::setTitle($new->content_1);
        SEO::setDescription(strip_tags($new->content_2));
        
        return view('paginas.novedad', compact('new'));
    }

    public function listaDePrecios()
    {
        SEO::setTitle('lista de precios');
        SEO::setDescription(strip_tags($this->data->description));
        $elements = Content::where('section_id', 8)->orderBy('order', 'ASC')->get();

        return view('paginas.lista-de-precios', compact('elements'));
    }

    public function solicitudDePresupuesto()
    {
        $page = Page::where('name', 'solicitudad-presupuesto')->first();
        SEO::setTitle("solicitud de presupuesto");
        SEO::setDescription(strip_tags($this->data->description));
        return view('paginas.solicitud-de-presupuesto');
    }

    public function contacto()
    {
        $page = Page::where('name', 'contacto')->first();
        SEO::setTitle("contacto");
        SEO::setDescription($page->keywords);      
        return view('paginas.contacto');
    }

    public function fichaTecnica($id)
    {
        $producto = Product::findOrFail($id); 
        if(Storage::disk('public')->exists($producto->data_sheet))
            return Response::download($producto->data_sheet); 
        else
            return back();   
    }

    public function borrarFichaTecnica($id)
    {
        $product = Product::findOrFail($id); 
        
        if(Storage::disk('public')->exists($product->data_sheet))
            Storage::disk('public')->delete($product->data_sheet);

        $product->data_sheet = null;
        $product->save();

        return response()->json([], 200);
    }
}
