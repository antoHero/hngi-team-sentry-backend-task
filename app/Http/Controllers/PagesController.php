<?php

namespace App\Http\Controllers;
use App\Page;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function getPages() {
    	$page = new Page;
    	$pages = $pages->all();
    	return response()->json($pages);
    }

    public function store(Request $request) {
    	//get all POST requests
    	$input = $request->all();

    	//store any error message in the empty array
    	$errorMessage = array();

    	//return an error message if page_title is not set
    	if(!isset($input['page_title'])) {
    		$errorMessage[] = 'The page title cannot be left empty';
    	}

    	//return an error message if the page_content is not set
    	if(!isset($input['page_content'])) {
    		$errorMessage[] = 'You have to add a content to the page';
    	}

    	//check if there are errors and return the appropriate response message
    	if(sizeof($errorMessage) > 0) {
    		return response()->json('code' => '400', 'error' => $errorMessage);
    	}

    	//if there are no errors, store the new page
    	$page = new Page;
    	$page->save();

    	return response()->json(['code' => '200', 'message' => 'You have successfully added a new page']);

    }

    public function retrievePage($id) {
    	//get a page using the its title
    	$page = Page::where('page_title', '=', Input::get('page_title'));

    	if($page === NULL) {
    		return response()->json('code' => '400', 'error' => 'Sorry, this request is invalid');
    	} 

    	//check if the page exists
    	if($page->exists()) {
    		return response()->json('code' => '200', 'Title' => $page);
    	} else {
    		return response()->json('code' => '404', 'error' => 'Page not found');
    	}
    	
    }

    
}
