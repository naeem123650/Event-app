<?php

namespace App\Repositories\Eloquent;

use App\Models\Event;
use App\Repositories\Eloquent\EloquentBaseRepository;
use App\Repositories\EventRepository;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentEventRepository extends EloquentBaseRepository implements EventRepository
{

    protected $model;
    public function __construct(Event $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listEvents($request, string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        try {
            return  $this->model->paginate(5);
        } catch (QueryException $exception) {
            return $exception->getMessage();
        }
    }


    /**
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function findEventById(int $id)
    {
        try {
            return $this->findOneOrFail($id);
        } catch (ModelNotFoundException $e) {
            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return Event|mixed
     */
    public function createEvent(array $params)
    {
        try {
            $collection = collect($params);

            $event = new Event($collection->all());

            $event->save();

            return $event;
        } catch (QueryException $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateEvent(array $params, $id)
    {
        try {
            $event = $this->findEventById($id);

            $collection = collect($params);

            // $mergeCollection = $collection->merge(compact('image', 'published'));

            $event->update($collection->all());

            return $event;
        } catch (QueryException $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function deleteEvent($id)
    {
        try {
            $book = $this->findEventById($id);

            $book->delete();

            return $book;
        } catch (QueryException $exception) {
            return $exception->getMessage();
        }
    }
}
