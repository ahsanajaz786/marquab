<?php

namespace App\Http\Controllers\Tutor;

use App\TutorBackground;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TutorBackgroundController extends Controller
{
    public function updateBackground(Request $request, $type){
        $this->updateCreate($request->data, $type);
        return redirect()->back()->withSuccess('Background Updated Successfully');
    }

    private function updateCreate($requestData, $type){
        $mathing = ['type' => $type,'user_id' => auth()->user()->id];
        $data = [];
        foreach ($requestData as $item){
            if(isset($item['diploma_photo']) && $item['diploma_photo'])
                $item['diploma_photo'] = $this->storeFile($item['diploma_photo'], $type);
            else if(isset($item['certificate_photo']) && $item['certificate_photo'])
                $item['certificate_photo'] = $this->storeFile($item['certificate_photo'], $type);
            else if(isset($item['profile_photo']) && $item['profile_photo'])
                $item['profile_photo'] = $this->storeFile($item['profile_photo'], $type);
            $data[] = $item;
        }
        $data = json_encode($data);
        TutorBackground::updateOrCreate($mathing,[
            'type' => $type,
            'user_id' => auth()->user()->id,
            'data' => $data
        ]);
    }

    public function storeFile($file, $type){
        $photoName = $file->getClientOriginalName();
        if(Storage::disk('users')->exists(auth()->user()->id.'/'.$type.'/'.$photoName))
            Storage::disk('users')->delete(auth()->user()->id.'/'.$type.'/'.$photoName);
        $file->storeAs(auth()->user()->id.'/'.$type, $photoName, 'users');
        return '/'.$type.'/'.$photoName;
    }
}
