@extends ('layout.conquer')
@section('content')
<form method="POST" action='{{route("kategori_obat.store")}}'>
    @csrf
    <div class="form-group">
        <label for="exampleInputCategoryName">Category Name</label>
        <input type="text" class="form-control" id="exampleInputCategoryName" placeholder="Enter Category Name" name="CatName" required>
    </div>
    <!-- <div class="form-group">
        <label for="exampleInputDescription">Category Description</label>
        <input type="text" class="form-control" id="exampleInputDescription" placeholder="Description">
    </div> -->
    <div class="form-group">
        <label for="exampleInputDescription">Category Description</label>
        <textarea class="form-control" id="exampleInputDescription" name ="CatDesc" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection