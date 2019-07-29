{{-- uvezen layout iz app.blade koji prikazuje gornju liniju --}}
@extends('layouts.app')

@section('content')
<div style="width:70%;margin:30px auto">
    <form action="{{route('store_post')}}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" placeholder="title" name="title">
        </div>
        <div class="form-group">
            <label for="text">Text</label>
            <textarea class="form-control" id="text" rows="3" name="text"></textarea>
        </div>
        <div class="form-group">
        <select class="form-control" name="category_id">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
        </select>
        </div>
        <div class="form-group">
            <input type="submit" value="Dodaj post" class="btn btn-success">
        </div>
    </form>
</div>


    @endsection
