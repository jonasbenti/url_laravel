<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ModelUrl;
use App\Http\Requests\UrlRequest;
use App\Models\ModelUrlResponse;
use Illuminate\Support\Facades\Auth;

class UrlController extends Controller
{
    public function index()
    {
        $url = User::find(Auth::user()->id)->relUrls;

        return view('index', compact('url'));
    }

    public function show($id)
    {
        $url = ModelUrl::find($id);
        $urlResponse = ModelUrlResponse::find($id)->relUrlresponse;

        return view('show', compact('url', 'urlResponse'));
    }

    public function create()
    {
        $users = User::all();

        return view('create', compact('users'));
    }

    public function store(UrlRequest $request)
    {
        $cad = ModelUrl::create([
            'description_url' => $request->url,
            'id_user' => Auth::user()->id
        ]);

        if($cad){
            return redirect('urls');
        }
    }

    public function edit($id)
    {
        $url = ModelUrl::find($id);
        $users = User::all();

        return view('create', compact('url','users'));
    }

    public function update(UrlRequest $request, $id)
    {
        $edit = ModelUrl::where(['id' => $id])->update([
            'description_url' => $request->url,
            'id_user' => $request->id_user
        ]);

        if($edit){
            return redirect('urls');
        }
    }

    public function destroy($id)
    {
        $del = ModelUrl::destroy($id);

        if($del){
            return redirect('urls');
        }
    }
}
