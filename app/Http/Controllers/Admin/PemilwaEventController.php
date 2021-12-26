<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPemilwaEventRequest;
use App\Http\Requests\StorePemilwaEventRequest;
use App\Http\Requests\UpdatePemilwaEventRequest;
use App\Models\PemilwaEvent;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PemilwaEventController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('pemilwa_event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilwaEvents = PemilwaEvent::all();

        return view('admin.pemilwaEvents.index', compact('pemilwaEvents'));
    }

    public function create()
    {
        abort_if(Gate::denies('pemilwa_event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pemilwaEvents.create');
    }

    public function store(StorePemilwaEventRequest $request)
    {
        $pemilwaEvent = PemilwaEvent::create($request->all());

        return redirect()->route('admin.pemilwa-events.index');
    }

    public function edit(PemilwaEvent $pemilwaEvent)
    {
        abort_if(Gate::denies('pemilwa_event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.pemilwaEvents.edit', compact('pemilwaEvent'));
    }

    public function update(UpdatePemilwaEventRequest $request, PemilwaEvent $pemilwaEvent)
    {
        $pemilwaEvent->update($request->all());

        return redirect()->route('admin.pemilwa-events.index');
    }

    public function show(PemilwaEvent $pemilwaEvent)
    {
        abort_if(Gate::denies('pemilwa_event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        
        return view('admin.pemilwaEvents.show', compact('pemilwaEvent'));
    }

    public function destroy(PemilwaEvent $pemilwaEvent)
    {
        abort_if(Gate::denies('pemilwa_event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pemilwaEvent->delete();

        return back();
    }

    public function massDestroy(MassDestroyPemilwaEventRequest $request)
    {
        PemilwaEvent::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
