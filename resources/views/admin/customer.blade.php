@extends('admin.layout')
@section('content')
    <table class="table table-nowrap text-center">
        <thead style="background: rgb(161, 1, 1);">
            <tr class="text-light d-flex justify-content-around align-items-center border-0 p-5 ps-0 pt-0 pb-0">
                <th scope="col" style="width: 110px;"
                    class="text-light d-flex justify-content-center align-items-center border-0">Profile</th>
                <th scope="col" style="width: 110px;"
                    class="text-light d-flex justify-content-center align-items-center border-0">First Name</th>
                <th scope="col" style="width: 110px;"
                    class="text-light d-flex justify-content-center align-items-center border-0">Last Name</th>
                <th scope="col" style="width: 110px;"
                    class="text-light d-flex justify-content-center align-items-center border-0">Email</th>
                <th scope="col" style="width: 110px;"
                    class="text-light d-flex justify-content-center align-items-center border-0">Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $u)
                <tr style="height: 120px;"
                    class="d-flex justify-content-around align-items-center border-3 border-gray p-5 ps-0">
                    <td style="width:100px; height:100px;" class="p-2 border-0 rounded-circle">
                        <img src="/images/user_profile/{{ $u->profile_photo }}" alt="$r->image" class="rounded-circle"
                            style="width:100%; height:100%;">
                    </td>
                    <td style="width: 110px; font-size:15px;"
                        class="text-dark d-flex justify-content-center align-items-center border-0">
                        <p>{{ $u->first_name }}</p>
                    </td>
                    <td style="width: 110px; font-size:15px;"
                        class="text-dark d-flex justify-content-center align-items-center border-0">
                        <p>{{ $u->last_name }}</p>
                    </td>
                    <td style="width: 110px; font-size:15px;"
                        class="text-dark d-flex justify-content-center align-items-center border-0">
                        <p>{{ $u->email }}</p>
                    </td>
                    <td style="width: 110px; font-size:15px;"
                        class="text-dark d-flex justify-content-center align-items-center border-0">
                        <a href="{{ route('userDelete', $u->id) }}"
                            style="background-color: rgb(176, 0, 0); padding:10px 20px; border-radius:10px; color:white;"
                            class="text-uppercase d-block">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $users->links('') }}
@endsection
