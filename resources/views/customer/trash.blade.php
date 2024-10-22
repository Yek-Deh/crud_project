@extends('layouts.app')
@section('body')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h3>Trash Data</h3>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{route('customers.index')}}" class="btn"
                               style="background-color: #4643d3; color: white;"><i class="fas fa-chevron-left"></i> Back</a>
                        </div>
                        <div class="col-md-8">
                            <form action="{{route('customers.trash')}}" method="get">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search anything..."
                                           aria-describedby="button-addon2" name="search" value="{{request()->search}}">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-2">
                            <form action="{{route('customers.trash')}}" method="get" class="form-order">
                                <div class="input-group mb-3">
                                    <select class="form-select" name="order" id="" onchange="$('.form-order').submit()">
                                        <option @selected(request()->order =='desc') value="desc">Newest to Oldest
                                        </option>
                                        <option @selected(request()->order =='asc') value="asc">Oldest to Newest
                                        </option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="card-body">
                    <table class="table table-bordered" style="border: 1px solid #dddddd">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Date of Birth</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">BAN</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$customer->first_name}}</td>
                                <td>{{$customer->last_name}}</td>
                                <td>7-7-2000</td>
                                <td>{{$customer->phone}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->bank_account_number}}</td>
                                <td style="display: flex;align-items: center">
                                    <a href="{{route('customers.restore',$customer->id)}}" style="color: #2c2c2c;"
                                       class="ms-1 me-1 btn btn-outline-warning">Restore</a>
                                    <form action="{{route('customers.force_delete',$customer->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger btn-delete" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script type="text/javascript">
        $(".btn-delete").click(function (e) {
            e.preventDefault();
            var form = $(this).parents("form")

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    </script>
@endpush
