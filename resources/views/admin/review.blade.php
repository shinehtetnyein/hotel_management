@extends('admin.layout')
@section('content')
    <div class="table-responsive">
        <table class="table table-nowrap text-center">
            <thead style="background: rgb(161, 1, 1);">
                <tr>
                    <th scope="col" class="text-light">Date</th>
                    <th scope="col" class="text-light">Customer</th>
                    <th scope="col" class="text-light">Email</th>
                    <th scope="col" class="text-light">Review Title</th>
                    <th scope="col" class="text-light">Review Message</th>
                    <th scope="col" class="text-light">Rating</th>
                </tr>
            </thead>
            <tbody style="background: rgba(2,0,36,1);">
                @foreach ($review as $r)
                    <tr class="text-center">
                        <td class="text-light">
                            <p style="margin-top:15px; font-size:15px;">{{ $r->created_at }}</p>
                        </td>
                        <td class="text-light">
                            <p style="margin-top:15px; font-size:15px;">{{ $r->name }}</p>
                        </td>
                        <td class="text-light">
                            <p style="margin-top:15px; font-size:15px;">{{ $r->email }}</p>
                        </td>
                        <td class="text-light">
                            <p style="margin-top:15px; font-size:15px;">{{ $r->review_title }}</p>
                        </td>
                        <td class="text-light">
                            <p style="margin-top:15px; font-size:15px;">{{ $r->review_message }}</p>
                        </td>
                        <td class="d-flex justify-content-center border-1">
                            <div class="rated">
                                @for ($i = 1; $i <= $r->rating; $i++)
                                    {{-- <input type="radio" id="star{{$i}}" class="rate" name="rating" value="5"/> --}}
                                    <label class="star-rating-complete" title="text">{{ $i }}
                                        stars</label>
                                @endfor
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
