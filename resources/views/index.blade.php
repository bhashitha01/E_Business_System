<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AyuruVeda — Back to Nature</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('style.css') }}">
  
</head>
<body>
  <div class="topbar">
    <div>🌿 100% Natural & Ayurvedic</div>
    <div>🚚 Islandwide Delivery</div>
    <div>🔒 Secure Payments</div>
    <div class="top-right"><span>English</span><span>LKR (Rs.)</span><span>● ●</span></div>
  </div>

  <header class="header">
    <a class="logo" href="#">
      <span class="logo-mark">🌿</span>
      <span><b>AyuruVeda</b><small>Back to Nature</small></span>
    </a>

    <nav>
      <a href="#">Home</a>
      <a href="{{ route('shop') }}" class="active">
        Shop
    </a>
    <a href="#">Categories</a>
    <a href="#">Deals</a>
      <a href="#">About Us</a>
      <a href="#">Blogs</a>
     
      <a href="#">Contact</a>
    </nav>

    <div class="actions">
      
      <button aria-label="Search"><i class="fa-solid fa-magnifying-glass"></i></button>
      
      <button aria-label="Account"> <i class="fa-regular fa-circle-user"></i></button>
      <button aria-label="Wishlist"><i class="fa-regular fa-heart"></i></button>
      <button class="cart-btn" aria-label="Cart"> <i class="fa-solid fa-cart-shopping"></i></button>
    </div>
  </header>

  <main>
    <section class="hero">
      <div class="hero-copy">

        <p class="eyebrow">PURE AYURVEDIC WELLNESS</p>
    
        <h1>Heal Naturally,<br><strong>Live Better.</strong></h1>
        <p class="hero-text">Pure Ayurvedic products made with<br>ancient wisdom & modern care.</p>
        <a class="primary-btn" href="{{ route('shop') }}" class="active">Shop Now <span>→</span></a>
        <div class="trust-row">
          <div><b>♧</b><span><strong>100% Natural</strong><small>No Chemicals</small></span></div>
          <div><b>✓</b><span><strong>Trusted Quality</strong><small>Lab Tested</small></span></div>
          <div><b>♧</b><span><strong>Made in Sri Lanka</strong><small>Proudly Local</small></span></div>
        </div>
      </div>
      <div class="hero-products">

        <div class="hero-image-wrapper">
    
            <img src="{{ asset('images/we.png') }}"
                 alt="Ayurvedic Products"
                 class="hero-banner-image">
    
        </div>
    
    </div>
    </section>

    <section class="categories section" id="categories">
      <div class="section-heading"><h2>Shop by Category</h2></div>
      <div class="category-grid">

        @forelse($categories as $category)
    
            <a href="#"
               class="category-card">
    
                <div class="category-card-icon">
    
                    <i class="{{ $category->icon ?? 'fa-solid fa-leaf' }}"></i>
    
                </div>
    
                <div class="category-card-content">
    
                    <strong>
                        {{ $category->name }}
                    </strong>
    
                    @if($category->description)
                        <span>
                            {{ Str::limit($category->description, 45) }}
                        </span>
                    @endif
    
                </div>
    
                <i class="fa-solid fa-arrow-right category-arrow"></i>
    
            </a>
    
        @empty
    
            <p>No categories available.</p>
    
        @endforelse
    
    </div>
    </section>

    <section class="section shop" id="shop">
      <div class="section-heading row">
        <h2>Best Selling Products</h2>
        <a href="#">View All →</a>
      </div>
      <div class="products" id="productGrid">

        @forelse($products as $product)
    
            <article class="product-card">
    
                <div class="product-card-image">
    
                    @if($product->discount_price)
                        <span class="product-sale">
                            SALE
                        </span>
                    @endif
    
                    @if($product->image)
    
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}">
    
                    @else
    
                        <div class="product-placeholder">
    
                            <i class="fa-solid fa-leaf"></i>
    
                        </div>
    
                    @endif
    
                    <button type="button"
                            class="product-wishlist"
                            aria-label="Add to wishlist">
    
                        <i class="fa-regular fa-heart"></i>
    
                    </button>
    
                </div>
    
    
                <div class="product-card-content">
    
                    @if($product->category)
    
                        <span class="product-category-label">
    
                            <i class="{{ $product->category->icon ?? 'fa-solid fa-leaf' }}"></i>
    
                            {{ $product->category->name }}
    
                        </span>
    
                    @endif
    
    
                    <h3>
                        {{ $product->name }}
                    </h3>
    
    
                    <div class="product-price">
    
                        @if($product->discount_price)
    
                            <strong>
                                Rs. {{ number_format($product->discount_price, 2) }}
                            </strong>
    
                            <del>
                                Rs. {{ number_format($product->price, 2) }}
                            </del>
    
                        @else
    
                            <strong>
                                Rs. {{ number_format($product->price, 2) }}
                            </strong>
    
                        @endif
    
                    </div>
    
    
                    @if($product->stock > 0)
    
                        <button type="button"
                                class="add-to-cart-btn">
    
                            <i class="fa-solid fa-cart-plus"></i>
    
                            Add to Cart
    
                        </button>
    
                    @else
    
                        <button type="button"
                                class="add-to-cart-btn disabled"
                                disabled>
    
                            Out of Stock
    
                        </button>
    
                    @endif
    
                </div>
    
            </article>
    
        @empty
    
            <div class="products-empty">
    
                <i class="fa-solid fa-box-open"></i>
    
                <h3>No products available</h3>
    
                <p>
                    Products will appear here once they are added.
                </p>
    
            </div>
    
        @endforelse
    
    </div>
    </section>

    <section class="promo">
      <div>
        <p>WELLNESS STARTS WITH NATURE</p>
        <h2>Get 10% Off on Your First Order</h2>
        <button id="promoBtn">Use Code: AYURU10</button>
      </div>
      <div class="promo-art">🌿<br>🪵 🌱</div>
    </section>

    <section class="benefits">
      <div><span>🚚</span><p><b>Fast Delivery</b><small>Islandwide delivery<br>within 1–3 days</small></p></div>
      <div><span>▣</span><p><b>Secure Payment</b><small>100% secure payment<br>methods</small></p></div>
      <div><span>♧</span><p><b>100% Authentic</b><small>Original Ayurvedic<br>products</small></p></div>
      <div><span>◉</span><p><b>Customer Support</b><small>Dedicated support<br>7 days a week</small></p></div>
    </section>
  </main>

  <footer>
    <div><a class="logof" href="#">
      <span class="logof-mark">🌿</span>
      <span><b>AyuruVeda</b><small>Back to Nature</small></span>
    </a><p>Authentic Ayurvedic wellness products,<br>made with nature and care.</p>
  </div>
      <div class="footer-logo">
      
        <button aria-label="Google"><i class="fa-brands fa-whatsapp"></i></button>
        
        <button aria-label="Account"><i class="fa-brands fa-youtube"></i></button>
        <button aria-label="Wishlist"><i class="fa-brands fa-instagram"></i></button>
        <button class="cart-btn" aria-label="Cart"><i class="fa-brands fa-facebook"></i></button>
      </div>

    
    <div><b>Quick Links</b><a href="#">Shop</a><a href="#">About Us</a><a href="#">Contact</a></div>
    <div><b>Customer Care</b><a href="#">Shipping</a><a href="#">Returns</a><a href="#">FAQ</a></div>
    <div><b>Contact</b><p>+94 77 123 4567<br>hello@ayuruveda.lk</p></div>
  </footer>

  <div class="toast" id="toast">Added to cart ✓</div>
  <script src="{{ asset('/script.js') }}"></script>
</body>
</html>
