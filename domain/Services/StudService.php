<?php
namespace domain\Services;

use App\Models\studs;
use infrastructure\Facades\ImagesFacade;



class StudService
{
    protected $task;
    public function __construct()
    {
        $this->task = new studs();
    }
    public function get($task_id)
    {
        return $this->task->find($task_id);
    }



    public function all()
    {
        return $this->task->all();
    }
    public function store($data)
    {
        if(isset($data['images'])){
            $image = ImagesFacade::store($data['images'],[1,2,3,4,5]);
            $data['image_id'] = $image['created_images']->id;
        }
        $this->task->create($data);
    }
    public function delete($task_id)
    {
        $task = $this->task->find($task_id);
        $task->delete();
    }
    public function status($task_id)
    {
        $task = $this->task->find($task_id);
        if($task->status == 0){
            $task->status = 1;
            $task->update();
        }
        else{
            $task->status = 0;
            $task->update();
        }
    }
    public function update(array $data, $task_id)
    {
        $task = $this->task->find($task_id);
        $task->update($this->edit($task, $data));
    }
    protected function edit(Studs $task, $data)
    {
        return array_merge($task->toArray(), $data);
    }
}
