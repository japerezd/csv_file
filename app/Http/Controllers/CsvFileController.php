<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\CsvExport;
use App\Imports\CsvImport;
use Maatwebsite\Excel\Facades\Excel;

use App\User;
class CsvFileController extends Controller
{
    //
    public function index()
    {
        $data = User::latest()->paginate(10);
        return view('csv_file_pagination',compact('data'))
            ->with('i',(request()->input('page',1)-1)*10);
    }

    public function csv_export()
    {
        // exportara todos los datos en archivo csv
        return Excel::download(new CsvExport, 'sample.csv');
    }

    public function csv_import()
    {
        //importara datos del archivo seleccionado
        Excel::import(new CsvImport, request()->file('file'));
        return back(); //nos regresara a la ubicacion anterior
    }
}
