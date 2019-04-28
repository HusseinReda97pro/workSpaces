@extends('OwnerPanel.panelLayout')

@section('ownerPanelContent')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Bank Name</th>
            <th scope="col">Bank Account</th>
            <th scope="col">Bank Number</th>
            <th scope="col">Swift Code</th>
        </tr>
        </thead>
        <tbody>
        @foreach($payments as $payment)
            <tr>
                <th scope="row">{{$payment->Bank_Name}}</th>
                <td>{{$payment->Bank_Account}}</td>
                <td>{{$payment->Bank_Number}}</td>
                <td>{{$payment->Swift_Code}}</td>
            </tr>

        @endforeach

        </tbody>
    </table>


@endsection
@section('ownerPanelScript')
    {{-- هنا لو حبيت تستخدم جافا سكربت--}}
@endsection
