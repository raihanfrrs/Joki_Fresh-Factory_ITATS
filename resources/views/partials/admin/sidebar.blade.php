<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <div class="app-brand ms-2">
            <a href="/">
                <img src="{{ asset('asset/images/logos/logo.png') }}" alt="Mono">
            </a>
        </div>
    <div class="sidebar-left" data-simplebar style="height: 100%;">
        <ul class="nav sidebar-inner" id="sidebar-menu">
            <li class="active">
                <a class="sidenav-item-link" href="index.html">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="me-2"><path fill="currentColor" d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3M11 3H3v10h8V3m10 8h-8v10h8V11m-10 4H3v6h8v-6Z"/></svg>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            
            <li class="section-title">
                Master
            </li>

            <li class="nav-item has-sub">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#user" aria-expanded="false" aria-controls="user">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="me-2"><path fill="currentColor" d="M12 5a3.5 3.5 0 0 0-3.5 3.5A3.5 3.5 0 0 0 12 12a3.5 3.5 0 0 0 3.5-3.5A3.5 3.5 0 0 0 12 5m0 2a1.5 1.5 0 0 1 1.5 1.5A1.5 1.5 0 0 1 12 10a1.5 1.5 0 0 1-1.5-1.5A1.5 1.5 0 0 1 12 7M5.5 8A2.5 2.5 0 0 0 3 10.5c0 .94.53 1.75 1.29 2.18c.36.2.77.32 1.21.32c.44 0 .85-.12 1.21-.32c.37-.21.68-.51.91-.87A5.42 5.42 0 0 1 6.5 8.5v-.28c-.3-.14-.64-.22-1-.22m13 0c-.36 0-.7.08-1 .22v.28c0 1.2-.39 2.36-1.12 3.31c.12.19.25.34.4.49a2.482 2.482 0 0 0 1.72.7c.44 0 .85-.12 1.21-.32c.76-.43 1.29-1.24 1.29-2.18A2.5 2.5 0 0 0 18.5 8M12 14c-2.34 0-7 1.17-7 3.5V19h14v-1.5c0-2.33-4.66-3.5-7-3.5m-7.29.55C2.78 14.78 0 15.76 0 17.5V19h3v-1.93c0-1.01.69-1.85 1.71-2.52m14.58 0c1.02.67 1.71 1.51 1.71 2.52V19h3v-1.5c0-1.74-2.78-2.72-4.71-2.95M12 16c1.53 0 3.24.5 4.23 1H7.77c.99-.5 2.7-1 4.23-1Z"/></svg>
                    <span class="nav-text">Users</span>
                    <span class="caret" style="float: right;"></span>
                </a>
                <div class="collapse" id="user" data-bs-parent="#sidebar-menu">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="email-inbox.html">
                                <span class="nav-text">Admin</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="email-details.html">
                                <span class="nav-text">Tenant</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item has-sub">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#warehouse" aria-expanded="false" aria-controls="warehouse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="me-2"><path fill="currentColor" d="M6 19h2v2H6v-2m6-16L2 8v13h2v-8h16v8h2V8L12 3m-4 8H4V9h4v2m6 0h-4V9h4v2m6 0h-4V9h4v2M6 15h2v2H6v-2m4 0h2v2h-2v-2m0 4h2v2h-2v-2m4 0h2v2h-2v-2Z"/></svg>
                    <span class="nav-text">Warehouse</span>
                    <span class="caret" style="float: right;"></span>
                </a>
                <div class="collapse" id="warehouse" data-bs-parent="#sidebar-menu">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="email-inbox.html">
                                <span class="nav-text">Storage</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="email-details.html">
                                <span class="nav-text">Category</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="section-title">
                Reporting
            </li>

            <li class="nav-item has-sub">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#sales" aria-expanded="false" aria-controls="sales">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="me-2"><path fill="currentColor" d="M9 17H7v-7h2v7m4 0h-2V7h2v10m4 0h-2v-4h2v4m2 2H5V5h14v14.1M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2Z"/></svg>
                    <span class="nav-text">Sales</span>
                    <span class="caret" style="float: right;"></span>
                </a>
                <div class="collapse" id="sales" data-bs-parent="#sidebar-menu">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="email-inbox.html">
                                <span class="nav-text">Rent</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item has-sub">
                <a class="nav-link" href="#" data-bs-toggle="collapse" data-bs-target="#performance" aria-expanded="false" aria-controls="performance">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="me-2"><path fill="currentColor" d="M22 21H2V3h2v16h2v-2h4v2h2v-3h4v3h2v-2h4v4m-4-7h4v2h-4v-2m-6-8h4v3h-4V6m4 9h-4v-5h4v5M6 10h4v2H6v-2m4 6H6v-3h4v3Z"/></svg>
                    <span class="nav-text">Performance</span>
                    <span class="caret" style="float: right;"></span>
                </a>
                <div class="collapse" id="performance" data-bs-parent="#sidebar-menu">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="email-inbox.html">
                                <span class="nav-text">Bill</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    <div class="sidebar-footer">
        <div class="sidebar-footer-content">
        <ul class="d-flex">
            <li>
            <a href="user-account-settings.html" data-toggle="tooltip" title="Profile settings"><i class="mdi mdi-settings"></i></a></li>
            <li>
            <a href="#" data-toggle="tooltip" title="No chat messages"><i class="mdi mdi-chat-processing"></i></a>
            </li>
        </ul>
        </div>
    </div>
    </div>
</aside>