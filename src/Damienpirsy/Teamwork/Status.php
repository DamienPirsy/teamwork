<?php  
namespace Damienpirsy\Teamwork; 

class Status extends AbstractObject {

    protected $wrapper  = 'userstatus';
    protected $endpoint = 'people';
    protected $me = 'me';

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->client->get("$this->endpoint/status")->response();
    }

    /**
     * Retrieves my status
     * @return array
     */
    public function mine()
    {
        return $this->client->get("$this->me/status")->response();
    }

    /**
     * Retrieves the status of the person
     * @param  int $id
     * @return array
     */
    public function persons($id)
    {
        return $this->client->get("$this->endpoint/$id/status")->response();
    }

    /**
     * @param  int $id
     * @param  array $data
     * @return mixed
     */
    public function createPersons($id, $data)
    {
        return $this->client->post("$this->endpoint/$id/status", [$this->wrapper => $data])->response();
    }

    /**
     * @param  array $data
     * @return mixed
     */
    public function createMine($data)
    {
        return $this->client->post("$this->me/status", [$this->wrapper => $data])->response();
    }


    /**
     * @param  array $data
     * @return mixed
     */
    public function update($data)
    {
        return $this->client->put("$this->endpoint/$this->id", [$this->wrapper => $data])->response();
    }

    /**
     * Update my status
     * @param  array $data
     * @return array
     */
    public function updateMine($data)
    {
        return $this->client->put("$this->me/status/$this->id", [$this->wrapper => $data])->response();
    }

    /**
     * Update the status of the person
     * @param  int $id
     * @param  array $data
     * @return array
     */
    public function updatePersons($id, $data)
    {
        return $this->client->put("$this->endpoint/$id/status/$this->id", [$this->wrapper => $data])->response();
    }

    /**
     * @return mixed
     */
    public function delete()
    {
        return $this->client->delete("$this->endpoint/status/$this->id")->response();
    }

    /**
     * Delete my status
     * @return array
     */
    public function deleteMine()
    {
        return $this->client->delete("$this->me/status/$this->id")->response();
    }

    /**
     * Deletes the status of the person
     * @param  int $id
     * @return array
     */
    public function deletePersons($id)
    {
        return $this->client->delete("$this->endpoint/$id/status/$this->id", [$this->wrapper => $data])->response();
    }

}