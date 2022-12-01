<template>
 <AppLayout>
    <template #content>
        <div class="container">

<div class="row">
    <div class="col-lg-12 text-center">
        <h1 class="page-title">Student List</h1>
    </div>
    <div class="col-lg-12 mt-5">
        <form @submit.prevent="taskStore" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <input class="form-control" name="name" v-model="stud_form.name" type="text" placeholder="Enter Student's Name" required> <br>
                        <input class="form-control" name="age" v-model="stud_form.age" type="text" placeholder="Enter Student's Age" required> <br>
                        <label for=""> Input Your picture to Upload</label><br>
                        <input class="form-control" name="images" @input="stud_form.image_id = $event.target.files[0]" e type="file"  accept="image/jpg, image/jpeg, image/png" > <br>
                    </div>
                </div>
                <div class="col-lg-4">
                    <button type="submit"  class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        </div>
        <div class="col-lg-12 mt-5">
            <div>
                <table class="table table-striped">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Stu. Name</th>
                        <th scope="col">Stu. Image</th>
                        <th scope="col">Stu. Age</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <tr v-for ="(task, key) in task_list">
                            <th scope="row">{{ ++key }}</th>
                            <td>{{ task.name }}</td>
                            <td>
                               <img src="{{ config('images,access_path') }}/{{ task->studs->image_id}}" alt="" width="100px">
                                </td>
                            <td>{{ task.age }}</td>
                            <td><span v-if="task.status == 1" class="badge bg-success">Active</span>
                                    <span v-else class="badge bg-danger">Inactive</span>
                            </td>
                            <td>
                                <button type="button" @click.prevent="editTask(task.id)"
                                class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></button> &nbsp;

                                <button v-if="task.status == 1" type="button" @click.prevent="statusTask(task.id)"
                                class="btn btn-warning"><i class="fa-solid fa-user-slash"></i></button>
                                <button v-if="task.status == 0" type="button" @click.prevent="statusTask(task.id)"
                                class="btn btn-success"><i class="fa-solid fa-user"></i></button> &nbsp;

                                <button type="button" @click.prevent="deleteTask(task.id)"
                                class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>


                            </td>
                          </tr>

                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
    </template>
    <template #modals>
<!-- Modal -->
<div class="modal fade" id="taskEdit" data-bs-backdrop="static" data-bs-keyboard="false"
 tabindex="-1" aria-labelledby="taskEditLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="taskEditLabel">Edit Student</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"  id="taskEditContent">
            <form @submit.prevent="taskUpdate">
            <div class="row">
                <div class="col-lg-8">
                    <div class="form-group">
                        <input class="form-control" name="name" v-model="task_update_form.name"
                         type="text" placeholder="Enter Student's Name" required> <br>
                        <input class="form-control" name="age" v-model="task_update_form.age"
                         type="text" placeholder="Enter Student's Age" required> <br>
                        <!-- <input class="form-control" name="images" type="file"  accept="image/jpg, image/jpeg, image/png" > <br> -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <button type="submit"  class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
    </template>
</AppLayout>
</template>
<script>
import AppLayout from '@/Layouts/App.vue'
import { computed } from '@vue/runtime-core'
import { usePage } from '@inertiajs/inertia-vue3';
import axios from 'axios';


export default {
    components:{
        AppLayout
    },
    data () {
        return {
            stud_form: {
                name:'',
                age:'',
                image_id:'',
            },
            task_update_form:{
                name:'',
                age:'',
                image_id:'',
            },
            task_list: []
        }
     },
     beforeMount() {
        this.getTasks();
     },

    methods:{
        async getTasks(){
            const tasks = (await axios.get(route('stud.list'))).data
            this.task_list = tasks

        },
        async taskStore () {
            await axios.post(route('stud.store'),this.stud_form)
            this.getTasks();

            this.stud_form.name = ''
            this.stud_form.age = ''

         },
         async deleteTask(id){
            await axios.get(route('stud.delete',id))
            this.getTasks();
         },
         async statusTask(id){
            await axios.get(route('stud.status',id))
            this.getTasks();
         },
         async editTask(id){
            const task = (await axios.get(route('stud.get',id))).data
            this.task_update_form = task
            $('#taskEdit').modal('show')
         },
         async taskUpdate(){
            await axios.post(route('stud.update',this.task_update_form.id),this.task_update_form)
            this.getTasks();
            $('#taskEdit').modal('hide')
         },

    }
}
</script>

<style lang="css" scoped>
.page-title {
        font-size: 28px;
        font-weight: bold;
        padding-top: 5vh;
        }
</style>
