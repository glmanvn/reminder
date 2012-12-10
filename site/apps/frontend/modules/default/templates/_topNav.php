<!-- Header -->
<div id="da-header">
        <div id="da-header-top">
        <!-- Container -->
        <div class="da-container clearfix">
            <!-- Logo Container. All images put here will be vertically centere -->
            <div id="da-logo-wrap">
                <div id="da-logo">
                    <div id="da-logo-img">
                        <a href="<?php echo url_for('@homepage')?>">
                            <img src="/images/logo.png" alt="Ticket reminder" />
                        </a>
                    </div>
                </div>
            </div>

            <!-- Header Toolbar Menu -->
            <!-- Header Toolbar Menu -->
            <div id="da-header-toolbar" class="clearfix">
                <div id="da-user-profile">
                    <div id="da-user-avatar">
                        <img src="images/pp.jpg" alt="" />
                    </div>
                    <div id="da-user-info">
                        John Doe
                        <span class="da-user-title">Creative Director</span>
                    </div>
                    <ul class="da-header-dropdown">
                        <li class="da-dropdown-caret">
                            <span class="caret-outer"></span>
                            <span class="caret-inner"></span>
                        </li>
                        <li class="da-dropdown-divider"></li>
                        <li><a href="dashboard.html">Dashboard</a></li>
                        <li class="da-dropdown-divider"></li>
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="#">Change Password</a></li>
                    </ul>
                </div>
                <div id="da-header-button-container">
                        <ul>
                        <li class="da-header-button notif">
                                <span class="da-button-count">32</span>
                                <a href="#">Notifications</a>
                            <ul class="da-header-dropdown">
                                <li class="da-dropdown-caret">
                                    <span class="caret-outer"></span>
                                    <span class="caret-inner"></span>
                                </li>
                                <li>
                                        <span class="da-dropdown-sub-title">Notifications</span>
                                        <ul class="da-dropdown-sub">
                                        <li class="unread">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                        <li class="unread">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                        <li class="read">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                        <li class="read">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <a class="da-dropdown-sub-footer">
                                        View all notifications
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="da-header-button message">
                                <span class="da-button-count">5</span>
                                <a href="#">Messages</a>
                            <ul class="da-header-dropdown">
                                <li class="da-dropdown-caret">
                                    <span class="caret-outer"></span>
                                    <span class="caret-inner"></span>
                                </li>
                                <li>
                                        <span class="da-dropdown-sub-title">Messages</span>
                                        <ul class="da-dropdown-sub">
                                        <li class="unread">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                        <li class="unread">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                        <li class="read">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                        <li class="read">
                                            <a href="#">
                                                <span class="message">
                                                    Lorem ipsum dolor sit amet
                                                </span>
                                                <span class="time">
                                                    January 21, 2012
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                    <a class="da-dropdown-sub-footer">
                                        View all messages
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="da-header-button logout">
                                <a href="index.html">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <div id="da-header-bottom">
        <!-- Container -->
        <div class="da-container clearfix">

                <div id="da-search">
                <form>
                        <input type="text" placeholder="Search..." />
                </form>
            </div>

            <!-- Breadcrumbs -->
            <div id="da-breadcrumb">
                <ul>
                    <li><a href="dashboard.html"><img src="images/icons/black/16/home.png" alt="Home" />Dashboard</a></li>
                    <li class="active"><span>Table</span></li>
                </ul>
            </div>

        </div>
    </div>
</div>