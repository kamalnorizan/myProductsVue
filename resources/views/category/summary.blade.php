@extends('layouts.app')

@section('head')
<link rel="stylesheet" href="{{ asset('css/chartist.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="ct-chart"></div>
    </div>
</div>

@endsection

@section('script')
<script src="{{ asset('js/chartist.min.js') }}"></script>
<script>
new Chartist.Bar('.ct-chart', {
  labels: {!!$categories->pluck('name')!!},
  series: {!!$categories->pluck('products_count')!!}
}, {
  distributeSeries: true
});

</script>
@endsection
