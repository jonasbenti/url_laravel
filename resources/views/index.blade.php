@extends('templates.template')

@section('title')
    Url
@endsection

@section('body')
    <h1 class="text-center">{{__('List of URLs Created for')}}:  {{Auth::user()->name}}</h1> <hr>

    <div class="text-center mt-3 mb-4">
        <a href="{{url("urls/create")}}">
            <button class="btn btn-success">{{__('Insert new')}}</button>
        </a>
    </div>

    <div class="col-8 m-auto">
        <table class="table text-center">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Url</th>
                <th scope="col">Status</th>
                <th scope="col">Response</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($url as $urls)
                    @php
                        $user=$urls->find($urls->id)->relUsers;
                    @endphp
                    <tr>
                        <th scope="row">{{$urls->id}}</th>
                        <td><a href="{{url("urls/$urls->id")}}">{{$urls->description_url}}<a href="{{url("urls/$urls->id")}}"></td>
                        <td>{{$urls->status_code}}</td>
                        <td>{{$urls->response}}</td>
                        <td>
                            {{-- <a href="{{url("urls/$urls->id")}}">
                                <button class="btn btn-dark">Visualizar</button>
                            </a> --}}

                            <a href="{{url("urls/$urls->id/edit")}}">
                                <button class="btn btn-primary">{{__('Edit')}}</button>
                            </a>

                            {{-- <a href="">
                                <button class="btn btn-danger">Deletar</button>
                            </a> --}}
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

        {{-- {{ $url->links() }} --}}
    </div>
@endsection
