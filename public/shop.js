document.addEventListener("DOMContentLoaded", function () {

    /* =========================================
       SEARCH
    ========================================= */

    const searchInput = document.querySelector("#shopSearch");
    const searchForm = document.querySelector("#shopSearchForm");

    if (searchInput && searchForm) {

        searchForm.addEventListener("submit", function (e) {
            e.preventDefault();

            const searchValue = searchInput.value.trim();

            const url = new URL(window.location.href);

            if (searchValue !== "") {
                url.searchParams.set("search", searchValue);
            } else {
                url.searchParams.delete("search");
            }

            // Reset pagination when searching
            url.searchParams.delete("page");

            window.location.href = url.toString();
        });
    }


    /* =========================================
       CATEGORY FILTER
    ========================================= */

    const categoryItems = document.querySelectorAll(".category-filter");

    categoryItems.forEach(function (item) {

        item.addEventListener("click", function (e) {

            e.preventDefault();

            const categoryId = this.dataset.category;

            const url = new URL(window.location.href);

            if (categoryId && categoryId !== "all") {
                url.searchParams.set("category", categoryId);
            } else {
                url.searchParams.delete("category");
            }

            // Reset pagination
            url.searchParams.delete("page");

            window.location.href = url.toString();
        });

    });


    /* =========================================
       SORT PRODUCTS
    ========================================= */

    const sortSelect = document.querySelector("#sortProducts");

    if (sortSelect) {

        sortSelect.addEventListener("change", function () {

            const value = this.value;

            const url = new URL(window.location.href);

            if (value !== "") {
                url.searchParams.set("sort", value);
            } else {
                url.searchParams.delete("sort");
            }

            url.searchParams.delete("page");

            window.location.href = url.toString();

        });

    }


    /* =========================================
       ADD TO CART
    ========================================= */

    const cartButtons = document.querySelectorAll(".add-to-cart-btn");

    cartButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            if (this.disabled) {
                return;
            }

            const productId = this.dataset.product;

            if (!productId) {
                console.warn("Product ID not found.");
                return;
            }

            /*
             * Temporary cart functionality.
             * Backend cart can be connected later.
             */

            let cart = JSON.parse(
                localStorage.getItem("ayuruveda_cart")
            ) || [];

            const existingProduct = cart.find(
                item => item.id == productId
            );

            if (existingProduct) {

                existingProduct.quantity += 1;

            } else {

                cart.push({
                    id: productId,
                    quantity: 1
                });

            }

            localStorage.setItem(
                "ayuruveda_cart",
                JSON.stringify(cart)
            );

            updateCartCount();

            showToast("Product added to cart ✓");

            // Button animation
            this.classList.add("added");

            const originalText = this.innerHTML;

            this.innerHTML =
                '<i class="fa-solid fa-check"></i> Added';

            setTimeout(() => {

                this.innerHTML = originalText;

                this.classList.remove("added");

            }, 1500);

        });

    });


    /* =========================================
       WISHLIST
    ========================================= */

    const wishlistButtons =
        document.querySelectorAll(".product-wishlist");

    wishlistButtons.forEach(function (button) {

        button.addEventListener("click", function () {

            const productId = this.dataset.product;

            if (!productId) {
                return;
            }

            let wishlist =
                JSON.parse(
                    localStorage.getItem("ayuruveda_wishlist")
                ) || [];

            const index = wishlist.indexOf(productId);

            const icon = this.querySelector("i");

            if (index === -1) {

                wishlist.push(productId);

                if (icon) {
                    icon.classList.remove("fa-regular");
                    icon.classList.add("fa-solid");
                }

                showToast("Added to wishlist ♡");

            } else {

                wishlist.splice(index, 1);

                if (icon) {
                    icon.classList.remove("fa-solid");
                    icon.classList.add("fa-regular");
                }

                showToast("Removed from wishlist");

            }

            localStorage.setItem(
                "ayuruveda_wishlist",
                JSON.stringify(wishlist)
            );

            updateWishlistCount();

        });

    });


    /* =========================================
       CART COUNT
    ========================================= */

    function updateCartCount() {

        const cart =
            JSON.parse(
                localStorage.getItem("ayuruveda_cart")
            ) || [];

        let total = 0;

        cart.forEach(function (item) {
            total += Number(item.quantity);
        });

        const cartCount =
            document.querySelector("#cartCount");

        if (cartCount) {
            cartCount.textContent = total;
        }
    }


    /* =========================================
       WISHLIST COUNT
    ========================================= */

    function updateWishlistCount() {

        const wishlist =
            JSON.parse(
                localStorage.getItem("ayuruveda_wishlist")
            ) || [];

        const wishlistCount =
            document.querySelector("#wishlistCount");

        if (wishlistCount) {
            wishlistCount.textContent = wishlist.length;
        }
    }


    /* =========================================
       TOAST
    ========================================= */

    function showToast(message) {

        let toast = document.querySelector("#toast");

        if (!toast) {

            toast = document.createElement("div");

            toast.id = "toast";

            toast.className = "toast";

            document.body.appendChild(toast);
        }

        toast.textContent = message;

        toast.classList.add("show");

        setTimeout(function () {

            toast.classList.remove("show");

        }, 2000);
    }


    /* =========================================
       LOAD CART COUNT
    ========================================= */

    updateCartCount();


    /* =========================================
       LOAD WISHLIST COUNT
    ========================================= */

    updateWishlistCount();


    /* =========================================
       MOBILE FILTER
    ========================================= */

    const filterButton =
        document.querySelector("#filterToggle");

    const filterSidebar =
        document.querySelector(".shop-sidebar");

    if (filterButton && filterSidebar) {

        filterButton.addEventListener("click", function () {

            filterSidebar.classList.toggle("active");

        });

    }


    /* =========================================
       CLOSE MOBILE FILTER
    ========================================= */

    const closeFilter =
        document.querySelector("#closeFilter");

    if (closeFilter && filterSidebar) {

        closeFilter.addEventListener("click", function () {

            filterSidebar.classList.remove("active");

        });

    }


});