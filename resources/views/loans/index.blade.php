@extends('layouts.app')

    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&amp;family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">

@push('extra-js')

    <script src="vendor/global/global.min.js"></script>
	<script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	
    <!-- Datatable -->
    <script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="js/plugins-init/datatables.init.js"></script>
    <script src="js/custom.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#destroy-user-modal").on("show.bs.modal", function (event) {
                var relatedTarget = $(event.relatedTarget);

                var id = relatedTarget.data("id");

                var name = relatedTarget.data("name");

                var form = $(this).find("form#destroy_user");

                form.attr('action', route('users.destroy', id));

                form.find('span#name').text(name);
            });

            $('#tbl_loans').DataTable({
                language: {
                    emptyTable: "No loans available",
                    info: "Showing _START_ to _END_ of _TOTAL_ loans",
                    infoEmpty: "Showing 0 to 0 of 0 loans",
                    infoFiltered: "(filtered from _MAX_ total loans)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ loans",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search loans:",
                    zeroRecords: "No loans match search criteria"
                },
            });

        });

    </script>
@endpush


@section('content')
<div class="page-titles">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
		<li class="breadcrumb-item active"><a href="#">Loans</a></li>
	</ol>
</div>

<!-- row -->
<div class="row">
    <div class="col-lg-12">
        <div class="profile card card-body px-3 pt-3 pb-0">
            <div class="profile-head">
                <div class="photo-content">
                    <div class="cover-photo"></div>
                </div>
                <div class="profile-info">
					<div class="profile-details">
						<div class="profile-email px-2 pt-2">
							<h4 class="text-muted mb-0">Loan management</h4>
						</div>
						<div class="dropdown ml-auto">
									<a href="javascript:void()" class="btn btn-rounded btn-primary">Subit a proposal</a>
							<a href="javascript:void()" class="btn btn-rounded btn-success">Update Bank details</a>
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Loans</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tbl_loans" class="display min-w850">
                        <thead>
                            <tr>
                                <th>Reference No</th>
                                <th>Amount</th>
                                <th class="text-center">Status</th>
								<th>Details </th>
                                <th>User</th>
                                <th>Date of Request</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($loans as $loan) 
                            <td>{{ $loan->reference_id }}</td>
                            <td>{{ $loan->amount }}</td>
                            <td class="text-center">
                                @if($loan->status == 0 )
                                    <span class="badge badge-success">on hold</span>
                                @elseif($loan->status == 1 )
                                    <span class="badge badge-primary">Accepted</span>
                                @elseif($loan->status == 2 )
                                    <span class="badge badge-success">Confirmed</span>
                                @elseif($loan->status == 3 )
                                    <span class="badge badge-success">Approved</span>
                                @else
                                    <span class="badge badge-danger">Revoked</span>
                                @endif
                            </td>
                             <td>{{ $loan->details }}</td>
                             <td>{{ $loan->user_id }}</td>
                             <td>{{ $loan->created_at }}</td>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

