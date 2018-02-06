<!doctype html>
<html lang="en">
@include('layouts.header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
<body>
@include('layouts.nav')
<!-- start content -->
<main role="main">
    <div class="container">
        <div id="tree"></div>
        <!-- Example row of columns -->
        <hr>
    </div> <!-- /container -->
</main>
<!--end content -->
@include('layouts.footer')
</body>

<script>
    var token = '{{Session::token()}}';
</script>
<script src="js/tree.js"></script>

</html>