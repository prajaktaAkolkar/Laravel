<?php

namespace App\Http\Controllers;

use App\Models\Curd;
use Illuminate\Http\Request;

class CurdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('curd_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $res = new Curd;
        $res->name=$request->input('name');
        $res->save();

        $request->session()->flash('msg','Data Submitted');
        return redirect('curd_show');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curd  $curd
     * @return \Illuminate\Http\Response
     */
    public function show(Curd $curd)
    {
        //
       return view('curd_show')->with('curdArr',Curd::All()); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curd  $curd
     * @return \Illuminate\Http\Response
     */
    public function edit(Curd $curd,$id)
    {
        return view('curd_edit')->with('curdArr',Curd::find($id)); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curd  $curd
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Curd $curd,$id)
    {
        //
    print_r($request->id);
    $res = Curd::find($request->id);
    $res ->name = $request['name']; 
    //$res->name=$request->input('name');
    $res->save();

    $request->session()->flash('msg','Data updates');
    return redirect('curd_show');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curd  $curd
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curd $curd,$id)
    {
        //
     
       // Curd::destroy(array('id',$id));

      $curd= Curd::find($id);
      if(!is_null($curd))
      {
          $curd->delete();
      }
       return redirect('/curd_show');
        //redirect('/curd_show');
    }
    public function forceDelete(Curd $curd,$id)
    {
        //
     
       // Curd::destroy(array('id',$id));

      $curd= Curd::withTrashed()->find($id);
      if(!is_null($curd))
      {
          $curd->forceDelete();
      }
       return redirect()->back();
        //redirect('/curd_show');
    }
    public function restore(Curd $curd,$id){
        $curd = Curd::withTrashed()->find($id);
        if(!is_null($curd))
      {
          $curd->restore();
      }
       return redirect('/curd_show');
    }

    public function trash()
    {
        $curd = Curd::onlyTrashed()->get();
        $data = compact('curd');
        return view('curd_trash')->with($data);
    }
}
