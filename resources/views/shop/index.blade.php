@extends('shop.template')
@section('title', 'Todos os produtos')
@section('content')
    <main role="main mb-4">
        <div class="page-header mb-4 mt-7" style="margin-top:60px;">
          <h1>Produtos disponiveis</h1>
          <hr>
        </div>
        <div class="row mb-2">
          @foreach ($products as $product)
  
          <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('storage/img/'.$product->image)}}" alt="Imagem de capa do card">
            <div class="card-body">
              <h5 class="card-title">{{$product->name}}</h5>
              <p class="card-text"> <strong>Preço</strong> {{$product->price}}</p>
              <p class="card-text"> <strong>Categoria</strong> {{$product->category}}</p>
              <a href="{{route('single.product',$product->id)}}" class="btn btn-primary">mais detalhes</a>
            </div>
          </div>
            @endforeach
          </div>
        </div>
    </main>
@endsection