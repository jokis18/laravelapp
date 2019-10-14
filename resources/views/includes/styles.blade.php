<style>
    /* Button colors */
    a.yellow-text, .btn-block { color: #DDB001; }

    /* Navigation background */
    .bg-dark { background-color: #000!important; } 

    .px-md-4 { padding:1rem 3rem!important; }

    .main-buttons { background-color: #000; }

    .form-signin {
        width: 100%;
        max-width: 420px;
        padding: 6% 0;
        margin: 0 auto;
    }

    .form-label-group {
        position: relative;
        margin-bottom: 2rem;
    }

    .form-label-group > input,
    .form-label-group > label {
        padding: var(--input-padding-y) var(--input-padding-x);
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