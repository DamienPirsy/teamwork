<?php  namespace Rossedman\Teamwork;

use Rossedman\Teamwork\Traits\TimeTrait;
use Rossedman\Teamwork\Traits\RestfulTrait;

class Project extends AbstractObject {

    use RestfulTrait, TimeTrait;

    protected $wrapper  = 'project';

    protected $endpoint = 'projects';

    /**
     * Get Project Activity
     * GET /projects/{project_id}/activity.json
     *
     * @return  mixed
     */
    public function activity($args = null)
    {
        $this->areArgumentsValid($args, ['maxItems']);

        return $this->client->get("$this->endpoint/$this->id/latestActivity", $args)->response();
    }

    /**
     * Get Companies In Project
     * GET /projects/{project_id}/companies.json
     *
     * @retun mixed
     */
    public function companies()
    {
        return $this->client->get("$this->endpoint/$this->id/companies")->response();
    }

    /**
     * Get People On Project
     * GET /projects/{project_id}/people.json
     *
     * @return mixed
     */
    public function people()
    {
        return $this->client->get("$this->endpoint/$this->id/people")->response();
    }

    /**
     * Get Starred Projects
     * GET /projects/starred.json
     *
     * @return mixed
     */
    public function starred()
    {
        return $this->client->get("$this->endpoint/starred")->response();
    }

    /**
     * Star A Project
     * PUT /projects/{$id}/star.json
     *
     * @return mixed
     */
    public function star()
    {
        return $this->client->put("$this->endpoint/$this->id/star", [])->response();
    }

    /**
     * Unstar A Project
     * PUT /projects/{$id}/unstar.json
     *
     * @return mixed
     */
    public function unstar()
    {
        return $this->client->put("$this->endpoint/$this->id/unstar", [])->response();
    }

    /**
     * All Project Links
     * GET /projects/{id}/links.json
     *
     * @return mixed
     */
    public function links()
    {
        return $this->client->get("$this->endpoint/$this->id/links")->response();
    }

    /**
     * Time Totals
     * GET /projects/{id}/time/total.json
     *
     * @return mixed
     */
    public function timeTotal()
    {
        return $this->client->get("$this->endpoint/$this->id/time/total")->response();
    }

    /**
     * Retrieve All Time Entries for a Project
     * GET /projects/{project_id}/time_entries.json
     * 
     * @return mixed
     */
    public function timeEntries($args = null)
    {
        return $this->client->get("$this->endpoint/$this->id/time_entries", $args)->response();
    }

    /**
     * Latest Messages
     * GET /projects/{project_id}/posts.json
     *
     * @return mixed
     */
    public function latestMessages()
    {
        return $this->client->get("$this->endpoint/$this->id/posts")->response();
    }

    /**
     * Archived Messages
     * GET /projects/{project_id}/posts/archive.json
     *
     * @return mixed
     */
    public function archivedMessages()
    {
        return $this->client->get("$this->endpoint/$this->id/posts/archive")->response();
    }

    /**
     * List Milestones
     * GET /projects/{project_id}/milestones.json
     *
     * @param null $args
     *
     * @return mixed
     */
    public function milestones($args = null)
    {
        $this->areArgumentsValid($args, ['getProgress']);

        return $this->client->get("$this->endpoint/$this->id/milestones", $args)->response();
    }

    /**
     * Create milestone associated with this project
     * POST /projects/{project_id}/milestones.json
     *
     * @param $args
     *
     * @return mixed
     */
    public function createMilestone($args) {
        return $this->client->post("$this->endpoint/$this->id/milestones", ['milestone' => $args])->response();
    }

    /**
     * Create tasklist associated with this project
     * POST /projects/{project_id}/tasklists.json
     *
     * @param $args
     *
     * @return mixed
     */
    public function createTasklist($args) {
        return $this->client->post("$this->endpoint/$this->id/tasklists", ['todo-list' => $args])->response();
    }

    /**
     * Tasklists
     * GET /projects/{project_id}/tasklists.json
     *
     * @return [type] [description]
     */
    public function tasklists($args = null)
    {
        $this->areArgumentsValid($args, ['getOverdueCount', 'getCompletedCount', 'status']);
        return $this->client->get("$this->endpoint/$this->id/tasklists", $args)->response();
    }

    /**
     * Emailaddresses
     * GET /projects/{project_id}/emailaddress.json
     *
     * @return [type] [description]
     */
    public function emailAddress($args = null)
    {
        return $this->client->get("$this->endpoint/$this->id/emailaddress", $args)->response();
    }

    /**
     * Get all invoices on a single project
     * GET /projects/{project_id}/invoices
     * @param  mixed $args type -> all|completed|active(default), page
     * @return JSON
     */
    public function invoices($args = null)
    {
        $this->areArgumentsValid($args, ['type', 'page']);        
        return $this->cliente->get("$this->endpoint/$this->id/invoices", $args)->response();
    }

    /**
     * Creates an invoice in the given project
     * POST /projects/{project_id}/invoices.json
     * @return JSON
     */
    public function createInvoice($args)
    {
        return $this->client->post("$this->endpoint/$this->id/invoices", ['invoice' => $args])->response();
    }

    /**
     * Get all invoices on a single project
     * GET /projects/{project_id}/invoices
     * @param  mixed $args type -> all|completed|active(default), page
     * @return JSON
     */
    public function expenses()
    {
        return $this->cliente->get("$this->endpoint/$this->id/expenses", [])->response();
    }

    /**
     * Creates an invoice in the given project
     * POST /projects/{project_id}/invoices.json
     * @return JSON
     */
    public function createExpense($args)
    {
        return $this->client->post("$this->endpoint/$this->id/expenses", ['expense' => $args])->response();
    }

    /**
     * Get all risks associated to the project
     * GET /projects/{project_id}/risks.json 
     * @return JSON
     */
    public function risks()
    {
        return $this->cliente->get("$this->endpoint/$this->id/risks", [])->response();
    }

    /**
     * Tasks
     * GET /projects/{project_id}/tasks.json
     * @param  [type] $args
     * @return [type]
     */
    public function tasks($args = null)
    {
        $this->areArgumentsValid($args, ['filter', 'page', 'pageSize', 'startdate', 'enddate', 'updatedAfterDate', 'completedAfterDate', 'completedBeforeDate', 'showDeleted', 'includeCompletedTasks', 'includeCompletedSubtasks', 'creator-ids', 'include', 'responsible-party-ids', 'sort', 'getSubTasks', 'nestSubTasks', 'getFiles', 'dataSet', 'includeToday', 'ignore-start-date', 'tag-ids']);
        return $this->client->get("$this->endpoint/$this->id/tasks", $args)->response();
    }

}
