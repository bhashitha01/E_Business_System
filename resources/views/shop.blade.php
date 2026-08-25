<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shop — AyuruVeda</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('shop.css') }}">
</head>

<body>

<!-- =========================================================
     TOP BAR
========================================================= -->

<div class="topbar">

    <div class="topbar-item">
        <i class="fa-solid fa-truck"></i>
        Free Shipping on orders over LKR 5,000
    </div>

    <span class="top-divider">|</span>

    <div class="topbar-item">
        <i class="fa-solid fa-leaf"></i>
        100% Natural & Authentic Ayurvedic Products
    </div>

    <span class="top-divider">|</span>

    <div class="topbar-item">
        <i class="fa-solid fa-shield-halved"></i>
        Secure Payments
    </div>

    <div class="topbar-right">
        <span>LKR (Rs.) <i class="fa-solid fa-chevron-down"></i></span>
    </div>

</div>


<!-- =========================================================
     HEADER
========================================================= -->

<header class="header">

    <a href="{{ url('/') }}" class="logo">

        <div class="logo-icon">
            <i class="fa-solid fa-leaf"></i>
        </div>

        <div class="logo-text">
            <strong>AyuruVeda</strong>
            <small>Back to Nature</small>
        </div>

    </a>


    <nav class="main-nav">

        <a href="{{ url('/') }}">Home</a>

        <a href="{{ route('shop') }}" class="active">
            Shop
        </a>

        <a href="#categories">
            Categories
            <i class="fa-solid fa-chevron-down"></i>
        </a>

        <a href="#">Deals</a>

        <a href="#">About Us</a>

        <a href="#">Blog</a>

        <a href="#">Contact</a>

    </nav>


    <div class="header-actions">

        <button class="header-action">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>

        <button class="header-action">
            <i class="fa-regular fa-circle-user"></i>
        </button>

        <button class="header-action badge-button">

            <i class="fa-regular fa-heart"></i>

            <span class="badge">0</span>

        </button>

        <button class="header-action badge-button">

            <i class="fa-solid fa-cart-shopping"></i>

            <span class="badge">0</span>

        </button>

    </div>

</header>


<main>


<!-- =========================================================
     SHOP HERO
========================================================= -->

<section class="shop-hero">

    <div class="shop-hero-content">

        <div class="breadcrumb">

            <a href="{{ url('/') }}">Home</a>

            <i class="fa-solid fa-chevron-right"></i>

            <span>Shop</span>

        </div>


        <p class="hero-label">
            AYURVEDIC WELLNESS COLLECTION
        </p>

        <h1>
            Discover the Power<br>
            <span>of Nature.</span>
        </h1>

        <p class="hero-description">
            Explore our collection of authentic Ayurvedic
            products crafted with natural ingredients
            and traditional wisdom.
        </p>

    </div>

    <div class="hero-decoration">
        <i class="fa-solid fa-leaf leaf-one"></i>
        <i class="fa-solid fa-leaf leaf-two"></i>
        <i class="fa-solid fa-leaf leaf-three"></i>
    </div>

</section>


<!-- =========================================================
     CATEGORY BAR
========================================================= -->

<section class="category-section" id="categories">

    <div class="category-scroll">

        <a href="{{ route('shop') }}"
           class="category-item {{ !request('category') ? 'active' : '' }}">

            <div class="category-icon">
                <i class="fa-solid fa-leaf"></i>
            </div>

            <span>All Products</span>

        </a>


        @foreach($categories as $category)

            <a href="{{ route('shop', ['category' => $category->id]) }}"
               class="category-item
               {{ request('category') == $category->id ? 'active' : '' }}">

                <div class="category-icon">

                    <i class="{{ $category->icon ?? 'fa-solid fa-leaf' }}"></i>

                </div>

                <span>
                    {{ $category->name }}
                </span>

            </a>

        @endforeach

    </div>

</section>


<!-- =========================================================
     SHOP CONTENT
========================================================= -->

