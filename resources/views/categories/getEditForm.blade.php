<form method="POST" action="{{url('kategori_obat/'.$data->id)}}">
<!-- <form method="POST" action="{{route('kategori_obat.getEditForm',$data->id)}}"> -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Edit Category</h4>
                </div>
                <div class="modal-body">
                    <!-- <form method="POST" action='{{route("kategori_obat.store")}}'> -->
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleInputCategoryName">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputCategoryName" placeholder="Enter Category Name" name="CatName" value="{{$data->name}}"required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription">Category Description</label>
                        <textarea class="form-control" id="exampleInputDescription" name="CatDesc" rows="3">{{$data->category_description}}</textarea>
                    </div>

                    <!-- </form> -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>