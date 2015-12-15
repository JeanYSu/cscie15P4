<?php

namespace P4\Http\Controllers;

use Illuminate\Http\Request;

use P4\Http\Requests;
use P4\Http\Controllers\Controller;

class KidController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    /**
    * Responds to requests to GET /kids/add
    */
    public function getAdd() {
        return view('kids.add');
    }

    /**
    * Responds to requests to POST /kids/add
    */
    public function postAdd(Request $request) {
        $this->validate(
            $request,
            [
                'name' => 'required|min:3',
                'gender' => 'required',
                'family_code' => 'required|min:6',
            ]
        );

        # Add kid info into kid object
        $kid = new \P4\Kid();
        $kid->name = $request->name;
        $kid->gender = $request->gender;
        $kid->family_code = $request->family_code;
        $kid->save();
        # Add user info
        $user = \Auth::user();
        $kid->users()->save($user);

        \Session::flash('flash_message','Your kid was added successfully!');
        return redirect('/kids');
    }

    /**
    * Responds to requests to POST /kids/add
    */
    public function postAddCode(Request $request) {
        $this->validate(
            $request,
            [
                'family_code' => 'required',
            ]
        );

        $kid = \P4\Kid::with('users')
                ->where('family_code','=',$request->family_code)->first();

        # Does not find kid matching the family code entered
        if(sizeof($kid) ==0) {
            \Session::flash('flash_message','The family code entered does not match to a kid.');
            return redirect('/kids');
        }
         
        $existingkids = \P4\Kid::select('kids.*')
                ->leftJoin('kid_user', 'kids.id', '=','kid_user.kid_id')
                ->where('kid_user.user_id',\Auth::user()->id)
                ->get();

        # Check if the user laready has this kid in the account
        if(isset($existingkids)){
            foreach($existingkids as $ekid){
                if ($ekid->id == $kid->id){
                    # the kid is already in user's kid list
                    \Session::flash('flash_message','You already have this kid in your account!');
                    return redirect('/kids');
                }

            }
        }

        # Add user info and link kid and user together
        $user = \Auth::user();
        $kid->users()->save($user);

        \Session::flash('flash_message','Your kid was added successfully!');
        return redirect('/kids');
    }

    /**
    * Responds to requests to GET /kids/edit/{$id}
    */
    public function getEdit($id = null) {
        # Get this kid info
        $kid = \P4\Kid::find($id);
        if(is_null($kid)) {
            \Session::flash('flash_message','Kid not found.');
            return redirect('\kids');
        }
        # Get genders drop down list
        $kidModel = new \P4\Kid();
        $genders_for_dropdown = $kidModel->getGendersForDropdown();

        return view('kids.edit')
            ->with([
                'kid' => $kid,
                'genders_for_dropdown' => $genders_for_dropdown,
            ]);
    }

    /**
    * Responds to requests to POST /photos/edit
    */
    public function postEdit(Request $request) {
        $this->validate(
            $request,
            [
                'name' => 'required|min:3',
                'gender' => 'required',
                'family_code' => 'required|min:6',
            ]
        );

        $kid = \P4\Kid::find($request->id);
        $kid->name = $request->name;
        $kid->gender = $request->gender;
        $kid->family_code = $request->family_code;
        $kid->save();

        \Session::flash('flash_message','Your kid info was updated successfully.');
        return redirect('/kids/edit/'.$request->id);
    }

    /**
    * Responds to requests to GET /kids for a list of photos belonging to a kid
    */
    public function getIndex(Request $request) {
        // Get all the kids belonging to the logged in user
        $kids = \P4\Kid::with('photos')
                ->select('kids.*')
                ->leftJoin('kid_user', 'kids.id', '=','kid_user.kid_id')
                ->where('kid_user.user_id',\Auth::user()->id)
                ->orderBy('kids.name','ASC')
                ->get();

        return view('kids.index')->with('kids',$kids);
    }

    /**
    * Responds to requests to Get /photos/confirm-delete
    */
    public function getConfirmDelete($kid_id) {
        $kid = \P4\Kid::find($kid_id);
        return view('kids.delete')->with('kid', $kid);
    }
    /**
    * Responds to requests to Process /photos/delete/{?id}
    */
    public function getDoDelete($kid_id) {
        $kid = \P4\Kid::with('photos','users')->find($kid_id);
        if(is_null($kid)) {
            \Session::flash('flash_message','Kid not found.');
            return redirect('\kids');
        }

        if($kid->users()) {
            $kid->users()->detach();
        }
        //delete photos before deleting kid record
        if($kid->photos()) {
            //delete photo tags related records
            \DB::table('photo_tag')
                ->join('photos', 'photos.id', '=','photo_tag.photo_id')
                ->where('photos.kid_id','=', $kid->id)->delete();
            //delete kid's photos
            $kid->photos()->delete();
        }
        //delete kid record
        $kid->delete();
        \Session::flash('flash_message',$kid->name.' was deleted.');
        return redirect('/kids');
    }

}
