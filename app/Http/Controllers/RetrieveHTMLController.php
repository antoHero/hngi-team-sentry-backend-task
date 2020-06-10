<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetrieveHTMLController extends Controller
{
    public function __invoke(Request $request) {
    	//get a page using the its title
        $title = $request['page_title'];
    	$page = Page::where('page_title', '=', $title);

    	if($page === NULL) {
    		return response()->json(['code' => '400', 'error' => 'Sorry, this request is invalid']);
    	} 

    	//check if the page exists
    	if($page->exists()) {
    		return response()->json(['code' => '200', 'Title' => $title]);
    	} else {
    		return response()->json(['code' => '404', 'error' => 'Page not found']);
    	}
    	
    }
}
