@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Create Invoice</h4>
                </div>
                <div class="card-body">
                    <invoice-form 
                        :customers="{{ $customers->toJson() }}"
                        action="{{ route('invoices.store') }}"
                        method="POST">
                    </invoice-form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection