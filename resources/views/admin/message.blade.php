@extends('admin.layout')
@section('content')
    <div class="table-responsive">
        <table class="table table-nowrap text-center">
            <thead style="background: rgb(161, 1, 1);">
                <tr>
                    <th scope="col" class="text-light">Date</th>
                    <th scope="col" class="text-light">Name</th>
                    <th scope="col" class="text-light">Email</th>
                    <th scope="col" class="text-light">Subject</th>
                    <th scope="col" class="text-light">message</th>
                    <th scope="col" class="text-light">Remove</th>
                </tr>
            </thead>
            <tbody style="background: rgba(2,0,36,1);">
                @foreach ($messages as $m)
                    <tr>
                        <td class="text-light">{{ $m->created_at }}</td>
                        <td class="text-light">{{ $m->name }}</td>
                        <td class="text-light">{{ $m->email }}</td>
                        <td class="text-light">{{ $m->subject }}</td>
                        <td class="text-light">{{ $m->message }}</td>
                        <td class="text-light">
                            <a href="{{ route('messageDelete', $m->id) }}"
                                style="background-color: rgb(188, 0, 0); padding:10px 20px; border-radius:10px; color:white;"
                                class="text-uppercase">
                                Delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
