@extends('web.master')
@section('content')

<section class="bg-top clearfix">
    <img src="/assets/web/images/bg-blog.jpg">
    <div class="container">
        <div class="top-cat-name">
            <b>
                BLOG
            </b>
            <ul class="list-inline text-center">
                <li class="list-inline-item">
                    <a href="">
                        Home
                    </a>
                </li>
                /
                <li>
                    <a href="">
                        Blog
                    </a>
                </li>
                /
                <li>
                    <a>
                        Blog
                    </a>
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="blog-single padding-50">
    <img src="/assets/web/images/blog-bee-left.png" class="hidden-xs blog-bee-left">
    <img src="/assets/web/images/blog-bee-right.png" class="hidden-xs blog-bee-right">

    <div class="container">
        <p>
            <img src="/assets/web/images/bg-blog.jpg" class="img-responsive">
        </p>
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1">
                <h1>
                    <strong>
                        Neque Porro Quisquam
                    </strong>
                </h1>
                <p class="c_363636">
                    <i class="fa fa-calendar"></i> 11/11/1111
                </p>
                <div class="text-justify">
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo duis aute irure.
                    <Br/>
                    Nemo enim ipsam voluptatem quia voluptas sit magni dolores porro quisquam est, qui dolorem ipsum aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora.
                </div>



                <!---->
                <div class="post-action">

                </div>
                <!---->
            </div>
        </div>
    </div>
</section>

@endsection
@section('css')

@endsection
@section('js')

@endsection