@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')

<div class="products-page">

    <!-- =====================================================
         PAGE HEADER
    ====================================================== -->

    <div class="products-page-header">

        <div>

            <span class="products-page-label">
                PRODUCT MANAGEMENT
            </span>

            <h2>Products</h2>

            <p>
                Manage your Ayurvedic products, pricing and inventory.
            </p>

        </div>


        <button type="button"
                class="add-product-btn"
                onclick="openProductModal()">

            <i class="fa-solid fa-plus"></i>

            Add Product

        </button>

    </div>



    <!-- =====================================================
         SUMMARY CARDS
    ====================================================== -->

    <div class="product-stats">


        <!-- TOTAL PRODUCTS -->

        <div class="product-stat-card">

            <div class="product-stat-icon">

                <i class="fa-solid fa-box"></i>

            </div>

            <div>

                <span>Total Products</span>

                <h3>
                    {{ $products->count() }}
                </h3>

            </div>

        </div>



        <!-- ACTIVE -->

        <div class="product-stat-card">

            <div class="product-stat-icon">

                <i class="fa-solid fa-circle-check"></i>

            </div>

            <div>

                <span>Active Products</span>

                <h3>
                    {{ $products->where('status', true)->count() }}
                </h3>

            </div>

        </div>



        <!-- INACTIVE -->

        <div class="product-stat-card">

            <div class="product-stat-icon">

                <i class="fa-solid fa-circle-xmark"></i>

            </div>

            <div>

                <span>Inactive</span>

                <h3>
                    {{ $products->where('status', false)->count() }}
                </h3>

            </div>

        </div>



        <!-- LOW STOCK -->

        <div class="product-stat-card">

            <div class="product-stat-icon">

                <i class="fa-solid fa-triangle-exclamation"></i>

            </div>

            <div>

                <span>Low Stock</span>

                <h3>
                    {{ $products->where('stock', '<=', 10)->count() }}
                </h3>

            </div>

        </div>

    </div>



    <!-- =====================================================
         PRODUCTS PANEL
    ====================================================== -->

    <div class="products-panel">


        <!-- PANEL HEADER -->

        <div class="products-panel-header">

            <div>

                <h3>All Products</h3>

                <p>
                    View and manage your Ayurvedic product collection.
                </p>

            </div>


            <div class="products-tools">


                <!-- SEARCH -->

                <div class="product-search">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input type="text"
                           id="productSearch"
                           placeholder="Search products...">

                </div>



                <!-- CATEGORY FILTER -->

                <select id="categoryFilter"
                        class="product-filter">

                    <option value="all">
                        All Categories
                    </option>

                    @foreach(
                        $products
                            ->pluck('category')
                            ->unique('id')
                            ->filter()
                        as $category
                    )

                        <option value="{{ $category->id }}">

                            {{ $category->name }}

                        </option>

                    @endforeach

                </select>



                <!-- STATUS FILTER -->

                <select id="productStatusFilter"
                        class="product-filter">

                    <option value="all">
                        All Status
                    </option>

                    <option value="active">
                        Active
                    </option>

                    <option value="inactive">
                        Inactive
                    </option>

                </select>

            </div>

        </div>



        <!-- =================================================
             PRODUCT TABLE
        ================================================== -->

        @if($products->count() > 0)

            <div class="products-table-wrapper">

                <table class="products-table"
                       id="productsTable">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Product</th>

                            <th>Category</th>

                            <th>Price</th>

                            <th>Stock</th>

                            <th>Status</th>

                            <th>Created</th>

                            <th>Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($products as $product)

                            <tr class="product-row"

                                data-status="{{ $product->status ? 'active' : 'inactive' }}"

                                data-category="{{ $product->category_id }}">


                                <!-- NUMBER -->

                                <td>

                                    <span class="product-number">

                                        {{ $loop->iteration }}

                                    </span>

                                </td>



                                <!-- PRODUCT -->

                                <td>

                                    <div class="product-info">


                                        <div class="product-image">

                                            @if($product->image)

                                                <img
                                                    src="{{ asset('storage/' . $product->image) }}"
                                                    alt="{{ $product->name }}"
                                                >

                                            @else

                                                <div class="product-image-placeholder">

                                                    <i class="fa-solid fa-leaf"></i>

                                                </div>

                                            @endif

                                        </div>


                                        <div class="product-name">

                                            <strong>

                                                {{ $product->name }}

                                            </strong>

                                            <span>

                                                SKU: {{ $product->sku }}

                                            </span>

                                        </div>

                                    </div>

                                </td>



                                <!-- CATEGORY -->

                                <td>

                                    @if($product->category)

                                        <span class="product-category">

                                            <i class="{{ $product->category->icon ?? 'fa-solid fa-leaf' }}"></i>

                                            {{ $product->category->name }}

                                        </span>

                                    @else

                                        <span class="no-category">

                                            No Category

                                        </span>

                                    @endif

                                </td>



                                <!-- PRICE -->

                                <td>

                                    <div class="product-price">

                                        @if($product->discount_price)

                                            <strong>

                                                Rs.
                                                {{ number_format($product->discount_price, 2) }}

                                            </strong>

                                            <del>

                                                Rs.
                                                {{ number_format($product->price, 2) }}

                                            </del>

                                        @else

                                            <strong>

                                                Rs.
                                                {{ number_format($product->price, 2) }}

                                            </strong>

                                        @endif

                                    </div>

                                </td>



                                <!-- STOCK -->

                                <td>

                                    @if($product->stock <= 0)

                                        <span class="stock-badge out">

                                            Out of Stock

                                        </span>

                                    @elseif($product->stock <= 10)

                                        <span class="stock-badge low">

                                            {{ $product->stock }} left

                                        </span>

                                    @else

                                        <span class="stock-badge good">

                                            {{ $product->stock }} in stock

                                        </span>

                                    @endif

                                </td>



                                <!-- STATUS -->

                                <td>

                                    @if($product->status)

                                        <span class="product-status active">

                                            <span></span>

                                            Active

                                        </span>

                                    @else

                                        <span class="product-status inactive">

                                            <span></span>

                                            Inactive

                                        </span>

                                    @endif

                                </td>



                                <!-- CREATED -->

                                <td>

                                    <div class="product-created">

                                        <strong>

                                            {{ $product->created_at->format('M d, Y') }}

                                        </strong>

                                        <span>

                                            {{ $product->created_at->format('h:i A') }}

                                        </span>

                                    </div>

                                </td>



                                <!-- ACTIONS -->

                                <td>

                                    <div class="product-actions">


                                        <button type="button"
                                                class="product-action edit"
                                                title="Edit Product">

                                            <i class="fa-solid fa-pen"></i>

                                        </button>


                                        <button type="button"
                                                class="product-action delete"
                                                title="Delete Product">

                                            <i class="fa-solid fa-trash"></i>

                                        </button>


                                    </div>

                                </td>


                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>



            <!-- TABLE FOOTER -->

            <div class="products-table-footer">

                <span>

                    Showing

                    <strong>
                        {{ $products->count() }}
                    </strong>

                    products

                </span>

            </div>


        @else


            <!-- =================================================
                 EMPTY STATE
            ================================================== -->

            <div class="products-empty">

                <div class="products-empty-icon">

                    <i class="fa-solid fa-box-open"></i>

                </div>

                <h3>No products yet</h3>

                <p>

                    You haven't added any Ayurvedic products yet.
                    Add your first product to get started.

                </p>


                <button type="button"
                        class="add-product-btn"
                        onclick="openProductModal()">

                    <i class="fa-solid fa-plus"></i>

                    Add First Product

                </button>

            </div>

        @endif

    </div>

