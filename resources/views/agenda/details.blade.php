@extends('layouts.agenda.index')
@section('title', ' | Detalhes ' . $contact->nome)

@section('content')
<div class="arrow">
    <a href="{{ route('contacts.index') }}"><i class="fas fa-arrow-left arrow-icon"></i></a>
</div>
<div class="row detail mt-5">
    <div class="detail-card">
        <div class="col-md-12 mt-2">
            @if($contact->avatar)
            <img src="{{ $contact->avatar }}" alt="{{ $contact->nome }}" class="mx-auto d-block img-thumbnail user-avatar">
            @endif
            <h3 class="text-center user-name mt-1">{{ $contact->nome }}</h3>
            {{-- @if(count($contact->departments)) --}}
                {{-- <p class="text-center detail-label">{{ $contact->departments->first()->nome }}</p> --}}
            {{-- @endif --}}
        </div>
        <div class="col-md-12 d-flex justify-content-around align-items-center">
            <a href="tel:015{{ $contact->phones->first()->phone_number_1 }}"><i class="fas fa-phone detail-phone"></i></a>
            <a href="mailto:{{ $contact->email }}"><i class="far fa-envelope contact-mail"></i></a>
            <a href="sms:{{ $contact->phones->first()->phone_number_1 }}"><i class="fas fa-comment-alt detail-sms"></i></a>
            {{-- <favorite-component :contact="{{ $contact }}"></favorite-component> --}}
        </div>
    </div>
</div>
<div class="row mt-3 detail">
    <div class="detail-card">
        @foreach($contact->phones as $phone)
            <div class="col-md-12 d-flex justify-content-between align-items-center detail-contact">
                <div class="d-flex flex-column justify-content-start">
                    <span class="detail-label">Comercial</span>
                    <span>015{{ $phone->phone_number_1 }}</span>
                </div>
                <div class="d-flex justify-content-around align-items-center">
                    <a href="tel:015{{ $phone->phone_number_1 }}"><i class="fas fa-phone detail-phone"></i></a>
                    <a href="sms:{{ $phone->phone_number_1 }}"><i class="fas fa-comment-alt detail-sms"></i></a>
                </div>
            </div>
            <div class="col-md-12 d-flex justify-content-between align-items-center detail-contact">
                <div class="d-flex flex-column justify-content-start">
                    <span class="detail-label">Discagem Rápida</span>
                    <span>{{ $phone->quick_dial }}</span>
                </div>
                <div class="d-flex justify-content-around align-items-center">
                    <a href="tel:{{ $phone->quick_dial }}"><i class="fas fa-phone detail-phone"></i></a>
                </div>
            </div>
        @endforeach
        <div class="col-md-12 d-flex justify-content-between align-items-center detail-contact">
            <div class="d-flex flex-column justify-content-start">
                <span class="detail-label">Email</span>
                <span>{{ $contact->email }}</span>
            </div>
            <span class="d-flex justify-content-around align-items-center">
                <a href="mailto:{{ $contact->email }}"><i class="far fa-envelope detail-mail"></i></a>
            </span>
        </div>
    </div>
</div>
@endsection
