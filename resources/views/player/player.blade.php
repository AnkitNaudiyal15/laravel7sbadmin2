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
            <a href="{{route('players.create')}}" class="btn btn-primary btn-user">
                Add Player
            </a>
            <!-- DataTales Example -->
            <br />
            <br />
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Players</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Identifier</th>
                                    <th>Team</th>
                                    <th>Player</th>
                                    <th>Player Jersey Number</th>
                                    <th>Country</th>
                                    <th>Matches</th>
                                    <th>Run</th>
                                    <th>Fifties</th>
                                    <th>Hundreds</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                        </table>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @push('script')
        <script type="application/javascript">
            (function ($) {
                $('#dataTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: 'playerindex',
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'identifier',
                            name: 'identifier'
                        },
                        {
                            data: 'team_id',
                            name: 'team_id'
                        },
                        {
                            data: 'image_uri',
                            name: 'image_uri',
                            "render": function (data, type, row) {
                                return '<img src="' + data +
                                    '" class="avatar" width="50" height="50"/>' + row[
                                    'first_name'] + ' ' + row['last_name'];
                            }
                        },
                        {
                            data: 'player_jersey_number',
                            name: 'player_jersey_number'
                        },
                        {
                            data: 'country',
                            name: 'country'
                        },
                        {
                            data: 'matches',
                            name: 'matches'
                        },
                        {
                            data: 'run',
                            name: 'run'
                        },
                        {
                            data: 'fifties',
                            name: 'fifties'
                        },
                        {
                            data: 'hundreds',
                            name: 'hundreds'
                        },
                        {
                            data: 'edit_action',
                            name: 'edit_action'
                        },
                        {
                            data: 'delete_action',
                            name: 'delete_action'
                        }
                    ]
                });
            })(jQuery);

        </script>
        @endpush
