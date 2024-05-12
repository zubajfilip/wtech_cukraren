<!DOCTYPE html>
<html lang="en">

<head>
    @include('components.head')
</head>

<body>
    @include('components.adminNav')

    <div class="container-fluid">
        <div class="container-fluid outer-border mb-2 mt-2">
            <form action="{{url('admins', [$product->id])}}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                @csrf
                <!-- <div class="form-group">
                    <label for="id">ID</label>

                    <input type="text" class="form-control" id="id" value="{{$product->id}}" name="id" disabled>
                </div> -->
                <div class="form-group">
                    <label for="productName">Názov Produktu</label>

                    <input type="text" class="form-control" id="productName" name="name" maxlength="50"
                        placeholder="Nový Produkt 01" required value="{{$product->name}}">
                </div>
                <div class="form-group">
                    <label for="productPrice">Cena</label>
                    <input type="number" value="{{$product->price}}" class="form-control" name="price" id="productPrice"
                        placeholder="0.00" step="0.01" required>
                </div>
                <div class="form-group">
                    <label for="productDescription">Popis Produktu</label>
                    <textarea class="form-control" value="{{$product->description}}" id="productDescription"
                        name="description" rows="4" placeholder="Popis Produktu..."
                        required>{{$product->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="weight">Hmotnosť</label>
                    <div class="input-group">
                        <input value="{{$product->weight}}" type="number" class="form-control" name="weight" id="weight"
                            required>
                        <div class="input-group-append">
                            <span class="input-group-text">grams</span>
                        </div>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="categories">Kategórie</label>
                    <select id="categories" name="categories[]" class="form-control" multiple>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div> -->
                <label for="categories">Kategórie</label>
                <div class="form-group">
                    @foreach($categories as $category)
                    <input type="checkbox" id="{{$category->id}}" name="categories[]" value="{{$category->id}}"
                        @if($product->categories->contains($category)) checked @endif>
                    <label for="{{$category->id}}">{{$category->name}}</label><br>
                    @endforeach
                </div>



                <div class="form-group">
                    <label for="type">Typ produktu</label>
                    <select class="form-control" id="type" name="type">
                        <option value="{{ $product->type }}">{{ $product->type }}</option>
                        @foreach($types as $type)
                        <option value="{{ $type->name }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="images">Obrázok</label>

                    <input class="form-control" type="file" name="image" id="images" accept="image/*"
                        onchange="previewImages(event)">

                    <div id="preview" class="mb-3">
                        @if ($product->imagePath)
                        <img src="{{ asset('storage/' . $product->imagePath) }}" alt="Current Image"
                            style="max-width: 200px;">
                        @endif
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
                    <div class="confirm mt-1 d-flex justify-content-end col-6">
                        <button type="submit" class="btn btn-secondary">
                            Uložiť Zmeny
                        </button>
                    </div>
                </div>
                <div>
            </form>
        </div>





        @include('components.footer')
        <script src="{{ asset('js/admin.js') }}"></script>
</body>


</html>