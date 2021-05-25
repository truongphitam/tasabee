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
                    <div class="row">
                        <div class="col-8 col-md-9">
                            <div class="row align-items-center justify-content-right">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="#">
                                            <i class="fa fa-chevron-left"></i> older post
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="#">
                                            new post <i class="fa fa-chevron-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-4 col-md-3">
                            <div class="d-flex align-items-center justify-content-around">
                                <small class="d-flex align-items-center">CHIA SẺ &nbsp;<img src="/assets/web/images/icon-share.png" width="15"></small> 
                                <a href="">
                                    <img src="/assets/web/images/icon-fb.png" width="24">
                                </a>
                                <a href="">
                                    <img src="/assets/web/images/icon-twiter.png" width="24">
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="blog-comment padding-25">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1">
                    <p class="blog-comment-title">
                        <strong>
                            Comment
                        </strong>
                    </p>
                    <p>
                        <strong>SANDRA RUIZ</strong>
                        <br/>
                        <small class="c_363636">
                            <i class="fa fa-calendar"></i> 11/11/1111
                        </small>
                    </p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. 
                    <hr class="product-detail-hr">
                    <p>
                        <strong>
                            Leave a comment:
                        </strong>
                        <br/>
                        Your email address will not be published. Required fields are marked *
                    </p>
                    <div class="row">
                        <div class="col-12">
                            <div class="frm-cmt-blog">
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="center-xs">
                                    <button class="btn btn-style-1">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
    @section('css')

    @endsection
    @section('js')

    @endsection