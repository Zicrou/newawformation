@extends('admin.admin')
            
@section('title', "Créer un cours")

@section('content')
    <h1>@yield('title')</h1>

    <div class="container">
        <div class="col-md-12 mt-4">
            
            <form class="vstack gap-2" method="POST" action="{{ route('admin.cours.store') }}"  enctype="multipart/form-data">
                @csrf 
                @method('POST')
                @include('admin.cours.form', ['cour' => $cour, 'tags' => $tags])
            </form>
        </div>
    </div>

    
    
@endsection