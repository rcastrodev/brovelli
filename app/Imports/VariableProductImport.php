<?php

namespace App\Imports;

use App\VariableProduct;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class VariableProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (isset($row['product_id']) && isset($row['contenido'])) {
            $variable = $this->getVariableProduct($row['product_id'], $row['contenido']);
            $array = [
                'product_id' => $row['product_id'],
                'diameter'   => $row['contenido'],
            ];
            
            if ($variable)
                $variable->update($array);
             else 
                return new VariableProduct($array);
        }
    }

    public function headingRow(): int
    {
        return 1;
    }

    protected function getVariableProduct($product_id, $diameter)
    {
        return VariableProduct::where('product_id', $product_id)->where('diameter', $diameter)->first();
    }
}
