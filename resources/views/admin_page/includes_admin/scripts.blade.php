    <!-- Modernizr (browser feature detection library) -->
    <script src="/../../assets_admin/js/vendor/modernizr.min.js"></script>

    <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
    <script src="/../../assets_admin/js/vendor/jquery.min.js"></script>
    <script src="/../../assets_admin/js/vendor/bootstrap.min.js"></script>
    <script src="/../../assets_admin/js/plugins.js"></script>
    <script src="/../../assets_admin/js/app.js"></script>

    <!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
    <!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->
    <script src="https://maps.googleapis.com/maps/api/js?key="></script>
    <script src="/../../assets_admin/js/helpers/gmaps.min.js"></script>

    <!-- Load and execute javascript code used only in this page -->
    <script src="/../../assets_admin/js/pages/index.js"></script>
    <script src="/../../assets_admin/js/helpers/ckeditor/ckeditor.js"></script>
    <script>
        $(function() {
            Index.init();
        });
    </script>
    <script src="/../../assets_admin/js/pages/tablesGeneral.js"></script>
    <script>
        $(function() {
            TablesGeneral.init();
        });
    </script>
    <script src="/../../assets_admin/js/pages/tablesDatatables.js"></script>
    <script src="/../../assets_admin/js/pages/formsValidation.js"></script>
    <script>
        $(function() {
            FormsValidation.init();
        });
    </script>

    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>