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
            <a href="{{route('teams.create')}}" class="btn btn-primary btn-user">
                Add Team
              </a>
            <!-- DataTales Example -->
           <br/>
           <br/>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Teams</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    {{-- <th>Name</th> --}}
                                    <th>Identifier</th>
                                    <th>Team</th>
                                    <th>club_state</th>
                                    <th>edit_action</th>
                                    <th>delete_action</th>
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
                    ajax: 'teamindex',
                    columns: [{
                            data: 'id',
                            name: 'id'
                        },
                     
                        {
                            data: 'identifier',
                            name: 'identifier'
                        },
                        {
                            data: 'logo_uri',
                            name: 'logo_uri',
                                    
                                "render": function (data , type , row) {
                                    return '<img src="' + data + '" class="avatar" width="50" height="50"/>' +row['name'];
                                }
                        },
                        {
                            data: 'club_state',
                            name: 'club_state'
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
