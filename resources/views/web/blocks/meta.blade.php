<title>{!! isset($page->meta_title) ? $page->meta_title : $settings->meta_title !!}</title>
<!-- <link href="data:image/x-icon;base64,AAABAAEAEBAQAAAAAAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAsC8qAP+EAACzh1cAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACAAAAAAAAACAAAAAAAAACAAAAAAAAEiAAAAADAAAiAAAAAAMzAiAAAAAAAAMzAAAAAAAAAiMzMAAAAAAAADAzAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAD//wAA//8AAP//AAD//wAA//8AAP//AAD//wAA//8AAP//AAD//wAA//8AAP//AAD//wAA//8AAP//AAD//wAA" rel="icon" type="image/x-icon" /> -->
<link rel="icon" type="image/jpg" href="/assets/web/images/favicon.jpg" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="{!! isset($page->meta_description) ? $page->meta_description : $settings->meta_description !!}">
<meta name="keywords" content="{!! isset($page->meta_keywords) ? $page->meta_keywords : $settings->meta_keywords !!}">
<link rel="canonical" href="{!! URL::current() !!}">
<meta property="og:title" content="{!! isset($page->meta_title) ? $page->meta_title : $settings->meta_title !!}">
<meta property="og:description" content="{!! isset($page->meta_title) ? $page->meta_title : $settings->meta_title !!}">
<meta property="og:image" content="{!! isset($page->image) ? url('/').$page->image : $settings->image !!}"/>
<meta property="og:url" content="{!! URL::current() !!}">
<meta property="og:type" content="Website">