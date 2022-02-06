<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

 
        <!--- Sidemenu -->
        <div id="sidebar-menu">

     
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

                    <li>
                        <a href="{{ route('home')}}" class="waves-effect">
                        <i class="dripicons-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    @foreach($menugroup as $group)
                       
                        @can($group->permission)
                            <li class="menu-title" key="t-pages">
                            
                                {{ $group->name }}
                                
                            </li>
                                @foreach($group->menu()->orderby('order','asc')->get() as $menu)
                              
                                    @can($menu->permission)
                                            @if($menu->parent==0)
                                            <li>
                                                @if($menu->submenu()->count()==0)

                                                    <a href="@if(!empty($menu->routename)&&route::has($enu->routename)){{ route($menu->routename) }}@if(!empty($menu->urlid))/{{$menu->urlid}}@endif
                                                                @else#@endif" class="waves-effect">
                                                        <i class="{{ $menu->icon }}"></i>
                                                        <span>{{$menu->name}}</span>
                                                    </a>

                                                @else
                                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                                        <i class="{{ $menu->icon }}"></i>
                                                        <span>{{$menu->name}}</span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        @foreach($menu->submenu()->get() as $submenu)
                                                            @can($submenu->permission)
                                                                <li><a href="@if(!empty($submenu->routename)&&route::has($submenu->routename)){{ route($submenu->routename) }}@if(!empty($submenu->urlid))/{{$submenu->urlid}}@endif
                                                                @else#@endif" >
                                                                        {{ $submenu->name }}
                                                                    </a>
                                                                </li>
                                                            @endcan
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                            @endif
                                    @endcan
                                @endforeach
                        @endcan

                    @endforeach
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
