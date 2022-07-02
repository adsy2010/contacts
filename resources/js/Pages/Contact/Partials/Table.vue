<script setup>
let emit = defineEmits([]);
let props = defineProps({contacts: Object});

</script>

<template>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="text-left pl-2 text-gray-600 font-semit-bold">Name</th>
            <th class="text-left pl-2 text-gray-600 font-semit-bold"></th>
        </tr>
        <tr v-for="contact in contacts.data">
            <td class="pl-2 py-3 text-gray-800 text-sm">
                <div class="flex flex-col">
                    <div class="text-sm">
                        {{contact.first_name}} {{contact.last_name}}
                    </div>
                    <a :href="`mailto:${contact.email}`" class="text-indigo-400 text-xs">
                        {{contact.email}}
                    </a>
                </div>

            </td>
            <td class="pl-2 py-3 text-gray-800 text-sm text-right">
                <Link
                    :href="`/contact/${contact.id}`"
                    class="text-white bg-indigo-600 hover:bg-indigo-900 rounded-md border-indigo-900 px-3 py-2"
                >view</Link>
            </td>
        </tr>
        </thead>
    </table>
</template>
