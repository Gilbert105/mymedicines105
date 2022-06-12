@extends ('layout.conquer')
@section('content')
<form method="POST" action='{{route("obat.store")}}'>
    @csrf
    <div class="form-group">
        <label for="exampleInputGenericName">Generic Name</label>
        <input type="text" class="form-control" id="exampleInputGenericName" placeholder="Generic Name" name="medName" required>
    </div>
    <div class="form-group">
        <label for="medform">Form</label>
        <input type="text" class="form-control" id="medform" placeholder="Form" name="medform">
    </div>
    <div class="form-group">
        <label for="medform">Restriction Formula</label>
        <input type="text" class="form-control" id="medFormula" placeholder="Restriction Formula" name="medformula">
    </div>
    <div class="form-group">
        <label for="exampleInputDescription">Medicine Description</label>
        <textarea class="form-control" id="exampleInputDescription" name="medDesc" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="text" class="form-control" id="image" placeholder="imageRoute" name="medImage">
    </div>
    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" class="form-control" id="price" placeholder="Price" name="medPrice">
    </div>
    <div class="dropdown" name="medCategory">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Category
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @foreach($listdata as $li)
            <a class="dropdown-item" href="#" value="{{$li->id}}">{{$li->name}}</a><br>
            @endforeach
        </div>
    </div>
    <div class="form-group">
        <label for="faskes_1">Price</label>
        <input type="text" class="form-control" id="faskes_1" placeholder="faskes1" name="medFaskes1">
    </div>
    <div class="form-group">
        <label for="faskes_2">Price</label>
        <input type="text" class="form-control" id="faskes_2" placeholder="faskes2" name="medFaskes2">
    </div>
    <div class="form-group">
        <label for="faskes_3">Price</label>
        <input type="text" class="form-control" id="faskes_3" placeholder="faskes3" name="medFaskes3">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection