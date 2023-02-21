<?php

namespace App\Imports;

use App\Models\ProductMasterList;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new ProductMasterList([
            'product_id' => $row[0],
            'type' => $row[1],
            'brand' => $row[2],
            'model' => $row[3],
            'capacity' => $row[4],
            'quantity' => $row[5],
        ]);
    }
}
