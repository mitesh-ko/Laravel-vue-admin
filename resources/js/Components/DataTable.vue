<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import {reactive} from "vue";

const props = defineProps({
    resource: {
        type: Object,
    },
    definition: {
        type: Object
    }
});

// const query = props.definition.columns.map(e => {
//     return {
//         search: {value: '', regex: ''},
//         ...e
//     }
// })
const requestQuery = reactive(props.definition.columns)

const getData = () => {
    axios.get(route('users.index'), requestQuery)
        .then(response => {
            this.responseData = response.data;
        })
        .catch(error => {
            console.error('Error:', error);
        });
}
</script>

<template>
    <fieldset class="min-w-0">
        <div class="flex flex-row flex-wrap sm:flex-nowrap justify-start px-4 sm:px-0">
            <div class="order-2 sm:order-1 mr-2 sm:mr-4"></div>
            <div class="order-4 mr-4 sm:mr-0 sm:order-5">
                <div class="relative">
                    <button class="border bg-gray-100 px-2 py-1 rounded-md">Search</button>
                </div>
            </div>
        </div>
        <div class="flex flex-col mt-3">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow border-b border-gray-200 relative">
                        <table class="min-w-full divide-y divide-gray-200 bg-white">
                            <thead class="bg-gray-50">
                            <tr class="font-medium text-xs uppercase text-left tracking-wider text-gray-500 py-3 px-6">
                                <th v-if="definition.columns[0].data === 'DT_RowIndex'">
                                    <button class="py-3 px-6 w-full">
                                        <span class="flex flex-row items-center justify-between">
                                        <span class="uppercase">ID</span>
                                            <img src="/defaults/down-arrow.svg" alt="down arrow"/>
                                        </span>
                                    </button>
                                </th>
                                <template v-for="(value, key) in definition.columns" :key="key">
                                    <th v-if="value.data !== 'DT_RowIndex'">
                                        <button v-if="value.orderable" class="py-3 px-6 w-full">
                                            <span class="flex flex-row items-center justify-between">
                                            <span class="uppercase">{{ value.data }}</span>
                                                <img src="/defaults/up-arrow.svg" alt="down arrow"/>
                                            </span>
                                        </button>
                                        <button v-else class="py-3 px-6 w-full cursor-default pointer-events-none ml-2"
                                                disabled>
                                            <span class="flex flex-row items-center justify-between">
                                            <span class="uppercase">{{ value.data }}</span></span>
                                        </button>
                                    </th>
                                </template>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-for="(value, key) in resource.original.data" :key="key">
                                <td class="text-sm py-4 px-6 text-gray-500 whitespace-nowrap">{{
                                        value.DT_RowIndex
                                    }}
                                </td>
                                <td class="text-sm py-4 px-6 text-gray-500 whitespace-nowrap">{{ value.name }}</td>
                                <td class="text-sm py-4 px-6 text-gray-500 whitespace-nowrap">
                                    {{ value.email }}
                                </td>
                                <td class="text-sm py-4 px-6 text-gray-500 whitespace-nowrap">
                                    {{ value.created_at }}
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500">
                                    <div class="d-flex">
                                        <template v-for="(value, key) in value.action" :key="key">
                                            <template v-if="key === 'View/Update'">
                                                <PrimaryButton :data-url="value"
                                                               class="bg-gray-100 rounded-md p-2 mx-1 my-1"
                                                               v-html="key"></PrimaryButton>
                                            </template>
                                            <template v-else-if="key === 'Delete'">
                                                <SecondaryButton :data-url="value"
                                                                 class="bg-gray-100 rounded-md p-2 mx-1 my-1"
                                                                 v-html="key"></SecondaryButton>
                                            </template>

                                        </template>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <nav
                            class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                            <div class="flex-1 flex justify-between sm:hidden">
                                <div
                                    class="cursor-not-allowed text-gray-400 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md bg-white">
                                    <img src="/defaults/right-arrow.svg" alt="right arrow" />
                                    <span class="hidden sm:inline ml-2">Previous</span></div>
                                <select name="per_page"
                                        class="block focus:ring-indigo-500 focus:border-indigo-500 min-w-max shadow-sm text-sm border-gray-300 rounded-md">
                                    <option value="8">8 per page</option>
                                    <option value="15">15 per page</option>
                                    <option value="30">30 per page</option>
                                    <option value="50">50 per page</option>
                                    <option value="100">100 per page</option>
                                </select>
                                <a
                                    class="text-gray-700 hover:text-gray-500 ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md bg-white"
                                    href="http://127.0.0.1:8000/users?sort=name&amp;page=2"
                                    dusk="pagination-simple-next">
                                    <span class="hidden sm:inline mr-2">Next</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400"
                                         fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                         stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M17 8l4 4m0 0l-4 4m4-4H3">

                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                                <div class="flex flex-row space-x-4 items-center flex-grow">
                                    <select name="per_page" dusk="per-page-full"
                                            class="block focus:ring-indigo-500 focus:border-indigo-500 min-w-max shadow-sm text-sm border-gray-300 rounded-md">
                                        <option value="8">8 per page</option>
                                        <option value="15">15 per page</option>
                                        <option value="30">30 per page</option>
                                        <option value="50">50 per page</option>
                                        <option value="100">100 per page</option>
                                    </select>
                                    <p class="hidden lg:block text-sm text-gray-700 flex-grow">
                                        <span class="font-medium">1</span> to <span class="font-medium">8</span>
                                        of <span class="font-medium">146</span> results</p>
                                </div>
                                <div>
                                    <nav
                                        class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px"
                                        aria-label="Pagination">
                                        <div
                                            class="cursor-not-allowed text-gray-400 relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium">
                                            <span class="sr-only">Previous</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                 viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                      clip-rule="evenodd">

                                                </path>
                                            </svg>
                                        </div>
                                        <template>

                                        </template>
                                        <div>
                                            <a href="http://127.0.0.1:8000/users?sort=name&amp;page=1"
                                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 bg-gray-100">1</a>
                                        </div>
                                        <div>
                                            <div
                                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 cursor-not-allowed">
                                                ...
                                            </div>
                                        </div>
                                        <div><a href="http://127.0.0.1:8000/users?sort=name&amp;page=18"
                                                class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50">18</a>
                                        </div>
                                        <a class="text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium"
                                           href="http://127.0.0.1:8000/users?sort=name&amp;page=2"
                                           >
                                            <span class="sr-only">Next</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                 viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                      clip-rule="evenodd">

                                                </path>
                                            </svg>
                                        </a>
                                    </nav>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>
</template>
