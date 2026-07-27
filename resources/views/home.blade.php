@extends('base')

@section('title', 'Accueil')

@section('content')

<x-hero />

<x-search/>

<x-stats />

<x-feature-cards />

<x-categories />

<x-latest-courses :cours="$cours"/>

<x-testimonials />

<x-cta />


@endsection