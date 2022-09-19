@extends('layouts.app')

@section('head')

@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Category List</h4>
        <table class="table" id="category_tbl">
            <tr>
                <th>Bil</th>
                <th>Kategori</th>
                <th>Bil(Produk)</th>
                <th>Tindakan</th>
            </tr>
            @foreach ($categories as $i=>$category)
            <tr>
                <td>{{$i+1}}</td>
                <td>{{$category->name}}</td>
                <td></td>
                <td>Actions</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection

@section('script')

@endsection
