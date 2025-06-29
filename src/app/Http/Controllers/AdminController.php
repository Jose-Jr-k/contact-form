<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContactsExport;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        // 検索条件
        if ($request->filled('full_name')) {
            $query->where(function($q) use ($request) {
                $q->where('first_name', 'like', "%{$request->full_name}%")
                  ->orWhere('last_name', 'like', "%{$request->full_name}%");
            });
        }

        if ($request->filled('email')) {
            $query->where('email', 'like', "%{$request->email}%");
        }

        if ($request->filled('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('created_at')) {
            $query->whereDate('created_at', $request->created_at);
        }

        $contacts = $query->paginate(7);
        $categories = Category::all();

        return view('admin.index', compact('contacts', 'categories'));
    }

    public function export(Request $request)
    {
        return Excel::download(new ContactsExport($request), 'contacts.csv');
    }
}