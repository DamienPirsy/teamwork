<?php  
namespace Damienpirsy\Teamwork;

use Damienpirsy\Teamwork\Traits\TimeTrait;
use Damienpirsy\Teamwork\Traits\RestfulTrait;
use Damienpirsy\Teamwork\Traits\TagsTrait;

class Project extends AbstractObject {

    use RestfulTrait, TimeTrait, TagsTrait;

    protected $wrapper  = 'project';

    protected $endpoint = 'projects';


    /**
     * Get All projects
     * GET /projects.json
     *
     * @return  mixed
     */
    public function all($args = null)
    {
        $this->areArgumentsValid($args, ['status', 'updatedAfterDate', 'updatedAfterTime', 'orderby', 'createdAfterDate', 'createdAfterTime', 'page']);
        return $this->client->get("$this->endpoint", $args)->response();
    }

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
     *  Read project Box folder and access
     *  GET /projects/{id}/box.json
     * @return [type]
     */
    public function box()
    {
        return $this->client->get("$this->endpoint/$this->id/box",[])->response();
    }

    /**
     *  Set project Box folder and access
     *  PUT /projects/{id}/box.json
     */
    public function setBox($data)
    {
        return $this->client->put("$this->endpoint/$this->id/box", ['box' => $data])->response();
    }

    /**
     *  Read project Google Drive folder and access
     *  GET /projects/{id}/googleDrive.json
     * @return [type]
     */
    public function drive()
    {
        return $this->client->get("$this->endpoint/$this->id/googleDrive",[])->response();
    }

    /**
     *  Set project Google Drive folder and access
     *  PUT /projects/{id}/googleDrive
     */
    public function setDrive($data)
    {
        return $this->client->put("$this->endpoint/$this->id/googleDrive", ['google-drive' => $data])->response();        
    }

    /**
     *  List files within a projecr
     *  GET /projects/{id}/files.json
     * @return array
     */
    public function files()
    {
        return $this->client->get("$this->endpoint/$this->id/files",[])->response();
    }

    /**
     * Add a File to a Project 
     * POST /projects/{project_id}/files.json
     * @param  array $data
     * @return array
     */
    public function createFile($data)
    {
        return $this->client->post("$this->endpoint/$this->id/files", ['file' => $data])->response();
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
        $this->areArgumentsValid($args, ['getOverdueCount', 'getCompletedCount', 'status', 'responsible-party-ids']);
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
     *  Update Project Email Address
     *  PUT /projects/{id}/emailaddress.json
     * @return mixed
     */
    public function updateEmailAddress($data)
    {
        return $this->client->put("$this->endpoint/$this->id/emailaddress", ['emailaddress' => $data])->response();
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
        return $this->client->get("$this->endpoint/$this->id/invoices", $args)->response();
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
        return $this->client->get("$this->endpoint/$this->id/expenses", [])->response();
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
        return $this->cliene->get("$this->endpoint/$this->id/risks", [])->response();
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

    /**
     *  Add a new user to a project
     *  POST /projects/{id}/people/{id}.jso
     */
    public function addUser($id)
    {
        return $this->client->post("$this->endpoint/$this->id/people/$id")->response();
    }

    /**
     *  Add/Remove multiple people to/from a project
     *  PUT /projects/{id}/people.json
     * @param  array $data
     * @return array
     */
    public function addRemoveUsers($data)
    {
        return $this->client->post("$this->endpoint/$this->id/people", $data)->response();
    }

    /**
     *  Remove a user from a project
     *  DELETE /projects/{id}/people/{id}.json
     */
    public function removeUser($id)
    {
        return $this->client->delete("$this->endpoint/$this->id/people/$id")->response();
    }

    /**
     *  Get a users permissions on a project
     *  GET /projects/{id}/people/{id}.json
     * @param  int $id
     * @return array
     */
    public function permission($id)
    {
        return $this->client->get("$this->endpoint/$this->id/people/$id")->response();
    }

    /**
     *  Update a users permissions on a project
     *  PUT /projects/{id}/people/{id}.json
     * @param int $id
     */
    public function setPermission($id, $data)
    {
        return $this->client->put("$this->endpoint/$this->id/people/$id", ['permissions' => $data])->response();
    }

    /**
     * List all roles on a project
     * GET /projects/{id}/roles.json
     * @return array
     */
    public function roles()
    {
        return $this->client->get("$this->endpoint/$this->id/roles")->response();
    }

    /**
     *  Add a role to a project
     *  POST /projects/{id}/roles.json
     */
    public function addRole($data)
    {
        return $this->client->post("$this->endpoint/$this->id/roles", [])->response(['role' => $data]);
    }
}
