<?php

namespace P4\Http\Controllers;

use Illuminate\Http\Request;

use P4\Http\Requests;
use P4\Http\Controllers\Controller;

class PhotoController extends Controller
{
    public function getShow($title = null)
    {
        return view('photos.show')->with('title', $title);
    }

    /**
     * Responds to requests to GET /photos/add
     */
    public function getAdd() {

        $kidModel = new \P4\Kid();
        $kids_for_dropdown = $kidModel->getKidsForDropdown();

        # Get all the tags to choose
        $tagModel = new \P4\Tag();
        $tags_for_checkbox = $tagModel->getTagsForCheckboxes();
        $tags_for_this_photo = [];

        return view('photos.add')
            ->with('kids_for_dropdown',$kids_for_dropdown)
            ->with('tags_for_checkbox',$tags_for_checkbox)
            ->with('tags_for_this_photo',$tags_for_this_photo);
    }

    /**
     * Responds to requests to POST /photos/add
     */
    public function postAdd(Request $request) {
        $this->validate(
            $request,
            [
                'title' => 'required|min:3',
                'image_url' => 'required|url',
            ]
        );
        # Add photo info into photo object
        $photo = new \P4\Photo();
        $photo->title = $request->title;
        $photo->kid_id = $request->kid;
        $photo->image_url = $request->image_url;

        $photo->save();
        # Add tags info
        if($request->tags) {
            $tags = $request->tags;
        }
        else {
            $tags = [];
        }
        $photo->tags()->sync($tags);

        \Session::flash('flash_message','Your photo was added successfully!');
        return redirect('/photos');
    }

    /**
    * Responds to requests to GET /photos/edit/{$id}
    */
    public function getEdit($id = null) {
        # Get this photo and its tags and kid info
        $photo = \P4\Photo::with('tags')->find($id);
        if(is_null($photo)) {
            \Session::flash('flash_message','Photo not found.');
            return redirect('\photos');
        }
        # Get kid drop down list
        $kidModel = new \P4\Kid();
        $kids_for_dropdown = $kidModel->getKidsForDropdown();
        # Get tag checkbox group
        $tagModel = new \P4\Tag();
        $tags_for_checkbox = $tagModel->getTagsForCheckboxes();
        # Fill tags for this photo
        $tags_for_this_photo = [];
        foreach($photo->tags as $tag) {
            $tags_for_this_photo[] = $tag->name;
        }
        return view('photos.edit')
            ->with([
                'photo' => $photo,
                'kids_for_dropdown' => $kids_for_dropdown,
                'tags_for_checkbox' => $tags_for_checkbox,
                'tags_for_this_photo' => $tags_for_this_photo,
            ]);
    }

    /**
    * Responds to requests to POST /photos/edit
    */
    public function postEdit(Request $request) {
        $photo = \P4\Photo::find($request->id);
        $photo->title = $request->title;
        $photo->kid_id = $request->kid;
        $photo->image_url = $request->image_url;
        $photo->save();
        if($request->tags) {
            $tags = $request->tags;
        }
        else {
            $tags = [];
        }
        $photo->tags()->sync($tags);
        \Session::flash('flash_message','Your photo was updated successfully.');
        return redirect('/photos/edit/'.$request->id);
    }

    /**
    * Responds to requests to GET /photos for a list of photos belonging to a kid
    */
    public function getIndex(Request $request) {
        // Get all the photos belonging to the selected kid
        // Sort in descending order by id
        //TODO: fix from user id to kid id
        $photos = \P4\Photo::where('id','>=','1')->get();
        return view('photos.index')->with('photos',$photos);
    }

    /**
    *
    */
    public function getConfirmDelete($photo_id) {
        $photo = \P4\Photo::find($photo_id);
        return view('photos.delete')->with('photo', $photo);
    }
    /**
    *
    */
    public function getDoDelete($photo_id) {
        $photo = \P4\Photo::find($photo_id);
        if(is_null($photo)) {
            \Session::flash('flash_message','Photo not found.');
            return redirect('\photos');
        }
        if($photo->tags()) {
            $photo->tags()->detach();
        }
        $photo->delete();
        \Session::flash('flash_message',$photo->title.' was deleted.');
        return redirect('/photos');
    }

}
