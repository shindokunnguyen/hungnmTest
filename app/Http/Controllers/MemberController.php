<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class MemberController extends Controller
{
    public function index ()
    {
        // lay 10 ban ghi cuoi' cung
//        $members = Member::latest()->paginate(10);

        // other way
        $members = Member::where('is_deleted', '=', 0)
            ->orderBy('id', 'desc')
            ->take(10)
//            ->offset(11)
            ->get();


        return view('members.index',compact('members'));
//            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        //validate require
        $aryErr = [];
        if ($_REQUEST['name'] == '') {
            $aryErr[] = 'The contact Name is require';
        }
        if ($_REQUEST['email'] == '') {
            $aryErr[] = 'The contact Email is require';
        }
        // validate format email
        if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL)) {
            $aryErr[] = "The contact Email is error format";
        }

        if (!empty($aryErr)) {
            return redirect()->route('members.create')
                ->with('errors', $aryErr);
        } else {
            Member::create($request->all());
            return redirect()->route('members.index')
                ->with('success','Member created successfully');

        }

    }

    public function show(Member $member)
    {
        return view('members.show', compact('member'));
    }

    public function edit(Member $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update (Request $request, Member $member)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
        $member->update($request->all());
        return redirect()->route('members.index')
            ->with('success','Member updated successfully');
    }

    public function destroy($id)
    {
        Member::destroy($id);
        return redirect()->route('members.index')
            ->with('success', 'Member deleted success');
    }

}
