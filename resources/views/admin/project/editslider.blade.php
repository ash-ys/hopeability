@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('EditSlider') }}</div>

                <div class="card-body">
                   <form action="{{route('postEditSlider', $slider->id)}}" method="Post" enctype="multipart/form-data">
                   @csrf()
                    <div class="form-group">
                        <input type="text" class="form-control" value="{{$slider->title}}" name="title">
                    </div>
                    <div class="form-group">
                        <textarea name="details" placeholder="Project Detail" class="form-control" id="" cols="30" rows="10">{{$slider->details}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="photo" class="form-control">
                        <img src="{{asset('site/uploads/sliders/'.$slider->image)}}" alt="" width="100">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Edit" class="form-control">
                        
                    </div>
                   </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
