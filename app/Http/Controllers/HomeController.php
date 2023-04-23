<?php

namespace App\Http\Controllers;

use App\Models\slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function getAddSliders(){
        $data =[
            'sliders' => slider::all()
        ];
        return view('admin.project.sliders', $data);
    }

    public function postAddSliders(Request $request)
    {
    $image = $request ->file('photo');
    $unique_name = md5(time());
    $extension_name = $image -> getClientOriginalExtension();
    $fullname = $unique_name.'.'.$extension_name;

    $image->move('site/uploads/sliders/', $fullname);



    $xero= New Slider;
    $xero-> title=$request ->input('title');
    $xero-> details=$request ->input('details');
    $xero-> image=$fullname;
    $xero -> save();
    return redirect()->back()->with ('status', 'Slider added successfully');
    }

    public function getDeleteSlider(Slider $slider){
        unlink('site/uploads/sliders/'.$slider->image);
        $slider->delete();
        return redirect()->back()->with ('status', 'Slider deleted successfully');
    }

    public function getEditSlider(Slider $slider){
        $data =[
            'slider' => $slider
        ];
        return view('admin.project.editslider', $data);
    }

    public function postEditSlider(Request $request, Slider $slider){
        if($request->file('photo')){
            $image = $request ->file('photo');
            $unique_name = md5(time());
            $extension_name = $image -> getClientOriginalExtension();
            $fullname = $unique_name.'.'.$extension_name;
        
            $image->move('site/uploads/sliders/', $fullname);

            $slider->title = $request->input('title');
            $slider->details = $request->input('details');
            $slider->image = $fullname;
            $slider->save();
        }
        else{
            $slider->title = $request->input('title');
            $slider->details = $request->input('details');
            $slider->save();
        }
        return redirect()->route('getAddSliders')->with ('status', 'Project edited successfully');
    }
}
