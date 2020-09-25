<?php

namespace App\Jobs;

use App\Sales;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessCsvUpload implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $file;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dump('Processing this file:------', $this->file);
        $data = array_map('str_getcsv', file($this->file));

        foreach ($data as $row) {
            Sales::updateOrCreate([
                'region' => $row[0]
            ], [
                'country' => $row[1],
                'item_type' => $row[2],
                'sales_channel' => $row[3],
                'order_priority' => $row[4],
                'order_date' => $row[5],
                'order_id' => $row[6],
                'ship_date' => $row[7],
                'units_sold' => $row[8],
                'unit_price' => $row[9],
                'total_revenue' => $row[10],
                'total_cost' => $row[11],
                'total_profit' => $row[12]
            ]);
        }

        dump('Done processing this file:------', $this->file);
        unlink($this->file);
    }
}
