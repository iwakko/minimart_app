<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    private $section;

    public function __construct(Section $section)
    {
        $this->section = $section;
    }
    public function index()
    {
        $all_sections = $this->section->latest()->get();

        return view('sections.index')->with('all_sections',$all_sections);
    }
    public function store(Request $request)
    {
        $request->validate([
            'section' =>'required|min:1|max:50'
        ]);
        
        $this->section->name = $request->section;
        $this->section->save();

        return redirect()->route('section.index');
    }
    
    public function destroy($id)
    {
        $section = $this->section->findOrFail($id);
        $this->section->destroy($id);

        return redirect()->route('section.index');
    }
}
