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
        <b>Id Url:</b> {{$url->id}}<br>
        <b>Url:</b> {{$url->description_url}}<br>
        <b>Status:</b> {{$url->status_code}}<br>
        <b>{{__('Response')}}:</b> {{$url->response}} <br>
        <b>{{__('User')}}:</b> {{$user->name}} <br>
        <b>Email:</b> {{$user->email}} <br>
        <b>{{__('Updated at')}}:</b> {{date("d/m/Y H:i:s", strtotime($url->updated_at))}} <br><br>
        <a href="{{ url()->previous() }}" class="btn btn-primary">{{__('Back')}}</a>
    </div>
    <div class="col-8 m-auto">
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Status</th>
                <th scope="col">{{__('Response')}}</th>
                <th scope="col">{{__('Updated at')}}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($urlResponse as $response)
                    <tr>
                        <th scope="row">{{$response->id}}</th>
                        <td>{{$response->status_code}}</td>
                        <td>{{$response->response}}</td>
                        <td>{{date("d/m/Y H:i:s", strtotime($response->updated_at))}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