<section class="shop-section">

    <div class="shop-layout">


        <!-- =================================================
             SIDEBAR
        ================================================== -->

        <aside class="filter-sidebar">

            <div class="filter-header">

                <h3>Filters</h3>

                <button type="button" id="clearFilters">
                    Clear All
                </button>

            </div>


            <!-- PRICE -->

            <div class="filter-box">

                <div class="filter-title">
                    <span>Price Range</span>

                    <i class="fa-solid fa-chevron-up"></i>
                </div>


                <div class="price-range">

                    <input
                        type="range"
                        min="0"
                        max="10000"
                        value="{{ request('max_price', 10000) }}"
                        id="priceRange"
                    >

                    <div class="price-values">

                        <span>
                            LKR 0
                        </span>

                        <span id="maxPriceText">
                            LKR {{ request('max_price', 10000) }}
                        </span>

                    </div>

                </div>

            </div>


            <!-- CATEGORY -->

            <div class="filter-box">

                <div class="filter-title">

                    <span>Category</span>

                    <i class="fa-solid fa-chevron-up"></i>

                </div>


                <div class="filter-options">

                    @foreach($categories as $category)

                        <label class="filter-option">

                            <input
                                type="checkbox"
                                value="{{ $category->id }}"
                                {{ request('category') == $category->id ? 'checked' : '' }}
                            >

                            <span class="custom-checkbox"></span>

                            <span class="option-name">
                                {{ $category->name }}
                            </span>

                        </label>

                    @endforeach

                </div>

            </div>


            <!-- AVAILABILITY -->

            <div class="filter-box">

                <div class="filter-title">

                    <span>Availability</span>

                    <i class="fa-solid fa-chevron-up"></i>

                </div>


                <div class="filter-options">

                    <label class="filter-option">

                        <input type="checkbox" checked>

                        <span class="custom-checkbox"></span>

                        <span class="option-name">
                            In Stock
                        </span>

                    </label>

                    <label class="filter-option">

                        <input type="checkbox">

                        <span class="custom-checkbox"></span>

                        <span class="option-name">
                            Out of Stock
                        </span>

                    </label>

                </div>

            </div>


            <!-- PROMO -->

            <div class="filter-promo">

                <div>

                    <span>Get 10% Off</span>

                    <strong>
                        on your first order
                    </strong>

                    <small>
                        Use Code:
                        <b>AYURU10</b>
                    </small>

                </div>

                <i class="fa-solid fa-leaf"></i>

            </div>

        </aside>


        <!-- =================================================
             PRODUCTS
        ================================================== -->

        <div class="shop-products">


            <!-- PRODUCTS HEADER -->

            <div class="products-header">

                <div>

                    <p class="result-count">

                        Showing
                        <strong>
                            {{ $products->firstItem() ?? 0 }}
                            -
                            {{ $products->lastItem() ?? 0 }}
                        </strong>

                        of
                        <strong>
                            {{ $products->total() }}
                        </strong>

                        results

                    </p>

                </div>


                <div class="products-controls">

                    <form method="GET"
                          action="{{ route('shop') }}"
                          class="sort-form">

                        @if(request('category'))

                            <input type="hidden"
                                   name="category"
                                   value="{{ request('category') }}">

                        @endif

                        <label>
                            Sort by:
                        </label>

                        <select name="sort"
                                onchange="this.form.submit()">

                            <option value="popular"
                                {{ request('sort') == 'popular' ? 'selected' : '' }}>
                                Popular
                            </option>

                            <option value="latest"
                                {{ request('sort') == 'latest' ? 'selected' : '' }}>
                                Latest
                            </option>

                            <option value="price_low"
                                {{ request('sort') == 'price_low' ? 'selected' : '' }}>
                                Price: Low to High
                            </option>

                            <option value="price_high"
                                {{ request('sort') == 'price_high' ? 'selected' : '' }}>
                                Price: High to Low
                            </option>

                        </select>

                    </form>


                    <button class="view-button active">
                        <i class="fa-solid fa-grip"></i>
                    </button>

                    <button class="view-button">
                        <i class="fa-solid fa-list"></i>
                    </button>

                </div>

            </div>


            <!-- PRODUCT GRID -->

            @if($products->count())

                <div class="product-grid">

                    @foreach($products as $product)

                        <article class="product-card">


                            <!-- IMAGE -->

                            <div class="product-image">

                                @if($product->discount_price)

                                    @php

                                        $discount = round(
                                            (($product->price - $product->discount_price)
                                            / $product->price) * 100
                                        );

                                    @endphp

                                    <span class="discount-badge">
                                        -{{ $discount }}%
                                    </span>

                                @endif


                                <a href="#"
                                   class="product-image-link">

                                    @if($product->image)

                                        <img
                                            src="{{ asset('storage/' . $product->image) }}"
                                            alt="{{ $product->name }}"
                                        >

                                    @else

                                        <div class="product-no-image">

                                            <i class="fa-solid fa-leaf"></i>

                                        </div>

                                    @endif

                                </a>


                                <button class="wishlist-button"
                                        type="button">

                                    <i class="fa-regular fa-heart"></i>

                                </button>


                                @if($product->stock <= 0)

                                    <span class="out-stock">
                                        Out of Stock
                                    </span>

                                @endif

                            </div>


                            <!-- DETAILS -->

                            <div class="product-details">


                                @if($product->category)

                                    <span class="product-category">

                                        <i class="{{ $product->category->icon ?? 'fa-solid fa-leaf' }}"></i>

                                        {{ $product->category->name }}

                                    </span>

                                @endif


                                <h3 class="product-name">

                                    <a href="#">
                                        {{ $product->name }}
                                    </a>

                                </h3>


                                <div class="product-price">

                                    @if($product->discount_price)

                                        <strong>
                                            Rs.
                                            {{ number_format($product->discount_price, 0) }}
                                        </strong>

                                        <del>
                                            Rs.
                                            {{ number_format($product->price, 0) }}
                                        </del>

                                    @else

                                        <strong>
                                            Rs.
                                            {{ number_format($product->price, 0) }}
                                        </strong>

                                    @endif

                                </div>


                                <!-- RATING -->

                                <div class="product-rating">

                                    <span class="stars">

                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star"></i>
                                        <i class="fa-solid fa-star-half-stroke"></i>

                                    </span>

                                    <span class="rating-count">
                                        ({{ rand(5, 25) }})
                                    </span>

                                </div>


                                <!-- ADD TO CART -->

                                <div class="product-actions">

                                    @if($product->stock > 0)

                                        <button
                                            type="button"
                                            class="add-cart">

                                            <i class="fa-solid fa-cart-plus"></i>

                                            Add to Cart

                                        </button>

                                    @else

                                        <button
                                            type="button"
                                            class="add-cart disabled"
                                            disabled>

                                            Out of Stock

                                        </button>

                                    @endif


                                    <button
                                        type="button"
                                        class="card-wishlist">

                                        <i class="fa-regular fa-heart"></i>

                                    </button>

                                </div>

                            </div>

                        </article>

                    @endforeach

                </div>


                <!-- PAGINATION -->

                <div class="pagination">

                    {{ $products->withQueryString()->links() }}

                </div>

            @else

                <div class="empty-products">

                    <i class="fa-solid fa-box-open"></i>

                    <h3>
                        No products found
                    </h3>

                    <p>
                        There are currently no products matching
                        your selection.
                    </p>

                    <a href="{{ route('shop') }}">
                        View All Products
                    </a>

                </div>

            @endif

        </div>

    </div>

