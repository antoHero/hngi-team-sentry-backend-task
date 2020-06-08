<?php

namespace App\Http\Controllers;
use App\File;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index($slug) {
    	$getPage = File::chunk('1000', function($pages) {
    		foreach ($pages as $page) {
    			# code...
    		}
    	})
    	$pages = $getPage->all();
    }
}
