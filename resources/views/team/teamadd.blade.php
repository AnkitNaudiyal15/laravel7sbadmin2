@extends('layouts.app')
@section('content')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        @include('navbar')
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">Team Listing</h1>
           
            <!-- DataTales Example -->
            <br />
            <br />
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Teams</h6>
                </div>
                <div class="card-body ">
                    <form class="team" method="POST" action="{{route('teams.store')}}">
                        @csrf
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="identifier"
                                    id="exampleInputEmail" placeholder="Enter identifier..." required maxlength="75">
                                @error('identifier')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="name"
                                    id="exampleInputPassword" placeholder="Enter name" required maxlength="75">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="url" class="form-control form-control-user" name="logo_uri"
                                    id="exampleInputEmail" placeholder="Enter logo Uri..." required maxlength="200">
                                @error('logo_uri')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="club_state"
                                    id="exampleInputPassword" placeholder="Enter club state..." required maxlength="75">
                                @error('club_state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <input type="submit" value="Create Team" class="btn btn-primary btn-user btn-block">
                    </form>
                </div>
            </div>
        </div>
        @endsection
