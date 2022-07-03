<script setup>
import Table from "./Partials/Table";
import Divider from "../Shared/Divider";
import Pagination from "../Shared/Pagination";

let emit = defineEmits([]);
let props = defineProps({
    contacts: Object,
    can: Object,
    filters: Object
});

</script>

<template>
    <div class="mx-auto lg:max-w-7xl">

        <div class="py-6">
            <div class="m-4">
                <Link class="bg-indigo-400 hover:bg-indigo-700 rounded-sm px-3 py-2 text-white" href="/contact/create">
                    Create contact
                </Link>
            </div>
            <div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3">
                    <Link :href="`/contact/${contact.id}`" class="flex flex-col justify-between bg-white rounded-md shadow-md m-4 p-4 space-y-3" v-for="contact in contacts.data">
                        <div class="">
                            <div class="font-semibold text-xl text-gray-700">{{ contact.first_name }}
                                {{ contact.last_name }}
                            </div>
                            <div>
                                <a @click.stop class="text-sm text-indigo-400 hover:text-indigo-700" :href="`mailto:${contact.email}`">{{ contact.email }}</a>
                            </div>
                        </div>
                        <div v-if="contact.date_of_birth" class="text-sm">
                            <span class="text-gray-400">DOB:</span> {{ contact.date_of_birth_long }}
                        </div>
                    </Link>
                </div>

                <!--Pagination-->
                <Pagination :from="contacts.from" :to="contacts.to" :total="contacts.total" :links="contacts.links"/>
            </div>

            <!--            <Table :contacts="contacts"></Table>-->
        </div>
    </div>
</template>
