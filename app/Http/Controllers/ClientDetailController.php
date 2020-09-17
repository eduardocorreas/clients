<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;



class ClientDetailController extends Controller
{
    public function index($id)
    {
        $documents = DB::table('user_documents')->where('user_id', $id)->get();
        return view("clientDetail")->with('id', $id)->with('documents', $documents);
    }

    public function store(Request $request)
    {
        $path = $request->file('uploadDocument')->store('documents');
        $id = $request->input('id');
        $name = $request->input('name');

        DB::table('user_documents')->insert(['user_id' => $id, 'name' => $name, 'document' => $path]);
        return redirect("/client/{$id}");
    }



    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $result = DB::table('user_documents')->where('id', $id)->get();
        DB::table('user_documents')->delete('id', $id);
        Storage::delete('documents/' . $result->document);
        return redirect("/client/{$id}");
    }

    public function downloadFile($document)
    {
        return Storage::download('documents/' . $document);
    }
}