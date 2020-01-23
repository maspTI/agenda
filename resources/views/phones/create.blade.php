@extends('layouts.index')
@section('title', ' | Criar Ramal')
@section('content')
<create-phone :users_props="{{ $users }}"></create-phone>
@endsection
