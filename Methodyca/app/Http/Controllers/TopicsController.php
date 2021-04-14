<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use App\Rules\Recaptcha;
use Illuminate\Http\Request;


class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Topic::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'nullable',
            'keywords' => 'nullable',
            'expire' => 'nullable|date',
            'name' => 'required',
            'email' => 'required',
            'agreement' => 'required',
            'token' => ['required', new Recaptcha()]
        ]);
        $topic = new Topic();
        $topic->title = $request->title;
        $topic->description = $request->description;
        $topic->keywords = $request->keywords;
        $topic->expire = $request->expire;
        $topic->name = $request->name;
        $topic->email = $request->email;
        $topic->popularity = 0;
        $topic->agreement = $request->agreement;
        $topic->visibility = false;
        $topic->save();

        return response('Successfully created a new topic', 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Topic::find($id);
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
        $topic = Topic::find($id);
        if ($topic) {
            if($request->popularity) {
                $this->validate($request, [
                    'token' => ['required', new Recaptcha()]
                ]);
                $topic->popularity++;
            }
            if($request->visibility) {
                $topic->visibility = $request->visibility;
            }
            $topic->save();

            return response('Successfully updated a topic', 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Topic::find($id)->delete();
        return response('Successfully deleted a topic', 200);
    }
}
