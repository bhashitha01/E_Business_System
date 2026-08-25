@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="welcome">

    <h2>
        Welcome back, {{ auth()->user()->name }} 👋
    </h2>

    <p>
        Here's what's happening with your system today.
    </p>

</div>


<!-- STAT CARDS -->

<div class="stats-grid">

    <div class="stat-card">

        <div class="stat-info">

            <span>Total Categories</span>

            <h3>24</h3>

        </div>

        <div class="stat-icon">

            <i class="fa-solid fa-folder"></i>

        </div>

    </div>


    <div class="stat-card">

        <div class="stat-info">

            <span>Total Products</span>

            <h3>156</h3>

        </div>

        <div class="stat-icon">

            <i class="fa-solid fa-box"></i>

        </div>

    </div>


    <div class="stat-card">

        <div class="stat-info">

            <span>Total Users</span>

            <h3>1,240</h3>

        </div>

        <div class="stat-icon">

            <i class="fa-solid fa-users"></i>

        </div>

    </div>


    <div class="stat-card">

        <div class="stat-info">

            <span>Total Orders</span>

            <h3>328</h3>

        </div>

        <div class="stat-icon">

            <i class="fa-solid fa-cart-shopping"></i>

        </div>

    </div>

</div>


<!-- LOWER SECTION -->

<div class="dashboard-grid">


    <!-- RECENT ACTIVITY -->

    <div class="panel">

        <div class="panel-header">

            <h3>Recent Activity</h3>

            <a href="#" class="view-all">
                View All
            </a>

        </div>


        <div class="activity">

            <div class="activity-icon">
                <i class="fa-solid fa-box"></i>
            </div>

            <div class="activity-info">

                <strong>
                    New product added
                </strong>

                <span>
                    2 minutes ago
                </span>

            </div>

        </div>


        <div class="activity">

            <div class="activity-icon">
                <i class="fa-solid fa-user"></i>
            </div>

            <div class="activity-info">

                <strong>
                    New user registered
                </strong>

                <span>
                    15 minutes ago
                </span>

            </div>

        </div>


        <div class="activity">

            <div class="activity-icon">
                <i class="fa-solid fa-cart-shopping"></i>
            </div>

            <div class="activity-info">

                <strong>
                    New order received
                </strong>

                <span>
                    32 minutes ago
                </span>

            </div>

        </div>


        <div class="activity">

            <div class="activity-icon">
                <i class="fa-solid fa-folder-plus"></i>
            </div>

            <div class="activity-info">

                <strong>
                    New category created
                </strong>

                <span>
                    1 hour ago
                </span>

            </div>

        </div>

    </div>


    <!-- QUICK ACTIONS -->

    <div class="panel">

        <div class="panel-header">

            <h3>Quick Actions</h3>

        </div>

     
<button type="button"
class="add-category-btn"
onclick="openCategoryModal()">

<i class="fa-solid fa-plus"></i>

Add Category

</button>
<div class="category-modal" id="categoryModal">

    <div class="modal-overlay"
         onclick="closeCategoryModal()">
    </div>

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


     

        <a href="#" class="quick-action">

            <i class="fa-solid fa-users"></i>

            <span>Manage Users</span>

        </a>

    </div>

</div>

@endsection 