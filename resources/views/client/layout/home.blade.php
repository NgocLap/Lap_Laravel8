@extends('client.master')

@section('title')
    <title>Trang Chủ</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('Client/home/home.css') }}">
@endsection

@section('content')

    @include('client.components.slider')


    <section>
        <div class="container">
            <div class="row">
                @include('client.components.category')
                <div class="col-sm-9 padding-right">
                    <!--features_items-->

                    @include('client.components.home.feature_product')
                    <!--features_items-->

                    <!--category-tab-->
                    @include('client.components.home.category_tab')

                    <!--/category-tab-->

                    <!--recommended_items-->
                    @include('client.components.home.recommend_product')
                    <!--/recommended_items-->

                </div>
            </div>
        </div>
    </section>


@endsection




@section('js')
    <link rel="stylesheet" href="{{ asset('Client/home/home.js') }}">
@endsection
