<?php

namespace App\Imports;

use App\Sales;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportSales implements ToCollection, WithHeadingRow
{
    /**
     * @param Collection $collection
     */

    public function collection(Collection $collection)
    {
        return new Sales([
            'region' => $collection[0],
            'country' => $collection[1],
            'item_type' => $collection[2],
            'sales_channel' => $collection[3],
            'order_priority' => $collection[4],
            'order_date' => $collection[5],
            'order_id' => $collection[6],
            'ship_date' => $collection[7],
            'units_sold' => $collection[8],
            'unit_price' => $collection[9],
            'total_revenue' => $collection[10],
            'total_cost' => $collection[11],
            'total_profit' => $collection[12],
        ]);
    }
}
