<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNotices;
use App\Model\Categories;
use App\Model\Notices;
use Illuminate\Support\Facades\Auth;

class NoticesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notices::paginate(15);
        return view('admin.notices.index', compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('admin.notices.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotices $request)
    {
        $request->validated();
        try {
            Notices::create([
                'title' => $request->title,
                'description' => $request->description,
                'image_url' => $request->image_url,
                'categories_id' => $request->categories_id,
                'user_create_id' => Auth::user()->id, 
                'user_edit_id' => Auth::user()->id,
            ]);
            return redirect()->route('notices.index');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $notice = Notices::find($id);
            $categories = Categories::all();
            return view('admin.notices.edit', compact('notice','categories'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreNotices $request, $id)
    {
        $request->validated();
        try {
            Notices::where('id',$id)            
            ->update([
                'title' => $request->title,
                'description' => $request->description,
                'image_url' => $request->image_url,
                'categories_id' => $request->categories_id,                
                'user_edit_id' => Auth::user()->id
                ]);
                return redirect()->back()->with('message','Atualizado com sucesso.');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Notices::where('id',$id)->delete();
        return redirect()->back()->with('message','Postagem excluida com sucesso');
    }
}
