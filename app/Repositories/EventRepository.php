<?php

namespace App\Repositories;

interface EventRepository
{
    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */
    public function listEvents($request, string $order = 'id', string $sort = 'desc', array $columns = ['*']);

    /**
     * @param int $id
     * @return mixed
     */
    public function findEventById(int $id);

    /**
     * @param array $params
     * @return mixed
     */
    public function createEvent(array $params);

    /**
     * @param array $params
     * @return mixed
     */
    public function updateEvent(array $params, $id);

    /**
     * @param $id
     * @return bool
     */
    public function deleteEvent($id);
}
