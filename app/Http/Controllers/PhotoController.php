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
        
        return view('photos.add')
            ->with('kids_for_dropdown',$kids_for_dropdown)
            ->with('tags_for_checkbox',$tags_for_checkbox);
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
        $photo->kid_id = $request->author;
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
        # Done
        \Session::flash('flash_message','Your photo was added!');
        return redirect('/photos');
    }

    /**
    * Responds to requests to GET /photos for a list of photos belonging to a kid
    */
    public function getIndex(Request $request) {
        // Get all the photos belonging to the selected kid
        // Sort in descending order by id
        //TODO: fix from user id to kid id
        $photos = \P4\Photo::where('kid_id','=',\Auth::id())->orderBy('id','DESC')->get();
        return view('photos.index')->with('photos',$photos);
    }

}
