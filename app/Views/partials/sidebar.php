<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu"><?= lang('Files.Menu') ?></li>

                <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span key="t-dashboards"><?= lang('Files.Dashboards') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="/orders.php" >Orders</a></li>
                        <li><a href="/customers.php" >Customers</a></li>
                        <li><a href="/vendors.php" >Vendors</a></li>
                    </ul>
                </li>               

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->