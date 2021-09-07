@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Outfits List</div>
               <div class="card-body">
            <form method="POST" action="{{route('outfit.sort')}}">
                <button type="submit" class="btn btn-warning" name="sort" value="type">Sort by type</button>
                 <button type="submit" class="btn btn-warning" name="sort" value="color">Sort by color</button>
                @csrf
                </form>
                <ul class="list-group">
                @foreach ($outfits as $outfit)
                <li class="list-group-item">
                    <div class="list-block">
                        <div class="list-block__content">
                            <span>{{$outfit->type}} {{$outfit->color}}</span>
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

