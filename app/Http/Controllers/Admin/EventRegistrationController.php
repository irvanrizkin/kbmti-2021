<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEventRegistrationRequest;
use App\Http\Requests\StoreEventRegistrationRequest;
use App\Http\Requests\UpdateEventRegistrationRequest;
use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\EventFieldResponse;
use Carbon\Carbon;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventRegistrationController extends Controller
{

    // Local variable
    private $credentialsFields = ['name', 'nim', 'email'];
    private $arrayedFields = ['organisasi', 'kepanitiaan', 'tahun_organisasi', 'tahun_kepanitiaan'];
    // Rencana arrayed fields akan ditambahi dengan swot

    public function index()
    {
        abort_if(Gate::denies('event_registration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventRegistrations = EventRegistration::with(['event'])->get();

        $events = Event::get();

        return view('admin.eventRegistrations.index', compact('eventRegistrations', 'events'));
    }

    public function create()
    {
        abort_if(Gate::denies('event_registration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = Event::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.eventRegistrations.create', compact('events'));
    }

    public function customCreate($eventId)
    {
        abort_if(Gate::denies('event_registration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $event = Event::firstWhere('id', $eventId);
        if ($event->event_type == 'Open Tender' || $event->event_type == 'Kepanitiaan') {
            return view('admin/eventRegistrations/custom-add-panitia', compact('event'));
        }

        return view('admin/eventRegistrations/custom-add-normal-event', compact('event'));
    }

    public function store(StoreEventRegistrationRequest $request)
    {
        $eventRegistration = EventRegistration::create($request->all());

        return redirect()->route('admin.event-registrations.index');
    }

    public function customStore(Request $request)
    {
        
        $event = Event::firstWhere('id', $request->event_id);
        $newRegistrationItem = EventRegistration::create([
            'event_id' => $event->id
        ]);
        try {
            $queueResponse = [];
            for ($i = 0; $i < count($event->eventFields); $i++) {
                $field = $event->eventFields[$i];
                $fieldName = $field->name;

                // Better approachment. There are some concern as to why doesn't use switch

                // Credential Fields
                if (in_array($fieldName, $this->credentialsFields)) {
                    $this->handlingCredentialFields($request->$fieldName, $field->id);
                }

                // Arrayed Fiedls
                if (in_array(strtolower($fieldName), $this->arrayedFields)) {
                    $lowerCaseField = strtolower($fieldName);
                    $items = $request->$lowerCaseField;
                    $itemResponse = $this->handlingArrayedFields($items, $newRegistrationItem->id, $field->id);
                    array_push($queueResponse, $itemResponse);
                    continue;
                }

                // File
                if ($fieldName == 'Pemberkasan') {
                    $itemResponse = $this->handlingStoringFiles($request, $newRegistrationItem->id, $field->id);
                    array_push($queueResponse, $itemResponse);
                    continue;
                }

                // Default
                $itemResponse = [
                    'response' => $request->$fieldName,
                    'event_registration_id' => $newRegistrationItem->id,
                    'event_field_id' => $field->id,
                ];
                array_push($queueResponse, $itemResponse);
            }

            $this->queueResolver($queueResponse);

        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage()
            ]);
        }

        return redirect()->route('admin.events.show', $event->id);
    }

    public function edit(EventRegistration $eventRegistration)
    {
        abort_if(Gate::denies('event_registration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $events = Event::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $eventRegistration->load('event');

        return view('admin.eventRegistrations.edit', compact('events', 'eventRegistration'));
    }

    public function update(UpdateEventRegistrationRequest $request, EventRegistration $eventRegistration)
    {
        $eventRegistration->update($request->all());

        return redirect()->route('admin.event-registrations.index');
    }

    public function show(EventRegistration $eventRegistration)
    {
        abort_if(Gate::denies('event_registration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $eventRegistration->load('event');

        return view('admin.eventRegistrations.show', compact('eventRegistration'));
    }

    public function destroy(EventRegistration $eventRegistration)
    {
        abort_if(Gate::denies('event_registration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $eventRegistration->delete();

        return back();
    }

    public function massDestroy(MassDestroyEventRegistrationRequest $request)
    {
        EventRegistration::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    // Handling credential
    private function handlingCredentialFields($response, $fieldId)
    {
        $isAlreadyExist = EventFieldResponse::where('response', $response)
            ->where('event_field_id', $fieldId)
            ->exists();
        if ($isAlreadyExist) {
            return response()->json([
                'success' => false,
                'message' => "Sudah Terdaftar"
            ]);
        }
    }

    // Handling arrayedfields
    private function handlingArrayedFields($items, $newRegistrationItemId, $fieldId)
    {
        for ($j = 0; $j < count($items); $j++) {
            $item = [
                'response' => $items[$j],
                'event_registration_id' => $newRegistrationItemId,
                'event_field_id' => $fieldId
            ];
        }
        return $item;
    }

    // Handling Storing Files
    private function handlingStoringFiles($requestItem, $newRegistrationItemId, $fieldId)
    {
        $itemName = Carbon::now() . '.' . $requestItem->pemberkasan->extension();
        $requestItem->pemberkasan->storeAs('rar/pemberkasan/', $itemName);
        $itemResponse = [
            'response' => $itemName,
            'event_registration_id' => $newRegistrationItemId,
            'event_field_id' => $fieldId
        ];
        return $itemResponse;
    }

    // Handle the queue
    private function queueResolver($array)
    {
        foreach ($array as $item) {
            EventFieldResponse::create($item)->save();
        }
    }

    // Handle Downloading file from storage
    public function downloadPemberkasan($itemPath){
        return response()->download(storage_path('app/rar/pemberkasan/' . $itemPath));
    }
}
