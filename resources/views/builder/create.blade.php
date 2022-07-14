<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>  Form Builder </title>

    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Cairo:300,400,600,700" rel="stylesheet">
    <!--end::Base Styles -->


    <link rel="shortcut icon" href="/favicon.ico">

<!-- CSS ============================================ -->
</head>
<body>


<div id="app">
    <main class="py-4" style="padding-top: 0 !important; padding-bottom: 0 !important;">

        <div class="container" style="margin-top: 150px">
            <div class="row">
                <div class="col-6 m-auto" >
                    <h2 class="text-center" >Form Builder</h2>
                    <p class="text-center" style="margin-bottom: 80px">Fill The Main Data of Form</p>
                </div>
            </div>
            <form method="post" action="{{route('builder.store')}}" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault01">Folder Name</label>
                        <input type="text" class="form-control" id="validationDefault01" placeholder="Enter View Folder Name" name="folder">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault02">Blade Name</label>
                        <input type="text" class="form-control" id="validationDefault02" placeholder="Enter Blade Name" name="blade" >
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault02">Blade Title</label>
                        <input type="text" class="form-control" id="validationDefault02" placeholder="Enter Blade Name" name="title" >
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault02">Breadcrumbs</label>
                        <input type="text" class="form-control" id="validationDefault02" placeholder="Ex: Category/Category Products/etc" name="breadcrumbs" >
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault02">Form Columns</label>
                        <input type="text" class="form-control" id="validationDefault02" placeholder="it will be used on multiple languages" name="cols" >
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="validationDefault02">Form Action</label>
                        <input type="text" class="form-control" id="validationDefault02" placeholder="Ex: product/store or product.store" name="action" >
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Form Method</label>
                        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" style="margin-top: 0.01rem !important;" name="method">
                            <option value="" selected>Choose Form Type...</option>
                            <option value="post">Post</option>
                            <option value="patch">Patch</option>
                            <option value="put">Put</option>
                            <option value="delete">Delete</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="uploads" class="custom-control-input" value="1">
                        <label class="custom-control-label" for="customRadioInline1">Uploads Allowed</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="uploads" class="custom-control-input" value="0">
                        <label class="custom-control-label" for="customRadioInline2">Uploads not Allowed</label>
                    </div>
                </div>

                <hr />

                <div class="row">
                    <div class="col-6 m-auto" >
                        <h2 class="text-center" >Form Fields</h2>
                        <p class="text-center" style="margin-bottom: 80px">Fill The Form Fields</p>
                    </div>
                </div>


                <!------------------------- Single Field Row With Ability to repeat ------------------->
                <div id="field_row">
                    <div class="form-row" >
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault01">Field Name</label>
                            <input type="text" class="form-control" id="validationDefault01" placeholder="Enter View Folder Name" name="name[]">
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault02">Input Type</label>
                            <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" style="margin-top: 0.01rem !important;" name="input_type[]">
                                <option value="" selected>Choose Input Type...</option>
                                @foreach($fieldsTypes as $fieldType => $name)
                                    <option value="{{$fieldType}}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="validationDefault02">Placeholder</label>
                            <input type="text" class="form-control" id="validationDefault02" placeholder="Enter Placeholder" name="placeholder[]" >
                        </div>
                        <div class="col-md-2 mb-3">
                            <label for="validationDefault02">Label</label>
                            <input type="text" class="form-control" id="validationDefault02" placeholder="Enter Label" name="label[]" >
                        </div>
                        <div class="col-md-1 mb-3">
                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Columns</label>
                            <div class="d-flex flex-row justify-content-between">
                                <input type="text" class="form-control" id="validationDefault02" placeholder="Enter width in columns" name="columns[]" value="{{config('form_builder.default_cols')}}">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <button id="add_field" class="btn btn-primary" type="button">Add Field</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 m-auto d-flex flex-row justify-content-center">
                        <button class="btn btn-success mt-5 mb-5" type="submit">Create form</button>
                    </div>
                </div>
            </form>
        </div>

    </main>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>

    $(document).ready(function(){
        removeAdd();
    });

    function removeAdd(){
        $('#add_field').click(function() {
            $("#field_row").append('<div class="form-row">\n' +
                '                       <div class="col-md-3 mb-3">\n' +
                '                           <label for="validationDefault01">Field Name</label>\n' +
                '                           <input type="text" class="form-control" id="validationDefault01" placeholder="Enter View Folder Name" name="name[]">\n' +
                '                       </div>\n' +
                '                       <div class="col-md-3 mb-3">\n' +
                '                           <label for="validationDefault02">Input Type</label>\n' +
                '                           <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" style="margin-top: 0.01rem !important;" name="input_type[]">\n' +
                '                                <option value="" selected>Choose Input Type...</option>\n' +
                '                                @foreach($fieldsTypes as $fieldType => $name)\n' +
                '                                    <option value="{{$fieldType}}">{{$name}}</option>\n' +
                '                                @endforeach\n' +
                '                            </select>\n' +
                '                       </div>\n' +
                '                       <div class="col-md-3 mb-3">\n' +
                '                           <label for="validationDefault02">Placeholder</label>\n' +
                '                           <input type="text" class="form-control" id="validationDefault02" placeholder="Enter Placeholder" name="placeholder[]" >\n' +
                '                       </div>\n' +
                '                       <div class="col-md-2 mb-3">\n' +
                '                            <label for="validationDefault02">Label</label>\n' +
                '                            <input type="text" class="form-control" id="validationDefault02" placeholder="Enter Label" name="label[]" >\n' +
                '                        </div>\n' +
                '                        <div class="col-md-1 mb-3">\n' +
                '                            <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Columns</label>\n' +
                '                            <div class="d-flex flex-row justify-content-between">\n' +
                '                                <input type="text" class="form-control" id="validationDefault02" placeholder="Enter width in columns" name="columns[]" >\n' +
                '                            </div>\n' +
                '                        </div>' +
                '                   </div>');

            //removeAdd();
        });
    }

</script>
</body>
</html>