</div>



<!-- =========================================================
     ADD PRODUCT MODAL
========================================================== -->

<div class="product-modal"
     id="productModal">


    <!-- OVERLAY -->

    <div class="product-modal-overlay"
         onclick="closeProductModal()">
    </div>



    <!-- MODAL BOX -->

    <div class="product-modal-box">


        <!-- MODAL HEADER -->

        <div class="product-modal-header">

            <div>

                <span class="modal-label">
                    PRODUCT MANAGEMENT
                </span>

                <h3>
                    Add New Product
                </h3>

                <p>
                    Add a new Ayurvedic product to your store.
                </p>

            </div>


            <button type="button"
                    class="product-modal-close"
                    onclick="closeProductModal()">

                <i class="fa-solid fa-xmark"></i>

            </button>

        </div>



        <!-- PRODUCT FORM -->

        <form action="{{ route('admin.products.store') }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf


            <div class="product-form-grid">


                <!-- =================================================
                     LEFT COLUMN
                ================================================== -->

                <div class="product-form-left">


                    <!-- PRODUCT NAME -->

                    <div class="product-form-group">

                        <label for="product_name">

                            Product Name

                            <span>*</span>

                        </label>

                        <input type="text"
                               id="product_name"
                               name="name"
                               value="{{ old('name') }}"
                               placeholder="e.g. Herbal Hair Oil"
                               required>

                    </div>



                    <!-- CATEGORY -->

                    <div class="product-form-group">

                        <label for="category_id">

                            Category

                            <span>*</span>

                        </label>

                        <select id="category_id"
                                name="category_id"
                                required>

                            <option value="">

                                Select product category

                            </option>


                            @foreach($categories as $category)

                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                    {{ $category->name }}

                                </option>

                            @endforeach

                        </select>

                    </div>



                    <!-- SKU -->

                    <div class="product-form-group">

                        <label for="sku">

                            SKU

                            <span>*</span>

                        </label>

                        <input type="text"
                               id="sku"
                               name="sku"
                               value="{{ old('sku') }}"
                               placeholder="e.g. AYO-HO-001"
                               required>

                    </div>



                    <!-- DESCRIPTION -->

                    <div class="product-form-group">

                        <label for="description">

                            Description

                        </label>

                        <textarea
                            id="description"
                            name="description"
                            rows="6"
                            placeholder="Describe your Ayurvedic product..."
                        >{{ old('description') }}</textarea>

                    </div>

                </div>



                <!-- =================================================
                     RIGHT COLUMN
                ================================================== -->

                <div class="product-form-right">


                    <!-- PRODUCT IMAGE -->
                    <div class="product-image-upload">

                        <label for="product_image">
                            Product Image
                        </label>
                    
                        <div class="image-upload-box"
                             id="imageUploadBox">
                    
                            <div class="image-upload-placeholder"
                                 id="imagePlaceholder">
                    
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                    
                                <strong>
                                    Upload Product Image
                                </strong>
                    
                                <span>
                                    JPG, PNG or WEBP • Max 2MB
                                </span>
                    
                            </div>
                    
                            <img id="productImagePreview"
                                 class="product-image-preview"
                                 alt="Product Preview">
                    
                            <input type="file"
                                   name="image"
                                   id="product_image"
                                   accept="image/jpeg,image/png,image/webp">
                    
                        </div>
                    
                    </div>


                    <!-- PRICE ROW -->

                    <div class="product-form-row">


                        <!-- PRICE -->

                        <div class="product-form-group">

                            <label for="price">

                                Price

                                <span>*</span>

                            </label>

                            <input
                                type="number"
                                id="price"
                                name="price"
                                value="{{ old('price') }}"
                                step="0.01"
                                min="0"
                                placeholder="2500.00"
                                required
                            >

                        </div>



                        <!-- DISCOUNT PRICE -->

                        <div class="product-form-group">

                            <label for="discount_price">

                                Discount Price

                            </label>

                            <input
                                type="number"
                                id="discount_price"
                                name="discount_price"
                                value="{{ old('discount_price') }}"
                                step="0.01"
                                min="0"
                                placeholder="2200.00"
                            >

                        </div>

                    </div>



                    <!-- STOCK -->

                    <div class="product-form-group">

                        <label for="stock">

                            Stock Quantity

                            <span>*</span>

                        </label>

                        <input
                            type="number"
                            id="stock"
                            name="stock"
                            value="{{ old('stock', 0) }}"
                            min="0"
                            required
                        >

                    </div>



                    <!-- STATUS -->

                    <div class="product-form-group">

                        <label for="status">

                            Product Status

                        </label>

                        <select id="status"
                                name="status">

                            <option value="1"
                                {{ old('status', '1') == '1' ? 'selected' : '' }}>

                                Active

                            </option>

                            <option value="0"
                                {{ old('status') === '0' ? 'selected' : '' }}>

                                Inactive

                            </option>

                        </select>

                    </div>

                </div>

            </div>



            <!-- =================================================
                 MODAL ACTIONS
            ================================================== -->

            <div class="product-modal-actions">


                <button type="button"
                        class="product-cancel-btn"
                        onclick="closeProductModal()">

                    Cancel

                </button>


                <button type="submit"
                        class="product-save-btn">

                    <i class="fa-solid fa-plus"></i>

                    Add Product

                </button>

            </div>

        </form>

    </div>

