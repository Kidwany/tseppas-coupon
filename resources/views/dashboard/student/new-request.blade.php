@if($enrollment_request)
    @foreach($enrollment_request as $request)
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="alert alert-warning" role="alert">
                    <strong>New Request From Student </strong> To Join Course, <a target="_blank" href="{{adminUrl('course/' . $request->course_id)}}">{{$request->course->course_en->title}}</a>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="zmdi zmdi-close"></i></span>
                    </button>
                </div>
                <div class="card">
                    <form method="post" action="{{adminUrl('change-request-status')}}">
                        @method('post')
                        @csrf
                        <input type="hidden" name="request_id" value="{{$request->id}}">
                        <div class="body">
                            <h2 class="card-inside-title">New Enrollment Request</h2>
                            <hr>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="product details">
                                        <p class="sizes">Course:
                                            <span class="size" title="small">{{$request->course->course_en->title}}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product details">
                                        <p class="sizes">Round:
                                            <span class="size" title="small">{{$request->round->start_date->format('d M')}} Round</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="product details">
                                        <p class="sizes">Left Seats:
                                            <span class="size" title="small"><strong>{{$request->round->available_seats}} Seats</strong></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label for="email_address">Payment Status</label>
                                    <select name="status_id" class="form-control show-tick ms select2" data-placeholder="اختر نوع الرمز الترويجي">
                                        <option value="">Change Staus</option>
                                        <option value="19" {{$request->status_id == 19 ? 'selected' : ''}}>Pending</option>
                                        <option value="13" {{$request->status_id == 13 ? 'selected' : ''}}>Waiting Payment</option>
                                        <option value="20" {{$request->status_id == 20 ? 'selected' : ''}}>Paid</option>
                                        <option value="6" {{$request->status_id == 6 ? 'selected' : ''}}>Rejected</option>
                                    </select>
                                </div>
                                {{--<div class="col-sm-6">
                                    <label for="email_address">Confirmed</label>
                                    <div class="checkbox">
                                        <input id="remember_me" name="confirmed" type="checkbox" value="1">
                                        <label for="remember_me">
                                            Confirmed
                                        </label>
                                    </div>
                                </div>--}}
                            </div>
                            <br>
                            <button type="submit" class="btn btn-raised btn-primary btn-round waves-effect">Save</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    @endforeach
@endif
