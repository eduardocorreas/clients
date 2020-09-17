@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <?php echo "Olá  <span style='font-weight: bold'>" . auth()->user()->name . "</span> , veja abaixo os seus documentos cadastrados!" ?>
        </div>

        <div class="card-body">
          <h5 class="text-center">Deseja enviar algo para nossa equipe? <br />Preencha o formulário e nos envie!</h5>
          <br />
          <form action="/uploadFileClient" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="display: flex; justify-content: space-around">
              <input type="text" id="name" name="name" placeholder="O que você está enviando?"
                style="width: 50%; padding-left: 10px" />
              <input type="file" id="uploadDocument" name="uploadDocument">
              <button type="submit" class="btn btn-danger btn-md" id=""><i
                  className="fa fa-envelope"></i>Enviar</button>
            </div>
            <input type="hidden" id="id" name="id" value=<?php echo $id ?> />
          </form>
          <br />
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach($documents as $doc)
              <tr>
                <td></td>
                <td>
                  <?php echo $doc->name ?>
                </td style="display: flex">
                <td>
                  <a class="btn btn-info" href=<?php echo "/documents/download/{$doc->document}" ?>>Download</a>
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