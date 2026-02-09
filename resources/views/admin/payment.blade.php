@extends('admin.layout')
@section('content')
    <table class="table table-nowrap text-center">
        <thead style="background: rgb(161, 1, 1);">
            <tr class="text-light d-flex justify-content-around align-items-center border-0 p-5 ps-0 pt-0 pb-0">
                <th scope="col" style="width: 110px;"
                    class="text-light d-flex justify-content-center align-items-center border-0">Payer</th>
                <th scope="col" style="width: 110px;"
                    class="text-light d-flex justify-content-center align-items-center border-0">Email</th>
                <th scope="col" style="width: 110px;"
                    class="text-light d-flex justify-content-center align-items-center border-0">Status</th>

                <th scope="col" style="width: 110px;"
                    class="text-light d-flex justify-content-center align-items-center border-0">Method</th>
                <th scope="col" style="width: 110px;"
                    class="text-light d-flex justify-content-center align-items-center border-0">More</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payments as $p)
                <tr style="height: 120px;"
                    class="d-flex justify-content-around align-items-center border-3 border-gray p-5 ps-0">
                    {{-- <td style="width:100px; height:100px;" class="p-2 border-0 rounded-circle">
                        <img src="/images/user_profile/{{ $p->profile_photo }}" alt="$r->image" class="rounded-circle"
                            style="width:100%; height:100%;">
                    </td> --}}
                    <td style="width: 110px; font-size:15px;"
                        class="text-dark d-flex justify-content-center align-items-center border-0">
                        <p>{{ $p->payer_name }}</p>
                    </td>
                    <td style="width: 110px; font-size:15px;"
                        class="text-dark d-flex justify-content-center align-items-center border-0">
                        <p>{{ $p->payer_email }}</p>
                    </td>
                    <td style="width: 110px; font-size:15px;"
                        class="text-dark d-flex justify-content-center align-items-center border-0">
                        <p class="text-success text-uppercase">{{ $p->payment_status }}</p>
                    </td>
                    <td style="width: 110px; font-size:15px;"
                        class="text-dark d-flex justify-content-center align-items-center border-0">
                        <p>{{ $p->payment_method }}</p>
                    </td>
                    <td style="width: 110px; font-size:15px;"
                        class="text-dark d-flex justify-content-center align-items-center border-0">
                        <a href="{{ route('userDelete', $p->id) }}"
                            style="background-color: rgb(176, 0, 0); padding:10px 20px; border-radius:10px; color:white;"
                            class="text-uppercase d-block">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{-- {{ $payments->links('') }} --}}
@endsection
