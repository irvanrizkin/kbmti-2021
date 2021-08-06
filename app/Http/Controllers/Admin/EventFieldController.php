<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventFieldRequest;
use App\Http\Requests\StoreEventFieldRequest;
use App\Http\Requests\UpdateEventFieldRequest;
use App\Models\Event;
use App\Models\EventField;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventFieldController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('event_field_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventFields = EventField::with(['event'])->get();

        $events = Event::get();

        return view('admin.eventFields.index', compact('eventFields', 'events'));
    }

    public function create()
    {
        abort_if(Gate::denies('event_field_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = Event::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.eventFields.create', compact('events'));
    }

    public function store(StoreEventFieldRequest $request)
    {
        $eventField = EventField::create($request->all());

        return redirect()->route('admin.event-fields.index');
    }

    public function edit(EventField $eventField)
    {
        abort_if(Gate::denies('event_field_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = Event::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $eventField->load('event');

        return view('admin.eventFields.edit', compact('events', 'eventField'));
    }

    public function update(UpdateEventFieldRequest $request, EventField $eventField)
    {
        $eventField->update($request->all());

        return redirect()->route('admin.event-fields.index');
    }

    public function show(EventField $eventField)
    {
        abort_if(Gate::denies('event_field_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventField->load('event');

        return view('admin.eventFields.show', compact('eventField'));
    }

    public function destroy(EventField $eventField)
    {
        abort_if(Gate::denies('event_field_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventField->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventFieldRequest $request)
    {
        EventField::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
