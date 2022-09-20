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
                <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }} form-group-default ">
                    {!! Form::label('category', 'Filter Category') !!}
                    {!! Form::select('category',$categories->pluck('name','id'), null, ['id' => 'category', 'class' => 'form-control','multiple']) !!}
                    <small class="text-danger">{{ $errors->first('category') }}</small>
                </div>
                <div class="ct-chart"></div>
                <div class="ct-piechart"></div>
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
    $('#category').select2();
    $('#category').change(function (e) {
        $.ajax({
            type: "post",
            url: "{{route('category.summaryByAjax')}}",
            data: {
                _token: '{{ csrf_token() }}',
                categories: $('#category').val()
            },
            success: function (response) {
                console.log(response);
                new Chartist.Bar('.ct-chart', {
                labels: response.nama,
                series: response.count
                }, {
                distributeSeries: true
                });
                var data = {
                    labels: response.nama,
                    series: response.count
                };
                new Chartist.Pie('.ct-piechart', data);
            }
        });

    });

    new Chartist.Bar('.ct-chartistnonajax', {
    labels: {!!$categories->pluck('name')!!},
    series: {!!$categories->pluck('products_count')!!}
    }, {
    distributeSeries: true
    });

</script>
@endsection
