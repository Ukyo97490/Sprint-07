@extends('movies.home')
@section('content')
    <div class="container mt-5">
        <div class="row pt-4">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>The Movie Show</h2>
                </div>
                <div class="d-flex flex-row">
                    <div class="pull-right">
                        <a class="btn btn-primary me-3" href="{{ route('home') }}" enctype="multipart/form-data"> Back</a>
                    </div>
                    @auth
                        @if (Auth::user()->admin == true)
                            <div class="pull-right mb-2">
                                <a class="btn btn-success" href="{{ route('create') }}">Add New Movie</a>
                            </div>
                            <div class="ms-3">
                                <a class="btn btn-primary" href="{{ route('users') }}">Users</a>
                            </div>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
        
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Release</th>
                <th>Time</th>
                <th>Synopsis</th>
                <th>Genre</th>
                <th>Poster</th>
                <th>+ likes</th>
                <th>- likes</th>
                @auth
                    @if (Auth::user()->admin == true)
                        <th width="280px">Action</th> 
                    @endauth
                @endif
                   
            </tr>
            @if (count($movies) == 0) 
                <div>
                    <p class="alert alert-danger">Sorry there are no movis at this kind yet</p>
                </div>
            @endif
            
            {{-- <pre>
                <?php
                    print_r($movies);
                ?>
            </pre> --}}
            
            @foreach ($movies as $movie)
            <tr>
                <td>
                    <form action="{{ route('detailMovie') }}" method="get">
                        <input type="text" class="visually-hidden" 
                                name="inputMovieId"
                                value = "{{ $movie->id }}" readonly>
                        <input type="submit" class="form-control me-2 btn btn-info"  
                                name="inputDetailMovie" 
                                value = "{{ $movie->name }}" readonly>
                    </form>
                </td>
                <td class="text-nowrap">{{ $movie ->release }}</td>
                <td>{{ $movie ->time }}</td>
                <td>{{ $movie ->synopsis }}</td>
                <td>{{ $movie ->genre }}</td>
                <td>{{ $movie ->img }}</td>
                <td class="">
                    {{ $movie ->likeplus }}
                    <form class="ms-3" action="{{ route('updateLikePlus', $movie->id) }}" method="GET">
                        <input class="visually-hidden" name="likePlusOld" value="{{ $movie ->likeplus }}" readonly>
                        @guest
                            <p>????</p>
                        @endguest
                        @auth
                            <button class="btn" tupe="submit" name="likePlus" readonly>????</button>
                        @endauth 
                    </form>
                </td>
                <td class="">
                    {{ $movie ->likemoins }}
                    <form class="ms-3" action="{{ route('updateLikeMoins', $movie->id) }}" method="GET">
                        <input class="visually-hidden" name="likeMoinsOld" value="{{ $movie ->likemoins }}" readonly>
                        @guest
                            <p>????</p>
                        @endguest
                        @auth
                           <button class="btn"  type="submit" name="likeMoins" readonly>????</button>
                        @endauth
                         
                    </form></td>
                @auth
                    @if (Auth::user()->admin == true)
                        <td>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="Post"> 
                                <a class="btn btn-primary" href="{{ route('movies.edit', $movie->id) }}">Modify</a>
                                @csrf 
                                @method('DELETE') 
                                <button type="submit" class="btn btn-danger" onclick="return confirm('The Movie and all Comments will be deleted');">Delete</button> 
                            </form>
                        </td>
                    @endif
                @endauth
            </tr>
            @endforeach
        </table>
    </div>
@endsection