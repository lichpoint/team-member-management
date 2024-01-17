<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'team_id' => 'required|string|max:255',
        ]);
        Member::create($request->all());
        return redirect()->route('members.index')->with('success', 'Member created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Member::find($id);
        return view('members.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Member::find($id);
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validate incoming data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'team_id' => 'required|string|max:255'
        ]);

        // Find the member to update
        $member = Member::findOrFail($id);

        // Update the member with validated data
        $member->update($request->all());

        // Redirect back with a success message
        return redirect()->route('members.index')->with('success', 'Member updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully!');
    }

    public function addMember() {
        return view('members.add-member');
    }

    public function addMemberToProject(Request $request)
    {
        // Validate the request data if needed
        $request->validate([
            'member_id' => 'required|integer',
            'project_id' => 'required|integer',
        ]);

        // Insert into the member_project table
        DB::table('member_project')->insert([
            'member_id' => $request->input('member_id'),
            'project_id' => $request->input('project_id'),
        ]);

        return response()->json(['message' => 'Member added to project successfully'], 201);
    }
}
