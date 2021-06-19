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

            $('#tbl_statements').DataTable({
                language: {
                    emptyTable: "No transactions available",
                    info: "Showing _START_ to _END_ of _TOTAL_ transactions",
                    infoEmpty: "Showing 0 to 0 of 0 transactions",
                    infoFiltered: "(filtered from _MAX_ total transactions)",
                    infoPostFix: "",
                    thousands: ",",
                    lengthMenu: "Show _MENU_ transactions",
                    loadingRecords: "<div class='loader slim'></div>",
                    processing: "<div class='loader slim'></div>",
                    search: "Search transactions:",
                    zeroRecords: "No transactions match search criteria"
                },
            });

        });

    </script>
@endpush


@section('content')
<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active"><a href="#">Transaction Statements</a></li>
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
                            <h4 class="text-muted mb-0">Transaction history</h4>
                            This is your account statement page. Always keep track for your account history
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
                <h4 class="card-title">Account timeline</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tbl_statements" class="display min-w850">
                        <thead>
                            <tr>
                                <th>Roll No</th>
                                <th>Student Name</th>
                                <th>Invoice number</th>
                                <th>Fees Type </th>
                                <th>Payment Type </th>
                                <th>Status </th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01</td>
                                <td>Tiger Nixon</td>
                                <td>#54605</td>
                                <td>Library</td>
                                <td>Cash</td>
                                <td><span class="badge light badge-success">Paid</span></td>
                                <td>2011/04/25</td>
                                <td><strong>120$</strong></td>
                            </tr>
                            <tr>
                                <td>02</td>
                                <td>Garrett Winters</td>
                                <td>#54687</td>
                                <td>Library</td>
                                <td>Credit Card</td>
                                <td><span class="badge light badge-warning">Panding</span></td>
                                <td>2011/07/25</td>
                                <td><strong>120$</strong></td>
                            </tr>
                            <tr>
                                <td>03</td>
                                <td>Ashton Cox</td>
                                <td>#35672</td>
                                <td>Tuition</td>
                                <td>Cash</td>
                                <td><span class="badge light badge-success">Paid</span></td>
                                <td>2009/01/12</td>
                                <td><strong>120$</strong></td>
                            </tr>
                            <tr>
                                <td>30</td>
                                <td>Shou Itou</td>
                                <td>#54605</td>
                                <td>Annual</td>
                                <td>Credit Card</td>
                                <td><span class="badge light badge-warning">Panding</span></td>
                                <td>2011/08/14</td>
                                <td><strong>120$</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

