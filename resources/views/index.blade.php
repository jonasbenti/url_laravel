@extends('templates.template')

@section('title')
    Url
@endsection

@section('body')
    <h1 class="text-center">{{__('List of URLs created by')}}:  {{Auth::user()->name}}</h1> <hr>

    <div class="text-center mt-3 mb-4">
        <a href="{{url("urls/create")}}" class="btn btn-success">{{__('Insert new')}}</a>
        <a href="{{url("dashboard/")}}" class="btn btn-default">{{__('Back')}}</a>
        <button class="btn btn-primary" onClick="window.location.reload();">{{__('Refresh Page')}}</button>
    </div>

    <div class="col-8 m-auto">
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Url</th>
                <th scope="col">Status</th>
                <th scope="col">{{__('Updated at')}}</th>
                <th scope="col">{{__('Action')}}</th>
            </tr>
            </thead>
            <tbody>
                @foreach($url as $urls)
                    @php
                        $user=$urls->find($urls->id)->relUsers;
                    @endphp
                    <tr>
                        <th scope="row">{{$urls->id}}</th>
                        <td><a href="{{url("urls/$urls->id")}}" title="{{__('URL request information and history')}}">{{$urls->description_url}}</a></td>
                        <td>{{$urls->status_code}}</td>
                        <td>{{date("d/m/Y H:i:s", strtotime($urls->updated_at))}}</td>
                        <td>
                            <a href="{{url("urls/$urls->id/edit")}}">
                                <button class="btn btn-primary">{{__('Edit')}}</button>
                            </a>

                            <form name="formDel" id="formDel" method="post" action="{{url("urls/$urls->id")}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">{{__('Delete')}}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
