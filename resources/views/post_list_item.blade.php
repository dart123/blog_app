<a class="col-6 post_item" href="/articles/{{$post->slug}}">
    <div class="row">
        <p class="col-12">id поста: {{$post->id}}</p>
        <h2 class="post_title col-12">
            {{$post->title}}
        </h2>
    </div>

    <div class="row">
        <img class="post_img col-4" src="https://via.placeholder.com/150/000000/FFFFFF/?text=Post_image">

        <p class="post_descr col-8">
            {{substr($post->description, 0, 100) . ' ...'}}
        </p>

        <p class="col-12 post_date">
            {{$post->created_at}}
        </p>
    </div>
</a>
