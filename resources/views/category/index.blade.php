@extends('layouts.app')

@section('head')
<style>
    .dataTables_wrapper .row > div {
        flex-direction: column!important;
    }
</style>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Category List</h4>
        <table class="table" id="category_tbl">
            <thead>
                <tr>
                    <th>Bil</th>
                    <th>Kategori</th>
                    <th>Bil(Produk)</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $i=>$category)
                <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->products->count()}}</td>
                    <td>
                        <button class="btn btn-sm btn-warning btn-test" data-name="{{$category->name}}" data-id="{{$category->id}}" type="button">Edit</button>
                        <a href="{{route('category.edit',['category'=>$category->id])}}" class="btn btn-info btn-sm">Edit using anchor</a>
                        <a href="{{route('product.productsbycategory',['category'=>$category->id])}}" class="btn btn-secondary btn-sm">View Products</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#category_tbl').dataTable({
        language:{
            "search":  "Carian:",
            "lengthMenu": "Papar _MENU_ senarai",
        }
    });

    $('.btn-test').click(function (e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var name = $(this).attr('data-name');

        window.open("/category/"+id+"/edit");
    });
</script>
@endsection
