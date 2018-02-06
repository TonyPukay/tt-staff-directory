<!doctype html>
<html lang="en">
@include('layouts.header')
<body>
@include('layouts.nav')
<!-- start content -->

<main role="main">

    <div class="container">

        <br>
        <div class="col-lg-6">
            <div class="input-group">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        action
                    </button>
                    <div class="dropdown-menu">
                        <div role="separator" class="dropdown-divider"></div>
                        <a class="dropdown-item" class="btn btn-light btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter">add in staff</a>
                    </div>

                </div>
                <input type="text" name="employee_search" id="employee_search" class="form-control input-lg" autocomplete="off" placeholder="search by category...">

            </div>


        </div>

        <br>
            <button type="button" class=" btn btn-outline-success" id="search">Search</button>
        <br>

        <div id="employee_data">

        </div>

        <!-- Example row of columns -->
        <hr>
    </div> <!-- /container -->
</main>
<input type="hidden" id="selectSelectCategory">
<!--end content -->
@include('layouts.footer')


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add in staff</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Default" id="create_name" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Chief(id)</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Default" id="create_chief"aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">working position</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Default" id="create_working_position" aria-describedby="inputGroup-sizing-default">
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">salary</span>
                    </div>
                    <input type="text" class="form-control" aria-label="Default" id="create_salary" aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancelStaff">Close</button>
                <button type="button" class="btn btn-primary" id="saveStaff">Save changes</button>
            </div>
        </div>
    </div>
</div>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>

<script>
    var token = '{{Session::token()}}';
</script>
<script src="/js/list.js"></script>

</html>