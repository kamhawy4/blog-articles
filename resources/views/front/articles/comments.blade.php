<div class="comment">
<div class="comment-inner">
    <div class="author-thumb"><img src="images/resource/author-2.jpg" alt=""></div>
    <!--comment-content-->
    <div class="comment-content">
    	<div class="comment-info"><h4> {{$commentArticle->name}}</h4><div class="date">{{$commentArticle->created_at->diffForHumans()}}</div></div>
        <div class="text">{{$commentArticle->title}}</div>
    </div> 
</div>
</div>