<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ task.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <inertia-link class="mr-5 bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-7 rounded-lg" :href="route('tasks')" tabindex="-1">
                                Go back
                        </inertia-link>
                        <!-- <input type="text" name="addComment-{{ $post->id }}" placeholder="Add your comment" class="form-control" v-bind="comment"> -->
                    </div>
                    <form @submit.prevent="update">
                    <table class="">
                        <tr class="text-left font-bold">
                            <th class="px-6 pt-6 pb-4"><input v-model="form.name" :error="form.errors.name" class="pr-6 pb-8 w-full lg:w-1/2" label="Name" /></th>
                            <th class="px-6 pt-6 pb-4"><textarea v-model="form.body" :error="form.errors.body" class="pr-6 pb-8 w-full border-0 hover:border-0" label="Body" /></th>
                            <th class="px-6 pt-6 pb-4">
                                <select v-model="form.priority" :error="form.errors.priority" class="pr-6 pb-8 w-full border-0 hover:border-0" label="Priority">
                                    <option value="Low">Low</option>
                                    <option value="Medium">Medium</option>
                                    <option value="High">High</option>
                                </select>
                            </th>
                            <th class="px-6 pt-6 pb-4">
                                <select v-model="form.done" :error="form.errors.done" class="pr-6 pb-8 w-full border-0 hover:border-0" label="Done">
                                    <option value="0" selected>Not Yet</option>
                                    <option value="1">Done</option>
                                </select>
                            </th>
                            <th class="px-6 pt-6 pb-4"><button class="mr-5 bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-7 rounded-lg" type="submit">Submit</button></th>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
        props: {
            task: Object,
        },
        remember: 'form',
        data() {
            return {
            form: this.$inertia.form({
                name: this.task.name,
                body: this.task.body,
                priority: this.task.priority,
                done: this.task.done,
            }),
            }
        },
        methods: {
            update() {
                this.form.put(this.route('tasks.update', this.task.id))
            },
            destroy() {
                if (confirm('Are you sure you want to delete this task?')) {
                    this.$inertia.delete(this.route('tasks.destroy', this.task.id))
                }
            },
        },
    }
</script>
