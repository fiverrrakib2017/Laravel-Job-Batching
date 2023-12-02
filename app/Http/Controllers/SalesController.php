<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function store(){
        if (request()->hasFile('file')) {

            $data= array_map('str_getcsv',file(request()->file));
            
            $header=$data[0];
            unset($data[0]);

            foreach($data as $item){
               $salesData=  array_combine($header,$item);
               Sales::create($salesData);
            } 
            return 'Done';
        }else{
            echo "please upload the file now";
        }
        
    }
}
