<!doctype html>
<html lang="en">
@include('layouts.header')
<link rel="stylesheet" href="/css/person.css" />
<body>
@include('layouts.nav')
<!-- start content -->
<main role="main">
    <div class="container">
        <hr>
        <div class="media">
            <div class="align-self-center mr-3">
                @if($person->image == NULL)
                    <img src="/img/person_0.png" id="avatar" width="300px" height="300px" alt="Generic placeholder image">
                @else
                    <img src="/img/{{$person->image}}" id="avatar" width="300px" height="300px" alt="Generic placeholder image">
                @endif
                <button type="button" class="btn btn-light btn-lg btn-block" data-toggle="modal" data-target="#exampleModalCenter">Change avatar</button>
            </div>
            <div class="media-body">
                <form>
                    <div class="form-group row">
                        <label for="name" id="label_name" class="col-sm-2 col-form-label">Name*</label>
                        <div class="col-sm-10" id="blockInputName">
                            <input type="text" class="form-control" id="name" value="{{$person->name}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="working_position" id="label_working_position" class="col-sm-2 col-form-label">Position*</label>
                        <div class="col-sm-10" id="blockInputWorkingPosition">
                            <input type="text" class="form-control" id="working_position" value="{{$person->working_position}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="salary" id="label_salary" class="col-sm-2 col-form-label">Salary*</label>
                        <div class="col-sm-10" id="blockInputSalary">
                            <input type="text" class="form-control" id="salary" value="{{$person->salary}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="created_at" class="col-sm-2 col-form-label">Create at</label>
                        <div class="col-sm-10" id="blockInputCreatedAt">
                            <input class="form-control" id="created_at" value="{{$person->created_at}}" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="updated_at" class="col-sm-2 col-form-label">Update at</label>
                        <div class="col-sm-10" id="blockInputUpdatedAt">
                            <input class="form-control" id="updated_at" value="{{$person->updated_at}}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="chief" id="label_chief" class="col-sm-2 col-form-label">Chief*</label>
                        <div class="col-sm-10" id="blockInputChief">
                            <input class="form-control input-lg" name="chief" autocomplete="off" type="text" id="chief" value="@if($person->parent_id == 0){{'I`m boss'}}@elseif ($person->parent_name == ''){{'My boss was be deleted:('}}@else{{$person->parent_name}}@endif"  placeholder="Search..." disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="button" class="btn btn-outline-success" id="save" disabled>Update</button>
                            <button type="button" class="btn btn-outline-danger" id="delete">Delete</button>
                            <button type="button" class="btn btn-outline-warning" id="cancel" disabled>Cancel</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <input type="hidden" id="id" value="{{$person->id}}">
        <input type="hidden" id="image">
        <input type="hidden" id="id_chief"value="{{$person->parent_id}}">

        <!-- Example row of columns -->
        <hr>
    </div> <!-- /container -->
</main>
<!--end content -->
@include('layouts.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>


<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Image upload</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="imgContainer">
                    <form enctype="multipart/form-data" action="/uploadImage" method="post" name="image_upload_form" id="image_upload_form">
                        <div id="imgArea"><img src="/img/default.jpg">
                            <div class="progressBar">
                                <div class="bar"></div>
                                <div class="percent">0%</div>
                            </div>
                            <div id="imgChange"><span>Change Photo</span>
                                <input type="file" accept="image/*" name="image_upload_file" id="image_upload_file">
                                <input type="hidden" value="{{Session::token()}}" name="_token">
                                <input type="hidden" value="" name="updateImage" id="updateImage">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveImage">Save changes</button>
            </div>
        </div>
    </div>
</div>

</body>

<script>
    var token = '{{Session::token()}}';
</script>

<script src="/js/person.js"></script>

</html>