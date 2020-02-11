<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Notices;

class BlogController extends Controller
{
    public function index()
    {
        $last_notice = Notices::orderBy('created_at','desc')->first();
        $notices = Notices::orderBy('created_at')->where('id','!=',$last_notice->id)->limit(2)->get();
        return view('blog.index',compact('last_notice','notices'));
    }
}
