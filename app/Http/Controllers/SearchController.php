<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Candidate;

class SearchController extends Controller
{
  public function execute(Request $request) {
    if($request->isMethod('POST')){


        $validator = Validator::make($request->all(), [
            'name'=> 'required_without_all:surname,keywords|max:200',

        ], ['name.required_without_all' => 'fill at least your name!']);

        if ($validator->passes()) {

          $result = Candidate::where('name', 'like', '%'.$request->name.'%' )
          ->Where('surname', 'like', '%'.$request->surname.'%')
          ->Where('keywords', 'like', '%'.$request->keywords.'%')->get();


            return view('search', [
              'errors' => '',
              'list'  =>  $result
            ]);

        }
        $msg = $validator->errors()->messages();

        $error_name     = array_key_exists('name', $msg)      ?  $msg['name'][0]     : '';

        return view('search', [
          'errors' => $error_name,
          'list' => null
      ]);
    }
    return view('search', [
      'errors' => '',
      'list' => null
  ]);
  }
  public function download($file_name) {
  return Storage::download('cvs/'.$file_name);

  }
}
