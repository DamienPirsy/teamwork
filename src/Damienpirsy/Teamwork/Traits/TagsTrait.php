<?php  
namespace Damienpirsy\Teamwork\Traits; 

trait TagsTrait {

    /**
     * Time Entries
     * GET /projects/{id}/time_entries.json
     *
     * @return mixed
     */
    public function tags()
    {
        return $this->client->get("$this->endpoint/$this->id/tags")->response();
    }

    /**
     * Create Time Entry
     * POST /projects/{id}/time_entries.json
     *
     * @param $data
     *
     * @return mixed
     */
    public function updateTags($data)
    {
        return $this->client->post("$this->endpoint/$this->id/tags", ['tags' => $data])->response();
    }

}