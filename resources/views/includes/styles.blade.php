<style>
    body { font-size: .875rem; }

    .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
    }

    /** Sidebar **/

    .sidebar {
        position: fixed;
        top: 55px;
        bottom: 0;
        left: 0;
        z-index: 100; /* Behind the navbar */
        padding: 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    .sidebar-sticky {
        position: -webkit-sticky;
        position: sticky;
        top: 48px; /* Height of navbar */
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #999;
    }

    .sidebar .nav-link.active {
        color: #007bff;
    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
        color: inherit;
    }

    .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
    }

    /** Navbar **/

    .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }

    .navbar .form-control {
        padding: .75rem 1rem;
        border-width: 0;
        border-radius: 0;
    }

    .form-control-dark {
        color: #fff;
        background-color: rgba(255, 255, 255, .1);
        border-color: rgba(255, 255, 255, .1);
    }

    .form-control-dark:focus {
        border-color: transparent;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
    }

    /** Utilities **/

    .border-top { border-top: 1px solid #e5e5e5; }
    .border-bottom { border-bottom: 1px solid #e5e5e5; }
    /* Button colors */
    a.yellow-text, .btn-block { color: #DDB001; }

    /* Navigation background */
    .bg-dark { background-color: #000!important; } 
    .px-md-4 { padding:1rem 3rem!important; }
    main { height: 700px; }
    .main-buttons { background-color: #000; }

    .form-signin {
        width: 100%;
        max-width: 520px;
        padding: 4% 0;
    }

    .form-label-group {
        position: relative;
        margin-bottom: 2rem;
    }

    .form-label-group > label {
        position: absolute;
        top: -25px;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0; /* Override default `<label>` margin */
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out;
    }

    .form-label-group input::-webkit-input-placeholder { color: transparent; }

    .form-label-group input:-ms-input-placeholder {
    color: transparent;
    }

    .form-label-group input::-ms-input-placeholder {
    color: transparent;
    }

    .form-label-group input::-moz-placeholder {
    color: transparent;
    }

    .form-label-group input::placeholder {
    color: transparent;
    }

    .form-label-group input:not(:placeholder-shown) {
    padding-top: calc(var(--input-padding-y) + var(--input-padding-y) * (2 / 3));
    padding-bottom: calc(var(--input-padding-y) / 3);
    }

    .form-label-group input:not(:placeholder-shown) ~ label {
    padding-top: calc(var(--input-padding-y) / 3);
    padding-bottom: calc(var(--input-padding-y) / 3);
    font-size: 12px;
    color: #777;
    }

    @media (min-width: 768px) {
        .container { max-width: 40rem; }
        .album { background-color: #fff; }
        footer {
            color: #fff;
            background-color: #000;
            padding-top: 3rem;
            padding-bottom: 3rem;
        }
        footer p {
            color: #fff;
            margin-bottom: .25rem;
        }
        .box-shadow { 
            box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); 
        }
    }
</style>