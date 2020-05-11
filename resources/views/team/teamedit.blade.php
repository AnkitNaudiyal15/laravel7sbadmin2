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
                <form class="teams"  method="POST" action="{{route('teams.update',$team->id)}}">
                    @csrf
                    @method('PUT')
                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="identifier"
                            id="exampleInputEmail" placeholder="Enter identifier..." value={{$team->identifier}} required maxlength="75">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="name"
                                    id="exampleInputPassword" placeholder="Enter name" value={{$team->name}} required maxlength="75">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="url" class="form-control form-control-user" name="logo_uri"
                                    id="exampleInputEmail" placeholder="Enter logo Uri..." value={{urldecode($team->logo_uri)}} required maxlength="200">
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="club_state"
                                    id="exampleInputPassword" placeholder="Enter club state..."  value={{$team->club_state}} required maxlength="75">
                            </div>
                        </div>
                        <input type="submit" value="Create Team" class="btn btn-primary btn-user btn-block">
                    </form>
                </div>
            </div>
        </div>
        @endsection
