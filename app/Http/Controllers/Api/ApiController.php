<?php

namespace App\Http\Controllers\Api;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subject;

class ApiController extends Controller
{
    //
    public function categories()
    {
       return  Category::select('id', 'name as text')->get();
       
    }

    public function subjects()
    {
        return Subject::select('id','name as text')->get();
    }

}
