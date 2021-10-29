<?php

namespace App\Http\Controllers;

use App\Models\Data;
use App\Exports\DatasExport;
use App\Imports\DatasImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImportExport()
    {
       return view('file-import');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request) 
    {
        Excel::import(new DatasImport, $request->file('file')->store('temp'));
        return back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport() 
    {
        // DB::table('data')->delete();
        $datas = Data::all();

        if ( count($datas) > 0 ) {
            return Excel::download(new DatasExport, 'fee-calculate.xlsx');
        } else {
            return back()->with('success','Item created successfully!');
        }
        
    } 

    public function fileReset() 
    {
        DB::table('data')->delete();
        return back();
    }
}
