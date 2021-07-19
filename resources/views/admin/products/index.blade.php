@extends('admin.products.template')
@section('title', 'Home | Page')

@section('content')
    <div class="row">
        <div class="col-sm-12 mr-tb mb-4">
            <div class="pull-left">
                <h1>Admin produtos</h1>
            </div>

            <div class="pull-left">
                
                    <h1> Seja bem-vindo {{ Auth::user()->name }}</h1>
                <br>
                    <a  href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Terminar sessão') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
            </div>
            <div class="pull-right">
                <a href=" {{route('products.create')}} " class="btn btn-success">Novo produto</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif
    <center>
        <form action="{{url('/search')}}" method="GET" class="form-row">
            <input type="text" name="search" id="" class="form-control mb-4">
            <button type="submit" class="btn btn-dark mb-4">Pesquisar</button>
        </form>
    </center>

    <table class="table table-light">
        <thead class="thead-light">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Imagem</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th width="280px">Acções</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td> {{$product->id}} </td>
                    <th>{{$product->name}}</th>
                    <td> <img src="{{asset('storage/img/'.$product->image)}}" alt="" srcset="" width="20px"> </td>
                    <td>{{$product->price}}</td>
                    <td> {{$product->category}} </td>
                    <th>
                        <form action="{{route('products.destroy', $product->id)}}" method="post">
                            <a href="{{route('products.show', $product->id)}}" class="btn btn-info">Detalhes</a>

                            <a href="{{route('products.edit', $product->id)}}" class="btn btn-primary">Editar</a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection