<form method="POST" action="{{url('kategori_obat/'.$data->id)}}">
    <!-- <form method="POST"> -->
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Add New Category</h4>
    </div>
    <div class="modal-body">
        <!-- <form method="POST" action='{{route("kategori_obat.store")}}'> -->
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputCategoryName">Category Name</label>
            <input type="text" class="form-control" id="eName" placeholder="Enter Category Name" name="CatName" value="{{$data->name}}" required>
        </div>
        <div class="form-group">
            <label for="exampleInputDescription">Category Description</label>
            <textarea class="form-control" id="eDesc" name="CatDesc" rows="3">{{$data->category_description}}</textarea>
        </div>

        <!-- </form> -->
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="saveDataUpdateTD({{$data->id}})" data-dismiss="modal">Submit</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
    </div>
</form>

<script>
    function saveDataUpdateTD(id) {
        var eName = $("#eName").val()
        var eDesc = $("#eDesc").val()
        $.ajax({
            type: 'POST',
            url: '{{route("kategori_obat.saveData")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': id,
                'name': eName,
                'desc': eDesc
            },
            success: function(data) {
                if (data.status == "oke") {
                    // alert(data.msg);
                    $("#td_name_" + id).html(eName)
                    $("#td_category_description_" + id).html(eDesc)
                    $("#pesan").show()
                    $("#pesan").html(data.msg)
                }
            }
        });
    }
</script>