@extends('layouts.app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="my-4">Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- Blog Post -->
                @foreach($posts as $post)
                <div class="card mb-4">
                    <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">

                    <div class="card-body">

                        <h2 class="card-title"><a href="{{route('single_post', $post->id)}}">{{$post->title}}</a></h2>
                        <p class="card-text">{{substr($post->text,0,100)}}</p>
                        <a href="#" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans()}}
                        <a href="#">By {{$post->user->name}}</a>
                    </div>
                </div>
                @endforeach
{{$posts->links()}}
                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    <li class="page-item">
                        <a class="page-link" href="#">&larr; Older</a>
                    </li>
                    <li class="page-item disabled">
                        <a class="page-link" href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Search Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                        </div>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            @for($i=1;$i<=count($categories);$i++)
                                @if($i%3==0 || $i==1)
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    @endif
                                    <li>
{{--pozvali smo opet nasu stranicu blog samo smo joj dodali parametar category koji kao vrednost ima id                                        --}}
                                        <a href="{{route('blog')}}?category={{$categories[$i-1]->id}}">{{$categories[$i-1]->name}}</a>
                                    </li>
                                    @if($i%3==1)
                                </ul>
                            </div>
                                @endif
                                @endfor
                        </div>
                    </div>
                </div>

                <!-- Side Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Side Widget</h5>
                    <div class="card-body">
                        You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

@endsection
