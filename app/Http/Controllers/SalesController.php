<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function upload(){
        if (request()->hasFile('file')) {

           // $data= array_map('str_getcsv',file(request()->file));
            $data=file(request()->file);
            /* Array Chunk */
            $chunks= array_chunk($data,1000);
            //convert 1000 records into a new csv file

            foreach($chunks as $key=>$chunk){
                $name="/tmp{$key}.csv";
                $path=resource_path('temp');
                file_put_contents($path.$name,$chunk);
            }
            exit;


            $header=$data[0];
            unset($data[0]);

            foreach($data as $item){
               $salesData=array_combine($header,$item);
               Sales::create($salesData);
            } 
            return 'Done';
        }else{
            echo "please upload the file now";
        }
        
    }
    public function store(){
        $path=resource_path('temp');
        $files=glob("$path/*.csv");
        $header=[];
        foreach ($files as $key=> $file) {
            $data=array_map('str_getcsv',file($file));
            if ($key==0) {
                $header=$data[0];
               unset($data[0]);
            }
            foreach($data as $sale){
                $salesData=array_combine($header,$sale);
                Sales::create($salesData);
            }
           
        }
        return 'Data Stored Successfully';
    }
}
