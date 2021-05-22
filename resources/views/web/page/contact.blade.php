@extends('web.master')
@section('meta_title',isset($page->meta_title) ? $page->meta_title : $settings->meta_title)
@section('meta_description',isset($page->meta_description) ? $page->meta_description : $settings->meta_description)
@section('meta_keywords',isset($page->meta_keywords) ? $page->meta_keywords : $settings->meta_keywords)
@section('image',isset($page->image) ? url('/').$page->image : $settings->image)
@section('content')
    @include('web.blocks.slider')
    <div class=" header-notification">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="br-row">
                        <div class="br-col-middle br-col-12 padding-right-0">
                            <div class="text-center">
                                <p class="title-notification">Liên hệ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="contact" class="">
        <div class="container">
            <div class="br-row contact-wrapper">
                <div class="br-col-middle br-col-6 contact-left">
                    <div class="wrapper-contract">
                        <img class="img-responsive img-logo-header" src="{!! $settings->logo !!}"
                             alt="{!! $settings->title !!}"/>
                        <p class="main-contract">
                            <i class="icon-contract fa fa-map-marker"></i>
                            <span class="text-contract">{!! $settings->expert !!}</span>
                        </p>
                        <p class="main-contract">
                            <i class="icon-contract fa fa-envelope"></i>
                            <span class="text-contract">{!! $settings->email !!}</span>
                        </p>
                        <p class="main-contract">
                            <i class="icon-contract fa fa-phone"></i>
                            <span class="text-contract">{!! $settings->phone !!}</span>
                        </p>
                    </div>
                </div>
                <div class="br-col-middle br-col-6 contact-right">
                    <div class="wrapper-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5985844730367!2d106.70193631480069!3d10.765387992329034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f6a472726a1%3A0xb4fb866ddcd2c75!2zMjAvMTEgTmd1eeG7hW4gVHLGsOG7nW5nIFThu5ksIFBoxrDhu51uZyAxMiwgUXXhuq1uIDQsIEjhu5MgQ2jDrSBNaW5o!5e0!3m2!1svi!2s!4v1554084650672!5m2!1svi!2s"
                                frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-contact hidden">
        <div class="container">
            <div class="row">
                <div class="">
                    <div class="br-row">
                        <div class="br-col-middle br-col-12 padding-right-0">
                            <div class="text-center">
                                <p class="title-notification">Tiêu đề</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="contact-list hidden" style="display: none">
        <div class="container">
            <div class="br-row contact-list-wrapper">
                <div class="br-col br-col-3 block">
                    <img class="img-responsive" src="/assets/web/images/page/contact-p1.png" alt="">
                    <h3 class="contact-person-title">Brent Sanuder</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                </div>
                <div class="br-col br-col-3 block">
                    <img class="img-responsive" src="/assets/web/images/page/contact-p2.png" alt="">
                    <h3 class="contact-person-title">Brent Sanuder</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                </div>
                <div class="br-col br-col-3 block">
                    <img class="img-responsive" src="/assets/web/images/page/contact-p3.png" alt="">
                    <h3 class="contact-person-title">Brent Sanuder</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                </div>
                <div class="br-col br-col-3 block">
                    <img class="img-responsive" src="/assets/web/images/page/contact-p4.png" alt="">
                    <h3 class="contact-person-title">Brent Sanuder</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. </p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .hidden, .contact-list {
            display: none !important;
        }

        .wrapper-map iframe {
            width: 100%;
            min-height: 400px;
        }
    </style>
@endsection