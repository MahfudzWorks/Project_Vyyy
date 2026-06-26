<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('user')
            ->latest()
            ->get();

        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();

        return view('admin.testimonial.create', compact('users'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,id',
            'message'   => 'required|string',
            'rating'    => 'required|integer|min:1|max:5',
            'is_active' => 'required|boolean',
        ]);

        Testimonial::create([
            'user_id'   => $request->user_id,
            'message'   => $request->message,
            'rating'    => $request->rating,
            'is_active' => $request->is_active,
        ]);

        return redirect()
            ->route('admin.testimonial.index')
            ->with('success', 'Testimonial berhasil ditambahkan.');
    }

    public function edit(Testimonial $testimonial)
    {
        $users = User::where('role', 'user')->get();

        return view(
            'admin.testimonial.edit',
            compact('testimonial', 'users')
        );
    }


    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'user_id'   => 'required|exists:users,id',
            'message'   => 'required|string',
            'rating'    => 'required|integer|min:1|max:5',
            'is_active' => 'required|boolean',
        ]);

        $testimonial->update([
            'user_id'   => $request->user_id,
            'message'   => $request->message,
            'rating'    => $request->rating,
            'is_active' => $request->is_active,
        ]);

        return redirect()
            ->route('admin.testimonial.index')
            ->with('success', 'Testimonial berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()
            ->route('admin.testimonial.index')
            ->with('success', 'Testimonial berhasil dihapus.');
    }
}
