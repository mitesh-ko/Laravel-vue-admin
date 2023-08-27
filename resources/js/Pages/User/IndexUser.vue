<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import {Head} from '@inertiajs/vue3';
import { Table } from "@protonemedia/inertiajs-tables-laravel-query-builder";
import DataTable from "@/Components/DataTable.vue";
import {reactive} from "vue";

defineProps({
    users: {
        type: Object
    }
})

const tableDefinition = reactive({
    columns: [
        {data: 'DT_RowIndex', name: 'ID', searchable:'', orderable: true},
        {data: 'name', name: 'name', searchable:'', orderable: true},
        {data: 'email', name: 'email', searchable:'', orderable: true},
        {data: 'joined_on', name: 'joined on', searchable:'', orderable: true},
        {data: 'action', name: 'action', searchable:'', orderable: false},
    ]
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-gray-800">Home > Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pt-4">
<!--                    <Table :resource="users" />-->
                    <DataTable  :resource="users" :definition="tableDefinition"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
