<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Repositories\EventRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class EventController extends BaseController
{
    public $repository;

    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $books = $this->repository->listEvents($request);

        return $this->successResponse($books, 'Data retrieved successfully', Response::HTTP_OK);
    }

    public function store(StoreEventRequest $request)
    {
        $params = $request->all();

        $event = $this->repository->createEvent($params);

        if (!$event) {
            return $this->errorResponse('There is some issue while creating event', Response::HTTP_BAD_REQUEST);
        }

        return $this->successResponse($event, 'Event created successfully', Response::HTTP_OK);
    }

    public function show($id)
    {
        $event = $this->repository->findEventById($id);

        if (!$event) {
            return $this->errorResponse('There is some issue while creating event', Response::HTTP_BAD_REQUEST);
        }

        return $this->successResponse($event, 'Event Fetched.', Response::HTTP_OK);
    }

    public function update(UpdateEventRequest $request, $id)
    {
        $params = $request->all();

        $event = $this->repository->updateEvent($params, $id);

        if (!$event) {
            return $this->errorResponse('There is some issue while creating event', Response::HTTP_BAD_REQUEST);
        }

        return $this->successResponse($event, 'Event Updated Successfully.', Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $this->repository->deleteEvent($id);

        return $this->successResponse(null, 'Book deleted successfully.');
    }
}
