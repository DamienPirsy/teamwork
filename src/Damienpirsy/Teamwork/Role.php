<?php  
namespace Damienpirsy\Teamwork; 

class Role extends AbstractObject {

    protected $wrapper  = 'role';
    protected $endpoint = 'roles';

    /**
     * @param  array $data
     * @return mixed
     */
    public function update($data)
    {
        return $this->client->put("$this->endpoint/$this->id", [$this->wrapper => $data])->response();
    }

    /**
     * @return mixed
     */
    public function delete()
    {
        return $this->client->delete("$this->endpoint/$this->id")->response();
    }
}