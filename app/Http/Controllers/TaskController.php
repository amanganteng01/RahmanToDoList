<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use RealRashid\SweetAlert\Facades\Alert;

class TaskController extends Controller
{
    public function deleted(String $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'Task failed to delete');
        }

        Task::find($id)->delete();
        return redirect()->back()->with('success', 'Task successfully deleted');
    }

    public function finished(String $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'Task failed to update');
        }

        $task = Task::find($id);
        $data['is_completed'] = 1;
        $data['completed_at'] = now()->format('Y-m-d');

        $task->update($data);
        return redirect()->back()->with('success', 'Task successfully updated');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $data = [
            'users_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'is_completed' => false,
            'completed_at' => 'Not Finished Yet',
            'is_pinned' => 0,
        ];
        Task::create($data);
        return redirect()->back()->with('success', 'Task successfully created');

    }

    public function pinned(String $id)
    {
        try {
            $id = Crypt::decrypt($id);
        } catch (DecryptException $e) {
            return redirect()->back()->with('danger', 'Task failed to update');
        }

        $task = Task::find($id);
        if ($task->is_pinned == 1) {
            $task->update(['is_pinned' => 0]);
        }else {
            $task->update(['is_pinned' => 1]);
        }
        return redirect()->back()->with('success', 'Task successfully updated');
    }
}
