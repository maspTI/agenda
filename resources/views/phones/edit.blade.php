@extends('layouts.index')
@section('title', ' | Editar')
@section('content')
<edit-phone :users="{{ ($users) }}" :phone="{{ $phone }}"></edit-phone>
@endsection
