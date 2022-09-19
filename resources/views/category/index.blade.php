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
                    <td></td>
                    <td>Actions</td>
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
</script>
@endsection
