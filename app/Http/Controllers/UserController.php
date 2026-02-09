<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Message;
use App\Models\Review;
use App\Models\Room;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;




class UserController extends Controller
{
    //
    public function home()
{
    $review = Review::latest()->limit(1)->get();
    $user = Auth::user(); // Get the authenticated user
    $room = Room::limit(3)->get();
    return view('hotel.index', ['reviews' => $review, 'user' => $user, 'rooms'=>$room]);
}

    public function Login(){
        return view('hotel.login');
    }

    public function Register(){
        return view('hotel.register');
    }

    public function bedRoom(){
        $room = Room::where('room_type','bedroom')->get();
        return view('hotel.bedroom',['bed_rooms'=>$room]);

    }

    public function Gallery(){
        return view('hotel.gallery');
    }

    public function ContactUs(){
        if(session()->has('user')){
            return view('hotel.contactUs');
        }
        return redirect('hotel/login')->with('error','Please login first');
    }

    public function saveMessage(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['subject'] = $request->subject;
        $data['message'] = $request->message;
        $msg = Message::create($data);
        // dd($msg);
        // dd($msg);
        if($msg){
            return back()->with('success','Thank you customer, We received your message well');
        }
    }

    // Review
    public function reviewMessage(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'review_title' => 'required',
            'review_message' => 'required',
        ]);
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['review_title'] = $request->review_title;
        $data['review_message'] = $request->review_message;
        $data['rating'] = $request->rating;
        $review = Review::create($data);
        // dd($msg);
        // dd($msg);
        if($review){
            return back()->with('success','Thank you customer!!, We received your feedback well');
        }
    }

    public function AboutUs(){
        return view('hotel.aboutUs');
    }

    public function search(Request $request)
    {
        $request->validate([
            'checkin' => 'required|date',
            'checkout' => 'required|date|after:checkin',
            'adult' => 'required|integer|min:1',
        ]);

        $checkinDate = $request->input('checkin');
        $checkoutDate = $request->input('checkout');
        $adultCount = $request->input('adult');

        // Query to find available rooms (Assuming you have a Room model and availability logic)
        $availableRooms = DB::table('bookings')
                    ->join('rooms','bookings.room_id','!=','rooms.id')
                    // ->where('rooms.id','!=','bookings.room_id')
                    // ->select('bookings.*','rooms.*')
                    ->paginate(5);
                    // ->get();


            if($availableRooms){
                return view('hotel.search', [
                    'rooms' => $availableRooms,
                    'checkin' => $checkinDate,
                    'checkout' => $checkoutDate,
                    'adult' => $adultCount
                ]);
            }
            return back()->withErrors(['errors'=>"Please fill the data completely"]);
    }

    public function detail($id)
    {
        // Find the room by ID
        $room = Room::findOrFail($id);
        $user = Auth::user();
        // Fetch similar rooms based on type and price range
        $similarRooms = Room::where('id', '!=', $room->id) // Exclude the current room
                            ->whereBetween('price', [$room->price * 0.8, $room->price * 1.2]) // Within 20% price range
                            ->take(2) // Limit the number of similar rooms displayed
                            ->get();

        // Check if the user is logged in
        if (Auth::user()) {
            // Pass the room and similar rooms to the view
            return view('hotel.detail', [
                'room' => $room,
                's_rooms' => $similarRooms,
                'users' => $user
            ]);
        } else {
            // Redirect to login with an error message
            return redirect('/hotel/login')->with('error_message', 'Please login first to book');
        }
    }

    // public function profile(){
    //     return view('hotel.profile');

    // }

    public function profile(){
        $user = Auth::user(); // Get the authenticated user
        $booking = Booking::all();
        $review = Review::all();
        return view('hotel.profile', ['user' => $user,'bookings'=>$booking, 'reviews'=>$review]);
    }

    /**
     * Handle the profile update, including file upload.
     */
    public function updateProfile(Request $request,$id)
{
    // Validate the request
    $request->validate([
        'profile_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . Auth::user()->id,
        'location' => 'nullable|string|max:255',
        'about'=>'required'
    ]);
    $user = User::findOrFail($id);
    if ($request->hasFile('profile_photo')) {
        $file = $request->file('profile_photo');
        $fileName = $file->getClientOriginalName();
        $request-> profile_photo->move(public_path('images/user_profile'), $fileName );
        $user->profile_photo = $fileName ;
    }
    // Update user data
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->email = $request->email;
    $user->location = $request->location;
    $user->about = $request->about;

    // Save updated user data
    $user->save();

    return redirect()->back()->with('success', 'Profile updated successfully!');
}



    public function faq(){
        $faqs = [
            [
                'question' => 'How do I book a room?',
                'answer' => 'You can book a room through our website by selecting the desired room and choosing your check-in and check-out dates.'
            ],
            [
                'question' => 'Can I cancel my booking?',
                'answer' => 'Yes, you can cancel your booking by logging into your account and going to the "My Bookings" section.'
            ],
            [
                'question' => 'What payment methods do you accept?',
                'answer' => 'We accept various payment methods, including credit cards, debit cards, and online payment platforms like Stripe and PayPal.'
            ],
            [
                'question' => 'Are pets allowed in the hotel?',
                'answer' => 'Yes, we have designated pet-friendly rooms. Please inform us in advance if you will be bringing a pet.'
            ],
            [
                'question' => 'What is the check-in and check-out time?',
                'answer' => 'Check-in starts at 3 PM and check-out is at 11 AM. Early check-in or late check-out can be requested but is subject to availability.'
            ]
        ];

        return view('hotel.faq', compact('faqs'));
    }

    public function review(){
        return view('hotel.review');
    }

    public function booking(){
        return view('hotel.booking');
    }

    public function payment(){
        return view('hotel.payment');
    }

    public function loginPost(Request $request){
        // Validate the request data
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Check if the user exists by email
    $user = User::where('email', $request->email)->first();

    if ($user) {
        // Attempt to authenticate the user with the provided credentials
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Store user information in the session
            session()->put('user', $user);
            return response()->json(['success' => true,'redirect_url' => route('home')]);
        }else{
            return response()->json(['success' => false, 'errors' => 'Email and password do not match! Please try again.']);

        }

    }
    return response()->json(['success' => false, 'message' => 'No user found with this email address.']);

    }

    public function registerPost(Request $request)
    {
        $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName'=>'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $data['first_name'] = $request->firstName;
        $data['last_name'] = $request->lastName;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['password_confirmation'] = $request->password;
        $user = User::create($data);
        if($user){
            return response()->json(["success"=>true]);
        }
}

    public function logout(){
        Auth::forgetUser();
        Session::getHandler()->gc(0);
        return redirect('/hotel');
    }

}
