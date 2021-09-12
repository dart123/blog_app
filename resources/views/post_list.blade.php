@extends('base.base')

@section('title', 'Каталог статей')

@section('content')

    @include('partials.nav_menu')

    <div class="row post_container">
        <div class="col-12">
            @foreach($posts as $post)
                @if($loop->iteration % 2 != 0)
                    <div class="row">
                        @include('post_list_item')
                        @else
                            @include('post_list_item')
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    <div class="row pagination">
        <div class="col-12">
            {{$posts->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>

@endsection
