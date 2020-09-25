<?php

namespace App\Http\Controllers\Import;

use App\Sales;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $sales = DB::table('sales')->orderBy('created_at', 'asc')->get();
        return view('imports.index', compact('sales'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        $file = file($request->file->getRealPath());
        $data = array_slice($file, 1);

        $parts = (array_chunk($data, 1000));

        foreach($parts as $index => $part) {
            $fileName = resource_path('pending_files/' . date('y-m-d-H-i-s'). $index . 'csv');
            file_put_contents($fileName, $part);
        }

        (new Sales())->import_to_db();

        session()->flash('status', 'queued for importing');
        return redirect('import');
    }
}
