<?php

function MostrarHeader()
{
    echo '
        <header class="navbar-custom">
            <div class="navbar-left">
                <!-- Desktop sidebar toggle (visible on large screens only) -->
                <button class="btn-desktop-toggle d-none d-xl-flex align-items-center justify-content-center me-3"
                id="desktop-sidebar-toggle" aria-label="Minimize Sidebar">
                <i class="bi bi-chevron-bar-left"></i>
                </button>
                <!-- Mobile sidebar toggle -->
                <button class="sidebar-toggle-btn me-2" id="sidebar-toggle" aria-label="Toggle Navigation">
                <i class="bi bi-list"></i>
                </button>
            </div>

            <!-- Mid navbar: search pill -->
            <div class="navbar-search-wrapper">
                <input type="text" class="navbar-search-input" placeholder="..." id="main-search">
                <button class="navbar-search-btn" aria-label="Search">
                <i class="bi bi-search"></i>
                </button>
            </div>

            <!-- Right actions -->
            <div class="navbar-actions">       

                <!-- Profile Dropdown -->
                <div class="dropdown ms-2">
                <button class="navbar-profile-btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false" id="profile-dropdown">
                    <img src="../assets/images/avatar.png" alt="Profile Image" class="navbar-profile-img">
                    <span class="navbar-profile-name d-none d-md-inline">Administrator</span>
                    <i class="bi bi-chevron-down navbar-profile-caret"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-profile" aria-labelledby="profile-dropdown">
                    <li class="dropdown-header">Welcome !</li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-person"></i> My Account</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Settings</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-lock"></i> Lock Screen</a></li>
                    <li>
                    <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-danger" href="page-login.html"><i class="bi bi-box-arrow-right"></i>
                        Logout</a></li>
                </ul>
                </div>
            </div>
        </header>
    ';
}

function MostrarFooter()
{
    echo '
        <footer class="footer-custom">
        <div class="footer-left">
            <span class="footer-logo">
            <i class="bi bi-asterisk"></i> Spark Admin
            </span>
        </div>
        </footer>
    ';
}

function MostrarSidebar()
{
    echo '
        <div class="sidebar-wrapper" id="sidebar">
            <!-- Brand Logo / Identity -->
            <a href="index.html" class="sidebar-brand">
            <i class="bi bi-asterisk"></i>
            <span>Proyecto MN!</span>
            </a>

            <!-- Navigation Menu -->
            <div class="flex-grow-1 overflow-y-auto">
            <!-- Group: Menu -->
            <div class="sidebar-menu-section">
                <div class="sidebar-menu-title">Menu</div>
                <ul class="sidebar-menu-list">
                <li class="sidebar-menu-item">
                    <a href="index.html" class="sidebar-menu-link active" id="menu-overview" title="Overview">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                    </a>
                </li>
                </ul>
            </div>

            <!-- Group: Components -->
            <div class="sidebar-menu-section">
                <div class="sidebar-menu-title">Components</div>
                <ul class="sidebar-menu-list">
                <li class="sidebar-menu-item">
                    <a href="tables-basic.html" class="sidebar-menu-link" id="menu-basictables" title="Basic Tables">
                    <i class="bi bi-table"></i>
                    <span>Basic Tables</span>
                    </a>
                </li>
                </ul>
            </div>
            </div>
        </div>
    ';
}

function IncludeCSS()
{
    echo '
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Proyecto Web - MN</title>

            <link rel="icon" type="image/png" href="../assets/images/favicon.ico">
            <link rel="stylesheet" href="../assets/libs/bootstrap/css/bootstrap.min.css">
            <link rel="stylesheet" href="../assets/libs/bootstrap-icons/bootstrap-icons.css">
            <link rel="stylesheet" href="../assets/libs/apexcharts/apexcharts.css">
            <link rel="stylesheet" href="../assets/libs/flatpickr/flatpickr.min.css">
            <link rel="stylesheet" href="../assets/css/main.css">
        </head>
    ';
}

function IncludeJS()
{
    echo '
        <script src="../assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/libs/apexcharts/apexcharts.min.js"></script>
        <script src="../assets/libs/flatpickr/flatpickr.min.js"></script>
        <script src="../assets/js/dashboard.js"></script>
    ';
}