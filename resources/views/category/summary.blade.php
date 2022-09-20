@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/chartist.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Summary</h4>
                <div class="ct-chart"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Summary Without Ajax</h4>
                <div class="ct-chartistnonajax"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/chartist.min.js') }}"></script>
<script>

    $.ajax({
        type: "get",
        url: "{{route('category.summaryByAjax')}}",
        success: function (response) {
            console.log(response);
            new Chartist.Bar('.ct-chart', {
              labels: response.nama,
              series: response.count
            }, {
              distributeSeries: true
            });
        }
    });

    new Chartist.Bar('.ct-chartistnonajax', {
    labels: {!!$categories->pluck('name')!!},
    series: {!!$categories->pluck('products_count')!!}
    }, {
    distributeSeries: true
    });

</script>
@endsection
