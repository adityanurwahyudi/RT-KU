
<link href="{{asset('/sbadmin/css/styles2.css')}}" rel="stylesheet" />
<style>

    .sb-topnav.navbar .navbar-nav > li.dropdown .badge.badge-default {
        background-color: #ffde00;
        color: #000000;
        border-radius: 13px;
        font-size: 11px;
        position: absolute;
        top: 0px;
        right: -3px;
    }
    .sb-topnav.navbar .navbar-nav > li.dropdown .badge.badge-primary {
        background-color: #cdcdcd;
        color: #000000;
        border-radius: 13px;
        font-size: 11px;
        top: 0px;
        right: -3px;
    }
    .dropdown-menu .header {
        font-size: 13px;
        font-weight: bold;
        min-width: 270px;
        border-bottom: 1px solid #eee;
        text-align: left;
        padding: 4px 0 6px 6px;
    }
    #dropdownNotifikasi li{
        list-style: none;
    }
    .dropdown-menu ul.menu .menu-info {
        display: inline-block;
        position: relative;
        text-align: justify;
        color:black;
        font-family:Verdana;
        font-size: 14px;
    }
    .dropdown-menu ul.menu .icon-circle {
        width: 36px;
        height: 36px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%;
        color: #fff;
        text-align: center;
        display: inline-block;
    }
    .bg-light-green {
        background-color: #8BC34A !important;
        color: #fff;
    }
    .fa-user{
        vertical-align:-0.4rem;
    }
    .waves-effect li{
        border-bottom: 1px solid #eee;
        padding:6px;
    }
    .waves-effect li:hover{
        background-color: #858585;
    }
  

</style>

<?php
            $id_users = Auth::guard('admin')->user()->id;
            $users = DB::table('users')->where('users.id',$id_users)
            ->leftjoin('detail_users','detail_users.id_users','users.id')
            ->first();
            ?>
            
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" >Administrator</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> -->
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <?php
                $id_users = Auth::guard('admin')->user()->id;
                $notification = notification($id_users);
            ?>
            <!-- <a class="nav-link" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <span class="badge badge-default" id="badgeNotifikasi">
                   {{ count($notification) }}
                </span>
            </a> -->
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown" style="min-width:24rem;">
                <ul class="dropdown-menu-list scroller" style="height: 280px;padding-left:0rem;overflow-y:auto" data-handle-color="#637283" id="dropdownNotifikasi">
                    <li class="header" id="headerNotifikasi">{{ count($notification) }} NOTIFICATION</li>
                    <li class="body">
                        <div style="position: relative; overflow: hidden; width: auto;">
                            <ul class="menu" style="overflow: hidden; width: auto;padding-left:0;" id="bodyNotifikasi">
                                @foreach($notification as $val)
                                <a href="{{ $val->url.'?id_notif='.$val->id }}" class="waves-effect waves-block">
                                    <li>
                                        <div class="row">
                                            <div class="col-sm-1" style="margin:5px;">
                                                <div class="icon-circle bg-light-green">
                                                    <i class="fa fa-user"></i>
                                                </div>
                                            </div>
                                            <div class="col-sm-10">
                                                <div class="col-sm-12">
                                                    <div class="menu-info">
                                                        <span>{{ $val->deskripsi }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <i class="badge badge-primary">
                                                        <i class="fa fa-clock"></i> {{ $val->created_at }}
                                                    </i>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                </ul>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li >
                    <div class="sb-nav-link-icon">
                    <a class="dropdown-item" class="nav-link" value="{{ $users->name }}" href="">{{ $users->name }}</a>
                </li>
                <li onclick="event.preventDefault();document.getElementById('logout').submit();">
                    <a class="dropdown-item" href="#!">Logout</a>
                </li>
                <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                 </form>
            </ul>
        </li>
    </ul>
</nav>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>