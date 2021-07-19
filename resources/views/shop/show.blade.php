@extends('shop.template')
@section('title', 'Todos os produtos')

@section('content')
<main role="main mb-4">
    <div class="page-header mb-4 mt-7" style="margin-top:60px;">
      <h1>Detalhes do produto</h1>
      <hr>
    </div>
    <div class="row mb-2">
      <div class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('storage/img/'.$products->image)}}" alt="Imagem de capa do card">
        <div class="card-body">
          <h5 class="card-title">{{$products->name}}</h5>
          <p class="card-text"> <strong>Preço</strong> {{$products->price}}</p>
          <p class="card-text"> <strong>Categoria</strong> {{$products->category}}</p>
          <p class="card-text"> <strong>Descrição</strong> {{$products->description}}</p>
        </div>
      </div>
      </div>
    </div>
</main>    
@endsection
