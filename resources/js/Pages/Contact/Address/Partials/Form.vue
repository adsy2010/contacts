<script setup>
import {useForm} from "@inertiajs/inertia-vue3";

let emit = defineEmits([]);
let props = defineProps({
    edit: Boolean,
    street1: Boolean,
    street2: Boolean,
    street3: Boolean,
    city: Boolean,
    county: Boolean,
    country: Boolean,
    postcode: Boolean,
    address: Object,
    contact: Object
});

let form = useForm({
    address_1: (props.address) ? props.address.address_1 : '',
    address_2: (props.address) ? props.address.address_2 : '',
    address_3: (props.address) ? props.address.address_3 : '',
    city: (props.address) ? props.address.city : '',
    county: (props.address) ? props.address.county : '',
    country: (props.address) ? props.address.country : '',
    postcode: (props.address) ? props.address.postcode : '',
})

let submit = () => {
    if(props.edit) {
        form.patch(`/contact/${props.contact.id}/address/${props.address.id}`, {
            replace: true,
            preserveScroll: true,
            preserveState: true,
        });
    } else {
        form.post(`/contact/${props.contact.id}/address`, {
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
                    <h3 class="text-lg font-medium leading-6 text-gray-900">Address</h3>
                    <p class="mt-1 text-sm text-gray-600">Add details for the address.</p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div id="person-information-form">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <div class="grid grid-cols-6 gap-6">


                                <div class="col-span-6 sm:col-span-4" v-if="street1">
                                    <label for="address_1" class="block text-sm font-medium text-gray-700">Street address</label>
                                    <input v-model="form.address_1" type="text" name="address_1" id="address_1" autocomplete="address_1" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    <div class="text-red-600 text-xs">{{form.errors.address_1}}</div>
                                </div>

                                <div class="col-span-6 sm:col-span-4" v-if="street2">
                                    <label for="address_2" class="block text-sm font-medium text-gray-700"></label>
                                    <input v-model="form.address_2" type="text" name="address_2" id="address_2" autocomplete="address_2" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    <div class="text-red-600 text-xs">{{form.errors.address_2}}</div>
                                </div>

                                <div class="col-span-6 sm:col-span-4" v-if="street3">
                                    <label for="address_3" class="block text-sm font-medium text-gray-700"></label>
                                    <input v-model="form.address_3" type="text" name="address_3" id="address_3" autocomplete="address_3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    <div class="text-red-600 text-xs">{{form.errors.address_3}}</div>
                                </div>

                                <div class="col-span-6 sm:col-span-4" v-if="city">
                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <input v-model="form.city" type="text" name="city" id="city" autocomplete="city" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    <div class="text-red-600 text-xs">{{form.errors.city}}</div>
                                </div>

                                <div class="col-span-6 sm:col-span-4" v-if="county">
                                    <label for="county" class="block text-sm font-medium text-gray-700">County</label>
                                    <input v-model="form.county" type="text" name="county" id="county" autocomplete="county" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    <div class="text-red-600 text-xs">{{form.errors.county}}</div>
                                </div>

                                <div class="col-span-6 sm:col-span-4" v-if="country">
                                    <label for="country" class="block text-sm font-medium text-gray-700">Country</label>
                                    <input v-model="form.country" type="text" name="country" id="country" autocomplete="country" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    <div class="text-red-600 text-xs">{{form.errors.country}}</div>
                                </div>

                                <div class="col-span-6 sm:col-span-4" v-if="postcode">
                                    <label for="postcode]" class="block text-sm font-medium text-gray-700">Postcode</label>
                                    <input v-model="form.postcode" type="text" name="postcode]" id="postcode]" autocomplete="postcode]" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" />
                                    <div class="text-red-600 text-xs">{{form.errors.postcode}}</div>
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
