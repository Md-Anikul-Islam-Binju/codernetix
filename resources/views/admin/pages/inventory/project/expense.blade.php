@extends('admin.app')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">CoderNetix</a></li>
                        <li class="breadcrumb-item active">Expense!</li>
                    </ol>
                </div>
                <h4 class="page-title">Expense!</h4>
            </div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <button style="background-color:darkblue;" class="btn text-nowrap text-light"
                        onclick="exportTableToPDF('expense-report.pdf', 'Expense Report')">
                    Download Report
                </button>
                <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#addNewModalId">Add New</button>
                </div>
            </div>
            <div class="card-body">
                <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $totalAmount = 0;
                    @endphp
                    @foreach($expense as $key=>$expenseData)
                        @php
                            $totalAmount += $expenseData->amount;
                        @endphp
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$expenseData->category->name}}</td>
                            <td>{{$expenseData->title}}</td>
                            <td>{{$expenseData->amount}}</td>
                            <td>{{\Carbon\Carbon::parse($expenseData->date)->format('d M Y')}}</td>
                            <td style="width: 100px;">
                                <div class="d-flex justify-content-end gap-1">
                                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#editNewModalId{{$expenseData->id}}">Edit</button>
                                        <a href="{{route('expense.destroy',$expenseData->id)}}"class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#danger-header-modal{{$expenseData->id}}">Delete</a>
                                </div>
                            </td>
                            <!--Edit Modal -->
                            <div class="modal fade" id="editNewModalId{{$expenseData->id}}" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="editNewModalLabel{{$expenseData->id}}" aria-hidden="true">
                                <div class="modal-dialog  modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="addNewModalLabel{{$expenseData->id}}">Edit</h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{route('expense.update',$expenseData->id)}}" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Expense Category</label>
                                                            <select name="expense_category_id" class="form-select">
                                                                <option value="">Select Expense Category</option>
                                                                @foreach($expenseCategory as $categoryData)
                                                                    <option value="{{$categoryData->id}}" {{ $expenseData->expense_category_id == $categoryData->id ? 'selected' : '' }}>{{$categoryData->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>



                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="title" class="form-label">Title</label>
                                                            <input type="text" id="title" name="title" value="{{$expenseData->title}}"
                                                                   class="form-control" placeholder="Enter Title" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="amount" class="form-label">Amount</label>
                                                            <input type="number" id="amount" name="amount" value="{{$expenseData->amount}}"
                                                                   class="form-control" placeholder="Enter Amount" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="date" class="form-label">Date</label>
                                                            <input type="date" id="date" name="date" value="{{$expenseData->date}}"
                                                                   class="form-control" placeholder="Enter Date" required>
                                                        </div>
                                                    </div>


                                                    <div class="col-12">
                                                        <div class="mb-3">
                                                            <label for="example-select" class="form-label">Status</label>
                                                            <select name="status" class="form-select">
                                                                <option value="1" {{ $expenseData->status === 1 ? 'selected' : '' }}>Active</option>
                                                                <option value="0" {{ $expenseData->status === 0 ? 'selected' : '' }}>Inactive</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="mb-3">
                                                                <label>Details </label>
                                                                <textarea id="summernoteEdit{{ $expenseData->id }}" name="details">{{ $expenseData->details }}</textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-end">
                                                    <button class="btn btn-primary" type="submit">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div id="danger-header-modal{{$expenseData->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="danger-header-modalLabel{{$expenseData->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header modal-colored-header bg-danger">
                                            <h4 class="modal-title" id="danger-header-modalLabe{{$expenseData->id}}l">Delete</h4>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="mt-0">Are You Went to Delete this ? </h5>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                            <a href="{{route('expense.destroy',$expenseData->id)}}" class="btn btn-danger">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </tr>
                    @endforeach
                    </tbody>

                    <tfoot>
                    <tr>
                        <td colspan="6"><strong>Total: {{ $totalAmount }}</strong></td>
                    </tr>
                    </tfoot>

                </table>
            </div>
        </div>
    </div>
    <!--Add Modal -->
    <div class="modal fade" id="addNewModalId" data-bs-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addNewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addNewModalLabel">Add</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('expense.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="example-select" class="form-label">Expense Category</label>
                                    <select name="expense_category_id" class="form-select" required>
                                        <option value="">Select Expense Category</option>
                                        @foreach($expenseCategory as $categoryData)
                                            <option value="{{$categoryData->id}}">{{$categoryData->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" id="amount" name="amount" class="form-control" placeholder="Enter Amount" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date" id="date" name="date" class="form-control" placeholder="Enter Date" required>
                                </div>
                            </div>

                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
    <script>
        function exportTableToPDF(filename, heading) {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            doc.text(heading, doc.internal.pageSize.getWidth() / 2, 20, { align: 'center' });
            let rows = document.querySelectorAll("table tr");
            let data = [];
            for (let i = 0; i < rows.length; i++) {
                let row = [],
                    cols = rows[i].querySelectorAll("td, th");
                for (let j = 0; j < cols.length - 1; j++)  // <- Fixed here
                    row.push(cols[j].innerText);
                data.push(row);
            }
            doc.autoTable({
                head: [data[0]],
                body: data.slice(1),
                startY: 30
            });
            doc.save(filename);
        }
    </script>
@endsection
