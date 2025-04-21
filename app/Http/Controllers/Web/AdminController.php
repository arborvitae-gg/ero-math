<?php

namespace App\Http\Controllers\Web;

class AdminController
{
    public function manageQuestions()
{
    $this->authorize('viewAdminDashboard');
    return view('admin.questions');
}
}
