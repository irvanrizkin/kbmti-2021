<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventFieldChoiceRequest;
use App\Http\Requests\StoreEventFieldChoiceRequest;
use App\Http\Requests\UpdateEventFieldChoiceRequest;
use App\Models\EventField;
use App\Models\EventFieldChoice;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventFieldChoiceController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('event_field_choice_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventFieldChoices = EventFieldChoice::with(['event_field'])->get();

        return view('admin.eventFieldChoices.index', compact('eventFieldChoices'));
    }

    public function create()
    {
        abort_if(Gate::denies('event_field_choice_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event_fields = EventField::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.eventFieldChoices.create', compact('event_fields'));
    }

    public function store(StoreEventFieldChoiceRequest $request)
    {
        $eventFieldChoice = EventFieldChoice::create($request->all());

        return redirect()->route('admin.event-field-choices.index');
    }

    public function edit(EventFieldChoice $eventFieldChoice)
    {
        abort_if(Gate::denies('event_field_choice_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $event_fields = EventField::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $eventFieldChoice->load('event_field');

        return view('admin.eventFieldChoices.edit', compact('event_fields', 'eventFieldChoice'));
    }

    public function update(UpdateEventFieldChoiceRequest $request, EventFieldChoice $eventFieldChoice)
    {
        $eventFieldChoice->update($request->all());

        return redirect()->route('admin.event-field-choices.index');
    }

    public function show(EventFieldChoice $eventFieldChoice)
    {
        abort_if(Gate::denies('event_field_choice_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventFieldChoice->load('event_field');

        return view('admin.eventFieldChoices.show', compact('eventFieldChoice'));
    }

    public function destroy(EventFieldChoice $eventFieldChoice)
    {
        abort_if(Gate::denies('event_field_choice_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventFieldChoice->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventFieldChoiceRequest $request)
    {
        EventFieldChoice::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
