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
            <h1 class="h3 mb-2 text-gray-800">Match Listing</h1>

            <!-- DataTales Example -->
            <br />
            <br />
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Matches</h6>
                </div>
                <div class="card-body">
                    <form class="player" method="POST" action="{{route('matches.store')}}">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <select name="team_id1" class="custom-select mr-sm-2" id="process-type" required>
                                    <option value=""> Select Team </option>
                                    @foreach($teams as $team)
                                    <option value="{{$team->id}}">
                                        {{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">

                                <select name="team_id2" class="custom-select mr-sm-2" id="process-type" required>
                                    <option value=""> Select Team </option>
                                    @foreach($teams as $team)
                                    <option value="{{$team->id}}">
                                        {{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="match_point_team1"
                                        id="exampleInputEmail" placeholder="Enter match point..." required
                                        maxlength="75" value="0" readonly>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <input type="number" class="form-control form-control-user" name="match_point_team2"
                                        id="exampleInputEmail" placeholder="Enter match point..." required
                                        maxlength="75" value="0" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <select name="winner_team_id" class="custom-select mr-sm-2" id="process-type" required
                                    disabled>
                                    <option value=""> Select winning team </option>
                                    @foreach($teams as $team)
                                    <option value="{{$team->id}}">
                                        {{ $team->name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="col">
                                <div class="form-group">
                                    <input type="date" class="form-control form-control-user" name="match_date"
                                        id="exampleInputPassword" placeholder="select match date" required
                                        maxlength="75">
                                </div>
                            </div>
                        </div>
                        <br /><br />



                        <div class="row">
                            <input type="submit" value="Enter Match info" class="btn btn-primary btn-user btn-block">
                    </form>
                </div>
            </div>
        </div>
        @endsection
