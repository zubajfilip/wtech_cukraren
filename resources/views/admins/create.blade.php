@extends('adminapp')
@section('content')

<div class="container-fluid">
    <div class="container-fluid outer-border mb-2 mt-2">
        <form action="/admins" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="productName">Názov Produktu</label>

                <input type="text" class="form-control" id="productName" name="name" maxlength="50"
                    placeholder="Nový Produkt 01" required>
            </div>
            <div class="form-group">
                <label for="productPrice">Cena</label>
                <input type="number" class="form-control" name="price" id="productPrice" placeholder="0.00" step="0.01"
                    required>
            </div>
            <div class="form-group">
                <label for="productDescription">Popis Produktu</label>
                <textarea class="form-control" id="productDescription" name="description" rows="4"
                    placeholder="Popis Produktu..." required></textarea>
            </div>



            <div class="form-group">
                <label for="weight">Hmotnosť</label>
                <div class="input-group">
                    <input type="number" class="form-control" name="weight" id="weight" placeholder="0" required>
                    <div class="input-group-append">
                        <span class="input-group-text">grams</span>
                    </div>
                </div>
            </div>

            <label for="categories">Kategórie</label>
            <div class="form-group">

                @foreach($categories as $category)
                <input type="checkbox" id="{{$category->id}}" name="categories[]" value="{{$category->id}}">
                <label for="{{$category->id}}">{{$category->name}}</label><br>
                @endforeach
            </div>

            <div class="form-group">
                <label for="type">Typ produktu</label>
                <select class="form-control" id="type" name="type">
                    @foreach($types as $type)
                    <option value="{{ $type->name }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="images">Obrázok</label>

                <input class="form-control" type="file" name="image" id="images" required accept="image/*"
                    onchange="previewImages(event)">

                <div id="preview" class="mb-3">
                </div>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row d-flex mb-3">
                <div class="mt-1 d-flex justify-content-start col-6">
                    <a href="/admins"><button type="button" class="btn btn-danger">
                            Späť
                        </button></a>
                </div>
                <div class="confirm mt-1 d-flex justify-content-end">
                    <button type="submit" class="btn btn-secondary">
                        Pridať Nový Produkt
                    </button>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/admin.js') }}"></script>
@endsection