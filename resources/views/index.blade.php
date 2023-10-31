@extends('layouts.UserLayouts')
@section('content')
<div class="app-wrapper">

    <div class="app-content pt-3 p-md-3 p-lg-4">
        <div class="container-xl">

            <h1 class="app-page-title">Overview</h1>

            <div class="app-card alert alert-dismissible shadow-sm mb-4 border-left-decoration" role="alert">
                <div class="inner">
                    <div class="app-card-body p-3 p-lg-4">
                        <h3 class="mb-3">Welcome, {{ Auth::user()->name }}!</h3>
                        <div class="row gx-5 gy-3">
                            <div class="col-12 col-lg-9">

                                <div>Welcome to the Mawani Assignment, here you can access all the users registered before.</div>
                            </div><!--//col-->

                        </div><!--//row-->
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div><!--//app-card-body-->

                </div><!--//inner-->
            </div><!--//app-card-->






            <div class="tab-content" id="orders-table-tab-content">
                <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
                    <div class="app-card app-card-orders-table shadow-sm mb-5">
                        <div class="app-card-body">
                            <div class="table-responsive">
                                <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                    <tr>
                                        <th class="cell">User ID</th>
                                        <th class="cell">Name</th>
                                        <th class="cell">Email</th>
                                        <th class="cell">Account Created At</th>
                                        <th class="cell">Password Updated At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td class="cell">{{ $user->id }}</td>
                                        <td class="cell"><span class="truncate">{{ $user->name }}</span></td>
                                        <td class="cell">{{ $user->email }}</td>
                                        <td class="cell"><span> {{ $user->created_at }}</span></td>
                                        <td class="cell"><span>{{ $user->updated_at }}</span></td>

                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div><!--//table-responsive-->

                        </div><!--//app-card-body-->
                    </div><!--//app-card-->


                </div><!--//tab-pane-->

                 </div><!--//tab-content-->


        </div><!--//container-fluid-->
    </div><!--//app-content-->



</div><!--//app-wrapper-->

@endsection

