<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link" href="{{route('admin.dashboard')}}"
            ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard</a>

            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
            ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                Pages
                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                ></a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                    <a class="nav-link collapsed" href="{{route('show.category')}}"
                    >Add Category </a>
                    <a class="nav-link collapsed" href="{{route('show.days.category')}}"
                    >Add Days</a>
                    <a class="nav-link collapsed" href="{{route('show.task')}}"
                    >Add Task</a>
                    <a class="nav-link collapsed" href="{{route('notification.task')}}"
                    >Add Notification</a>
                    <a class="nav-link collapsed" href="{{route('edit.category')}}"
                    >Edit Category
                    </a>
                    <a class="nav-link collapsed" href="{{route('show.days.edit')}}"
                    >Edit Days
                    </a>
                    <a class="nav-link collapsed" href="{{route('edit.task')}}"
                    >Edit Task
                    </a>
                </nav>
            </div>
        </div>
    </div>
</nav>
