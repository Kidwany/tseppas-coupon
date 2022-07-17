@extends('dashboard.layouts.layouts')
@section('title', 'Sales Orders')
@section('customizedStyle')
@endsection

@section('customizedScript')

    <script src="{{assetPath("dashboard/assets/plugins/nestable/jquery.nestable.js")}}"></script>
    <script src="{{assetPath("dashboard/assets/js/pages/ui/sortable-nestable.js")}}"></script>

@endsection

@section('content')

    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Sales Order</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{adminUrl('/')}}"><i class="zmdi zmdi-home"></i> {{config('app.name')}} </a></li>
                        <li class="breadcrumb-item"><a href="{{adminUrl('sales-orders')}}">Sales Order </a></li>
                        <li class="breadcrumb-item active"> All Sales Order </li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    @include('dashboard.layouts.messages')
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-3">
                                    <small class="text-muted">Order Code: </small>
                                    <p>GFR-15529863</p>
                                </div>
                                <div class="col-md-3">
                                    <small class="text-muted">Sales Agent: </small>
                                    <p>Mohamed Mahran</p>
                                </div>
                                <div class="col-md-3">
                                    <small class="text-muted">Customer: </small>
                                    <p>Vodafone</p>
                                </div>
                                <div class="col-md-3">
                                    <small class="text-muted">Approved By: </small>
                                    <p>Ahmed Zidan</p>
                                </div>
                                <div class="col-md-3">
                                    <small class="text-muted">Status: </small>
                                    <p>In progress</p>
                                </div>
                                <div class="col-md-3">
                                    <small class="text-muted">Created At: </small>
                                    <p>12 July 2022, 08:43 AM</p>
                                </div>
                                <div class="col-md-3">
                                    <small class="text-muted">Last Update: </small>
                                    <p>12 July 2022, 08:43 AM</p>
                                </div>
                                <div class="col-md-3">
                                    <small class="text-muted">Total Quantity: </small>
                                    <p>550</p>
                                </div>
                                <div class="col-md-3">
                                    <small class="text-muted">Total Items count: </small>
                                    <p>4 Items</p>
                                </div>
                                <div class="col-md-3">
                                    <small class="text-muted">Finished Items: </small>
                                    <p>2 Items</p>
                                </div>
                                <div class="col-md-3">
                                    <small class="text-muted">In progress Items: </small>
                                    <p>2 Items</p>
                                </div>
                                <div class="col-md-3">
                                    <small class="text-muted">Expected Delivery: </small>
                                    <p>29 July 2022, 08:43 AM</p>
                                </div>
                            </div>
                            <hr>
                            <ul class="list-unstyled">
                                <li>
                                    <div>Progress (89%)</div>
                                    <div class="progress m-b-20">
                                        <div class="progress-bar l-blue " role="progressbar" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100" style="width: 89%"> <span class="sr-only">62% Complete</span> </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-4 col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2><strong>Planned</strong></h2>
                                            <ul class="header-dropdown">
                                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#addcontact"><i class="icon-plus"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="body taskboard planned_task">
                                            <div class="dd" data-plugin="nestable">
                                                <ol class="dd-list">
                                                    <li class="dd-item" data-id="1">
                                                        <div class="dd-handle d-flex justify-content-between align-items-center">
                                                            <div class="h6 mb-0">#gh-100125-l (كنافة بالقشطة و المكسرات)</div>
                                                        </div>
                                                        <div class="dd-content p-15">
                                                            <p>محتاجين القشطة تكون زيادة على الوش.</p>
                                                            <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                                <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="zmdi zmdi-view-list"></i> 150 Packet</span></li>
                                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-comments"></i> 1 Kilo</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item" data-id="2">
                                                        <div class="dd-handle d-flex justify-content-between align-items-center">
                                                            <div class="h6 mb-0">#gh-100125-l (حلويات شرقية مشكلة)</div>
                                                        </div>
                                                        <div class="dd-content p-15">
                                                            <p>عايزين البسبوسة تكون زيادة و نقلل البقلاوة.</p>
                                                            <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                                <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="zmdi zmdi-view-list"></i> 150 Packet</span></li>
                                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-comments"></i> 1 Kilo</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2><strong>In</strong> progress</h2>
                                        </div>
                                        <div class="body taskboard progress_task">
                                            <div class="dd" data-plugin="nestable">
                                                <div class="dd-empty"></div>
                                                <ol class="dd-list">

<!--                                                    <li class="dd-item" data-id="2">
                                                        <div class="dd-handle d-flex justify-content-between align-items-center">
                                                            <div class="h6 mb-0">Sites to review</div>
                                                            <div class="action">
                                                                <a href="javascript:void(0);"><i class="zmdi zmdi-edit"></i></a>
                                                                <a href="javascript:void(0);"><i class="zmdi zmdi-delete"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="dd-content p-15">
                                                            <p>Contrary to popular belief, Lorem Ipsum is not simply.</p>
                                                            <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                                <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="zmdi zmdi-time"></i> 28 Jan</span></li>
                                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-comments"></i> 2</a></li>
                                                                <li class="ml-3 bd-highlight"><a href="javascript:void(0);" class="text-muted"><i class="zmdi zmdi-check-square"></i> 8</a></li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="dd-item" data-id="3">
                                                        <div class="dd-handle d-flex justify-content-between align-items-center">
                                                            <div class="h6 mb-0">Client Followup</div>
                                                            <div class="action">
                                                                <a href="javascript:void(0);"><i class="zmdi zmdi-edit"></i></a>
                                                                <a href="javascript:void(0);"><i class="zmdi zmdi-delete"></i></a>
                                                            </div>
                                                        </div>
                                                        <div class="dd-content p-15">
                                                            <p>It is a long established fact that a reader.</p>
                                                            <ul class="list-unstyled d-flex bd-highlight align-items-center">
                                                                <li class="mr-2 flex-grow-1 bd-highlight"><span class="badge badge-default"><i class="zmdi zmdi-time"></i> 05 Feb</span></li>
                                                            </ul>
                                                        </div>
                                                    </li>-->
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2><strong>Completed</strong></h2>
                                        </div>
                                        <div class="body taskboard completed_task">
                                            <div class="dd" data-plugin="nestable">
                                                <div class="dd-empty"></div>
                                                <ol class="dd-list">

                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!empty($sliders))
        @foreach($sliders as $slider)
            <div class="modal fade" id="delete{{$slider->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content bg-red">
                        <div class="modal-header">
                            <h4 class="title" id="defaultModalLabel">Delete Slider</h4>
                        </div>
                        <div class="modal-body text-light" style="text-align: right"> Are You Sure From Deleting This Slider ? <strong> {{$slider->slider_en->name}} </strong></div>
                        <form id="deleteUser{{$slider->id}}" style="display: none" action="{{route('slider.destroy', $slider->id)}}" method="post">
                            @csrf
                            @method('delete')
                        </form>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-link waves-effect text-light" form="deleteUser{{$slider->id}}">Delete</button>
                            <button type="button" class="btn btn-link waves-effect text-light" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

@endsection
