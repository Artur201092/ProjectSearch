<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Candidate;

class IndexController extends Controller
{
    public function execute(Request $request) {
      if($request->isMethod('POST')) {

  $messages = [
      'name.required'             => 'tell us your name',
      'surname.required'          => 'fill your last name',
      'keywords.required'         => 'tell us about your skills',
      'cv.required'               => 'give us Your cv!'
      ];

    $validator = Validator::make($request->all(), [
        'name'                  => 'string|required|max:200',
        'surname'               => 'string|required|max:200',
        'keywords'              => 'string|required|max:200',
        'cv'                    => 'required'
    ], $messages);

    if ($validator->passes()) {
      Storage::putFileAs('cvs', $request->cv, $request->cv->getClientOriginalName());
      Candidate::create(
    [
      'name' => $request->name,
      'surname' => $request->surname,
      'keywords' => $request->keywords,
      'file_name' => $request->cv->getClientOriginalName()
    ]);
        return view('main', [
          'hide'   => '',
          'errors' => []
        ]);

    }
    $msg = $validator->errors()->messages();
    $errors = [];
    $errors['name']     = array_key_exists('name', $msg)      ? $msg['name'][1]     : '';
    $errors['surname']  = array_key_exists('surname', $msg)   ? $msg['surname'][1]  : '';
    $errors['keywords'] = array_key_exists('keywords', $msg)  ? $msg['keywords'][1] : '';
    $errors['file']     = array_key_exists('cv', $msg)        ? $msg['cv'][0]       : '';
    return view('main', [
      'errors' => $errors,
      'hide'   => 'hide',
  ]);
      }
      return view('main', [
        'hide'       => 'hide',
        'errors' => []
      ]);
    }
}
