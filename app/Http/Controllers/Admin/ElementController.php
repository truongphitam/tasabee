<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Coporation;
use App\Models\Organizations;

class ElementController extends Controller
{
    //
    public function messages(Request $request)
    {
        $data = Message::find(1);
        if (empty($data)) {
            $data = new Message();
            $data->image = 'http://placehold.it/500x500';
            $data->save();
        }
        return view('admin.page.element.messages', compact('data'));
    }

    public function postMessages(Request $request)
    {
        $data = Message::find(1);
        $data->title = $request->title;
        $data->image = $request->image;
        $data->position = $request->position;
        $data->description = $request->description;
        $data->save();
        return redirect()->route('admin.messages');
    }

    public function CIndex(Request $request)
    {
        $data = Coporation::select('id', 'title', 'image', 'created_at')->orderBy('id', 'desc')->get();
        return view('admin.page.element.coporations.index', compact('data'));
    }

    public function CCreate(Request $request)
    {
        return view('admin.page.element.coporations.add');
    }

    public function CStore(Request $request)
    {
        $param = $request->except(['_token']);
        $data = Coporation::create($param);
        return redirect()->route('coporations.show', $data->id);
    }

    public function CShow($id)
    {
        $data = Coporation::find($id);
        $_title = $data->title;
        return view('admin.page.element.coporations.edit', compact('data', '_title'));
    }

    public function CUpdate(Request $request)
    {
        $data = Coporation::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->image = $request->image;
        $data->save();
        return redirect()->route('coporations.show', $request->id);
    }

    public function CDestroy($id)
    {
        $data = Coporation::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('coporations.index');
    }

    //
    public function OIndex(Request $request)
    {
        $data = Organizations::select('id', 'title', 'image', 'created_at','slug')->orderBy('id', 'desc')->get();
        return view('admin.page.element.organizations.index', compact('data'));
    }

    public function OCreate(Request $request)
    {
        return view('admin.page.element.organizations.add');
    }

    public function OStore(Request $request)
    {
        $param = $request->except(['_token']);
        $data = Organizations::create($param);
        return redirect()->route('organizations.show', $data->id);
    }

    public function OShow($id)
    {
        $data = Organizations::find($id);
        $_title = $data->title;
        return view('admin.page.element.organizations.edit', compact('data', '_title'));
    }

    public function OUpdate(Request $request)
    {
        $data = Organizations::find($request->id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->image = $request->image;
        $data->slug = $request->slug;
        $data->save();
        return redirect()->route('organizations.show', $request->id);
    }

    public function ODestroy($id)
    {
        $data = Organizations::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('organizations.index');
    }
}
