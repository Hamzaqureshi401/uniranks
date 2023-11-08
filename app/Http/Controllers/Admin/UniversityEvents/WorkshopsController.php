<?php

namespace App\Http\Controllers\Admin\UniversityEvents;

use App\Http\Controllers\Controller;
use App\Models\University\UniversityEvent;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class WorkshopsController extends Controller
{
    public function index(): RedirectResponse
    {
        return redirect()->route('admin.events.workshops.list');
    }

    /**
     * @return Factory|View|Application
     */
    public function list(): Factory|View|Application
    {
        return view('pages.university-events.workshops.list');
    }

    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        return view('pages.university-events.workshops.create');
    }
    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit(UniversityEvent $event): View|Factory|RedirectResponse|Application
    {
        $event->load('history');
        return view('pages.university-events.workshops.edit', compact('event'));
    }

    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function view(UniversityEvent $event): View|Factory|RedirectResponse|Application
    {
        return view('pages.university-events.workshops.view', compact('event'));
    }
}
