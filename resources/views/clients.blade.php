@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Painel de controle') }}</div>

        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach($listClients as $client)
              <tr>
                <th scope="row">{{$client->id}}</th>
                <td>{{$client->name}}</td>
                <td>{{$client->email}}</td>
                <td>
                  <a href=<?php echo  route("detailClient",  $client->id)  ?> type="button"
                    class="btn btn-sm btn-info"><i class="fa fa-folder" style="color: #fff"></i>
                  </a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection