<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Report;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $reports = Report::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.dashboard', compact('reports'));
    }
}