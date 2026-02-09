<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Booking;
use App\Models\Message;
use App\Models\Review;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Payment;


class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }


    public function AdminLoginPost(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $admin = Admin::where(['email' => $request->email])->count();
        if($admin){
            $result = $request->only('email','password');
            if(Auth::guard('admin')->attempt($result)){
                // session()->put('admin', $admin);
                return redirect('/admin/dashboard');
            }
            return back()->with('errors','email and password are not match');
        }
        return back()->with('errors','You have no admin permission');
    }

    public function dashboard(){
        $admin = Auth::user();
        // Order By Days
        $checkInByDays= Booking::select(
            DB::raw('DAY(check_in) as day'),
            DB::raw('COUNT(*) as total')
        )
        ->whereYear('created_at', now()->year)
        ->where('status','booked')
        ->groupBy('day')
        ->get();
        $checkOutByDays= Booking::select(
            DB::raw('DAY(check_out) as day'),
            DB::raw('COUNT(*) as total')
        )
        ->whereYear('created_at', now()->year)
        ->where('status','booked')
        ->groupBy('day')
        ->get();
        $checkIn_days = $checkInByDays->pluck('day');
        $checkIn_totals = $checkInByDays->pluck('total');
        $checkOut_days = $checkOutByDays->pluck('day');
        $checkOut_totals = $checkOutByDays->pluck('total');
        $user = User::count();
        $pending = Booking::where('status',"=",'waiting')->count();
        $review =Review::count();
        $check_in = Booking::get()->select('check_in')->count();
        $check_out = Booking::get()->select('check_out')->count();
        $sales = Booking::get()
                // ->whereMonth('order_details.created_at',now()->month)
                ->select('sum(bookings.price) as saleAmount')
                ->value('saleAmount');

        // dd($days,$totals);
        return view('admin.dashboard',[
            'checkInDays'=>$checkIn_days,
            'checkOutDays'=>$checkOut_days,
            'checkIn_totals'=>$checkIn_totals,
            'checkOut_totals'=>$checkOut_totals,
            'users'=>$user,
            'pendings'=>$pending,
            'reviews'=>$review,
            'check_in'=>$check_in,
            'check_out'=>$check_out,
            'sales'=>$sales,
            'admin'=>$admin
        ]);
    }


    public function roomList(){
        $room = Room::paginate( 5);
        return view('admin.roomList',['rooms'=>$room]);
    }

    public function orderBooking(){
        $booking = Booking::join('rooms','bookings.room_id','=','rooms.id')
        ->where('bookings.status','waiting')
        ->select('rooms.image','rooms.room_type','bookings.*')
        ->paginate(5);
        return view('admin.booking',['booking'=>$booking]);
    }

    public function approve($id){
        Booking::where('id',$id)->update(['status'=>'Booked']);
        $booking = Booking::join('rooms','bookings.room_id','=','rooms.id')
        ->where('bookings.status','waiting')
        ->select('rooms.image','rooms.room_type','bookings.*')
        ->get();
        return redirect('admin/booking')->withInput(['booking'=>$booking]);
    }

    public function reject($id){
        Booking::where('id',$id)->update(['status'=>'rejected']);
        $booking = Booking::join('rooms','bookings.room_id','=','rooms.id')
        ->where('bookings.status','waiting')
        ->select('rooms.image','rooms.room_type','bookings.*')
        ->get();
        return redirect('admin/booking')->withInput(['booking'=>$booking]);
    }
    public function customer(){
        $users = User::paginate(4);
        return view('admin.customer',['users'=>$users]);
    }

    public function userDelete($user_id){
        User::where('id',$user_id)
         ->delete();
         $user = User::paginate(4);
         return redirect('admin/customer')->withInput(['users'=>$user]);
     }

    public function bookedDelete($booked_id){
        Booking::where('id',$booked_id)->delete();
        return back();
    }

    public function roomDelete($room_id){
        Room::where('id',$room_id)->delete();
        return back();
    }

    public function RejectDelete($reject_id){
        Booking::where('id',$reject_id)->delete();
        return back();
    }

    public function messageDelete($message_id){
        Message::where('id',$message_id)->delete();
        return back();
    }
    public function bookingList()
    {
        $room = Room::join('bookings', 'rooms.id', '=', 'bookings.room_id')
            ->select('rooms.*', 'bookings.*')
            ->where('bookings.status', 'booked') // Add this line to filter by status
            ->paginate(5);

        return view('admin.bookingList', ['booking' => $room]);
    }

    public function bookingReject(){
        $room = Room::join('bookings','rooms.id','=','bookings.room_id')
        ->where('bookings.status','rejected')
        ->select('rooms.*','bookings.*')
        ->paginate(5);
        return view('admin.bookingReject',['booking'=>$room]);
    }

    public function adminReview(){
        $review = Review::paginate(5);
        return view('admin.review',['review'=>$review]);
    }

    public function message(){
        $message = Message::all();
        return view('admin.message',['messages'=>$message]);
    }

    public function account(){
        return view('admin.account');
    }

    public function addAdmin(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $data['first_name'] = $request->first_name;
        $data['last_name'] = $request->last_name;
        $data['email'] = $request->email;
        $data['password'] = $request->password;
        $data['password_confirmation'] = $request->password;
        $admin = Admin::create($data);
        if($admin){
            return back()->with('success','New admin Added successfully');
        }
        return back()->withErrors(['errors'=>'Please fill the information correctly']);
    }

    public function accountSetting(){
        $admin = Admin::where('id',auth('admin')->user()->id)->get();
        return view('admin.accountSetting',['admins'=>$admin]);
    }

    public function updateAccount(Request $request,$id)
    {
        // Validate the request
        $request->validate([
            'profile_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'location'=>'required',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:6|confirmed',
        ]);
        $user = Admin::findOrFail($id);
        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo');
            $fileName = $file->getClientOriginalName();
            $request-> profile_photo->move(public_path('/images/admin_profile'), $fileName );
            $user->profile_photo = $fileName ;
        }
        // Update user data
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->location = $request->location;
        $user->password = Hash::make($request->password);
        // Save updated user data
        $user->save();

        if($user){
            return redirect()->back()->with('success', 'Profile updated successfully!');
        }
        return back()->withErrors(['errors'=>'Please fill the data']);

    }


   public function payment(){
    $payment = Payment::all();
    return view('admin.payment',['payments'=>$payment]);

   }

    public function adminLogout(){
        Auth::forgetUser();
        Session::getHandler()->gc(0);
        return redirect('/admin');
    }

    public function addRoom(){
        return view('admin.addRoom');
    }

    public function addNewRoom(Request $request){
        $request->validate([
            'image'=>'required|unique',
            'room_no' => 'required|string|unique',
            'room_title' => 'required|string|unique',
            'room_type' => 'required|string',
            'price'=>'required|numeric',
            'facilities' => 'required|max:255',
            'desc' => 'required',
        ]);
        $data = new Room();
        $data->room_number=$request->room_no;
        $data->room_title=$request->room_title;
        $data->room_type=$request->room_type;
        $data->price = $request->price;
        $data->facilities = $request->facilities;
        $data->description = $request->desc;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $request-> image->move(public_path('images'), $fileName );
            $data->image = $fileName ;
        }

    $data->save();

    return redirect()->back()->with('success', 'New Room Inserted successfully!');
    }

    public function edit($id){
        $rooms = Room::findOrFail($id);
        return view('admin.edit',['rooms'=>$rooms]);
    }

    public function editPost(Request $request,$id){
        $request->validate([
            'image'=>'required',
            'room_no' => 'required|string',
            'room_title' => 'required|string',
            'room_type' => 'required|string',
            'price'=>'required|numeric',
            'facilities' => 'required|max:255',
            'desc' => 'required',
        ]);

        $data = Room::findOrFail($id);
        $data->room_number=$request->room_no;
        $data->room_title=$request->room_title;
        $data->room_type=$request->room_type;
        $data->price = $request->price;
        $data->facilities = $request->facilities;
        $data->description = $request->desc;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $request-> image->move(public_path('images'), $fileName );
            $data->image = $fileName ;
        }

    $data->save();

    return redirect()->back()->with('success', 'Edit room successfully!');
    }

    public function changePassword($id){
        $admin = Admin::findOrFail($id);
        return view('admin.changePassword',['admins'=>$admin]);
    }

    public function updatePassword(Request $request,$id)
    {
        // Validate the request
        $request->validate([
            'password' => 'required|nullable|string|min:6|confirmed',
            'password_confirmation'=>'required'
        ]);
        $user = Admin::findOrFail($id);
        // Update user data
        $user->password = $request->password;
        // Save updated user data
        $user->save();
        if($user){
            return redirect()->back()->with('success', 'New Password updated successfully!');
        }
    }
}


