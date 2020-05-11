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
            <h1 class="h3 mb-2 text-gray-800">Matches Listing</h1>
            <a href="{{route('matches.create')}}" class="btn btn-primary btn-user">
                Add Matches
            </a>
            <!-- DataTales Example -->
            <br />
            <br />
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Matches</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Team 1</th>
                                    <th>Team 2</th>
                                    <th>Match Date</th>
                                    <th>Team 1 Point</th>
                                    <th>Team 2 Point</th>
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
                    ajax: 'matachindex',
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'team1_id',
                            name: 'team1_id'
                        },
                        {
                            data: 'team2_id',
                            name: 'team2_id'
                        }
                        ,
                        {
                            data: 'match_date',
                            name: 'match_date'
                        },
                        {
                            data: 'match_point_team1',
                            name: 'match_point_team1'
                         }
                         ,
                        {
                            data: 'match_point_team2',
                            name: 'match_point_team2'
                         }
                         ,
                        {
                            data: 'edit_action',
                            name: 'edit_action'
                         }
                         ,
                        {
                            data: 'delete_action',
                            name: 'delete_action'
                         }
                    ]
                });
            })(jQuery);

        </script>
        @endpush
