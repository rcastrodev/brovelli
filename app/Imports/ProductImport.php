<?php

namespace App\Imports;

use App\Product;
use App\ProductPicture;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (isset($row['name'])) {
            $product = $this->getProduct($row['name']);
            $array = [
                'category_id'           => $row['category_id'],
                'code'                  => $row['code'],
                'name'                  => $row['name'],
                'description'           => $row['description'],
            ];

            if ($product)
                $product->update($array);
             else 
                $product = Product::create($array);

            if (isset($row['image'])) $this->getOrCreateImageProduct($product, $row['image']);
            
            return $product;
        }
    }

    public function headingRow(): int
    {
        return 1;
    }

    protected function getProduct($name)
    {
        return Product::where('name', $name)->first();
    }

    private function getOrCreateImageProduct(Product $product, $image)
    {  
        if (! ProductPicture::where('product_id', $product->id)->where('image', 'images/products/'.$image)->first()) 
            $product->images()->create(['image' => 'images/products/'.$image]);
         
    }
}
