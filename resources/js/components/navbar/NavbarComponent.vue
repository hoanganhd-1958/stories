<template>
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#">
                    <i class="fa fa-bars"></i>
                </a>
            </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input
                    class="form-control form-control-navbar"
                    type="search"
                    aria-label="Search"
                    :placeholder="$t('Search')"
                />
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
        <ul class="navbar-nav ml-auto">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown show">
                <a
                    class="nav-link"
                    data-toggle="dropdown"
                    href="#"
                    aria-expanded="true"
                    title="change language"
                >
                    <i class="fas fa-globe-asia"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a @click="changeLanguage('vi')" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="storage/image/VN.png" />
                            <div class="media-body">
                                <h3 class="dropdown-item-title sign">{{ $t('Vietnamese') }}</h3>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                    <div class="dropdown-divider"></div>
                    <a @click="changeLanguage('en')" class="dropdown-item">
                        <!-- Message Start -->
                        <div class="media">
                            <img src="storage/image/US.png" />
                            <div class="media-body">
                                <h3 class="dropdown-item-title sign">{{ $t('English') }}</h3>
                            </div>
                        </div>
                        <!-- Message End -->
                    </a>
                </div>
            </li>
            <li class="nav-item show">
                <a
                    @click="logOut()"
                    class="nav-link"
                    data-toggle="dropdown"
                    href="#"
                    aria-expanded="true"
                    title="logout"
                >
                    <i class="fas fa-sign-out-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->
</template>
<script>
    export default {
        methods: {
            changeLanguage(lang) {
                this.$i18n.locale = lang;
            },
            logOut() {
                this.$swal
                    .fire({
                        title: "Are you sure you want to logout?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, log me out!"
                    })
                    .then(result => {
                        if (result.value) {
                            localStorage.removeItem("token");
                            this.$router.push({ path: "login" });
                        }
                    });
            }
        }
    };
</script>

