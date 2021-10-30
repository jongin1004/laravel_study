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
        if ($request->file('file') === null ) {
            return back()->with('error','まず、ファイルを選択してください。');
        }

        Excel::import(new DatasImport, $request->file('file')->store('temp'));
        return back()->with('success','成功的にアップロードいたしました。');
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
            return back()->with('error','まず、アップロードをしてください。');
        }
        
    } 

    public function fileReset() 
    {
        $datas = Data::all();
        if ( count($datas) > 0 ) {
            DB::table('data')->delete();
            return back()->with('success','成功的にデータをリセットいたしました。');
        } else {
            return back()->with('error','既に空いております。');
        }
        

        
        
    }
}
