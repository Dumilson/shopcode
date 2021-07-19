@extends('admin.products.template')

@section('content')
<div class="row">
    <div class="col-sm-12 mr-tb mb-4">
        <div class="pull-left">
            <h1>Adicionar produto</h1>
        </div>
        <div class="pull-right">
            <a href=" {{route('products.index')}} " class="btn btn-danger">voltar</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Erro</strong> O erro esta neste campo.<br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="text" name="name" id="" class="form-control" placeholder="Nome do produto">
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <input type="text" name="price" id="" class="form-control" placeholder="Preço">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <select name="category" id="" class="form-control">
                    <option value="">Catergoria</option>
                    <option value="computers">Computers</option>
                    <option value="smartphones">Smartphones</option>
                    <option value="tablets">Tablets</option>
                </select>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="">Imagem</label>
                <input type="file" name="image" id="" class="form-control" placeholder="Price">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div class="form-group">
                    <label for="my-textarea">Descrição</label>
                    <textarea id="my-textarea" class="form-control" name="description" rows="3"></textarea>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <button type="submit" class="btn primary">Cadastrar</button>
            </div>
        </div>
    </div>
</form>
@endsection