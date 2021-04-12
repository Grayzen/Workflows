<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tasks
            </h2>
        </template>

        <body class="flex items-center justify-center">
            <div class="container max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="p-6 bg-white border-b border-gray-200 bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5"
                >
                    <inertia-link
                        class="mr-5 bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-7 rounded-lg"
                        :href="route('tasks.create')"
                        :active="route().current('tasks.create')"
                    >
                        Add New Task
                    </inertia-link>

                    <inertia-link
                        class="mr-5 bg-green-600 hover:bg-green-700 text-white font-bold py-3 px-7 rounded-lg"
                        :href="route('tasks')"
                        :active="route().current('tasks')"
                    >
                        Go Back
                    </inertia-link>
                    <!-- <input type="text" name="addComment-{{ $post->id }}" placeholder="Add your comment" class="form-control" v-bind="comment"> -->
                </div>
                <table
                    class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5"
                >
                    <thead class="text-black text-center">
                        <tr
                            v-for="task in tasks"
                            :key="task.id"
                            class="bg-indigo-100 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0"
                        >
                            <th class="py-5">Task Name</th>
                            <th class="py-5">Task Subject</th>
                            <th class="py-5">Task Priority</th>
                        </tr>
                    </thead>
                    <tbody class="flex-1 sm:flex-none">
                        <tr
                            v-for="task in tasks"
                            :key="task.id"
                            class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0"
                        >
                            <td
                                class="border-grey-light border hover:bg-gray-100 p-3"
                            >
                                <inertia-link
                                    class="px-6 py-2 flex items-center focus:text-indigo-500"
                                    :href="route('tasks.edit', task.id)"
                                >
                                    {{ task.name }}
                                </inertia-link>
                            </td>
                            <td
                                class="border-grey-light border hover:bg-gray-100 p-3 truncate"
                            >
                                <inertia-link
                                    class="px-6 py-2 flex items-center focus:text-indigo-500"
                                    :href="route('tasks.edit', task.id)"
                                >
                                    {{ task.body }}
                                </inertia-link>
                            </td>
                            <td
                                class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer"
                            >
                                <inertia-link
                                    class="px-6 py-2 flex items-center focus:text-indigo-500"
                                    :href="route('tasks.edit', task.id)"
                                >
                                    {{ task.priority }}
                                </inertia-link>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
        </body>

        
    </app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";

export default {
    components: {
        AppLayout,
    },
    props: {
        tasks: Object,
    },
};
</script>

<style>
html,
body {
    height: 100%;
}

@media (min-width: 640px) {
    table {
        display: inline-table !important;
    }

    thead tr:not(:first-child) {
        display: none;
    }
}

td:not(:last-child) {
    border-bottom: 0;
}

th:not(:last-child) {
    border-bottom: 2px solid rgba(0, 0, 0, 0.1);
}
</style>
