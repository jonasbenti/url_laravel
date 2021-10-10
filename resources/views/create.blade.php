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
            <select class="form-control" name="id_user" id="id_user" required>
                <option value="">{{__('Select User')}}</option>
                @foreach($users as $user)
                    @if(($url->relUsers->id ?? 0) == $user->id)
                        <option value="{{$user->id}}" selected>{{$user->name}}</option>
                    @else
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endif
                @endforeach
            </select><br>
            <input class="btn btn-primary" type="submit" value="@if(isset($url)){{__('Edit')}} @else {{__('Insert')}} @endif">
            <a href="{{ url()->previous() }}" class="btn btn-default">{{__('Back')}}</a>
        </form>
    </div>
@endsection
