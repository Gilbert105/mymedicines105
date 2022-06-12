@extends ('layout.conquer')
@section('content')

<!-- <div class="modal fade" id="disclaimer" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">DISCLAIMER</h4>
            </div>
            <div class="modal-body">
                Pictures shown are for illustration purpose only.Actual product may vary due to product enhancement. 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->
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
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#" onclick="showInfo()">Welcome
                <i class="icon-bulb"></a></i>
        </li>
    </ul>
</div>
<div id='showinfo'></div>

<h1>List medicines!</h1>
<a class="btn btn-default" data-toggle="modal" href="#disclaimer">Disclaimer</a>
<div class="modal fade" id="disclaimer" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">DISCLAIMER</h4>
            </div>
            <div class="modal-body">
                Pictures shown are for illustration purpose only.Actual product may vary due to product enhancement.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Generic Name</th>
            <th scope="col">Form</th>
            <th scope="col">Restriction Formula</th>
            <th scope="col">Description</th>
            <th scope="col">Category</th>
            <th scope="col">Faskes TK1</th>
            <th scope="col">Faskes TK2</th>
            <th scope="col">Faskes TK3</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listdata as $li)
        <tr>
            <td>
                <a class="btn btn-default" data-toggle="modal" href="#detail_{{$li->id}}" data-toggle="modal">{{$li->id}}</a>
                <div class="modal fade" id="detail_{{$li->id}}" tabindex="-1" role="basic" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{$li->nama_produk}}</h4>
                            </div>
                            <div class="modal-body">
                                <img src="{{asset('images/'.$li->image)}}" height='200px' />
                                <!-- <img src="{{asset('images/').$li->image}}" height='200px' /> -->
                                <!-- {{asset('images/'.$li->image)}} -->
                                <p>Description</p>
                                <br>
                                <p>{{$li->description}}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>


            </td>
            <td>{{$li->generic_name}}</td>
            <td>{{$li->form}}</td>
            <td>{{$li->restriction_formula}}</td>
            <td>{{$li->description}}</td>
            <td>{{$li->category}}</td>
            <td>{{$li->faskes_tk1}}</td>
            <td>{{$li->faskes_tk2}}</td>
            <td>{{$li->faskes_tk3}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection