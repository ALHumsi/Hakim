<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="side-header">
        <a class="header-brand1" href="#">
            <img src="" class="header-brand-img desktop-logo" alt="logo">
            <img src="" class="header-brand-img toggle-logo" alt="logo">
            <img src="" class="header-brand-img light-logo" alt="logo">
            <img src="" class="header-brand-img light-logo1" alt="logo">
        </a>
        <!-- LOGO -->
    </div>
    <ul class="side-menu">
        <li>
            <h3>DashBoard</h3>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="#">
                <i class="icon icon-home side-menu__icon"></i>
                <span class="side-menu__label">Home</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('admin.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">Admin</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('patients.index') }}">
                <i class="icon icon-user side-menu__icon"></i>
                <span class="side-menu__label">Patients</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('appointments.index') }}">
                <i class="icon icon-calendar side-menu__icon"></i>
                <span class="side-menu__label">Appointments</span>
            </a>
        </li>
        <li class="slide">
            <a class="side-menu__item" href="{{ route('consultations.index') }}">
                <i class="icon icon-calendar side-menu__icon"></i>
                <span class="side-menu__label">Consultations</span>
            </a>
        </li>
    </ul>
</aside>
