@extends('templates.template')

@section('title')
{{__('URL form')}}
@endsection

@section('body')
    <h1 class="text-center">@if(isset($url)){{__('Edit')}} @else {{__('Insert')}}  @endif</h1> <hr>
    <div class="col-8 m-auto">
        @if(isset($errors) && count($errors)>0)
            <div class="text-center mt-4 mb-4 p-2 alert-danger">
                @foreach($errors->all() as $erro)
                    {{$erro}}<br>
                @endforeach
            </div>
        @endif

        @if(isset($url))
            <form name="formEdit" id="formEdit" method="post" action="{{url("urls/$url->id")}}">
                @method('PUT')
        @else
            <form name="formIns" id="formIns" method="post" action="{{url("urls")}}">
        @endif

        <form name="formIns" id="formIns" method="post" action="{{url('urls')}}">
            @csrf
            <input class="form-control" type="text" name="url" id="url" placeholder="Url:" value="{{$url->description_url ?? ''}}" required><br>
            <input class="btn btn-primary" type="submit" value="@if(isset($url)){{__('Edit')}} @else {{__('Insert')}} @endif">
            <a href="{{ url()->previous() }}" class="btn btn-default">{{__('Back')}}</a>
        </form>
    </div>
@endsection
