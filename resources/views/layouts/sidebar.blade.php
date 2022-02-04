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

                    <li class="menu-title" key="t-pages">
                      
                        {{ $group->name }}
                        
                    </li>
                        @foreach($group->menu()->get() as $menu)
                            @if($menu->parent==0)
                            <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="{{ $menu->icon }}"></i>
                                        <span>{{$menu->name}}</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        @foreach($menu->submenu()->get() as $submenu)
                                        <li><a href="index" >{{ $submenu->name }}</a></li>
                                        @endforeach
                                    </ul>
                            </li>
                            @endif

                        @endforeach

                    @endforeach
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
