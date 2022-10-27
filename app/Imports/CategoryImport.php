<?php

namespace App\Imports;

use App\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $array = [
            'name'   => $row['name'],
            'image'  => 'images/category/'.$row['image']
        ];

        if (isset($row['name'])) {
            $category = $this->getCategory($row['name']);
            if ($category )
                $category->update($array);
            else
                return new Category($array);
        }

    }

    public function headingRow(): int
    {
        return 1;
    }

    protected function getCategory($name)
    {
        return Category::where('name', $name)->first();
    }
}
