<?php

namespace App\Imports;

use App\Models\Data;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DatasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {        
        $name = strval($row[0]);
        $address = strval($row[1]);
        $price = 115;

        if ( strpos($row[0], ',') !== false) {
            $row = explode( ',', $row[0]);
            $name = $row[0];
            $address = $row[1];
        }            
        
        if($name === "会社名" && $address === "住所") {
            return;
        }        

        if(strpos($address, '東京都') !== false){
            $price = 95;
        } elseif ( strpos($address, '千葉県') !== false || strpos($address, '埼玉県') !== false || strpos($address, '神奈川県') !== false ) {
            $price = 105;
        }
    
        return new Data([            
            'name' => $name,
            'address' => $address,
            'price' => $price
        ]);
    }
}
