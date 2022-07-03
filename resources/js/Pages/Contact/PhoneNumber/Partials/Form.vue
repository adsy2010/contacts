<script setup>
import {useForm} from "@inertiajs/inertia-vue3";

let emit = defineEmits([]);
let props = defineProps({
    edit: Boolean,
    number: Boolean,
    phoneNumber: Object,
    contact: Object
});

let form = useForm({
    number: (props.phoneNumber) ? props.phoneNumber.number : '',
})

let submit = () => {
    if(props.edit) {
        form.patch(`/contact/${props.contact.id}/phoneNumber/${props.phoneNumber.id}`, {
            replace: true,
            preserveScroll: true,
            preserveState: true,
        });
    } else {
        form.post(`/contact/${props.contact.id}/phoneNumber`, {
            replace: true,
            preserveScroll: true,
            preserveState: true,
        });
    }
}

</script>

<template>

    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Phone Number</h3>
                    <p class="mt-1 text-sm text-gray-600">Add a phone number.</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div id="person-information-form">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">


                                <div class="col-span-6 sm:col-span-4" v-if="number">
                                    <label for="number" class="block text-sm font-medium text-gray-700">Phone Number</label>
                                    <input v-model="form.number" type="text" name="number" id="number" autocomplete="number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    <div class="text-red-600 text-xs">{{form.errors.number}}</div>
                                </div>


                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button
                                @click="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                v-text="edit ? 'save' : 'create'"
                            />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
