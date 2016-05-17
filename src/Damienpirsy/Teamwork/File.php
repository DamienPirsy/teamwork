<?php  
namespace Damienpirsy\Teamwork;

use Damienpirsy\Teamwork\Traits\TagsTrait;

class File extends AbstractObject {

    use TagsTrait;
    
    protected $wrapper  = 'fileversion';
    protected $endpoint = 'files';

    /**
     * Retrives info for the given file ID
     * GET /files/{id}.json
     * @return array
     */
    public function find()
    {
        return $this->client->get("$this->endpoint/$this->id", [])->response();
    }

    /**
     * This call adds a new file version to an existing file.
     * POST /files/{id}.json
     * @param  array $args
     * @return array
     */
    public function createVersion($args)
    {
        $this->areArgumentsValid($args, ['pendingFileRef', 'description']);
        return $this->client->post("$this->endpoint/$this->id", $args)->response();
    }

    /**
     * DELETE /files/{id}.json
     * @return array
     */
    public function delete()
    {
        return $this->client->delete("$this->endpoint/$this->id")->response();
    }    
}