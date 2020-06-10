<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddPageController extends Controller
{
    public function __invoke(Request $request) 
    {
    	//get all POST requests
    	$title = $request['page_title'];
        $content = $request['page_content'];

        //check if page already exists
        $page = Page::where([
            ['page_title', '=', $title],
            ['page_content', '=', $content]
        ]);
        try {
            if(!$pages) {
                $page = new Page;
                $page->page_title = $title;
                $page->page_content = $content;

                //get filename extension

                Storage::disk('local')->put($title, $content);
                return response()->json(['code' => '201', 'message' => 'Page added successfully']);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e]);  
        }
    }
}
