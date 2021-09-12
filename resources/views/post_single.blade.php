@extends('base.base')

@section('title', 'Главная')

@section('content')

    @include('partials.nav_menu')

    <div class="row post_full">
        <div class="col-12">
            <div class="row">
                <h2 class="post_title col-12">
                    {{$post['info']->title}}
                </h2>
            </div>

            <div class="row">
                <img class="post_img col-6" src="https://via.placeholder.com/300/000000/FFFFFF/?text=Post_image">
                <div class="col-6"></div>

                <p class="post_descr col-12">
                    {{$post['info']->description}}
                </p>

            </div>

            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <p class="col-12">Лайк</p>
                    </div>

                    <div class="row">
                        <button class="col-12 like_btn btn btn-secondary">
                            <span>{{$post['likes']}}</span>
                        </button>
                    </div>
                </div>

                <p class="col-6">Просмотров: {{$post['views']}}</p>
            </div>

            <div class="row">
                <div class="col-12">
                    <h2>Отправить комментарий</h2>
                    <form class="row" id="comment_form" action="/api/add_comment" enctype="multipart/form-data" method="post" name="comment">
                        <input type="hidden" name="post_id" value="{{$post['info']->id}}">

                        <label class="col-12" for="title">Тема</label>
                        <input class="col-12" id="title" type="text" name="title" required>

                        <label class="col-12" for="comment">Комментарий</label>
                        <textarea class="col-12" id="comment" name="content" rows="10" required></textarea>

                        <button type="submit" class="btn btn-secondary submit_btn">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
