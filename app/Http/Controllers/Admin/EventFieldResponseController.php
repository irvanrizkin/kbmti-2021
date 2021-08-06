<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventFieldResponseRequest;
use App\Http\Requests\StoreEventFieldResponseRequest;
use App\Http\Requests\UpdateEventFieldResponseRequest;
use App\Models\EventField;
use App\Models\EventFieldResponse;
use App\Models\EventRegistration;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventFieldResponseController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('event_field_response_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventFieldResponses = EventFieldResponse::with(['event_registration', 'event_field'])->get();

        $event_registrations = EventRegistration::get();

        $event_fields = EventField::get();

        return view('admin.eventFieldResponses.index', compact('eventFieldResponses', 'event_registrations', 'event_fields'));
    }

    public function create()
    {
        abort_if(Gate::denies('event_field_response_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event_registrations = EventRegistration::all()->pluck('dummy_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $event_fields = EventField::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.eventFieldResponses.create', compact('event_registrations', 'event_fields'));
    }

    public function store(StoreEventFieldResponseRequest $request)
    {
        $eventFieldResponse = EventFieldResponse::create($request->all());

        return redirect()->route('admin.event-field-responses.index');
    }

    public function edit(EventFieldResponse $eventFieldResponse)
    {
        abort_if(Gate::denies('event_field_response_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event_registrations = EventRegistration::all()->pluck('dummy_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $event_fields = EventField::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $eventFieldResponse->load('event_registration', 'event_field');

        return view('admin.eventFieldResponses.edit', compact('event_registrations', 'event_fields', 'eventFieldResponse'));
    }

    public function update(UpdateEventFieldResponseRequest $request, EventFieldResponse $eventFieldResponse)
    {
        $eventFieldResponse->update($request->all());

        return redirect()->route('admin.event-field-responses.index');
    }

    public function show(EventFieldResponse $eventFieldResponse)
    {
        abort_if(Gate::denies('event_field_response_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventFieldResponse->load('event_registration', 'event_field');

        return view('admin.eventFieldResponses.show', compact('eventFieldResponse'));
    }

    public function destroy(EventFieldResponse $eventFieldResponse)
    {
        abort_if(Gate::denies('event_field_response_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventFieldResponse->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventFieldResponseRequest $request)
    {
        EventFieldResponse::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
