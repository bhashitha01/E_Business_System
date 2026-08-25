```blade
@extends('admin.layouts.app')

@section('title', 'Categories')

@section('content')

<div class="category-page">

    <!-- PAGE HEADER -->

    <div class="page-header">

        <div>
            <span class="page-label">PRODUCT MANAGEMENT</span>

            <h2>Categories</h2>

            <p>
                Organize and manage your product categories.
            </p>
        </div>

        <a href="javascript:void(0);"
            class="add-category-btn"
            onclick="openCategoryModal()">

    <i class="fa-solid fa-plus"></i>

    Add Category

</a>
<div class="category-modal" id="categoryModal">

    <!-- Overlay -->
    <div class="modal-overlay"
         onclick="closeCategoryModal()">
    </div>

    <!-- Modal -->
    <div class="modal-box">

        <div class="modal-header">

            <div>
                <h3>Add Category</h3>
                <p>Create a new product category.</p>
            </div>

            <button type="button"
                    onclick="closeCategoryModal()"
                    class="close-btn">

                <i class="fa-solid fa-xmark"></i>

            </button>

        </div>


        <!-- Form -->
        <form action="{{ route('admin.categories.store') }}"
              method="POST">

            @csrf

            <div class="form-group">

                <label for="category_name">
                    Category Name
                </label>

                <input type="text"
                       id="category_name"
                       name="name"
                       placeholder="Enter category name"
                       required>

            </div>
            <div class="form-group">

                <label>
                    Category Icon
                </label>
            
                <div class="icon-picker">
            
                    <!-- Selected Icon -->
                    <button type="button"
                            class="icon-picker-input"
                            onclick="toggleIconPicker()">
            
                        <span id="selectedIconPreview">
                            <i class="fa-solid fa-leaf"></i>
                        </span>
            
                        <span id="selectedIconName">
                            Select an icon
                        </span>
            
                        <i class="fa-solid fa-chevron-down"></i>
            
                    </button>
            
            
                    <!-- Icon Dropdown -->
                    <div class="icon-picker-dropdown"
                         id="iconPickerDropdown">
            
                        <!-- Search -->
                        <div class="icon-search">
            
                            <i class="fa-solid fa-magnifying-glass"></i>
            
                            <input type="text"
                                   id="iconSearch"
                                   placeholder="Search Ayurvedic icons..."
                                   oninput="searchIcons()">
            
                        </div>
            
            
                        <!-- Icons -->
                        <div class="icon-grid"
                             id="iconGrid">
            
            
                            <!-- Herbs -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-leaf"
                                    data-name="Herbs"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-leaf"></i>
                                <span>Herbs</span>
            
                            </button>
            
            
                            <!-- Natural -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-seedling"
                                    data-name="Natural"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-seedling"></i>
                                <span>Natural</span>
            
                            </button>
            
            
                            <!-- Ayurveda -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-spa"
                                    data-name="Ayurveda"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-spa"></i>
                                <span>Ayurveda</span>
            
                            </button>
            
            
                            <!-- Herbal Medicine -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-mortar-pestle"
                                    data-name="Herbal Medicine"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-mortar-pestle"></i>
                                <span>Herbal</span>
            
                            </button>
            
            
                            <!-- Medicine -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-capsules"
                                    data-name="Medicine"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-capsules"></i>
                                <span>Medicine</span>
            
                            </button>
            
            
                            <!-- Herbal Oil -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-bottle-droplet"
                                    data-name="Oil"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-bottle-droplet"></i>
                                <span>Oil</span>
            
                            </button>
            
            
                            <!-- Skin Care -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-face-smile"
                                    data-name="Skin Care"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-face-smile"></i>
                                <span>Skin Care</span>
            
                            </button>
            
            
                            <!-- Hair Care -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-user"
                                    data-name="Hair Care"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-user"></i>
                                <span>Hair Care</span>
            
                            </button>
            
            
                            <!-- Flower -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-fan"
                                    data-name="Flowers"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-fan"></i>
                                <span>Flowers</span>
            
                            </button>
            
            
                            <!-- Tea -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-mug-hot"
                                    data-name="Herbal Tea"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-mug-hot"></i>
                                <span>Tea</span>
            
                            </button>
            
            
                            <!-- Roots -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-tree"
                                    data-name="Roots"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-tree"></i>
                                <span>Roots</span>
            
                            </button>
            
            
                            <!-- Plant -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-tree"
                                    data-name="Plants"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-tree"></i>
                                <span>Plants</span>
            
                            </button>
            
            
                            <!-- Wellness -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-heart-pulse"
                                    data-name="Wellness"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-heart-pulse"></i>
                                <span>Wellness</span>
            
                            </button>
            
            
                            <!-- Massage -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-hands"
                                    data-name="Massage"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-hands"></i>
                                <span>Massage</span>
            
                            </button>
            
            
                            <!-- Natural Beauty -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-heart"
                                    data-name="Beauty"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-heart"></i>
                                <span>Beauty</span>
            
                            </button>
            
            
                            <!-- Organic -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-recycle"
                                    data-name="Organic"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-recycle"></i>
                                <span>Organic</span>
            
                            </button>
            
            
                            <!-- Food -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-bowl-food"
                                    data-name="Ayurvedic Food"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-bowl-food"></i>
                                <span>Food</span>
            
                            </button>
            
            
                            <!-- Supplements -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-vial"
                                    data-name="Supplements"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-vial"></i>
                                <span>Supplements</span>
            
                            </button>
            
            
                            <!-- Powder -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-box-open"
                                    data-name="Powders"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-box-open"></i>
                                <span>Powders</span>
            
                            </button>
            
            
                            <!-- Natural Products -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-basket-shopping"
                                    data-name="Natural Products"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-basket-shopping"></i>
                                <span>Natural</span>
            
                            </button>
            
            
                            <!-- Essential Oil -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-droplet"
                                    data-name="Essential Oils"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-droplet"></i>
                                <span>Essential Oil</span>
            
                            </button>
            
            
                            <!-- Soap -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-soap"
                                    data-name="Natural Soap"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-soap"></i>
                                <span>Soap</span>
            
                            </button>
            
            
                            <!-- Bottle -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-bottle-water"
                                    data-name="Products"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-bottle-water"></i>
                                <span>Products</span>
            
                            </button>
            
            
                            <!-- Gift -->
                            <button type="button"
                                    class="icon-option"
                                    data-icon="fa-solid fa-gift"
                                    data-name="Gift Sets"
                                    onclick="selectIcon(this)">
            
                                <i class="fa-solid fa-gift"></i>
                                <span>Gift Sets</span>
            
                            </button>
            
                        </div>
            
                    </div>
            
                </div>
            
            
                <!-- Hidden input -->
                <input type="hidden"
                       name="icon"
                       id="category_icon"
                       required>
            
            </div>
            <div class="form-group">

                <label for="Details">
                    Description
                </label>

                <textarea id="category_description"
                              name="description"
                              placeholder="Enter category description"
                              rows="4"
                              required></textarea>
            </div>



            <div class="modal-actions">

                <button type="button"
                        class="cancel-btn"
                        onclick="closeCategoryModal()">

                    Cancel

                </button>

                <button type="submit"
                        class="save-btn">

                    <i class="fa-solid fa-plus"></i>

                    Add Category

                </button>

            </div>

        </form>

    </div>

</div>

    </div>


    <!-- SUMMARY CARDS -->

    <div class="category-stats">

        <div class="category-stat-card">

            <div class="category-stat-icon">
                <i class="fa-solid fa-folder"></i>
            </div>

            <div>

                <span>Total Categories</span>

                <h3>{{ $categories->count() }}</h3>

            </div>

        </div>


        <div class="category-stat-card">

            <div class="category-stat-icon">
                <i class="fa-solid fa-circle-check"></i>
            </div>

            <div>

                <span>Active</span>

                <h3>
                    {{ $categories->where('status', true)->count() }}
                </h3>

            </div>

        </div>


        <div class="category-stat-card">

            <div class="category-stat-icon">
                <i class="fa-solid fa-circle-xmark"></i>
            </div>

            <div>

                <span>Inactive</span>

                <h3>
                    {{ $categories->where('status', false)->count() }}
                </h3>

            </div>

        </div>

    </div>


    <!-- CATEGORY TABLE PANEL -->

    <div class="category-panel">

        <div class="category-panel-header">

            <div>

                <h3>All Categories</h3>

                <p>
                    View and manage all product categories.
                </p>

            </div>


            <div class="category-tools">

                <div class="category-search">

                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input type="text"
                           id="categorySearch"
                           placeholder="Search categories...">

                </div>


                <select id="statusFilter"
                        class="status-filter">

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


        @if($categories->count() > 0)

            <div class="category-table-wrapper">

                <table class="category-table"
                       id="categoryTable">

                    <thead>

                        <tr>

                            <th>#</th>

                            <th>Category</th>

                            <th>Slug</th>

                            <th>Status</th>

                            <th>Created</th>

                            <th>Actions</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($categories as $category)

                            <tr class="category-row"
                                data-status="{{ $category->status ? 'active' : 'inactive' }}">

                                <td>

                                    <span class="category-number">
                                        {{ $loop->iteration }}
                                    </span>

                                </td>


                                <td>

                                    <div class="category-info">

                                        <div class="category-avatar">

                                            <i class="fa-solid fa-folder"></i>

                                        </div>

                                        <div>

                                            <strong>
                                                {{ $category->name }}
                                            </strong>

                                            <span>
                                                Category
                                            </span>

                                        </div>

                                    </div>

                                </td>


                                <td>

                                    <span class="category-slug">
                                        {{ $category->slug }}
                                    </span>

                                </td>


                                <td>

                                    @if($category->status)

                                        <span class="category-status active">

                                            <span></span>

                                            Active

                                        </span>

                                    @else

                                        <span class="category-status inactive">

                                            <span></span>

                                            Inactive

                                        </span>

                                    @endif

                                </td>


                                <td>

                                    <div class="created-date">

                                        <strong>
                                            {{ $category->created_at->format('M d, Y') }}
                                        </strong>

                                        <span>
                                            {{ $category->created_at->format('h:i A') }}
                                        </span>

                                    </div>

                                </td>


                                <td>

                                    <div class="category-actions">

                                        <button type="button"
                                                class="table-action edit"
                                                title="Edit Category">

                                            <i class="fa-solid fa-pen"></i>

                                        </button>


                                        <button type="button"
                                                class="table-action delete"
                                                title="Delete Category">

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

            <div class="category-table-footer">

                <span>
                    Showing
                    <strong>{{ $categories->count() }}</strong>
                    categories
                </span>

            </div>


        @else

            <!-- EMPTY STATE -->

            <div class="category-empty">

                <div class="empty-icon">

                    <i class="fa-solid fa-folder-open"></i>

                </div>

                <h3>No categories yet</h3>

                <p>
                    You haven't created any product categories.
                    Create your first category to get started.
                </p>

                <a href="{{ route('admin.categories.create') }}"
                   class="add-category-btn">

                    <i class="fa-solid fa-plus"></i>

                    Create Category

                </a>

            </div>

        @endif

    </div>

</div>


<!-- SEARCH & FILTER -->

<script>

function openCategoryModal() {
        document.getElementById('categoryModal').classList.add('active');
    }

    function closeCategoryModal() {
        document.getElementById('categoryModal').classList.remove('active');
    }

document.addEventListener('DOMContentLoaded', function () {

    const searchInput =
        document.getElementById('categorySearch');

    const statusFilter =
        document.getElementById('statusFilter');

    const rows =
        document.querySelectorAll('.category-row');


    function filterCategories() {

        const search =
            searchInput.value.toLowerCase().trim();

        const status =
            statusFilter.value;


        rows.forEach(function (row) {

            const categoryName =
                row
                    .querySelector('.category-info strong')
                    .textContent
                    .toLowerCase();


            const rowStatus =
                row.dataset.status;


            const matchesSearch =
                categoryName.includes(search);


            const matchesStatus =
                status === 'all' ||
                rowStatus === status;


            if (matchesSearch && matchesStatus) {

                row.style.display = '';

            } else {

                row.style.display = 'none';

            }

        });

    }


    searchInput.addEventListener(
        'input',
        filterCategories
    );


    statusFilter.addEventListener(
        'change',
        filterCategories
    );

});


function toggleIconPicker() {

const dropdown =
    document.getElementById('iconPickerDropdown');

dropdown.classList.toggle('active');

}


function selectIcon(element) {

const icon =
    element.dataset.icon;

const name =
    element.dataset.name;


// Preview
document.getElementById('selectedIconPreview').innerHTML =
    `<i class="${icon}"></i>`;


// Selected name
document.getElementById('selectedIconName').textContent =
    name;


// Laravel value
document.getElementById('category_icon').value =
    icon;


// Close picker
document.getElementById('iconPickerDropdown')
    .classList.remove('active');

}


function searchIcons() {

const search =
    document.getElementById('iconSearch')
        .value
        .toLowerCase()
        .trim();


const icons =
    document.querySelectorAll('.icon-option');


icons.forEach(function (icon) {

    const name =
        icon.dataset.name.toLowerCase();


    if (name.includes(search)) {

        icon.style.display = '';

    } else {

        icon.style.display = 'none';

    }

});

}



</script>

@endsection
```
