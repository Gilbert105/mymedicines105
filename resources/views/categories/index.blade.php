@extends('layout.conquer')
@section('content')
@section('javascript')
<script>
    function showInfo() {
        $.ajax({
            type: 'POST',
            url: '{{route("obat.showInfo")}}',
            data: '_token=<?php echo csrf_token() ?>',
            success: function(data) {
                $('#showinfo').html(data.msg)
            }
        });
    }
</script>
@endsection

<div class="dropdown">
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Dropdown button
    </button>
    <?php
    $id = (isset($_GET['id'])) ? $_GET['id'] : $listdata[0]->id;
    ?>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        @foreach($listdata as $liCat)
        <a class="dropdown-item" href="?id={{$liCat->id}}">{{$liCat->name}}</a>
        @endforeach
    </div>
</div>
<div class="row">
    @foreach($listdataMedicine as $li)
    @if($li->category==$id)
    <div class="col-md-4 mt-4">
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{asset('images/'.$li->image)}}" alt="{{$li->generic_name}} {{$li->form}}">
            <div class="card-body">
                <h5 class="card-title">{{$li->generic_name}} {{$li->form}}</h5>
                <p class="card-text">{{$li->price}}</p>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>
@endsection

