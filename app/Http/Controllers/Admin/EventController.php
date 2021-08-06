<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventRequest;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Event;
use App\Models\User;
use App\Models\EventField;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('event_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = Event::with(['user'])->get();

        $users = User::get();

        return view('admin.events.index', compact('events', 'users'));
    }

    public function create()
    {
        abort_if(Gate::denies('event_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.events.create', compact('users'));
    }

    public function store(StoreEventRequest $request)
    {
        $event = Event::create([
            'name' => $request->name,
            'label' => $request->label,
            'description' => $request->description,
            'event_type' => $request->event_type,
            'expired_date' => $request->expired_date,
            'user_id' => $request->user_id
        ]);

        foreach ($request->field as $field) {
            switch ($field) {
                case 'email':
                    $fieldTypes = 'email';
                    break;

                case 'Angkatan':
                    $fieldTypes = 'dropdown';
                    break;

                case 'Nomor Telepon':
                    $fieldTypes = 'number';
                    break;

                case 'Inovasi':
                    $fieldTypes = 'textarea';
                    break;

                    // Case khusus ketika data itu punyanya Kepanitiaan
                case ($field == 'Organisasi' || $field == 'Kepanitiaan'):
                    // Karena akan dihandle oleh yang lain
                        continue 2;
                    break;
                case ($field == 'Inovasi' || $field == 'Swot'):
                    // Karena akan dihandle oleh yang lain
                    $fieldTypes = 'textarea';
                    break;

                default:
                    $fieldTypes = 'text';
                    break;
            }
            EventField::create([
                'name' => str_replace(' ', '_', $field),
                'type' => $fieldTypes,
                'event_id' => $event->id
            ])->save();
        }

        // Instance Field Tambahan
        if ($request->event_type == 'OPEN_TENDER' || $request->event_type == 'KEPANITIAAN') {
            $fields = [
                [
                    'name' => 'Organisasi',
                    'type' => 'text',
                ],
                [
                    'name' => 'Kepanitiaan',
                    'type' => 'text',
                ],
                [
                    'name' => 'Tahun_Organisasi',
                    'type' => 'text',
                ],
                [
                    'name' => 'Tahun_Kepanitiaan',
                    'type' => 'text',
                ],
                [
                    'name' => 'Pemberkasan',
                    'type' => 'text',
                ]
            ];
            foreach ($fields as $field) {
                $this->EventFieldAdd($field['name'], $field['type'], $event->id);
            }
        }

        $event->save();

        return redirect()->route('admin.events.index');
    }

    public function edit(Event $event)
    {
        abort_if(Gate::denies('event_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $event->load('user');

        return view('admin.events.edit', compact('users', 'event'));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->all());

        return redirect()->route('admin.events.index');
    }

    public function show(Event $event)
    {
        abort_if(Gate::denies('event_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($event->event_type == 'Open Tender' || $event->event_type == "Kepanitiaan") {
            $allowed_prefixes = $event->event_type == 'OPEN_TENDER' ? "open-tender" : "pendaftaran-kepanitiaan";
            return view('admin/events/show-detail-panitia', compact('event', 'allowed_prefixes'));
        }
        
        return view('admin/events/show-detail-normal-event', compact('event'));
    }

    public function destroy(Event $event)
    {
        abort_if(Gate::denies('event_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        EventField::where('event_id', $event->id)->delete();
        $event->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventRequest $request)
    {
        Event::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    // Helper Function for EventFieldAdd
    private function EventFieldAdd($name, $type, $event_id)
    {
        EventField::create([
            'name' => $name,
            'type' => $type,
            'event_id' => $event_id
        ]);
    }
}