</section>


<!-- =========================================================
     BENEFITS
========================================================= -->

<section class="benefits">

    <div class="benefit-item">

        <div class="benefit-icon">
            <i class="fa-solid fa-leaf"></i>
        </div>

        <div>
            <strong>Natural Ingredients</strong>

            <span>
                Made with 100% natural
                herbs & extracts
            </span>
        </div>

    </div>


    <div class="benefit-item">

        <div class="benefit-icon">
            <i class="fa-solid fa-mortar-pestle"></i>
        </div>

        <div>
            <strong>Ayurvedic Wisdom</strong>

            <span>
                Backed by ancient
                Ayurvedic knowledge
            </span>
        </div>

    </div>


    <div class="benefit-item">

        <div class="benefit-icon">
            <i class="fa-solid fa-shield-heart"></i>
        </div>

        <div>
            <strong>Safe & Effective</strong>

            <span>
                Free from harmful
                chemicals
            </span>
        </div>

    </div>


    <div class="benefit-item">

        <div class="benefit-icon">
            <i class="fa-solid fa-earth-asia"></i>
        </div>

        <div>
            <strong>Sustainable</strong>

            <span>
                Eco-friendly packaging
                & processes
            </span>
        </div>

    </div>

</section>

</main>


<!-- =========================================================
     FOOTER
========================================================= -->

<footer class="footer">

    <div class="footer-grid">

        <div class="footer-brand">

            <div class="footer-logo">
                <i class="fa-solid fa-leaf"></i>

                <div>
                    <strong>AyuruVeda</strong>
                    <small>Back to Nature</small>
                </div>
            </div>

            <p>
                Your trusted partner for authentic
                Ayurvedic products and a healthier lifestyle.
            </p>

            <div class="social-links">

                <a href="#">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

                <a href="#">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="#">
                    <i class="fa-brands fa-whatsapp"></i>
                </a>

            </div>

        </div>


        <div class="footer-column">

            <h4>Quick Links</h4>

            <a href="#">About Us</a>
            <a href="{{ route('shop') }}">Shop</a>
            <a href="#categories">Categories</a>
            <a href="#">Deals</a>
            <a href="#">Blog</a>
            <a href="#">Contact Us</a>

        </div>


        <div class="footer-column">

            <h4>Customer Service</h4>

            <a href="#">My Account</a>
            <a href="#">Track Order</a>
            <a href="#">Wishlist</a>
            <a href="#">Returns & Refunds</a>
            <a href="#">FAQs</a>

        </div>


        <div class="footer-column">

            <h4>Contact Us</h4>

            <p>
                <i class="fa-solid fa-phone"></i>
                +94 77 123 4567
            </p>

            <p>
                <i class="fa-solid fa-envelope"></i>
                hello@ayuruveda.lk
            </p>

            <p>
                <i class="fa-solid fa-location-dot"></i>
                Colombo, Sri Lanka
            </p>

        </div>


        <div class="footer-column newsletter">

            <h4>Newsletter</h4>

            <p>
                Subscribe to get special offers,
                free giveaways, and once-in-a-lifetime deals.
            </p>

            <form>

                <input
                    type="email"
                    placeholder="Enter your email"
                >

                <button type="submit">
                    <i class="fa-solid fa-arrow-right"></i>
                </button>

            </form>

        </div>

    </div>


    <div class="footer-bottom">

        <span>
            © {{ date('Y') }} AyuruVeda. All rights reserved.
        </span>

        <div class="payment-icons">
            <span>VISA</span>
            <span>●●</span>
            <span>AMEX</span>
            <span>ezCash</span>
            <span>PayHere</span>
        </div>

    </div>

</footer>


<script src="{{ asset('shop.js') }}"></script>

</body>
</html>