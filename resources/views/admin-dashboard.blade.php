@extends('layouts.app')

@section('content')

    <!--start header-->
    <div class="navbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link">
                    <i class="fas fa-bars" onclick="collapseSidebar()"></i>
                </a>
            </li>
            <li class="nav-item">
                <img src="images/AT-pro-black.png" alt="" class="logo logo-light">
                <img src="images/AT-pro-white.png" alt="" class="logo logo-dark">
            </li>
        </ul>
        <form class="navbar-search">
            <input type="text" name="Search" class="navbar-search-input" placeholder="What are you looking for...?">
            <i class="fas fa-search"></i>
        </form>
        <ul class="navbar-nav nav-right">
            <li class="nav-item">
                <a href="#" class="nav-link" onclick="switchTheme()">
                    <i class="fas fa-moon dark-icon"></i>
                    <i class="fas fa-sun light-icon"></i>
                </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link">
                    <i class="fas fa-bell dropdown-toggle" data-toggle="notification-menu"></i>
                    <span class="navbar-badge">15</span>
                </a>
                <ul id="notification-menu" class="dropdown-menu notification-menu">
                    <div class="dropdown-menu-header">
                        <span>Notification</span>
                    </div>
                    <div class="dropdown-menu-content overlay-scrollbar">
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-gift"></i>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                                    perferendis.
                                    <br>
                                    <span>3/1/2021</span>
                                </span>

                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                                    perferendis.
                                    <br>
                                    <span>3/1/2021</span>
                                </span>

                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-gift"></i>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                                    perferendis.
                                    <br>
                                    <span>3/1/2021</span>
                                </span>

                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                                    perferendis.
                                    <br>
                                    <span>3/1/2021</span>
                                </span>

                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-gift"></i>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                                    perferendis.
                                    <br>
                                    <span>3/1/2021</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                                    perferendis.
                                    <br>
                                    <span>3/1/2021</span>
                                </span>

                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-gift"></i>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                                    perferendis.
                                    <br>
                                    <span>3/1/2021</span>
                                </span>

                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                                    perferendis.
                                    <br>
                                    <span>3/1/2021</span>
                                </span>

                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-gift"></i>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                                    perferendis.
                                    <br>
                                    <span>3/1/2021</span>
                                </span>

                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                                    perferendis.
                                    <br>
                                    <span>3/1/2021</span>
                                </span>

                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-gift"></i>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                                    perferendis.
                                    <br>
                                    <span>3/1/2021</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-tasks"></i>
                                </div>
                                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat,
                                    perferendis.
                                    <br>
                                    <span>3/1/2021</span>
                                </span>

                            </a>
                        </li>
                    </div>
                    <div class="dropdown-menu-footer">
                        <span>View all notification</span>
                    </div>
                </ul>
            </li>
            <li class="nav-item">
                <div class="avt dropdown">
                    <img src="images/tuat.jpg" alt="" class="dropdown-toggle" data-toggle="user-menu">
                    <ul id="user-menu" class="dropdown-menu">

                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <span>Profile</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-cog"></i>
                                </div>
                                <span>Settings</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-credit-card"></i>
                                </div>
                                <span>Payments</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-spinner"></i>
                                </div>
                                <span>Projects</span>
                                </span>
                            </a>
                        </li>
                        <li class="dropdown-menu-item">
                            <a href="#" class="dropdown-menu-link">
                                <div>
                                    <i class="fas fa-sign-out-alt"></i>
                                </div>
                                <span>Logout</span>
                                </span>
                            </a>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>
    </div>
    <!--end header-->

    <!--start sidebar-->
    <div class="sidebar">
        <ul class="sidebar-nav">
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link active">
                    <div>
                        <i class="fab fa-accusoft"></i>
                    </div>
                    <span>Lorem</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-tasks"></i>
                    </div>
                    <span>Morbi</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-spinner"></i>
                    </div>
                    <span>Praesent</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <span>Pellentesque</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-bug"></i>
                    </div>
                    <span>Morbi</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <span>Praesent</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-book-open"></i>
                    </div>
                    <span>Pellentesque</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-adjust"></i>
                    </div>
                    <span>Morbi</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fab fa-algolia"></i>
                    </div>
                    <span>Praesent</span>
                </a>
            </li>
            <li class="sidebar-nav-item">
                <a href="#" class="sidebar-nav-link">
                    <div>
                        <i class="fas fa-audio-description"></i>
                    </div>
                    <span>Pellentesque</span>
                </a>
            </li>
        </ul>
    </div>
    <!--end sidebar-->


    <!--start wrapper-->
    <div class="wrapper">
        <div class="row-0">
            <div class="col-3 col-sm-6 col-m-6">
                <div class="counter bg-primary">
                    <p>
                        <i class="fas fa-tasks"></i>
                    </p>
                    <h3>100+</h3>
                    <p>To do</p>
                </div>
            </div>
            <div class="col-3 col-sm-6 col-m-6">
                <div class="counter bg-warning">
                    <p>
                        <i class="fas fa-spinner"></i>
                    </p>
                    <h3>100+</h3>
                    <p>In progress</p>
                </div>
            </div>
            <div class="col-3 col-sm-6 col-m-6">
                <div class="counter bg-success">
                    <p>
                        <i class="fas fa-check-circle"></i>
                    </p>
                    <h3>100+</h3>
                    <p>Completed</p>
                </div>
            </div>
            <div class="col-3 col-sm-6 col-m-6">
                <div class="counter bg-danger">
                    <p>
                        <i class="fas fa-bug"></i>
                    </p>
                    <h3>100+</h3>
                    <p>Issues</p>
                </div>
            </div>
        </div>

        

    </div>
    <!--end wrapper-->
    @endsection