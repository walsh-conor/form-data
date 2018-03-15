<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class UserController extends Controller
{

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
     public function store(Request $request)
     {
         // dd($request->all());
         $this->validate($request, [
             'email' => 'unique:users|required|email',
             'name' => 'required|max:50',
             'address_one' => 'max:50',
             'address_two' => 'max:50',
             'eircode' => 'max:15',
             'country' => 'max:50',
             'password' => 'required|max:50',
             'fileinput' => 'image|mimes:jpeg,png,jpg|max:2048',
         ]);


         $file = $request->file('fileinput');
         $image = Image::make($file->getRealPath());
         $image->resize(250, 250);

         $thumbnail_image_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'.'.$file->getClientOriginalExtension();
         //save resized image to public
         $image->save(public_path('img/'.$thumbnail_image_name));
         $saved_image_uri = $image->dirname.'/'.$image->basename;
         //Save to private folder
         $uploaded_image_url = Storage::putFile('uploads', new File($saved_image_uri));
         //Now delete public image
         $image->destroy();
         unlink($saved_image_uri);


        $user = new User;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->address_one = $request->address_one;
        $user->address_two = $request->address_two;
        $user->eircode = $request->eircode;
        $user->country = $request->country;
        $user->password = Hash::make($request->password);
        $user->image_url = $uploaded_image_url;

        $user->save();


        return back()->with([
            'success' => 'Form Submitted successfully!'
        ]);
    }
}
