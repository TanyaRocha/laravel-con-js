<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->

<html lang="en">

@section('htmlheader')
    @include('admin.partials.htmlheader')
@show

<body class="skin-blue sidebar-mini">
<div class="wrapper">
    @include('admin.partials.mainheader')
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
       
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo $_SESSION['usuario']?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        
        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('adminlte_lang::message.header') }}</li>
            <!-- Optionally, you can add icons to the links -->
                <?php 
                    if($_SESSION["autentificado"])
                ?>
            @inject('menu','daf\Http\Controllers\MenuController')
            <li class="treeview">
            @foreach ($menu->submenus() as $link01)
                <?php $grupo01 = 0;
                 $grupo01 = $link01->grp_id; ?>
                
                <a href="#"><i class='fa fa-link'></i> 
                <span> {{ $link01->grp_grupo }} </span> 
                <i class="fa fa-angle-left pull-right"></i></a>

                @inject('menu','daf\Http\Controllers\MenuController')
                <ul class="treeview-menu">
                @foreach ($menu->links() as $link02)
                
                    @if ($grupo01 === $link02->opc_grp_id)
                        <li><a href="{{ url($link02->opc_contenido) }}">{{ $link02->opc_opcion }}</a></li>
                    @endif
                @endforeach
                <?php
                    if(!$_SESSION["autentificado"])
                ?>
                    
                </ul>
            @endforeach
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>

    <div class="content-wrapper">

        @include('admin.partials.contentheader')

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('main-content')
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    @include('admin.partials.controlsidebar')

    @include('admin.partials.footer')

</div><!-- ./wrapper -->

@section('scripts')
    @include('admin.partials.scripts')
@show

</body>
</html>
