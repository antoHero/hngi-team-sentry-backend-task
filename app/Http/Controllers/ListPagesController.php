<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListPagesController extends Controller
{
    public function __invoke(Request $request) {
    	$folder = 'files';
        $disk = 'public';

        // $pages = array_slice(scandir($disk), 1);
        // $files = $request->file()->store();
        $pages = array_slice(Storage::files('/'), function($file) {
            return '.gitignore' != $file;
        });
        if(count($files) > 0) {
            return response()->json(['pages' => $pages]);
        }  else {
            return response()->json(['code' => '404', 'error' => 'No pages found']);
        }
    }
}
