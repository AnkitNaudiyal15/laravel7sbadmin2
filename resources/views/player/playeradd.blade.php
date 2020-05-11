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
            <h1 class="h3 mb-2 text-gray-800">Player Listing</h1>
          
            <!-- DataTales Example -->
            <br />
            <br />
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Players</h6>
                </div>
                <div class="card-body">
                    <form class="player" method="POST" action="{{route('players.store')}}">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="identifier"
                                        id="exampleInputEmail" placeholder="Enter identifier..." required
                                        maxlength="75">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user"
                                        name="player_jersey_number" id="exampleInputPassword"
                                        placeholder="Enter player jersey number" required maxlength="75">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="first_name"
                                        id="exampleInputEmail" placeholder="Enter first name..." required
                                        maxlength="75">
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="last_name"
                                        id="exampleInputPassword" placeholder="Enter last name..." required
                                        maxlength="75">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="url" class="form-control form-control-user" name="image_uri"
                                        id="exampleInputPassword" placeholder="Enter image URI..." required
                                        maxlength="200">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="hundreds"
                                        id="exampleInputPassword" placeholder="Enter number of hundreds..." required
                                        maxlength="75">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="country"
                                        id="exampleInputPassword" placeholder="Enter Country..." required
                                        maxlength="75">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="matches"
                                        id="exampleInputPassword" placeholder="Enter total matches played..." required
                                        maxlength="75">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="run"
                                        id="exampleInputPassword" placeholder="Enter total run..." required
                                        maxlength="75">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="fifties"
                                        id="exampleInputPassword" placeholder="Enter number of fifties..." required
                                        maxlength="75">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <select name="team_id" class="custom-select mr-sm-2" id="process-type" required>
                                    <option value=""> Select Team </option>
                                    @foreach($teams as $team)
                                    <option value="{{$team->id}}">
                                        {{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                            </div>
                        </div>
<br/><br/>
                        <div class="row">
                            <input type="submit" value="Enter Player info" class="btn btn-primary btn-user btn-block">
                    </form>
                </div>
            </div>
        </div>
        @endsection
