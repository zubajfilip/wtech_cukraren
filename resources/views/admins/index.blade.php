@extends('adminapp')
@section('content')

<style>
.product {
    border: 1px solid black;
    margin-bottom: 1px;
}
</style>


<div class="container-fluid">
    <div class="d-flex justify-content-end mb-1 mt-1">
        <a href="/admins/create"><button type="button" class="btn btn-secondary">Pridať Nový Produkt</button></a>

    </div>

    <div class="container-fluid">
        <div class="hidden-md-down">
            <div class="row odd header-info ">
                <div class="col-1">
                    <span>#</span>
                </div>
                <div class="col-2">
                    <span>Obrázok</span>
                </div>
                <div class="col-4">
                    <span>Názov Produktu</span>
                </div>
                <div class="col-1">
                    <span>Cena</span>
                </div>
                <div class="col">
                    <span>Dátum</span>
                </div>
                <div class="col-2">
                    <span>Úprava</span>
                </div>
            </div>
        </div>

        @php
        $counter = 1;
        @endphp


        @foreach($products as $product)
        <div class="hidden-md-down">
            <div class="row d-flex align-items-center product">
                <div class="col-1">
                    <span>{{ $counter++ }}</span>
                </div>
                <div class="col-2">
                    <img src="{{ asset('storage/' . $product->imagePath) }}" alt="{{ $product->name }}" width="100"
                        class="img-fluid">
                </div>
                <div class="col-4">
                    <a href="{{ route('admins.show', $product->id) }}">
                        <span>{{$product->name}}</span>
                    </a>
                </div>
                <div class="col-1">
                    <span>{{$product->price}}€</span>
                </div>
                <div class="col">
                    <span>{{$product->updated_at}}</span>
                </div>
                <div class="col-2 d-flex">
                    <a class="btn btn-warning" href="{{ URL::to('admins/' . $product->id . '/edit') }}">
                        Edit
                    </a>
                    <form action="{{url('admins', [$product->id])}}" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-danger" value="X" />
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @php
    $counter = 1;
    @endphp

    @foreach($products as $product)
    <div class="container-fluid product hidden-md-up">
        <div class="row odd">
            <span class="col-3">#</span>
            <span class="col">{{ $counter++ }}</span>
        </div>
        <div class="row d-flex align-items-center">
            <span class="col-3">Obrázok</span>
            <div class="col">
                <img src="{{ asset('storage/' . $product->imagePath) }}" alt="{{ $product->name }}" width="100"
                    class="img-fluid">
            </div>
        </div>
        <div class="row d-flex align-items-center odd">
            <span class="col-3">Názov Produktu</span>
            <a href="{{ route('admins.show', $product->id) }}">
                <span class="col">{{$product->name}}</span>
            </a>
        </div>
        <div class="row">
            <span class="col-3">Cena</span>
            <span class="col">{{$product->price}}€</span>
        </div>
        <div class="row odd">
            <span class="col-3">Dátum</span>
            <span class="col">{{$product->updated_at}}</span>
        </div>
        <div class="row d-flex">
            <span class="col-3 ">Úprava</span>
            <a class="btn btn-warning col-3" href="{{ URL::to('admins/' . $product->id . '/edit') }}">
                Edit
            </a>
            <form action="{{url('admins', [$product->id])}}" method="POST" class="col-3">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="submit" class="btn btn-danger" value="Vymazať" />
            </form>
        </div>
    </div>
    @endforeach
</div>
@endsection