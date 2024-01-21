@extends('layouts.main')
@section('title','Home')

@section('content')
    @include('includes.searchBar')

    @include('includes.intro')

    @include('includes.carListing')

    @include('includes.features')
    
    @include('includes.testimonials')
    
@endsection    
