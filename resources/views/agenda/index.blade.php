@extends('layouts.agenda.index')
@section('title', ' | ' . auth()->user()->nome)

@section('content')
<div class="row mt-5">
    <div class="col-md-12 mt-5">
        @if(auth()->user()->avatar)
            <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->nome }}" class="mx-auto d-block img-thumbnail user-avatar">
        @endif
        <h3 class="text-center user-name mt-1">{{ auth()->user()->nome }}</h3>
    </div>
</div>
<div class="row mt-5">
    <search-component></search-component>
</div>
<div class="row mt-3">
    <contacts-component></contacts-component>
    <div class="col-md-12">
        {{-- <loading></loading> --}}
    </div>
</div>
<scroll-top-component></scroll-top-component>
@endsection
