@extends('layout.conquer')
@section('content')


@if (session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif
<div>{{Auth::user()->name}}</div>

<div class="note note-success" id="pesan" style="display:none ;"></div>
@if (session('error'))
<div class="alert alert-danger">
    {{session('error')}}
</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listdata as $li)
        <tr id="tr_{{$li->id}}">
            <td id="td_name_{{$li->id}}">{{$li->name}}</td>
            <td id="td_category_description_{{$li->id}}">{{$li->category_description}}</td>
            <td><a class="btn btn-primary" href="{{url ('kategori_obat/'.$li->id.'/edit')}}" role="button">Edit</a></td>
            <!-- <td><a href="#modalEdit" data-toggle='modal' class="btn btn-warning btn-xs" onclick="getEditForm({{$li->id}})">+ Edit A</a></td> -->
            <td><a href="#modalEdit" data-toggle='modal' class="btn btn-warning btn-xs" onclick="getEditForm({{$li->id}})">Edit A</a></td>
            <td><a href="#modalEdit" data-toggle='modal' class="btn btn-warning btn-xs" onclick="getEditForm2({{$li->id}})">Edit B</a></td>

            @can('delete-permission')
            <form action="{{route('kategori_obat.update',$li->id)}}" method="post">
                @csrf
                @method('DELETE')
                <td><button type="submit" class="btn btn-primary" value="Delete" onclick="if(!confirm('are you sure to delete this record?')) return false;">Delete</button></td>
            </form>
            
            <td><a class='btn btn-danger btn-xs' onclick="if(confirm('are you sure to delete this record?')) deleteDataRemoveTR({{$li->id}})">Delete 2</td>
            @endcan
        </tr>
        @endforeach
    </tbody>

</table>
<div class="page-toolbar">
    <a href="{{url('kategori_obat/create')}}" class='btn btn-info' type="button"> + Kategori Baru
    </a>
    <a href="#modalCreate" data-toggle='modal' class='btn btn-info' type="button"> + Kategori Baru (modal)
    </a>
</div>

<div class="modal fade" id="modalCreate" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action='{{route("kategori_obat.store")}}'>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add New Category</h4>
                </div>
                <div class="modal-body">
                    <!-- <form method="POST" action='{{route("kategori_obat.store")}}'> -->
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputCategoryName">Category Name</label>
                        <input type="text" class="form-control" id="exampleInputCategoryName" placeholder="Enter Category Name" name="CatName" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputDescription">Category Description</label>
                        <textarea class="form-control" id="exampleInputDescription" name="CatDesc" rows="3"></textarea>
                    </div>

                    <!-- </form> -->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEdit" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modalContent">
            <!-- <img src="https://c.tenor.com/AaJj7EJzzdAAAAAd/challenge-find-out-when-this-gif-ends.gif" alt="" srcset=""> -->
        </div>
    </div>
</div>

@endsection
@section('javascript')
<script>
    function getEditForm(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("kategori_obat.getEditForm")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success: function(data) {
                $('#modalContent').html(data.msg)
            }
        });
    }

    function getEditForm2(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("kategori_obat.getEditForm2")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success: function(data) {
                $('#modalContent').html(data.msg)
            }
        });
    }

    function deleteDataRemoveTR(id) {
        $.ajax({
            type: 'POST',
            url: '{{route("kategori_obat.deleteData")}}',
            data: {
                '_token': '<?php echo csrf_token() ?>',
                'id': id
            },
            success: function(data) {
                if (data.status == "oke") {
                    // alert(data.msg);
                    $("#tr_" + id).remove()

                }
                $("#pesan").show()
                $("#pesan").html(data.msg)
            }
        });
    }
</script>
@endsection