</div>



<!-- =========================================================
     JAVASCRIPT
========================================================== -->

<script>

const imageInput =
    document.getElementById('product_image');

const imagePreview =
    document.getElementById('productImagePreview');

const imagePlaceholder =
    document.getElementById('imagePlaceholder');

const imageUploadBox =
    document.getElementById('imageUploadBox');


if (imageInput) {

    imageInput.addEventListener('change', function () {

        const file = this.files[0];

        if (!file) {
            return;
        }

        const reader = new FileReader();

        reader.onload = function (event) {

            imagePreview.src =
                event.target.result;

            imagePreview.style.display =
                'block';

            imagePlaceholder.style.display =
                'none';

            imageUploadBox.classList.add(
                'has-image'
            );
        };

        reader.readAsDataURL(file);
    });
}



/* =========================================================
   PRODUCT MODAL
========================================================= */

function openProductModal()
{
    const modal =
        document.getElementById('productModal');

    if (modal) {

        modal.classList.add('active');

        document.body.classList.add('modal-open');

    }
}


function closeProductModal()
{
    const modal =
        document.getElementById('productModal');

    if (modal) {

        modal.classList.remove('active');

        document.body.classList.remove('modal-open');

    }
}



/* =========================================================
   CLOSE MODAL WITH ESC
========================================================= */

