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
                        <li><a href="/" key="t-default"><?= lang('Files.Default') ?></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect">
                        <span class="badge rounded-pill bg-success float-end" key="t-hot"><?= lang('New') ?></span>
                        <i class="bx bx-layout"></i>
                        <span key="t-layouts"><?= lang('Files.Layouts') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-vertical"><?= lang('Files.Vertical') ?></a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-light-sidebar" key="t-light-sidebar"><?= lang('Files.Light Sidebar') ?></a></li>
                                <li><a href="layouts-compact-sidebar" key="t-compact-sidebar"><?= lang('Files.Compact Sidebar') ?></a></li>
                                <li><a href="layouts-icon-sidebar" key="t-icon-sidebar"><?= lang('Files.Icon Sidebar') ?></a></li>
                                <li><a href="layouts-boxed" key="t-boxed-width"><?= lang('Files.Boxed Width') ?></a></li>
                                <li><a href="layouts-preloader" key="t-preloader"><?= lang('Files.Preloader') ?></a></li>
                                <li><a href="layouts-colored-sidebar" key="t-colored-sidebar"><?= lang('Files.Colored Sidebar') ?></a></li>
                                <li><a href="layouts-scrollable" key="t-scrollable"><?= lang('Files.Scrollable') ?></a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-horizontal"><?= lang('Files.Horizontal') ?></a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="layouts-horizontal" key="t-horizontal"><?= lang('Files.Horizontal') ?></a></li>
                                <li><a href="layouts-hori-topbar-light" key="t-topbar-light"><?= lang('Files.Topbar Light') ?></a></li>
                                <li><a href="layouts-hori-boxed-width" key="t-boxed-width"><?= lang('Files.Boxed Width') ?></a></li>
                                <li><a href="layouts-hori-preloader" key="t-preloader"><?= lang('Files.Preloader') ?></a></li>
                                <li><a href="layouts-hori-colored-header" key="t-colored-topbar"><?= lang('Files.Colored Header') ?></a></li>
                                <li><a href="layouts-hori-scrollable" key="t-scrollable"><?= lang('Files.Scrollable') ?></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

                

                
                
                <li class="menu-title" key="t-pages"><?= lang('Files.Pages') ?></li>

                <li>
                    <a href="javascript: void(0);" class="waves-effect  has-arrow">
                        <i class="bx bx-user-circle"></i>
                        <span key="t-authentication"><?= lang('Files.Authentication') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login" key="t-login"><?= lang('Files.Login') ?></a></li>
                        <li><a href="auth-login-2" key="t-login-2"><?= lang('Files.Login') ?> 2</a></li>
                        <li><a href="auth-register" key="t-register"><?= lang('Files.Register') ?></a></li>
                        <li><a href="auth-register-2" key="t-register-2"><?= lang('Files.Register') ?> 2</a></li>
                        <li><a href="auth-recoverpw" key="t-recover-password"><?= lang('Files.Recover Password') ?></a></li>
                        <li><a href="auth-recoverpw-2" key="t-recover-password-2"><?= lang('Files.Recover Password') ?> 2</a></li>
                        <li><a href="auth-lock-screen" key="t-lock-screen"><?= lang('Files.Lock Screen') ?></a></li>
                        <li><a href="auth-lock-screen-2" key="t-lock-screen-2"><?= lang('Files.Lock Screen') ?> 2</a></li>
                        <li><a href="auth-confirm-mail" key="t-confirm-mail"><?= lang('Files.Confirm Mail') ?></a></li>
                        <li><a href="auth-confirm-mail-2" key="t-confirm-mail-2"><?= lang('Files.Confirm Mail') ?> 2</a></li>
                        <li><a href="auth-email-verification" key="t-email-verification"><?= lang('Files.Email Verification') ?></a></li>
                        <li><a href="auth-email-verification-2" key="t-email-verification-2"><?= lang('Files.Email Verification') ?> 2</a></li>
                        <li><a href="auth-two-step-verification" key="t-two-step-verification"><?= lang('Files.Two Step Verification') ?></a></li>
                        <li><a href="auth-two-step-verification-2" key="t-two-step-verification-2"><?= lang('Files.Two Step Verification') ?> 2</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span key="t-utility"><?= lang('Files.Utility') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter" key="t-starter-page"><?= lang('Files.Starter Page') ?></a></li>
                        <li><a href="pages-maintenance" key="t-maintenance"><?= lang('Files.Maintenance') ?></a></li>
                        <li><a href="pages-comingsoon" key="t-coming-soon"><?= lang('Files.Coming Soon') ?></a></li>
                        <li><a href="pages-404" key="t-error-404"><?= lang('Files.Error') ?> 404</a></li>
                        <li><a href="pages-500" key="t-error-500"><?= lang('Files.Error') ?> 500</a></li>
                    </ul>
                </li>

                <li class="menu-title" key="t-components"><?= lang('Files.Components') ?></li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-share-alt"></i>
                        <span key="t-multi-level"><?= lang('Files.Multi Level') ?></span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" key="t-level-1-1"><?= lang('Files.Level') ?> 1.1</a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" key="t-level-1-2"><?= lang('Files.Level') ?> 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" key="t-level-2-1"><?= lang('Files.Level') ?> 2.1</a></li>
                                <li><a href="javascript: void(0);" key="t-level-2-2"><?= lang('Files.Level') ?> 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->