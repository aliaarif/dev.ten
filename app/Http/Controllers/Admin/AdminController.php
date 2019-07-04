<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\Role;
use App\Faq;
use App\Booking;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $data = [
      'pageTitle' => 'Manage All Users',
      'users' => User::paginate(10)
    ];

    return view('admin.users.index', $data);
  }

  public function showFAQForm()
  {
    $data = [
      'pageTitle' => 'Add A New Faq',
      'faqs' => Faq::orderBy('id', 'desc')->get()
    ];

    return view('backend.add-faq', $data);
  }


  public function addFAQ(Request $request)
  {
    $validation = $request->validate([
      'question' => 'required|unique:faqs',
      'answer' => 'required',

    ]);

    if(Faq::create($request->all())){
      return back()->with('success', "New Faq Added Successfully!");
    }else{
      return back()->with('error', "Trouble in Adding New Faq!");
    }
  }


  public function ShowEditFAQ($id)
  {
    $faq = Faq::find($id);
    $faqs = Faq::orderBy('id', 'desc')->get();
    $data = [
      'pageTitle' => 'Edit FAQ',
      'faq' => $faq,
      'faqs' => $faqs,
    ];

    return view('backend.edit-faq', $data);
  }

  public function editFAQ(Request $request)
  {
    $validation = $request->validate([
      'question' => 'sometimes|required|unique:faqs,question, '.$request->id,
      'answer' => 'required',
    ]);

    //dd(htmlentities($request->answer,ENTQUOTES));
    $updt = Faq::where('id', $request->id)->update([
      'question' => $request->question,
      'answer' => $request->answer
    ]);

    if($updt){
      return back()->with('success', "Faq Updated Successfully!");
    }else{
      return back()->with('error', "Trouble in Updating Faq!");
    }
  }


  public function deleteFAQ($id)
  {

    if(Faq::find($id)->delete()){
     return redirect()->route('admin.add.faq');
   }else{
    return back()->with('error', "Trouble in Deleting Faq!");
  }
}


            /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
            public function edit($id)
            {

              $data = [
                'pageTitle' => 'Edit User',
                'user' => User::find($id),
                'roles' => Role::all()
              ];

              if(Auth::id() == $id){
                return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself.');
              }

              return view('admin.users.edit', $data);
            }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function update(Request $request, $id)
        {
          if(Auth::id() == $id){
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to update yourself.');
          }

          $user = User::find($id);
          $user->roles()->sync($request->roles);

          return redirect()->route('admin.users.index')->with('success', 'User has been updates.');
        }



        public function destroy($id)
        {
          if(Auth::id() == $id){
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to delete yourself.');
          }

          $user = User::find($id);

          if($user){
            $user->roles()->sync([]);
            //$user->roles()->detach();
            $user->delete();

          }

          return redirect()->route('admin.users.index')->with('success', 'User has been updates.');
        }


        public function payments()
        {
          $data = [
            'pageTitle' => 'All Payments',
            'payments' => Booking::where('user_id', '!=', Auth::id())->get()
          ];

          //dd($data);

          return view('backend.payments', $data);
        }
      }
