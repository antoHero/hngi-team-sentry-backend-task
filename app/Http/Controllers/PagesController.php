<?php

namespace App\Http\Controllers;
use App\Page;

use Illuminate\Http\Request;

class PagesController extends Controller
{
	
    public function getPages() {
    	$page = new Page;
    	$pages = $pages->all();
    	return redirect()->route('list')->with('pages', $pages);
    }

    public function store(Request $request) {
    	$this->validate($request, [
    		'page_title' => 'required',
    		'page_content' => 'required'
    	]);

    	$page = new Page;
    	$page->page_title = $request->input('page_title');
    	$page->page_content = $request->input('page_content');

    	$page->save();

    	return $page;
    }

    
}
