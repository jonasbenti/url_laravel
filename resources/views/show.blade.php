@extends('templates.template')

@section('title')
   Url
@endsection

@section('body')
    <h1 class="text-center">{{__('URL view')}}</h1> <hr>

    <div class="col-8 m-auto">
        @php
            $user=$url->find($url->id)->relUsers;
        @endphp
        <b>Url:</b> {{$url->description_url}}<br>
        <b>Status:</b> {{$url->status_code}}<br>
        <b>Response:</b> {{$url->response}}<br>
        <b>User:</b> {{$user->name}} <br>
        <b>Email:</b> {{$user->email}} <br>
        <b>Updated At:</b> {{date("d/m/Y H:i:s", strtotime($url->updated_at))}} <br>
        <a href="{{ url()->previous() }}" class="btn btn-primary">{{__('Back')}}</a>
    </div>
@endsection