document.addEventListener('keydown', function(event) {

    if (event.key === 'Escape') {

        closeProductModal();

    }

});



/* =========================================================
   IMAGE PREVIEW
========================================================= */

document.addEventListener('DOMContentLoaded', function () {


    const imageInput =
        document.getElementById('product_image');


    const imagePreview =
        document.getElementById('productImagePreview');


    const imagePlaceholder =
        document.getElementById('imagePlaceholder');


    const imageUploadBox =
        document.getElementById('imageUploadBox');


    if (imageInput) {

        imageInput.addEventListener('change', function () {


            const file =
                this.files[0];


            if (!file) {

                imagePreview.style.display = 'none';

                imagePlaceholder.style.display = 'flex';

                imageUploadBox.classList.remove('has-image');

                return;

            }


            const allowedTypes = [
                'image/jpeg',
                'image/png',
                'image/webp'
            ];


            if (!allowedTypes.includes(file.type)) {

                alert(
                    'Please select a JPG, PNG or WEBP image.'
                );

                this.value = '';

                return;

            }


            if (file.size > 2 * 1024 * 1024) {

                alert(
                    'Image size must be less than 2MB.'
                );

                this.value = '';

                return;

            }


            const reader =
                new FileReader();


            reader.onload = function(event) {

                imagePreview.src =
                    event.target.result;

                imagePreview.style.display =
                    'block';

                imagePlaceholder.style.display =
                    'none';

                imageUploadBox.classList.add(
                    'has-image'
                );

            };


            reader.readAsDataURL(file);

        });

    }



    /* =====================================================
       SEARCH & FILTER
    ===================================================== */

    const searchInput =
        document.getElementById('productSearch');


    const categoryFilter =
        document.getElementById('categoryFilter');


    const statusFilter =
        document.getElementById('productStatusFilter');


    const rows =
        document.querySelectorAll('.product-row');



    function filterProducts()
    {

        const search =
            searchInput
                ? searchInput.value
                    .toLowerCase()
                    .trim()
                : '';


        const category =
            categoryFilter
                ? categoryFilter.value
                : 'all';


        const status =
            statusFilter
                ? statusFilter.value
                : 'all';



        rows.forEach(function(row)
        {

            const productNameElement =
                row.querySelector(
                    '.product-name strong'
                );


            const productName =
                productNameElement
                    ? productNameElement.textContent
                        .toLowerCase()
                    : '';


            const rowCategory =
                row.dataset.category;


            const rowStatus =
                row.dataset.status;



            const matchesSearch =
                productName.includes(search);


            const matchesCategory =
                category === 'all' ||
                rowCategory === category;


            const matchesStatus =
                status === 'all' ||
                rowStatus === status;



            if (
                matchesSearch &&
                matchesCategory &&
                matchesStatus
            ) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    }



    if (searchInput) {

        searchInput.addEventListener(
            'input',
            filterProducts
        );

    }


    if (categoryFilter) {

        categoryFilter.addEventListener(
            'change',
            filterProducts
        );

    }


    if (statusFilter) {

        statusFilter.addEventListener(
            'change',
            filterProducts
        );

    }

});

</script>


@endsection