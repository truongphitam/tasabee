<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! Auth::guard('admins')->user()->image !!}" class="img-circle admin-avatar"
                    alt="{!! Auth::guard('admins')->user()->name !!}">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::guard('admins')->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{!! areActiveRoutes(['admin.dashboard'],'active') !!}">
                <a href="{!! route('admin.dashboard') !!}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            
            <li class="{!! areActiveRoutes(['page.index','page.create','page.show'],'active') !!}">
                <a href="{{ route('page.index') }}">
                    <i class="fa fa-newspaper-o"></i> <span>{!! trans('admin.object.page') !!}</span>
                </a> 
            </li> 

            <li class="{!! are_active_routes(['post.index','post.create','post.show','post.cate.index','post.cate.show'], type_posts()) !!}">
                <a href="{!! route('post.index', ['post_type' => type_posts()]) !!}">
                    <i class="fa fa-edit"></i> <span>Tin tức </span>
                    <span class="hidden pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="hidden treeview-menu">
                    <li class="{!! are_active_routes(['post.index','post.show'], type_posts()) !!}">
                        <a href="{!! route('post.index', ['post_type' => type_posts()]) !!}"><i class="fa fa-circle-o"></i> {!!
                            trans('admin.field.list') !!}</a></li>
                    <li class="{!! are_active_routes(['post.create'], type_posts()) !!}"><a
                            href="{!! route('post.create', ['post_type' => type_posts()]) !!}"><i class="fa fa-circle-o"></i> {!!
                            trans('admin.field.add') !!}</a></li>
                    <li class="{!! hidden_categories_by_type(type_posts()) !!} {!! are_active_routes(['post.cate.index','post.cate.show'], type_posts()) !!}"><a
                            href="{!! route('post.cate.index', ['post_type' => type_posts()]) !!}"><i class="fa fa-circle-o"></i> {!!
                            trans('admin.field.categories') !!}</a></li>
                </ul>
            </li>

            <li class="{!! are_active_routes(['post.index','post.create','post.show','post.cate.index','post.cate.show'], type_event()) !!}">
                <a href="{!! route('post.index', ['post_type' => type_event()]) !!}">
                    <i class="fa fa-calendar"></i> <span>Sự kiện</span>
                    <span class="hidden pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a> 
            </li>
            <li class="header">SẢN PHẨM & BÁN</li>
            <li class="{!! areActiveRoutes(['contact.index','team.add','team.show'],'active') !!}">
                <a href="{!! route('contact.index') !!}?type=product">
                    <i class="fa fa-tasks"></i> <span>Liên hệ</span>
                </a>
            </li>
            <li class="treeview {!! areActiveRoutes(['products.index','products.create','products.show','products.cate.index','products.cate.show', 'products.attributes.index', 'products.attributes.show'], 'active') !!}">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Sản phẩm</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{!! areActiveRoutes(['products.index','products.show'], 'active') !!}">
                        <a href="{!! route('products.index') !!}"><i class="fa fa-circle-o"></i> {!!
                            trans('admin.field.list') !!}</a></li>
                    <li class="hidden {!! areActiveRoutes(['products.create'], 'active') !!}"><a
                            href="{!! route('products.create') !!}"><i class="fa fa-circle-o"></i> {!!
                            trans('admin.field.add') !!}</a></li>
                    <li class="{!! areActiveRoutes(['products.cate.index','products.cate.show'], 'active') !!}">
                        <a href="{!! route('products.cate.index') !!}"><i class="fa fa-circle-o"></i> {!!
                            trans('admin.field.categories') !!}</a></li>
                    <li class="{!! areActiveRoutes(['products.attributes.index','products.attributes.show'], 'active') !!}">
                        <a href="{!! route('products.attributes.index') !!}"><i class="fa fa-circle-o"></i> {!!
                            trans('admin.field.attributes') !!}</a></li>
                </ul>
            </li>

            <li class="{!! areActiveRoutes(['orders.index','orders.create','orders.show'], 'active') !!}">
                <a href="{{ route('orders.index')}}">
                    <i class="fa fa-pie-chart"></i> <span>Bán hàng</span>
                    <span class="hidden pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="hidden treeview-menu">
                    <li class="{!! areActiveRoutes(['orders.index','orders.show'], 'active') !!}">
                        <a href="{!! route('orders.index') !!}"><i class="fa fa-circle-o"></i> {!!
                            trans('admin.field.list') !!}</a></li>
                    <li class="{!! areActiveRoutes(['orders.create'], 'active') !!}"><a
                            href="{!! route('orders.create') !!}"><i class="fa fa-circle-o"></i> {!!
                            trans('admin.field.add') !!}</a></li>
                </ul>
            </li>
            
            <li class="header">KHÁCH HÀNG</li>
            <li class="{!! areActiveRoutes(['contact.index','team.add','team.show'],'active') !!}">
                <a href="{!! route('contact.index') !!}?type=contact">
                    <i class="fa fa-tasks"></i> <span>Liên hệ</span>
                </a>
            </li>
            <li class="{!! areActiveRoutes(['users.index','users.create','users.show'], 'active') !!}">
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-users"></i> <span>Khách hàng</span>
                </a>
            </li> 
            @if(Auth::guard('admins')->user()->role == 'administrator')
                <li class="{!! areActiveRoutes(['member.index','member.create','member.show'],'active') !!}">
                    <a href="{{ route('member.index') }}">
                        <i class="fa fa-user-secret"></i> <span>{!! trans('admin.object.member') !!}</span>
                    </a>
                </li> 
            @endif
            @if(Auth::guard('admins')->user()->role == 'administrator')
                <li class="header">CÀI ĐẶT</li>
                <li class="{!! areActiveRoutes(['team.index','team.create','team.show'],'active') !!}">
                    <a href="{!! route('team.index') !!}">
                        <i class="fa fa-tasks"></i> <span>TEAM</span>
                    </a>
                </li>
                <li class="{!! areActiveRoutes(['slider.index','slider.create','slider.show'],'active') !!}">
                    <a href="{!! route('slider.index') !!}">
                        <i class="fa fa-tasks"></i> <span>{!! trans('admin.object.slider') !!}</span>
                    </a>
                </li>
                <li class="treeview {!! areActiveRoutes(['settings.overview','settings.translation','settings.custom'],'active') !!}">
                    <a href="#">
                        <i class="fa fa-wrench"></i> <span>{!! trans('admin.object.settings') !!}</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{!! areActiveRoutes(['settings.overview'],'active') !!}"><a
                                href="{!! route('settings.overview') !!}"><i class="fa fa-circle-o"></i> {!!
                                trans('admin.object.overview') !!}</a></li>
                        <li class="{!! areActiveRoutes(['settings.translation'],'active') !!}"><a
                                href="{!! route('settings.translation') !!}"><i class="fa fa-circle-o"></i> {!!
                                trans('admin.object.translation') !!}</a></li>
                        <li class="{!! areActiveRoutes(['settings.custom'],'active') !!}"><a
                                href="{!! route('settings.custom') !!}"><i class="fa fa-circle-o"></i> {!!
                                trans('admin.object.custom') !!}</a></li>
                    </ul>
                </li>
            @endif
            <li class="header">CONFIG</li>
            <li class=""><a href="{{ route('login.logout') }}"><i class="fa fa-circle-o text-red"></i> <span>Thoát</span></a></li>
            <li class="hidden"><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li class="hidden"><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
</aside>