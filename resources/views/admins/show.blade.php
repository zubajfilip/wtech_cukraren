@extends('adminapp')
@section('content')

<div class="container-fluid">
    <div class="container-fluid outer-border mb-2 mt-2">
        <h2>Detaily produktu</h2>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4>Názov produktu:</h4>
                <p>{{ $product->name }}</p>
            </div>
            <div class="col-md-6">
                <h4>Cena:</h4>
                <p>{{ $product->price }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>Popis produktu:</h4>
                <p>{{ $product->description }}</p>
            </div>
            <div class="col-md-6">
                <h4>Hmotnosť:</h4>
                <p>{{ $product->weight }} grams</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h4>Kategórie:</h4>
                <ul>
                    @foreach($product->categories as $category)
                    <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-6">
                <h4>Typ produktu:</h4>
                <p>{{ $product->type }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Obrázok:</h4>
                <img src="{{ asset('storage/' . $product->imagePath) }}" alt="{{ $product->name }}" style="max-width: 100%;">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12">
                <a href="/admins" class="btn btn-secondary">Späť na zoznam produktov</a>
            </div>
        </div>
    </div>
</div>

@endsection
