@extends('layouts.app')
@section('body')
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <h3>Edit</h3>
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{route('customers.index')}}" class="btn"
                               style="background-color: #4643d3; color: white;"><i class="fas fa-chevron-left"></i> Back</a>
                        </div>

                    </div>

                </div>
                <div class="card-body">
                    <form action="{{route('customers.update',$customer->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <img width="30%" height="300px" src="{{asset($customer->image)}}" alt="no image">
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" class="form-control" name="image" value="{{old('image')}}">
                                    @error('image')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">First Name</label>
                                    <input type="text" class="form-control" name="first_name"
                                           value="{{$customer->first_name}}">
                                    @error('first_name')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Last Name</label>
                                    <input type="text" class="form-control" name="last_name"
                                           value="{{$customer->last_name}}">
                                    @error('last_name')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$customer->email}}">
                                    @error('email')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" class="form-control" name="phone" value="{{$customer->phone}}">
                                    @error('phone')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="">Bank Account Number</label>
                                    <input type="text" class="form-control" name="bank_account_number"
                                           value="{{$customer->bank_account_number}}">
                                    @error('bank_account_number')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="">About</label>
                                    <textarea class="form-control" name="about"
                                    >{{$customer->about}}</textarea>
                                    @error('about')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-outline-dark"><i class="fas fa-save"></i> Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
