<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->isAdmin()) {
            $listClients = DB::table('users')->where('type', '=', 'default')->get();
            return view('clients')->with('listClients', $listClients);
        } else {
            $documents = DB::table('user_documents')->where('user_id', auth()->user()->id)->get();
            return view('home')->with('id', auth()->user()->id)->with('documents', $documents);
        }
    }

    public function uploadFileClient(Request $request)
    {
        $path = $request->file('uploadDocument')->store('documents');
        $id = $request->input('id');
        $name = $request->input('name');

        DB::table('user_documents')->insert(['user_id' => $id, 'name' => $name, 'document' => $path]);
        return redirect("/home");
    }
}