@extends('admin.admin')
            
@section('title', "Editer un cours")

@section('content')
    <h1>@yield('title')</h1>

    <div class="container">
        <div class="col-md-12 mt-4">
            
            <form class="vstack gap-2" method="POST" action="{{ route('admin.cours.update', $cour) }}"  enctype="multipart/form-data">
                @csrf 
                @method('PUT')
                @include('admin.cours.form', ['cour' => $cour, 'tags' => $tags])
            </form>
        </div>
    </div>

    
@endsection