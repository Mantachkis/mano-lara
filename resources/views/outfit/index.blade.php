@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
              <div class="card-header">
                   <h3>Outfits List</h3>
                   <form action="{{route('outfit.index')}}" method="get">
                    <fieldset>
                        <legend>Sort</legend>
                        <div class="block">
                        <button type="submit" class="btn btn-info" name="sort" value="type">Type</button>
                        <button type="submit" class="btn btn-info" name="sort" value="color">Color</button>
                        <button type="submit" class="btn btn-info" name="sort" value="size">Size</button>
                        </div>
                        <div class="block">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" 
                            name="sort_dir" id="_1" 
                            value="asc" @if('desc' != $sortDirection) checked @endif>
                            <label class="form-check-label" for="_1">
                              ASC
                            </label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="radio"
                             name="sort_dir" id="_2"
                              value="desc" @if('desc'== $sortDirection) checked @endif>
                            <label class="form-check-label" for="_2">
                              DESC
                            </label>
                          </div>
                        </div>
                        <div class="block">
                         
                            <a href="{{route('outfit.index')}}" class="btn btn-danger">Reset</a>
                        </div>
                    </fieldset>
                   </form>

               <div class="card-body">
            
                <ul class="list-group">
                @foreach ($outfits as $outfit)
                <li class="list-group-item">
                    <div class="list-block">
                        <div class="list-block__content">
                            <span><b>Type: </b>{{$outfit->type}} <i>Color: </i>{{$outfit->color}} <i>Size: </i>{{$outfit->size}}</span>
                            <small>{{$outfit->getMaster->name}} {{$outfit->getMaster->surname}}</small> 
                        </div>
                        <div class="list-block__buttons">
                            <a href="{{route('outfit.edit',[$outfit])}}"class="btn btn-success">Edit</a></a>
                            <form method="POST" action="{{route('outfit.destroy', [$outfit])}}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                               </form>
                        </div>
                    </div>
                </li>
              @endforeach
                </ul>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection

@section('title') Outfits List @endsection

