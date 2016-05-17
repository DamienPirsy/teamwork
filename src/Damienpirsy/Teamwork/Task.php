<?php  
namespace Damienpirsy\Teamwork;

use Damienpirsy\Teamwork\Traits\TimeTrait;
use Damienpirsy\Teamwork\Traits\TagsTrait;

class Task extends AbstractObject {

    use TimeTrait, TagsTrait;

    protected $wrapper  = 'task';

    protected $endpoint = 'tasks';

    /**
     * Get All Tasks
     * GET /tasks.json
     *
     * @param null $args
     *
     * @return mixed
     */
    public function all($args = null)
    {
        $this->areArgumentsValid($args, ['filter', 'page', 'pageSize', 'startdate', 'enddate', 'updatedAfterDate', 'completedAfterDate', 'completedBeforeDate', 'showDeleted', 'includeCompletedTasks', 'includeCompletedSubtasks', 'creator-ids', 'include', 'responsible-party-ids', 'sort', 'getSubTasks', 'nestSubTasks', 'getFiles', 'dataSet', 'includeToday', 'ignore-start-date']);

        return $this->client->get($this->endpoint, $args)->response();
    }

    /**
     * Get All Tasks
     * GET /tasks.json
     *
     * @param null $args
     *
     * @return mixed
     */
    public function find($args = null)
    {
        $this->areArgumentsValid($args, ['nestSubTasks', 'getFiles', 'includeCompletedSubtasks']);
        return $this->client->get($this->endpoint, $args)->response();
    }

    /**
     * DELETE /tasks/{$id}.json
     * @return mixed
     */
    public function delete()
    {
        return $this->client->delete("$this->endpoint/$this->id")->response();
    }

    /**
     * Edit A Task
     * PUT tasks/{id}.json
     *
     * @return mixed
     */
    public function update($args)
    {
        return $this->client->put("$this->endpoint/$this->id", ['todo-item' => $args])->response();
    }    

    /**
     * Complete A Task
     * PUT tasks/{id}/complete.json
     *
     * @return mixed
     */
    public function complete()
    {
        return $this->client->put("$this->endpoint/$this->id/complete", [])->response();
    }

    /**
     * Uncomplete A Task
     * PUT tasks/{id}/uncomplete.json
     *
     * @return mixed
     */
    public function uncomplete()
    {
        return $this->client->put("$this->endpoint/$this->id/uncomplete", [])->response();
    }

    /**
     * Get all reminders on a task
     * GET /tasks/:id/reminders.json
     * @return array
     */
    public function reminders()
    {
        return $this->client->get("$this->endpoint/$this->id/reminders")->response();
    }

    /**
     * Create a reminder on a task
     * POST /tasks/:id/reminders.json
     * @return array
     */
    public function setReminders($data)
    {
        return $this->client->post("$this->endpoint/$this->id/reminders", ['reminder' => $data])->response();
    }

    /**
     * Updates a reminder on a task
     * PUT /tasks/:id/reminders/:id.json
     * @return array
     */
    public function updateReminder($id, $data)
    {
        return $this->client->put("$this->endpoint/$this->id/reminders/$id", ['reminder' => $data])->response();
    }

    /**
     * Deletes a reminder on a task
     * DELETE /tasks/:id/reminders/:id.json
     * @return array
     */
    public function deleteReminder($id)
    {
        return $this->client->delete("$this->endpoint/$this->id/reminders/$id")->response();
    }
}