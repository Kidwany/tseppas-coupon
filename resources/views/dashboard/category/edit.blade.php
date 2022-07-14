@extends('dashboard.layouts.layouts')
@section('title', 'Update Category')
@section('customizedStyle')
@endsection

@section('customizedScript')
    <script>
        $('.select2').select2()
    </script>
    <script>
        $(document).ready(function () {
            if ($('#sub').is(':checked'))
            {
                //alert("kidoo")
                $('#service_provider').show();
            }

            $('#sub').on('change', function ()
            {
                if ($('#sub').is(':checked'))
                {
                    $('#service_provider').fadeIn(500);
                }else if($('#main').is(':checked'))
                {
                    $('#service_provider').fadeOut(500);
                }
            })
            $('#main').on('change', function ()
            {
                if($('#main').is(':checked'))
                {
                    $('#service_provider').fadeOut(500);
                }
            })

        });
    </script>

@endsection

@section('content')
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2> Update Category</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl("/")}}"><i
                                    class="zmdi zmdi-home"></i> {{config("app.name")}} </a></li>
                        <li class="breadcrumb-item"><a href="{{adminUrl('category')}}">Category </a></li>
                        <li class="breadcrumb-item active"> Update Category</li>

                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i
                            class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i
                            class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Vertical Layout -->
        @include("dashboard.layouts.messages")
        <!-- Vertical Layout -->
            <form action="{{route('category.update', $category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method("patch")
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>Update Category (En) </strong></h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Name</label>
                                        <div class="form-group">
                                            <input type="text" name="name_en" value="{{$category->category_en->title}}" id="email_address"
                                                   class="form-control" placeholder="Enter Name">
                                            @error("name_ar") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg- 4 col-md-12 col-sm-3">
                                        <label for="email_address">Image</label>
                                        <div class="form-group">
                                            <input type="file" name="image_path" id="email_address" class="form-control"
                                                   placeholder=" image">
                                            @error("image_path") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <label for="email_address">Category Type</label>
                                        <div class="form-group">
                                            <div class="radio inlineblock m-r-20">
                                                <input type="radio" name="is_main" id="main" class="with-gap"
                                                       value="option1" {{$category->parent_id ? '' : 'checked'}}>
                                                <label for="main">Main Category</label>
                                            </div>
                                            <div class="radio inlineblock">
                                                <input type="radio" name="is_main" id="sub" class="with-gap"
                                                       value="option2" {{$category->parent_id ? 'checked' : ''}}>
                                                <label for="sub">Sub Category</label>
                                            </div>
                                            @error("is_main") <span class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-6" id="service_provider" style="display: none">
                                        <label>Parent Category</label>
                                        <select name="category_id" class="form-control show-tick ms select2"
                                                data-placeholder="-- Choose Main Category --">
                                            <option value="">-- Choose Main Category --</option>
                                            @if($categories)
                                                @foreach($categories as $main_category)
                                                    @if($main_category->parent_id == null)
                                                        <option {{$main_category->id == $category->parent_id ? 'selected' : ''}} value="{{$main_category->id}}">{{$main_category->category_en->title}}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                        @error("category_id") <span
                                            class="error text-danger">{{$message}}</span> @enderror
                                    </div>
                                    <div class="col-lg-12 col-md-6">
                                        <label for="email_address">Active</label>
                                        <div class="checkbox">
                                            <input id="is_active" {{$category->is_active ? 'checked' : ''}} name="is_active" type="checkbox" value="1">
                                            <label for="is_active">
                                                Assign as active category
                                            </label>
                                            @error("is_active") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="header">
                                <h2><strong>Update Category (Ar) </strong></h2>
                            </div>
                            <div class="body">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label for="email_address"> Name </label>
                                        <div class="form-group">
                                            <input type="text" name="name_ar" value="{{$category->category_ar->title}}" id="email_address"
                                                   class="form-control" placeholder="Enter Name">
                                            @error("name_en") <span
                                                class="error text-danger">{{$message}}</span> @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('dashboard.layouts.formFooter', ['cancel_link' => adminUrl('category')])
            </form>
        </div>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    @include('dashboard.layouts.messages')
                    <div class="card">
                        <div class="header d-flex justify-content-between">
                            <h2><strong>List Of </strong> Sub Categories </h2>
                            <a href="{{adminUrl('category/create?parent_category=' . $category->id)}}" class="btn btn-success"><i class="zmdi zmdi-plus"></i> Add new Sub Category</a>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table id="ssss" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th> Created at </th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th> Created at </th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($categories as $sub_category)
                                        @if($sub_category->parent_id != null && $sub_category->parent_id == $category->id)
                                            <tr>
                                                <td>{{$sub_category->id}}</td>
                                                <td>{{$sub_category->category_en->title}}</td>
                                                <td>
                                                <span class="badge badge-{{$sub_category->is_active ? 'success' : 'danger'}}">
                                                    {{$sub_category->is_active ? 'Active' : 'Inactive'}}
                                                </span>
                                                </td>
                                                <td>{{$sub_category->created_at->diffForHumans()}}</td>
                                                <td>
                                                    <a href="{{adminUrl('category/' . $sub_category->id . '/edit')}}" class="btn btn-primary btn-sm"><i class="zmdi zmdi-edit"></i> </a>
                                                    {{--<a href="#" class="btn bg-red waves-effect btn-sm" data-toggle="modal" data-target="#delete{{$category->id}}" data-color="red"><i class="zmdi zmdi-delete"></i> </a>--}}
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
