<?php  
namespace Damienpirsy\Teamwork;

use Damienpirsy\Teamwork\Traits\RestfulTrait;
use Damienpirsy\Teamwork\Traits\TagsTrait;

class Links extends AbstractObject {

    use RestfulTrait, TagsTrait;

    protected $wrapper  = 'link';

    protected $endpoint = 'links';

    /**
     * Create Message
     * POST /projects/{project_id}/links.json
     *
     * The RestfulTrait must be overwritten because messages
     * require a project to be associated with.
     *
     * $teamwork->message($projectID)->create([$data]);
     *
     * @retun mixed
     */
    public function create($data)
    {
        return $this->client->post("projects/$this->id/links", [$this->wrapper => $data])->response();
    }
}