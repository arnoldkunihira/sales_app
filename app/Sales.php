<?php

namespace App;

use App\Jobs\ProcessCsvUpload;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Sales extends Model
{
    protected $guarded = [];

    protected $table = 'sales';

    public static function get_total_profit_made()
    {
        return DB::table('sales')->sum('total_profit');
    }

    public static function get_profitable_items()
    {
        $items = DB::table('sales')
            ->select('item_type')
            ->orderBy('total_profit', 'desc')
            ->limit(5)
            ->get();

        $index = 1;
        $indexed_items = [];

        foreach ($items as $item) {
            $indexed_items[$index] = $item;
            $index++;
        }

        return $indexed_items;
    }

    public function import_to_db()
    {
        $path = resource_path('pending_files/*.csv');
        $g = glob($path);

        foreach (array_slice($g, 0, 1) as $file) {
            ProcessCsvUpload::dispatch($file);
        }

        foreach (array_slice($g, 0, 1) as $file) {
            ProcessCsvUpload::dispatch($file);
        }
    }
}
