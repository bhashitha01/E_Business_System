<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin Dashboard')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect"
          href="https://fonts.gstatic.com"
          crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet"
          href="{{ asset('loadmin/css/dashboard.css') }}">
    
    <link rel="stylesheet"
          href="{{ asset('loadmin/css/category.css') }}">

     <link rel="stylesheet"
          href="{{ asset('loadmin/css/product.css') }}">
         

    @yield('styles')

</head>

<body>

    <!-- SIDEBAR -->

    <aside class="sidebar">

        <div class="logo">

            <div class="logo-icon">
                <i class="fa-solid fa-layer-group"></i>
            </div>

            <h2>Admin Panel</h2>

        </div>


        <div class="menu-title">
            Main Menu
        </div>


        <nav class="nav-menu">

            <a href="{{ route('admin.dashboard') }}"
               class="nav-item active">

                <i class="fa-solid fa-chart-pie"></i>

                <span>Dashboard</span>

            </a>


            <a href="{{ route('admin.categories.index') }}"
               class="nav-item">

                <i class="fa-solid fa-folder"></i>

                <span>Categories</span>

            </a>


            <a href="{{ route('admin.products.index') }}" class="nav-item">

                <i class="fa-solid fa-box"></i>

                <span>Products</span>

            </a>


            <a href="#" class="nav-item">

                <i class="fa-solid fa-users"></i>

                <span>Users</span>

            </a>


            <a href="#" class="nav-item">

                <i class="fa-solid fa-cart-shopping"></i>

                <span>Orders</span>

            </a>

        </nav>


        <div class="sidebar-bottom">

            <form action="{{ route('admin.logout') }}" method="POST">

                @csrf

                <button type="submit" class="logout-btn">

                    <i class="fa-solid fa-right-from-bracket"></i>

                    <span>Logout</span>

                </button>

            </form>

        </div>

    </aside>


    <!-- MAIN -->

    <main class="main">

        <header class="topbar">

            <div class="page-title">

                <h1>@yield('title', 'Dashboard')</h1>

                <p>Manage your system from here</p>

            </div>


            <div class="admin-profile">

                <div class="profile-avatar">

                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}

                </div>

                <div class="profile-info">

                    <strong>
                        {{ auth()->user()->name }}
                    </strong>

                    <span>Administrator</span>

                </div>

            </div>

        </header>


        <section class="content">

            @yield('content')

        </section>

    </main>


    @yield('scripts')
    <script src="{{ asset('loadmin/js/dashboard.js') }}" ></script>
</body>
</html>