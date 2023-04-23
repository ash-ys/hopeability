@extends ('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                        {{ __('Show Projects') }}
                        </div>
                        <div class="col-md-6">
                        <button type="button" class="btn btn-primary" style="float: right;" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Slider</button>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Details</th>
                                <th>Photo</th>                            
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $item)
                            <tr>
                                
                                <td>{{$item->id}}</td>
                                <td>{{$item->title}}</td>
                                <td>{{$item->details}}</td>
                                <td><img src="{{asset('site/uploads/sliders/'.$item->image)}}" width="100"></td>
                                <td><a href="{{route('getDeleteSlider', $item->id)}}">Delete</a> <a href="{{route('getEditSlider', $item->id)}}">Edit</a></td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Slider</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="{{route('postAddSliders')}}" method="Post" enctype="multipart/form-data">
                   @csrf()
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Slider Title" name="title">
                    </div>
                    <div class="form-group">
                        <textarea name="details" placeholder="Slider Detail" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Add" class="form-control">
                    </div>
                   </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@stop